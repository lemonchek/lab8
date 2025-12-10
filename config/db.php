<?php 

function getDbConnection(): mysqli 
{
    static $connection = null;

    if ($connection === null) {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'blog_mvc';

        $connection = new mysqli($host, $user, $password, $dbname);

        if ($connection->connect_error) {
            die('Помилка підключення до БД: ' . $connection->connect_error);
        }

        $connection->set_charset('utf8mb4');
    }

    return $connection;
}
