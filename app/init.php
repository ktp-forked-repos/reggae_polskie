<?php
if (substr($_SERVER['HTTP_HOST'],0,3) != 'www') {
   header('HTTP/1.1 301 Moved Permanently');
   header('Location: http://www.'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}

define("SITE_PATH", "http://www.reggaepolskie.loc/");
define("APP_PATH", str_replace("\\", "/", dirname(__FILE__)) . "/");
define("APP_RES", "http://www.reggaepolskie.loc/app/res/");

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'reggaepolskie';

require_once(APP_PATH."core/core.php");
$CMS = new CMS_Core($server, $user, $pass, $db);