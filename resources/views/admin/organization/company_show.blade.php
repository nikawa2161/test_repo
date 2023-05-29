<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('業界詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex justify-end">
            <x-my-delete-link :action="route('admin.company.destroy', $company->id)">
                {{ __('削除') }}
            </x-my-delete-link>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="py-4 mt-4 bg-white">
                <div class=" py-2 sm:py-4 lg:py-8">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                        <div class=" rounded-lg bg-gray-100 p-2 sm:flex-row md:p-8">
                            <p class="mb-4 text-xl font-bold text-indigo-500 md:text-2xl">業界名：{{ $company->name }}</p>
                            <p class="mb-4 text-xl font-bold text-indigo-500 md:text-2xl">メールアドレス：{{ $company->email }}</p>
                            <p class="mb-4 text-xl font-bold text-indigo-500 md:text-2xl">tell:{{ $company->name }}</p>
                            <p class="mb-4 text-xl font-bold text-indigo-500 md:text-2xl">代表者名:{{ $company->human_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
