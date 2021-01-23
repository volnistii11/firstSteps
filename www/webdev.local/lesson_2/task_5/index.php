<?php

$content = renderTemplate('about');
$menu = renderTemplate('menu');

echo renderTemplate('layout', $menu, $content);

function renderTemplate($page, $menu ="", $content = ""){
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}