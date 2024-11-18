<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Loan Language Lines
    |--------------------------------------------------------------------------
    |
    |
    */

    'title' => 'Loans',
    'description' => 'Manage book loans',
    'new' => 'Adding new loan',
    'edit' => 'Editing a loan',
    'empty' => 'There are no book loans\' yet.',
    'book' => 'Book',
    'table' => [
        'id' => 'Code',
        'user' => 'User',
        'user_id' => 'User registration num',
        'user_fullname' => 'User name',
        'user_email' => 'User email',
        'book' => 'Book',
        'book_name' => 'Book name',
        'book_author_name' => 'Book author',
        'book_genre' => 'Book genre',
        'book_register_number' => 'Book registration num',
        'end_date' => 'Return date',
        'status' => [
            'label' => 'Status',
            'returned' => 'Returned',
            'late' => 'Late',
            'not_due_yet' => 'On time',
        ],
        'actions' => 'Actions',
    ],
    'form_error' => [
        'status' => 'The status informed is invalid',
        'book_id' => 'Book not available for loan',
    ],
    'form_required' => [
        'user_id' => 'User is required',
        'book_id' => 'Book is required',
        'end_date' => 'End date is required',
        'end_date_date' => 'End date must be a date',
        'end_date_after' => 'End date must be after today',
        'status' => 'Status is required',
        'status_in' => 'Status must be one of the following: returned, late, empty(in day)',
    ],

];
