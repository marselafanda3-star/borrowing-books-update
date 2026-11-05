<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('books.create') }}" class="underline mt-3">Tambah data</a>
                    <table class="w-full">
                        <thead>
                            <tr class="bg-slate-400">
                                <th class="text-left p-3">No</th>
                                 <th class="text-left p-3">Category_id</th>
                                 <th class="text-left p-3">title</th>
                                 <th class="text-left p-3">author</th>
                                 <th class="text-left p-3">publisher</th>
                                 <th class="text-left p-3">year</th>
                                 <th class="text-left p-3">stock</th>
                                <th class="text-left p-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $b )
                            <tr>
                                <th class="text-left p-3">{{$loop->iteration}}</th>
                                <th class="text-left p-3">{{$b->category?->name?? '-'}}</th>
                                <th class="text-left p-3">{{$b->title }}</th>
                                <th class="text-left p-3">{{$b->author  }}</th>
                                <th class="text-left p-3">{{$b->publisher }}</th>
                                <th class="text-left p-3">{{$b->year  }}</th>
                                <th class="text-left p-3">{{$b->stock  }}</th>
                                <th class="text-left p-3 flex">
                                    <a href="{{ route('books.edit', $b) }}">
                                        <x-primary-button>Edit</x-primary-button>
                                    </a>
                                    <form action="{{ route('books.destroy', $b) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button>Hapus</x-danger-button>
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
