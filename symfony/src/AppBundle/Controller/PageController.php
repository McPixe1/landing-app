<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Services\Helpers;
use BackendBundle\Entity\Page;
use BackendBundle\Entity\Theme;
use BackendBundle\Entity\Block;

class PageController extends Controller {

    /**
     * @Route("/pages", name="pages", methods="GET")
     */
    public function pagesAction(Request $request, Helpers $helpers) {

        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository(Page::class)->findAll();
        
        if($pages != null){
              $data = array(
                "status" => "success",
                "code" => 200,
                "data" => $pages
            );
        } else {
            $data = array(
                "status" => "error",
                "code" => 400,
                "data" => "No hay páginas"
            );
        }
        
        $response = $helpers->toJson($data);
        return $response;
    }

    /**
     * @Route("/page/new", name="new-page", methods="POST")
     */
    public function newAction(Request $request, Helpers $helpers) {
        $em = $this->getDoctrine()->getManager();
        $json = $request->get("json", null);

        if ($json != null) {
            $params = json_decode($json);

            $name = (isset($params->name)) ? $params->name : null;
            $theme_name = (isset($params->theme)) ? $params->theme : null;
            $block_id = (isset($params->block)) ? $params->block : null;

            if ($theme_name != null) {
                $theme = $em->getRepository(Theme::class)->findOneBy(
                        array(
                            "name" => $theme_name
                ));
            }
            if ($block_id != null) {
                $block_type = $em->getRepository(Block::class)->findOneBy(
                        array(
                            "id" => $block_id
                ));
            }

            $page = new Page();
            $page->setName($name);
            $page->setTheme($theme);

            $block = clone $block_type;
            $page->addBlock($block);
            $em->persist($block);
            $em->persist($page);
            $em->flush();

            $page = $em->getRepository(Page::class)->findOneBy(array(
                "name" => $name
            ));

            $data = array(
                "status" => "success",
                "code" => 200,
                "data" => $page
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

    /**
     * @Route("/page/{id}", name="page", methods="GET")
     */
    public function pageAction(Request $request, Helpers $helpers, $id = null) {

        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository(Page::class)->findOneBy(array(
            "id" => $id
        ));

        if ($page) {
            $data = array(
                "status" => "success",
                "code" => 200,
                "data" => $page
            );
        } else {
            $data = array(
                "status" => "error",
                "code" => 400,
                "msg" => "La página no existe"
            );
        }
        $response = $helpers->toJson($data);
        return $response;
    }

    /**
     * @Route("/page/addblock", name="add-block", methods="POST")
     */
    public function addBlockAction(Request $request, Helpers $helpers) {
        $em = $this->getDoctrine()->getManager();
        $json = $request->get("json", null);

        if ($json != null) {
            $params = json_decode($json);

            $page_id = (isset($params->page_id)) ? $params->page_id : null;
            $block_id = (isset($params->block_id)) ? $params->block_id : null;

            $page = $em->getRepository(Page::class)->findOneBy(array(
                "id" => $page_id
            ));
            $block = $em->getRepository(Block::class)->findOneBy(array(
                "id" => $block_id
            ));

            $page->addBlock($block);
            $em->flush();

            $data = array(
                "status" => "success",
                "code" => 200,
                "data" => $page
            );
        } else {
            $data = array(
                "status" => "error",
                "code" => 400,
                "data" => "Bloque no añadido"
            );
        }
        return $helpers->toJson($data);
    }

    /**
     * @Route("/page/removeblock", name="remove-block", methods="POST")
     */
    public function removeBlockAction(Request $request, Helpers $helpers) {
        $em = $this->getDoctrine()->getManager();
        $json = $request->get("json", null);

        if ($json != null) {
            $params = json_decode($json);

            $page_id = (isset($params->page_id)) ? $params->page_id : null;
            $block_id = (isset($params->block_id)) ? $params->block_id : null;

            $page = $em->getRepository(Page::class)->findOneBy(array(
                "id" => $page_id
            ));
            $block = $em->getRepository(Block::class)->findOneBy(array(
                "id" => $block_id
            ));

            $page->removeBlock($block);

            $data = array(
                "status" => "success",
                "code" => 200,
                "data" => $page
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
