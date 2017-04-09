<?php 

require 'vendor/autoload.php';

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true,
	]
]);

$container = $app->getContainer();

$container['db'] = function () {
	return new PDO( 'mysql:host=localhost;dbname=simpleslim', 'homestead', 'secret' );
};

$container['view'] = function ($container) {
	$view = new \Slim\Views\Twig(__DIR__ . '/resources/views', [
		'cache' => false
	]);

	// Instantiate and add Slim specific extension
	$basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
	$view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

	return $view;
};

$app->get('/', function() {
	$users = $this->db->query('SELECT * FROM users')->fetchAll(PDO::FETCH_OBJ);
})->setName('home');

$app->get('/users/{username}', function($request, $response, $args) {
	$user = $this->db->prepare('SELECT * FROM users WHERE username = :username');
	$user->execute([
		'username' => $args['username']
	]);
	$user = $user->fetch(PDO::FETCH_OBJ);
	return $this->view->render($response, 'users/profile.twig', compact('user'));
});
$app->run();