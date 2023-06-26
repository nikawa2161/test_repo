<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('ユーザー詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex justify-end">
            <x-my-delete-link :action="route('admin.user.destroy', $user->id)">
                {{ __('ユーザー削除') }}
            </x-my-delete-link>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="py-4 mt-4 bg-white">
                <div class=" py-2 sm:py-4 lg:py-8">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                        <div class=" rounded-lg bg-gray-100 p-2 sm:flex-row md:p-4">
                            <p class="text-xl mb-4 font-bold text-gray-800 ">ユーザー名：{{ $user->name }}</p>
                            <p class="text-xl mb-4 font-bold text-gray-800 ">メールアドレス：{{ $user->email }}</p>
                            <p class="text-xl mb-4 font-bold text-gray-800 ">登録日：{{ $user->created_at->format('Y/m/d') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
