$(document).ready(function () {
    load_content();
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
    $.ajax({
        url: laroute.route('kunjungan'),
        type: "GET",
        dataType: "JSON",
        data: {
            keyword: keyword,
            page: page,
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