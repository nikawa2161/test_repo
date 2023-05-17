<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('求人ユーザー管理') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <ul class="py-4 mt-4 bg-white">
            @foreach ($users as $user)
                <li class=" py-2 sm:py-4 lg:py-8">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                      <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-8">
                            <p class="text-xl font-bold text-indigo-500 md:text-2xl">{{ $user->name }}</p>

                            <div class="">
                                <x-my-nav-link :href="route('admin.user.show',[ $user->id ])">
                                    {{ __('詳細') }}
                                </x-my-nav-link>
                                {{-- <x-my-nav-link :href="route('admin.user.edit',[ $user->id ])">
                                    {{ __('編集') }}
                                </x-my-nav-link>
                                <x-my-delete-link :action="route('admin.user.destroy', $user->id)">
                                    {{ __('削除') }}
                                </x-my-delete-link> --}}
                            </div>
                      </div>
                    </div>
                  </li>
            @endforeach
        </ul>
    </div>
</x-admin-layout>
