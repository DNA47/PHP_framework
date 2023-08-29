<?php



namespace MyProject\Controllers;



use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;

use MyProject\View\View;



class ArticlesController
{

    /** @var View */

    private $view;



    public function __construct()
    {

        $this->view = new View(__DIR__ . '/../../../templates');

    }



    public function view(int $articleId): void
    {

        $article = Article::getById($articleId);



        if ($article === null) {

            $this->view->renderHtml('errors/404.php', [], 404);

            return;

        }



        $this->view->renderHtml('articles/view.php', [

            'article' => $article

        ]);

    }



    public function edit(int $articleId): void
    {

        /** @var Article $article */

        $article = Article::getById($articleId);



        if ($article === null) {

            $this->view->renderHtml('errors/404.php', [], 404);

            return;

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



        // var_dump($article);

    }
}