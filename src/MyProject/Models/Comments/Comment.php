<?php

namespace MyProject\Models\Comments;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Services\Db;

// TODO: не готово, доделать
class Comment extends ActiveRecordEntity
{



    protected $author_id;





    protected $article_id;





    protected $text;




    public function getText(): string
    {

        return $this->text;

    }
    public function getAuthor(): string
    {

        return $this->author_id;

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