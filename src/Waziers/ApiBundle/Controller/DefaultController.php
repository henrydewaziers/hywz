<?php

namespace Waziers\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class DefaultController extends FOSRestController
{

    public function indexAction($name)
    {
        return $this->render('WaziersApiBundle:Default:index.html.twig', ['name' => $name]);
    }
}
