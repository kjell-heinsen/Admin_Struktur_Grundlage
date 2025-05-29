<?php

namespace DEFAULTNAMESPACE\app\helpers;

class dbactions
{


    public static function GetWKNList()
    {
        $db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        //      $query = "SELECT data FROM mydash_ags_data order by datum desc LIMIT 1";
        $query = "SELECT * FROM mydash_ag_spieler order by wkn";
        $players = $db->get_results($query);


        foreach ($players as $player) {
            echo '"' . $player['wkn'] . '"' . ",";
            //    echo '"'.$ags['name'].'('.$ags['wkn'].')"'.",";
            /*    foreach ($ags as $ag) {
                 echo '"'.$ag['wkn'].'"'.",";
                } */
        }
    }


    public static function GetRangByWkn($wkn)
    {
        /*     $db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
             $query = 'SELECT mydash_rang.name AS Rang FROM mydash_member '.
                      'LEFT OUTER JOIN cukwp_users on mydash_member.cukwp_users_id = cukwp_users.id '.
                      'LEFT OUTER JOIN mydash_rang on mydash_member.mydash_rang_id = mydash_rang.id '.
                      'WHERE cukwp_users.user_login = "'.$wkn.'"';
             list($rang) = $db->get_row($query);
             if($rang == '')
             {
                $rang = 'Kein Rang';
             }
            return $rang; */
    }

    public static function GetRangzusatzByWkn($wkn)
    {
        /*     $db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
             $query = 'SELECT mydash_member.rangzusatz AS Rang FROM mydash_member '.
                 'LEFT OUTER JOIN cukwp_users on mydash_member.cukwp_users_id = cukwp_users.id '.
                 'LEFT OUTER JOIN mydash_rang on mydash_member.mydash_rang_id = mydash_rang.id '.
                 'WHERE cukwp_users.user_login = "'.$wkn.'"';
             list($rang) = $db->get_row($query);
                 return $rang; */
    }


    public static function GetLevelByWkn($wkn)
    {
        /*    $db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $query = 'SELECT mydash_rang.level AS Level FROM mydash_member '.
                'LEFT OUTER JOIN cukwp_users on mydash_member.cukwp_users_id = cukwp_users.id '.
                'LEFT OUTER JOIN mydash_rang on mydash_member.mydash_rang_id = mydash_rang.id '.
                'WHERE cukwp_users.user_login = "'.$wkn.'"';
            list($lvl) = $db->get_row($query);
            if($lvl == '')
            {
                $lvl = 0;
            }
            return $lvl; */
    }


}