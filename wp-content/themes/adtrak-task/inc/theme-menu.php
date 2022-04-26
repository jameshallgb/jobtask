<?php

function nwd_get_menu( $location, $args = [] ) {

$locations = get_nav_menu_locations();
$object = wp_get_nav_menu_object( $locations[$location] );
$array_menu = wp_get_nav_menu_items( $object->name, $args );

$menu = array();
foreach ($array_menu as $m) {
    if (empty($m->menu_item_parent)) {
        $menu[$m->ID] = array();
        $menu[$m->ID]['ID']          =   $m->ID;
        $menu[$m->ID]['title']       =   $m->title;
        $menu[$m->ID]['url']         =   $m->url;
        $menu[$m->ID]['children']    =   array();
    }
}
$submenu = array();
foreach ($array_menu as $m) {
    if ($m->menu_item_parent) {
        $submenu[$m->ID] = array();
        $submenu[$m->ID]['ID']       =   $m->ID;
        $submenu[$m->ID]['title']    =   $m->title;
        $submenu[$m->ID]['url']      =   $m->url;
        $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
    }
}
return $menu;
}
