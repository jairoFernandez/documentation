<?php


namespace AppBundle\Infrastructure;
use AppBundle\Entity\Section;

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


    /**
     * @param $manualId
     * @return Section
     */
    public function ListSections($manualId)
    {
        $sectionEntity = 'AppBundle:Section';
        $sections = $this->em->getRepository($sectionEntity)->findBy(array(
           'manual' => $manualId
        ));

        return $sections;
    }
}