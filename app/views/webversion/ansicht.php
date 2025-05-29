<?php

use DEFAULTNAMESPACE\app\helpers\url;

?>
<div class="row">
       <div class="col-md-12">

           <div class="card card-primary card-outline">
               <div class="card-header">
                   <h3 class="card-title">
                       <i class="fas fa-edit"></i>
                     Übersicht über die Version
                   </h3>
               </div>
               <div class="card-body">
                   <div class="row">
                       <div class="col-sm-12">
                           <b>Dateiversion: </b>  <?php /* <a href="<?=  URL::LINK('webversion/gesamt/') ?>">   */ ?>  <?= FILEVERSION ?>  <?php /* - <b><?= AppVersion::getcount(); ?></b> Commits </a> */ ?>
                       </div>
                   </div>
                   <?php /*
                   $version = file_get_contents('https://'.$_SERVER['SERVER_NAME'].'/nextversion/');
                   if($version > FILEVERSION)
                   { ?>
                       <div class="row">
                           <div class="col-sm-10">
             <b>Nächste Version:</b>  <?= '<b>'.$version.' kommt um 22 Uhr.</b>'   ?>
                           </div>


                               <div class="col-sm-2">
                                   <a class="btn btn-block btn-default" href="<?= URL::LINK('upgrade/get/') ?>">Upgrade</a>
                               </div>

                       </div>
                       <?php
                   } */
                   ?>
                   <div class="row">
                       <div class="col-sm-12">
                           <b>Letzte Änderung(Dateien):</b>  <?= \DEFAULTNAMESPACE\appversion::getdate(); ?>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-sm-12">
                           <b>Zum Changelog:</b> <a href="  <?=  URL::LINK('changelog/') ?> "> Changelog</a>
                           <?php /*        <b>Letzter Commit:</b>       <a href="  <?=  URL::GITLINK(AppVersion::gethash()) ?> "> <?= AppVersion::gethash(); ?></a> */ ?>
                       </div>
                   </div>
                   <?php /*           <div class="row">
       <div class="col-md-4">
       <b>Coreversion:</b>
       </div>
       <div class="col-md-4">
       <a href="<?=  URL::LINK('webversion/core/') ?>"> <?= COREVERSION ?>  </a>
        </div>
        </div>
       <div class="row">
       <div class="col-md-4">
       <b>Letzte Änderung(Core):</b>
       </div>
       <div class="col-md-4">
        <?= VERSIONCORETIME ?>
        </div>
        </div>
         <div class="row">
       <div class="col-md-4">
       <b>Precoreversion:</b>
       </div>
       <div class="col-md-4">
   <a href="<?=  URL::LINK('webversion/precore/') ?>">   <?= PRECOREVERSION ?>    </a>
        </div>
        </div>
       <div class="row">
       <div class="col-md-4">
       <b>Letzte Änderung(Precore):</b>
       </div>
       <div class="col-md-4">
        <?= VERSIONPRECORETIME ?>
        </div>
        </div>
                      <div class="row">
       <div class="col-md-4">
       <b>Subcoreversion:</b>
       </div>
       <div class="col-md-4">
   <a href="<?=  URL::LINK('webversion/subcore/')  ?>"> <?= SUBCOREVERSION ?>  </a>
        </div>
        </div>
       <div class="row">
       <div class="col-md-4">
       <b>Letzte Änderung(Subcore):</b>
       </div>
       <div class="col-md-4">
        <?= VERSIONSUBCORETIME ?>
        </div>
        </div>
       <div class="row">
       <div class="col-md-4">
       <b>Datenbankversion:</b>
       </div>
       <div class="col-md-4">
    <a href="#<?=  URL::LINK('webversion/datenbank/') ?>">  <?= DBVERSION ?>    </a>
        </div>
        </div>
       <div class="row">
       <div class="col-md-4">
       <b>Letzte Änderung(Datenbank):</b>
       </div>
       <div class="col-md-4">
        <?= VERSIONDBTIME ?>
        </div>
        </div>
       */ ?>
               </div>

           </div>


</div>
   </div>

