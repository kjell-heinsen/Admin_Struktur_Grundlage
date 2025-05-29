<?php

namespace DEFAULTNAMESPACE\app\uielements;
class ui_versionlookup
{

    public static function Go($version, $text, $autor, $datum, $colapse = true)
    {
        if ($colapse) {
            $colapse_text = 'collapsed-card';
        } else {
            $colapse_text = '';
        }

        $html = '';
        $html .= ' <div class="row">';
        $html .= '     <div class="col-md-12">    ';
        $html .= '<div class="card card-outline card-primary ' . $colapse_text . '">';
        $html .= ' <div class="card-header">';
        $html .= '    <h3 class="card-title">Inhalte der Version: <b>' . $version . '</b></h3>';
        $html .= '<div class="card-tools">';
        if ($colapse) {
            $html .= '<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>';
        } else {
            $html .= '<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>';
        }
        $html .= '</button>';
        $html .= '</div>';
        $html .= '  </div>';
        $html .= '  <div class="card-body"> ';
        $html .= '       <div class="row">';
        $html .= '      <div class="col-md-9">';
       // $html .= '<ol>';



        foreach ($text as $key => $item) {

                $myFeature = explode(':', $item);

                    $html .= '<li>';
                    switch ($myFeature[0]) {
                        case 'Fix':
                            $html .= ' <span class="badge badge-danger">'.$myFeature[0].'</span> : '.$myFeature[1];
                            break;
                        case 'Change':
                            $html .= ' <span class="badge badge-info">'.$myFeature[0].'</span> : '.$myFeature[1];
                            break;
                        case 'Feature':
                            $html .= ' <span class="badge badge-success">'.$myFeature[0].'</span> : '.$myFeature[1];
                            break;
                        case 'Tweak':
                            $html .= ' <span class="badge badge-warning">'.$myFeature[0].'</span> : '.$myFeature[1];
                            break;
                        default:
                            $html .= ' <span class="badge badge-dark">'.$myFeature[0].'</span> : '.$myFeature[1];
                            break;
                    }
                    $html .= '</li>';

                }

      //  $html .= '</ol>';
        $html .= '      </div>';
        $html .= '      <div class="col-md-2">';
        $html .= $datum;
        $html .= '      </div>';
        $html .= '      <div class="col-md-1">';
        $html .= '<b>' . $autor . '</b>';
        $html .= '      </div>';
        $html .= '       </div>         ';
        $html .= ' </div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= ' </div> ';


        return $html;

    }


}
