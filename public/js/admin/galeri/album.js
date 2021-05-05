jQuery(function() { 
    load_content();
    var modal = $('#modalAlbum');

    $(document).on('click', '.btn-edit', function () {
        var id = $(this).attr('data-id');

        $.ajax({
            url: laroute.route('admin.galeri.edit', { id: id }),
            type: "GET",
            dataType: "JSON",
            beforeSend: function(){
                Swal.fire({
                    title: 'Tunggu Sebentar...',
                    text: ' ',
                    imageUrl: laroute.url('public/img/loading.gif', ['']),
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            success: function(data) {
                Swal.close();
                $('#form-album')[0].reset();
                $('.form-group').removeClass('is-valid');
                $('.form-group').removeClass('is-invalid');

                // modal.find('h5.modal-title').html('Ubah Alamat');
                modal.find('input#field-id').val(data.id);
                modal.find('input#method').val('update');
                modal.find('input#field-nama').val(data.title);
                modal.find('textarea#field-deskripsi').val(data.description);
                modal.find('img#img_preview').attr("src", data.thumbnail_url);
                if(data.status === 1)
                {
                    modal.find('#status_publikasi').prop("checked", true);
                }else{
                    modal.find('#status_draft').prop("checked", true);
                }
                
                modal.modal({
                    backdrop: 'static',
                    keyboard: false
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.close();
                alert('Error deleting data');
            }
        });
    });

    $('#btn-add').on("click", function(){
        $('#form-album')[0].reset();
        modal.find('input#method').val('create');
        $('#modal_title').text('Tambah Album Baru');
        modal.modal({
            backdrop: 'static',
            keyboard: false
        });
    });

    
    $("#file-upload").on("change", function (event) {
        // cropModal.modal();
        var m1 = $(makeModal());
        m1.modal('show');
        var croppie = new Croppie(document.getElementById('cropResizer'), {
            viewport: {
                width: 440,
                height: 240,
                type: 'square'
            },
            original : {
                width: 440,
                height: 240,
                type: 'square'
            },
            boundary: {
                width: 460,
                height: 260
            },
            enableOrientation: true
        });
        if (event.target.files && event.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                croppie.bind({
                    url: e.target.result,
                });
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        $("#cropSave").on("click", function () {
            croppie.result({
                type: 'base64',
                size: 'original',
                format: 'jpeg',
                size: {
                    width: 1200,
                    height: 675
                }
            }).then(function (base64) {
                m1.modal("hide");
                $("#img_preview").attr("src", base64);
                $("#featured_img").val(base64);
            });
        });
    });

    $("#form-album").on("submit", function (e) {
        e.preventDefault();
        var fomr = $('form#form-album')[0];
        var formData = new FormData(fomr);

        if($("#method").val() == 'update')
        {
            url = laroute.route('admin.galeri.update');
        }else{
            url = laroute.route('admin.galeri.simpan');
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
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
                if (response.fail === false) {
                    modal.modal('hide');
                    Swal.fire({
                        title: `Berhasil!`,
                        icon: 'success',
                        timer: 3000,
                        html: `Data Baru Berhasil Disimpan!`,
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                    });
                    load_content();
                } else {
                    Swal.close();
                    for (control in response.errors) {
                        $('#field-' + control).addClass('is-invalid');
                        $('#error-' + control).html(response.errors[control]);
                        $.notify({
                            // options
                            icon: 'fa fa-times',
                            message: response.errors[control]
                        }, {
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
    // Filter Table
    $('#search-data-list').on('input', function(){
        clearTimeout(this.delay);
        this.delay = setTimeout(function(){
           $(this).trigger('search');
        }.bind(this), 800);
     }).on('search', function(){
        load_content();
        $('#current_page').val(1);
     });

    // // Navigation Table
    $('#next-data-list').on('click', function(){
        old = parseInt($('#current_page').val());
        old += 1;
        $('#current_page').val(old);
        load_content();
    });

    $('#prev-data-list').on('click', function(){
        old = parseInt($('#current_page').val());
        old -= 1;
        $('#current_page').val(old);
        load_content();
    });

});


function load_content(){
    var keyword = $('#search-data-list').val();
    var page = $('#current_page').val();

    var navNext = $('#next-data-list');
    var navPrev = $('#prev-data-list');
    
    $.ajax({
        url: laroute.route('admin.galeri.album'),
        type: "GET",
        dataType: "JSON",
        data: {
            keyword: keyword,
            page: page,
        },
        beforeSend: function(){
            $('#data-list tbody tr#loading').removeClass('d-none');
            navNext.prop('disabled', true);
            navPrev.prop('disabled', true);
        },
        success: function(response) {
            $('#data-list tbody tr').not('#data-list tbody tr#loading').remove();
            if(response.data.length !== 0){
                $.each(response.data, function(k, v) {
                    $('#data-list tbody').append(`
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input class="custom-control-input" type="checkbox" name="child-${ response.data[k].id }" id="child-${ response.data[k].id }" value="option1" >
                                    <label class="custom-control-label" for="child-${ response.data[k].id }"></label>
                                </div>
                            </td>
                            <td width="8%">
                                <img src="${ response.data[k].thumbnail_url }" class="img-fluid">
                            </td>
                            <td>
                                <div class="font-size-16 font-w600"> ${ response.data[k].title } </div>
                                <div class="font-size-15"><i class="si si-picture mr-1"></i> ${ response.data[k].photo_count } Photos | ${ response.data[k].status_badge }</div>
                            </td>
                            <td class="text-center">${ response.data[k].views }x </td>
                            <td class="text-center">${ response.data[k].dibuat }</td>
                            <td class="text-center">
                                <a class="btn btn-secondary btn-sm js-tooltip" data-toggle="tooltip" data-placement="top" title="Tambah Foto" href="${ laroute.route('admin.galeri.foto', { id : response.data[k].id }) }">
                                    <i class="si si-plus"></i>
                                </a>
                                <a class="btn btn-secondary btn-sm js-tooltip btn-edit" data-toggle="tooltip" data-placement="top" title="Ubah"  href="javascript:void(0)" data-id="${ response.data[k].id }">
                                    <i class="si si-note"></i>
                                </a>
                                <a class="btn btn-secondary btn-sm js-tooltip" data-toggle="tooltip" data-placement="top" title="Hapus" href="javascript:void(0);" onclick="hapus(${ response.data[k].id })">
                                    <i class="si si-trash"></i>
                                </a>
                            </td>
                        </tr>              
                    `);
                });
            }else{

                $('#data-list tbody').append(`
                <tr>
                    <td colspan="6">
                        <div class="text-center">
                            <img class="img-fluid" src="`+ laroute.url('public/img/icon/not_found.png', ['']) +`">
                            <div>
                                <h3 class="font-size-24 font-w600 mt-3">Data Tidak Ditemukan</h3>
                            </div>
                        </div>
                    </td>
                </tr>          
                `);
            }

            // Table Navigation
            response.next_page_url !== null ? navNext.prop('disabled', false) : navNext.prop('disabled', true);
            response.prev_page_url !== null ? navPrev.prop('disabled', false) : navPrev.prop('disabled', true);
            if(response.total === 0){
                var navigasi = 'Menampilkan Data 0 - 0 Dari 0';
            }else{
                var navigasi = 'Menampilkan Data '+ response.from +' - '+ response.to +' Dari '+ response.total;
            }
            $('#content-nav span').html(navigasi);
            $('#data-list tbody tr#loading').addClass('d-none');
            // End Table Navigation

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error deleting data');
        }
    });
}


function hapus(id) {
    Swal.fire({
        title: "Anda Yakin?",
        text: "Data Yang Dihapus Tidak Akan Bisa Dikembalikan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak, Batalkan!',
        reverseButtons: true,
        allowOutsideClick: false,
        confirmButtonColor: '#af1310',
        cancelButtonColor: '#fffff',
    })
    .then((result) => {
        if (result.value) {
        $.ajax({
            url: laroute.route('admin.galeri.hapus', { id: id }),
            type: "GET",
            dataType: "JSON",
            beforeSend: function(){
                Swal.fire({
                    title: 'Tunggu Sebentar...',
                    text: ' ',
                    imageUrl: laroute.url('public/img/loading.gif', ['']),
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            success: function(response) {
                if(response.fail === false)
                {
                    Swal.fire({
                        title: "Berhasil",
                        text: 'Data Berhasil Dihapus!',
                        timer: 3000,
                        showConfirmButton: false,
                        icon: 'success'
                    });
                    load_content();
                }else{
                    Swal.fire({
                        title: "Gagal",
                        text: 'Data Gagal Dihapus!',
                        timer: 3000,
                        showConfirmButton: false,
                        icon: 'warning'
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.close();
                alert('Error deleting data');
            }
        });
        }else{
            Swal.close();
        }
    });
}

function makeModal(text) {
    return `<div class="modal" id="cropModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="block-header block-header-default">
                        <h3 class="block-title modal-title">Potong & Sesuaikan Foto</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content pb-15">
                    <div id="cropResizer"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn btn-primary rotate btn-block text-center" data-deg="90">
                                <i class="fa fa-undo"></i>
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary rotate btn-block text-center" data-deg="-90" >
                            <i class="fa fa-redo"></i></button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-block" id="cropSave">Potong Dan Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`;
}