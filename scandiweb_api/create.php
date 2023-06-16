<?php
error_reporting(E_ALL);
ini_set('display_error', 1);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");


include_once('./Database.php');
include_once('./Products.php');

$database = new Database;
$db = $database->connect();

$dvd = new DVD($db, $sku, $name, $price, $size);


$book = new Book($db, $sku, $name, $price, $weight);


$furniture = new Furniture($db, $sku, $name, $price, $dimensions);
$data = json_decode(file_get_contents("php://input"));


if ($_POST["productType"] === "DVD") {

  $params = [
    'sku' => $_POST['sku'],
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'size' => $_POST['size']
  ];
  $dvd->createProduct($params);
  echo json_encode(['message' => 'new DVD added !!!!']);
} else if ($_POST["productType"] === "Book") {
  $params = [
    'sku' => $_POST['sku'],
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'weight' => $_POST['weight']
  ];
  if ($book->createProduct($params)) {
    echo json_encode(['message' => 'new book added !!!!']);

  }
} else if ($_POST["productType"] === "Furniture") {
  $params = [
    'sku' => $_POST['sku'],
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'dimensions' => $_POST['dimensions']
  ];
  if ($furniture->createProduct($params)) {
    echo json_encode(['message' => 'new furniture added !!!!']);

  }
}



if (isset($data)) {
  if ($data->type === "DVD") {
    $params = [
      'sku' => $data->sku,
      'name' => $data->name,
      'price' => $data->price,
      'size' => $data->size
    ];
    if ($dvd->createProduct($params)) {
      echo json_encode(['message' => 'new dvd added']);
    }
  } else if ($data->type === "Book") {
    $params = [
      'sku' => $data->sku,
      'name' => $data->name,
      'price' => $data->price,
      'weight' => $data->weight
    ];
    if ($book->createProduct($params)) {
      echo json_encode(['message' => 'new book added']);
    }
  } else if ($data->type === "Furniture") {
    $params = [
      'sku' => $data->sku,
      'name' => $data->name,
      'price' => $data->price,
      'dimensions' => $data->dimensions
    ];

    if ($furniture->createProduct($params)) {
      echo json_encode(['message' => 'new furniture added']);
    }
  }
}

?>