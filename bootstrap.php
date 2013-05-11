<?php

session_start();

/**
 *  include class file at runtime according to class name
 * @todo scan path information from class name and inclue..instead of searching on standard folder
 * @param type $className
 */
function __autoload($className)
{
	if (file_exists('controllers/' . $className . '.php')) {
		include 'controllers/' . $className . '.php';
	} elseif (file_exists('models/' . $className . '.php')) {
		include 'models/' . $className . '.php';
	} elseif (file_exists('system/' . $className . '.php')) {
		include 'system/' . $className . '.php';
	} elseif (file_exists('plugins/' . $className . '.php')) {
		include 'plugins/' . $className . '.php';
	}
}

$eventObject = new eventhandler();

$eventObject->prepareEvent('beforeControllerDispatch');

/**
 *  create controller
 */
$controller = (isset($_REQUEST['controller'])) ? $_REQUEST['controller'] : DEFAULT_CONTROLLER;
$controllerClass = $controller . 'Controller';
$controllerPath = 'controllers/' . $controllerClass . '.php';

if (file_exists($controllerPath)) {
	$Controller = new $controllerClass;
} else {
	$msg = $controllerPath . ' not found!';
	displayErrorMsg($msg, true);
}

/**
 * create method
 */
$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : DEFAULT_ACTION;

$methodName = $action . 'Action';

if (!method_exists($Controller, $methodName)) {
	$msg = " Method $methodName not found on $controllerClass Class ";
	displayErrorMsg($msg, true);
}

$Controller->{$methodName}();
