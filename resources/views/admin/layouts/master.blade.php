<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $general->siteName($pageTitle ?? '') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{ getImage(getFilePath('logoIcon') . '/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/bootstrap-toggle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/css/line-awesome.min.css') }}">
    @stack('style-lib')

    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/app.css') }}">
    @stack('style')

    <style>
        .sidebar__logo img {
            filter: contrast(0.8)
        }
    </style>
</head>

<body>
    @yield('content')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.19/jspdf.plugin.autotable.min.js"></script>



    <script src="{{ asset('assets/global/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/bootstrap-toggle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/cu-modal.js') }}"></script>

    @include('partials.notify')
    @stack('script-lib')

    <script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script>

    <script src="{{ asset('assets/admin/js/vendor/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>

    {{-- LOAD NIC EDIT --}}
    <script>
        "use strict";
        bkLib.onDomLoaded(function() {
            $(".nicEdit").each(function(index) {
                $(this).attr("id", "nicEditor" + index);
                new nicEditor({
                    fullPanel: true
                }).panelInstance('nicEditor' + index, {
                    hasPanel: true
                });
            });
        });
        (function($) {
            $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain', function() {
                $('.nicEdit-main').focus();
            });
        })(jQuery);
    </script>

    <!-- Pass the authenticated user's information to JavaScript -->
    @if (auth()->guard('admin')->check())
        <script>
            @if (auth()->guard('admin')->check())
                var authenticatedUserName = @json(auth()->guard('admin')->user()->name);
            @else
                var authenticatedUserName = null;
            @endif
        </script>
    @else
        <script>
            var authenticatedUserName = null;
        </script>
    @endif

   

    <script>
        var logoUrl = "{{ getImage(getFilePath('logoIcon') . '/logo_dark.png') }}";
    </script>


    <script>
        "use strict";
        bkLib.onDomLoaded(function() {
            $(".nicEdit").each(function(index) {
                $(this).attr("id", "nicEditor" + index);
                new nicEditor({
                    fullPanel: true
                }).panelInstance('nicEditor' + index, {
                    hasPanel: true
                });
            });
        });

        (function($) {
            $(document).on('mouseover', '.nicEdit-main,.nicEdit-panelContain', function() {
                $('.nicEdit-main').focus();
            });

            //   GENERATE PDF WHEN BUTTON CLICKED

            $(document).ready(function() {

                $('#generatePdf').on('click', function() {
                    // Get filter values
                    const search = $('input[name="search"]').val();
                    const trxType = $('select[name="trx_type"]').val();
                    const remark = $('select[name="remark"]').val();
                    const date = $('input[name="date"]').val();

                    // Get site name from environment variable
                    var siteName = "{{ env('APP_NAME') }}";

                    // Generate report title based on filters
                    var reportTitle = `${siteName.toUpperCase()}`;
                    if (remark) reportTitle += ` ${remark.toUpperCase()}`;
                    if (date) reportTitle += ` FROM ${date}`;
                    if (!remark && !search && !date) reportTitle += ` TRANSACTION'S`;

                    // Create query parameters
                    const params = new URLSearchParams({
                        search: search,
                        trx_type: trxType,
                        remark: remark,
                        date: date,
                        report_title: reportTitle // Include the custom report title
                    });

                    // Redirect to the generate report URL with query parameters
                    window.location.href =
                        `{{ route('admin.report.transaction.report') }}?${params.toString()}`;
                });

            });

        })(jQuery);
    </script>
    @stack('script')
</body>

</html>
