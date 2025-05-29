<section class="content">
    <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>
        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Seite nicht gefunden.</h3>
            <p>
                Leider kann der von dir aufgerufene Link nicht gefunden werden. Vielleicht ist er woanders?
                Gehe zurück zur <a href="<?= \app\helpers\url::LINK('')  ?>">Startseite</a> oder benutze die Suche.
            </p>

                <div class="input-group">
                    <input type="text" name="error_search_input" id="error_search_input" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                        <button onclick="searcherror()" class="btn btn-warning"><i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
        </div>
    </div>

</br>
</br>

    <div class="row">
        <div class="col-md-12">
                 <div id="box_searchresultslinks" hidden class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-search"></i>
                          Ergebnisse Links
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <p id="searchresultslinks"></p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>



</section>
