<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
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
                      <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-8">
                        <div class="">
                            <p class="mb-4 text-xl font-bold text-indigo-500 md:text-2xl">タイトル：{{ $offer->title }}</p>
                            <p class="text-xl font-bold text-indigo-500 md:text-2xl">内容：{{ $offer->content }}</p>
                        </div>

                            <div class="">
                                <x-my-nav-link :href="route('offer.show',[ $offer->id ])">
                                    {{ __('詳細') }}
                                </x-my-nav-link>
                            </div>
                      </div>
                    </div>
                  </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
