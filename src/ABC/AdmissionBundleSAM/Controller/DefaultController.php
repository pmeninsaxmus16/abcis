<?php

namespace ABC\AdmissionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * AbcBellTimes controller.
 *
 * @Route("/admission")
 */
class DefaultController extends Controller
{
     /**
     * Lists welcome entities.
     *
     * @Route("/welcome", name="admission_welcome")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('ABCAdmissionBundle:Default:index.html.twig', array('name' => 'Bienvenido'));
    }
}
