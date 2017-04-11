<?php 
namespace App\Controllers;

class UserController extends Controller
{
	
	Public function index($request, $response) 
	{
		return "Users Index view";
	}

	Public function show(){
		return 'Show single topic';
	}
}
