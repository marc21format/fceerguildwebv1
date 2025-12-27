<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
    @fluxAppearance
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
@php
    $user = auth()->user();
@endphp

<flux:sidebar
    sticky
    collapsible
    class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700"
>

    {{-- HEADER --}}
    @php
        $logoLight = file_exists(public_path('images/logo-light.png')) ? asset('images/logo-light.png') : null;
        $logoDark = file_exists(public_path('images/logo-dark.png')) ? asset('images/logo-dark.png') : null;
    @endphp
    <flux:sidebar.header>
        @if ($logoLight)
            <flux:sidebar.brand href="{{ route('dashboard') }}"
                logo="{{ $logoLight }}"
                @if($logoDark) logo:dark="{{ $logoDark }}" @endif
                name="SJDM FCEER Guild" />
        @else
            <flux:sidebar.brand href="{{ route('dashboard') }}" class="w-full flex items-center px-2 in-data-flux-sidebar-on-desktop:in-data-flux-sidebar-collapsed-desktop:justify-center in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:justify-start">
                <x-app-logo />
            </flux:sidebar.brand>
        @endif

        <flux:sidebar.collapse
            class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2"
        />
    </flux:sidebar.header>

    {{-- NAV --}}
    <flux:sidebar.nav>
        <flux:sidebar.item
            icon="home"
            :href="route('dashboard')"
            :current="request()->routeIs('dashboard')"
            wire:navigate
        >
            Home
        </flux:sidebar.item>

        <flux:sidebar.group :heading="__('Platform')">
            <flux:sidebar.item
                icon="layout-grid"
                :href="route('database')"
                :current="request()->routeIs('database*')"
                wire:navigate
            >
                {{ __('Database') }}
            </flux:sidebar.item>
        </flux:sidebar.group>

        {{-- Icon-only when collapsed --}}
        <flux:sidebar.item
            icon="layout-grid"
            :href="route('database')"
            wire:navigate
            class="hidden in-data-flux-sidebar-on-desktop:in-data-flux-sidebar-collapsed-desktop:flex"
            aria-hidden="true"
        >
            <span class="sr-only">{{ __('Database') }}</span>
        </flux:sidebar.item>

    </flux:sidebar.nav>

    <flux:spacer />

    <flux:sidebar.nav>
        <flux:sidebar.item
            icon="folder-git-2"
            href="https://github.com/laravel/livewire-starter-kit"
            target="_blank"
        >
            {{ __('Repository') }}
        </flux:sidebar.item>

        <flux:sidebar.item
            icon="book-open-text"
            href="https://laravel.com/docs/starter-kits#livewire"
            target="_blank"
        >
            {{ __('Documentation') }}
        </flux:sidebar.item>
    </flux:sidebar.nav>
    
    <flux:separator />

        {{-- USER MENU --}}
            <flux:dropdown class="hidden lg:block mt-auto w-full" position="bottom" align="start">
                <button slot="trigger" type="button" class="w-full flex items-center rounded-lg p-1">
                    {{-- Expanded variant (visible when sidebar is expanded) --}}
                    <span class="profile-expanded hidden in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:flex items-center gap-2 w-full px-2">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">{{ auth()->user()->initials() }}</span>
                        <span class="flex-1 text-sm leading-tight text-start">
                            <span class="font-semibold truncate block">{{ auth()->user()->name }}</span>
                        </span>
                        <span class="opacity-60">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                <polyline points="17 11 12 6 7 11"></polyline>
                                <polyline points="17 18 12 13 7 18"></polyline>
                            </svg>
                        </span>
                    </span>

                    {{-- Collapsed variant (visible when sidebar is collapsed) --}}
                    <span class="profile-collapsed hidden in-data-flux-sidebar-on-desktop:in-data-flux-sidebar-collapsed-desktop:flex h-8 w-8 items-center justify-center rounded-lg bg-neutral-700 text-white mx-auto">
                        {{ auth()->user()->initials() }}
                    </span>
                </button>

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">{{ auth()->user()->initials() }}</span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full" data-test="logout-button">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
</flux:sidebar>

@php
    $routeBreadcrumbs = [
        'database*' => [
            ['label' => 'Dashboard', 'href' => route('dashboard')],
            ['label' => 'Database', 'href' => route('database')],
        ],
        'database.provinces*' => [
            ['label' => 'Dashboard', 'href' => route('dashboard')],
            ['label' => 'Database (Address)', 'href' => route('database')],
            ['label' => 'Provinces', 'href' => route('database.provinces')],
        ],
        'database.cities*' => [
            ['label' => 'Dashboard', 'href' => route('dashboard')],
            ['label' => 'Database (Address)', 'href' => route('database')],
            ['label' => 'Cities', 'href' => route('database.cities')],
        ],
        'database.barangays*' => [
            ['label' => 'Dashboard', 'href' => route('dashboard')],
            ['label' => 'Database (Address)', 'href' => route('database')],
            ['label' => 'Barangays', 'href' => route('database.barangays')],
        ],        'database.degree_fields*' => [
            ['label' => 'Dashboard', 'href' => route('dashboard')],
            ['label' => 'Database', 'href' => route('database')],
            ['label' => 'Degree Fields', 'href' => route('database.degree_fields')],
        ],
        'database.degree_levels*' => [
            ['label' => 'Dashboard', 'href' => route('dashboard')],
            ['label' => 'Database', 'href' => route('database')],
            ['label' => 'Degree Levels', 'href' => route('database.degree_levels')],
        ],
        'database.degree_programs*' => [
            ['label' => 'Dashboard', 'href' => route('dashboard')],
            ['label' => 'Database', 'href' => route('database')],
            ['label' => 'Degree Programs', 'href' => route('database.degree_programs')],
        ],
        'database.degree_types*' => [
            ['label' => 'Dashboard', 'href' => route('dashboard')],
            ['label' => 'Database', 'href' => route('database')],
            ['label' => 'Degree Types', 'href' => route('database.degree_types')],
        ],    ];

    $topbarLinks = [];
    foreach ($routeBreadcrumbs as $pattern => $links) {
        if (request()->routeIs($pattern)) {
            $topbarLinks = $links;
            $topbarLinks[count($topbarLinks) - 1]['current'] = true;
            break;
        }
    }
@endphp

@if ($topbarLinks)
    <flux:header class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:navbar scrollable>
            @foreach ($topbarLinks as $link)
                <flux:navbar.item
                    href="{{ $link['href'] }}"
                    :current="$link['current'] ?? false"
                    wire:navigate
                >
                    {{ $link['label'] }}
                </flux:navbar.item>
            @endforeach
        </flux:navbar>
    </flux:header>
@endif


{{ $slot }}

{{-- Toaster hub for livewire-toaster package --}}
<x-toaster-hub />

@fluxScripts
</body>
</html>
