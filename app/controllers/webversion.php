<?php

namespace DEFAULTNAMESPACE\app\controllers;
use DEFAULTNAMESPACE\app\core\controller;

class webversion extends controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index():void
    {
        $data['title'] = 'Startseite';
        $data['firstlvl'] = 'Home';
        $data['lvl'] = 'Startseite';
        $data['pt'] = 'Startseite';
        $data['user_id'] = $this->_userid;
        $data['pst'] = 'Willkommen bei ' . SITETITLE;
        $this->_view->render('header', $data);
        $this->_view->render('webversion/ansicht', $data, 0);
        $this->_view->render('footer', $data);
    }


}