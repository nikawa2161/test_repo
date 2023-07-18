<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('特徴一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex justify-end">
            <x-my-nav-link :href="route('admin.feature.create')">
                {{ __('特徴作成') }}
            </x-my-nav-link>
        </div>
        <ul class="py-4 mt-4 bg-white">
            @foreach ($features as $feature)
                <li class=" py-2 sm:py-4 lg:py-8">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                      <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-4">
                        <div class="">
                            <p class="text-xl font-bold text-gray-800 ">特徴名：{{ $feature->name }}</p>
                        </div>
                            <div class="">
                                <x-my-nav-link :href="route('admin.feature.edit',[ $feature->id ])">
                                    {{ __('編集') }}
                                </x-my-nav-link>
                                <x-my-delete-link :action="route('admin.feature.destroy', $feature->id)">
                                    {{ __('削除') }}
                                </x-my-delete-link>
                            </div>
                      </div>
                    </div>
                  </li>
            @endforeach
        </ul>
    </div>
</x-admin-layout>
