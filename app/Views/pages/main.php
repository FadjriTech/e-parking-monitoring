<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E Parking | Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main/style.css">
    <link rel="shortcut icon" href="/assets/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <section class="main-section">

        <div class="container">
            <div class="row mb-3">
                <div class="col-6">
                    <a class="btn btn-danger shadow" href="/logout">
                        <span class="material-icons">
                            logout
                        </span>
                    </a>
                </div>
                <div class="col-6 text-end">
                    <button class="btn btn-success shadow btn-history">
                        <span class="material-icons">
                            history
                        </span>
                    </button>
                </div>
            </div>

            <!-- Hidden Input -->
            <input type="hidden" class="form-control" id="usage" value="<?= $exist['total']; ?>">
            <input type="hidden" class="form-control" id="capacity" value="<?= $capacity['total']; ?>">
            <input type="hidden" class="form-control" id="GRcapacity" value="<?= $capacity['GR']; ?>">
            <input type="hidden" class="form-control" id="BPcapacity" value="<?= $capacity['BP']; ?>">
            <input type="hidden" class="form-control" id="AKMcapacity" value="<?= $capacity['AKM']; ?>">
            <input type="hidden" class="form-control" id="GRvehicle" value="<?= $exist['GR']; ?>">
            <input type="hidden" class="form-control" id="BPvehicle" value="<?= $exist['BP']; ?>">
            <input type="hidden" class="form-control" id="AKMvehicle" value="<?= $exist['AKM']; ?>">

            <div class="row justify-content-center">
                <div class="col-12 mb-3 text-white text-center text-oleo">
                    <?php if (isset($user)) : ?>
                        <p class="card-subtitle fs-6 fst-italic" style="font-family: 'Poppins', sans-serif">
                            Last updated by <?= $user; ?> at <?= $date; ?>
                        </p>
                    <?php endif; ?>
                    <h1 class="card-title">
                        Parking Mobile Akastra
                    </h1>
                </div>
                <div class="col-lg-6 col-md-12 mb-5 gap-2 d-flex flex-column">
                    <form action="/parkir/search_car" method="POST" id="search-form">
                        <div class="form-group d-flex bg-white">
                            <input type="text" name="keyword" autocomplete="off" class="form-control align-self-center rounded-xl border-0 text-lato bg-transparent" placeholder="Cari Kendaraan">
                            <button type="submit" class="btn-search border-0">
                                <span class="material-icons">
                                    search
                                </span>
                            </button>
                        </div>
                        <ul class="list-group mt-2" id="list-wrap">
                        </ul>
                    </form>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body border-0 shadow">
                            <h5 class="card-text text-lato text-muted">Usage All <span class="fst-italic">( + Internal )</span></h5>
                            <h2 class="card-title mb-4 text-lato fw-bold"><?= $exist['total']; ?> / <?= $capacity['total']; ?></h2>
                            <div class="progress ">
                                <div class="progress-bar" role="progressbar" aria-label="Basic example" id="overall-progress" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body border-0 shadow">
                            <h5 class="card-text text-lato text-muted">GR Vehicle</h5>
                            <h2 class="card-title mb-4 text-lato fw-bold"><?= $exist['GR'] . ' / ' . $capacity['GR']; ?></h2>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-label="Basic example" id="gr-progress" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <?php if ($GRSummary) : ?>
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item mt-3">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Detail
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <?php $max =  max(array_column($GRSummary, 'result')) ?>
                                                <?php foreach ($GRSummary as $index => $row) : ?>
                                                    <div class="progress-wrap-detail mt-3">
                                                        <div class="d-flex justify-content-between">
                                                            <p class="text-lato" style="margin: 0;"><?= $row['status']; ?></p>
                                                            <p class="text-lato" style="margin: 0;"><?= $row['result']; ?></p>
                                                        </div>
                                                        <?php $width = strval((intval($row['result']) / intval($max) * 100)) . "%"; ?>
                                                        <div class="progress mt-1" style=" height: 5px;">
                                                            <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: <?= $width; ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div id="gr-list"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body border-0 shadow">
                            <h5 class="card-text text-lato text-muted">BP Vehicle</h5>
                            <h2 class="card-title mb-4 text-lato fw-bold"><?= $exist['BP'] . ' / ' . $capacity['BP']; ?></h2>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-label="Basic example" id="bp-progress" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <?php if ($BPSummary) : ?>
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item mt-3">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                                Detail
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <?php $max =  max(array_column($BPSummary, 'result')) ?>
                                                <?php foreach ($BPSummary as $index => $row) : ?>
                                                    <div class="progress-wrap-detail mt-3">
                                                        <div class="d-flex justify-content-between">
                                                            <p class="text-lato" style="margin: 0;"><?= $row['status']; ?></p>
                                                            <p class="text-lato" style="margin: 0;"><?= $row['result']; ?></p>
                                                        </div>
                                                        <?php $width = strval((intval($row['result']) / intval($max) * 100)) . "%"; ?>
                                                        <div class="progress mt-1" style=" height: 5px;">
                                                            <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: <?= $width; ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div id="bp-list"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body border-0 shadow">
                            <h5 class="card-text text-lato text-muted">AKM Vehicle</h5>
                            <h2 class="card-title mb-4 text-lato fw-bold"><?= $exist['AKM'] . ' / ' . $capacity['AKM']; ?></h2>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-label="Basic example" id="akm-progress" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <?php if ($AKMSummary) : ?>
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item mt-3">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                                                Detail
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <?php $max =  max(array_column($AKMSummary, 'result')) ?>
                                                <?php foreach ($AKMSummary as $index => $row) : ?>
                                                    <div class="progress-wrap-detail mt-3">
                                                        <div class="d-flex justify-content-between">
                                                            <p class="text-lato" style="margin: 0;"><?= $row['status']; ?></p>
                                                            <p class="text-lato" style="margin: 0;"><?= $row['result']; ?></p>
                                                        </div>
                                                        <?php $width = strval((intval($row['result']) / intval($max) * 100)) . "%"; ?>
                                                        <div class="progress mt-1" style=" height: 5px;">
                                                            <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: <?= $width; ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div id="akm-list"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="button-wrap mt-4 text-center">
                        <a class="btn-next text-lato" href="<?= $date == date('Y-m-d') ? "/parkir/depan" : "/parkir/depan/" . $date; ?>">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="historyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal-lg">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="staticBackdropLabel">Parking History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0">
                    <form action="/summary" method="GET">
                        <div class="row justify-content-center">
                            <div class="col-12 mb-2">
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success">Lookup</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        //---- Calculate Progress
        $(document).ready(function() {
            const GR = $("#GRvehicle").val();
            const BP = $("#BPvehicle").val();
            const AKM = $("#AKMvehicle").val();


            const usage = $("#usage").val();
            const capacity = $("#capacity").val();

            const GRcapacity = $("#GRcapacity").val();
            const BPcapacity = $("#BPcapacity").val();
            const AKMcapacity = $("#AKMcapacity").val();


            var overall = hitungPersentase(usage, capacity);
            var gr = hitungPersentase(GR, GRcapacity, 'gr');
            var bp = hitungPersentase(BP, BPcapacity, 'bp');
            var akm = hitungPersentase(AKM, AKMcapacity, 'akm');

            $("#overall-progress").css('width', `${overall['persentase']}%`);

            $("#gr-progress").css('width', `${gr['persentase']}%`).addClass(gr['class']);
            $("#bp-progress").css('width', `${bp['persentase']}%`).addClass(bp['class']);
            $("#akm-progress").css('width', `${akm['persentase']}%`).addClass(akm['class']);

            if (gr['class'] === 'bg-warning') {
                $("#gr-list").html('<div class="alert alert-warning mt-4" role="alert">Atur Booking! Kendaraan sudah cukup banyak</div>');
            } else if (gr['class'] == 'bg-danger') {
                $("#gr-list").html('<div class="alert alert-danger mt-4" role="alert">Stop Penerimaan! Flow kendaraan tidak terkendali</div>');
            }

            if (bp['class'] === 'bg-warning') {
                $("#bp-list").html('<div class="alert alert-warning mt-4" role="alert">Atur Booking! Kendaraan sudah cukup banyak</div>');
            } else if (bp['class'] == 'bg-danger') {
                $("#bp-list").html('<div class="alert alert-danger mt-4" role="alert">Stop Penerimaan! Flow kendaraan tidak terkendali</div>');
            }
        });


        const hitungPersentase = (usage, capacity, divisi = null) => {
            const result = Array();
            let persentase = parseInt(usage) / parseInt(capacity) * 100;
            if (divisi) {
                if (divisi == 'akm') {
                    if (usage <= 10) {
                        result['class'] = '';
                    } else if (usage > 11 && usage <= 12) {
                        result['class'] = 'bg-warning';
                    } else {
                        result['class'] = 'bg-danger';
                    }
                } else if (divisi == 'bp') {
                    if (usage <= 46) {
                        result['class'] = '';
                    } else if (usage >= 47 && usage <= 75) {
                        result['class'] = 'bg-warning';
                    } else {
                        result['class'] = 'bg-danger';
                    }
                } else {
                    if (usage <= 34) {
                        result['class'] = '';
                    } else if (usage >= 35 && usage <= 50) {
                        result['class'] = 'bg-warning';
                    } else {
                        result['class'] = 'bg-danger';
                    }
                }
            }

            result['persentase'] = parseInt(persentase);
            return result;
        }

        $(document).ready(function() {
            $("#search-form").submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var actionUrl = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    data: form.serialize(),
                    dataType: "json",
                    beforeSend: function(event) {
                        $(".btn-search").html('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>');
                    },
                    success: function(response) {
                        if (response.code == 200) {
                            const data = response.result;
                            var html = '';
                            data.forEach(element => {
                                html += `<a href="/parkir/${element.lokasi.toLowerCase()}" class="no-decoration mb-1"><li class="list-group-item">${element.model} | ${element.license_plate}</li></a>`;
                            });

                            $("#list-wrap").html(html);
                            $(".btn-search").html('<span class="material-icons">search</span>');
                        } else {
                            var html = '<li class="list-group-item">Oops! We can find that vehicle</li>';
                            $("#list-wrap").html(html);
                            $(".btn-search").html('<span class="material-icons">search</span>');
                        }
                    },
                    error: function(param) {
                        $(".btn-search").html('<span class="material-icons">search</span>');
                    }
                });
            });
        });


        $(document).on('click', '.btn-history', function() {
            $("#historyModal").modal('show');
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>