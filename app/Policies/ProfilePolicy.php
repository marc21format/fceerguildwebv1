<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;

class ProfilePolicy
{
    /**
     * Determine whether the user can view the profile.
     */
    public function view(User $user, User $profileUser): bool
    {
        // Guests can't view any profiles
        if (!$user) return false;

        // Users can view their own profile
        if ($user->id === $profileUser->id) return true;

        // Executive, admin, system manager can view others
        return in_array($user->role, ['executive', 'administrator', 'system manager']);
    }

    /**
     * Determine whether the user can update the profile.
     */
    public function update(User $user, User $profileUser): bool
    {
        // Same as view, but stricter if needed (e.g., no self-update for certain fields)
        return $this->view($user, $profileUser);
    }

    /**
     * Determine whether the user can manage (full CRUD) others' profiles.
     */
    public function manage(User $user, $profileUser): bool
    {
        Log::info('ProfilePolicy::manage called', ['auth_id' => optional($user)->id, 'profileUser_raw' => $profileUser]);
        // Guests can't manage
        if (! $user) return false;

        // Normalize $profileUser: it may be an id/string when used in route middleware
        if (! $profileUser) {
            $profileUser = $user;
        } elseif (! $profileUser instanceof User) {
            $profileUser = User::find($profileUser) ?: $user;
        }

        // Allow managing own profile
        if ($user->id === $profileUser->id) return true;

        // Determine role names (support both direct `role` property and getRoleNames())
        $roles = [];
        if (method_exists($user, 'getRoleNames')) {
            $maybe = $user->getRoleNames();
            if (is_iterable($maybe)) {
                foreach ($maybe as $r) {
                    $roles[] = is_string($r) ? $r : (is_object($r) && isset($r->name) ? $r->name : (is_array($r) && isset($r['name']) ? $r['name'] : (string) $r));
                }
            } else {
                $roles[] = (string) $maybe;
            }
        } elseif (isset($user->role)) {
            if (is_string($user->role)) {
                $roles[] = $user->role;
            } elseif (is_object($user->role) && isset($user->role->name)) {
                $roles[] = $user->role->name;
            } elseif (is_array($user->role) && isset($user->role['name'])) {
                $roles[] = $user->role['name'];
            } else {
                $roles[] = (string) $user->role;
            }
        }

        // Case-insensitive check and allow partial matches (e.g., 'System Manager', 'system_manager')
        $allowed = ['executive', 'administrator', 'system manager'];
        $rolesLower = array_map(fn($r) => strtolower(trim((string) $r)), $roles);

        foreach ($rolesLower as $r) {
            foreach ($allowed as $a) {
                if (str_contains($r, $a)) {
                    return true;
                }
            }
        }

        return false;
    }
}