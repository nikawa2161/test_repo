<x-company-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('応募管理') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex justify-end">
            <x-my-nav-link :href="route('company.account.create')">
                {{ __('アカウント作成') }}
            </x-my-nav-link>
        </div>
        <ul class="py-4 mt-4 bg-white">
            <li class=" py-2 sm:py-4 lg:py-4">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-4">
                  <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-4">
                        <p class="text-xl font-bold text-gray-800 ">名前</p>
                        <p class="text-xl font-bold text-gray-800 ">メールアドレス</p>
                        <p class="text-xl font-bold text-gray-800 ">Action</p>
                  </div>
                </div>
              </li>
                @foreach ( $accounts as $account )
                    <li class=" py-2 sm:py-4 lg:py-4">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-4">
                      <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-4">
                            <p class="text-xl font-bold text-gray-800 ">{{ $account->name }}</p>
                            <p class="text-xl font-bold text-gray-800 ">{{ $account->email }}</p>
                            <p class="text-xl font-bold text-gray-800 ">アクション</p>
                      </div>
                    </div>
                  </li>

                @endforeach
        </ul>

    </div>
</x-company-layout>
