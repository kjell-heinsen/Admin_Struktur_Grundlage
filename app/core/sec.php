<?php
namespace DEFAULTNAMESPACE\app\core;

use DEFAULTNAMESPACE\app\core\database;
use DEFAULTNAMESPACE\app\core\main;
use app\helpers\session;
use app\helpers\url;


class sec {

    public function __construct() {
        
    }



    public function title2url($url) {
        $url = strtolower($url);
        $url = strip_tags($url);
        $url = stripslashes($url);
        $url = html_entity_decode($url);
        //Anführungszeichen entfernen
        $url = str_replace('\'', '', $url);
        $match = '/[^a-z0-9]+/';
        $replace = '-';
        $url = preg_replace($match, $replace, $url);
        $url = trim($url, '-');
        return $url;
    }

    public function sec_key() {
        $length = 125;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $characters[rand(0, $charactersLength - 1)];
        }

        return $key;
    }

    public static function rtoken($prefix = NULL,$l = NULL) {
        if(is_null($prefix)){
            $prefix = 'fcer';
        }

        if(is_null($l)) {
            $length = 13;
        } else {
            $length = $l;
        }
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $characters[rand(0, $charactersLength - 1)];
        }

        return $prefix.'-'.$key;
    }

    public static function val_rtoken(){
        $url = new main();
        $myurl = $url->_url;

        if($myurl['2'] <> session::get('SEC1')){
            throw new \Exception('Erster Security-Code falsch, Admin wurde benachrichtigt.');
        }
        if($myurl['3'] <> session::get('SEC2')){
            throw new \Exception('Zweiter Security-Code falsch, Admin wurde benachrichtigt.');
        }
        if($myurl['4'] <> session::get('SEC3')){
            throw new \Exception('Dritter Security-Code falsch, Admin wurde benachrichtigt.');
        }

        session::clear('SEC1');
        session::clear('SEC2');
        session::clear('SEC3');
    }

    public static function AntiSpamName():string{
       // $date = new \DateTime(time());
       // $week = $date->format("W");
        $week = date("W");
        $base = 300;
        $value = ($base - $week)*234642;
     $return = \DEFAULTNAMESPACE\app\core\LibPseudoCrypt::hash($value);
       $return = 'abx'.$return.'tromy';
       return $return;
       // 65699760
        // 65465118
      //  return $week;
    }

    public static function AntiSpamCSS():String{
       $css = '<style type="text/css">'."\n";
       $css .= 'input#'.self::AntiSpamName().' { display:none; }'."\n";
       $css .= 'input#emailadress { display:none; }'."\n";
        $css .= '</style>'."\n";
       return $css;
    }

    public static function AntiSpamForm():string{
        $form = '<input type="text" class="form-control" name="'.self::AntiSpamName().'" id="'.self::AntiSpamName().'" value="">';
        $form .= '<input type="email" class="form-control" name="emailadress" id="emailadress" value="">';
        return $form;
    }


    public static function AntiSpamValidate($post){
        $antispam = self::AntiSpamName();

        if($post->emailadress <> ''){
            throw new \Exception('Errormeldung! Warnung.');
        }
        if($post->$antispam){
            throw new \Exception('Errormeldung! Warnung.');
        }
    }

    public function getnewkey($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $characters[rand(0, $charactersLength - 1)];
        }

        return $key;
    }

    public static function logged() {
        $login = session::get('login');
        $logged = TRUE;
        if ($login == '') {
            return $logged = FALSE;
        }
        return $logged;
    }

    public static function ToLogin() {
        $url = new url();

        if (!sec::logged()) {
            $url->redirect('login/', 303);
        }
    }

    public static function ToStart(){
        $url = new url();

        if (sec::logged()) {
            $url->redirect('', 303);
        }
    }

    public function myaccountkey() {
        $db = new database();
        $length = 20;
        $i = 0;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $characters[rand(0, $charactersLength - 1)];
        }
        $menge = $db->num_rows("SELECT accountkey FROM user WHERE accountkey LIKE '$key' LIMIT 1");
        if ($menge == 0) {
            return $key;
        } else {
            myaccountkey();
            $i ++;
        }
        if ($i == 5) {
            return false;
        }
    }

    public function key_db() {
        $db = new database();
        $value = $db->get_row("SELECT pw_key FROM user WHERE wkn LIKE '$wkn' LIMIT 1");
        $key = $value->pw_key;
        return $key;
    }
    
    public function Getwknkey($wkn)
    {
        for ($i = 0; $i <= 4; $i++) {
         $wknkey = hash('sha512', $wkn);
        }
        return $wknkey;
    }

    public function chatid($combi) {
        for ($i = 0; $i <= 6; $i++) {
            $chatid = hash('sha512', $combi);
        }
        return $chatid;
    }

    /* Passwortverschl�sslung */

    public function pw_sec($passwort, $key) {


        $passwort = $passwort . $key;
        for ($i = 0; $i <= 13; $i++) {
            $passwort = md5($passwort);
        }

        for ($i = 0; $i <= 13; $i++) {
            $passwort = hash('sha256', $passwort);
        }

        for ($i = 0; $i <= 13; $i++) {
            $passwort = hash('sha384', $passwort);
        }

        for ($i = 0; $i <= 1100; $i++) {
            $passwort = hash('sha512', $passwort);
        }

        /* Neu */
//crypt($passwort);

        return $passwort;
    }
    
function pwdcheckup($pwsha1)  
{
    switch(password_exposed($pwsha1)) {

    case PasswordStatus::EXPOSED:
        // Passwort wurde geleakt.
        break;

    case PasswordStatus::NOT_EXPOSED:
        // Passwort wurde nicht geleakt.
        break;

    case PasswordStatus::UNKNOWN:
        // Durch einen API-Fehler konnte das Passwort nicht abgeglichen werden.
        break;
    
    
}
}


}
