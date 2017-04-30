<?php 
namespace App\Controllers;

class TopicController
{
	Public function index(){
		return "All Topics";
	}

	Public function show($request, $response, $args){
		return $args['id'];
	}
}
