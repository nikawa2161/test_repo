<div class="h-full px-3 py-4 overflow-y-auto">
    <ul class="space-y-2 font-medium">
       <li>
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-white dark:text-gray-200" />
        </a>
       </li>
       <li>
            <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                <span class="ml-3 text-white">{{ Auth::user()->name }}</span>
            </x-nav-link>
       </li>
       <li>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <svg aria-hidden="true" class="w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                <span class="ml-3 text-white">{{ __('ユーザーダッシュボード') }}</span>
            </x-nav-link>
       </li>
       <li>
            <x-nav-link :href="route('offer')" :active="request()->routeIs('offer')">
                <svg aria-hidden="true" class="w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                <span class="ml-3 text-white">{{ __('求人一覧') }}</span>
            </x-nav-link>
       </li>
       <li>
            <x-nav-link :href="route('message')" :active="request()->routeIs('message')">
                <svg aria-hidden="true" class="w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                <span class="ml-3 text-white">{{ __('応募一覧') }}</span>
            </x-nav-link>
       </li>
    </ul>
 </div>
