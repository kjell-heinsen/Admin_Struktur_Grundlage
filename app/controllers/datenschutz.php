<?php

namespace DEFAULTNAMESPACE\app\controllers;
use DEFAULTNAMESPACE\app\core\controller;
use DEFAULTNAMESPACE\app\helpers\session;
use DEFAULTNAMESPACE\app\models\login;

class datenschutz extends controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index():void
    {
        $data['title'] = 'Datenschutzerklärung';
        $data['firstlvl'] = 'Home';
        $data['lvl'] = 'Datenschutz';
        $data['pt'] = 'Datenschutzerklärung';
        $data['pst'] = '';
        $this->_view->render('header', $data);
        $this->_view->render('datenschutz/ansicht', $data, 0);
        $this->_view->render('footer', $data);
    }


}