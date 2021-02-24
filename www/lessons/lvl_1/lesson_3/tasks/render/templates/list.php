<?php

function genMenu($arrMenu, $menu ="")
{
$menu .= "<ul>";
    foreach ($arrMenu as $links => $values) {
    $menu .= "<li><a href='{$values['href']}' {$values['other']}>{$values['name']}</a>";
        if (!empty($values['parent'])){
        $menu .= genMenu($values['parent']);
        }
        $menu .= "</li>";
    }
    $menu .= "</ul>";
return $menu;
}

echo genMenu($list);

