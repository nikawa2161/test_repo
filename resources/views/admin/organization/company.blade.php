<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('企業一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <ul class="py-4 mt-4 bg-white">
            @foreach ($companies as $i => $company)
                <li class=" py-2 sm:py-4 lg:py-8">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                      <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-8">
                        <div class="">
                            <p class="mb-4 text-xl font-bold text-indigo-500 md:text-2xl"><span class="text-blue-500">{{ $i + 1 }}></span>企業名：{{ $company->name }}</p>
                        </div>
                            <div class="">
                                <x-my-nav-link :href="route('admin.company.show',[ $company->id ])">
                                    {{ __('詳細') }}
                                </x-my-nav-link>
                                <x-my-delete-link :action="route('admin.company.destroy', $company->id)">
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
