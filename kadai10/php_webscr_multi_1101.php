<html>
<?php
  $dom = new DOMDocument('1.0', 'UTF-8');
  $html = file_get_contents("https://b.hatena.ne.jp/hobonichi1101/");
  $html = mb_convert_encoding($html, "HTML-ENTITIES", 'auto');
  @$dom->loadHTML($html);
  $xpath = new DOMXpath($dom);
  foreach ($xpath->query("//li[@class='bookmark-item js-user-bookmark-item']") as $node) {
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