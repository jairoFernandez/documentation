<?php

namespace AppBundle\Util;

class Utility
{
	private   $context;
    protected $em;
    protected $session;
	
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

	public function HelloWorld()
	{
		return "Hello world";
	}

	/**
	 * Función usada para obtener un mensaje personalizado de flashbag conpatible con 
	 * bootstrap
	 * @param string $mensaje      Mensaje que el usuario verá
	 * @param string $tipoAlerta   Clase css de un alert bootstrap success,danger, info, etc
	 * @param string $tituloAlerta Título de la alerta
	 */
	public function MsgFlash($mensaje = "Acción Realizada correctamente.", $tipoAlerta = 'success', $tituloAlerta = 'Mensaje: ')
    {
        $this->session->getFlashBag()->add(
            'notice',
            array(
                'alert' => $tipoAlerta,
                'title' => $tituloAlerta,
                'message' => $mensaje
                )
            );
    }
}