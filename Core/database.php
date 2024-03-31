<?php

class Database
{
  public $connection;
  public $statement;

  public function __construct($config, $username = 'root', $password = 'QAZwsx123')
  {
  //Use of prebuilt function intended for building a querie string
  $dsn = 'mysql:' . http_build_query($config, '', ';');

  //Initialise PDO (method __contruct called automatically every time a new db instance created)
  $this->connection = new PDO($dsn, $username, $password, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
  }

  public function query($query, $params = [])
  {
    // prepare new querie
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($params);

    return $this;
  }

  public function get() 
  {
    return $this->statement->fetchAll();
  }

  public function find() 
  {
    return $this->statement->fetch();
  }

  public function findOrFail()
  {
    $result = $this->find();

    if (! $result) {
      abort();
    }
    return $result;
  }
}
