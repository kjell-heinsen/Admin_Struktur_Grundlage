<?php

namespace DEFAULTNAMESPACE\app\uielements;
class ui_panelelement
{


    public static function set($titel, $body, $typ = 'warning')
    {
        $html = '';
        $html .= '  <div class="login-panel panel panel-' . $typ . '">';
        $html .= '<div class="panel-heading">';
        $html .= '<h3 class="panel-title">' . $titel . '</h3>';
        $html .= '</div>';
        $html .= '<div class="panel-body">';
        $html .= $body;
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }


}