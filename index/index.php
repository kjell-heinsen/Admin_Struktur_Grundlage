<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('log_errors', 'On');
ini_set('error_log', 'php-errors.log');
require_once "../autoload.php";
use DEFAULTNAMESPACE\app\core\main;
use DEFAULTNAMESPACE\app\helpers\session;
use DEFAULTNAMESPACE\app\core\logger;
use DEFAULTNAMESPACE\appversion;
// require '/www/htdocs/w0143f01/vendor/autoload.php';

ini_set('session.cookie_secure',1);
ini_set('session.cookie_httponly',1);
ini_set('session.cookie_samesite', 'Strict');
session_start();
if ($_SERVER['SERVER_NAME'] == 'dev.bugs.heinen-it.de') {
    $wartung = false;
    $isdev = true;
    define('ENVIRONMENT', 'development');
    require '../dev_config.php';

}
if ($_SERVER['SERVER_NAME'] == 'bugs.heinsen-it.de') {
    $wartung = false;
    $isrelease = true;
    define('ENVIRONMENT', 'release');
    require '../config.php';
}

$wordpress = false;
if (defined('PAGEPATH'))
{
    $wordpress = true;

}
if($wordpress) {
    require_once PAGEPATH . 'wp-load.php';
}


$buffer     = '';
$path = DOCROOT.'/index/static';


function compress( $buffer ) {
    $buffer = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer );
    $buffer = str_replace( ': ', ':', $buffer );
    $buffer = str_replace( array( '\r\n', '\r', '\n', '\t', '  ', '    ', '    ' ), '', $buffer );
    // remove comments
    $buffer = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer );
    // remove tabs, newlines, etc.
    $buffer = str_replace( array( "\r\n", "\r", "\n", "\t" ), '', $buffer );
    //remove multiple spaces
    $buffer = preg_replace( '/\s\s+/', ' ', $buffer );

    return $buffer;
}

//$buffer = compress( $buffer );

//file_put_contents( $path . '/myapp/myapp.css', $buffer );

function optimizeHTML($buffer)
{

    $search = array(
        '/\>[^\S ]+/s', // strip whitespaces after tags, except space
        '/[^\S ]+\</s', // strip whitespaces before tags, except space
        '/(\s)+/s', // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );

    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}

//$cache = true;
require_once DOCROOT . '/funktionen/funktionen.php';
require_once DOCROOT . '/funktionen/csrf.php';

$optimized = false;
if ($optimized)
{
    ob_start("optimizeHTML");
} else
{
    ob_start();
}

if ($wartung) {
    require_once('maintenance.php');
} else {

    if (defined('ENVIRONMENT')) {
        switch (ENVIRONMENT) {
            case 'development':
                error_reporting(E_ALL);
                break;
            case 'release':
         //       error_reporting(0);
                break;
            default:
                exit('The application environment is not set correctly.');
        }
    }

    set_exception_handler('DEFAULTNAMESPACE\app\core\logger::exception_handler');
    set_error_handler('DEFAULTNAMESPACE\app\core\logger::error_handler');
    //  $runmodul = new Modul();
    define('FILEVERSION',appversion::get());
    define('VERSIONTIME','heute');
    $app = new main();
    $app->setController('start');
    $app->init();
    // System_Model::createcsrf();
    //  SESSION::init();
}
ob_flush();