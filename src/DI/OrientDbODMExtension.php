<?php

namespace Bazo\OrientDbODM\DI;


/**
 * @author Martin Bažík <martin@bazo.sk>
 */
class OrientDbODMExtension extends \Nette\DI\CompilerExtension
{

	private $defaults = [
		'handlers'	 => [],
		'processors' => [],
		'name'		 => 'App',
		'useLogger'	 => TRUE
	];
	private $useLogger;

	public function loadConfiguration()
	{
		$containerBuilder	 = $this->getContainerBuilder();
		$config				 = $this->getConfig($this->defaults);

		
	}





}
