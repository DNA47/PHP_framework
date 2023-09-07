<?php



namespace MyProject\Controllers;


use MyProject\View\View;
use MyProject\Models\Users\User;
use MyProject\Models\Users\UserActivationService;
use MyProject\Services\EmailSender;
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

                $user = User::signUp($_POST);

            } catch (InvalidArgumentException $e) {

                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);

                return;

            }



            if ($user instanceof User) {

                $code = UserActivationService::createActivationCode($user);

                EmailSender::send($user, 'Активация', 'userActivation.php', [

                    'userId' => $user->getId(),

                    'code' => $code

                ]);



                $this->view->renderHtml('users/signUpSuccessful.php');

                return;

            }

        }



        $this->view->renderHtml('users/signUp.php');

    }

    public function activate(int $userId, string $activationCode)
    {

        $user = User::getById($userId);

        $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);

        if ($isCodeValid) {

            $user->activate();

            if(true) {
                UserActivationService::deleteActivationCode($user);
                echo 'User activated. We can delete code from DB';
            } 
            else 
            {
                echo 'Something going wrong';
            }

            // echo 'OK!';

        } 
        else 
        {
            echo 'Your activation code is not valid. Возможно вы уже активировали вашу учетную запись.';
        }

    }
}