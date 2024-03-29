<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('求人作成') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="{{ route('admin.feature') }}" method="POST">
                @csrf
                <div>
                    <label for="name">特徴名</label>
                    <input type="text" name="name" id="name" required>
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit">作成</button>
            </form>
        </div>
    </div>
</x-admin-layout>
