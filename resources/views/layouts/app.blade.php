<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Findeo') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/color.css">
    <link rel="stylesheet" href="/css/icons.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body>
<div id="wrapper">
    <!-- Header Container -->
    @include('layouts.header')

    @yield('content')
    <!-- Footer -->
    @include('layouts.footer')

    <div id="backtotop"><a href="#"></a></div>
</div>

{{--<!-- Scripts ----}}
<script type="text/javascript" src="/scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/scripts/jquery-migrate-3.1.0.min.js"></script>
<script type="text/javascript" src="/scripts/chosen.min.js"></script>
<script type="text/javascript" src="/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="/scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="/scripts/rangeSlider.js"></script>
<script type="text/javascript" src="/scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="/scripts/slick.min.js"></script>
<script type="text/javascript" src="/scripts/masonry.min.js"></script>
<script type="text/javascript" src="/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="/scripts/custom.js"></script>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="/scripts/infobox.min.js"></script>
<script type="text/javascript" src="/scripts/markerclusterer.js"></script>
<script type="text/javascript" src="/scripts/maps.js"></script>

<!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
<script src="scripts/moment.min.js"></script>
<script src="scripts/daterangepicker.js"></script>
<script>
    // Calendar Init
    $(function () {
        $('#date-picker').daterangepicker({
            "opens": "left",
            singleDatePicker: true,

            // Disabling Date Ranges
            isInvalidDate: function (date) {
                // Disabling Date Range
                var disabled_start = moment('09/02/2018', 'MM/DD/YYYY');
                var disabled_end = moment('09/06/2018', 'MM/DD/YYYY');
                return date.isAfter(disabled_start) && date.isBefore(disabled_end);

                // Disabling Single Day
                // if (date.format('MM/DD/YYYY') == '08/08/2018') {
                //     return true;
                // }
            }
        });
    });

    // Calendar animation
    $('#date-picker').on('showCalendar.daterangepicker', function (ev, picker) {
        $('.daterangepicker').addClass('calendar-animated');
    });
    $('#date-picker').on('show.daterangepicker', function (ev, picker) {
        $('.daterangepicker').addClass('calendar-visible');
        $('.daterangepicker').removeClass('calendar-hidden');
    });
    $('#date-picker').on('hide.daterangepicker', function (ev, picker) {
        $('.daterangepicker').removeClass('calendar-visible');
        $('.daterangepicker').addClass('calendar-hidden');
    });
</script>

</body>
</html>
