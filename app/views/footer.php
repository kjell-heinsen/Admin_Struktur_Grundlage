<?php

use DEFAULTNAMESPACE\app\helpers\myglobal;
use DEFAULTNAMESPACE\app\helpers\url;
use DEFAULTNAMESPACE\appversion;

?>
</div>
</section>

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <strong>&copy;  <?= myglobal::Jahr() ?> <a href="<?= DIR ?>"><?= COPYRIGHT ?></a>.</strong> All rights reserved.
    </div>
    <a href="<?= url::LINK('webversion/') ?>"> <?= $version = appversion::get() ?: '-' ?></a> |
    <a href="<?= url::LINK('impressum/') ?>">Impressum</a> | <a href="<?= url::LINK('datenschutz/') ?>">Datenschutz</a> |
    <a href="<?= url::LINK('changelog/') ?>">Changelog</a>
    <?php /*  | <b><a href="<?= URL::LINK('upgrade/') ?>">Upgrade</a></b> |  <a href="<?= URL::LINK('about/') ?>">About</a>*/?>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3 control-sidebar-content">
  <div class="mb-1"><input class="mr-1" name="darkmode" type="checkbox" checked value="1"> <span>Darkmode</span></div>


    </div>
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php /*
<script>
    var notifer = "<?= DIR ?>ajax/notify/<?=LibPseudoCrypt::hash($data['user_id']) ?>/<?= Ajax_Model::GetAPIKey($data['user_id']) ?>/";
    setInterval(function(){LoadNotify(notifer)},5000);
</script> */ ?>
<!-- jQuery -->
<?php /* <script src="<?= URL::JScript('plugins/jquery/jquery.min') ?>"></script> */ ?>
<!-- Bootstrap 4 -->
<script src="<?= url::JScript('plugins/bootstrap/js/bootstrap.bundle.min') ?>"></script>

<script src="<?= url::JScript('plugins/sweetalert2/sweetalert2.min') ?>"></script>

<script src="<?= url::JScript('plugins/toastr/toastr.min') ?>"></script>

<!-- AdminLTE App -->
<script src="<?= url::JScript('dist/js/adminlte.min') ?>"></script>
<script src="<?= url::JScript('modul/all/generalnotes') ?>"></script>
<!-- AdminLTE for demo purposes -->

<script>
  $('#mymodal').modal('hide');
<?php $tod = 'emotion'; ?>
//  setTimeout(MyOption("<?= $tod ?>"),2500);



  //  setInterval( MyModalShow, 5000 );
<?php /*    function LoadNotify() {
        $.post("<?= DIR ?>ajax/notify/<?=LibPseudoCrypt::hash($data['user_id']) ?>/<?= Ajax_Model::GetAPIKey($data['user_id']) ?>/", $.now(), function(data, textStatus) {
            //data contains the JSON object
            $.each(data, function(i, item) {
            $(document).Toasts('create', {
                title: item.headline,
                class: item.klasse,
                autohide: item.autohide,
                position: 'bottomRight',
                delay: item.delay,
                body: item.text
            })
            });
            //textStatus contains the status: success, error, etc
        }, "json");
    }

    function OpenModal(myvalue){
        $('#formdiv').load(window.location.protocol+'//'+window.location.host+'/'+myvalue);
        console.log(window.location.protocol+'//'+window.location.host+'/'+myvalue);
        $('#mymodal').modal('show');
    }

    function MyModalShow(myvalue){
        $.post("<?= DIR ?>ajax/modal/<?= LibPseudoCrypt::hash($data['user_id']) ?>/<?= Ajax_Model::GetAPIKey($data['user_id']) ?>/", $.now(), function(data, textStatus) {
          //  $.each(data, function(i, item) {
            $('#formdiv').load('ajax/modal/');
               // $('#modalhead').text(item.headline);
               // $('#modaltext').text(data);
                console.log("Modal");
                $('#mymodal').modal('show');
          //  });
        }, "json");

        $('#formdiv').load(window.location.protocol+'//'+window.location.host+'/'+myvalue);
        // $('#modalhead').text(item.headline);
        // $('#modaltext').text(data);
        console.log("Modal");
        $('#mymodal').modal('show');
    }
 */ ?>

</script>
<?php /*<script src="<?= URL::JScript('dist/js/demo') ?>"></script> */ ?>
</body>
</html>
