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
                    <form action="{{ route('books.store') }}" method="POST" >
                        @csrf
                        <div>
                            <x-input-label for="title" :value="__('title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" 
                            :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="category_id" :value="__('category')" />
                            <select name="category_id" id="category_id">
                                <option value="" disabled selected>Choose Option</option>
                                @foreach ($categories as $c )
                                <option value="{{ $c->id }}" @selected(old('category_id') == $c->id)>
                                    {{ $c->name }}
                                </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>
                         <div>
                            <x-input-label for="author" :value="__('author')" />
                            <x-text-input id="author" class="block mt-1 w-full" type="text" name="author" 
                            :value="old('author')" required autofocus autocomplete="author" />
                            <x-input-error :messages="$errors->get('author')" class="mt-2" />
                        </div>
                         <div>
                            <x-input-label for="publisher" :value="__('publisher')" />
                            <x-text-input id="publisher" class="block mt-1 w-full" type="text" name="publisher" 
                            :value="old('publisher')" required autofocus autocomplete="publisher" />
                            <x-input-error :messages="$errors->get('publisher')" class="mt-2" />
                        </div>
                         <div>
                            <x-input-label for="year" :value="__('year')" />
                            <x-text-input id="year" class="block mt-1 w-full" type="text" name="year" 
                            :value="old('year')" min="1990" max="{{ date('Y')}}" />
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                        </div>
                         <div>
                            <x-input-label for="stock" :value="__('stock')" />
                            <x-text-input id="stock" class="block mt-1 w-full" type="text" name="stock" 
                            :value="old('stock')" required autofocus autocomplete="stock" />
                            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                        </div>
                        <x-primary-button>Simpan</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
