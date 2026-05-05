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


<?php
#-----nepostojecaklasa.php----------#
#---nema direktnog pristupa klasi---#
defined('ROOT_DIR') or exit('No direct script access allowed');
#---klasa engine up ng1np---#
class ng1np {
	#---javna metoda render---#
	public function render($script) {
        	$this->_require($script);
    	}
	    #---zasticena metoda _require---#
    	protected function _require() {
        	require_once func_get_arg(0);
    	}
}
?>


<?php
#----nepostojecabiblioteka.php----#
#---pozivanje klase---#
$eng = new ng1np();
#---varijable---#
$eng->charset = 'UTF-8';
$eng->keywords = '0000, 0110, 1001, 1111';
$eng->author = 'admin';
$eng->description = 'This is God mode. All about universe and galaxy';
$eng->title = 'God mode - ng1np';
#----nizovi sa podacima---#
$eng->content = array( 
	array(
	"proces1" => "PAMETNI",
	"proces2" => "VIRTUELNI",
	"proces3" => "SIGURNOSNI",
	"proces4" => "PROCEDURALNI"
	),
	array(
	"proces1" => "DELJENI",
    "proces2" => "DEFINITIVNI",
    "proces3" => "SIGURNOSNI",
    "proces4" => "VIRTUELNI"
	),
	array(
	"proces1" => "DELJENI",
    "proces2" => "DEFINITIVNI",
    "proces3" => "SIGURNOSNI",
    "proces4" => "VIRTUELNI"
	),
	array(
	"proces1" => "PROCEDURALNI",
    "proces2" => "PROCEDURALNI",
    "proces3" => "PAMETNI",
    "proces4" => "VIRTUELNI"
	)
);
$eng->sidebar = array( 
        array(
        "server1" => "USER",
        "server2" => "ROOT",
        "server3" => "god"
        ),
        array(
        "server1" => "USER",
        "server2" => "ROOT",
        "server3" => "root"
        ),
        array(
        "server1" => "ROOT",
        "server2" => "USER",
        "server3" => "root"
        ),
        array(
        "server1" => "ROOT",
        "server2" => "ROOT",
        "server3" => "user"
        )
);
?>




#---metoda render---#
echo $eng->render('up/god.tpl');
