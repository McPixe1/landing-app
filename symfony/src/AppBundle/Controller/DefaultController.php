<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\Block;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Services\Helpers;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }
    
    /**
     * @Route("/pruebas", name="pruebas", methods="GET")
     */
    public function pruebasAction(Request $request, Helpers $helpers) {
                
        $em = $this->getDoctrine()->getManager();
        $blocks = $em->getRepository(Block::class)->findAll();

        $response = $helpers->toJson($blocks);
        return $response;
        
    }

}
