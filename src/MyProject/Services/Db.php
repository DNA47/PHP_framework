<?php
namespace MyProject\Services;



class Db
{

    private static $instance;
    private static $instancesCount;

    /** @var \PDO */

    private $pdo;


    public static function getInstance(): self
    {

        if (self::$instance === null) {

            self::$instance = new self();

        }



        return self::$instance;

    }

    private function __construct()
    {

        self::$instancesCount++;



        $dbOptions = (require __DIR__ . '/../../settings.php');


        $this->pdo = new \PDO(

            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],

            $dbOptions['user'],

            $dbOptions['password']

        );

        $this->pdo->exec('SET NAMES UTF8');

    }



    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {

        $sth = $this->pdo->prepare($sql);

        $result = $sth->execute($params);



        if (false === $result) {

            return null;

        }



        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);

    }

}