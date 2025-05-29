<?php

namespace DEFAULTNAMESPACE\app\helpers;

class myglobal
{

    public function GetWKN()
    {
        return session::get('wkn');
    }

    public function GetChatWKN()
    {
        return session::get('chatwkn');
    }

    public function ShowNews($titel, $text, $typ = 'default', $art = '')
    {
        echo myglobal::mynews($typ, $art, $titel, $text);
    }

    public function mynews($titel, $text, $typ = 'default', $art = '')
    {
        $html = '';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12">';
        $html .= '    <div class="panel panel-' . $typ . '">';
        $html .= ' <div class="panel-heading">';
        $html .= '      <h3 class="panel-title">' . $art . ' ' . $titel . '</h3>';
        $html .= '   </div>';
        $html .= '   <div class="panel-body"> ';
        $html .= $text;
        $html .= ' </div> <!-- / .panel-body -->';
        $html .= '</div> <!-- / .panel -->';
        $html .= '</div>';
        $html .= '   </div>';


        if ($titel == '' or $text == '') {
            $html = '';
        }

        return $html;
    }

    public function mymodal($titel, $text, $typ = 'fade')
    {

        $html = '';
        $html .= '      <div class="modal modal-' . $typ . ' fade" id="modal-' . $typ . '">';

        $html .= '        <div class="modal-dialog">';
        $html .= '         <div class="modal-content">';
        $html .= '           <div class="modal-header">';
        $html .= '             <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        $html .= '              <span aria-hidden="true">&times;</span></button>';
        $html .= '            <h4 class="modal-title">' . $titel . '</h4>';
        $html .= '          </div>';
        $html .= '           <div class="modal-body">';
        $html .= '             <p>' . $text . '</p>';
        $html .= '          </div>';
        $html .= '          <div class="modal-footer">';
        $html .= '            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Schließen</button>';
        $html .= '          </div>';
        $html .= '        </div>';
        $html .= '       </div>';
        $html .= '    </div>';


        return $html;
    }


    public function myaccountkey($verbindung, $i = 0)
    {
        $length = 20;

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $characters[rand(0, $charactersLength - 1)];
        }

    }


    public static function myDatetime($timestamp)
    {
        $datum = date("d.m.Y", $timestamp);
        $uhrzeit = date("H:i", $timestamp);
        $date = $datum . " - " . $uhrzeit . " Uhr";

        return $date;
    }


    public static function Jahr()
    {
        $jahr = date("Y");
        return $jahr;

    }


    public static function MyDate($timestamp)
    {
        $datum = date("d.m.Y H:i:s", $timestamp);
        return $datum;

    }

    public static function sqldate($timestamp)
    {
        $datum = date("Y-m-d H:i:s", $timestamp);
        return $datum;
    }

    public static function money($zahl)
    {
        $zahl = number_format($zahl, 2, ",", ".") . ' €';
        return $zahl;
    }

    public static function myzahl($zahl)
    {
        $zahl = number_format($zahl, 0, ",", ".");
        return $zahl;
    }

    public static function prozent($zahl)
    {
        $zahl = $zahl * 100;
        $zahl = number_format($zahl, 2, ",", ".") . ' %';
        return $zahl;

    }


    public static function message($message, $type)
    {
        // danger, warning, success, info
        $string = '   <div class="alert alert-' . $type . ' alert-dismissable">'
            . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ' .
            $message . '</div>';

        if ($message == '') {
            $string = '';
        }

        echo $string;

    }

    public static function yellabel($string)
    {
        $string = '<span class="label label-warning">' . $string . '</span>';
        echo $string;
    }

    public static function bluelabel($string)
    {
        $string = '<span class="label label-info">' . $string . '</span>';
        echo $string;
    }

    public static function greenlabel($string)
    {
        $string = '<p><span class="label label-success">' . $string . '</span></p>';
        echo $string;
    }

    public static function redlabel($string)
    {
        $string = '<span class="label label-danger">' . $string . '</span>';
        echo $string;
    }

    public static function greenpercent($string, $action)
    {
        $pfeil = '';
        if ($action) {
            $pfeil = '<i class="fa fa-caret-up"></i>';
        }
        $string = '<span class="description-percentage text-green">' . $pfeil . ' ' . prozent($string) . ' </span>';
        echo $string;

    }

    public static function yelpercent($string, $action)
    {
        $pfeil = '';
        if ($action) {
            $pfeil = '<i class="fa fa-caret-left"></i>';
        }
        $string = '<span class="description-percentage text-yellow">' . $pfeil . ' ' . prozent($string) . ' </span>';
        echo $string;

    }

    public static function redpercent($string, $action)
    {
        $pfeil = '';
        if ($action) {
            $pfeil = '<i class="fa fa-caret-down"></i>';
        }
        $string = '<span class="description-percentage text-red">' . $pfeil . ' ' . prozent($string) . ' </span>';
        echo $string;

    }

    public static function mypanelbox($headline, $text)
    {
        $panel = '';
        $panel .= ' <div class="panel panel-body">';
        $panel .= '<h2>' . $headline . '</h2>';
        $panel .= '<p>' . $text . '</p>';
        $panel .= '</div>';

        echo $panel;
    }

    public static function GetIP()
    {
        if (!isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $client_ip = $_SERVER['REMOTE_ADDR'];

        } else {

            $client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        }
        return $client_ip;
    }


    public static function slackmessage($username, $message, $channel, $slackapi = '')
    {
        if ($slackapi == '') {
            if (defined('SLACKAPI')) {
                $slackapi = SLACKAPI;
            } else {
                $slackapi = SLACKAPI;
            }
        }

        $ch = curl_init("https://slack.com/api/chat.postMessage");
        $data = http_build_query([
            "token" => $slackapi,
            "channel" => $channel, //"#mychannel",
            "text" => $message, //"Hello, Foo-Bar channel message.",
            "username" => $username,
        ]);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_exec($ch);
        curl_close($ch);

        echo $slackapi;
        echo '<br/>';

    }


    function slackusers($verbindung, $timestamp, $count, $page, $slackapi = '')
    {
        if ($slackapi == '') {
            if (defined('SLACKAPI')) {
                $slackapi = SLACKAPI;
            }

        }


        $ch = curl_init("https://slack.com/api/team.accessLogs");
        $data = http_build_query([
            "token" => SLACKAPI,
            "before" => $timestamp, //"#mychannel",
            "count" => $count, //"Hello, Foo-Bar channel message.",
            "page" => $page,
        ]);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);

    }

}

