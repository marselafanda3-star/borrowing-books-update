<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('borrowings.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="student_name" :value="__('Student Name')" />
                            <x-text-input id="student_name" class="block mt-1 w-full" type="text" name="student_name"
                                :value="old('student_name')" required autofocus autocomplete="student_name" />
                            <x-input-error :messages="$errors->get('student_name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="book_id" :value="__('Book')" />
                            <select name="book_id" id="book_id">
                                <option value="" disabled selected>Choose Option</option>
                                @foreach ($books as $b)
                                    <option value="{{ $b->id }}" @selected(old('book_id') == $b->id)>
                                        {{ $b->title }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('book_id')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="classroom" :value="__('classroom')" />
                            <x-text-input id="classroom" class="block mt-1 w-full" type="text" name="classroom"
                                :value="old('classroom')" required autofocus autocomplete="classroom" />
                            <x-input-error :messages="$errors->get('classroom')" class="mt-2" />
                        </div>
                        <x-primary-button>Simpan</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
