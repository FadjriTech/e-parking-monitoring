<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parkir | Depan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/parkir/depan/style.css">

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Interact.JS -->
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>

    <section class="main-section">

        <h1 class="headline">Area Parkir</h1>
        <div class="main-area" id="main-area">
            <div class="legend">
                <h6 class="text-lato">Keterangan</h6>
                <div class="legend-wrap">
                    <div class="legend-orange"></div>
                    Gedung
                    <div class="legend-blue"></div>
                    Parkiran GR
                    <div class="legend-yellow"></div>
                    Parkiran BP
                    <div class="legend-dash"></div>
                    Parkiran Bayangan
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex w-100 parkir-wrap justify-content-between">

                            <div class="gedung-wrap">
                                <img src="/assets/gedung-akastra.png" class="gedung">
                            </div>

                            <!-- Area Parkir Depan -->
                            <div class="d-flex flex-column justify-content-between align-items-center" style="padding-right: 20px;">

                                <!-- Parkiran GR  AKA Grup A-->
                                <div class="d-flex gap-1 w-100 justify-content-end" style="padding-right: 100px">
                                    <?php for ($position = 1; $position <= 9; $position++) : ?>
                                        <?php $key = $controller->cari_parkir($grupA, $position); ?>
                                        <a class="seat-blue seat-vertical text-white" grup="A" id="<?= rand($position * time(), 10 * time()); ?>" position="<?= $position; ?>" parking-name="Parkiran GR">
                                            <?= (!empty($key) || $key === 0) ? $grupA[$key]['model_code'] . " | " . $grupA[$key]['license_plate'] . "<br>" . $grupA[$key]['category'] : "" ?>
                                        </a>
                                    <?php endfor; ?>
                                </div>
                                <!-- Batas Parkiran GR -->

                                <!-- Jalan Parkiran Bayangan GR AKA Grup B -->
                                <div class="d-flex-column gap-1 w-100 justify-content-end">
                                    <?php for ($i = 1; $i <= 2; $i++) : ?>
                                        <?php
                                        $positionStart     = 1;
                                        $positionEnd       = 6;

                                        if ($i == 2) {
                                            $positionStart = 7;
                                            $positionEnd   = 12;
                                        }
                                        ?>

                                        <div class="d-flex gap-2 my-2">
                                            <?php for ($position = $positionStart; $position <= $positionEnd; $position++) : ?>
                                                <?php $key = $controller->cari_parkir($grupB, $position); ?>
                                                <a class="seat seat-horizontal text-dark" grup="B" id="<?= rand($i * time(), 10 * time()); ?>" position="<?= $position; ?>" parking-name="Parkiran Bayangan GR">
                                                    <?= (!empty($key) || $key === 0) ? $grupB[$key]['model_code'] . " | " . $grupB[$key]['license_plate'] . "<br>" . $grupB[$key]['category'] : "" ?>
                                                </a>
                                            <?php endfor; ?>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                                <!-- Batas Jalan Parkiran Bayangan GR -->

                                <!-- Parkiran Dekat Satpam AKA Grup C -->
                                <div class="d-flex flex-column gap-1 w-100">
                                    <?php for ($i = 1; $i <= 2; $i++) : ?>

                                        <?php
                                        $positionStart     = 1;
                                        $positionEnd       = 5;

                                        if ($i == 2) {
                                            $positionStart = 6;
                                            $positionEnd   = 10;
                                        }
                                        ?>

                                        <div class="d-flex gap-1 justify-content-end">
                                            <?php for ($position = $positionStart; $position <= $positionEnd; $position++) : ?>
                                                <?php $key = $controller->cari_parkir($grupC, $position); ?>
                                                <?php $seat = 'seat-blue text-white';
                                                $name = 'Parkiran GR'; ?>

                                                <?php if ($position == 1 || $position == 6) {
                                                    $seat = 'seat text-dark';
                                                    $name = 'Parkiran Bayangan GR';
                                                } else {
                                                    $name = 'Parkiran GR';
                                                }; ?>
                                                <a class="<?= $seat; ?> seat-vertical" id="<?= rand($i * time(), 10 * time()); ?>" grup="C" position="<?= $position; ?>" parking-name="<?= $name; ?>">
                                                    <?= (!empty($key) || $key === 0) ? $grupC[$key]['model_code'] . " | " . $grupC[$key]['license_plate'] . "<br>" . $grupC[$key]['category'] : "" ?>
                                                </a>
                                            <?php endfor; ?>

                                            <!-- Area Satpam & Parkiran -->
                                            <div class="security-office">
                                                <?= ($i == 1) ? 'Pos Satpam' : "Parkir Motor"; ?>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                                <!-- Batas Parkiran Dekat Satpam -->


                                <!-- Parkiran Bayangan BP AKA Grup D -->
                                <div class="d-flex w-100 justify-content-end gap-1">
                                    <?php $key = $controller->cari_parkir($grupD, 1); ?>
                                    <a class="seat seat-vertical mt-2 me-2" position="1" grup="D" id="<?= rand(1 * time(), 10 * time()); ?>" parking-name="Parkiran Bayangan BP">
                                        <?= (!empty($key) || $key === 0) ? $grupD[$key]['model_code'] . " | " . $grupD[$key]['license_plate'] . "<br>" . $grupD[$key]['category'] : "" ?>
                                    </a>
                                    <div class="d-flex flex-column">
                                        <?php for ($i = 1; $i <= 2; $i++) : ?>

                                            <?php
                                            $positionStart     = 2;
                                            $positionEnd       = 3;

                                            if ($i == 2) {
                                                $positionStart = 4;
                                                $positionEnd   = 5;
                                            }
                                            ?>
                                            <div class="d-flex mt-1 gap-1 justify-content-end">
                                                <?php for ($position = $positionStart; $position <= $positionEnd; $position++) : ?>
                                                    <?php $key = $controller->cari_parkir($grupD, $position); ?>
                                                    <a class="seat seat-horizontal" grup="D" position="<?= $position; ?>" id="<?= rand($i * time(), 10 * time()); ?>" parking-name="Parkiran Bayangan BP">
                                                        <?= (!empty($key) || $key === 0) ? $grupD[$key]['model_code'] . " | " . $grupD[$key]['license_plate'] . "<br>" . $grupD[$key]['category'] : "" ?>
                                                    </a>
                                                <?php endfor; ?>
                                                <div class="parkiran-motor-2">
                                                    Parkir Motor
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <!-- Batas Parkiran Bayangan BP -->

                                <!-- Parkiran BP AKA Grup E -->
                                <div class="d-flex mt-2 gap-1 justify-content-end w-100">
                                    <p class="text-label-vertical-reverse">- Area Parkir BP -</p>
                                    <?php for ($position = 1; $position <= 6; $position++) : ?>
                                        <?php $seat = 'seat-yellow text-white';
                                        $name = 'Parkiran BP';
                                        $marginRight = 0;
                                        if ($position == 1) {
                                            $seat = 'seat text-dark';
                                            $name = 'Parkiran Bayangan BP';
                                            $marginRight = '50px';
                                        };
                                        ?>
                                        <?php $key = $controller->cari_parkir($grupE, $position); ?>
                                        <a class="<?= $seat; ?> seat-vertical" grup="E" position="<?= $position; ?>" id="<?= rand($position * time(), 10 * time()); ?>" parking-name="<?= $name; ?>" style="margin-right: <?= $marginRight; ?>">
                                            <?= (!empty($key) || $key === 0) ? $grupE[$key]['model_code'] . " | " . $grupE[$key]['license_plate'] . "<br>" . $grupE[$key]['category'] : "" ?>
                                        </a>
                                    <?php endfor; ?>
                                </div>
                                <!-- Batas Parkiran BP -->


                                <!-- Parkiran Bayangan BP AKA Grup F-->
                                <div class="d-flex w-100 justify-content-end">
                                    <?php $key = $controller->cari_parkir($grupF, 1); ?>
                                    <a class="seat seat-vertical mt-1 me-3" grup="F" position="1" id="<?= rand($position * time(), 10 * time()); ?>" parking-name="Parkiran Bayangan BP">
                                        <?= (!empty($key) || $key === 0) ? $grupF[$key]['model_code'] . " | " . $grupF[$key]['license_plate'] . "<br>" . $grupF[$key]['category'] : "" ?>
                                    </a>
                                    <div class="d-flex flex-column">
                                        <?php for ($i = 1; $i <= 2; $i++) : ?>
                                            <?php
                                            $positionStart     = 2;
                                            $positionEnd       = 4;

                                            if ($i == 2) {
                                                $positionStart = 5;
                                                $positionEnd   = 7;
                                            }
                                            ?>
                                            <div class="d-flex mt-1 gap-1">
                                                <?php for ($position = $positionStart; $position <= $positionEnd; $position++) : ?>
                                                    <?php $key = $controller->cari_parkir($grupF, $position); ?>
                                                    <a class="seat seat-horizontal text-dark" grup="F" position="<?= $position; ?>" id="<?= rand($position * time(), 10 * time()); ?>" parking-name="Parkiran Bayangan BP">
                                                        <?= (!empty($key) || $key === 0) ? $grupF[$key]['model_code'] . " | " . $grupF[$key]['license_plate'] . "<br>" . $grupF[$key]['category'] : "" ?>
                                                    </a>
                                                <?php endfor; ?>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <!-- Batas Parkiran Bayangan BP -->

                                <!-- Parkiran Pojok BP -->
                                <div class="d-flex mt-2 gap-1 justify-content-end w-100 px-4 mb-5">
                                    <?php for ($position = 8; $position <= 15; $position++) : ?>
                                        <?php $key = $controller->cari_parkir($grupF, $position); ?>
                                        <a class="seat-yellow seat-vertical text-white" grup="F" position="<?= $position; ?>" id="<?= rand($position * time(), 10 * time()); ?>" parking-name="Parkiran BP">
                                            <?= (!empty($key) || $key === 0) ? $grupF[$key]['model_code'] . " | " . $grupF[$key]['license_plate'] . "<br>" . $grupF[$key]['category'] : "" ?>
                                        </a>
                                    <?php endfor; ?>
                                </div>
                                <!-- Batas Parkiran Pojok BP -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->include('items/modal'); ?>


        <div class="empty"></div>
        <div class="wrapper"></div>

        <nav class="bottom-nav">
            <a class="cancel-button">
                Back
            </a>
            <a class="next-button">
                Next
            </a>
        </nav>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="/js/index.js"></script>
    <script src="/js/drag.js"></script>
</body>

</html>