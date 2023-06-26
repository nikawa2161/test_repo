<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('業界一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex justify-end">
            <x-my-nav-link :href="route('admin.industry.create')">
                {{ __('業界作成') }}
            </x-my-nav-link>
        </div>
        <ul class="py-4 mt-4 bg-white">
            @foreach ($industries as $industry)
                <li class=" py-2 sm:py-4 lg:py-8">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                      <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-4">
                            <p class="text-xl font-bold text-gray-800 md:text-2xl">{{ $industry->name }}</p>

                            <div class="">
                                <x-my-nav-link :href="route('admin.industry.show',[ $industry->id ])">
                                    {{ __('詳細') }}
                                </x-my-nav-link>
                                <x-my-nav-link :href="route('admin.industry.edit',[ $industry->id ])">
                                    {{ __('編集') }}
                                </x-my-nav-link>
                                <x-my-delete-link :action="route('admin.industry.destroy', $industry->id)">
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
