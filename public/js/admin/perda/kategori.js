
jQuery(document).ready(function () {

    var a = $('#form-kategori');

    a.validate({
        onfocusout: function(element) {
            $(element).valid()
            if ($(element).valid()) {
                $('#form-fraksi').find('button:submit').prop('disabled', false);  
            } else {
                $('#form-fraksi').find('button:submit').prop('disabled', 'disabled');
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
            nama: {
                required: true,
            },
        },
        messages: {
            nama: {
                required: "Nama Kategori Wajib Diisi!",
            },
        },
        submitHandler: function (form) {
            var fomr = $('form#form-kategori')[0];
            var formData = new FormData(fomr);
            if($('#metode').val() == 'tambah')
            {
                url = laroute.route('admin.perda_kategori.simpan');
            }else{
                url = laroute.route('admin.perda_kategori.update');
            }
            $.ajax({
                type: 'POST',
                url: url,
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
                            text: response.pesan,
                            timer: 3000,
                            showConfirmButton: false,
                            icon: 'success'
                        });
                        $('.form-group').removeClass('is-invalid');
                        $('.form-group').removeClass('is-valid');
                        $('#form-kategori')[0].reset();
                        $('#list-kategori').DataTable().ajax.reload();
                        $('#form-title').html('Tambah Kategori');
                        $('#form-kategori').find('#metode').val('tambah');
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

    
    oTable = $('#list-kategori').DataTable({
        processing: true,
        serverSide: true,
        pagingType: "simple",
        pageLength : 10,
        ajax: laroute.route('admin.perda_kategori'),
        columns: [
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'jumlah',
                name: 'jumlah'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    $('#search_box').keyup(function () {
        oTable.search($(this).val()).draw();
    });
});

function edit(id){
    $('#form-kategori')[0].reset();
    $('.form-group').removeClass('is-valid');
    $('.form-group').removeClass('is-invalid');
    // alert(id);
    $.ajax({
        url : laroute.route('admin.perda_kategori.edit', {id : id}),
        type: "GET",
        dataType: "JSON",
        success: function(response)
        {
            $('#form-title').html('Perbaharui Kategori Berita');
           $('#form-kategori').find('#metode').val('update');
           $('#form-kategori').find('input[name="id"]').val(response.id);
           $('#form-kategori').find('input[name="nama"]').val(response.nama);
           $('#form-kategori').find('textarea[name="deskripsi"]').val(response.deskripsi);
           $('#form-kategori').find('input[name="deskripsi"]').val(response.deskripsi);
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
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
            url: laroute.route('admin.perda_kategori.hapus', { id: id }),
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
            success: function(data) {
                Swal.fire({
                    title: "Berhasil",
                    text: 'Kategori Berhasil Dihapus!',
                    timer: 1500,
                    showConfirmButton: false,
                    icon: 'success'
                });
                $('#list-kategori').DataTable().ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
            }
        });
        } else {
            window.setTimeout(function(){
                location.reload();
            } ,1500);
        }
    });
}