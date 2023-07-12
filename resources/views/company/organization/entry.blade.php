<x-company-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('応募管理') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <ul class="py-4 mt-4 bg-white">
            <li class=" py-2 sm:py-4 lg:py-4">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                  <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-4">
                        <p class="text-xl font-bold text-gray-800">名前</p>
                        <p class="text-xl font-bold text-gray-800">応募求人</p>
                        <p class="text-xl font-bold text-gray-800">応募日時</p>
                        <p class="text-xl font-bold text-gray-800">Action</p>
                  </div>
                </div>
              </li>
            @foreach ($entries as $entry)
                <li class=" py-2 sm:py-4 lg:py-4">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                      <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-4">
                            <p class="text-xl font-bold text-gray-800">{{ $entry->user->name }}</p>
                            <p class="text-xl font-bold text-gray-800">{{ $entry->offer->title }}</p>
                            <p class="text-xl font-bold text-gray-800">{{ $entry->created_at }}</p>

                            <div class="">
                                <x-my-nav-link :href="route('company.entry.show',[ $entry->id ])">
                                    {{ __('詳細') }}
                                </x-my-nav-link>
                            </div>
                      </div>
                    </div>
                  </li>
            @endforeach
        </ul>
    </div>
</x-company-layout>
