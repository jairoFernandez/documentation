<?php
/**
 * Created by PhpStorm.
 * User: flia
 * Date: 26/06/16
 * Time: 08:18 PM
 */

namespace AppBundle\Controller\Http;

use AppBundle\Entity\Manual;
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
     * @Method({"GET", "POST"})
     */
    public function IndexAction(Request $request)
    {
        $manual = new Manual();
        $form = $this->createForm('AppBundle\Form\ManualType', $manual);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('manual')->create($manual);
            return $this->redirectToRoute('manual_show', array('id' => $manual->getId()));
        }
        $manuals = $this->get('manual')->findAll();
        return $this->render('http/index.html.twig', array(
            'manuals' => $manuals,
            'form' => $form->createView()
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