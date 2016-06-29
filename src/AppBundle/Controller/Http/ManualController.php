<?php

namespace AppBundle\Controller\Http;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Manual;
use AppBundle\Form\ManualType;

/**
 * Manual controller.
 *
 * @Route("/{_locale}/manual")
 * @Route("/manual")
 */
class ManualController extends Controller
{
    private $manualEntity = 'AppBundle:Manual';

    /**   
     * Lists all Manual entities.
     *
     * @Route("/", name="manual_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $manuals = $this->get('manual')->findAll();
        return $this->render('manual/index.html.twig', array(
            'manuals' => $manuals,
        ));
    }

    /**
     * Creates a new Manual entity.
     *
     * @Route("/new", name="manual_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $manual = new Manual();
        $form = $this->createForm('AppBundle\Form\ManualType', $manual);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('manual')->create($manual);
            return $this->redirectToRoute('manual_show', array('id' => $manual->getId()));
        }

        return $this->render('manual/new.html.twig', array(
            'manual' => $manual,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Manual entity.
     *
     * @Route("/{id}", name="manual_show")
     * @Method("GET")
     */
    public function showAction(Manual $manual)
    {
        $deleteForm = $this->createDeleteForm($manual);

        return $this->render('manual/show.html.twig', array(
            'manual' => $manual,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Manual entity.
     *
     * @Route("/{id}/edit", name="manual_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Manual $manual)
    {
        $deleteForm = $this->createDeleteForm($manual);
        $editForm = $this->createForm('AppBundle\Form\ManualType', $manual);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->get('manual')->update($manual);

            return $this->redirectToRoute('manual_edit', array('id' => $manual->getId()));
        }

        return $this->render('manual/edit.html.twig', array(
            'manual' => $manual,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Manual entity.
     *
     * @Route("/{id}", name="manual_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Manual $manual)
    {
        $form = $this->createDeleteForm($manual);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('manual')->delete($manual);
        }

        return $this->redirectToRoute('manual_index');
    }

    /**
     * Creates a form to delete a Manual entity.
     *
     * @param Manual $manual The Manual entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Manual $manual)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manual_delete', array('id' => $manual->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
