<?php
error_reporting(E_ALL);
ini_set('display_error', 1);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");


include_once('./Database.php');
include_once('./Products.php');

$database = new Database;
$db = $database->connect();

$dvd = new DVD($db, $sku, $name, $price, $size);
$book = new Book($db, $sku, $name, $price, $weight);
$furniture = new Furniture($db, $sku, $name, $price, $dimensions);

$dataDvd = $dvd->getProducts();
$dataBook = $book->getProducts();
$dataFurniture = $furniture->getProducts();



if ($dataDvd->rowCount()) {
  $dvds = [];
  while ($row = $dataDvd->fetch(PDO::FETCH_OBJ)) {
    $dvds[] = [
      'id' => $row->id_product,
      'sku' => $row->sku,
      'name' => $row->name,
      'price' => $row->price,
      'size' => $row->size

    ];
  }


}
if ($dataBook->rowCount()) {
  $books = [];
  while ($row = $dataBook->fetch(PDO::FETCH_OBJ)) {
    $books[] = [
      'id' => $row->id_product,
      'sku' => $row->sku,
      'name' => $row->name,
      'price' => $row->price,
      'weight' => $row->weight

    ];
  }


}


if ($dataFurniture->rowCount()) {
  $furnitures = [];
  while ($row = $dataFurniture->fetch(PDO::FETCH_OBJ)) {
    $furnitures[] = [
      'id' => $row->id_product,
      'sku' => $row->sku,
      'name' => $row->name,
      'price' => $row->price,
      'dimensions' => $row->dimensions
    ];
  }


}


echo json_encode([$dvds, $books, $furnitures]);


?>