<?php

namespace App\Controllers;

use App\Models\Film;
use App\Providers\View;
use App\Models\Genre;
use App\Providers\Validator;

class FilmController
{
    public function index()
    {
        $film = new Film;
        $select = $film->select('titre');
        if ($select) {
            return View::render('film/index', ['films' => $select]);
        } else {
            return View::render('error');
        }
    }

    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $film = new Film;
            $selectId = $film->selectId($data['id']);
            if ($selectId) {
                return View::render('film/show', ['film' => $selectId]);
            } else {
                return View::render('error');
            }
        }
        return View::render('error');
    }

    public function create()
    {
        $genre = new Genre;
        $select = $genre->select('nom');
        View::render('film/create', ['genres' => $select]);
    }

    public function store($data = [])
    {
        $validator = new Validator;
        $validator->field('titre', $data['titre'])->min(2)->max(45);
        $validator->field('synopsis', $data['synopsis']);
        $validator->field('date_sortie', $data['date_sortie'], 'Date de sortie')->validateDate($format = 'Y-m-d');
        $validator->field('duree', $data['duree'])->max(20);
        $validator->field('Genre_id', $data['Genre_id'], 'Genre')->required();

        if($validator->isSuccess()){
            $film = new Film;
            $insert = $film->insert($data);

            if ($insert) {
                return View::redirect('film');
            } else {
                return View::render('error');
            }
        }else {
            $errors = $validator->getErrors();
            $genre = new Genre;
            $select = $genre->select('nom');

            return View::render('film/create', ['errors' => $errors, 'inputs' => $data, 'genres' => $select]);  
        }
    }

    public function edit($get = [])
    {
        if (isset($get['id']) && $get['id'] != null) {
            $film = new Film;
            $selectId = $film->selectId($get['id']);
            if ($selectId) {
                $genre = new Genre;
                $select = $genre->select('nom');
                return View::render('film/edit', ['genres' => $select, 'inputs' => $selectId]);
            } else {
                return View::render('error');
            }
        }
        return View::render('error');
    }

    public function update($data = [], $get = [])
    {
        if (isset($get['id']) && $get['id'] != null) {
            $validator = new Validator;
            $validator->field('titre', $data['titre'])->min(2)->max(45);
            $validator->field('synopsis', $data['synopsis']);
            $validator->field('date_sortie', $data['date_sortie'], 'Date de sortie')->validateDate($format = 'Y-m-d');
            $validator->field('duree', $data['duree'])->max(20);
            $validator->field('Genre_id', $data['Genre_id'], 'Genre')->required();

            if ($validator->isSuccess()) {
                $film = new Film;
                $update = $film->update($data, $get['id']);
                if ($update) {
                    return View::redirect('film/show?id=' . $get['id']);
                } else {
                    return View::render('error');
                }
            } else {
                $genre = new Genre;
                $select = $genre->select('nom');
                $errors = $validator->getErrors();
                $inputs = $data;
                return View::render('film/edit', ['errors' => $errors, 'inputs' => $inputs, 'genres' => $select]);
            }
        }
        return View::render('error');
    }

    public function delete($data = [])
    {
        $film = new Film;
        $delete = $film->delete($data['id']);
        if ($delete) {
            return View::redirect('film');
        }
        return View::render('error');
    }
}
