<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrowing extends Model
{
    protected $fillable = [
        'student_name',
        'book_id',
        'classroom',
        'borrow_date',
        'return_date',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
