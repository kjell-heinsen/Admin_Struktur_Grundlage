<?php


namespace app\helpers;

class ICON
{

    public function __construct()
    {

    }

    public function RANG($bildname, $name = '')
    {
        $mypath = 'rang/' . $bildname;
        if (file_exists(ICON::myDOCROOTPath($mypath . '.png'))) {
            return '<img class="center" src="' . URL::ICON($mypath) . '" alt="' . $name . '"> ' . $name;
        } else {
            if ($name == '') {
                $name = '<i class="fa fa-smile-o"></i>';
            }
            return $name;
        }
    }


    public function UI($bildname, $name = '')
    {
        $mypath = 'ui/' . $bildname;
        if (file_exists(ICON::myDOCROOTPath($mypath . '.png'))) {
            return '<img class="center" src="' . URL::ICON($mypath) . '" alt="' . $name . '"> ' . $name;
        } else {
            if ($name == '') {
                $name = '<i class="fa fa-smile-o"></i>';
            }
            return $name;
        }
    }


    public function ALL($bildname, $name = '')
    {
        $mypath = 'all/' . $bildname;
        if (file_exists(ICON::myDOCROOTPath($mypath . '.png'))) {
            return '<img class="center" src="' . URL::ICON($mypath) . '" alt="' . $name . '"> ' . $name;
        } else {
            if ($name == '') {
                $name = '<i class="fa fa-smile-o"></i>';
            }
            return $name;
        }

    }

    public function AWARD($bildname, $name = '')
    {
        $mypath = 'award/' . $bildname;
        if (file_exists(ICON::myDOCROOTPath($mypath . '.png'))) {
            return '<img class="center" src="' . URL::ICON($mypath) . '" alt="' . $name . '"> ' . $name;
        } else {
            if ($name == '') {
                $name = '<i class="fa fa-smile-o"></i>';
            }
            return $name;
        }

    }


    public function myDOCROOTPath($path)
    {
        return DOCROOT . '/static/icon/' . $path;
    }

}
