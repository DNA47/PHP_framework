<?php
namespace MyProject\Services;



class Db
{

    /** @var \PDO */

    private $pdo;



    public function __construct()
    {
        $dbOptions = (require __DIR__ . '/../../settings.php');
        // var_dump($dbOptions);
        $this->pdo = new \PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            // 'mysql:host=' . $dbOptions['host'] .';port=' . $dbOptions['port']  . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );

        $this->pdo->exec('SET NAMES UTF8');
    }



    public function query(string $sql, $params = []): ?array
    {

        $sth = $this->pdo->prepare($sql);

        $result = $sth->execute($params);



        if (false === $result) {

            return null;

        }



        return $sth->fetchAll();

    }

}