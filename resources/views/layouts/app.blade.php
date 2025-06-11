@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ $userTheme }}">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen font-sans antialiased bg-base-200">
    <header class="bg-base-100 border-base-content/10 sticky top-0 z-10 lg:hidden">
        <div class="navbar bg-base-300 px-6 max-w-7xl mx-auto">
            <div class="navbar-start">
                <div class="flex justify-start items-center gap-2">
                    <div class="avatar avatar-placeholder">
                        <div class="w-10 rounded-box bg-primary">
                            <span class="text-base font-bold">AH</span>
                        </div>
                    </div>
                    <h1 class="text-lg font-bold">
                        Asset Hub
                    </h1>
                </div>
            </div>
            <div class="navbar-end">
                <label for="main-drawer" class="lg:hidden p-2">
                    <x-heroicon-o-bars-3 class="size-5" />
                </label>
            </div>
        </div>
    </header>
    <main class="w-full mx-auto max-w-screen-2xl">
        <div class="drawer lg:drawer-open">
            <input id="main-drawer" type="checkbox" class="drawer-toggle">
            <div class="drawer-content w-full mx-auto p-5 lg:px-10 lg:py-5">
                <div class="mb-6">
                    <div class="flex flex-wrap gap-5 justify-between items-center">
                        <div class="text-2xl font-extrabold">
                            {{ $title }}
                        </div>
                        @isset($actions)
                            {{ $actions }}
                        @endisset
                    </div>
                    <hr class="border-base-content/10 mt-3">
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    @if (session('status'))
                        <div type="success" :message="session('status')" />
                    @endif
                    @if (session('error'))
                        <div type="error" :message="session('error')" />
                    @endif
                    {{ $slot }}
                </div>
            </div>
            <div class="drawer-side z-20 lg:z-auto">
                <label for="main-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu text-base-content min-h-full bg-base-200 w-[256px]"">
                    <a href="{{ route('dashboard') }}" class="py-4 ps-2 flex justify-start items-center gap-2">
                        <div class="avatar avatar-placeholder">
                            <div class="w-10 rounded-box bg-primary">
                                <span class="text-base font-bold">AH</span>
                            </div>
                        </div>
                        <h1 class="text-lg font-bold">
                            Asset Hub
                        </h1>
                    </a>
                    <hr class="my-3 border-base-content/10">
                    <li>
                        <div>
                            <x-heroicon-o-magnifying-glass class="size-5" />
                            {{ __('Search') }}
                            <span class="badge badge-soft badge-xs">Cmd + k</span>
                        </div>
                    </li>
                    <hr class="my-3 border-base-content/10">
                    <div class="flex flex-col flex-1 gap-2">
                        @include('partials.menu')
                    </div>
                    <hr class="my-3 border-base-content/10">
                    <div class="flex justify-start items-center gap-2 px-3 py-3">
                        <div class="dropdown dropdown-top">
                            <div tabindex="0" role="button" class="btn btn-circle btn-ghost">
                                <div class="avatar avatar-placeholder">
                                    <div class="w-10 rounded-box bg-accent text-accent-foreground">
                                        <span class="text-base font-bold">{{ auth()->user()->initials() }}</span>
                                    </div>
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm gap-1">
                                @include('partials.user-dropdown')
                            </ul>
                        </div>
                        <div>
                            <div class="font-semibold truncate">
                                {{ auth()->user()->name }}
                            </div>
                            <div class="text-base-content/50 text-sm truncate">
                                {{ auth()->user()->email }}
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </main>
</body>

</html>
