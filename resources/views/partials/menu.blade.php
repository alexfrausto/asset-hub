<li>
    <a href="{{ route('dashboard') }}" class={{ request()->routeIs('dashboard') ? 'menu-active' : '' }}>
        <x-heroicon-o-squares-2x2 class="size-5" />
        Dashboard
    </a>
</li>
<li>
    <a href="{{ route('users.index') }}" class={{ request()->routeIs('users.*') ? 'menu-active' : '' }}>
        <x-heroicon-o-users class="size-5" />
        {{ __('Users') }}
    </a>
</li>
