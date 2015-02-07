<?php

/**
 * @author Martin Bažík <martin@bazo.sk>
 */
class DoctrineFactory
{

	/**
	 * @param type $host
	 * @param type $port
	 * @param type $username
	 * @param type $password
	 * @param type $database
	 * @return \Doctrine\ODM\OrientDB\Manager
	 */
	public static function create($host, $port, $username, $password, $database, $documentDirs, $proxyDir)
	{
		$bindingParameters = new Doctrine\OrientDB\Binding\BindingParameters($host, $port, $username, $password, $database);

		$binding		 = new \Doctrine\OrientDB\Binding\HttpBinding($bindingParameters);
		$configuration	 = new Doctrine\ODM\OrientDB\Configuration([
			'proxy_dir'		 => $proxyDir,
			'document_dirs'	 => $documentDirs
		]);


		//$mapper = new \Doctrine\ODM\OrientDB\Mapper\

		$manager = new Doctrine\ODM\OrientDB\Manager($binding, $configuration);

		return $manager;
	}


}
