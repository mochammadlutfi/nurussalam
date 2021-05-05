$(document).ready(function () {
    load_content();


    $("#filter-kategori").select2({
        placeholder: 'Pilih Kategori',
        theme : 'bootstrap4',
        ajax: {
            url: laroute.route('perda.kategoriSelect'),
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
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        load_content(page);
    });

    $("#form-filter").submit(function (e) {
        // alert('asd');
        e.preventDefault();
        load_content(1);
    });
});

function load_content(page = 1)
{
    // if(search)
    // {
        // dataSend = {
        //     kategori: $('#filter-kategori').val(),
        //     nomor : $('#filter-nomor').val(),
        //     tahun: $('#filter-tahun').val(),
        //     subjek: $('#filter-subjek').val(),
        //     page: page,
        // };
    // }else{
    //     dataSend = {
    //         page : page
    //     };
    // }
    $.ajax({
        url: laroute.route('perda'),
        type: "GET",
        dataType: "JSON",
        data: {
            kategori: $('#filter-kategori').val(),
            nomor : $('#filter-nomor').val(),
            tahun: $('#filter-tahun').val(),
            subjek: $('#filter-subjek').val(),
            page: page,
        },
        beforeSend: function(){
            $('#loadingContent').removeClass('d-none');
        },
        success: function(response) {
            $('#dataContent').html(response.html);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error deleting data');
        }
    });
}