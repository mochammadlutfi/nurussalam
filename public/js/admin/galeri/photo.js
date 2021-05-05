jQuery(function() {
    load_content();
    var modal = $('#modal_form');

    $(document).on('click', '#btn_tambah', function () {
        save_method = 'tambah';
        $('#modal_form').modal({
            backdrop: 'static',
            keyboard: false
        });
       $("#upload-foto").fileinput('refresh');
    });

    $("#upload-foto").fileinput({
        theme: 'fa',
        language: 'id',
    });

    $("#form-foto").on("submit",function (e) {
        e.preventDefault();
        var fomr = $('form#form-foto')[0];
        var formData = new FormData(fomr);
        $.ajax({
            url: laroute.route('admin.galeri.upload'),
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
                    modal.modal('hide');
                    Swal.fire({
                        title: "Berhasil",
                        text: response.pesan,
                        timer: 3000,
                        showConfirmButton: false,
                        icon: 'success'
                    });
                    $('.gal-masonry').html('');
                    load_content();
                } else {
                    Swal.fire({
                        title: "Gagal",
                        text: "Foto Gagal Di Upload!",
                        timer: 3000,
                        showConfirmButton: false,
                        icon: 'error'
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.close();
                alert('Error adding / update data');
            }
        });
    });

    $('#btn-loadMore').on('click', function(){
        old = parseInt($('#current_page').val());
        old += 1;
        $('#current_page').val(old);
        load_content();
    });
});

function load_content()
{
    var page = $('#current_page').val();
    var navNext = $('#btn-loadMore');
    
    $.ajax({
        url: $(location).attr("href"),
        type: "GET",
        dataType: "JSON",
        data: {
            page: page,
        },
        
        beforeSend: function(){
            $('#loading').removeClass('d-none');
        },
        success: function(response) {
            if(response.data.length !== 0){
                $.each(response.data, function(k, v) {
                    $('.gal-masonry').append(`<div class="animated fadeIn mb-10">
                    <div class="options-container fx-item-zoom-in">
                        <img class="img-fluid options-item" src="${ response.data[k].path }" alt="">
                        <div class="options-overlay bg-black-op">
                            <div class="options-overlay-content">
                                <a class="btn btn-sm btn-rounded btn-primary min-width-75" id="btn-detail" href="javascript:void(0)" data-id="${ response.data[k].id }">
                                    <i class="fa fa-search-plus"></i> Detail
                                </a>
                                <a class="btn btn-sm btn-rounded btn-danger min-width-75" id="btn-hapus" href="javascript:void(0)" onclick="hapus(${ response.data[k].id })">
                                    <i class="fa fa-times"></i> Hapus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>`);
                });
            }

            // Table Navigation
            response.next_page_url !== null ? navNext.removeClass('d-none') : navNext.addClass('d-none');
            $('#loading').addClass('d-none');

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
            data: {
                id: id,
            },
            type: "POST",
            url: laroute.route('admin.galeri.foto_hapus'),
            cache: false,
            beforeSend: function(){
                Swal.fire({
                    title: 'Tunggu Sebentar...',
                    text: ' ',
                    imageUrl: laroute.url('public/img/loading.gif', ['']),
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            success: function() {
                Swal.fire({
                    title: "Berhasil",
                    text: 'Foto Berhasil Dihapus!',
                    timer: 3000,
                    showConfirmButton: false,
                    icon: 'success'
                });
                $('.gal-masonry').html('');
                load_content();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
            }
        });
        } else {
            Swal.close();
        }
    });
}


