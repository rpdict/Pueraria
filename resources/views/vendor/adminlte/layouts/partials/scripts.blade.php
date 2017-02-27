<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ mix('/js/app.js') }}" type="text/javascript"></script>
<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.js"></script>
<script src="{{ asset('/plugins/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    //The Calender
    $("#calendar").datepicker();
</script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
