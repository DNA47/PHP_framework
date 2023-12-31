<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\NotFoundException;

use MyProject\Models\Comments\Comment;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Models\Users\UsersAuthService;


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




    }

    // Принимаем пост-запросы для добавления комментария в БД
    public function comments(int $articleId): void 
    {
        $author = UsersAuthService::getUserByToken();
        $article = Article::getById($articleId);
    
        
        if (!empty($_POST['commentId'])) {
            $comment = Comment::getById($_POST['commentId']);
        } else {
            $comment = new Comment();
        }

        if (empty($_POST['text'])) {
            echo ("Ошибка! Вы забыли добавить текст!");
            return;
        }

        if (!$author){
            echo ("Ошибка! Я не могу понять, кто автор комментария");
            return;
        }

        if (!$article) {
            echo ("Ошибка! Я не могу понять, в какую статью добавить этот комментарий");
            return;
        }



       

        $comment->setAuthor($author);

        $comment->setArticle($article);

        $comment->setText($_POST['text']);

        $response = $comment->save();
 
        if($response === 1) {
            // if update
            $commentID = $_POST['commentId'];
        } else {
            $commentID = $response;
        }


        header("Location:  /articles/".$article->getId()."#comment-".$commentID);
        exit();
    }
   
    // Принимаем гет-запросы для вывода формы редактирования комментария
    // Принимаем пост-запросы для редактирования комментария в БД
    public function updateComments(int $articleId, int $commentId): void 
    {
        $user = UsersAuthService::getUserByToken();
        $article = Article::getById($articleId);
        $comment = Comment::getById($commentId);
        $commentAuthor = $comment->getAuthor();
        
        if($user->getId() !==  $commentAuthor->getId()) {
            echo('Вы пытаетесь отредактировать чужой комментарий.');
            return;
        }


        $this->view->renderHtml('comments/editComment.php', [
            'author' => $commentAuthor,
            'article' => $article,
            'comment' => $comment,
        ]);
       
    }
}