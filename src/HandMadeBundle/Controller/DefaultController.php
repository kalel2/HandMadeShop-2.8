<?php

namespace HandMadeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="main")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $latestNews = $em->getRepository('HandMadeBundle:Article')->getLatestNews(3);
        $latestProducts = $em->getRepository('HandMadeBundle:Product')->getLatestProducts(6);

        return array(
                    'latestNews' => $latestNews,
                    'latestProducts' => $latestProducts
                );
    }
}
