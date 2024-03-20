<?php

class Database
{
  public $connection;

  public function __construct($config, $username = 'root', $password = 'QAZwsx123')
  {
  //Use of prebuilt function intended for building a querie string
  $dsn = 'mysql:' . http_build_query($config, '', ';');

  //Initialise PDO (method __contruct called automatically every time a new db instance created)
  $this->connection = new PDO($dsn, $username, $password, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
  }

  public function query($query)
  {
    // prepare new querie
    $statement = $this->connection->prepare($query);
    $statement->execute();

    return $statement;
  }
}
