
jQuery(function() {
    
    moment.locale('id');
    var start = moment().startOf('month');
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
        locale: {
            "customRangeLabel": "Custom Tanggal",
        }
    }, cb);
    cb(start, end);


    // filter_bank.on('change', function(){
    //     load_content();
    // });
    $('#filter-bank').on('change', function(){
        load_content();
    });
    $('#filter-status').on('change', function(){
        load_content();
    });

    // // Navigation Table
    $('#next-data-list').on('click', function () {
        old = parseInt($('#current_page').val());
        old += 1;
        $('#current_page').val(old);
        load_content();
    });

    $('#prev-data-list').on('click', function () {
        old = parseInt($('#current_page').val());
        old -= 1;
        $('#current_page').val(old);
        load_content();
    });
});
function detail(id){
    
    window.document.location = laroute.route('admin.ppdb.bayar.detail', { id: id });
}

function load_content() {
    var keyword = $('#search-data-list').val();
    var page = $('#current_page').val();

    
    var bank = $('#filter-bank').val();
    var status = $('#filter-status').val();
    var tgl_mulai = $('#tgl_mulai').val();
    var tgl_akhir = $('#tgl_akhir').val();

    var navNext = $('#next-data-list');
    var navPrev = $('#prev-data-list');

    $.ajax({
        url: laroute.route('admin.ppdb.bayar'),
        type: "GET",
        dataType: "JSON",
        data: {
            keyword: keyword,
            page: page,
            bank: bank,
            status: status,
            tgl_mulai: tgl_mulai,
            tgl_akhir: tgl_akhir,
        },
        beforeSend: function () {
            $('#data-list tbody tr#loading').removeClass('d-none');
            navNext.prop('disabled', true);
            navPrev.prop('disabled', true);
        },
        success: function (response) {
            $('#data-list tbody tr').not('#data-list tbody tr#loading').remove();
            if (response.data.length !== 0) {
                $.each(response.data, function (k, v) {
                    $('#data-list tbody').append(`
                        <tr class="c-pointer" onClick="detail(${ response.data[k].id })">
                            <td>${ response.data[k].tgl_bayar }</td>
                            <td>${ response.data[k].status_badge }</td>
                            <td>
                                ${ response.data[k].tujuan.bank }
                            </td>
                            <td>
                                ${ response.data[k].ppdb.kd_registrasi }<br>
                                ${ response.data[k].ppdb.peserta.nama }
                            </td>
                            <td>
                                ${ response.data[k].pengirim_bank }<br>
                                ${ response.data[k].pengirim_rek }
                            </td>
                            <td>
                                ${ response.data[k].jumlah }
                            </td>
                        </tr>              
                    `);
                });
            } else {

                $('#data-list tbody').append(`
                <tr>
                    <td colspan="6">
                        <div class="text-center">
                            <img class="img-fluid" src="` + laroute.url('public/img/icon/not_found.png', ['']) + `">
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
            if (response.total === 0) {
                var navigasi = 'Menampilkan Data 0 - 0 Dari 0';
            } else {
                var navigasi = 'Menampilkan Data ' + response.from + ' - ' + response.to + ' Dari ' + response.total;
            }
            $('#content-nav span').html(navigasi);
            $('#data-list tbody tr#loading').addClass('d-none');
            // End Table Navigation

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error deleting data');
        }
    });
}