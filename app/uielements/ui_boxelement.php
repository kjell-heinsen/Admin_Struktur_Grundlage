<?php

namespace DEFAULTNAMESPACE\app\uielements;
class ui_boxelement
{


    public static function set($titel, $body, $onclick, $typ = 'warning', $new = '')
    {
        $html = '';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12">';
        $html .= '  <div class="box collapsed-box box-' . $typ . '">';
        $html .= '<div class="box-header with-border">';
        $html .= '<h3 class="box-title">' . $titel . '</h3>';
        $html .= '<div class="box-tools pull-right ">';
        $html .= '  <span data-toggle="tooltip" title="" class="badge bg-blue-active" data-original-title="3 New Messages">' . $new . '</span>';
        $html .= '<button class="btn btn-box-tool" data-widget="collapse" onclick="' . $onclick . '" data-toggle="tooltip" title="Aufklappen"><i class="fa fa-plus"></i></button>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="box-body">';
        $html .= $body;
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }


}



