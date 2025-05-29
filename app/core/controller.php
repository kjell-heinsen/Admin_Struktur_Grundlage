<?php

namespace DEFAULTNAMESPACE\app\core;

use DEFAULTNAMESPACE\app\helpers\formats;
use DEFAULTNAMESPACE\app\helpers\myforms;
use DEFAULTNAMESPACE\app\helpers\mymail;
use DEFAULTNAMESPACE\app\records;


class controller extends main
{


    protected $_view;
    protected $_model;
    protected $_basemodel;



    protected $_classname;

    protected $_runmodul;


    protected $_myglobals;


    function __construct()
    {
        global $runmodul;
        $this->_runmodul = $runmodul;
        $this->_view = new view();
        $this->_basemodel = new model();
        if (class_exists('app\helpers\myglobal')) {
            $this->_myglobals = new myglobal();
        }

       $this->_classname = get_class($this);

        $class_parts = explode('\\', $this->_classname);
        $this->_classname = end($class_parts);

        try {

            $this->_classname = 'DEFAULTNAMESPACE\app\models\\' . $this->_classname;
            if(class_exists($this->_classname)) {
                $this->_model = new $this->_classname();
            }
        } catch(\Exception $e){

        }

    }

    protected function RegisterModul($name, $version, $link = '')
    {
        $data[$name]['name'] = $name;
        $data[$name]['version'] = $version;
    }


}
