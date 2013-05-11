<?php

abstract class event
{

	abstract public function prepareEvent($hook);

	/**
	 * fire event for a given hook
	 * @param type $hook
	 */
	public function fireEvent($events)
	{
		foreach ($events as $event) {

			if (count($event) < 2) {
				continue;
			}

			$className = $event[0];
			$method = $event[1];

			$classPath = 'plugins/' . $className . '.php';


			if (file_exists($classPath)) {
				$class = new $className;
			} else {
				$msg = $classPath . ' not found!';
				displayErrorMsg($msg, true);
			}

			if (!method_exists($class, $method)) {
				$msg = " Method $method not found on $classPath ";
				displayErrorMsg($msg, true);
			} else {
				$class->{$method}();
			}
		}
	}

}
