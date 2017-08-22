<?php

namespace AppBundle\Services;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;
use BackendBundle\Entity\Block;
use BackendBundle\Entity\OverviewBlock;
use BackendBundle\Entity\HeaderBlock;
use Doctrine\ORM\EntityManager;

class Helpers {

    protected $em;

    public function __construct(EntityManager $entityManager) {
        $this->em = $entityManager;
    }

    /**
     * Transforma un array en un json valido
     * @param type $data
     * @return Response
     */
    public function toJson($data) {
        $normalizers = array(new GetSetMethodNormalizer());
        $encoders = array("json" => new JsonEncoder());
        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($data, 'json');

        $response = new Response();
        $response->setContent($json);
        $response->headers->set('Content-Type', 'application/json');
        //Para poder hacer peticiones ajax desde cualquier cliente
        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response;
    }

    /**
     * Crea un nuevo bloque dependiendo de su tipo
     * @param type $params
     * @return OverviewBlock
     */
    public function createBlock($params) {
        $em = $this->em;

        $type = (isset($params->type)) ? $params->type : null;

        switch ($type) {
            case "header":
                $title = (isset($params->title)) ? $params->title : null;
                $subtitle = (isset($params->subtitle)) ? $params->subtitle : null;
                $imgUrl = (isset($params->imgUrl)) ? $params->imgUrl : null;
                $bgUrl = (isset($params->bgUrl)) ? $params->bgUrl : null;
                $btnUrl = (isset($params->btnUrl)) ? $params->btnUrl : null;

                $block = new HeaderBlock();
                $block->setType($type);
                $block->setTitle($title);
                $block->setSubtitle($subtitle);
                $block->setImgUrl($imgUrl);
                $block->setBgUrl($bgUrl);
                $block->setBtnUrl($btnUrl);
                $em->persist($block);
                $em->flush();

                break;

            case "overview":
                $title = (isset($params->title)) ? $params->title : null;
                $description = (isset($params->description)) ? $params->description : null;
                $imgUrl = (isset($params->imgUrl)) ? $params->imgUrl : null;

                $block = new OverviewBlock();
                $block->setType($type);
                $block->setTitle($title);
                $block->setDescription($description);
                $block->setImgUrl($imgUrl);
                $em->persist($block);
                $em->flush();

                break;
        }

        return $block;
    }

}
