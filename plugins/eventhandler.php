<?php

class eventhandler extends event
{

	private $_events = array(
		'beforeControllerDispatch' => array(
			array('acl', 'isAllowed'),
		),
		'afterControllerDispatch' => array(
		),
	);

	public function prepareEvent($hook)
	{
		$eventList = $this->_events[$hook];
		$this->fireEvent($eventList);
	}

}
