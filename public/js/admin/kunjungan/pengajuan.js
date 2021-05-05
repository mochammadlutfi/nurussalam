$(function() {
    moment.locale('id');
    var start =  moment().startOf('month');
    var end = moment();

    function cb(start, end) {
        $('#tgl_range span').html(start.format('D MMMM, YYYY') + ' - ' + end.format('D MMMM, YYYY'));
        $('input#tgl_mulai').val(start.format('YYYY-MM-DD'));
        $('input#tgl_akhir').val(end.format('YYYY-MM-DD'));
        load_content();
    }

    $('#tgl_range').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Hari ini': [moment(), moment()],
           'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
           '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
           'Bulan Sekarang': [moment().startOf('month'), moment().endOf('month')],
           'Bulan Kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        locale : {
            "customRangeLabel": "Custom Tanggal",
        }
    }, cb);
    cb(start, end);
});

 // Navigasi Next Page Modal Produk
 $(document).on('click', 'button#nextProduk', function() {     
    current_page = parseInt($('#current_page').val());
    current_page += 1;
    load_content(null, current_page);
});

// Navigasi Prev Page Modal Produk
$(document).on('click', 'button#prevProduk', function() {
    current_page = parseInt($('#current_page').val());
    current_page -= 1;
    load_content(null, current_page);
});

function load_content(keyword, page = 1)
{
    tgl_mulai = $('input#tgl_mulai').val();
    tgl_akhir = $('input#tgl_akhir').val();

    $.ajax({
        url: laroute.route('admin.kunjungan.pengajuan'),
        type: "GET",
        dataType: "JSON",
        data: {
            keyword: keyword,
            page: page,
            tgl_mulai : tgl_mulai,
            tgl_akhir : tgl_akhir,
        },
        beforeSend: function(){
            $('#kunjungan-list').html(`<div class="row justify-content-center">
                <div class="col-lg-6 text-center py-50">
                    <div class="spinner-border text-primary wh-50" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>`);
        },
        success: function(response) {
            if(!response.next_page)
            {
                $('#nextProduk').prop('disabled', true);
            }else{
                $('#nextProduk').prop('disabled', false);
            }
            if(!response.prev_page)
            {
                $('#prevProduk').prop('disabled', true);
            }else{
                $('#prevProduk').prop('disabled', false);
            }
            $('#produk_nav span').html(response.navigasi);
            $('#kunjungan-list').html(response.html);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error deleting data');
        }
    });
}