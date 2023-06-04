<x-company-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('応募管理') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xs">
            <div class="bg-white shadow-xl rounded-lg py-3">
                <div class="h-20 bg-gray-500 flex items-center justify-center">
                    <p class="mr-0 text-white text-lg pl-5">{{$offer->title}}</p>
                  </div>
                <div class="photo-wrapper p-2 mt-4">
                    <img class="w-48 h-48 rounded-full mx-auto" src="https://picsum.photos/300/300">
                </div>
                <div class="p-2">
                    <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{$user->name}}</h3>
                    <table class="text-xl my-3">
                        <tbody><tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">応募日時</td>
                            <td class="px-2 py-2">{{$user->created_at}}</td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">メールアドレス</td>
                            <td class="px-2 py-2">{{$user->email}}</td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
    </div>
</x-company-layout>
