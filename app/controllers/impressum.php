<?php


namespace DEFAULTNAMESPACE\app\controllers;
use DEFAULTNAMESPACE\app\core\controller;

use DEFAULTNAMESPACE\app\models\login;

class Impressum extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Impressum';
        $data['firstlvl'] = 'Home';
        $data['lvl'] = 'Impressum';
        $data['pt'] = 'Impressum';
        $data['pst'] = '';
        $this->_view->render('header', $data);
        $this->_view->render('impressum/ansicht', $data, 0);
        $this->_view->render('footer', $data);
    }


}