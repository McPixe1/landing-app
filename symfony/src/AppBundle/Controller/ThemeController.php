<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Services\Helpers;
use BackendBundle\Entity\Page;
use BackendBundle\Entity\Theme;
use BackendBundle\Entity\Block;

class ThemeController extends Controller {

    /**
     * @Route("/themes", name="themes", methods="GET")
     */
    public function indexAction(Request $request, Helpers $helpers) {

        $em = $this->getDoctrine()->getManager();
        $themes = $em->getRepository(Theme::class)->findAll();
        
        if($themes != null){
              $data = array(
                "status" => "success",
                "code" => 200,
                "data" => $themes
            );
        } else {
            $data = array(
                "status" => "error",
                "code" => 400,
                "data" => "No hay temas"
            );
        }
        
        $response = $helpers->toJson($data);
        return $response;
    }

}
