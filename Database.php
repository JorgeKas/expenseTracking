<?php

class Database
{
  public $connection;

  public function __construct()
  {
    //Initialise PDO (method __contruct called automatically every time a new db instance created)
    $dsn = "mysql:host=127.0.0.1;dbname=track_expense;port=3306;user=root;password=QAZwsx123;charset=utf8mb4";
    $this->connection = new PDO($dsn);
  }


  public function query($query)
  {
    // prepare new querie
    $statement = $this->connection->prepare($query);
    $statement->execute();

    return $statement;
  }
}
