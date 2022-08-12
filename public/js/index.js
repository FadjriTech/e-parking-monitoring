$(document).on('click', '.seat-vertical, .seat-horizontal', function () { 
    //----- Set hidden Key from attribute
    var grup     = $(this).attr('grup');
    var position = $(this).attr('position');
    var seatId   = $(this).attr('id');
    
    $("#parking-form").trigger("reset");

    $("#parking-grup").val(grup);
    $("#parking-position").val(position);
    $("#seat-id").val(seatId);
    
    $("#addModal").modal('show');

    $.ajax({
        type: "POST",
        url: "/parkir/get_detail",
        data: {
            grup : grup,
            posisi : position
        },
        dataType: "json",
        success: function (response) {
            if(response.code === 200){
                const label = ['parking-id','parking-license-plate', 'parking-model', 'parking-other', 'parking-status', 'parking-job'];
                const field = ['id','license_plate', 'model_code', 'others', 'status', 'category'];

                const detail = response.data;
                if(detail != null){
                    label.forEach((element,index) => {
                        $(`#${element}`).val(detail[field[index]]);
                    });
                }
            }
        }
    });
})


$(document).ready(function () {
    $('#parking-form').submit(function (e) { 
        e.preventDefault();
        var form        = $(this);
        var actionUrl   = form.attr('action');
        var seatId      = $("#seat-id").val();

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(),
            dataType: "json",
            success: function (response) {
                if(response.code == 200){
                    var data = response.data;
                    var html = `${data.model_code} | ${data.license_plate} <br> ${data.category}`;
                    console.log(data);

                    $("#addModal").modal('hide');
                    $(`#${seatId}`).html(html);
                }
            }
        });

    });
});


$(document).on('change', '#parking-model', function (e) { 
    let model = $(this).val();
    if(model === "OT" || model === "MRL"){
        $("#other-wrap").removeClass("d-none");
    } else {
        $("#other-wrap").addClass("d-none");
        $("#parking-other").val('');
    }
});