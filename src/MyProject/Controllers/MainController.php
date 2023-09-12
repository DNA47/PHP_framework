<?php



namespace MyProject\Controllers;



use MyProject\Models\Articles\Article;
use MyProject\Models\Users\UsersAuthService;
use MyProject\View\View;



class MainController
{

    private $view;

    //  @var User|null 

    private $user;



    public function __construct()
    {

        $this->user = UsersAuthService::getUserByToken();

        $this->view = new View(__DIR__ . '/../../../templates');

        $this->view->setVar('user', $this->user);

    }



    public function main()
    {

        $articles = Article::findAll();

        $this->view->renderHtml('main/main.php', [

            'articles' => $articles,

            'user' => UsersAuthService::getUserByToken()

        ]);

    }

}