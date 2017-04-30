<?php 
namespace App\Controllers;
use PDO;
use App\Models\Topic;

class TopicController extends Controller
{
	
	Public function index($request, $response) 
	{
		$topics = $this->c->db->query("SELECT * FROM topics")->fetchAll(PDO::FETCH_OBJ);
		return $response->withJson($topics, 200);
	}

	Public function show($request, $response, $args)
	{
		$topic = $this->c->db->prepare("SELECT * FROM topics WHERE id = :id");
		$topic->execute([
			'id' => $args['id']
		]);
		$topic =$topic->fetch(PDO::FETCH_OBJ);
		if ($topic === false) {
			return $this->render404($response);
		}
		var_dump($topic);
	}
}
