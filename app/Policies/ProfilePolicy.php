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
        // Same as view by default
        if ($user->id === $profileUser->id) return true;

        // If the profile being edited is a student or instructor, only allow specific admin roles
        $profileRoleName = null;
        if (isset($profileUser->role) && is_object($profileUser->role) && isset($profileUser->role->name)) {
            $profileRoleName = strtolower(trim($profileUser->role->name));
        } elseif (is_string($profileUser->role)) {
            $profileRoleName = strtolower(trim($profileUser->role));
        }

        if (in_array($profileRoleName, ['student', 'instructor'])) {
            $allowed = ['system manager', 'executive', 'administrator'];
            $roles = [];
            if (method_exists($user, 'getRoleNames')) {
                $maybe = $user->getRoleNames();
                if (is_iterable($maybe)) foreach ($maybe as $r) $roles[] = strtolower(trim((string)$r));
            } elseif (isset($user->role)) {
                if (is_object($user->role) && isset($user->role->name)) $roles[] = strtolower(trim($user->role->name));
                else $roles[] = strtolower(trim((string)$user->role));
            }
            foreach ($roles as $r) {
                foreach ($allowed as $a) {
                    if (str_contains($r, $a)) return true;
                }
            }
            return false;
        }

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

    /**
     * Determine whether the user can manage committee memberships.
     * Only system managers and executives can add/edit/delete committee memberships.
     * Admins, instructors, students, and guests cannot manage committee memberships.
     */
    public function manageCommitteeMemberships(User $user, $profileUser): bool
    {
        // Guests can't manage
        if (! $user) return false;

        // Normalize $profileUser
        if (! $profileUser) {
            $profileUser = $user;
        } elseif (! $profileUser instanceof User) {
            $profileUser = User::find($profileUser) ?: $user;
        }

        // Determine role names
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

        // Only system manager and executive can manage committee memberships
        $allowed = ['executive', 'system manager'];
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

    /**
     * Determine whether the user can manage classroom responsibilities.
     * Only system managers and executives can add/edit/delete classroom responsibilities.
     * Admins, instructors, students, and guests cannot manage classroom responsibilities.
     */
    public function manageClassroomResponsibilities(User $user, $profileUser): bool
    {
        // Guests can't manage
        if (! $user) return false;

        // Normalize $profileUser
        if (! $profileUser) {
            $profileUser = $user;
        } elseif (! $profileUser instanceof User) {
            $profileUser = User::find($profileUser) ?: $user;
        }

        // Determine role names
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

        // Only system manager and executive can manage classroom responsibilities
        $allowed = ['executive', 'system manager'];
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

    /**
     * Determine whether the user can manage FCEER profiles.
     * Only administrators, executives, and system managers can edit FCEER profiles.
     * Students and instructors cannot edit their own FCEER profiles.
     */
    public function manageFceerProfile(User $user, $profileUser): bool
    {
        // Guests can't manage
        if (! $user) return false;

        // Normalize $profileUser
        if (! $profileUser) {
            $profileUser = $user;
        } elseif (! $profileUser instanceof User) {
            $profileUser = User::find($profileUser) ?: $user;
        }

        // Determine role names
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

        // Only administrator, executive, and system manager can manage FCEER profiles
        $allowed = ['administrator', 'executive', 'system manager'];
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

    /**
     * Determine whether the user can manage personal records (identification, contact details).
     * Only administrators and executives can edit others' personal records.
     * Students and instructors can only view but not edit others' personal records.
     * Everyone can edit their own personal records.
     */
    public function managePersonal(User $user, $profileUser): bool
    {
        // Guests can't manage
        if (! $user) return false;

        // Normalize $profileUser
        if (! $profileUser) {
            $profileUser = $user;
        } elseif (! $profileUser instanceof User) {
            $profileUser = User::find($profileUser) ?: $user;
        }

        // Users can edit their own personal records
        if ($user->id === $profileUser->id) return true;

        // Determine role names
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

        // Only administrator and executive can manage others' personal records
        $allowed = ['administrator', 'executive'];
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