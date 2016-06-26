<?php


namespace AppBundle\Infrastructure;

use AppBundle\Entity\Manual;


/**
 * Class ManualAction
 * @package AppBundle\Infrastructure
 */
class ManualAction
{
    private   $context;
    protected $em;
    protected $session;
    private $manualEntity = 'AppBundle:Manual';
    /**
     * [__construct description]
     * @param [type] $entityManager [description]
     * @param [type] $session       [description]
     */
    public function __construct($entityManager, $session)
    {
        $this->em = $entityManager;
        $this->session = $session;
    }

    /**
     * @param Manual $manual
     * @return Manual
     */
    public function CreateManual(Manual $manual)
    {
        $this->em->persist($manual);
        $this->em->flush();

        return $manual;
    }

    public function FindAll()
    {
        return $this->em->getRepository($this->manualEntity)->findAll();
    }
}