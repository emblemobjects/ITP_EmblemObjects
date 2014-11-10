<?php 

require_once 'TwitterApi.php';

// https://github.com/skaterdav85/twitter-library
$twitterSearch = new Tang\TwitterRestApi\TwitterApi([
  'api_key' => 'kce44m40sezTJxTwk7C7j36ww',
  'api_secret' => 'hvUrDc3oqBnMmoGoHHppKTlON9XSoEk5Vw0GHXRR3yIWcpk03i'
]);

$json = $twitterSearch->authenticate()->get('search/tweets', [
  'q' => 'cats'
]);


echo '<hr/>'.$twitterSearch->getBearerToken();
echo $json;
echo date('d/m/Y == H:i:s');

//2lZ7adIQ10SuFYiZHSD4Dw
//H5loIfdbEzDZnD7bhAkodmAZJd0YabymXvadP4ngOkQ