@extends('layouts.master')

@section('content')
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">Hi, welcome back!</h2>
                        <p class="az-dashboard-text">Your web analytics</p>
                    </div>
                    <div class="az-content-header-right">
                        <div class="media">
                            <div class="media-body">
                                <label>Start Date</label>
                                <h6>Oct 10, 2018</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>End Date</label>
                                <h6>Oct 23, 2018</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->

                    </div>
                </div><!-- az-dashboard-one-title -->
                <form action="{{url('')}}" method="get">
                    @csrf
                <div class="row">
                    <div class="col-lg-12 mg-t-20 mg-lg-t-0 mg-b-20">
                        <div class="input-group">
                                <input type="text" class="form-control" name="username" placeholder="Please Enter A Username">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div><!-- input-group -->
                    </div>
                </div>
            </form>
                <div class="az-dashboard-nav">
                    <nav class="nav">
                      
                    </nav>

                    <nav class="nav">
                        <a class="nav-link" href={{url('/search-history')}}><i class="far fa-save"></i>View Seacrh History</a>
                        {{-- <a class="nav-link" href="#"><i class="far fa-file-pdf"></i> Export to PDF</a>
                        <a class="nav-link" href="#"><i class="far fa-envelope"></i>Send to Email</a> --}}
                        <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
                    </nav>
                </div>

                <div class="row row-sm mg-b-20">
                    <!-- col -->
                    <div class="col-lg-7 mg-t-20 mg-lg-t-0">

                        <div class="card card-dashboard-two">
                            <div class="row col-lg-12">
                            
                                <div class="col-lg-4" style="padding: 15px 0px 0px 25px;">
                                    <img crossorigin="anonymous" src="{{'data:image/jpg;base64,'.base64_encode(file_get_contents($calculatedData['profile']->profile_pic_url))}}"  alt=""
                                        style="border-radius: 15px" height="180" width="180">


                                </div>
                                <div class="col-lg-8">
                                    <div class="mg-l-15" style="padding-top: 40px">
                                        <h2 style="margin-bottom: 0px">{{$calculatedData['profile']->full_name}}</h2>
                                        <h5 style="color: #9f9f9f">{{"@".$calculatedData['profile']->username}}</h5>
                                        <h6 style="color: #9f9f9f">Bio: {{$calculatedData['profile']->biography}}</h6>
                                    </div>
                                    <div class="row col-lg-12 mg-t-20">
                                        <div class="col-lg-4">
                                            <h5 style="margin-bottom: 0px">Posts</h5>
                                            <?php // dd($calculatedData); ?>
                                            <h6 style="color: #9f9f9f">{{number_format($calculatedData['posts']->count)}}</h6>

                                        </div>
                                        <div class="col-lg-4">
                                            <h5 style="margin-bottom: 0px">Followers</h5>
                                            <h6 style="color: #9f9f9f">{{number_format($calculatedData['followers'])}}</h6>
                                        </div>
                                        <div class="col-lg-4">
                                            <h5 style="margin-bottom: 0px">Following</h5>
                                            <h6 style="color: #9f9f9f">{{number_format($calculatedData['followees'])}}</h6>

                                        </div>

                                    </div>


                                </div>
                                <div class="row col-lg-12" style="text-align:center; align-items: center">
                                    <div class="col-lg-4" style="text-align: center">
                                        <h1>{{number_format($calculatedData['er_rate'], 2, '.', '')."%"}}</h1>
                                        <p
                                            style="color: rgb(126, 126, 126); margin-bottom: 0px; font-size: 15px; font-weight: bold">
                                            Engagement Rate</p>
                                        <span style="color: rgb(126, 126, 126)">(Higher than average)</span>

                                    </div>
                                    <div class="col-lg-8">
                                        <h1 style="font-size: 120px; text-align:center; margin-top: 20px">
                                            <i class="fa fa-heart text-success"></i>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mg-t-20 mg-lg-t-0">
                        <div class="row row-sm">
                            <div class="col-sm-6">
                                <div class="card card-dashboard-two">
                                    <div class="card-header">
                                        <h6>{{number_format($calculatedData['average_likes_total'])}} <i class="icon ion-md-trending-up tx-success"></i>
                                            <small>18.02%</small>
                                        </h6>
                                        <p>Average Likes</p>
                                    </div><!-- card-header -->
                                    <div class="card-body">
                                        <div class="chart-wrapper">
                                            <div id="flotChart1" class="flot-chart"></div>
                                        </div><!-- chart-wrapper -->
                                    </div><!-- card-body -->
                                </div><!-- card -->
                            </div><!-- col -->
                            <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                                <div class="card card-dashboard-two">
                                    <div class="card-header">
                                        <h6>{{number_format($calculatedData['average_comments_total'])}}<i class="icon ion-md-trending-down tx-danger"></i>
                                            <small>0.86%</small>
                                        </h6>
                                        <p>Average Comments</p>
                                    </div><!-- card-header -->
                                    <div class="card-body">
                                        <div class="chart-wrapper">
                                            <div id="flotChart2" class="flot-chart"></div>
                                        </div><!-- chart-wrapper -->
                                    </div><!-- card-body -->
                                </div><!-- card -->
                            </div><!-- col -->
                            <div class="col-sm-12 mg-t-20">
                                <div class="card card-dashboard-three">
                                    <div class="card-header">
                                        <p>Average Video Views</p>
                                        <h6>{{number_format($calculatedData['average_views_total'])}} <small class="tx-success"><i class="icon ion-md-arrow-up"></i>
                                                2.87%</small></h6>
                                        <small>The average number of views for the last 12 video posts</small>
                                    </div><!-- card-header -->
                                    <div class="card-body">
                                        <div class="chart"><canvas id="chartBar5"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- row -->
                    </div>
                    <!--col -->
                </div><!-- row -->

                <div class="row row-sm mg-b-20">
                    <div class="col-lg-4">
                        <div class="card card-dashboard-pageviews">
                        <div id="chartdiv"></div>
                        </div><!-- card -->

                    </div><!-- col -->
                    {{-- <div class="col-lg-8 mg-t-20 mg-lg-t-0">
                        <div class="card card-dashboard-four">
                            <div class="card-header">
                                <h6 class="card-title">Sessions by Channel</h6>
                            </div><!-- card-header -->
                            <div class="card-body row">
                                <div class="col-md-6 d-flex align-items-center">
                                    <div class="chart"><canvas id="chartDonut"></canvas></div>
                                </div><!-- col -->
                                <div class="col-md-6 col-lg-5 mg-lg-l-auto mg-t-20 mg-md-t-0">
                                    <div class="az-traffic-detail-item">
                                        <div>
                                            <span>Organic Search</span>
                                            <span>1,320 <span>(25%)</span></span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-purple wd-25p" role="progressbar"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><!-- progress -->
                                    </div>
                                    <div class="az-traffic-detail-item">
                                        <div>
                                            <span>Email</span>
                                            <span>987 <span>(20%)</span></span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary wd-20p" role="progressbar"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><!-- progress -->
                                    </div>
                                    <div class="az-traffic-detail-item">
                                        <div>
                                            <span>Referral</span>
                                            <span>2,010 <span>(30%)</span></span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-info wd-30p" role="progressbar"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><!-- progress -->
                                    </div>
                                    <div class="az-traffic-detail-item">
                                        <div>
                                            <span>Social</span>
                                            <span>654 <span>(15%)</span></span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-teal wd-15p" role="progressbar"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><!-- progress -->
                                    </div>
                                    <div class="az-traffic-detail-item">
                                        <div>
                                            <span>Other</span>
                                            <span>400 <span>(10%)</span></span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gray-500 wd-10p" role="progressbar"
                                                aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><!-- progress -->
                                    </div>
                                </div><!-- col -->
                            </div><!-- card-body -->
                        </div><!-- card-dashboard-four -->
                    </div><!-- col --> --}}
                    <div class="col-lg-8 ht-lg-100p">
                        <div class="card card-dashboard-one">
                            <div class="card-header">
                                <div>
                                    <h6 class="card-title">Followers Growth</h6>
                                    <p class="card-text">It's probable they've utilised the Follow/Unfollow approach in the
                                        past if you detect significant differences in following even beyond the last six
                                        months!</p>
                                </div>
                                <div class="btn-group">
                                    <button class="btn active">Day</button>
                                    <button class="btn">Week</button>
                                    <button class="btn">Month</button>
                                </div>
                            </div><!-- card-header -->
                            <div class="card-body">
                                <div class="card-body-top">
                                    <div>
                                        <label class="mg-b-0">Total Followers</label>
                                        <h2>{{number_format($calculatedData['followers'])}}</h2>
                                    </div>
                                    <div>
                                        <label class="mg-b-0">Total Following</label>
                                        <h2>{{number_format($calculatedData['followees'])}}</h2>
                                    </div>
                                    <div>
                                        <label class="mg-b-0">Weekly Followers</label>
                                        <h2 id="weeklyFollowers">0</h2>
                                    </div>

                                </div><!-- card-body-top -->
                                <div class="flot-chart-wrapper">
                                    <div id="flotChart" class="flot-chart"></div>
                                </div><!-- flot-chart-wrapper -->
                            </div><!-- card-body -->
                        </div><!-- card -->
                    </div>

                </div><!-- row -->

                <div class="row row-sm mg-b-20 mg-lg-b-0">
                    <div class="col-lg-5 col-xl-4">
                        <div class="row row-sm" style="flex-wrap: inherit">
                            <div class="col-md-6 col-lg-12 mg-b-20 mg-md-b-0 mg-lg-b-20">
                                <div class="card card-dashboard-five">
                                    <div class="card-header">
                                        <h6 class="card-title">Average Tags & Mentions</h6>
                                        <span class="card-text"> Average number of tags and mentions on the last 12 posts</span>
                                    </div><!-- card-header -->
                                    <div class="card-body row row-sm">
                                        <div class="col-6 d-sm-flex align-items-center">
                                         
                                        </div><!-- col -->
                                        <div class="col-6 d-sm-flex align-items-center">
                                            <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">
                                                <span class="peity-donut"
                                                    data-peity='{ "fill": ["#00cccc", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>{{$calculatedData['average_tags']}}/20</span>
                                            </div>
                                            <div>
                                                <label>Tags</label>
                                                <h4>{{number_format($calculatedData['average_tags'])}}</h4>
                                            </div>
                                        </div><!-- col -->
                                    </div><!-- card-body -->
                                </div><!-- card-dashboard-five -->
                            </div><!-- col -->
                            <div class="col-md-6 col-lg-12">
                                <div class="card card-dashboard-five">
                                    <div class="card-header">
                                        <h6 class="card-title">Engagements</h6>
                                        <span class="card-text"> Engagement rate of posts thanks to paid advertising</span>
                                    </div><!-- card-header -->
                                    <div class="card-body row row-sm">
                                        <div class="col-6 d-sm-flex align-items-center">
                                            <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">
                                                <span class="peity-donut"
                                                    data-peity='{ "fill": ["#007bff", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>{{number_format($calculatedData['raw_er'], 2, '.', '')."%"}}/20</span>
                                            </div>
                                            <div>
                                                <label>Organic</label>
                                                <h4>{{number_format($calculatedData['raw_er'], 2, '.', '')."%"}}</h4>
                                            </div>
                                        </div><!-- col -->
                                        <div class="col-6 d-sm-flex align-items-center">
                                            <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">
                                            </div>
                                            <div>
                                                <label>Paid</label>
                                            </div>
                                        </div><!-- col -->
                                    </div><!-- card-body -->
                                </div><!-- card-dashboard-five -->
                            </div><!-- col -->
                        </div><!-- row -->
                    </div><!-- col-lg-3 -->
               
                </div>
                <div class="mg-t-20">
                    <div class="az-content-label mg-b-5">Post Interaction Analysis</div>
                    <p class="mg-b-20"></p>
                    <div class="row">
                        <div class="col-lg-4 mg-b-20">
                            <div class="card card-dashboard-five">
                                <div class="card-header">
                                    <h6 class="card-title">LIKE VS COMMENTS</h6>
                                    <span class="card-text"></span>
                                </div><!-- card-header -->
                                <div class="card-body row row-sm">
                                    <div class="col-6 d-sm-flex align-items-center">
                                        <div class="card-chart bg-primary">
                                            <span class="peity-bar"
                                                data-peity='{"fill": ["#fff"], "width": 20, "height": 20 }'>6,4,7,5,7</span>
                                        </div>
                                        <div>

                                            <h4>{{number_format($calculatedData['likes_vs_comments'], 2, '.', '')}}%</h4>
                                        </div>
                                    </div><!-- col -->
                                    {{-- <div class="col-6 d-sm-flex align-items-center">
                                                <div class="card-chart bg-purple">
                                                    <span class="peity-bar"
                                                        data-peity='{"fill": ["#fff"], "width": 21, "height": 20 }'>7,4,5,7,2</span>
                                                </div>
                                                <div>
                                                    <label>Sessions</label>
                                                    <h4>9,065</h4>
                                                </div>
                                            </div><!-- col --> --}}
                                </div><!-- card-body -->
                            </div>
                        </div>
                        <div class="col-lg-4 mg-b-20">
                            <div class="card card-dashboard-five">
                                <div class="card-header">
                                    <h6 class="card-title">VIEW RATE</h6>
                                    <span class="card-text"></span>
                                </div><!-- card-header -->
                                <div class="card-body row row-sm">
                                    <div class="col-6 d-sm-flex align-items-center">
                                        <div class="card-chart bg-primary">
                                            <span class="peity-bar"
                                                data-peity='{"fill": ["#fff"], "width": 20, "height": 20 }'>6,4,7,5,7</span>
                                        </div>
                                        <div>

                                            <h4>{{number_format($calculatedData['view_rate'], 2, '.', '')}}%</h4>
                                        </div>
                                    </div><!-- col -->
                                    {{-- <div class="col-6 d-sm-flex align-items-center">
                                                <div class="card-chart bg-purple">
                                                    <span class="peity-bar"
                                                        data-peity='{"fill": ["#fff"], "width": 21, "height": 20 }'>7,4,5,7,2</span>
                                                </div>
                                                <div>
                                                    <label>Sessions</label>
                                                    <h4>9,065</h4>
                                                </div>
                                            </div><!-- col --> --}}
                                </div><!-- card-body -->
                            </div>
                        </div>
                    </div>
                    <div class="az-content-label mg-b-20">Detail Post Analysis</div>

                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Post</th>
                                    <th>Caption</th>
                                    <th>Likes</th>
                                    <th>Comments</th>
                                    <th>Post E.R</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calculatedData['posts']->edges as $post)
                                <?php  // dd($post->node); 
                                // $img_ctn = file_get_contents($post->node->thumbnail_src);
                                ?>
                                <tr>
                                    <th scope="row">{{ date('d-m-Y', $post->node->taken_at_timestamp)}}</th>
                                    <td>
                                        <div style="max-height: 100px; max-width: 70px; overflow: auto;">
                                            <a href={{'https://www.instagram.com/p/'. $post->node->shortcode}} target=_blank ><img style=" border-radius: 10px; height: -webkit-fill-available; width: -webkit-fill-available;" src="{{'data:image/jpg;base64,'.base64_encode(file_get_contents($post->node->thumbnail_src))}}" alt=""></td></a>
                                        </div>
                                    <td>{{$post->node->edge_media_to_caption->edges ? $post->node->edge_media_to_caption->edges[0]->node->text : ''}}</td>
                                    <td>{{number_format($post->node->edge_liked_by->count)}}</td>
                                    <td>{{number_format($post->node->edge_media_to_comment->count)}}</td>
                                    <td>{{isset($post->node->video_view_count) ? number_format(($post->node->video_view_count), 2, '.', '') : 0}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="az-content-label mg-b-20 mg-t-20">In Depth Analytics</div>
                    <div class="table-responsive">
                        <table class="table table-bordered mg-b-0">
                          <thead>
                            <tr>
                              <th>date</th>
                              <th>Followers</th>
                              <th>Difference</th>
                              <th>Following</th>
                              <th>Difference</th>
                              <th>POSTS</th>
                              <th>Difference</th>
                            </tr>
                          </thead>
                          <tbody id="history">
                            
                          </tbody>
                        </table>
                      </div>
                </div>
                <!-- row -->
            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
    <style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/wc.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Add series
// https://www.amcharts.com/docs/v5/charts/word-cloud/
var series = root.container.children.push(am5wc.WordCloud.new(root, {
  maxCount:100,
  minWordLength:2,
  maxFontSize:am5.percent(35),
  text: `{{
        $calculatedData['hashtag_graph'];
  }}`,
}));





// Configure labels
series.labels.template.setAll({
  paddingTop: 5,
  paddingBottom: 5,
  paddingLeft: 5,
  paddingRight: 5,
  fontFamily: "Courier New"
});

}); // end am5.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
<!-- <div class="card-header">
                                <h6 class="card-title">HashTags</h6>
                                <p class="card-text">This report is based on the usage of hashtags of the last 12 posts.</p>
                            </div>
                            <div class="card-body">
                                <style>
                                    #hash:hover{
                                        color: rgb(247, 22, 22);
                                        cursor: pointer;
                                    }
                                </style>
                                @foreach ($calculatedData['hashtags'] as $key => $value)
                                <div class="az-list-item">
                                    <div>
                                        <h4 id="hash">{{"#".$key}}</h4>
                                    </div>
                                    <div>
                                        <h5 class="tx-primary">{{$value}}</h5>
                                    </div>
                                </div>
                                @endforeach
                            </div> -->
@endsection
