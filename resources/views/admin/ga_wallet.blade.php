@extends('layouts.master')


@section('content')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
td {
    color: black;
}
g g g text
{
    /*fill: white;*/
    outline: 0px;
}
</style>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

<div class="content-wrapper">
    <div class="content">	
    <h1 style="margin-bottom: 50px;">
        <a href="index"><i class="fa fa-arrow-left"></i></a> Google Analytics | Metaverse Dog - Wallet
    </h1>
    <div style="width:100%; border-top: 1px solid #ffba004d; margin-bottom: 30px"></div>
            <div style="display: flex; flex-direction: row; align-items: center; margin-bottom: 20px; justify-content: space-between; width: 100%">
                <div  style='border-radius: 20px; width: 49%; height: 500px; overflow: hidden; margin-bottom: 20px'>
                    <h2 style="color: white !important; margin-bottom: 10px">7 Days Analysis(Visitors)</h2>
                    <section style="border-radius: 20px; overflow: hidden;" id="chart-11-container"></section>
                </div>
                <div  style='border-radius: 20px; width: 49%; height: 500px; overflow: hidden; margin-bottom: 20px'>
                    <h2 style="color: white !important; margin-bottom: 10px">Real Time Analysis (Live Data)</h2>
                    <section id="chart-12-container" style='border-radius: 20px; overflow: hidden;'>
                    <div style="padding-top: 15px; padding-left: 50px">
                        <h1 style="font-size: 6em;">
                            <span id="wallet_activeUsers">0</span>
                            <sub style="font-size: 30%;">/<span id="wallet_users"></span></sub>
                        </h1>
                        <p>Active Users(in 5 min)/Total users 24H</p>
                    </div>
                    <div style="padding-top: 35px; padding-left: 50px">
                        <h1 style="font-size: 6em;">
                            <span id="wallet_sessions">0</span> | <span id="wallet_session_duration">0m 00s</span>
                            <sub style="font-size: 30%;">Average</sub>
                        </h1>
                        <p>Sessions | Average Duration 24H</p>
                    </div>
                    <div style="padding-top: 35px; padding-left: 50px">
                        <h1 style="font-size: 6em;">
                            <span id="wallet_pageviews">0</span>
                            <sub style="font-size: 30%;" id="wallet_pagePath"></sub>
                        </h1>
                        <p>Page Views(in 5 min)</p>
                    </div>
                </section>
                </div>
            </div>
            <div style="display: flex; flex-direction: row; align-items: center; margin-bottom: 20px; justify-content: space-between; width: 100%">
                <section id="chart-13-container" style='border-radius: 20px; width: 49%; height: 500px; overflow: hidden; margin-bottom: 20px'></section>
                <section id="chart-14-container" style='border-radius: 20px; width: 49%; height: 500px; overflow: hidden; margin-bottom: 20px'></section>
            </div>
            <div style="display: flex; flex-direction: row; align-items: center; margin-bottom: 20px; justify-content: space-between; width: 100%">
                <section id="chart-17-container" style='border-radius: 20px; width: 49%; height: 500px; overflow: hidden; margin-bottom: 20px'></section>
                <section id="chart-18-container" style='border-radius: 20px; width: 49%; height: 500px; overflow: hidden; margin-bottom: 20px'></section>
            </div>
            <section id="chart-15-container" style='border-radius: 20px; width: 100%; height: 500px; overflow: hidden; margin-bottom: 20px'></section>
            <section id="chart-16-container" style='border-radius: 20px; width: 100%; height: 500px; overflow: hidden; margin-bottom: 20px'></section>



                   <!-- Step 2: Load the library. -->
                
             
                
            
                <script>
                function wallet_fancyTimeFormat(duration)
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
                var wallet_activeVisitors = 0;
                var wallet_pageViews = 0;
                    function walletGoogleAnalytics(access_token) {
                        gapi.analytics.ready(function() {
                
                       gapi.analytics.auth.authorize({
                        'serverAuth': {
                          'access_token': access_token
                        }
                      });
                       var actUsers = gapi.client.analytics.data.realtime.get({
                          "ids": "ga:282158845",
                          "metrics": "rt:activeUsers"
                        }).then((result)=> {
                            wallet_activeVisitors = result.result.totalsForAllResults['rt:activeUsers'];
                            // console.log(result.result);
                            document.getElementById('wallet_activeUsers').innerHTML=wallet_activeVisitors;
                        }) 
                         var pageViews = gapi.client.analytics.data.realtime.get({
                          "ids": "ga:282158845",
                          "metrics": "rt:pageviews",
                          "dimensions": "rt:pagePath"
                        }).then((result)=> {
                            wallet_pageViews = result.result.totalsForAllResults['rt:pageviews'];
                            console.log(result.result);
                            document.getElementById('wallet_pageviews').innerHTML = wallet_pageViews;
                            document.getElementById('wallet_pagePath').innerHTML = "https://metaversedogcrypto.com/user"+result.result.rows[0][0];
                        });
                        var sessionsAPI = gapi.client.request({
                          path: '/v4/reports:batchGet',
                          root: 'https://analyticsreporting.googleapis.com/',
                          method: 'POST',
                          body: {
                            reportRequests: [
                              {
                                viewId: 'ga:282158845',
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
                            document.getElementById('wallet_sessions').innerHTML = result.result.reports[0].data.totals[0].values[0];
                            document.getElementById('wallet_session_duration').innerHTML = wallet_fancyTimeFormat(result.result.reports[0].data.totals[0].values[1]);
                            document.getElementById('wallet_users').innerHTML = result.result.reports[0].data.totals[0].values[2];
                        }, console.error.bind(console));
                        
                      var dataChart11 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282158845', // <-- Replace with the ids value for your view.
                          'start-date': '7daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:7dayUsers',
                          'dimensions': 'ga:date'
                        },
                        chart: {
                          'container': 'chart-11-container',
                          'type': 'LINE',
                          'options': {
                            'width': "49%",
                            'height': 500,
                            'backgroundColor': '#ffba00',
                            'colors': ['#ffffff'],
                          },
                        }
                      });
                      dataChart11.execute();
                      
                      var dataChart13 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282158845', // <-- Replace with the ids value for your view.
                          'start-date': '30daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:users',
                          'dimensions': 'ga:country'
                        },
                        chart: {
                          'container': 'chart-13-container',
                          'type': 'PIE',
                          'options': {
                            'width': "49%",
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
                      dataChart13.execute();
                      var dataChart17 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282158845', // <-- Replace with the ids value for your view.
                          'start-date': '30daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:users',
                          'dimensions': 'ga:userType'
                        },
                        chart: {
                          'container': 'chart-17-container',
                          'type': 'PIE',
                          'options': {
                            'width': "49%",
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
                      dataChart17.execute();
                      var dataChart18 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282158845', // <-- Replace with the ids value for your view.
                          'start-date': '30daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:organicSearches',
                          'dimensions': 'ga:sourceMedium'
                        },
                        chart: {
                          'container': 'chart-18-container',
                          'type': 'PIE',
                          'options': {
                            'width': "49%",
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
                      dataChart18.execute();
                      
                      var dataChart15 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282158845', // <-- Replace with the ids value for your view.
                          'start-date': '30daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:newUsers',
                          'dimensions': 'ga:country'
                        },
                        chart: {
                          'container': 'chart-15-container',
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
                      dataChart15.execute();
                    
                    
                      var dataChart16 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282158845', // <-- Replace with the ids value for your view.
                          'start-date': '7daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:timeOnPage,ga:pageviews,ga:pageValue',
                          'dimensions': 'ga:pagePath'
                        },
                        chart: {
                          'container': 'chart-16-container',
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
                      dataChart16.execute();
                      
                      var dataChart14 = new gapi.analytics.googleCharts.DataChart({
                        query: {
                          'ids': 'ga:282158845', // <-- Replace with the ids value for your view.
                          'start-date': '30daysAgo',
                          'end-date': 'today',
                          'metrics': 'ga:sessions',
                          'dimensions': 'ga:country'
                        },
                        chart: {
                          'container': 'chart-14-container',
                          'type': 'BAR',
                          'options': {
                            'width': '49%',
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
                      dataChart14.execute();
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
                      walletGoogleAnalytics(access_token);
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
                            walletGoogleAnalytics(access_token);
                        }
                    }
                } else {
                    getToken();
                }
                
                </script>
                   <script>
                (function(w,d,s,g,js,fjs){
                  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
                  js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
                  js.src='https://apis.google.com/js/platform.js';
                  fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
                }(window,document,'script'));
                </script>
    </div>
  </div>


@endsection