<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E Parking | Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main/style.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <section class="main-section">

        <a class="btn btn-danger position-absolute top-0 start-0 mt-3 ms-3 shadow" href="/logout">
            <span class="material-icons">
                logout
            </span>
        </a>

        <button class="btn btn-success position-absolute top-0 end-0 mt-3 me-3 shadow btn-history">
            <span class="material-icons">
                history
            </span>
        </button>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12 mb-2 text-white text-center text-oleo">
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
                            <strong>Oops!</strong> we can't find that vehicle
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12 text-center">
                    <div class="box-wrap">
                        <div class="white-box">
                            <h3 class="mb-3 text-lato fw-bold">Capacity</h3>
                            <div class="blue-box">
                                <?= $capacity; ?>
                            </div>
                        </div>
                        <div class="white-box">
                            <h3 class="mb-3 text-lato fw-bold">Usage</h3>
                            <div class="blue-box">
                                <?= $usage; ?>
                            </div>
                        </div>
                        <div class="white-box">
                            <h3 class="mb-3 text-lato fw-bold">Remaining</h3>
                            <div class="blue-box">
                                <?= $remaining; ?>
                            </div>
                        </div>
                    </div>
                    <div class="button-wrap mt-4">
                        <a class="btn-next text-lato" href="/parkir/depan">Next</a>
                    </div>
                </div>
            </div>
            <div class="toast-wrapper gap-2 d-flex flex-column">
                <?php if ($remaining > 20) : ?>
                    <div class="toast bg-success text-white show">
                        <div class="toast-body justify-content-between d-flex text-lato">
                            Flow Parkir Masih Terkendali
                            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                        </div>
                    </div>
                <?php elseif ($remaining <= 20) : ?>
                    <div class="toast bg-warning show">
                        <div class="toast-body justify-content-between d-flex text-lato">
                            Kendaraan di Area Akastra Toyota Sudah Lumayan Banyak
                            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                        </div>
                    </div>
                <?php elseif ($remaining <= 6) : ?>
                    <div class="toast bg-danger text-white show">
                        <div class="toast-body justify-content-between d-flex text-lato">
                            Kendaraan di Area Akastra Toyota Sudah terlalu banyak
                            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Notifikasi Untuk Divisi -->
                <?php if (($GRCapacity - $GR) > 10 && ($GRCapacity - $GR) <= 20) : ?>
                    <div class="toast bg-warning text-white show">
                        <div class="toast-body justify-content-between d-flex text-lato">
                            Kendaraan GR lumayan banyak
                            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                        </div>
                    </div>
                <?php elseif (($GRCapacity - $GR) <= 10) : ?>
                    <div class="toast bg-danger text-white show">
                        <div class="toast-body justify-content-between d-flex text-lato">
                            Kendaraan GR Sudah cukup padat, akan menghambat flow kendaraan
                            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Notifikasi Untuk Divisi -->
                <?php if (($BPCapacity - $BP) > 10 && ($BPCapacity - $BP) <= 20) : ?>
                    <div class="toast bg-warning text-white show">
                        <div class="toast-body justify-content-between d-flex text-lato">
                            Kendaraan BP lumayan banyak
                            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                        </div>
                    </div>
                <?php elseif (($BPCapacity - $BP) <= 10) : ?>
                    <div class="toast bg-danger text-white show">
                        <div class="toast-body justify-content-between d-flex text-lato">
                            Kendaraan BP Sudah cukup padat, akan menghambat flow kendaraan
                            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                        </div>
                    </div>
                <?php endif; ?>
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
                    <ul class="list-group" id="history-list">
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <script>
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

            $.ajax({
                type: "GET",
                url: "/parkir/get_history",
                dataType: "json",
                success: function(response) {
                    const data = response.data;
                    var html = '';
                    data.forEach(element => {
                        html += `<a href="/parkir/depan/${element.created_at}" class="no-decoration">`;
                        html += `   <li class="list-group-item d-flex justify-content-between mb-1 align-items-center">`;
                        html += `       <div class="text-lato">${element.created_at}</div>`;
                        html += `       <button class="btn btn-success border-0 shadow d-flex align-items-center gap-2">`;
                        html += `           <span class="material-icons">radio_button_checked</span> Lihat`;
                        html += `       </button>`;
                        html += `   </li>`;
                        html += `</a>`;
                    });

                    $("#history-list").html(html);
                }
            });
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>