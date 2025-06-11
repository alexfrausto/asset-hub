<li>
    <a href=""><x-heroicon-o-cog class="size-5" />{{ __('Settings') }}</a>
</li>

<form method="POST" action="{{ route('logout') }}">
    <li>
        @csrf
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
            <x-heroicon-o-arrow-right-start-on-rectangle class="size-5" />
            <span>{{ __('Log Out') }}</span>
        </a>
    </li>
</form>
