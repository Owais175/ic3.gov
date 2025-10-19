<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no">
    <title>Home Page - Internet Crime Complaint Center (IC3)</title>
    <script nonce="dvm0ixsemwv20rrd">
        if (window.trustedTypes) {
            trustedTypes.createPolicy('default', {
                createHtml: s => {
                    console.error(`TrustedHTML Violation: ${s}`);
                    return null;
                },
                createScript: s => {
                    console.error(`TrustedScript Violation: ${s}`);
                    return null;
                },
                createScriptURL: s => {
                    const prefix = ['https://www.gstatic.com/recaptcha/releases/',
                        'https://www.googletagmanager.com/gtag/js'
                    ];
                    let u = undefined;
                    try {
                        u = new URL(s);
                        u = `${u.protocol}//${u.host}${u.pathname}`;
                    } catch {}
                    if ((u && prefix.some(x => u.startsWith(x))) ||
                        'https://www.google-analytics.com/analytics.js' === s) {
                        return s;
                    } else {
                        console.error(`TrustedScriptURL Violation: ${s}`);
                        return null;
                    }
                }
            });
        }
    </script>

    <link rel="stylesheet" href="{{ asset('asset/css/uswds.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/site.css') }}">



    <!-- We participate in the US government's analytics program. See the data at analytics.usa.gov. -->
    <script async src="https://dap.digitalgov.gov/Universal-Federated-Analytics-Min.js?agency=DOJ" id="_fed_an_ua_tag"
        nonce="dvm0ixsemwv20rrd"></script>

    <link rel="apple-touch-icon" sizes="180x180" type="image/png" href="image/favicon-180.png">
    <link rel="icon" sizes="32x32" type="image/png" href="image/favicon-32.png">
    <link rel="icon" sizes="128x128" type="image/png" href="image/favicon-128.png">
    <link rel="icon" sizes="192x192" type="image/png" href="image/favicon-192.png">
    <link rel="alternate" type="application/rss+xml" href="PSA/rss.txt" title="IC3 News">
    <link rel="alternate" type="application/rss+xml" href="CSA/rss.txt" title="IC3 Industry Alerts">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css" />

    @stack('css')

</head>

<body>

    @include('front.header')


    @yield('content')

    @include('front.footer')



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>

    <script src="{{ asset('asset/js/form.js') }}"></script>
    <script src="{{ asset('asset/js/uswds-init.min.js') }}"></script>
    <script src="{{ asset('asset/js/uswds.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('[data-fancybox="gallery"]').fancybox({
            buttons: [
                "slideShow",
                "thumbs",
                "zoom",
                "fullScreen",
                "share",
                "close"
            ],
            loop: false,
            protect: true
        });
    </script>

    <script src="https://www.google.com/recaptcha/api.js" async defer nonce="dzvwhr5k53xm1rye"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                showConfirmButton: true,
            });
        </script>
    @endif

</body>

</html>
