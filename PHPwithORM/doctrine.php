<?php

require_once "vendor/autoload.php"; // Include Composer's autoloader

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Cache\ArrayCache; // Imp

use Dotenv\Dotenv;

// Load environment variables from .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . "/src"], $isDevMode);


// Create a cache instance (FilesystemCache in this example)
$cache = new ArrayCache();



$conn = [
    'driver' => 'pdo_mysql',
    'host' => $_ENV['DB_HOST'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'dbname' => $_ENV['DB_NAME'],
];

$entityManager = EntityManager::create($conn, $config);
