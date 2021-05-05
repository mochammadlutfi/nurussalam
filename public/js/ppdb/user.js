jQuery(function() {
    $(".has_password a").on('click', function(event) {
        event.preventDefault();
        if($(this).closest('.has_password').find('input').attr("type") == "text"){
            $(this).closest('.has_password').find('input').attr('type', 'password');
            $(this).closest('.has_password').find('i').addClass( "fa-eye-slash" );
            $(this).closest('.has_password').find('i').removeClass( "fa-eye" );
        }else if($(this).closest('.has_password').find('input').attr("type") == "password"){
            $(this).closest('.has_password').find('input').attr('type', 'text');
            $(this).closest('.has_password').find('i').removeClass( "fa-eye-slash" );
            $(this).closest('.has_password').find('i').addClass( "fa-eye" );
        }
    });
    
    var a = $("#form-password");
    var i = a.validate({
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
            console.log(element);
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
            old_password: {
                required: true,
                minlength: 5,
            },
            password: {
                required: true,
                minlength: 5,
            },
            password_confirmation: {
                required: true,
                minlength: 5,
                equalTo: "#field-password"
            },
        },
        messages: {
            old_password: {
                required: 'Password Lama Wajib Diisi!',
                minlength: 'Password Lama Kurang Dari 5 Karakter!'
            },
            password: {
                required: 'Password Baru Wajib Diisi!',
                minlength: 'Password Baru Kurang Dari 5 Karakter!'
            },
            password_confirmation: {
                required: 'Konfirmasi Password Baru Wajib Diisi!',
                minlength: 'Konfirmasi Password Baru Kurang Dari 5 Karakter!',
                equalTo: 'Password Tidak Sama Dengan Sebelumnya!',

            },
        },
        submitHandler: function (form) {
            var fomr = $('form#form-password')[0];
            var formData = new FormData(fomr);
            $.ajax({
                type: 'POST',
                url: laroute.route('user.update_pw'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
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
                        Swal.fire({
                            title: "Berhasil",
                            text: "Password Berhasil Diperbaharui!",
                            showConfirmButton: false,
                            icon: 'error'
                        }, function(){
                            location.reload();
                        },3000);

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
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.close();
                    alert('Error adding / update data');
                }
            });
            return false;
        }
    });
});