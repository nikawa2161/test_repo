<x-company-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('管理者ダッシュボード') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="bg-white py-6 sm:py-8 lg:py-12">
                        <div class="mx-auto max-w-screen-xl px-4 md:px-8">
                          <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-2 xl:grid-cols-2 xl:gap-8">
                            <!-- 企業 - start -->
                            <div class="flex flex-col items-center overflow-hidden rounded-lg border md:flex-row">
                              <a href="#" class="group relative block h-48 w-full shrink-0 self-start overflow-hidden bg-gray-100 md:h-full md:w-32 lg:w-48">
                                <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                              </a>

                              <div class="flex flex-col gap-2 p-4 lg:p-6">
                                <span class="text-sm text-gray-400">company</span>

                                <h2 class="text-xl font-bold text-gray-800">
                                  <a href="#" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">企業名</a>
                                </h2>

                                <p class="text-gray-800">{{$company->company_name}}</p>

                                <div>
                                  <a href="#" class="font-semibold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">Read more</a>
                                </div>
                              </div>
                            </div>
                            <!-- 企業 - end -->

                            <!-- 業界 - start -->
                            <div class="flex flex-col items-center overflow-hidden rounded-lg border md:flex-row">
                              <a href="#" class="group relative block h-48 w-full shrink-0 self-start overflow-hidden bg-gray-100 md:h-full md:w-32 lg:w-48">
                                <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Lorenzo Herrera" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                              </a>

                              <div class="flex flex-col gap-2 p-4 lg:p-6">
                                <span class="text-sm text-gray-400">industry</span>

                                <h2 class="text-xl font-bold text-gray-800">
                                  <a href="#" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">業界</a>
                                </h2>

                                <p class="text-gray-800">{{ $company->industry->name }}</p>

                                <div>
                                  <a href="#" class="font-semibold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">Read more</a>
                                </div>
                              </div>
                            </div>
                            <!-- 業界 - end -->

                            <!-- 電話番号 - start -->
                            <div class="flex flex-col items-center overflow-hidden rounded-lg border md:flex-row">
                              <a href="#" class="group relative block h-48 w-full shrink-0 self-start overflow-hidden bg-gray-100 md:h-full md:w-32 lg:w-48">
                                <img src="https://images.unsplash.com/photo-1542759564-7ccbb6ac450a?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Magicle" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                              </a>

                              <div class="flex flex-col gap-2 p-4 lg:p-6">
                                <span class="text-sm text-gray-400">TEL</span>

                                <h2 class="text-xl font-bold text-gray-800">
                                  <a href="#" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">電話番号</a>
                                </h2>

                                <p class="text-gray-800">{{ $company->tell }}</p>

                                <div>
                                  <a href="#" class="font-semibold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">Read more</a>
                                </div>
                              </div>
                            </div>
                            <!-- 電話番号 - end -->

                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-company-layout>
