<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Books Language Lines
    |--------------------------------------------------------------------------
    |
    |
    */

    'title' => 'Livros',
    'description' => 'Visualize, crie, edite ou exclua seus livros',
    'new' => 'Adicionando um novo livro',
    'name' => 'Nome',
    'author' => 'Nome do autor',
    'empty' => 'Não há livros cadastrados',
    'create' => 'Criando um novo livro',
    'edit' => 'Editando um livro',
    'table' => [
        'id' => 'Código',
        'name' => 'Nome',
        'author_name' => 'Nome do autor',
        'register_number' => 'Número de registro',
        'genre' => 'Gênero',
    ],
    'form_error' => [
        'register_number' => 'Já existe um livro com este número de registro',
        'genre' => 'O gênero selecionado é inválido',
    ],
    'form_required' => [
        'name' => 'Nome é obrigatório',
        'author_name' => 'Nome do autor é obrigatório',
        'register_number' => 'Número de registro é obrigatório',
        'register_number_regex' => 'Número de registro deve conter apenas letras e números',
        'genre' => 'Gênero é obrigatório',
    ],
    'genres' => [
        'action' => 'Ação',
        'adventure' => 'Aventura',
        'comedy' => 'Comédia',
        'drama' => 'Drama',
        'fantasy' => 'Fantasia',
        'horror' => 'Terror',
        'romance' => 'Romance',
        'other' => 'Outro'
    ],
];
