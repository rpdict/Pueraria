<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ mix('/js/app.js') }}" type="text/javascript"></script>
<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.js"></script>
{{--<script src="{{ asset('/plugins/jquery-2.2.3.min.js') }}" type="text/javascript"></script>--}}
<script src="{{ asset('/plugins/grade.js') }}" type="text/javascript"></script>
@yield('page-script')




<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>

<script type="text/javascript">
    window.addEventListener('load', function () {
        /*
         A NodeList of all your image containers (Or a single Node).
         The library will locate an <img /> within each
         container to create the gradient from.
         */

        Grade(document.querySelectorAll('.gradient-wrap'))
    })
</script>
