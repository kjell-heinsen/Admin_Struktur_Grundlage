<?php
namespace DEFAULTNAMESPACE\app\controllers;


use DEFAULTNAMESPACE\app\core\controller;
use DEFAULTNAMESPACE\app\models\login;
use DEFAULTNAMESPACE\app\models\home;



class csrf extends Controller
{

public function __construct()
{
parent::__construct();
}


public function index():void{
    $form = json_decode($_POST['formdata']);
    $this->_view->render('json_header',$data);
    $status['status'] = 'ok';
    $status['token'] = DEFAULTNAMESPACE\app\core\csrf::getToken();
    try {

    } catch(\Exception $e){

    }

    echo json_encode($status);


}
}