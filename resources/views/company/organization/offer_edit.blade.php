<x-company-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('求人編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="{{ route('company.offer.update', [$offer->id]) }}" method="POST">
                @csrf
                <div>
                    <label for="title">求人タイトル</label>
                    <input type="text" name="title" id="title" value="{{$offer->title}}" required>
                    <label for="content">募集内容</label>
                    <input type="text" name="content" id="content" value="{{$offer->content}}" required>
                    <label for="feature">特徴</label>
                    <select name="feature_id" class="targetInfo text-gray-800 border-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach ($features as $feature)
                            @if (is_null($offer->feature))
                                <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                            @else
                                <option value="{{ $feature->id }}" @if ($feature->id === $offer->feature->id) selected @endif >{{ $feature->name }}</option>
                            @endif
                        @endforeach
                    </select>
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
