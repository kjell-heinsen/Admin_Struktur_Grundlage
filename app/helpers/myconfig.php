<?php

namespace DEFAULTNAMESPACE\app\helpers;

class myconfig
{

    public function __construct()
    {
        //Nichts
    }


    public function WriteConfig($user, $name, $wert)
    {
        $db = new Database();
        $data['user'] = $user;
        $data['name'] = $name;
        $data['wert'] = $wert;

        $rows = $db->num_rows('SELECT id FROM config WHERE user = "' . $data['user'] . '"  AND name= "' . $data['name'] . '" LIMIT 1');
        if ($rows == 0) {
            return $db->insert('config', $data);
        } else {
            $update = array('wert' => $data['wert']);
            $update_where = array('user' => $data['user'], 'name' => $data['name']);
            return $db->update('config', $update, $update_where, 1);
        }


    }

    public function ReadConfig($user, $name)
    {
        $db = new Database();

        $query = 'SELECT  wert FROM config WHERE user = "' . $user . '"  AND name= "' . $name . '" LIMIT 1';
        list($wert) = $db->get_row($query);

        return $wert;

    }


}