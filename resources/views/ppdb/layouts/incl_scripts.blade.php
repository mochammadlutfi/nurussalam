        <script src="{{ asset('js/laroute.js') }}"></script>
        <script src="{{ asset('js/codebase.app.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('js/common.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>
        <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dataTables_filter input[type="search"]').
        attr('placeholder','Search in this blog ....').
        css({'width':'500px','display':'inline-block'});
        $.extend( true, $.fn.dataTable.defaults, {
            "responsive": true,
            "pageLength": 20,
            "lengthChange": false,
            "language": {
                'loadingRecords': '&nbsp;',
                "sEmptyTable":	 '<img src="'+laroute.url('img/data_not_found.png', [''])+'">',
                "sProcessing":   '<div class="spinner-grow text-primary pt-25" role="status"><span class="sr-only">Loading...</span></div>',
                "sLengthMenu":   "Tampilkan _MENU_",
                "sZeroRecords":  '<img src="'+laroute.url('img/data_not_found.png', [''])+'">',
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext":     "Selanjutnya",
                    "sLast":     "Terakhir"
                }
            },
        });
        </script>
        <!-- Laravel Scaffolding JS -->
        <script src="{{ asset('js/laravel.app.js') }}"></script>
