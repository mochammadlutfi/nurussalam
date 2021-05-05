jQuery(document).ready(function () {

    
    $("#field-kategori").select2({
        placeholder: 'Pilih Kategori',
        theme : 'bootstrap4',
        ajax: {
            url: laroute.route('admin.perda_kategori.json'),
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

    $("#upload-dokumen").fileinput({
        theme: 'fa',
        language: 'id',
        showCaption: false,
        browseClass: "btn btn-primary btn-block",
        showUpload: false,
        showRemove : false,
        previewFileIcon: '<i class="fas fa-file"></i>',
        allowedPreviewTypes: null, // disable preview of standard types
        previewFileIconSettings: {
            'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
        }
    });

    $("#form-perda").submit(function (e) {
        e.preventDefault();
        var fomr = $('form#form-perda')[0];
        var formData = new FormData(fomr);

        $.ajax({
            url: laroute.route('admin.perda.simpan'),
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                Swal.fire({
                    title: 'Tunggu Sebentar...',
                    text: 'Data Sedang Diproses!',
                    imageUrl: laroute.url('assets/img/loading.gif', ['']),
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            success: function (response) {
                Swal.close();
                $('.is-invalid').removeClass('is-invalid');
                if (response.fail == false) {
                    $('#modal_embed').modal('hide');
                    Swal.fire({
                        title: `Berhasil!`,
                        showConfirmButton: false,
                        icon: 'success',
                        html: `Produk Hukum Baru Berhasil Disimpan!
                            <br><br>
                            <a href="`+ laroute.route('admin.perda') +`" class="btn btn-keluar btn-alt-danger">
                                <i class="si si-close mr-1"></i>Keluar
                            </a> 
                            <a href="`+ laroute.route('admin.perda.tambah') +`" class="btn btn-tambah_baru btn-alt-primary">
                                <i class="si si-plus mr-1"></i>Tambah Produk Hukum Lain
                            </a>`,
                        showCancelButton: false,
                        showConfirmButton: false,
                        onBeforeOpen: () => {
                            const keluar = document.querySelector('.btn-keluar')
                            const tambah_baru = document.querySelector('.btn-tambah_baru')
                
                            keluar.addEventListener('click', () => {
                                    location.href = laroute.route('admin.posts');
                            })
                
                            tambah_baru.addEventListener('click', () => {
                                    location.reload();
                            })
                        }
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