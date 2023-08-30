<?php



namespace MyProject\Controllers;


use MyProject\View\View;
use MyProject\Models\Users\User;
use MyProject\Exceptions\InvalidArgumentException;

class UsersController
{

    /** @var View */

    private $view;



    public function __construct()
    {

        $this->view = new View(__DIR__ . '/../../../templates');

    }



    public function signUp()
    {

        if (!empty($_POST)) {

            try {

                
                // $user = User::signUp($_POST);
                User::signUp($_POST);

            } catch (InvalidArgumentException $e) {

                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);

                return;

            }

        }



        $this->view->renderHtml('users/signUp.php');

    }

}