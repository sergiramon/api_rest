<?php

namespace App\Controller;

use http\Env\Response;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PruebasController extends AbstractController
{
    private $logger;
    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }
    // Tenemos que definir como es el endPoint para poder hacer la petición desde el cliente
    /**
     * @Route("get/usuarios", name="get_users")
     */
    public function getAllUser(Request $request)
    {
        //Llamará a base de datos y se traerá toda la lista de users
        //$response = new Response();
        //$response->setContent('<div>Hola Mundo</div>');
        $id = $request->get('id');
        $this->logger->alert('Mensaje');
        $response = new JsonResponse();
        $response->setData([
            'success' => true,
            'data' => [
                'id' => $id,
                'nombre' => 'Pepe',
                'email' => 'pepe@pepe.com'
            ]
        ]);
        return $response;
    }
}