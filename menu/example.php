<?php

require_once "menu.php";

// Example usage:
$menu = new Menu();

$menu->createMenuElement('home', null, 1);
$menu->createMenuElement('products', null, 2);
$menu->createMenuElement('home appliances', 2, 1);
$menu->createMenuElement('TV', 3, 1);
$menu->createMenuElement('Washing machine', 3, 2);
$menu->createMenuElement('Refrigerator', 3, 3);
$menu->createMenuElement('electronics', 2, 3);
$menu->createMenuElement('mobiles', 6, 1);
$menu->createMenuElement('tablet', 6, 2);
$menu->createMenuElement('PC', 6, 3);
$menu->createMenuElement('laptop', 6, 4);
$menu->createMenuElement('departments', null, 3);
$menu->createMenuElement('sales', 10, 1);
$menu->createMenuElement('servicing', 10, 2);
$menu->createMenuElement('management', 10, 3);
$menu->createMenuElement('contact', null, 4);


var_dump($menu->getWholeMenu());
var_dump($menu->getMenuElements(['parentId' => null])); // Read top-level menu items
var_dump($menu->getMenuElements(['parentId' => 2])); // Read sub-menu items under 'products'

$menu->updateMenuElement(2, 'Products', null, 2); // Update 'products' menu item
var_dump($menu->getMenuElements(['parentId' => null]));

$menu->deleteMenuElement(4); // Delete 'electronics' menu item
var_dump($menu->getMenuElements(['parentId' => 2]));
