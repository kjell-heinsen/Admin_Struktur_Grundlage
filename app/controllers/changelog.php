<?php

namespace DEFAULTNAMESPACE\app\controllers;
use DEFAULTNAMESPACE\app\core\Controller;



class changelog extends controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index():void
    {

       $data['title'] = 'Changelog';
        $data['firstlvl'] = 'Home';
        $data['lvl'] = 'Changelog';
        $data['pt'] = 'Changelog';
        $data['pst'] = 'Alle Veränderungen im Überblick.';
        $data['changelog_last'] = \DEFAULTNAMESPACE\app\core\changelog::last();
        $data['changelog_all'] = \DEFAULTNAMESPACE\app\core\changelog::all();
        $this->_view->render('header', $data);
        $this->_view->render('changelog/ansicht', $data, 0);
        $this->_view->render('footer', $data);
    }

}