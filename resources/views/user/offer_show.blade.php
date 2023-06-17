<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('求人一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex justify-end">
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex justify-end">
            @if ($isEntry)
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                応募済み
            </button>
            @else
            <form method="post" action="{{ route('entry') }}">
                @csrf
                <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    応募する
                </button>
            </form>
            @endif
        </div>
        <ul class="py-4 mt-4 bg-white">
            <li class=" py-2 sm:py-4 lg:py-8">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                    <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-8">
                        <div class="">
                            <p class="mb-4 text-xl font-bold text-indigo-500 md:text-2xl">企業名：{{ $company->name }}</p>
                            <p class="mb-4 text-xl font-bold text-indigo-500 md:text-2xl">タイトル：{{ $offer->title }}</p>
                            <p class="text-xl font-bold text-indigo-500 md:text-2xl">内容：{{ $offer->content }}</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</x-app-layout>
