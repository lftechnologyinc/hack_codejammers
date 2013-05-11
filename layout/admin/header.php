<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8"/>
		<title>Dashboard I Admin Panel</title>
		<link rel="stylesheet" href="<?php echo BASE_URL ?>/system/css/layout.css" type="text/css" media="screen" />
		<script src="<?php echo BASE_URL ?>/system/js/jquery-1.5.2.min.js" type="text/javascript"></script>
		<script src="<?php echo BASE_URL ?>/system/js/hideshow.js" type="text/javascript"></script>
		<script src="<?php echo BASE_URL ?>/system/js/jquery.tablesorter.min.js" type="text/javascript"></script>
		<script src="<?php echo BASE_URL ?>/system/js/jquery.tablesorter.pager.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo BASE_URL ?>/system/js/jquery.equalHeight.js"></script>

		<link type="text/css" href="<?php echo BASE_URL ?>/system/css/custom-theme/jquery-ui-1.8.8.custom.css" rel="stylesheet" />
		<link href="<?php echo BASE_URL ?>/system/css/tablesorter.css" rel="stylesheet" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo BASE_URL ?>/system/js/jquery-ui-1.8.8.custom.min.js"></script>
		<script src="<?php echo BASE_URL ?>/system/js/system.js" type="text/javascript"></script>

		<script type="text/javascript">
			$(document).ready(function()
			{
				$(".tablesorter").tablesorter();
			}
		);
			$(document).ready(function() {

				//When page loads...
				$(".tab_content").hide(); //Hide all content
				$("ul.tabs li:first").addClass("active").show(); //Activate first tab
				$(".tab_content:first").show(); //Show first tab content

				//On Click Event
				$("ul.tabs li").click(function() {

					$("ul.tabs li").removeClass("active"); //Remove any "active" class
					$(this).addClass("active"); //Add "active" class to selected tab
					$(".tab_content").hide(); //Hide all tab content

					var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
					$(activeTab).fadeIn(); //Fade in the active ID content
					return false;
				});

			});
		</script>
		<script type="text/javascript">
			$(function(){
				$('.column').equalHeight();
			});
		</script>

	</head>
<body>