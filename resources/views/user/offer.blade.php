<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('求人一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex justify-end">
        </div>
        <ul class="py-4 mt-4 bg-white">
            @foreach ($offers as $offer)
                <li class=" py-2 sm:py-4 lg:py-8">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                      <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-4">
                        <div class="w-3/4q">
                            <p class="mb-4 text-xl font-bold text-gray-800">タイトル：{{ $offer->title }}</p>
                            <p class="text-xl font-bold text-gray-800">内容：{{ $offer->content }}</p>
                        </div>

                            <div class="flex">
                                <x-my-nav-link :href="route('offer.show',[ $offer->id ])">
                                    {{ __('詳細') }}
                                </x-my-nav-link>
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex justify-end">
                                    @if ($entryStatus->where('offer_id', $offer->id)->exists())
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
                            </div>
                      </div>
                    </div>
                  </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
