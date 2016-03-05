<?php

require "steam/vendor/autoload.php";

use Goutte\Client;

$client = new Client();


$crawler = $client->request('GET', 'https://steamcommunity.com/market');
$href = $crawler->filterXpath('//div[@id="popularItemsRows"]/a')->extract(array('href'));

foreach ($href as $link) {
  $crawler = $client->click($link);
  print '<li>' . $link . '<li>';
}

print 'This is a test';
?>
