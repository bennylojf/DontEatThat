<?php 

require_once('../lib/fat-secret-php/src/Client.php');
require_once('../lib/fat-secret-php/src/OAuthBase.php');
require_once('../lib/fat-secret-php/src/FatSecretException.php');

$consumer_key = "e8f1ee8aeb2640d2831349c9e2d63334"; 
$secret_key = "68a6ee2e74034474a625a5dfdf2546d1"; 

$searchTerm1 = $_GET['item1'];
$searchTerm2 = $_GET['item2'];
//$searchTerm1 = preg_replace('/\s+/', '%20', $searchTerm1);
//$searchTerm2 = preg_replace('/\s+/', '%20', $searchTerm2);

$client = new \Adcuz\FatSecret\Client($consumer_key, $secret_key);
$client->SetMaxResults(1);

$queryResponseString = $client->SearchFood($searchTerm1, false, false, 1);

$json = json_encode($queryResponseString);

$info = json_decode($json, true);

echo "<br>ID: ";
echo $info["foods"]["food"]["food_id"];

?>
