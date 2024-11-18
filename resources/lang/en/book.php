<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Books Language Lines
    |--------------------------------------------------------------------------
    |
    |
    */

    'title' => 'Books',
    'description' => 'View, create, edit or delete your books',
    'new' => 'Adding a new book',
    'empty' => 'There are no books registered',
    'create' => 'Creating a new book',
    'edit' => 'Editing a book',
    'table' => [
        'id' => 'Code',
        'name' => 'Name',
        'author_name' => 'Author name',
        'register_number' => 'Register number',
        'genre' => 'Genre',
    ],
    'form_error' => [
        'register_number' => 'There\'s already a book with this register number',
        'genre' => 'The genre informed is invalid',
    ],
    'form_required' => [
        'name' => 'Name is required',
        'author_name' => 'Author name is required',
        'register_number' => 'Register number is required',
        'register_number_regex' => 'Register number must contain only letters and numbers',
        'genre' => 'Genre is required',
    ],
    'genres' => [
        'action' => 'Action',
        'adventure' => 'Adventure',
        'comedy' => 'Comedy',
        'drama' => 'Drama',
        'fantasy' => 'Fantasy',
        'horror' => 'Horror',
        'romance' => 'Romance',
        'other' => 'Other'
    ],
];
