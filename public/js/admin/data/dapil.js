jQuery(document).ready(function () {
    $("#form-dapil").validate({
        onfocusout: function(element) {
            $(element).valid()
            if ($(element).valid()) {
                $('#form-dapil').find('button:submit').prop('disabled', false);  
            } else {
                $('#form-dapil').find('button:submit').prop('disabled', 'disabled');
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
            daerah: {
                required: true,
            },
        },
        messages: {
            nama: {
                required: "Nama Dapil Wajib Diisi!",
            },
            daerah: {
                required: "Daerah Dapil Wajib Diisi!",
            },
        },
        submitHandler: function (form) {
            var fomr = $('form#form-dapil')[0];
            var formData = new FormData(fomr);
            if($('#metode').val() == 'tambah')
            {
                url = laroute.route('admin.dapil.simpan');
            }else{
                url = laroute.route('admin.dapil.update');
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
                        $('#form-dapil')[0].reset();
                        $('#list-dapil').DataTable().ajax.reload();
                        $('#form-title').html('Tambah Dapil');
                        $('#form-dapil').find('#metode').val('tambah');
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
    
    oTable = $('#list-dapil').DataTable({
        processing: true,
        serverSide: true,
        ajax: laroute.route('admin.dapil'),
        columns: [
            {
                data: 'DT_RowIndex', 
                name: 'DT_RowIndex'
            },
            {
                data: 'nama',
                name: 'nama'
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
    $('#form-dapil')[0].reset();
    $('.form-group').removeClass('is-valid');
    $('.form-group').removeClass('is-invalid');
    // alert(id);
    $.ajax({
        url : laroute.route('admin.dapil.edit', {id : id}),
        type: "GET",
        dataType: "JSON",
        success: function(response)
        {
            $('#form-title').html('Ubah Data Dapil');
            $('#form-dapil').find('#metode').val('update');
            $('#form-dapil').find('input[name="id"]').val(response.id);
            $('#form-dapil').find('input[name="nama"]').val(response.nama);
            $('#form-dapil').find('textarea[name="daerah"]').val(response.daerah);
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
            url: laroute.route('admin.dapil.hapus', { id: id }),
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
                    text: 'Data Dapil Berhasil Dihapus!',
                    timer: 1500,
                    showConfirmButton: false,
                    icon: 'success'
                });
                $('#list-dapil').DataTable().ajax.reload();
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