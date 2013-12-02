<?php
namespace ABC\IsystemBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * ABCIS controller.
 *
 * @Route("/isystem")
 */
class DefaultController extends Controller
{
    /**
     * Lists all entities.
     *
     * @Route(name="isystem_welcome")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('ABCIsystemBundle:Default:index.html.twig');
    }
     /**
     * Lists all Students.
     *
     * @Route("/{opt}",  defaults={"opt"= 0 } ,name="AbcSidebar")
     */

}
