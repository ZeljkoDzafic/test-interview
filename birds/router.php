<?php
// Get the requested URI from $_SERVER
$requestUri = $_SERVER['REQUEST_URI'];

// Split the URI into parts using the "/" delimiter
$uriParts = explode('/', trim($requestUri, '/'));

if (count($uriParts) === 2) {
    $birdType = $uriParts[0];
    $action = $uriParts[1];

    if ($birdType === 'eagle') {
        $birdController = new BirdController(new Eagle()); // Inject an Eagle instance
    } elseif ($birdType === 'ostrich') {
        $birdController = new BirdController(new Ostrich()); // Inject an Ostrich instance
    } else {
        echo "Invalid bird type.\n";
        exit;
    }

    switch ($action) {
        case 'feed':
            $birdController->feed();
            break;
        case 'release':
            $birdController->releaseFromCliff();
            break;
        case 'run':
            $birdController->runFrom();
            break;
        case 'walk':
            $birdController->walk();
            break;
        default:
            echo "Invalid action.\n";
    }
} else {
    echo "Invalid URL format. Use 'birdType/action'.\n";
}
