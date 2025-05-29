<?php


namespace app\helpers;
class MyForms
{
    public $_token;

    //  public $_csrf;
    public function __construct()
    {

        // $this->_token = $this->GetToken();
        //  $this->_csrf = $this->csrf();
    }


    /*   private function GetToken(){
           $microtime = time();
          // $data['microtime'] = $microtime;
           $microtime = md5($microtime);
           return $microtime;
       }
   */
    public static function csrf()
    {
        $token = md5(microtime());
        return $token;
    }


}