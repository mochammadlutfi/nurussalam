
jQuery(function() {

    $("#file-upload").on("change", function (event) {
        // cropModal.modal();
        var m1 = $(makeModal('Somehting here'));
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

    $(".rotate").on("click", function () {
        croppie.rotate(parseInt($(this).data('deg')));
    });
    // Crop End

    $('#field-deskripsi').summernote({
        height: '226px',
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });

    $('#field-url').on('input', function (e) {
        var url = $("#field-url").val();
        var matches = url.match(/^https:\/\/(?:www\.)?youtube.com\/watch\?(?=.*v=\w+)(?:\S+)?$/);
        if (matches) {
            VID_REGEX = /(?:youtube(?:-nocookie)?\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/
            video_id = url.match(VID_REGEX)[1];

            var image_url = 'https://img.youtube.com/vi/' + video_id + '/0.jpg';

            $('#img_preview').attr('src', image_url);
            $('#cover_url').val(image_url);
        } else {
            $('#img_preview').attr('src', laroute.url('public/img/poster.png', ['']), );
        }
    });


    $("#form-video").on("submit", function (e) {
        e.preventDefault();
        var fomr = $('form#form-video')[0];
        var formData = new FormData(fomr);

        if($("#method").val() == 'update')
        {
            url = laroute.route('admin.video.update');
        }else{
            url = laroute.route('admin.video.simpan');
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
                if (response.fail == false) {
                    $('#modal_embed').modal('hide');
                    Swal.fire({
                        title: `Berhasil!`,
                        icon: 'success',
                        html: `Video Baru Berhasil Disimpan!
                            <br><br>
                            <a type="button" class="btn btn-keluar btn-alt-danger" href="` + laroute.route('admin.video') + `"><i class="si si-close mr-1"></i>Keluar</a> 
                            <a type="button" class="btn btn-tambah_baru btn-alt-primary" href="` + laroute.route('admin.video.tambah') + `"><i class="si si-plus mr-1"></i>Tambah Video Lain</a>`,
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
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
});

function youtube_image($id) {
    // var resolusi = [
    //     'maxresdefault',
    //     'sddefault',
    //     'mqdefault',
    //     'hqdefault',
    //     'default'
    // ];

    // res.forEach(img){
    //     console.log(entry);
    // }
    // for ($x = 0; $x < res.length ); $x++) {
    //     $url = `https://img.youtube.com/vi/${ $id }/${ $resolution[$x] }.jpg`;
    //     if (get_headers($url)[0] == 'HTTP/1.0 200 OK') {
    //         break;
    //     }
    // }
    // $.each(resolusi, function(data) {
    //     console.log(data);
    // });
    
    // return $url;
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
