<?php
namespace DEFAULTNAMESPACE\app\controllers;
use DEFAULTNAMESPACE\app\core\controller;
use DEFAULTNAMESPACE\app\models\login;
use DEFAULTNAMESPACE\app\core\changelog;



class start extends controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Startseite';
        $data['firstlvl'] = 'Home';
        $data['lvl'] = 'Startseite';
        $data['pt'] = 'Startseite';
        $data['pst'] = 'Willkommen bei ' . SITETITLE;

        $data['news'] = $this->_model->LastNews();
        $data['changelog_last'] = changelog::last();
        $this->_view->render('header', $data);
        $this->_view->render('start/ansicht', $data);
        $this->_view->render('footer', $data);
    }




}
