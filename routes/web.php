<?php 
use App\Controllers\TopicController;

$autheticated  = function ($request, $response, $next) use ($container) {
	if (!isset($_SESSION['user_id'])) {
		$response = $response->withRedirect($container->router->pathFor('login'));
	}
	$response->getBody()->write('abc');
	return $next($request, $response);
};

$app->get('/', function () {
	echo 'Welcome to simple slim';
});

$app->get('/topics', TopicController::class . ':index');
$app->get('/topics/{id}', TopicController::class . ':show')->add($autheticated);
$app->get('/login', function () {
	return 'Login';
})->setName('login');

