<?php

class BaseModel
{
    protected $pdo;

    public function __construct()
    {
        $dsn = sprintf(
            "mysql:host=%s;port=%s;dbname=%s;charset=utf8",
            DB_HOST,
            DB_PORT,
            DB_NAME
        );

        $this->pdo = new PDO(
            $dsn,
            DB_USERNAME,
            DB_PASSWORD,
            DB_OPTIONS
        );
    }

    protected function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt;
    }
}
