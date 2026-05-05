<?php
#--------Prikazi sve greske------------------------------#
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
#--------engine up---------------------------------------#
#--------hightech - It's not a bug, it's a feature-------#
#------------------definisi root putanju-----------------#
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
#-----------------pozovi klasu za renderovanje-----------#
require 'nepostojecaklasa.php';
#---------------------------ruter------------------------#
$route = isset($_GET['route']) ? $_GET['route'] : '';
#-------------------dozvoljene_stranice------------------#
#-------------------god mode nepostojeca stranica--------#
$pages = array (
'default' => '.nepostojecabiblioteka.php',
'god' => '.god.php'
);
#------proverava da li je string u nizu veci od nule i da li je u nizu------#
if( (strlen($pages[$route]) > 0) && (in_array($pages[$route], $pages)) ){
#-------pozovi stranicu po ruti--------------------------#
require $pages[$route];
#-----u suprotnom poziva default stranicu----------------#
} else { require_once(ROOT_DIR .'nepostojecabiblioteka.php'); }
?>
