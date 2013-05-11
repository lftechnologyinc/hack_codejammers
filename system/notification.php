<?php
  class notification
  {

	  public static function setMessage($message, $type = 'error')
	  {
		  $message = array('message' => $message, 'type' => $type);

		  session::set('notification_message', $message);
	  }

	  public static function getTemplate($message)
	  {
		  $type = $message['type'];
		  $msg = $message['message'];

		  switch ($type) {
			  case 'error':
				  $class = 'alert_error';
				  break;
			  case 'success':
				  $class = 'alert_success';
				  break;
			  case 'warning':
				  $class = 'alert_warning';
				  break;
			  case 'info':
				  $class='alert_info';
				  break;
			  default:
				  $class = 'alert_error';
				  $type = 'error';
				  break;
		  }
		  $html = '<h4 class="'.$class.' notificaion-hide">'.$msg.'</h4>';
		  return $html;
	  }

	  public static function getMessage()
	  {
		  if (session::check('notification_message')) {
			  echo self::getTemplate(session::get('notification_message'));
			  session::delete('notification_message');
		  }
	  }

	  public static function deleteMessage()
	  {
		  if (sessionClass::check('notification_message')) {
			  sessionClass::delete('notification_message');
		  }
	  }

  }

