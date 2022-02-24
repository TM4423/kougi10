<html>

<?php
  session_start();
  include('funcs.php');

  $dom = new DOMDocument('1.0', 'UTF-8');
  $html = file_get_contents("https://gigazine.net/");
  // $html = mb_convert_encoding($html, "HTML-ENTITIES", 'auto');
  @$dom->loadHTML($html);
  $xpath = new DOMXpath($dom);
  foreach ($xpath->query("//h2") as $node) {
    echo '<p>';
    echo '<a href="';
    echo $xpath->evaluate('string(.//@href)', $node);
    echo '">';
    echo $xpath->evaluate('string(.//a)', $node);
    echo '</a>';
    echo '</p>';
  }
?>

<?php
  $dom = new DOMDocument('1.0', 'UTF-8');
  $html = file_get_contents("https://www.itmedia.co.jp/news/");
  // $html = mb_convert_encoding($html, "HTML-ENTITIES", 'auto');
  @$dom->loadHTML($html);
  $xpath = new DOMXpath($dom);
  foreach ($xpath->query("//div[@class='colBoxTitle']") as $node) {
    echo '<p>';
    echo '<a href="';
    echo $xpath->evaluate('string(.//@href)', $node);
    echo '">';
    echo $xpath->evaluate('string(.//a)', $node);
    echo '</a>';
    echo '</p>';
  }
?>

<?php
  $dom = new DOMDocument('1.0', 'UTF-8');
  $html = file_get_contents("https://www.bbc.com/news");
  // $html = mb_convert_encoding($html, "HTML-ENTITIES", 'auto');
  @$dom->loadHTML($html);
  $xpath = new DOMXpath($dom);
  foreach ($xpath->query("//div") as $node) {
    echo '<p>';
    echo '<a href="';
    echo $xpath->evaluate('string(.//@href)', $node);
    echo '">';
    echo $xpath->evaluate('string(.//a)', $node);
    echo '</a>';
    echo '</p>';
  }
?>


</html>