<style>
    #dark-mode-toggle {
        color: #f9fafb;
        padding: 8px 16px;
        border: 1px solid #f9fafb;
        border-radius: 8px;
        height: 35px;
        cursor: pointer;
        position: relative;
        font-size: 14px;
        transition: background-color 0.3s, box-shadow 0.3s;
        margin-right: 10px;
    }

    #dark-mode-toggle:hover {
        background-color: #374151;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
    }

    .button-group {
        display: flex;
        align-items: center;
    }
</style>
<nav x-data="{ open: false }" class="bg-dark border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-200" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white">
                        {{ __('Strona głowna') }}
                    </x-nav-link>

                    @if (Auth::check() && Auth::user()->role && Auth::user()->role->nazwa == 'Administrator')
                        <x-nav-link :href="route('planety.index')" :active="request()->routeIs('planety.index')" class="text-white">
                            {{ __('Zarządzaj planetami') }}
                        </x-nav-link>
                    @endif

                    @if (Auth::check() && Auth::user()->role && Auth::user()->role->nazwa == 'Administrator')
                        <x-nav-link :href="route('ksiezyce.index')" :active="request()->routeIs('ksiezyce.index')" class="text-white">
                            {{ __('Zarządzaj księzycami') }}
                        </x-nav-link>
                    @endif

                    <x-nav-link :href="route('publicplanety.index')" :active="request()->routeIs('publicplanety.index')" class="text-white">
                        {{ __('Lista planet') }}
                    </x-nav-link>

                    <x-nav-link :href="route('publicksiezyce.index')" :active="request()->routeIs('publicksiezyce.index')" class="text-white">
                        {{ __('Lista księżyców') }}
                    </x-nav-link>

                    <x-nav-link :href="route('publiczjawiska.index')" :active="request()->routeIs('publiczjawiska.index')" class="text-white">
                        {{ __('Lista zjawisk') }}
                    </x-nav-link>

                    <x-nav-link :href="route('forum.index')" :active="request()->routeIs('forum.index')" class="text-white">
                        {{ __('Forum') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <button id="dark-mode-toggle"
                    class="bg-gray-700 text-white px-3 py-2 rounded-md text-sm font-medium theme-toggle"
                    onclick="toggleTheme()">
                    Dark Mode
                </button>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-200 bg-dark hover:text-gray-400 hover:bg-gray-900 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 011.414 0l-4-4a1 1 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-gray-400 hover:bg-gray-900 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" class="text-white"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('dark-mode-toggle');
        toggleButton.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
        });
    });
</script>
