<?php

namespace DEFAULTNAMESPACE\app\core;
use kasapi;
use KasConfiguration;

class updater
{

    private $_kasuser;
    private $_kaspw;

    private $_kasapi;


    private $_kasconfig;

    public function __construct()
    {
        $this->_kasuser = KASUSER;
        $this->_kaspw = KASPW;
        $this->_kasconfig = new KasConfiguration($this->_kasuser, sha1($this->_kaspw), "sha1");
        $this->_kasapi = new kasapi($this->_kasconfig);
    }

    /**
     * @return string
     */
    public function getKasuser(): string
    {
        return $this->_kasuser;
    }

    /**
     * @param string $kasuser
     */
    public function setKasuser(string $kasuser): void
    {
        $this->_kasuser = $kasuser;
    }

    public function GetSubdomain($name = '')
    {
        $param = array('subdomain_name' => $name,);
        $return = $this->_kasapi->get_subdomains($param);
        return $return;
    }


    public function SetNewPath($path)
    {

        $param = array(
            'subdomain_name' => DOMAIN,
            'subdomain_path' => '/CuK/webseiten/epsilon.cuk-index.de/',
        );
        $this->_kasapi->update_subdomain($param);
    }


}
