<?php

require 'vendor/autoload.php';

$settingsPath = '/Users/fred/Projects/Craft-Plugins/ImageServer/src/public/imageserver/settings.json';
$settings = json_decode(file_get_contents($settingsPath), true);

if (!$settings) {
    throw new \Exception('No settings defined');
}

$sources = $settings['sources'];
$sourceId = $_GET['source'] ?? null;
$source = $sources[$sourceId] ?? null;

if (!$source) {
    throw new \Exception('No source defined');
}

// Setup Glide server
$server = League\Glide\ServerFactory::create([
    'source' => $source['path'],
    'cache' => '/Users/fred/Projects/Craft-Plugins/ImageServer/src/public/imageserver/cache/',
]);

// But, a better approach is to use information from the request
$server->outputImage($_GET['url'], $_GET);