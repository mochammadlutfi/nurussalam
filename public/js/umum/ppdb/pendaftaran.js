jQuery(document).ready(function () {
    
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

    // $("#field-ustadz").select2({
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

    $('#field-tgl_lahir').datepicker();


    $("#form-ppdb").submit(function (e) {
        e.preventDefault();
        var fomr = $('form#form-ppdb')[0];
        var formData = new FormData(fomr);

        $.ajax({
            url: laroute.route('ppdb.simpan'),
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
                        html: `Produk Hukum Baru Berhasil Disimpan!`,
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
                        // $.notify({
                        //     // options
                        //     icon: 'fa fa-times',
                        //     message: response.errors[control]
                        // },{
                        //     // settings
                        //     delay: 7000,
                        //     type: 'danger'
                        // });
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