<?php
/**
 * Created by PhpStorm.
 * User: flia
 * Date: 26/06/16
 * Time: 08:18 PM
 */

namespace AppBundle\Controller\Http;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class HomeController
 *
 * @Route("/{_locale}/home")
 * @Route("/home")
 */
class HomeController extends Controller
{
    private $manualEntity = 'AppBundle:Manual';

    /**
     * Lists all Manual entities.
     *
     * @Route("/", name="index_manual")
     * @Method("GET")
     */
    public function IndexAction()
    {
        $manuals = $this->get('manual')->findAll();
        return $this->render('http/index.html.twig', array(
            'manuals' => $manuals,
        ));
    }

    /**
     * @Route("/list/{id}", name="list_menu")
     * @Method("GET")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ListMenuAction($id)
    {
        $manual = $this->get('manual')->findById($id);
        $sections = $this->get('manual')->ListSections($id);
        return $this->render('http/list.html.twig',array(
            'manual'=>$manual,
            'sections'=>$sections
        ));
    }

}