<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Helpers\Useful;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'end_date',
        'status',
    ];

    public static function createLoan(array $data)
    {
        if (! self::verifyBookAvailability($data['book_id'])) {
            return redirect()->back()->withErrors([
                'book_id' => __('loan.form_error.book_id')
            ]);
        }

        $loan = new Loan();
        $loan->user_id = $data['user_id'];
        $loan->book_id = $data['book_id'];
        $loan->end_date = $data['end_date'];
        $loan->save();

        return redirect()->route('loan.index');
    }

    public static function verifyBookAvailability(int $bookId)
    {
        $book = Book::findOrFail($bookId);
        $loan = Loan::where('book_id', $book->id)
            ->whereIn('status', ['late', 'not_due_yet'])
            ->first();

        return $loan ? false : true;
    }

    public static function getLoansByTerm(string $term)
    {
        $genre = Book::getGenreValue($term) ?? false;
        if ($genre) $term = $genre;

        return Loan::join('users', 'loans.user_id', '=', 'users.id')
            ->join('books', 'loans.book_id', '=', 'books.id')
            ->where(function ($query) use ($term) {
                $query->where('users.fullname', 'like', '%' . $term . '%')
                    ->orWhere('books.name', 'like', '%' . $term . '%')
                    ->orWhere('books.genre', 'like', '%' . $term . '%')
                    ->orWhere('books.author_name', 'like', '%' . $term . '%')
                    ->orWhere('loans.id', 'like', '%' . $term . '%');
            })->select(
                'loans.*',
                'users.fullname as user_fullname', 'users.email as user_email',
                'books.name as book_name', 'books.author_name as book_author_name',
                'books.genre as book_genre', 'books.register_number as book_register_number'
            )->orderBy('loans.id', 'desc')->get();
    }

    public static function getLoanById(int $id)
    {
        return Loan::join('users', 'loans.user_id', '=', 'users.id')
            ->join('books', 'loans.book_id', '=', 'books.id')
            ->where('loans.id', $id)
            ->select(
                'loans.*',
                'users.fullname as user_fullname', 'users.email as user_email',
                'books.name as book_name', 'books.author_name as book_author_name',
                'books.genre as book_genre', 'books.register_number as book_register_number'
            )->first();
    }

    public static function getStatuses()
    {
        return [
            ['value' => 'returned', 'name' => __('loan.table.status.returned')],
            ['value' => 'late', 'name' => __('loan.table.status.late')],
            ['value' => 'not_due_yet', 'name' => __('loan.table.status.not_due_yet')],
        ];
    }

    public static function updateLoan($data)
    {
        $loan = Loan::findOrFail($data['id']);
        $loan->status = $data['status'];
        $loan->save();

        return redirect()->route('loan.index');
    }
}
