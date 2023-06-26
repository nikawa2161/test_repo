<x-company-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('応募管理') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xs">
            <div class="bg-white shadow-xl rounded-lg py-3">
                <div class="h-20 bg-gray-800 flex items-center justify-center">
                    <p class="mr-0 text-white text-lg pl-5">{{$offer->title}}</p>
                  </div>
                <div class="photo-wrapper p-2 mt-4">
                    <img class="w-48 h-48 rounded-full mx-auto" src="https://picsum.photos/300/300">
                </div>
                <div class="p-2">
                    <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{$user->name}}</h3>
                    <table class="text-xl my-3">
                        <tbody><tr>
                            <td class="px-2 py-2 text-gray-800 font-semibold">応募日時</td>
                            <td class="px-2 py-2">{{$user->created_at}}</td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-800 font-semibold">メールアドレス</td>
                            <td class="px-2 py-2">{{$user->email}}</td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
            <ul class="py-4 mt-4 bg-white">
                @foreach ($messages as $message)
                <li class=" py-2 sm:py-4 lg:py-8">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                        @if ($message->operator == 1)
                            <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-4 w-3/4 ml-auto">
                        @else
                            <div class="flex items-center justify-between rounded-lg bg-gray-100 p-2 sm:flex-row md:p-4 w-3/4">
                        @endif
                        <div class="">
                            <p class="mb-4 text-xl font-bold text-gray-800 md:text-2xl">{{ $message->content }}</p>
                        </div>
                    </div>
                </li>
                @endforeach
                <li class=" py-2 sm:py-4 lg:py-8">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">

                        <form method="post" action="{{ route('message.store',[ $offer->id ]) }}">
                            @csrf
                            <input type="hidden" name="application_id" value="{{ $roomInfo->id }}">
                            <input type="text" name="content" id="content" required>
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                送信する
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</x-company-layout>
