<?php

namespace DEFAULTNAMESPACE\app\uielements;

use DEFAULTNAMESPACE\app\helpers\MyGlobal;

class ui_depotwatch
{

    public function __construct()
    {

    }


    public static function set($wkn, $name, $stueckzahl, $kurs, $old_stueckzahl, $old_kurs)
    {
        $html = '';
        $bw = $stueckzahl * $kurs;
        $bw = MyGlobal::money($bw);
        $prozent = 100 - (($kurs / $old_kurs));
        //  $prozent = $prozent - 100;
        // $prozent = $prozent / 100;

        $html .= '<div class="row">';
        $html .= '<div class="col-xs-6 col-lg-3">';
        //  $html .=  '<b>'.$wkn.': '.$name.'</b>';
        $html .= '<a href="https://www.ag-spiel.de/index.php?section=profil&aktie=' . $wkn . '" target="_blank">' . $name . '(' . $wkn . ')</a>';
        $html .= '</div>';
        $html .= '<div class="hidden-xs col-lg-2">';
        $html .= '<div class="hidden-xs col-lg-6">';
        $html .= '<b><p class="text-right">';

        $html .= myglobal::myzahl($stueckzahl);
        $html .= ' </p> </b>';
        $html .= '</div>';
        $html .= '<div class="hidden-xs col-lg-6">';
        $html .= '<b><p class="text-right">';
        $html .= '(' . myglobal::money($kurs) . ')'; //  >>>>> >>>>  '.$old_kurs.' = '.myglobal::prozent($prozent);
        $html .= ' </p> </b>';
        $html .= '</div>';

        $html .= '</div>';
        $html .= '<div class="col-xs-3 col-lg-2">';
        if ($kurs > $old_kurs) {
            $html .= '<b><p class="text-right text-green">' . $bw . '</p>  </b>';
        } else {
            $html .= '<b><p class="text-right text-danger">' . $bw . '</p>  </b>';
        }
        //  $html .= '<b><p class="text-right text-danger">' .$bw . '</p>  </b>';


        $html .= '</div>';
        $html .= '<div class="hidden-xs col-lg-1">';
        //   $html .=   '<a type="button" class="btn btn-xs btn-flat btn-primary btn-block" href="'.URL::LINK('mitglieder/edit/'.$wkn.'/').'" >Bearbeiten</a>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }


}
