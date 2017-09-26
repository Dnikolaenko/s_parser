<?php

namespace App;

class Database {

  public $db_parts = 50; // parts for loading

  private $collection; // object mongodb

  /**
  * Create new MongoDB object
  * @param string db_name;
  * @param string collection_name
  */
  public function __construct($name, $coll) {
    $this->collection = (new \MongoDB\Client)->{$name}->{$coll};
  }

  /**
  * Insert items to database
  * @param array items
  * @return array
  */
  public function insert($items) {
    return $this->collection->insertMany($items);
  }
}

?>
