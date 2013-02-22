<?php 
$doc = new DOMDocument("1.0","utf-8");
$doc -> formatOutput = true;
$list = $doc ->createElement("list");
$m = $doc ->createElement("m");
$type = $doc ->createAttribute("type");
$typel = $doc ->createTextNode("youku");

$src = $doc ->createAttribute("src");
$source = $doc ->createTextNode("XNDk0OTk4MDgw");

$label = $doc ->createAttribute("label");
$title = $doc ->createTextNode("yy68278045");

$type ->appendChild($typel);
$src ->appendChild($source);
$label ->appendChild($title);

$m ->appendChild($type);
$m ->appendChild($src);
$m ->appendChild($label);

$list ->appendChild($m);
$doc ->appendChild($list);
$doc ->save("self_add.xml");
?>