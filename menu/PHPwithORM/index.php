<?php

require_once "vendor/autoload.php";
require_once "doctrine.php";


$menuRepository = $entityManager->getRepository(Menu::class);
$menuElementRepository = $entityManager->getRepository(MenuElement::class);

// Create a menu
$menu = new Menu();
$menu->setName("Main Menu");

// Create menu elements
$home = new MenuElement();
$home->setName("home");
$home->setMenu($menu);

$products = new MenuElement();
$products->setName("products");
$products->setMenu($menu);

$entityManager->persist($menu);
$entityManager->persist($home);
$entityManager->persist($products);
$entityManager->flush();

// Query menu elements
$topLevelMenuElements = $menuElementRepository->findBy(['menu' => $menu, 'parent' => null]);

// Update a menu element
$products->setName("Products");
$entityManager->persist($products);
$entityManager->flush();

// Delete a menu element
$entityManager->remove($home);
$entityManager->flush();
