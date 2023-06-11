<x-company-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
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
            <li class=" py-2 sm:py-4 lg:py-8">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                  <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-8">
                        <p class="text-xl font-bold text-indigo-500 md:text-2xl">名前</p>
                        <p class="text-xl font-bold text-indigo-500 md:text-2xl">メールアドレス</p>
                        <p class="text-xl font-bold text-indigo-500 md:text-2xl">電話番号</p>
                        <p class="text-xl font-bold text-indigo-500 md:text-2xl">Action</p>
                  </div>
                </div>
              </li>
              <li class=" py-2 sm:py-4 lg:py-8">
                  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                    <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-8">
                          <p class="text-xl font-bold text-indigo-500 md:text-2xl">{{ $adminCompany->name }}</p>
                          <p class="text-xl font-bold text-indigo-500 md:text-2xl">{{ $adminCompany->email }}</p>
                          <p class="text-xl font-bold text-indigo-500 md:text-2xl">{{ $adminCompany->tell }}</p>
                          <p class="text-xl font-bold text-indigo-500 md:text-2xl">アクション</p>
                    </div>
                  </div>
                </li>
                @foreach ( $childCompanies as $company )
                    <li class=" py-2 sm:py-4 lg:py-8">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                      <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-8">
                            <p class="text-xl font-bold text-indigo-500 md:text-2xl">{{ $company->name }}</p>
                            <p class="text-xl font-bold text-indigo-500 md:text-2xl">{{ $company->email }}</p>
                            <p class="text-xl font-bold text-indigo-500 md:text-2xl">{{ $company->tell }}</p>
                            <p class="text-xl font-bold text-indigo-500 md:text-2xl">アクション</p>
                      </div>
                    </div>
                  </li>

                @endforeach
        </ul>

    </div>
</x-company-layout>
