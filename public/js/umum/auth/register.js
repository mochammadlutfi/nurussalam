$(document).ready(function () {
    $("#daftar-odp").select2({
        placeholder: 'Pilih Kategori Bisnis',
        allowClear: true,
        ajax: {
            url: laroute.route('bisnisKategori.json'),
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

    var daerah = $('#daftar-daerah').select2({
        placeholder: 'Cari Kota/Kabupaten',
        theme: 'bootstrap4',
        language: 'id',
        ajax: {
            url: laroute.route('daerahSelect'),
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
        },
        minimumInputLength: 3,
        templateResult: function(response) {
            if(response.loading)
            {
                return "Mencari...";
            }else{
                var selectionText = response.text.split(",");
                var $returnString = $('<span>'+selectionText[0] + ', ' + selectionText[1]+'</span>');
                return $returnString;
            }
        },
        templateSelection: function(response) {
            return response.text;
        },
    });

    var opd = $('#daftar-opd').select2({
        placeholder: 'Pilih OPD',
        theme: 'bootstrap4',
        language: 'id',
        ajax: {
            url: laroute.route('opdSelect'),
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

    var a = $("#daftarForm");
    var b = $("#pendaftaran");
    a.validate({
        onfocusout: function(element) {
            $(element).valid()
            if ($(element).valid()) {
                a.find('button:submit').prop('disabled', false);  
            } else {
                a.find('button:submit').prop('disabled', 'disabled');
            }
        },   
        errorClass: "invalid-feedback animated fadeInDown",
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').find('div.invalid-feedback').html(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        success: function (element) {
            $(element).removeClass('is-invalid').addClass("is-valid");
            $(element).closest(".form-group").removeClass("is-invalid"), jQuery(element).remove();
        },
        rules: {
            nip: {
                required: true,
            },
            nama: {
                required: true,
            },
            opd: {
                required: true,
            },
            daerah: {
                required: true,
            },
            username: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 5,
            },
            password_confirmation: {
                required: true,
                minlength: 5,
                equalTo: "#daftar-password"
            },
        },
        messages: {
            nip: {
                required: "NIP Wajib Diisi!",
            },
            nama: {
                required: 'Nama Lengkap Wajib Diisi!',
            },
            opd: {
                required: "OPD Wajib Diisi!",
            },
            daerah: {
                required: 'Daerah Wajib Diisi!',
            },
            username: {
                required: 'Username Wajib Diisi!',
            },
            email: {
                required: 'Alamat Email Wajib Diisi!',
                email : 'Format Alamat Email Salah!'
            },
            password: {
                required: 'Kata Sandi Wajib Diisi!',
                minlength: 'Kata Sandi Kurang Dari 5 Karakter!'
            },
            password_confirmation: {
                required: 'Konfirmasi Kata Sandi Wajib Diisi!',
                minlength: 'Konfirmasi Kata Sandi Kurang Dari 5 Karakter!',
                equalTo: 'Kata Sandi Tidak Sama Dengan Sebelumnya!',

            },
        },
        submitHandler: function (form) {
            var fomr = $('form#daftarForm')[0];
            var formData = new FormData(fomr);
            $.ajax({
                type: 'POST',
                url: laroute.route('registerPost'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    Swal.fire({
                        title: 'Tunggu Sebentar...',
                        text: 'Data Sedang Di Proses!',
                        imageUrl: laroute.url('assets/img/loading.gif', ['']),
                        showConfirmButton: false,
                        allowOutsideClick: false,
                    });
                },
                success: function (response) {
                    if (response.fail == false) {
                        Swal.fire({
                            title: "Pendaftaran Berhasil",
                            text: "Silahkan Buka Email Untuk Melakukan Verifikasi Akun!",
                            timer: 5000,
                            showConfirmButton: false,
                            icon: 'success'
                        });
                    } else {
                        Swal.fire({
                            title: "Gagal",
                            text: "Periksa Form Input!",
                            timer: 3000,
                            showConfirmButton: false,
                            icon: 'error'
                        });
                        for (control in response.errors) {
                            $('#login-' + control).addClass('is-invalid');
                            $('#error-' + control).html(response.errors[control]);
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.close();
                    alert('Error adding / update data');
                }
            });
            return false;
        }
    })
    b.bootstrapWizard({
        tabClass: 'nav nav-tabs',
        nextSelector: '[data-wizard="next"]',
        previousSelector: '[data-wizard="prev"]',
        firstSelector : '[data-wizard="first"]',
        lastSelector : '[data-wizard="lsat"]',
        finishSelector : '[data-wizard="finish"]',
        backSelector : '[data-wizard="back"]',
		onTabClick: function(tab, navigation, index) {
            return false;
        },
		onNext: function (e, r, t) {
            if(!a.valid())
            {
                return false;
            }else{
                return true;
            }
        },
        onFinish: function(tab, navigation, index) {
            if(!a.valid())
            {
                return false;
            }else{
                
            }
  		}
  });
});