
$(document).ready(function() {
    var a = $("#formPengajuan");
    var b = $("#pengajuan");
    var c = $('#field-tgl_kunjungan');
    var d = $('#formDewan');
    var e = $('#list-anggota');
    var ac = $('#anggota_count');

    c.datetimepicker({
        "format": "dddd, DD MMMM YYYY",
        "dayViewHeaderFormat": "MMMM YYYY",
        "locale": moment.locale('id'),
        "minDate": moment(),
        "sideBySide": true,
        "daysOfWeekDisabled": false,
        "calendarWeeks": false,
        "viewMode": "days",
        "widgetPositioning": {
            "horizontal": "auto",
            "vertical": "auto"
        },
    });

    var fraksi = $('#dewan-fraksi').select2({
        placeholder: 'Pilih Fraksi',
        theme: 'bootstrap4',
        language: 'id',
        ajax: {
            url: laroute.route('fraksiSelect'),
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

    $('#btn-add_anggota').on("click", function(e) {
        d[0].reset();
        $('#dewan-fraksi').val('').trigger('change');
        $('#formDewan .block .block-content').find('#fraksi-dewan').addClass('d-none');
        d.find('#dewan-metode').val('tambah');
        $('#dewan-fraksi').select2("val", "");
        $('#modal-dewan').modal();
    });

    $('#dewan-akd').on("change", function() {
        val = $(this).val();
        if(val !== 'Sekretariat Dewan')
        {
            $('#formDewan .block .block-content').find('#fraksi-dewan').removeClass('d-none');
        }else{
            $('#formDewan .block .block-content').find('#fraksi-dewan').addClass('d-none');
        }
    });

    c.on("dp.change", function(e) {
        tgl = moment(e.date, "dddd, DD MMMM YYYY");
        $.ajax({
            type: 'GET',
            url: laroute.route('kunjungan.cek'),
            data: {
                tgl : tgl.format("DD-MM-YYYY"),
            },
            success: function (response) {
                if (response.fail == false) {
                    b.find("button.btn-next").prop( "disabled", false);
                    $("textarea#field-tujuan").prop( "disabled", false);
                }else{
                    $("textarea#field-tujuan").prop( "disabled", true);
                    b.find("button.btn-next").prop( "disabled", true);
                }
            }
        });
    });

    $("#field-dokumen").fileinput({
        theme : 'fa',
        language: "id",
        browseClass: "btn btn-primary btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false,
        allowedFileExtensions: ["doc", "docx", "pdf", "ppt", "excel"],
        preferIconicPreview: true,
        previewFileIconSettings: {
            'doc': '<i class="fas fa-file-word text-primary"></i>',
            'xls': '<i class="fas fa-file-excel text-success"></i>',
            'ppt': '<i class="fas fa-file-powerpoint text-danger"></i>',
            'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
        },
        previewFileExtSettings: {
            'doc': function(ext) {
                return ext.match(/(doc|docx)$/i);
            },
            'xls': function(ext) {
                return ext.match(/(xls|xlsx)$/i);
            },
            'ppt': function(ext) {
                return ext.match(/(ppt|pptx)$/i);
            },
        }
    });

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
            tgl_kunjungan: {
                required: true,
            },
            tujuan: {
                required: true,
            },
        },
        messages: {
            tgl_kunjungan: {
                required: "Tanggal Kunjungan Wajib Diisi!",
            },
            tujuan: {
                required: 'Tujuan Kunjungan Wajib Diisi!',
            },
        },
        submitHandler: function (form) {
            var fomr = $('form#formPengajuan')[0];
            var formData = new FormData(fomr);
            tgl_kunjungan = $('#field-tgl_kunjungan').val();
            formData.append('tgl', moment(tgl_kunjungan, "dddd, DD MMMM YYYY").format("YYYY-MM-DD"));

            $.ajax({
                type: 'POST',
                url: laroute.route('kunjungan.simpan'),
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
                            title: "Berhasil",
                            text: "Pengajuan Kunjungan Berhasil Dikirim!",
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

    d.validate({
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
            akd: {
                required: true,
            },
        },
        messages: {
            nama: {
                required: 'Nama Lengkap Wajib Diisi!',
            },
            akd: {
                required: "Jenis Keanggotaan Wajib Diisi!",
            },
        },
        submitHandler: function (form) {
            var data = {};
            var dataArray = d.serializeArray();
            for(var i=0;i < dataArray.length;i++){
                data[dataArray[i].name] = dataArray[i].value;
            }
            fraksi = d.find("#dewan-fraksi option:selected").text();
            if(data.metode == 'tambah')
            {
                counter = ac.val();
                if(counter == '')
                {
                    counter = 0;
                }else{
                    counter++;
                }
                ac.val(counter);
                $('#list-anggota').append(`<div class="row" data-id="`+ counter +`">
                    <input type="hidden" name="anggota[`+ counter +`][nama]" value="`+ data.nama +`">
                    <input type="hidden" name="anggota[`+ counter +`][akd]" value="`+ data.akd +`">
                    <input type="hidden" name="anggota[`+ counter +`][fraksi]" value="`+ data.fraksi +`">
                    <div class="col col-8 col-lg-10">
                        <div class="font-weight-bold">`+ data.nama +`</div>
                        <div class="">`+ data.akd +`</div>
                        <div class="">`+ fraksi +`</div>
                    </div>
                    <div class="col col-4 col-lg-2">
                        <button type="button" class="btn btn-secondary btn-sm btn-ubah_anggota" data-id="`+ counter +`">
                            Ubah
                        </button>
                        <button type="button" class="btn btn-danger btn-sm btn-hapus_anggota" data-id="`+ counter +`">
                            Hapus
                        </button>
                    </div>
                </div>`);
            }else{
                parent = $('#list-anggota .row[data-id="' + data.id + '"]');
                parent.find('input[name="anggota['+ data.id +'][nama]"]').val(data.nama);
                parent.replaceWith(`<div class="row" data-id="`+ data.id +`">
                <input type="hidden" name="anggota[`+ data.id +`][nama]" value="`+ data.nama +`">
                <input type="hidden" name="anggota[`+ data.id +`][akd]" value="`+ data.akd +`">
                <input type="hidden" name="anggota[`+ data.id +`][fraksi]" value="`+ data.fraksi +`">
                <div class="col col-8 col-lg-10">
                    <div class="font-weight-bold">`+ data.nama +`</div>
                    <div class="">`+ data.akd +`</div>
                    <div class="">`+ fraksi +`</div>
                </div>
                <div class="col col-4 col-lg-2">
                    <button type="button" class="btn btn-secondary btn-sm btn-ubah_anggota" data-id="`+ data.id +`">
                        Ubah
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-hapus_anggota" data-id="`+ data.id +`">
                        Hapus
                    </button>
                </div>
            </div>`);
            }
            e.removeClass('d-none');
            $('#modal-dewan').modal('toggle');
            return false;
        }
    });

    $(document).on('click', '.btn-ubah_anggota', function () {
        d[0].reset();
        $('#dewan-fraksi').val('').trigger('change');
        id = $(this).data('id');
        parent = $('#list-anggota .row[data-id="' + id + '"]');
        var data = {};
        var dataArray = parent.find('input').serializeArray();
        for(var i=0;i < dataArray.length;i++){
            name = dataArray[i].name;
            result = name.match(/^.*\[([a-z]+)\]/);
            data[result[1]] = dataArray[i].value;
        }
        // console.log(data);
        d.find('input[name=metode]').val('update');
        d.find('input[name=id]').val(id);
        d.find('input[name=nama]').val(data.nama);
        d.find('select[name=akd]').val(data.akd);

        if(data.akd !== 'Sekretariat Dewan')
        {
            $('#formDewan .block .block-content').find('#fraksi-dewan').removeClass('d-none');
        }else{
            $('#formDewan .block .block-content').find('#fraksi-dewan').addClass('d-none');
        }
        $('#modal-dewan').modal();
    });

    $(document).on('click', '.btn-hapus_anggota', function () {
        id = $(this).data('id');
        parent = $('#list-anggota .row[data-id="' + id + '"]');
        parent.remove();
        counter = parseInt(ac.val());
        if(counter == 0)
        {
            e.addClass('d-none');
            ac.val('');

        }else{
            ac.val(counter--);
        }
    });
});