<?php

namespace App\Controllers;

use App\Models\Article;

class ArticleController
{
    public function __construct()
    {
        // redirect to login page if user is not logged in
        auth()->id || redirect('/login');
    }

    public function index()
    {
        $articles = Article::all();

        return view('articles/index', [
            'articles' => $articles
        ]);
    }

    public function show()
    {
        $article = Article::find($_GET['id']);

        return view('articles/show', [
            'article' => $article
        ]);
    }

    public function create()
    {
        return view('articles/edit');
    }

    public function edit()
    {
        $article = Article::find($_GET['id']);

        return view('articles/edit', [
            'article' => $article
        ]);
    }

    public function store()
    {
        $id = $_POST['id'] ?? null;

        // sanitaize, validate data here..
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'author_id' => auth()->id
        ];

        if (!$id) {
            Article::create($data);
        } else {
            Article::update($id, $data);
        }

        redirect('/articles');
    }

    public function destroy()
    {
        Article::delete($_GET['id']);

        redirect('/articles');
    }
}
