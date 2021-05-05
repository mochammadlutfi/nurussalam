jQuery(function() {    
    // $("#field-rekening").select2({
    //     placeholder: 'Pilih Kategori',
    //     theme : 'bootstrap4',
    //     ajax: {
    //         url: laroute.route('ppdb.json'),
    //         type: 'POST',
    //         dataType: 'JSON',
    //         delay: 250,
    //         data: function (params) {
    //             return {
    //                 searchTerm: params.term
    //             };
    //         },
    //         processResults: function (response) {
    //             return {
    //                 results: response
    //             };
    //         },
    //         cache: true
    //     }
    // });

    $("#field-bank_pengirim").select2({
        placeholder: 'Pilih Bank Pengirim',
        theme : 'bootstrap4',
        ajax: {
            url: laroute.route('ppdb.bank'),
            type: 'POST',
            dataType: 'JSON',
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    $('#field-tgl_bayar').datetimepicker({
        "format": "dddd, DD MMMM YYYY",
        "dayViewHeaderFormat": "MMMM YYYY",
        "locale": moment.locale('id'),
        "sideBySide": true,
        "daysOfWeekDisabled": false,
        "calendarWeeks": false,
        "viewMode": "days",
        "widgetPositioning": {
            "horizontal": "auto",
            "vertical": "auto"
        },
    });

     $('#field-tgl_bayar').on("dp.change", function(e) {
        tgl = moment(e.date, "dddd, DD MMMM YYYY");
        $('input[name="tgl_bayar"]').val(tgl.format("YYYY-MM-DD"));
    });


    $("form#ppdb-konfirm").submit(function (e) {
        e.preventDefault();
        var fomr = $('form#ppdb-konfirm')[0];
        var formData = new FormData(fomr);

        $.ajax({
            url: laroute.route('pembayaran.confirm'),
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                Swal.fire({
                    title: 'Tunggu Sebentar...',
                    text: 'Data Sedang Diproses!',
                    imageUrl: laroute.url('public/img/loading.gif', ['']),
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            success: function (response) {
                Swal.close();
                $('.is-invalid').removeClass('is-invalid');
                if (response.fail == false) {
                    Swal.fire({
                        title: `Berhasil!`,
                        showConfirmButton: false,
                        icon: 'success',
                        html: `Bukti Pembayaran Berhasil Dikirim!`,
                        showCancelButton: false,
                        showConfirmButton: false
                    }, function() {
                        window.location = laroute.route('ppdb.pembayaran');
                    });
                } else {
                    Swal.close();
                    for (control in response.errors) {
                        $('#field-' + control).addClass('is-invalid');
                        $('#error-' + control).html(response.errors[control]);
                        $.notify({
                            // options
                            icon: 'fa fa-times',
                            message: response.errors[control]
                        },{
                            // settings
                            delay: 7000,
                            type: 'danger'
                        });
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.close();
                alert('Error adding / update data');
            }
        });
    });
});