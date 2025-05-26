@extends('layouts.admin')
@section('content')

<?php
$graph = array();
foreach ($d_arr as $k => $v) {
  $graph[] = '{
    "month": "' . $k . '",
    "value": ' . $v . '
  }';
}
?>
<style type="text/css">
  .widget,
  .widget.widget-note,
  .widget-note {
    background-color: #f3fbf7;
    max-width: 100%;
    padding: 14px;
    margin: 35px 0;
    border-radius: 9px;
    overflow-wrap: break-word;
    border-left: 5px solid #5ac891;
    font-size: 1rem;
    color: rgba(0, 0, 0, .87);
  }

  .widget.widget-warning {
    background-color: #f2564d;
    border-left: 5px solid #6b0d08;
    color: white;
  }

  .widget.widget-important {
    background-color: #fef7ed;
    border-left: 5px solid #f3a12c;
  }
  .align-top {
    vertical-align: top !important;
    width: 30px;
    border-radius: 100%;
    height: 30px;
  }
</style>
<script>
  $(document).ready(function() {
    // seo ecommerce start
    $(function() {

      var chart = AmCharts.makeChart("r-barchart", {
        "type": "serial",
        "theme": "light",
        "marginTop": 0,
        "marginRight": 0,
        "dataProvider": [<?php echo implode(', ', $graph); ?>],
        "valueAxes": [{
          "axisAlpha": 0,
          "gridAlpha": 0,
          "dashLength": 6,
          "position": "left"
        }],
        "graphs": [{
          "id": "g1",
          "balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
          "bullet": "round",
          "bulletSize": 8,
          "fillAlphas": 0.1,
          "lineColor": "#448aff",
          "lineThickness": 2,
          "negativeLineColor": "#ff5252",
          "type": "smoothedLine",
          "valueField": "value"
        }],
        "chartScrollbar": {
          "graph": "g1",
          "gridAlpha": 0,
          "color": "#888888",
          "scrollbarHeight": 55,
          "backgroundAlpha": 0,
          "selectedBackgroundAlpha": 0.1,
          "selectedBackgroundColor": "#888888",
          "graphFillAlpha": 0,
          "autoGridCount": true,
          "selectedGraphFillAlpha": 0,
          "graphLineAlpha": 0.2,
          "graphLineColor": "#c2c2c2",
          "selectedGraphLineColor": "#888888",
          "selectedGraphLineAlpha": 1
        },
        "chartCursor": {
          "categoryBalloonDateFormat": "YYYY-MM",
          "cursorAlpha": 0,
          "valueLineEnabled": true,
          "valueLineBalloonEnabled": true,
          "valueLineAlpha": 0.5,
          "fullWidth": true
        },
        "dataDateFormat": "YYYY-MM",
        "categoryField": "month",
        "categoryAxis": {
          "minPeriod": "YYYY-MM",
          "gridAlpha": 0,
          "parseDates": false,
        },
      });
      chart.zoomToIndexes(Math.round(chart.dataProvider.length * 0.1), Math.round(chart.dataProvider.length * 1));
    });
    // seo ecommerce end
  });
</script>

<section class="">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 ">
        <div class="card2 box-text text-center">
          <i class="fa fa-users blue" aria-hidden="true"></i>
          <h2 class="blue">{{$total_users}} Total Users</h2>
          <p>{{$total_active_candidates}} active | {{$total_pending_candidates}} inactive</p>
          <button type="button" class="btn btn-primary blue-bg border-none">Register Users</button>
        </div>
      </div>
      <div class="col-lg-4 text-center">
        <div class="card2 box-text">
          <i class="fa fa-video-camera green" aria-hidden="true"></i>
          <h2 class="green">{{$total_videos}} Total Videos</h2>
          <p>{{$total_active_videos}} active | {{$total_inactive_videos}} disabled | {{$total_flagged_videos}} Flagged</p>
          <button type="button" class="btn btn-success btn-shadow green-bg border-none">Published Videos</button>
        </div>
      </div>
      <div class="col-lg-4 text-center">
        <div class="card2 box-text">
          <i class="fa fa-briefcase red" aria-hidden="true"></i>
          <h2 class="red">{{$total_likes+ $total_comments+ $total_views}} User Engagement</h2>
          <p>{{$total_likes}} Likes | {{$total_comments}} Comments | {{$total_views}} Views</p>
          <button type="button" class="btn btn-danger btn-shadow red-bg border-none">Engagement</button>
        </div>
      </div>
    </div>
  </div>
</section>



<div class="clearfix"></div>
<br>

<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card table-card customers-profile">
          <h3>Registration Analytics</h3>
          <div class="card-body">
            <div id="r-barchart" style="height: 375px"></div>
          </div>
        </div>
      </div>
      
    </div>
</section>



<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card customers-profile">
          <h3>Active Candidates</h3>

          <div class="card-body table-responsive">
            <table class="table table-striped table-main customer-table">
              <thead>
                <tr>
                  <th></th>
                  <th>Email</th>
                  <th>Name</th>
                  <!-- <th>Country</th> -->
                  <th>Register Date</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($total_active_candidates > 0) {
                  foreach ($active_candidates as $candidate) { ?>
                    <tr>
                      <td>

                        <?php if ($candidate->user_dp == "") {
                          $img = asset('assets/images/profile.png');
                        } elseif (stripos($candidate->user_dp, 'https://') !== false) {
                          $img = $candidate->user_dp;
                        } else {
                          $img = url(config('app.profile_path')) . '/' . $candidate->user_id . '/' . $candidate->user_dp;
                        } ?>

                        <div class="d-inline-block align-middle" style="background-image:url('{{$img}}');height:30px;width:30px;background-size: cover;border-radius: 100%;">

                        </div>
                      </td>
                      <td>
                        <div class="d-inline-block">
                          <h6><?php echo $candidate->email; ?>
                        </div>
                      </td>
                      <td><?php echo $candidate->fname . " " . $candidate->lname; ?></td>
                      <td><?php echo date('d F Y', strtotime($candidate->created_at)); ?></td>
                    </tr>
                  <?php }
                } else { ?>
                  <tr>
                    <td colspan="6" class="text-center">No Record ...</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card customers-profile">
          <h3>Inactive Candidates</h3>

          <div class="card-body table-responsive">
            <table class="table table-striped table-main customer-table">
              <thead>
                <tr>
                  <th>Email</th>
                  <th>Name</th>

                  <th>Register Date</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($total_pending_candidates > 0) {
                  foreach ($pending_candidates as $candidate) { ?>
                    <tr>
                      <td>
                        <div class="d-inline-block align-middle">
                          <?php if ($candidate->user_dp == "") { ?>
                            <img src="{{ asset('assets/images/profile.png') }}" alt="user image" class="img-radius img-40 align-top m-r-15">
                          <?php } elseif (stripos($candidate->user_dp, 'https://') !== false) { ?>
                            <img src="<?php echo $candidate->user_dp; ?>" alt="user image" class="img-radius img-40 align-top m-r-15">
                          <?php } else { ?>
                            <img src="<?php echo url(config('app.profile_path')) . '/' . $candidate->user_id . '/' . $candidate->user_dp; ?>" alt="user image" class="img-radius img-40 align-top m-r-15">
                          <?php } ?>
                          <div class="d-inline-block">
                            <h6><?php echo $candidate->email; ?>
                          </div>
                        </div>
                      </td>
                      <td><?php echo $candidate->fname . " " . $candidate->lname; ?></td>
                      <td><?php echo date('d F Y', strtotime($candidate->created_at)); ?></td>
                    </tr>
                  <?php }
                } else { ?>
                  <tr>
                    <td colspan="6" class="text-center">No Record ...</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</div>
</div>
</div>
</section>
@endsection