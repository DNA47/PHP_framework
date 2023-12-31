<?php

namespace MyProject\Models\Comments;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Services\Db;
use MyProject\Models\Users\User;
use MyProject\Models\Articles\Article;

class Comment extends ActiveRecordEntity
{



    protected $authorId;





    protected $articleId;





    protected $text;




    public function getText(): string
    {

        return $this->text;

    }
    public function setText(string $value): void
    {

        $this->text = $value;

    }

    public function getAuthor(): User
    {

        return User::getById($this->authorId);

    }

    public function setAuthor(User $author): void
    {

        $this->authorId = $author->getId();

    }
    public function getArticle(): Article
    {

        return Article::getById($this->articleId);

    }

    public function setArticle(Article $article): void
    {

        $this->articleId = $article->getId();

    }


    public static function findAll(): array
    {

        $db = Db::getInstance();

        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);

    }

    public static function findAllByColumn(string $columnName, $value): ?array
    {

        $db = Db::getInstance();

        $result = $db->query(

            'SELECT * FROM `' . static::getTableName() . '` WHERE `' . $columnName . '` = :value;',

            [':value' => $value],

            static::class

        );

        if ($result === []) {

            return null;

        }

        return $result;

    }


    protected static function getTableName(): string
    {

        return 'comments';

    }

    public function edit(string $text): void
    {
        $this->updateText($text);

        $this->save();


    }

    private function updateText(string $text): void
    {

        $this->text = $text;

    }
}