<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $gitHubApi = $this->container->get('cimpress.githubapi.helper');
        $repos = $gitHubApi->getRepoByName('symfony');
        return $this->render('AppBundle:Default:index.html.twig', array('repos' => $repos));
    }
}