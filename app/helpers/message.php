<?php
namespace DEFAULTNAMESPACE\app\helpers;

class message
{

    public static function show($message = false, $type = false)
    {
        $message = $message ? $message : session::get('message');
        $type = $type ? $type : session::get('message_type');
        $type = $type ? $type : 'success';

        if ($message) {
            require 'views/message.php';
            Session::clear('message');
            Session::clear('message_type');
        }
    }

    public static function set($message = false, $type = 'success')
    {
        Session::set('message', $message);
        Session::set('message_type', $type);
    }
}