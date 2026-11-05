<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowings = Borrowing::with('book')->get();

        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::where('stock', '>', 0)->get();

        return view('borrowings.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string',
            'book_id' => 'required|exists:books,id',
            'classroom' => 'required|string',
        ]);

        $book = Book::findOrFail($validated['book_id']);
        Borrowing::create([
            'student_name' => $validated['student_name'],
            'book_id' => $validated['book_id'],
            'classroom' => $validated['classroom'],
            'borrow_date' => now()->toDateString(),
            'return_date' => null,
        ]);
        $book->decrement('stock');

        return redirect()->route('borrowings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrowing $borrowing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrowing $borrowing)
    {
        $books = Book::where('stock', '>', 0)->get();

        return view('borrowings.edit', compact('books', 'borrowing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        $validated = $request->validate([
            'student_name' => 'required|string',
            'book_id' => 'required|exists:books,id',
            'classroom' => 'required|string',
        ]);

        $book = Book::findOrFail($validated['book_id']);
        $borrowing->update([
            'student_name' => $validated['student_name'],
            'book_id' => $validated['book_id'],
            'classroom' => $validated['classroom'],
            'borrow_date' => now()->toDateString(),
            'return_date' => null,
        ]);
        $book->decrement('stock');

        return redirect()->route('borrowings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();

        return redirect()->route('borrowings.index');
    }

    public function returnBook(Borrowing $borrowing)
    {
        if ($borrowing->return_date === null) {
            $borrowing->update([
                'return_date' => now()->toDateString(),
            ]);

            $borrowing->book?->increment('stock');
        }

        return redirect()->route('borrowings.index');
    }
}
