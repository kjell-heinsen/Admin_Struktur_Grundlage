<?php

namespace DEFAULTNAMESPACE\app\core;

use DEFAULTNAMESPACE\app\helpers\myglobal;

class mantischangelog extends model
{


    public function GetChangelog($project_id, $released = 1)
    {
        $changelog = '';
        $query = 'SELECT version,date_order FROM mantis_project_version_mantis WHERE project_id = "' . $project_id . '" AND released = ' . $released . ' ORDER BY date_order DESC';
        $count = $this->_dbmantis->num_rows($query);
        if ($count > 0) {
            $versions = $this->_dbmantis->get_results($query);

            $query = 'SELECT version,date_order FROM mantis_project_version_mantis WHERE project_id = "' . $project_id . '" AND released = ' . $released . ' ORDER BY date_order DESC';
            $bugs = $this->_dbmantis->get_results($query);

            foreach ($versions as $version) {
                $query = 'SELECT summary FROM mantis_bug_mantis WHERE project_id = "' . $project_id . '" AND fixed_in_version = "' . $version['version'] . '"';
                $bugs = $this->_dbmantis->get_results($query);
                $changelog .= "<h4>" . $version['version'] . " - " . MyGlobal::myDate($version['date_order']) . "</h4>";
                $changelog .= "<ul>";
                foreach ($bugs as $bug) {
                    $changelog .= "<li>" . $bug['summary'] . "</li>";
                }
                $changelog .= "</ul>";
            }
        } else {
            $changelog .= "<h4>Keinen Changelog gefunden. </h4>";
        }

        return $changelog;
    }


    public function GetRoadMap($project_id)
    {

    }

}