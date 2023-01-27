@extends('layouts.master')


@section('content')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
td {
    color: black;
}
/* Style the tab */
.tab {
  overflow: hidden;
  background-color: #5c6874;
  margin-bottom: 20px;
  color: white;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}
.tab a {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
  color: black !important;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}
.tab a:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}
.tab a.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
}
.ethplorer-widget a.tx-link {
    max-width: fit-content !important;
}


.rating-part-left h1{
font-size:75px;
color: #8EBF1D;
}
.rating-part-left i{
font-size:22px;
padding:2px;
color:#FDC91B;
}
.rating-part-left p{
font-size:18px;
color:#504F55;
}
.progress-bar-section{
    display: flex;
    text-align: center;
    margin-right: 15px;
    flex-direction: row;
    justify-content: center;
}
.progress-bar-section p{
color: #8EBF1D;
}
.progress-bar-section i{
font-size: 20px;
color:#FDC91B;
}
.progress-bar-vertical{
    min-height: 19px;
    padding: 3px;
    position: relative;
    box-shadow: none;
    margin-bottom: 10px;
    width: 700px;
    border-radius: 17px;
}
.progress-bar{
    position: absolute;
    background: #8EBF1D;
    border-radius: 26px;
    height: 70%;
}
.rating-part-right i,.review-part-right i{
font-size: 20px;
padding:4px 0px;
color:#FDC91B;
}
.rating-part-right span{
color:#337AB7;
font-size:17px;
padding-left: 5px;
}
.review-part-left{
padding-left:30px;
}
.review-part-left img{
height:70px;
width:70px;
border-radius: 50%;
border:2px solid #337AB7;
}
.review-part-left p{
margin:0px;
font-size:17px;
color:#B3B5B4;
}
.review-part-left span{
font-size:19px;
}
.review-part-left small{
color:#B3B5B4;
}
.review-part-right p{
font-size: 18px;
color:#919191;
}
g g g text
{
    /*fill: white;*/
    outline: 0px;
}
</style>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<div class="content-wrapper">
    <div class="content">
        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'General')">General Statistics</button>
          <button class="tablinks" onclick="openCity(event, 'uniswap')">Uniswap Data</button>
          <button class="tablinks" onclick="openCity(event, 'Transactions')">Token Transaction (Latest)</button>
          <button class="tablinks" onclick="openCity(event, 'LiveActivityChart')">Live Activity (Chart)</button>
          <button class="tablinks" onclick="openCity(event, 'googleAnalytics')">Google Analytics (Live)</button>
          <button class="tablinks" onclick="openCity(event, 'androidApp')">Android APP (Live)</button>

          <a class="tablinks" href="{{ url('ga_wallet') }}" style="border-left: 1px solid white">Google Analytics - Wallet (Live)</a>
        </div>
         <div id="googleAnalytics" class="tabcontent" style="overflow: hidden">
            <hr/>
            <div style="display: flex; flex-direction: row; align-items: center; margin-bottom: 20px; justify-content: space-between; width: 100%">
                <div  style='border-radius: 20px; width: 49%; height: 500px; overflow: hidden; margin-bottom: 20px'>
                    <h2 style="color: white !important; margin-bottom: 10px">7 Days Analysis(Visitors)</h2>
                    <section style="border-radius: 20px; overflow: hidden;" id="chart-1-container"></section>
                </div>
                <div  style='border-radius: 20px; width: 49%; height: 500px; overflow: hidden; margin-bottom: 20px'>
                    <h2 style="color: white !important; margin-bottom: 10px">Real Time Analysis (Live Data)</h2>
                    <section id="chart-2-container" style='border-radius: 20px; overflow: hidden;'>
                    <div style="padding-top: 15px; padding-left: 50px">
                        <h1 style="font-size: 6em;">
                            <span id="activeUsers">0</span>
                            <sub style="font-size: 30%;">/<span id="users"></span></sub>
                        </h1>
                        <p>Active Users(in 5 min)/Total users 24H</p>
                    </div>
                    <div style="padding-top: 35px; padding-left: 50px">
                        <h1 style="font-size: 6em;">
                            <span id="sessions">0</span> | <span id="session_duration">0m 00s</span>
                            <sub style="font-size: 30%;">Average</sub>
                        </h1>
                        <p>Sessions | Average Duration 24H</p>
                    </div>
                    <div style="padding-top: 35px; padding-left: 50px">
                        <h1 style="font-size: 6em;">
                            <span id="pageviews">0</span>
                            <sub style="font-size: 30%;" id="pagePath"></sub>
                        </h1>
                        <p>Page Views(in 5 min)</p>
                    </div>
                </section>
                </div>
            </div>
            <div style="display: flex; flex-direction: row; align-items: center; margin-bottom: 20px; justify-content: space-between; width: 100%">
                <section id="chart-3-container" style='border-radius: 20px; width: 49%; height: 500px; overflow: hidden; margin-bottom: 20px'></section>
                <section id="chart-4-container" style='border-radius: 20px; width: 49%; height: 500px; overflow: hidden; margin-bottom: 20px'></section>
            </div>
            <div style="display: flex; flex-direction: row; align-items: center; margin-bottom: 20px; justify-content: space-between; width: 100%">
                <section id="chart-7-container" style='border-radius: 20px; width: 49%; height: 500px; overflow: hidden; margin-bottom: 20px'></section>
                <section id="chart-8-container" style='border-radius: 20px; width: 49%; height: 500px; overflow: hidden; margin-bottom: 20px'></section>
            </div>
            <section id="chart-5-container" style='border-radius: 20px; width: 100%; height: 500px; overflow: hidden; margin-bottom: 20px'></section>
            <section id="chart-6-container" style='border-radius: 20px; width: 100%; height: 500px; overflow: hidden; margin-bottom: 20px'></section>



                <!-- Step 2: Load the library. -->

                <script>
                (function(w,d,s,g,js,fjs){
                  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
                  js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
                  js.src='https://apis.google.com/js/platform.js';
                  fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
                }(window,document,'script'));
                </script>

                <script>
                function fancyTimeFormat(duration)
                {
                    // Hours, minutes and seconds
                    var hrs = ~~(duration / 3600);
                    var mins = ~~((duration % 3600) / 60);
                    var secs = ~~duration % 60;

                    // Output like "1:01" or "4:03:59" or "123:03:59"
                    var ret = "";

                    if (hrs > 0) {
                        ret += "" + hrs + ":" + (mins < 10 ? "0" : "");
                    }

                    ret += "" + mins + "m " + (secs < 10 ? "0" : "");
                    ret += "" + secs + "s";
                    return ret;
                }
                var access_token = localStorage.getItem("access_token");
                var activeVisitors = 0;
                var _pageViews = 0;
                    function googleAnalytics(access_token) {
                        gapi.analytics.ready(function() {

                       gapi.analytics.auth.authorize({
                        'serverAuth': {
                          'access_token': access_token
                        }
                      });
                       var actUsers = gapi.client.analytics.data.realtime.get({
                          "ids": "ga:282113841",
                          "metrics": "rt:activeUsers"
                        }).then((result)=> {
                            activeVisitors = result.result.totalsForAllResults['rt:activeUsers'];
                            // console.log(result.result);
                            document.getElementById('activeUsers').innerHTML=activeVisitors;
                        })
                         var pageViews = gapi.client.analytics.data.realtime.get({
                          "ids": "ga:282113841",
                          "metrics": "rt:pageviews",
                          "dimensions": "rt:pagePath"
                        }).then((result)=> {
                            _pageViews = result.result.totalsForAllResults['rt:pageviews'];
                            // console.log(result.result);
                            document.getElementById('pageviews').innerHTML = _pageViews;
                            document.getElementById('pagePath').innerHTML = "https://metaversedogcrypto.com"+result.result.rows[0][0];
                        });
                        var sessionsAPI = gapi.client.request({
                          path: '/v4/reports:batchGet',
                          root: 'https://analyticsreporting.googleapis.com/',
                          method: 'POST',
                          body: {
                            reportRequests: [
                              {
                                viewId: 'ga:282113841',
                                dateRanges: [
                                  {
                                    startDate: '1daysAgo',
                                    endDate: 'today'
                                  }
                                ],
                                metrics: [
                                  {
                                    expression: 'ga:sessions'
                                  },
                                  {
                                    expression: 'ga:avgSessionDuration'
                                  },
                                  {
                                    expression: 'ga:users'
                                  }
                                ]
                              }
                            ]
                          }
                        }).then((result)=>{
                            console.log(result);
                            document.getElementById('sessions').innerHTML = result.result.reports[0].data.totals[0].values[0];
                            document.getElementById('session_duration').innerHTML = fancyTimeFormat(result.result.reports[0].data.totals[0].values[1]);
                            document.getElementById('users').innerHTML = result.result.reports[0].data.totals[0].values[2];
                        }, console.error.bind(console));

                      var dataChart1 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282113841', // <-- Replace with the ids value for your view.
                          'start-date': '7daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:7dayUsers',
                          'dimensions': 'ga:date'
                        },
                        chart: {
                          'container': 'chart-1-container',
                          'type': 'LINE',
                          'options': {
                            'width': '100%',
                            'height': 500,
                            'backgroundColor': '#ffba00',
                            'colors': ['#ffffff'],
                          },
                        }
                      });
                      dataChart1.execute();

                      var dataChart3 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282113841', // <-- Replace with the ids value for your view.
                          'start-date': '30daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:users',
                          'dimensions': 'ga:country'
                        },
                        chart: {
                          'container': 'chart-3-container',
                          'type': 'PIE',
                          'options': {
                            'width': "100%",
                            'height': 500,
                            'backgroundColor': '#485461',
                             'hAxis': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'auraColor': 'transparent'
                                }
                            },
                            'vAxis': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'auraColor': 'transparent'
                                }
                            },
                            'legend': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'auraColor': 'transparent'
                                }
                            },
                            'titleTextStyle': {
                                'color': '#ffffff',
                                'auraColor': 'transparent'
                            }
                          }
                        }
                      });
                      dataChart3.execute();
                      var dataChart7 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282113841', // <-- Replace with the ids value for your view.
                          'start-date': '30daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:users',
                          'dimensions': 'ga:userType'
                        },
                        chart: {
                          'container': 'chart-7-container',
                          'type': 'PIE',
                          'options': {
                            'width': "100%",
                            'height': 500,
                            'backgroundColor': '#485461',
                             'hAxis': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'auraColor': 'transparent'
                                }
                            },
                            'vAxis': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'auraColor': 'transparent'
                                }
                            },
                            'legend': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'auraColor': 'transparent'
                                }
                            },
                            'titleTextStyle': {
                                'color': '#ffffff',
                                'auraColor': 'transparent'
                            }
                          }
                        }
                      });
                      dataChart7.execute();
                      var dataChart8 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282113841', // <-- Replace with the ids value for your view.
                          'start-date': '30daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:organicSearches',
                          'dimensions': 'ga:sourceMedium'
                        },
                        chart: {
                          'container': 'chart-8-container',
                          'type': 'PIE',
                          'options': {
                            'width': "100%",
                            'height': 500,
                            'backgroundColor': '#485461',
                             'hAxis': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'auraColor': 'transparent'
                                }
                            },
                            'vAxis': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'auraColor': 'transparent'
                                }
                            },
                            'legend': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'auraColor': 'transparent'
                                }
                            },
                            'titleTextStyle': {
                                'color': '#ffffff',
                                'auraColor': 'transparent'
                            }
                          }
                        }
                      });
                      dataChart8.execute();

                      var dataChart5 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282113841', // <-- Replace with the ids value for your view.
                          'start-date': '30daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:newUsers',
                          'dimensions': 'ga:country'
                        },
                        chart: {
                          'container': 'chart-5-container',
                          'type': 'GEO',
                          'options': {
                            'width': '100%',
                            'height': 500,
                            'backgroundColor': '#485461',
                            'hAxis': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'auraColor': 'transparent'
                                }
                            },
                            'vAxis': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'auraColor': 'transparent'
                                }
                            },
                            'legend': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'auraColor': 'transparent'
                                }
                            },
                            'titleTextStyle': {
                                'color': '#ffffff',
                                'auraColor': 'transparent'
                            }
                          }
                        }
                      });
                      dataChart5.execute();


                      var dataChart6 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282113841', // <-- Replace with the ids value for your view.
                          'start-date': '7daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:timeOnPage,ga:pageviews,ga:pageValue',
                          'dimensions': 'ga:pagePath'
                        },
                        chart: {
                          'container': 'chart-6-container',
                          'type': 'TABLE',
                          'options': {
                            'width': '100%',
                            'height': 500,
                            'backgroundColor': '#485461',
                             'hAxis': {
                                'textStyle': {
                                    'color': '#000000',
                                    'auraColor': 'transparent'
                                }
                            },
                            'vAxis': {
                                'textStyle': {
                                    'color': '#000000',
                                    'auraColor': 'transparent'
                                }
                            },
                            'legend': {
                                'textStyle': {
                                    'color': '#000000',
                                    'auraColor': 'transparent'
                                }
                            },
                            'titleTextStyle': {
                                'color': '#000000',
                            }
                          }
                        }
                      });
                      dataChart6.execute();

                      var dataChart4 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282113841', // <-- Replace with the ids value for your view.
                          'start-date': '30daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:sessions',
                          'dimensions': 'ga:country'
                        },
                        chart: {
                          'container': 'chart-4-container',
                          'type': 'BAR',
                          'options': {
                            'width': '100%',
                            'height': 500,
                            'backgroundColor': '#485461',
                            'hAxis': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'outline': 0
                                }
                            },
                            'vAxis': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'auraColor': 'transparent'
                                }
                            },
                            'legend': {
                                'textStyle': {
                                    'color': '#ffffff',
                                    'outline': 0
                                }
                            },
                            'titleTextStyle': {
                                'color': '#ffffff',
                                'outline': 0
                            }
                          }
                        }
                      });
                      dataChart4.execute();
                    });
                    }
                async function getToken() {
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", 'https://www.googleapis.com/oauth2/v3/token?client_id=396369936248-1eof5nf9v7d120htacale1hlo6vnuem7.apps.googleusercontent.com&client_secret=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&grant_type=refresh_token&refresh_token=1//03rDE1xPpoBG4CgYIARAAGAMSNwF-L9IrDXdE54WmMrV77He1k7hmfaq-U8IyX7UNshz3AeUIVLSgWFeWGPP_hQ8-EOofa9usYZ0', true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.send();
                    xhr.onload = function() {
                      var data = JSON.parse(this.responseText);
                      access_token = data.access_token;
                      localStorage.setItem("access_token", access_token);
                      googleAnalytics(access_token);
                    }
                }
                if(access_token) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", 'https://www.googleapis.com/oauth2/v1/tokeninfo', true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.send(JSON.stringify({
                        access_token:access_token
                    }));
                    xhr.onload = async function() {
                      var data = JSON.parse(this.responseText);
                        var check = false;
                        check = data.hasOwnProperty('expires_in');
                        if (!check) {
                            await getToken();
                        } else {
                            googleAnalytics(access_token);
                        }
                    }
                } else {
                    getToken();
                }

                </script>
        </div>
        <div id="androidApp" class="tabcontent" style="overflow: hidden">
            <div style="display: flex; flex-direction: row; align-items: center; margin-bottom: 20px; justify-content: space-between; width: 100%">
                <section id="chart-1-container" style='border-radius: 20px; width: 20%; overflow: hidden; margin-bottom: 20px'>
                    <img style="height: 200px; width: 200px; border-radius: 20px; margin-top: 50px" src='{{ $data['android_app']['app_icon'] }}' />
                </section>
                <section id="chart-2-container" style='border-radius: 20px; width: 44%; overflow: hidden; margin-bottom: 20px;'>
                    <div style="padding-top: 50px; padding-left: 50px">
                        <h1 style="font-size: 6em;">
                            {{ $data['android_app']['app_name'] }}
                            <sub style="font-size: 37%;">{{ $data['android_app']['app_type'] }}</sub>
                        </h1>

                    </div>

                </section>
                <section id="chart-2-container" style='border-radius: 20px; width: 44%; overflow: hidden; margin-bottom: 20px;'>
                    <div style="padding-top: 50px; padding-left: 50px">
                        <h1 style="font-size: 6em;">
                            {{ number_format_short($data['android_app']['downloads']) }}+
                            <sub style="font-size: 37%;">/{{ number_format_short($data['android_app']['installs']) }}+</sub>
                        </h1>
                        <p>Available on devices/All time downloads</p>
                    </div>
                </section>
            </div>
            <div style="width: 100%">
                <div class="row">
                    <?php
                    function number_format_short( $n, $precision = 1 ) {
                            if ($n < 900) {
                                // 0 - 900
                                $n_format = number_format($n, $precision);
                                $suffix = '';
                            } else if ($n < 900000) {
                                // 0.9k-850k
                                $n_format = number_format($n / 1000, $precision);
                                $suffix = 'K';
                            } else if ($n < 900000000) {
                                // 0.9m-850m
                                $n_format = number_format($n / 1000000, $precision);
                                $suffix = 'M';
                            } else if ($n < 900000000000) {
                                // 0.9b-850b
                                $n_format = number_format($n / 1000000000, $precision);
                                $suffix = 'B';
                            } else {
                                // 0.9t+
                                $n_format = number_format($n / 1000000000000, $precision);
                                $suffix = 'T';
                            }
                          // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
                          // Intentionally does not affect partials, eg "1.50" -> "1.50"
                            if ( $precision > 0 ) {
                                $dotzero = '.' . str_repeat( '0', $precision );
                                $n_format = str_replace( $dotzero, '', $n_format );
                            }
                            return $n_format . $suffix;
                        }
                    ?>
                    <div class="col-md-2 col-sm-4 col-xs-12 rating-part-left text-center">
                        <h1> {{ number_format($data['android_app']['app_total_rating'], 1) }} </h1>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star{{ number_format($data['android_app']['app_total_rating'], 1) < 2 ? '-o' :'' }}" aria-hidden="true"></i>
                        <i class="fa fa-star{{ number_format($data['android_app']['app_total_rating'], 1) < 3 ? '-o' :'' }}" aria-hidden="true"></i>
                        <i class="fa fa-star{{ number_format($data['android_app']['app_total_rating'], 1) < 4 ? '-o' :'' }}" aria-hidden="true"></i>
                        <i class="fa fa-star{{ number_format($data['android_app']['app_total_rating'], 1) < 5 ? '-o' :'' }}" aria-hidden="true"></i>
                        <p style="color: white">Average Rating</p>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="progress-bar-section">
                            <p style="width: 60px">{{ number_format_short($data['android_app']['app_ratings'][0]) }}</p>
                            <div class="progress progress-bar-vertical">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $data['android_app']['app_rated_stars'] ? round(($data['android_app']['app_ratings'][0]/$data['android_app']['app_rated_stars'])*100) : 0 }}" aria-valuemin="0" aria-valuemax="100"
                                    style="width: {{ $data['android_app']['app_rated_stars'] ? round(($data['android_app']['app_ratings'][0]/$data['android_app']['app_rated_stars'])*100) : 0 }}%;"></div>
                            </div>
                            <span style="margin-left: 20px; margin-right: 3px;">5 </span>
                            <i class="fa fa-star" aria-hidden="true"></i><br>
                        </div>
                        <div class="progress-bar-section">
                            <p style="width: 60px">{{ number_format_short($data['android_app']['app_ratings'][1]) }}</p>
                            <div class="progress progress-bar-vertical">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $data['android_app']['app_rated_stars'] ? round(($data['android_app']['app_ratings'][1]/$data['android_app']['app_rated_stars'])*100) : 0 }}" aria-valuemin="0" aria-valuemax="100"
                                    style="width: {{ $data['android_app']['app_rated_stars'] ? round(($data['android_app']['app_ratings'][1]/$data['android_app']['app_rated_stars'])*100) : 0 }}%;"></div>
                            </div>
                            <span style="margin-left: 20px; margin-right: 3px;">4 </span>
                            <i class="fa fa-star" aria-hidden="true"></i><br>
                        </div>
                        <div class="progress-bar-section">
                            <p style="width: 60px">{{ number_format_short($data['android_app']['app_ratings'][2]) }}</p>
                            <div class="progress progress-bar-vertical">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $data['android_app']['app_rated_stars'] ? round(($data['android_app']['app_ratings'][2]/$data['android_app']['app_rated_stars'])*100) : 0 }}" aria-valuemin="0" aria-valuemax="100"
                                    style="width: {{ $data['android_app']['app_rated_stars'] ? round(($data['android_app']['app_ratings'][2]/$data['android_app']['app_rated_stars'])*100) : 0 }}%;"></div>
                            </div>
                            <span style="margin-left: 20px; margin-right: 3px;">3 </span>
                            <i class="fa fa-star" aria-hidden="true"></i><br>
                        </div>
                        <div class="progress-bar-section">
                            <p style="width: 60px">{{ number_format_short($data['android_app']['app_ratings'][3]) }}</p>
                            <div class="progress progress-bar-vertical">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $data['android_app']['app_rated_stars'] ? round(($data['android_app']['app_ratings'][3]/$data['android_app']['app_rated_stars'])*100) : 0 }}" aria-valuemin="0" aria-valuemax="100"
                                    style="width: {{ $data['android_app']['app_rated_stars'] ? round(($data['android_app']['app_ratings'][3]/$data['android_app']['app_rated_stars'])*100) : 0 }}%;"></div>
                            </div>
                            <span  style="margin-left: 20px; margin-right: 3px;">2 </span>
                            <i class="fa fa-star" aria-hidden="true"></i><br>
                        </div>
                        <div class="progress-bar-section">
                            <p style="width: 60px">{{ number_format_short($data['android_app']['app_ratings'][4]) }}</p>
                            <div class="progress progress-bar-vertical">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $data['android_app']['app_rated_stars'] ? round(($data['android_app']['app_ratings'][4]/$data['android_app']['app_rated_stars'])*100) : 0 }}" aria-valuemin="0" aria-valuemax="100"
                                    style="width: {{ $data['android_app']['app_rated_stars'] ? round(($data['android_app']['app_ratings'][4]/$data['android_app']['app_rated_stars'])*100) : 0 }}%;"></div>
                            </div>
                            <span  style="margin-left: 20px; margin-right: 3px;">1 </span>
                            <i class="fa fa-star" aria-hidden="true"></i><br>
                        </div>
                    </div>
                    </div>
                    <?php
                            function time_elapsed_string($datetime, $full = false) {
                                $now = new DateTime;
                                $ago = new DateTime($datetime);
                                $diff = $now->diff($ago);

                                $diff->w = floor($diff->d / 7);
                                $diff->d -= $diff->w * 7;

                                $string = array(
                                    'y' => 'year',
                                    'm' => 'month',
                                    'w' => 'week',
                                    'd' => 'day',
                                    'h' => 'hour',
                                    'i' => 'minute',
                                    's' => 'second',
                                );
                                foreach ($string as $k => &$v) {
                                    if ($diff->$k) {
                                        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                                    } else {
                                        unset($string[$k]);
                                    }
                                }

                                if (!$full) $string = array_slice($string, 0, 1);
                                return $string ? implode(', ', $string) . ' ago' : 'just now';
                            }
                        ?>
                    @foreach($data['android_app']['app_reviews'] as $review)
                    <div class="row review-section">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <hr>
                            <h3>Reviews</h3>
                            <hr>
                        </div>
                        <div class="col-md-4 col-md-4 col-xs-4 review-part-left">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <img src="{{ $review->getavatar()->geturl() }}">
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <p>{{ time_elapsed_string($review->getDate()->format('Y-m-d H:i')) }}</p>
                                    <span>{{ $review->getuserName() }}</span><br>
                                    <small>Likes: {{ $review->getCountLikes() }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-8 col-xs-8 review-part-right">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star{{ $review->getScore() < 2 ? '-o' :'' }}" aria-hidden="true"></i>
                                    <i class="fa fa-star{{ $review->getScore() < 3 ? '-o' :'' }}" aria-hidden="true"></i>
                                    <i class="fa fa-star{{ $review->getScore() < 4 ? '-o' :'' }}" aria-hidden="true"></i>
                                    <i class="fa fa-star{{ $review->getScore() < 5 ? '-o' :'' }}" aria-hidden="true"></i>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <p>
                                        {{ $review->gettext() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
        <div id="General" class="tabcontent" style="display: block">
           <!-- Top Statistics -->
          <h4>General Statistics</h4>
          <br>
          <div class="row">
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini mb-4" style="background: none">
                <div class="card-body">
                  <h2 class="mb-1">{{$data['users']}}</h2>
                  <p>Total Users</p>
                  <div class="chartjs-wrapper">
                    <canvas id="barChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini  mb-4" style="background: none">
                <div class="card-body">
                  <h2 class="mb-1">{{$data['transactions']}}</h2>
                  <p>Total Transactions</p>
                  <div class="chartjs-wrapper">
                    <canvas id="dual-line"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini mb-4" style="background: none">
                <div class="card-body">
                  <h2 class="mb-1">{{$data['withdrawls']}}</h2>
                  <p>Total Withdrawls</p>
                  <div class="chartjs-wrapper">
                    <canvas id="area-chart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini mb-4" style="background: none">
                <div class="card-body">
                  <h2 class="mb-1">{{$data['wallets']}}</h2>
                  <p>Total Wallets</p>
                  <div class="chartjs-wrapper">
                    <canvas id="line"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Application Stats-->
          <h4>Micro Partner Program (MPP) Applications</h4>
          <br>
          <div class="row">
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini mb-4" style="background: none">
                <div class="card-body">
                  <h2 class="mb-1">{{$data['applications']->count()}}</h2>
                  <p>Total Submitted</p>
                  <div class="chartjs-wrapper">
                    <canvas id="barChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <?php
            $pending = 0;
            $approved = 0;
            $rejected = 0;


            ?>
           @if($data['applications']->count() != 0)
            @foreach($data['applications'] as $app)
            @if($app->status == 'pending')
                <?php $pending++; ?>
                @elseif($app->status == 'approved')
                <?php $approved++; ?>

                @else
                <?php $rejected++; ?>
                @endif
            @endforeach
           @endif
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini  mb-4" style="background: none">
                <div class="card-body">
                  <h2 class="mb-1">{{$pending ? $pending : 0}}</h2>
                  <p>Pending</p>
                  <div class="chartjs-wrapper">
                    <canvas id="dual-line"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini mb-4" style="background: none">
                <div class="card-body">
                  <h2 class="mb-1">{{$rejected ? $rejected : 0}}</h2>
                  <p>Rejected</p>
                  <div class="chartjs-wrapper">
                    <canvas id="area-chart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini mb-4" style="background: none">
                <div class="card-body">
                  <h2 class="mb-1">{{$approved ? $approved : 0}}</h2>
                  <p>Approved</p>
                  <div class="chartjs-wrapper">
                    <canvas id="line"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>

</div>
        <div id="LiveActivityChart" class="tabcontent" style="overflow: hidden">
            <div id="token-history-grouped-1" style="max-width: 100% !important"></div>
                <script type="text/javascript">
                if (typeof (eWgs) === 'undefined') {
                    document.write('<scr' + 'ipt src="https://api.ethplorer.io/widget.js?' + new Date().getTime().toString().substr(0, 7) + '" async></scr' + 'ipt>');
                    var eWgs = [];
                }
                eWgs.push(function () {
                    ethplorerWidget.init(
                        '#token-history-grouped-1', // Placeholder element
                        'tokenHistoryGrouped', // Widget type
                        {
                            // token address
                            'address': '0x2ee543b8866f46cc3dc93224c6742a8911a59750',
                             'theme': 'dark',
                            options: {
                                'title': 'MVDG Token Pulse',
                                'pointSize': 5,
                                'vAxis': {
                                    'title': 'Token operations',
                                }
                            }
                        }

                    );
                });
                </script>
        </div>
        <div id="Transactions" class="tabcontent" style="overflow: hidden">
            <div id="token-txs-10" style="max-width: 100% !important"></div>
                <script type="text/javascript">
                    if (typeof (eWgs) === 'undefined') {
                        document.write('<scr' + 'ipt src="https://api.ethplorer.io/widget.js?' + new Date().getTime().toString().substr(0, 7) + '" async></scr' + 'ipt>');
                        var eWgs = [];
                    }
                    eWgs.push(function () {
                        ethplorerWidget.init(
                            '#token-txs-10', // Placeholder element
                            'tokenHistory', // Widget type
                            {
                                address: '0x2ee543b8866f46cc3dc93224c6742a8911a59750', // keep empty to show all tokens
                                limit: 20, // Number of records to show
                            }

                        );
                    });
                </script>
        </div>
        <div id="uniswap" class="tabcontent" style="overflow: hidden">
          <iframe src="https://info.uniswap.org/#/tokens/0x2ee543b8866f46cc3dc93224c6742a8911a59750" style="height: 750px; width: 100%; margin-top: -170px; border: 0px" />
        </div>


    </div>
  </div>


@endsection
