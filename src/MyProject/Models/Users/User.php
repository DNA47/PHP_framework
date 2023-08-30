<?php

namespace MyProject\Models\Users;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{



    protected $nickname;





    protected $email;





    protected $isConfirmed;





    protected $role;





    protected $passwordHash;





    protected $authToken;





    protected $createdAt;



    public function getNickname(): string
    {

        return $this->nickname;

    }



    protected static function getTableName(): string
    {

        return 'users';

    }

    public static function signUp(array $userData): void
    {

        if (empty($userData['nickname'])) {
    
            throw new InvalidArgumentException('Не передан nickname');
    
        }
    
     
    
        if (empty($userData['email'])) {
    
            throw new InvalidArgumentException('Не передан email');
    
        }
    
     
    
        if (empty($userData['password'])) {
    
            throw new InvalidArgumentException('Не передан password');
    
        }
    
    }

}