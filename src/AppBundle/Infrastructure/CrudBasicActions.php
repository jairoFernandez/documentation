<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/06/16
 * Time: 02:12 AM
 */

namespace AppBundle\Infrastructure;

/**
 * Class CrudBasicActions
 * Use the most frequently action for manipulate objects
 * @package AppBundle\Infrastructure
 */
abstract class CrudBasicActions
{
    public $em;
    protected $session;
    protected $manualEntity = null;

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

    public function findAll()
    {
        return $this->em->getRepository($this->manualEntity)->findAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->em->getRepository($this->manualEntity)->find($id);
    }

    /**
     * @param $object
     * @return mixed
     */
    public function create($object)
    {
        $this->em->persist($object);
        $this->em->flush();

        return $object;
    }

    /**
     * @param $object
     * @return mixed
     */
    public function update($object)
    {
        $this->em->persist($object);
        $this->em->flush();

        return $object;
    }

    /**
     * @param $object
     * @return string
     */
    public function delete($object)
    {
        $this->em->remove($object);
        $this->em->flush();
        return 'OK';
    }
}