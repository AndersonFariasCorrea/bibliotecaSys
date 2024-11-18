<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Lending Language Lines
    |--------------------------------------------------------------------------
    |
    |
    */

    'title' => 'Empréstimos',
    'description' => 'Gerencie os empréstimos de livros',
    'new' => 'Adicionando novo empréstimo',
    'edit' => 'Editando empréstimo',
    'empty' => 'Ainda não há empréstimos de livros.',
    'book' => 'Livro',
    'table' => [
        'id' => 'Código',
        'user' => 'Usuário',
        'user_id' => 'N° de cadastro do usuário',
        'user_fullname' => 'Nome do usuário',
        'user_email' => 'Email do usuário',
        'book' => 'Livro',
        'book_name' => 'Nome do livro',
        'book_author_name' => 'Autor do livro',
        'book_genre' => 'Gênero do livro',
        'book_register_number' => 'N° de registro do livro',
        'end_date' => 'Data de devolução',
        'status' => [
            'label' => 'Status',
            'returned' => 'Devolvido',
            'late' => 'Atrasado',
            'not_due_yet' => 'Em dia',
        ],
        'actions' => 'Ações',
    ],
    'form_error' => [
        'status' => 'O status informado é inválido',
        'book_id' => 'Livro não disponível para empréstimo',
    ],
    'form_required' => [
        'user_id' => 'Usuário é obrigatório',
        'book_id' => 'Livro é obrigatório',
        'end_date' => 'Data de termino é obrigatória',
        'end_date_date' => 'Data de término deve ser uma data',
        'end_date_after' => 'Data de término deve ser depois de hoje',
        'status' => 'Status é obrigatório',
        'status_in' => 'Status deve ser um dos seguintes: devolvido, atrasado, vazio(em dia)',
    ],
];
