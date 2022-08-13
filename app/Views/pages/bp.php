<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parkir | BP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/parkir/stall_bp/style.css">

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>

<body>

    <section class="main-section">
        <div class="main-area">
            <div class="container mt-5">
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="d-flex parkir-wrap">
                            <div class="d-flex-column justify-content-end z-index-99" style="width: 777px">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex mt-2 gap-1" style="margin-right: 420px;">
                                        <div class="ruang-foreman" style="margin-right: -20px;">
                                            <span class="material-symbols-outlined">
                                                engineering
                                            </span>
                                            Area Gudang & Foreman
                                        </div>
                                        <div class="d-flex flex-column gap-1 justify-content-start" style="margin-top: 70px;">
                                            <div class="seat-vertical-oven-label">
                                                QC
                                            </div>
                                            <div class="seat-vertical-oven-label">
                                                Pemasangan
                                            </div>
                                            <div class="seat-vertical-oven-label">
                                                Poles
                                            </div>
                                            <div class="seat-vertical-oven-label">
                                                Poles
                                            </div>
                                            <div class="mt-5"></div>
                                            <div class="seat-vertical-wide-label">
                                                Pengecatan
                                            </div>
                                            <div class="mt-5"></div>
                                            <div class="seat-vertical-wide-label mt-4">
                                                Pengecatan
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column gap-1 justify-content-start">
                                            <div class="ruang-sparepart">
                                                <span class="material-symbols-outlined">
                                                    stream
                                                </span>
                                                Sparepart GR
                                            </div>
                                            <div class="d-flex gap-1 flex-column align-items-end">
                                                <?php for ($position = 1; $position <= 4; $position++) : ?>
                                                    <a class="seat-yellow seat-horizontal-oven position-relative"></a>
                                                <?php endfor; ?>
                                                <div class="seat seat-horizontal-wide">
                                                    x
                                                </div>
                                                <a class="seat-yellow seat-horizontal-wide"></a>
                                                <div class="seat seat-horizontal-wide">
                                                    x
                                                </div>
                                                <a class="seat-yellow seat-horizontal-wide"></a>
                                                <a class="seat-yellow seat-horizontal-oven"></a>
                                                <div class="seat-office seat-horizontal-oven text-white">
                                                    Area Mixing
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Area Jalan Sebelah Sparepart GR -->
                                        <div class=" d-flex gap-1">
                                            <?php for ($grup = 1; $grup <= 2; $grup++) : ?>
                                                <?php
                                                $posStart = 1;
                                                $posEnd   = 7;

                                                if ($grup == 2) {
                                                    $posStart = 8;
                                                    $posEnd   = 16;
                                                }
                                                ?>
                                                <div class="d-flex gap-1 flex-column">
                                                    <?php for ($position = $posStart; $position <= $posEnd; $position++) : ?>
                                                        <a class="seat seat-vertical-short"></a>
                                                    <?php endfor; ?>
                                                </div>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="d-flex gap-1">
                                            <div class="d-flex gap-1 flex-column">
                                                <div class="mt-5"></div>
                                                <div class="seat-vertical-oven-label">
                                                    Panel
                                                </div>
                                                <div class="seat-vertical-oven-label">
                                                    Dempul
                                                </div>
                                                <div class="seat-vertical-oven-label">
                                                    Dempul
                                                </div>
                                                <div class="seat-vertical-oven-label">
                                                    Backup
                                                </div>
                                                <div class="mt-5"></div>
                                                <div class="mt-5"></div>
                                                <div class="mt-1"></div>
                                                <div class="seat-vertical-oven-label">
                                                    Rangka
                                                </div>
                                                <div class="seat-vertical-wide-label">
                                                    Masking
                                                </div>
                                                <div class="seat-vertical-wide-label">
                                                    Cat
                                                </div>
                                            </div>
                                            <div class="d-flex gap-1 flex-column">
                                                <div class="seat-office seat-horizontal-wide text-center font-weight-normal"> Loading / unloading</div>
                                                <?php
                                                $seatOrientation = "seat-horizontal-oven";
                                                $seatColor       = "seat-yellow";
                                                ?>
                                                <?php for ($position = 1; $position <= 8; $position++) : ?>
                                                    <?php if ($position == 5 || $position == 6) {
                                                        $seatOrientation = 'seat-horizontal';
                                                        $seatColor       = 'seat';
                                                    } ?>

                                                    <?php if ($position == 7 || $position == 8) {
                                                        $seatOrientation = 'seat-horizontal-wide';
                                                        $seatColor       = 'seat-yellow';
                                                    } ?>
                                                    <a class="<?= $seatColor . " " . $seatOrientation; ?>"></a>
                                                <?php endfor; ?>
                                                <div class="seat-office seat-horizontal-wide text-white">
                                                    Ruang Genset
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column gap-1" style="margin-top: 200px">
                                            <div class="d-flex gap-1">
                                                <a class="seat-yellow seat-vertical"></a>
                                                <a class="seat-yellow seat-vertical"></a>
                                            </div>
                                            <div class="d-flex gap-1">
                                                <a class="seat-yellow seat-vertical-short"></a>
                                                <a class="seat-yellow seat-vertical-wide"></a>
                                                <a class="seat-yellow seat-vertical-wide"></a>
                                                <a class="seat-yellow seat-vertical-wide"></a>
                                                <div class="sparepart-bp">
                                                    <span class="material-symbols-outlined">
                                                        stream
                                                    </span>
                                                    Sparepart BP
                                                </div>
                                                <div class="loading-area">
                                                    loading unloading
                                                </div>
                                                <a class="seat-yellow seat-vertical"></a>
                                                <a class="seat-yellow seat-vertical"></a>
                                                <a class="seat-yellow seat-vertical"></a>
                                                <p class="text-label-vertical">-- Area Finishing --</p>
                                            </div>
                                            <div class="d-flex gap-1 z-index-99">
                                                <a class="seat-horizontal"></a>
                                                <a class="seat seat-horizontal"></a>
                                                <a class="seat seat-horizontal"></a>
                                                <a class="seat seat-horizontal"></a>
                                                <a class="seat seat-horizontal"></a>
                                                <a class="seat seat-horizontal"></a>
                                                <a class="seat seat-horizontal"></a>
                                                <a class="seat seat-horizontal"></a>
                                            </div>
                                            <div class="d-flex gap-1">
                                                <a class="seat seat-horizontal"></a>
                                                <a class="seat seat-horizontal"></a>
                                                <a class="seat seat-horizontal"></a>
                                            </div>
                                            <div class="d-flex gap-1 justify-content-between">
                                                <div class="office d-flex gap-1">
                                                    <div class="seat-office seat-horizontal">
                                                        R. Bahan
                                                    </div>
                                                    <div class="seat-office seat-horizontal">
                                                        R. Material
                                                    </div>
                                                    <div class="seat-office seat-horizontal-wide">
                                                        R. Removal Part
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-1">
                                                    <a class="seat-yellow seat-vertical"></a>
                                                    <a class="seat-yellow seat-vertical"></a>
                                                    <a class="seat-yellow seat-vertical"></a>
                                                    <a class="seat-yellow seat-vertical"></a>
                                                    <a class="seat-yellow seat-vertical"></a>
                                                    <a class="seat-yellow seat-vertical"></a>
                                                    <a class="seat-yellow seat-vertical"></a>
                                                    <p class="text-label-vertical">-- Stall Delivery --</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gedung-wrap">
                                <img src="/assets/gedung-akastra.png" class="gedung">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>