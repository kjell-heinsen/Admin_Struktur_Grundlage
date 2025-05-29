<?php

namespace DEFAULTNAMESPACE\app\uielements;

use DEFAULTNAMESPACE\app\helpers\myglobal;

class ui_modulagstruktur
{

    public function __construct()
    {

    }


    public static function set($wkn, $name, $stueck, $prozent)
    {
        $html = '';
        $html .= '<div class="row">';
        $html .= '<div class="col-xs-6 col-lg-3">';
        if ($name == 'Systembank') {
            $html .= $name;
        } else {
            $html .= '<a href="https://www.ag-spiel.de/index.php?section=profil&aktie=' . $wkn . '" target="_blank">' . $name . '(' . $wkn . ')</a>';
        }

        $html .= '</div>';
        $html .= '<div class="col-xs-3 col-lg-2">';
        $html .= '<b>' . MyGlobal::myzahl($stueck) . ' (' . MyGlobal::prozent($prozent) . ')  </p> </b>';
        $html .= '</div>';
        $html .= '<div class="col-xs-3 col-lg-1">';
        $html .= '<a type="button" class="btn btn-xs btn-flat btn-primary btn-block" href="" >Beobachten</a>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }


}
