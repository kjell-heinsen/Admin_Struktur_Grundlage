<?php
namespace DEFAULTNAMESPACE\app\core;
use DEFAULTNAMESPACE\app\helpers\database;

class model
{

    protected $_db;
    protected $_dbblog;
    protected $_WPprefix;
    protected $_WPusertable;

    public function __construct()
    {
        $this->_db = new database(DB_HOST_MANTIS, DB_USER_MANTIS, DB_PASS_MANTIS, DB_NAME_MANTIS);
// $this->_db = new Database(DB_HOSTDASH, DB_USERDASH, DB_PASSDASH, DB_NAMEDASH);


    }

}