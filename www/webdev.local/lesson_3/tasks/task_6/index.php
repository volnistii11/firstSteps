<?php
$arrMenu = array(
    'link_1' => array(
        'href' => '#',
        'other' => 'style="color: red;"',
        'name' => 'Меню_1',
        'parent' => array(
            'link_1.1' => array(
                'href' => '#',
                'other' => 'style="color: green;"',
                'name' => 'Меню_1.1'
            )
        )
    ),
    'link_2' => array(
        'href' => '#',
        'other' => 'style="color: black;"',
        'name' => 'Меню_2'
    ),
    'link_3' => array(
        'href' => '#',
        'other' => 'style="color: orange;"',
        'name' => 'Меню_3',
        'parent' => array(
            'link_3.1' => array(
                'href' => '#',
                'other' => 'style="color: green;"',
                'name' => 'Меню_3.1'
            ),
            'link_3.2' => array(
                'href' => '#',
                'other' => 'style="color: green;"',
                'name' => 'Меню_3.2'
            )
        )
    ),
    'link_4' => array(
        'href' => '#',
        'other' => 'style="color: green;"',
        'name' => 'Меню_4',
        'parent' => array(
            'link_4.1' => array(
                'href' => '#',
                'other' => 'style="color: green;"',
                'name' => 'Меню_4.1',
                'parent' => array(
                    'link_4.1.1' => array(
                        'href' => '#',
                        'other' => 'style="color: green;"',
                        'name' => 'Меню_4.1.1'
                    ),
                    'link_4.2.1' => array(
                        'href' => '#',
                        'other' => 'style="color: green;"',
                        'name' => 'Меню_4.2.2'
                    )
                )
            ),
            'link_4.2' => array(
                'href' => '#',
                'other' => 'style="color: green;"',
                'name' => 'Меню_4.2'
            )
        )
    ),
);

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

echo genMenu($arrMenu);