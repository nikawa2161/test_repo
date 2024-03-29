<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('業界詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex justify-end">
            <x-my-delete-link :action="route('admin.offer.destroy', $offer->id)">
                {{ __('削除') }}
            </x-my-delete-link>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="py-4 mt-4 bg-white">
                <div class=" py-2 sm:py-4 lg:py-8">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                        <div class=" rounded-lg bg-gray-100 p-2 sm:flex-row md:p-4">
                            <p class="text-xl font-bold text-gray-800 ">タイトル：{{ $offer->title }}</p>
                            <p class="text-xl font-bold text-gray-800 ">内容：{{ $offer->content }}</p>
                            <p class="text-xl font-bold text-gray-800 ">特徴：{{ $offer->feature->name ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
