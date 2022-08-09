<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 mb-2">
                <div class="card">
                    <a href="/parkir/depan" class="btn">
                        <div class="card-body">
                            <h5 class="card-title text-roboto">AREA DEPAN</h5>
                            <h6 class="card-subtitle mb-3 text-muted">Tersisa 5</h6>
                            <div class="card-text text-center d-flex gap-2 justify-content-center">
                                <p class="bg-secondary text-white rounded px-2 py-2">Vehicle <br> <?= $exist['parkir_depan']; ?></p>
                                <p class="bg-success text-white d-flex align-items-center rounded px-2">Capacity <br><?= $capacity['parkir_depan']; ?></p>
                                <p class="bg-danger text-white d-flex align-items-center rounded px-2">Empty <br><?= $capacity['parkir_depan'] - $exist['parkir_depan']; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 mb-2">
                <div class="card">
                    <a href="/parkir/stall_bp" class="btn">
                        <div class="card-body">
                            <h5 class="card-title text-roboto">STALL BP</h5>
                            <h6 class="card-subtitle mb-3 text-muted">Tersisa 5</h6>
                            <div class="card-text text-center d-flex gap-2 justify-content-center">
                                <p class="bg-secondary text-white rounded px-2 py-2">Vehicle <br> <?= $exist['stall_bp']; ?></p>
                                <p class="bg-success text-white d-flex align-items-center rounded px-2">Capacity <br><?= $capacity['stall_bp']; ?></p>
                                <p class="bg-danger text-white d-flex align-items-center rounded px-2">Empty <br><?= $capacity['stall_bp'] - $exist['stall_bp']; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 mb-2">
                <div class="card">
                    <a href="/parkir/stall_gr" class="btn">
                        <div class="card-body">
                            <h5 class="card-title text-roboto">STALL GR</h5>
                            <h6 class="card-subtitle mb-3 text-muted">Tersisa 5</h6>
                            <div class="card-text text-center d-flex gap-2 justify-content-center">
                                <p class="bg-secondary text-white rounded px-2 py-2">Vehicle <br> <?= $exist['stall_gr']; ?></p>
                                <p class="bg-success text-white d-flex align-items-center rounded px-2">Capacity <br><?= $capacity['stall_gr']; ?></p>
                                <p class="bg-danger text-white d-flex align-items-center rounded px-2">Empty <br><?= $capacity['stall_gr'] - $exist['stall_gr']; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>