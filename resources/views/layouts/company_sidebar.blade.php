<div class="h-full px-3 py-4 overflow-y-auto">
    <ul class="space-y-2 font-medium">
       <li>
        <a href="{{ route('company.dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-white dark:text-gray-800" />
        </a>
       </li>
       <li>
            <x-nav-link :href="route('company.profile.edit')" :active="request()->routeIs('company.profile.edit')">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                <span class="ml-3 text-white">{{ Auth::user()->name }}</span>
            </x-nav-link>
       </li>
       <li>
            <x-nav-link :href="route('company.dashboard')" :active="request()->routeIs('company.dashboard')">
                <svg aria-hidden="true" class="w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                <span class="ml-3 text-white">{{ __('企業ダッシュボード') }}</span>
            </x-nav-link>
       </li>
       <li>
        <x-nav-link :href="route('company.offer')" :active="request()->routeIs('company.offer')">
            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            <span class="ml-3 text-white">{{ __('求人管理') }}</span>
        </x-nav-link>
       </li>
       <li>
        <x-nav-link :href="route('company.entry')" :active="request()->routeIs('company.entry')">
            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
            <span class="ml-3 text-white">{{ __('応募管理') }}</span>
        </x-nav-link>
       </li>
       <li>
        <x-nav-link :href="route('company.account')" :active="request()->routeIs('company.account')">
            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
            <span class="ml-3 text-white">{{ __('アカウント管理') }}</span>
        </x-nav-link>
       </li>
    </ul>
 </div>
