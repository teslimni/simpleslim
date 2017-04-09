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

	// Instantiate and add Slim specific extension
	$basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
	$view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

	return $view;
};

$app->get('/', function($request, $response) {
	return $this->view->render($response, 'home.twig');
})->setName('home');

$app->get('/users', function($request, $response) {

	$users = [
		['username' => 'Teslim'],
		['username' => 'Amina'],
		['username' => 'Mazid'],
		['username' => 'Abbas'],
		['username' => 'Halimah'],
		['username' => 'Ziyad'],
		['username' => 'Aisha'],
	];
	return $this->view->render($response, 'users.twig', [
		'users' => $users,
	]);
})->setName('users.index');

$app->run();