<?php 
use App\Controllers\TopicController;

$app->group('/topics', function () {
	$this->get('', TopicController::class . ':index');
	$this->get('/{id}', TopicController::class . ':show');
});