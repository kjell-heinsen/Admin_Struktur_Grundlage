<?php

namespace DEFAULTNAMESPACE\app\uielements;
class ui_bewerbungwatch
{

    public function __construct()
    {

    }


    public static function set()
    {
        $html = '';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12">';
        $html .= '<b>Keine Bewerbungen vorhanden.</b>';
        $html .= '</div>';
        $html .= '</div>';
        /*  $html .= '<div class="row">';
          $html .= '<div class="col-xs-6 col-lg-3">';
            $html .=  '<b><a href="https://www.ag-spiel.de/index.php?section=profil&aktie='.$wkn.'" target="_blank">'.$wkn.'</a>: '.$name.'</b>';
          //$html .=  '<a href="https://www.ag-spiel.de/index.php?section=profil&aktie='.$wkn.'">'.$name.'('.$wkn.')</a>';
          $html .= '</div>';
          $html .= '<div class="hidden-xs col-lg-2">';
          $html .= '<b>'.$ceo.'  </p> </b>';
          $html .= '</div>';
            $html .= '<div class="col-xs-3 col-lg-2">';
             $html .= '<b>' . $rang . '  </p> </b>';

            $html .= '</div>';
            $html .= '<div class="hidden-xs col-lg-1">';
            $html .=   '<a type="button" class="btn btn-xs btn-flat btn-primary btn-block" href="'.URL::LINK('mitglieder/edit/'.$wkn.'/').'" >Bearbeiten</a>';
            $html .= '</div>';
          $html .= '</div>'; */
        echo $html;
    }


}
