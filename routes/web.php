<?php 
use App\Controllers\TopicController;
use App\Controllers\UserController;

$app->get('/', function () {
	echo 'Welcome to simple slim';
});

$app->get('/users', UserController::class . ':index');
$app->group('/topics', function () {
	$this->get('', TopicController::class . ':index');
	$this->get('/{id}', TopicController::class . ':show')->setName('topics.show');
});