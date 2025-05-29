
    <div class="row">
    <div class="col-md-6">
    <?php if(!is_null($data['news']['id'])){
        ?>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-newspaper"></i>
                  [News] <b><?= $data['news']['headline'] ?></b> <?php /* - von <?= $data['news']['autor'] ?> */ ?>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                   <p><?= $data['news']['text'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
    <div class="col-md-6">
        <?= $data['changelog_last'] ?>
    </div>
</div>

