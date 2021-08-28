jQuery(function () {

    var a = $("#form-daftar");
    a.validate({
        onfocusout: function (element) {
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
            nama: {
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
            nama: {
                required: 'Nama Lengkap Wajib Diisi!',
            },
            email: {
                required: 'Alamat Email Wajib Diisi!',
                email: 'Format Alamat Email Salah!'
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
            var fomr = $('form#form-daftar')[0];
            var formData = new FormData(fomr);
            $.ajax({
                type: 'POST',
                url: laroute.route('registerPost'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    Swal.fire({
                        title: 'Tunggu Sebentar...',
                        text: 'Data Sedang Di Proses!',
                        imageUrl: laroute.url('public/img/loading.gif', ['']),
                        showConfirmButton: false,
                        allowOutsideClick: false,
                    });
                },
                success: function (response) {
                    if (response.fail == false) {
                        $('#appContent').html(`<div class="row mt-50 justify-content-center">
                            <div class="col-lg-6">
                                <div class="block block-rounded block-shadow">
                                    <div class="block-content block-content-full">
                                        <div class="sa m-auto">
                                            <div class="sa-success">
                                                <div class="sa-success-tip"></div>
                                                <div class="sa-success-long"></div>
                                                <div class="sa-success-placeholder"></div>
                                                <div class="sa-success-fix"></div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h2 class="h3">
                                                Pendaftaran Berhasil
                                            </h2>
                                            <p class="font-size-14-down-lg font-size-20">
                                            Link verifikasi telah berhasil dikirim ke email kamu. 
                                            Segera cek email dan klik tombol "Verifikasi Email" agar bisa melanjutkan proses pendaftaran</p>
                                            <a href="${ laroute.route('login') }" class="btn btn-primary text-center">Kembali Ke Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`);
                        Swal.close();
                    } else {
                        Swal.fire({
                            title: "Gagal",
                            text: "Periksa Form Input!",
                            timer: 3000,
                            showConfirmButton: false,
                            icon: 'error'
                        });
                        for (control in response.errors) {
                            $('#daftar-' + control).addClass('is-invalid');
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
    });

    
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });

    $("#show_hide_password2 a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
