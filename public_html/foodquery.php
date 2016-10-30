<?php 

require_once('../lib/fat-secret-php/src/Client.php');
require_once('../lib/fat-secret-php/src/OAuthBase.php');
require_once('../lib/fat-secret-php/src/FatSecretException.php');

$consumer_key = "e8f1ee8aeb2640d2831349c9e2d63334"; 
$secret_key = "68a6ee2e74034474a625a5dfdf2546d1"; 

$searchTerm1 = $_GET['item1'];
$searchTerm2 = $_GET['item2'];

$client = new \Adcuz\FatSecret\Client($consumer_key, $secret_key);
$client->SetMaxResults(1);

$searchResult = $client->SearchFood($searchTerm1, false, false, 1);

echo "<br>ID: ";
echo $searchResult["foods"]["food"]["food_id"];

?>
