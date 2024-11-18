<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author_name',
        'register_number',
        'genre'
    ];

    public static function getGenres(): array
    {
        return [
            ['value' => 'action', 'name' => __('book.genres.action')],
            ['value' => 'adventure', 'name' => __('book.genres.adventure')],
            ['value' => 'comedy', 'name' => __('book.genres.comedy')],
            ['value' => 'drama', 'name' => __('book.genres.drama')],
            ['value' => 'fantasy', 'name' => __('book.genres.fantasy')],
            ['value' => 'horror', 'name' => __('book.genres.horror')],
            ['value' => 'romance', 'name' => __('book.genres.romance')],
            ['value' => 'other', 'name' => __('book.genres.other')],
        ];
    }

    public static function getGenreValue(string $genre)
    {
        $genres = self::getGenres();
        $genre = array_filter($genres, fn($g) => strtolower($g['name']) === strtolower($genre));

        if ($genre) return array_values($genre)[0]['value'];
        else return false;
    }

    public static function validateGenre(string $genre): bool
    {
        $genres = array_column(self::getGenres(), 'value');
        return in_array($genre, $genres);
    }

    public static function createBook($data)
    {
        if (self::diffBookWithRegisterNumberExists($data['register_number'])) {
            return redirect()->back()->withErrors([
                'register_number' => __('book.form_error.register_number')
            ]);
        }

        if (! self::validateGenre($data['genre'])) {
            return redirect()->back()->withErrors([
                'genre' => __('book.form_error.genre')
            ]);
        }

        $book = new self;
        $book->name = $data['name'];
        $book->author_name = $data['author_name'];
        $book->register_number = $data['register_number'];
        $book->genre = $data['genre'];

        $book->save();

        return redirect()->route('book.index');
    }

    private static function diffBookWithRegisterNumberExists(string $registerNumber, int $id = null): bool
    {
        $book = self::where('register_number', $registerNumber)->get()->first();
        return $id ? $book && $book->id !== $id : $book && $book->count();
    }

    public static function updateBook($data)
    {
        $book = self::findOrFail($data['id']);

        if (self::diffBookWithRegisterNumberExists($data['register_number'], $book->id)) {
            return redirect()->back()->withErrors([
                'register_number' => __('book.form_error.register_number')
            ]);
        }

        if (! self::validateGenre($book['genre'])) {
            return redirect()->back()->withErrors([
                'genre' => __('book.form_error.genre')
            ]);
        }

        $book->name = $data['name'];
        $book->author_name = $data['author_name'];
        $book->register_number = $data['register_number'];
        $book->genre = $data['genre'];

        $book->save();

        return redirect()->route('book.index');
    }
}
