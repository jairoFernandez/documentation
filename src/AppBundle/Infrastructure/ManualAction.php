<?php


namespace AppBundle\Infrastructure;

/**
 * Class ManualAction
 * Manage the Entity Manual
 * @package AppBundle\Infrastructure
 */
class ManualAction extends CrudBasicActions
{
    public function __construct($entityManager, $session)
    {
        parent::__construct($entityManager, $session);
        $this->manualEntity = "AppBundle:Manual";
    }
}