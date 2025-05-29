<?php

namespace DEFAULTNAMESPACE\app\uielements;
class ui_modulstatus
{

    public function __construct()
    {

    }


    public static function set($name, $status, $anzeige)
    {
        $html = '';
        $html .= '<div class="row">';
        $html .= '<div class="col-xs-5">';
        $html .= '<b>' . $name . '</b>';
        $html .= '</div>';
        $html .= '<div class="col-xs-4">';
        $html .= '<b><p class="' . $anzeige . '">' . $status . '</p> </b>';
        /*   switch ($status)
           {
               case "aktiv":
                   $html .= '<b><p class="text-green">Aktiv</p> </b>';
                   break;
               case "inaktiv":
                   $html .= '<b><p class="text-red">Inaktiv</p> </b>';
                   break;
               case "wartung":
                   $html .= '<b><p class="text-yellow">Wartung</p> </b>';
                   break;
               case "soon":
                   $html .= '<b><p class="text-gray">Wird demnächst veröffentlicht!</p> </b>';
                   break;
           } */
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }


}
