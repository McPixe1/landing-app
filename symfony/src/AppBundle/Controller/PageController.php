<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Services\Helpers;
use BackendBundle\Entity\Page;

class PageController extends Controller {

    /**
     * @Route("/page", name="page", methods="GET")
     */
    public function indexAction(Request $request, Helpers $helpers) {
        
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository(Page::class)->findAll();

        $response = $helpers->toJson($pages);
        return $response;
    }

}
