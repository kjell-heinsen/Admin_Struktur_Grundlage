<?php
namespace DEFAULTNAMESPACE\app\models;
use DEFAULTNAMESPACE\app\core\model;


class start extends model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function LastNews(){
        $news = array();
        $query = "SELECT * FROM news WHERE  aktiv = 1 ORDER BY ID DESC LIMIT 1";
        list($news['id'], $news['headline'], $news['text'], $news['autor']) = $this->_db->get_row($query);
        return $news;
    }

}