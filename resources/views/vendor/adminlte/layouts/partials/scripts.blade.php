<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ mix('/js/app.js') }}" type="text/javascript"></script>
<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.js"></script>
<script src="{{ asset('/plugins/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/jquery.flot.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/jquery.flot.resize.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/jquery.flot.pie.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/jquery.flot.categories.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    //The Calender
    $("#calendar").datepicker();

    /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data

    var sin = [], cos = [];
    for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }
    var line_data1 = {
        data: sin,
        color: "#3c8dbc"
    };
    var line_data2 = {
        data: cos,
        color: "#00c0ef"
    };
    $.plot("#line-chart", [line_data1, line_data2], {
        grid: {
            hoverable: true,
            borderColor: "#f3f3f3",
            borderWidth: 1,
            tickColor: "#f3f3f3"
        },
        series: {
            shadowSize: 0,
            lines: {
                show: true
            },
            points: {
                show: true
            }
        },
        lines: {
            fill: false,
            color: ["#3c8dbc", "#f56954"]
        },
        yaxis: {
            show: true,
        },
        xaxis: {
            show: true
        }
    });
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
        position: "absolute",
        display: "none",
        opacity: 0.8
    }).appendTo("body");
    $("#line-chart").bind("plothover", function (event, pos, item) {

        if (item) {
            var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);

            $("#line-chart-tooltip").html(item.series.label + " of " + x + " = " + y)
                    .css({top: item.pageY + 5, left: item.pageX + 5})
                    .fadeIn(200);
        } else {
            $("#line-chart-tooltip").hide();
        }

    });
    /* END LINE CHART */

    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
        data: [["January", 10], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9]],
        color: "#3c8dbc"
    };
    $.plot("#bar-chart", [bar_data], {
        grid: {
            borderWidth: 1,
            borderColor: "#f3f3f3",
            tickColor: "#f3f3f3"
        },
        series: {
            bars: {
                show: true,
                barWidth: 0.5,
                align: "center"
            }
        },
        xaxis: {
            mode: "categories",
            tickLength: 0
        }
    });
    /* END BAR CHART */
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
