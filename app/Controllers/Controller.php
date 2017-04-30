<?Php
namespace App\Controllers;

use Interop\Container\ContainerInterface;

class Controller
{
	protected $c;

	public function __construct(ContainerInterface $c)
	{
		$this->c = $c;
	}
	Protected function render404($response){
		return $this->c->view->render($response->withStatus(404), 'errors/404.twig');
	}
}