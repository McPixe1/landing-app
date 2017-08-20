<?php

namespace AppBundle\Controller;

use AppBundle\Services\Helpers;
use BackendBundle\Entity\Block;
use BackendBundle\Entity\OverviewBlock;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlockController extends Controller {

    /**
     * @Route("/block/test", name="block-test")
     * @Method({"GET", "POST"})
     */
    public function pruebasAction(Request $request, Helpers $helpers) {

        $em = $this->getDoctrine()->getManager();
        $block = $em->getRepository(Block::class)->findAll();

        return $helpers->toJson($block);
    }

    /**
     * @Route("/block/new", name="new-block")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Helpers $helpers) {
        $em = $this->getDoctrine()->getManager();

        $json = $request->get("json", null);

        if ($json != null) {
            $params = json_decode($json);

            $block = $helpers->createBlock($params);

            $data = array(
                "status" => "succes",
                "code" => 200,
                "data" => $block
            );
        } else {
            $data = array(
                "status" => "error",
                "code" => 400,
                "data" => "Página no creada"
            );
        }
        return $helpers->toJson($data);
    }

}
