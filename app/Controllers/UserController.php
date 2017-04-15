<?php 
namespace App\Controllers;

use PDO;
use App\Models\User;

class UserController extends Controller
{
	
	Public function index($request, $response) 
	{
		$users = $this->c->db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_CLASS, User::class);
		return $this->c->view->render($response, 'users/index.twig', compact('users'));
	}

	Public function show()
	{
		return 'Show single topic';
	}
}
