<x-company-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('求人一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex justify-end">
            <x-my-nav-link :href="route('company.offer.create')">
                {{ __('求人作成') }}
            </x-my-nav-link>
        </div>
        <ul class="py-4 mt-4 bg-white">
            @foreach ($offers as $offer)
            <li class="py-2 sm:py-4">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                      <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-4">
                        <div class="">
                            <p class="mb-4 text-xl font-bold text-gray-800">タイトル：{{ $offer->title }}</p>
                            <p class="mb-4 text-xl font-bold text-gray-800">内容：{{ $offer->content }}</p>
                            <p class="text-xl font-bold text-gray-800">作成者：{{ $offer->account->name }}</p>
                        </div>

                            <div class="">
                                {{-- <x-my-nav-link :href="route('admin.offer.show',[ $offer->id ])">
                                    {{ __('詳細') }}
                                </x-my-nav-link>
                                <x-my-nav-link :href="route('admin.offer.edit',[ $offer->id ])">
                                    {{ __('編集') }}
                                </x-my-nav-link>
                                <x-my-delete-link :action="route('admin.offer.destroy', $offer->id)">
                                    {{ __('削除') }}
                                </x-my-delete-link> --}}
                            </div>
                      </div>
                    </div>
                  </li>
            @endforeach
        </ul>
    </div>
</x-company-layout>
