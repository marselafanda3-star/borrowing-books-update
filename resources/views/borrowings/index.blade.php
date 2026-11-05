<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pinjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('borrowings.create') }}" class="underline mt-3">Tambah data</a>
                    <table class="w-full">
                        <thead>
                            <tr class="bg-slate-400">
                                <th class="text-left p-3">No</th>
                                 <th class="text-left p-3">Student</th>
                                 <th class="text-left p-3">Book</th>
                                 <th class="text-left p-3">Classroom</th>
                                 <th class="text-left p-3">Borrow date</th>
                                 <th class="text-left p-3">Return Date</th>
                                <th class="text-left p-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($borrowings as $b )
                            <tr>
                                <th class="text-left p-3">{{$loop->iteration}}</th>
                                <th class="text-left p-3">{{$b->student_name}}</th>
                                <th class="text-left p-3">{{$b->book?->title }}</th>
                                <th class="text-left p-3">{{$b->classroom }}</th>
                                <th class="text-left p-3">{{$b->borrow_date }}</th>
                                <th class="text-left p-3">{{$b->return_date ?? '-' }}</th>
                                <th class="text-left p-3 flex">
                                    <a href="{{ route('borrowings.edit', $b) }}">
                                        <x-primary-button>Edit</x-primary-button>
                                    </a>
                                    <form action="{{ route('borrowings.returnDate', $b) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <x-primary-button>Kembalikan</x-primary-button>
                                    </form>
                                    <form action="{{ route('borrowings.destroy', $b) }}" method="POST">
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
