<?php

namespace DEFAULTNAMESPACE\app\uielements;

use DEFAULTNAMESPACE\app\helpers\dbactions;
use DEFAULTNAMESPACE\app\helpers\url;

class ui_memberwatch
{

    public function __construct()
    {

    }


    public static function set($wkn, $name, $ceo, $rang)
    {
        $html = '';
        $rangzusatz = dbactions::GetRangzusatzByWkn($wkn);

        $html .= '<div class="row">';
        $html .= '<div class="col-xs-6 col-lg-3">';
        $html .= '<b><a href="https://www.ag-spiel.de/index.php?section=profil&aktie=' . $wkn . '" target="_blank">' . $wkn . '</a>: ' . $name . '</b>';
        //$html .=  '<a href="https://www.ag-spiel.de/index.php?section=profil&aktie='.$wkn.'">'.$name.'('.$wkn.')</a>';
        $html .= '</div>';
        $html .= '<div class="hidden-xs col-lg-2">';
        $html .= '<b>' . $ceo . '  </p> </b>';
        $html .= '</div>';
        $html .= '<div class="col-xs-3 col-lg-2">';
        if ($rangzusatz == '') {
            $html .= '<b>' . $rang . '  </p> </b>';
        } else {
            $html .= '<b>' . $rang . ' - ' . $rangzusatz . '  </p> </b>';
        }
        $html .= '</div>';
        $html .= '<div class="hidden-xs col-lg-1">';
        $html .= '<a type="button" class="btn btn-xs btn-flat btn-primary btn-block" href="' . URL::LINK('mitglieder/edit/' . $wkn . '/') . '" >Bearbeiten</a>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }


}
