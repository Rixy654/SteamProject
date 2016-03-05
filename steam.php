<?php

require "steam/vendor/autoload.php";

use Goutte\Client;

$client = new Client();


$crawler = $client->request('GET', 'https://steamcommunity.com/market');
//$href = $crawler->filterXpath('//div[@id="popularItemsRows"]/a')->extract(array('href'));
$href = $crawler->selectLink('Counter-Strike: Global Offensive')->link();
foreach ($href as $link) {
  //$gohere = $link->link();
  $crawler = $client->click($link);
  //print '<li>' . $link . '<li>';
  $name = $crawler->filterXpath('//h1[@id="largeiteminfo_item_name"]')->text();
  print '<li>' . $name . '<li>';
}

print 'This is a test';
?>
