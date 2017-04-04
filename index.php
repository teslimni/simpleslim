<?php 

require 'vendor/autoload.php';

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true,
	]
]);

$container = $app->getContainer();
$container['view'] = function ($container) {
	$view = new \Slim\Views\Twig(__DIR__ . '/resources/views', [
		'cache' => false
	]);
};

$app->get('/', function() {
	echo "Salam Home";
});

$app->run();