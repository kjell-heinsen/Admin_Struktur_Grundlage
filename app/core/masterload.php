<?php

namespace DEFAULTNAMESPACE\app\core;

use DEFAULTNAMESPACE\app\helpers\url;

class masterload
{

    public function __construct()
    {

    }

    public static function Searchfiles()
    {
        $data['dir'] = self::MyDir();
        $path = DOCROOT . '/index/assets/ajax/' . $data['dir'] . '/';
        if ($data['dir'] == '404.php' or $data['dir'] == 'favicon.ico' or $data['dir'] == 'errorlog.html') {
            return false;

        } else {
            $files = scandir($path);

            if ($files <> false) {
                if (($key = array_search('.', $files)) !== false) {
                    unset($files[$key]);
                }
                if (($key = array_search('..', $files)) !== false) {
                    unset($files[$key]);
                }
            }
            return $files;
        }
    }

    public static function JSfiles()
    {
        $data['dir'] = self::MyDir();
        $files = self::Searchfiles();
        if ($files <> false) {
            foreach ($files as $file) {
                preg_match('#\.([a-z0-9]+)$#i', $file, $tmp);
                $endung = $tmp[1];
                $filearray = explode(".", $file);
                $myend = "." . $filearray[count($filearray) - 1];
                $file = basename($file, $myend);
                if ($endung == 'js') {
                    echo " <script src='" . url::JScript('assets/ajax/' . $data['dir'] . '/' . $file, '') . "'></script>\n";
                }
            }
        }
    }

    public static function CSSfiles()
    {
        $data['dir'] = self::MyDir();
        $files = self::Searchfiles();
        if ($files <> false) {
            foreach ($files as $file) {
                preg_match('#\.([a-z0-9]+)$#i', $file, $tmp);
                $endung = $tmp[1];
                $filearray = explode(".", $file);
                $myend = "." . $filearray[count($filearray) - 1];
                $file = basename($file, $myend);
                if ($endung == 'css') {
                    echo "     <link rel='stylesheet' href='" . url::STYLES('views/' . $data['dir'] . '/' . $file, '') . "'>\n";
                }
            }
        }
    }

    public static function AJAXfiles()
    {
        $data['dir'] = self::MyDir();
        $files = self::Searchajaxfiles();
        if ($files <> false) {
            foreach ($files as $file) {
                preg_match('#\.([a-z0-9]+)$#i', $file, $tmp);
                $endung = $tmp[1];
                $filearray = explode(".", $file);
                $myend = "." . $filearray[count($filearray) - 1];
                $file = basename($file, $myend);
                if ($endung == 'js') {
                    echo " <script src='" . url::JScript('assets/modul/' . $data['dir'] . '/' . $file, '') . "'></script>\n";
                }
            }
        }

    }

    public static function Searchajaxfiles()
    {
        $data['dir'] = self::MyDir();
        $path = DOCROOT . '/index/assets/modul/' . $data['dir'] . '/';
       // var_dump($path);
        if ($data['dir'] == '404.php' or $data['dir'] == 'favicon.ico' or $data['dir'] == 'errorlog.html') {
            return false;

        } else {
            $files = scandir($path);
           // var_dump($files);
            if ($files <> false) {
                if (($key = array_search('.', $files)) !== false) {
                    unset($files[$key]);
                }
                if (($key = array_search('..', $files)) !== false) {
                    unset($files[$key]);
                }
            }
            return $files;
        }
    }

    private static function MyDir()
    {
        $url = new main();
        $myurl = $url->_url;
        $data['dir'] = $myurl[0];
        if (empty($data['dir'])) {
            $data['dir'] = DefaultC;
        }
        return $data['dir'];
    }

}
