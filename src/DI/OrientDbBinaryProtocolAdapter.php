<?php

/**
 * @author Martin Bažík <martin@bazo.sk>
 */
class OrientDbBinaryProtocolAdapter implements Doctrine\OrientDB\Binding\BindingInterface
{

	/** @var \PhpOrient\PhpOrient */
	private $orient;

	private $databaseName;

	public function __construct($host, $port, $username, $password, $database, $params = [])
	{
		$orient = new PhpOrient\PhpOrient($host, $port);
		$orient->connect($username, $password);
		$orient->dbOpen($database, $username, $password, $params);

		$this->databaseName = $database;

		$this->orient = $orient;
	}


	public function execute($sql)
	{
		$result = $this->orient->query($sql);

		$results = array();

		foreach ($result as $record) {
			$record->parse();
			$results[] = (object) array('@class' => $record->className, 'street' => $record->data->street);
		}

		$this->result = $results;

		return $results;
	}


	public function getResult()
	{
		return $this->result;
	}


	public function getDatabase($database = null)
	{

	}


	public function getDatabaseName()
	{
		return $this->databaseName;
	}


}
