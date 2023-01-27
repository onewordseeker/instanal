<div class="az-footer ht-40">
    <div class="container ht-100p pd-t-0-f">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com
            2020</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                template</a> from Bootstrapdash.com</span>
    </div><!-- container -->
</div><!-- az-footer -->
<script src="{{ asset('/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/lib/ionicons/ionicons.js') }}"></script>
<script src="{{ asset('/lib/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ asset('/lib/jquery.flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('/lib/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('/lib/peity/jquery.peity.min.js') }}"></script>

<script src="{{ asset('/js/azia.js') }}"></script>
<script src="{{ asset('/js/chart.flot.sampledata.js') }}"></script>
<script src="{{ asset('/js/dashboard.sampledata.js') }}"></script>
<script src="{{ asset('/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script>
    $(function() {
        'use strict'
        var max_followers = 0;
        var myDataFollowers = [];
        var myDataFollowing = [];
        var dates = [];
        var inc = 0;
        var in_ind = 0;

     $(function() {
     $.ajax({
            type: "post",
            data: {'username': 'story_tell3r', "_token": "LFvong80IxT9H1zGSvf8O8n5mNmo4CUpBv71ibnp" },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "https://business.notjustanalytics.com/profileinlist/121626",
            success: function(data){
                console.log(data);
            }
    });
});


        $.ajax({
            type: "get",
            data: {'user_id': {{ isset($calculatedData['profile']->id) ? $calculatedData['profile']->id : 0 }}, 'username': '{{ isset($calculatedData['profile']->id) ? $calculatedData['profile']->username : 0 }}' },
            url: "{{ url('user-follower-history') }}",
            success: function(data){
                
                data.history.forEach((record, index) => {
                    if(index + 1 == data.history.length) {
                        return;
                    } 
                    max_followers = record.follower > max_followers ? record.follower : max_followers;
                    myDataFollowers[index] = [index, record.follower];
                    myDataFollowing[index] = [index, record.following];
                    var tr = `
                    <tr>
                        <th scope="row">`+record.date+`</th>
                        <td>`+record.follower+`</td>
                        <td>`+record.delta_follower+`</td>
                        <td>`+record.following+`</td>
                        <td>+`+record.delta_following+`</td>
                        <td>`+record.count_media+`</td>
                        <td>+`+record.delta_media+`</td>
                    </tr>
                    `;
                    var history = document.getElementById('history');
                    if(history) {
                        history.innerHTML += tr
                    }
                    if(index%3 == 0){
                        inc += 25;
                        dates[in_ind] = [inc, record.date];
                        in_ind++;
                    }
                });
                var wf = document.getElementById('weeklyFollowers');
                if(wf) {
                    wf.innerHTML = data.avg.week.follower != undefined ? data.avg.week.follower : 0;
                }

        var plot = $.plot('#flotChart', [{
            data: myDataFollowers,
            color: '#007bff',
            lines: {
                fillColor: {
                    colors: [{
                        opacity: 0
                    }, {
                        opacity: 0.2
                    }]
                }
            }
        }, {
            data: myDataFollowing,
            color: '#560bd0',
            lines: {
                fillColor: {
                    colors: [{
                        opacity: 0
                    }, {
                        opacity: 0.2
                    }]
                }
            }
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 8
            },
            yaxis: {
                show: true,
                min: 0,
                max: 100,
                ticks: [
                    [0, 'LOW'],
                    [20, 'AVG'],
                    [40, 'GRT'],
                    [60, 'PRM'],
                    [80, 'UNQ'],
                ],
                tickColor: '#eee'
            },
            xaxis: {
                show: true,
                color: '#000',
                ticks: dates,
            }
        });
       

            }
            });

        $.plot('#flotChart1', [{
            data: dashData2,
            color: '#00cccc'
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.2
                        }, {
                            opacity: 0.2
                        }]
                    }
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0
            },
            yaxis: {
                show: false,
                min: 0,
                max: 35
            },
            xaxis: {
                show: false,
                max: 50
            }
        });

        $.plot('#flotChart2', [{
            data: dashData2,
            color: '#007bff'
        }], {
            series: {
                shadowSize: 0,
                bars: {
                    show: true,
                    lineWidth: 0,
                    fill: 1,
                    barWidth: .5
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0
            },
            yaxis: {
                show: false,
                min: 0,
                max: 35
            },
            xaxis: {
                show: false,
                max: 20
            }
        });


        //-------------------------------------------------------------//


        // Line chart
        $('.peity-line').peity('line');

        // Bar charts
        $('.peity-bar').peity('bar');

        // Bar charts
        $('.peity-donut').peity('donut');

        var ctx5 = document.getElementById('chartBar5').getContext('2d');
        new Chart(ctx5, {
            type: 'bar',
            data: {
                labels: [0, 1, 2, 3, 4, 5, 6, 7],
                datasets: [{
                    data: [2, 4, 10, 20, 45, 40, 35, 18],
                    backgroundColor: '#560bd0'
                }, {
                    data: [3, 6, 15, 35, 50, 45, 35, 25],
                    backgroundColor: '#cad0e8'
                }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    enabled: false
                },
                legend: {
                    display: false,
                    labels: {
                        display: false
                    }
                },
                scales: {
                    yAxes: [{
                        display: false,
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11,
                            max: 80
                        }
                    }],
                    xAxes: [{
                        barPercentage: 0.6,
                        gridLines: {
                            color: 'rgba(0,0,0,0.08)'
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11,
                            display: false
                        }
                    }]
                }
            }
        });

        // Donut Chart
        var datapie = {
            labels: ['Search', 'Email', 'Referral', 'Social', 'Other'],
            datasets: [{
                data: [25, 20, 30, 15, 10],
                backgroundColor: ['#6f42c1', '#007bff', '#17a2b8', '#00cccc', '#adb2bd']
            }]
        };

        var optionpie = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false,
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };

        // For a doughnut chart
        var ctxpie = document.getElementById('chartDonut');
        var myPieChart6 = new Chart(ctxpie, {
            type: 'doughnut',
            data: datapie,
            options: optionpie
        });

    });
</script>
</body>

<!-- Mirrored from www.bootstrapdash.com/demo/azia-free/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Jan 2023 17:53:26 GMT -->

</html>
