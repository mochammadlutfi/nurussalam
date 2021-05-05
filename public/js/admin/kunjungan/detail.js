jQuery(document).ready(function () {

    $(document).on('click', '#terima-kunjungan', function () {
        id = $(this).attr('data-id');
        Swal.fire({
            title: "Setujui Kunjungan?",
            text: "Pengajuan yang sudah di setujui tidak dapat dirubah!",
            icon: "warning",
            content: "input",
            showCancelButton: true,
            confirmButtonText: 'Ya, Setuju!',
            cancelButtonText: 'Kembali!',
            reverseButtons: true,
            allowOutsideClick: false,
            confirmButtonColor: '#90c553',
            cancelButtonColor: '#ef5350',
        })
        .then((result) => {
            if (result.value) {
            $.ajax({
                url: laroute.route('admin.kunjungan.pengajuan_terima', { id: id }),
                type: "GET",
                dataType: "JSON",
                beforeSend: function(){
                    Swal.fire({
                        title: 'Tunggu Sebentar...',
                        text: ' ',
                        imageUrl: laroute.url('assets/img/loading.gif', ['']),
                        showConfirmButton: false,
                        allowOutsideClick: false,
                    });
                },
                success: function() {
                    Swal.fire({
                        title: "Berhasil",
                        text: 'Status Pengajuan Kunjungan Berhasil Diperbaharui!',
                        timer: 3000,
                        showConfirmButton: false,
                        icon: 'success'
                    });
                    window.setTimeout(function(){
                        location.reload();
                    } ,1500);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
            } else {
                Swal.close();
            }
        });
    });

    $(document).on('click', '#tolak-kunjungan', function () {
        id = $(this).attr('data-id');
        $("#form-tolakKunjungan").find("input[name='id_kunjungan']").val(id);
        $('#modalPenolakan').modal({
            backdrop: 'static',
            keyboard: false
        });
        
        $("#form-tolakKunjungan").validate({
            onfocusout: function(element) {
                $(element).valid()
                if ($(element).valid()) {
                    $('#form-tolakKunjungan').find('button:submit').prop('disabled', false);  
                } else {
                    $('#form-tolakKunjungan').find('button:submit').prop('disabled', 'disabled');
                }
            },    
            errorClass: "invalid-feedback font-size-sm animated fadeInDown",
            errorElement: "div",
            errorPlacement: function (e, n) {
                jQuery(n).parents(".form-group").find('div.invalid-feedback').html(e);
            },
            highlight: function (e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid");
            },
            success: function (e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid");
                jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove();
            },
            rules: {
                alasan: {
                    required: true,
                },
            },
            messages: {
                alasan: {
                    required: "Alasan Penolakan Wajib Diisi!",
                },
            },
            submitHandler: function (form) {
                var fomr = $('form#form-tolakKunjungan')[0];
                var formData = new FormData(fomr);
                $.ajax({
                    type: 'POST',
                    url: laroute.route('admin.kunjungan.pengajuan_tolak'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        Swal.fire({
                            title: 'Tunggu Sebentar...',
                            text: '',
                            imageUrl: laroute.url('assets/img/loading.gif', ['']),
                            showConfirmButton: false,
                            allowOutsideClick: false,
                        });
                    },
                    success: function (response) {
                        if (response.fail == false) {
                            Swal.fire({
                                title: "Berhasil",
                                text: "Status Pengajuan Kunjungan Berhasil Diperbaharui!",
                                timer: 3000,
                                showConfirmButton: false,
                                icon: 'success'
                            });
                            $('.form-group').removeClass('is-invalid');
                            $('.form-group').removeClass('is-valid');
                            $('#modalPenolakan').modal('toggle');
                            window.setTimeout(function(){
                                location.reload();
                            } ,1500);
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                text: "Periksa Form Input!",
                                timer: 3000,
                                showConfirmButton: false,
                                icon: 'error'
                            });
                            for (control in response.errors) {
                                $('#field-' + control).addClass('is-invalid');
                                $('#error-' + control).html(response.errors[control]);
                            }
                        }
                    }
                });
                return false;
            }
        });
    });
});