<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\NotFoundException;

use MyProject\Models\Comments\Comment;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;


class ArticlesController extends AbstractController
{

    public function view(int $articleId): void
    {

        $article = Article::getById($articleId);



        if ($article === null) {

            throw new NotFoundException();

        }

        $allComments = Comment::findAllByColumn("article_id", $article->getId()); 

        if($allComments === null) {
            $allComments = [];
        }


        $this->view->renderHtml('articles/view.php', [

            'article' => $article,
            'comments' => $allComments,

        ]);

    }



    public function edit(int $articleId): void
    {

        /** @var Article $article */

        $article = Article::getById($articleId);



        if ($article === null) {

            throw new NotFoundException();

        }



        // $article->setName('Новое название статьи');

        // $article->setText('Новый текст статьи');



        // $article->save();


        $this->view->renderHtml('articles/edit.php', [

            'article' => $article

        ]);

    }


    public function updateArticle(): void
    {

        if (empty($_POST['id']) || empty($_POST['name'])) {

            echo ("Error! You have missed ID or Name");
            return;
        }


        $article = Article::getById($_POST['id']);

        $article->setName($_POST['name']);

        $article->setText($_POST['text']);



        $article->save();


        echo ('Success!');

    }

    public function add(): void
    {

        $author = User::getById(1);



        $article = new Article();

        $article->setAuthor($author);

        $article->setName('Новое название статьи');

        $article->setText('Новый текст статьи');



        $article->save();



        var_dump($article);

    }

    // Принимаем пост-запросы для добавления комментария в БД
    public function comments(): void 
    {
        // $this->view->renderHtml('articles/comment.php');
        // TODO: принимать пост-запрос, вытаскивать из него данные и отправлять запрос в базу (на сохранение комментария)

        
        echo('We will take your comment');
    }
   
    // Принимаем гет-запросы для вывода формы редактирования комментария
    // Принимаем пост-запросы для редактирования комментария в БД
    public function updateComments(): void 
    {
        // TODO: взять шаблон редактирования статьи и использовать в качестве заготовки для редактирования комментария
        echo('We will UPDATE comment');

        // TODO: сделать схоранение отредактированного комментария если отрпвлен пост запрос, а не гет
    }
}