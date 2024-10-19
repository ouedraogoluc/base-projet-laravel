<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="/backend/img/favicon.ico">
    <title>Gestion de concours</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/backend/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />
    <link rel="stylesheet" type="text/css" href="/backend/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/backend/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" type="text/css" href="/backend/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/backend/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/backend/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/backend/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="/backend/plugins/summernote/dist/summernote-bs4.css">

    <script src="/backend/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!--[if lt IE 9]>
  <script src="/backend/js/html5shiv.min.js"></script>
  <script src="/backend/js/respond.min.js"></script>
 <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        @include('admin.body.header')
        @include('admin.body.sidebar')
        <div class="page-wrapper">
            @yield('admin')
        </div>
    </div>
    <script src="{{ asset('backend/js/code.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <script src="/backend/js/popper.min.js"></script>
    <script src="/backend/js/bootstrap.min.js"></script>
    <script src="/backend/js/jquery.slimscroll.js"></script>
    <script src="/backend/js/app.js"></script>
    <script src="/backend/js/jquery.dataTables.min.js"></script>
    <script src="/backend/js/dataTables.bootstrap4.min.js"></script>
    <script src="/backend/js/select2.min.js"></script>
    <script src="/backend/js/code.js"></script>
    <script src="/backend/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/backend/plugins/summernote/dist/summernote-bs4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/fr.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    <script>
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'LT',
                locale: 'fr'
            });
            $('#datetimepicker4').datetimepicker({
                format: 'LT',
                locale: 'fr'
            });
        });



        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: "Vous êtes sûr ?",
                    text: "Supprimer ces données ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        Swal.fire(
                            'Deleted!',
                            'Votre fichier a été supprimé.',
                            'success'
                        );
                    }
                });
            });
        });
    </script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        console.log(type);
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
    </script>

</body>

</html>
