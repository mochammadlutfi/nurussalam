jQuery(function() {

    $('#field-tgl_lahir').datetimepicker({
        "format": "DD-MM-YYYY",
        "dayViewHeaderFormat": "MMMM YYYY",
        "locale": moment.locale('id'),
        "sideBySide": true,
        "daysOfWeekDisabled": false,
        "calendarWeeks": false,
        "viewMode": "years",
        "widgetPositioning": {
            "horizontal": "auto",
            "vertical": "auto"
        },
    });

    var a = $("#form-ppdb");
    var b = $("#pendaftaran");
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
            nama: {
                required: true,
            },
            alamat: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            tmp_lahir: {
                required: true,
            },
            tgl_lahir: {
                required: true,
            },
            asal_sekolah: {
                required: true,
            },
            nik: {
                required: true,
            },
            wali_nama: {
                required: true,
            },
            // wali_phone: {
            //     required: true,
            // },
            // wali_ktp: {
            //     required: true,
            // },
            // ijazah: {
            //     required: true,
            // },
        },
        messages: {
            alamat: {
                required: "Alamat Lengkap Wajib Diisi!",
            },
            nama: {
                required: 'Nama Lengkap Wajib Diisi!',
            },
            tmp_lahir: {
                required: "Tempat Lahir Wajib Diisi!",
            },
            tgl_lahir: {
                required: 'Tanggal Lahir Wajib Diisi!',
            },
            asal_sekolah: {
                required: "Asal Sekolah Wajib Diisi!",
            },
            nik: {
                required: 'NIK / NISN Wajib Diisi!',
            },
            email: {
                required: 'Alamat Email Wajib Diisi!',
                email : 'Format Alamat Email Salah!'
            },
            wali_nama: {
                required: 'Nama Orang Tua Wali Wajib Diisi!',
            },
            // wali_ktp: {
            //     required: "No KTP Orang Tua Wali Wajib Diisi!",
            // },
            // wali_phone: {
            //     required: 'No Telepon Orang Wajib Diisi!',
            // },
            // asal_sekolah: {
            //     required: "Asal Sekolah Wajib Diisi!",
            // },

        },
        submitHandler: function (form) {
            var fomr = $('form#form-ppdb')[0];
            var formData = new FormData(fomr);
            $.ajax({
                type: 'POST',
                url: laroute.route('form.save'),
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
                        laroute.route('ppdb.pembayaran', { noreg : response.data.noreg });
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
    });

    b.bootstrapWizard({
        tabClass: 'nav nav-tabs',
        nextSelector: '[data-wizard="next"]',
        previousSelector: '[data-wizard="prev"]',
        firstSelector : '[data-wizard="first"]',
        lastSelector : '[data-wizard="lsat"]',
        finishSelector : '[data-wizard="finish"]',
        backSelector : '[data-wizard="back"]',
		// onTabClick: function(tab, navigation, index) {
        //     return false;
        // },
		onNext: function (e, r, t) {
            var $valid = a.valid();
            if (!$valid) {
                i.focusInvalid();
                return false;
            }
        },
        onTabClick: function(activeTab, navigation, currentIndex, nextIndex) {
            if (nextIndex <= currentIndex) {
              return;
            }
            var $valid = $("#commentForm").valid();
            if (!$valid) {
              $validator.focusInvalid();
              return false;
            }
            if (nextIndex > currentIndex+1){
             return false;
            }
          }
        // onFinish: function(tab, navigation, index) {
        //     if(!a.valid())
        //     {
        //         return false;
        //     }else{
                
        //     }
  		// }
  });
});