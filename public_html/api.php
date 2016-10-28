<?php 
// Reference: https://groups.google.com/forum/#!searchin/fatsecret-platform-api/example$20php%7Csort:relevance/fatsecret-platform-api/5VjuDb-EU_U/z4ZxFKIab-4J
$consumer_key = "e8f1ee8aeb2640d2831349c9e2d63334"; 
$secret_key = "68a6ee2e74034474a625a5dfdf2546d1"; 
//Signature Base String 
//<HTTP Method>&<Request URL>&<Normalized Parameters> 
$base = rawurlencode("GET")."&"; 
$base .= "http%3A%2F%2Fplatform.fatsecret.com%2Frest%2Fserver.api&"; 
$baseb = rawurlencode("GET")."&"; 
$baseb .= "http%3A%2F%2Fplatform.fatsecret.com%2Frest%2Fserver.api&"; 

$searchTerm = $_GET['item1'];
$searchTermb = $_GET['item2'];


//sort params by abc....necessary to build a correct unique signature 
$params = "method=foods.search&"; 
$params .= "oauth_consumer_key=$consumer_key&"; // ur consumer key 
$params .= "oauth_nonce=123&"; 
$params .= "oauth_signature_method=HMAC-SHA1&"; 
$params .= "oauth_timestamp=".time()."&"; 
$params .= "oauth_version=1.0&"; 
$params .= "search_expression=$searchTerm"; 
$params2 = rawurlencode($params); 
$base .= $params2; 

//sort params by abc....necessary to build a correct unique signature 
$paramsb = "method=foods.search&"; 
$paramsb .= "oauth_consumer_key=$consumer_key&"; // ur consumer key 
$paramsb .= "oauth_nonce=123b&"; 
$paramsb .= "oauth_signature_method=HMAC-SHA1&"; 
$paramsb .= "oauth_timestamp=".time()."&"; 
$paramsb .= "oauth_version=1.0&"; 
$paramsb .= "search_expression=$searchTermb"; 
$params2b = rawurlencode($paramsb); 
$baseb .= $params2b; 

//encrypt it!
$sig= base64_encode(hash_hmac('sha1', $base, "$secret_key&", true)); // replace xxx with Consumer Secret 
$sigb= base64_encode(hash_hmac('sha1', $baseb, "$secret_key&", true)); // replace xxx with Consumer Secret

//now get the search results and write them down 
$url = "http://platform.fatsecret.com/rest/server.api?".$params."&oauth_signature=".rawurlencode($sig); 
$urlb = "http://platform.fatsecret.com/rest/server.api?".$paramsb."&oauth_signature=".rawurlencode($sigb); 

//$food_feed = file_get_contents($url); 
list($output,$error,$info) = loadFoods($url); 
echo '<pre>'; 
if($error == 0){ 
    if($info['http_code'] == '200') 
        echo $output; 
    else 
        die('Status INFO : '.$info['http_code']); 
} 
else 
    die('Status ERROR : '.$error); 

list($output,$error,$info) = loadFoods($urlb); 
echo '<pre>'; 
if($error == 0){ 
    if($info['http_code'] == '200') 
        echo $output; 
    else 
        die('Status INFO : '.$info['http_code']); 
} 
else 
    die('Status ERROR : '.$error); 

function loadFoods($url) 
{ 

        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $url); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        $error = curl_error($ch); 

        $info = curl_getinfo($ch); 
        // close curl resource to free up system resources 
        curl_close($ch); 

        return array($output,$error,$info); 

} 
?>