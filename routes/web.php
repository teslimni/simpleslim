<?php 
use App\Controllers\TopicController;

$app->get('/', function () {
	echo 'Welcome to simple slim';
});

$app->group('/topics', function () {
	$this->get('', TopicController::class . ':index');
	$this->get('/{id}', TopicController::class . ':show');
});