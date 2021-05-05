jQuery(function() { 
    $('.gal-masonry').magnificPopup({
        delegate: 'a.img-lightbox',
        type:'image',
        gallery: {
            enabled: !0
        }
    });
});

function load_content()
{
    $.ajax({
        url: $(location).attr("href"),
        type: "GET",
        dataType: "JSON",
        data: {
            keyword: keyword,
            page: page,
        },
        beforeSend: function(){
            $('#loadingContent').removeClass('d-none');
        },
        success: function(response) {
            if(response.total !== 0)
            {
                $('#empty').addClass('d-none');
                if(page === 1)
                {
                    $('#masonry').prepend('<div class="col-lg-4 grid-sizer"></div>');
                    $('#current_page').val(1);
                }
                
            }else{
                $('#empty').removeClass('d-none');
            }
            $('#loadingContent').addClass('d-none');
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
                    imageUrl: laroute.url('assets/img/loading.gif', ['']),
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