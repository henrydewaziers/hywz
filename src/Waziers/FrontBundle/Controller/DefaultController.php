<?php

namespace Waziers\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 * @package Waziers\FrontBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('WaziersFrontBundle:Default:index.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function templatesAction($templateName)
    {
        $template = $this->templates[$templateName];

        if (array_key_exists('params', $template)) {
            $params = $template['params'];
            if (array_key_exists('user', $params)) {
                $params['user'] = $this->getUser();
            }
        } else {
            $params = [];
        }

        return $this->render(
            $template['template'],
            $params
        );
    }

    private $templates = [
        'furnitures.liste.html' => [
            'template' => 'WaziersFrontBundle:Templates:furnituresListes.html.twig',
        ],
        'furnitures.details.html' => [
            'template' => 'WaziersFrontBundle:Templates:furnituresDetails.html.twig',
        ],
    ];
}
