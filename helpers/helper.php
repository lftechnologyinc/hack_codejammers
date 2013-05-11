<?php

/**
 * advance form of print_r
 * @param type $data
 * @param type $exit
 */
function r($data, $exit = 0)
{
	$trace = debug_backtrace();
	echo '<pre>';
	print_r($data);
	echo '<br><i> On ' . $trace[0]['file'] . ' line number : ' . $trace[0]['line'] . '</i>';
	echo '</pre>';

	if ($exit) {
		exit();
	}
}

/**
 * get Image
 * @param type $url
 * @return type
 */
function getImage($url)
{
	return 'userdata/image.php/image-name.png?width=50&amp;image=' . BASE_URL . 'userdata/images/' . $url;
}

/**
 * display error message
 * @param type $msg
 * @param type $exit
 */
function displayErrorMsg($msg, $exit = true)
{
	$trace = debug_backtrace();
	$html = '<div style="padding:5px; border:red solid 1px; font-weigth:bold;">';
	$html.= $msg;
	$html.= ' on ' . $trace[0]['file'] . ' line number : ' . $trace[0]['line'];
	$html . '</div>';

	echo $html;

	if ($exit) {
		exit();
	}
}

/**
 *  redirect using javascript...
 * @param type $url
 * @param type $jsredirect
 */
function redirect($url, $jsredirect = true)
{
	if ($jsredirect) {
		echo "<script>window.location = '$url'</script>";
	} else {
		header('location:' . $url);
	}
}