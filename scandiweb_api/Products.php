<?php

abstract class Product
{
  public $id;
  public $sku;
  public $name;
  public $price;

  public $params;

  public function __construct($sku, $name, $price)
  {

    $this->sku = $sku;
    $this->name = $name;
    $this->price = $price;
  }

  abstract public function getProducts();
  abstract public function createProduct($params);

}


class DVD extends Product
{
  public $size;

  private $conn;
  public function __construct($db, $sku, $name, $price, $size)
  {
    $this->conn = $db;
    parent::__construct($sku, $name, $price);
    $this->size = $size;
  }
  public function getProducts()
  {
    $query = 'SELECT * FROM product JOIN dvd_product WHERE product.id = dvd_product.id_product';

    $product = $this->conn->prepare($query);
    $product->execute();
    return $product;
  }

  public function createProduct($params)
  {
    try {
      $this->sku = $params['sku'];
      $this->name = $params['name'];
      $this->price = $params['price'];
      $this->size = $params['size'];

      $query = 'BEGIN;
                INSERT INTO product 
                SET 
                sku = :sku,
                name = :name,
                price = :price ;
              
                INSERT INTO dvd_product
                SET
                id_product = LAST_INSERT_ID(),
                size = :size;
                COMMIT;
      ';

      $product = $this->conn->prepare($query);

      $product->bindValue('sku', $this->sku);
      $product->bindValue('name', $this->name);
      $product->bindValue('price', $this->price);
      $product->bindValue('size', $this->size);



      if ($product->execute()) {
        return true;
      } else {
        return false;
      }



    } catch (PDOExeption $e) {
      echo $e->getMessage();
    }
  }





}






class Book extends Product
{
  public $weight;
  private $conn;
  public function __construct($db, $sku, $name, $price, $weight)
  {
    $this->conn = $db;
    parent::__construct($sku, $name, $price);
    $this->weight = $weight;
  }
  public function getProducts()
  {
    $query = 'SELECT * FROM product JOIN book_product WHERE product.id = book_product.id_product';

    $product = $this->conn->prepare($query);
    $product->execute();
    return $product;
  }

  public function createProduct($params)
  {
    try {
      $this->sku = $params['sku'];
      $this->name = $params['name'];
      $this->price = $params['price'];
      $this->weight = $params['weight'];

      $query = 'BEGIN;
                INSERT INTO product 
                SET 
                sku = :sku,
                name = :name,
                price = :price ;
              
                INSERT INTO book_product
                SET
                id_product = LAST_INSERT_ID(),
                weight = :weight;
                COMMIT;
      ';

      $product = $this->conn->prepare($query);

      $product->bindValue('sku', $this->sku);
      $product->bindValue('name', $this->name);
      $product->bindValue('price', $this->price);
      $product->bindValue('weight', $this->weight);



      if ($product->execute()) {
        return true;
      } else {
        return false;
      }



    } catch (PDOExeption $e) {
      echo $e->getMessage();
    }

  }




}

class Furniture extends Product
{
  public $dimensions;
  private $conn;

  public function __construct($db, $sku, $name, $price, $dimensions)
  {
    $this->conn = $db;
    parent::__construct($sku, $name, $price);
    $this->dimensions = $dimensions;
  }
  public function getProducts()
  {
    $query = 'SELECT * FROM product JOIN furniture_product WHERE product.id = furniture_product.id_product';

    $product = $this->conn->prepare($query);
    $product->execute();
    return $product;
  }


  public function createProduct($params)
  {
    try {
      $this->sku = $params['sku'];
      $this->name = $params['name'];
      $this->price = $params['price'];
      $this->dimensions = $params['dimensions'];

      $query = 'BEGIN;
                INSERT INTO product 
                SET 
                sku = :sku,
                name = :name,
                price = :price ;
              
                INSERT INTO furniture_product
                SET
                id_product = LAST_INSERT_ID(),
                dimensions = :dimensions;
                COMMIT;
      ';

      $product = $this->conn->prepare($query);

      $product->bindValue('sku', $this->sku);
      $product->bindValue('name', $this->name);
      $product->bindValue('price', $this->price);
      $product->bindValue('dimensions', $this->dimensions);



      if ($product->execute()) {
        return true;
      } else {
        return false;
      }
    } catch (PDOExeption $e) {
      echo $e->getMessage();
    }
  }




}

class Delete
{
  private $id;
  private $conn;

  public function __construct($db)
  {

    $this->conn = $db;

  }


  public function deleteProduct($id)
  {
    try {
      $this->id = $id;

      $query = 'DELETE FROM product WHERE id = :id';

      $product = $this->conn->prepare($query);

      $product->bindValue('id', $this->id);

      if ($product->execute()) {
        return true;
      } else {
        return false;
      }

    } catch (PDOExeption $e) {
      echo $e->getMessage();
    }
  }

}

?>