<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="w-16">
                        <x-application-logo class="block w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                @canany(['agency'])
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('candidate.applicant')"
                        :active="request()->routeIs('candidate.applicant') || request()->routeIs('candidate.edit')">
                        {{ __('Applicants') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('candidate.employed')" :active="request()->routeIs('candidate.employed')">
                        {{ __('Employed') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('employers')"
                        :active="request()->routeIs('employers') || request()->routeIs('employers.create') || request()->routeIs('employers.show')">
                        {{ __('Employers') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('affiliates')"
                        :active="request()->routeIs('affiliates') || request()->routeIs('affiliates.show')|| request()->routeIs('affiliates.create')">
                        {{ __('Co-Hosts') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('reports')" :active="request()->routeIs('reports')">
                        {{ __('Reports') }}
                    </x-nav-link>
                </div>
            @endcan
            @canany(['employer'])
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('candidate.employees')"
                    :active="request()->routeIs('candidate.employees')">
                    {{ __('My Employees') }}
                </x-nav-link>
            </div>
        @endcan
        @canany(['admin','gov'])
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('reports')" :active="request()->routeIs('reports')">
                {{ __('Reports') }}
            </x-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('candidates')" :active="request()->routeIs('candidates')">
                {{ __('OFWs') }}
            </x-nav-link>
        </div>
    @endcan
    @canany(['admin'])
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('users')" :active="request()->routeIs('users')">
            {{ __('Users') }}
        </x-nav-link>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('settings')" :active="request()->routeIs('settings')">
            {{ __('Settings') }}
        </x-nav-link>
    </div>
@endcan
</div>

<!-- Settings Dropdown -->
<div class="hidden sm:flex sm:items-center sm:ml-6">
<x-dropdown align="right" width="48">
    <x-slot name="trigger">
        <button
            class="flex items-center text-sm font-medium text-gray-700 hover:underline hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
            <div>
                <span class="text-green-300"><i class="fa fa-circle"></i> </span>
                @can('admin') {{ __('Admin') }} @elsecan('agency') {{ __('Agency') }}
                    @elsecan('gov') {{ __('Government') }} @elsecan('employer') {{ __('Employer') }}
                @endcan
                <strong>{{ \App\Models\Information::getNameById(Auth::id()) }}</strong>
            </div>
            <div class="ml-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </button>
    </x-slot>

    <x-slot name="content">
        <x-dropdown-link :href="route('change.pass')">
            {{ __('Change Password') }}
        </x-dropdown-link>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Logout') }}
            </x-dropdown-link>
        </form>
    </x-slot>
</x-dropdown>
</div>

<!-- Hamburger -->
<div class="-mr-2 flex items-center sm:hidden">
<button @click="open = ! open"
    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
</button>
</div>
</div>
</div>

<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
<div class="pt-2 pb-3 space-y-1">
<x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
{{ __('Dashboard') }}
</x-responsive-nav-link>
@canany(['agency'])
<x-responsive-nav-link :href="route('candidate.applicant')"
:active="request()->routeIs('candidate.applicant') || request()->routeIs('candidate.edit')">
{{ __('Applicants') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('candidate.employed')"
:active="request()->routeIs('candidate.employed')">
{{ __('Employed') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('employers')"
:active="request()->routeIs('employers') || request()->routeIs('employers.create') || request()->routeIs('employers.show')">
{{ __('Employers') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('affiliates')"
:active="request()->routeIs('affiliates') || request()->routeIs('affiliates')">
{{ __('Affiliates') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('reports')" :active="request()->routeIs('reports')">
{{ __('Reports') }}
</x-responsive-nav-link>
@endcan
@canany(['employer'])
<x-responsive-nav-link :href="route('users')" :active="request()->routeIs('users')">
{{ __('Employees') }}
</x-responsive-nav-link>
@endcan
@canany(['admin','gov'])
<x-responsive-nav-link :href="route('users')" :active="request()->routeIs('users')">
{{ __('Users') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('reports')" :active="request()->routeIs('reports')">
{{ __('Reports') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('candidates')" :active="request()->routeIs('candidates')">
{{ __('OFWs') }}
</x-responsive-nav-link>
@endcan
</div>

<!-- Responsive Settings Options -->
<div class="pt-4 pb-1 border-t border-gray-200">
<div class="flex items-center px-4">
<div class="flex-shrink-0">
<svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
</svg>
</div>

<div class="ml-3">
<div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
<div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
</div>
</div>

<div class="mt-3 space-y-1">
<x-responsive-nav-link :href="route('change.pass')">
{{ __('Change Password') }}
</x-responsive-nav-link>
<!-- Authentication -->
<form method="POST" action="{{ route('logout') }}">
@csrf
<x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
            this.closest('form').submit();">
{{ __('Logout') }}
</x-responsive-nav-link>
</form>
</div>
</div>
</div>
</nav>
