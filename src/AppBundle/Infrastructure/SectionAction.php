<?php
/**
 * Created by PhpStorm.
 * User: flia
 * Date: 26/06/16
 * Time: 09:50 PM
 */

namespace AppBundle\Infrastructure;


class SectionAction extends CrudBasicActions
{
    public function __construct($entityManager, $session)
    {
        parent::__construct($entityManager, $session);
        $this->manualEntity = "AppBundle:Section";
    }
}