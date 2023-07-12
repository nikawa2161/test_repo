<x-company-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('業界作成') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="{{ route('company.offer') }}" method="POST">
                @csrf
                <div>
                    <label for="title">求人タイトル</label>
                    <input type="text" name="title" id="title" required>
                    <label for="content">募集内容</label>
                    <input type="text" name="content" id="content" required>
                    @error('title')
                        <p>{{ $message }}</p>
                    @enderror
                    @error('content')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit">作成</button>
            </form>
        </div>
    </div>
</x-company-layout>
