<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('業界作成') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="{{ route('admin.feature') }}" method="POST">
                @csrf
                <div>
                    <select name="offer_id">
                        @foreach ($offers as $offer )
                            <option value={{$offer->id}}>{{$offer->title}}</option>
                        @endforeach

                        </select>
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
