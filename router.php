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
#---metoda render---#
echo $eng->render('nepostojecitemplejt.tpl');
?>
#------------nepostojecitemplejt.tpl-----------------#
<section>
<?php foreach ($this->content as $row) { ?>
	<div>
	<h1> Proces 1: <?php echo $row['proces1']; ?></h1>
	<h2> Proces 2: <?php echo $row['proces2']; ?><h2>
	<h3> Proces 3: <?php echo $row['proces3']; ?></h3>
	<h4> Proces 4: <?php echo $row['proces4']; ?></h4><br /><b> &#8592;</b>
	</div>		
<?php } ?>
</section>
#------------sidebar-----------------#
<aside>
<?php foreach ($this->sidebar as $row) { ?>
        <div>
        <h1> Server 1: <?php echo $row['server1']; ?></h1>
        <h2> Server 2: <?php echo $row['server2']; ?><h2>
        <h3> Server 3: <a href="<?php echo '?route='.$row['server3']; ?>"><?php echo $row['server3']; ?></a></h3><br ><b> &#8592;</b>
        </div>
<?php } ?>
</aside>


