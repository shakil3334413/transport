@extends('admin.layouts.master')
@section('title','Chart Dashboard')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-sm-12 col-xxxl-3 ">
                <div class="element-wrapper">
                    <h5 class="element-header">
                        সর্বমোট হিসাব.
                        <a href="{{route('home')}}" class="btn btn-primary float-right">মেইন ড্যাশবোর্ড</a>
                    </h5>
                    <div class="element-box">
                        {!! $chart->html() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xxxl-3 ">
                <div class="element-wrapper">
                    <div class="element-box">
                        {!! $pie->html() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xxxl-3 ">
                <div class="element-wrapper">
                    <div class="element-box">
                        {!! $piee->html() !!}
                    </div>
                </div>
            </div>
        </div>  
        {!! Charts::scripts() !!}
        {!! $chart->script() !!}
        {!! $pie->script() !!}
        {!! $piee->script() !!}
      {{-- <div class="row">
        <div class="col-sm-4 d-xxxl-none">
          <!--START - Top Selling Chart-->
          <div class="element-wrapper">
            <h6 class="element-header">
              Top Selling Today
            </h6>
            <div class="element-box">
              <div class="el-chart-w">
                <canvas height="120" id="donutChart" width="120"></canvas>
                <div class="inside-donut-chart-label">
                  <strong>142</strong><span>Total Orders</span>
                </div>
              </div>
              <div class="el-legend condensed">
                <div class="row">
                  <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto col-6">
                    <div class="legend-value-w">
                      <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                      <div class="legend-value">
                        <span>Prada</span>
                        <div class="legend-sub-value">
                          14 Pairs
                        </div>
                      </div>
                    </div>
                    <div class="legend-value-w">
                      <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                      <div class="legend-value">
                        <span>Maui Jim</span>
                        <div class="legend-sub-value">
                          26 Pairs
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 d-lg-none d-xxl-block">
                    <div class="legend-value-w">
                      <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                      <div class="legend-value">
                        <span>Gucci</span>
                        <div class="legend-sub-value">
                          17 Pairs
                        </div>
                      </div>
                    </div>
                    <div class="legend-value-w">
                      <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                      <div class="legend-value">
                        <span>Armani</span>
                        <div class="legend-sub-value">
                          12 Pairs
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--END - Top Selling Chart-->
        </div>
        <div class="d-none d-xxxl-block col-xxxl-6">
          <!--START - Questions per Product-->
          <div class="element-wrapper">
            <div class="element-actions">
              <form class="form-inline justify-content-sm-end">
                <select class="form-control form-control-sm rounded">
                  <option value="Pending">
                    Today
                  </option>
                  <option value="Active">
                    Last Week 
                  </option>
                  <option value="Cancelled">
                    Last 30 Days
                  </option>
                </select>
              </form>
            </div>
            <h6 class="element-header">
              Inventory Stats
            </h6>
            <div class="element-box">
              <div class="os-progress-bar primary">
                <div class="bar-labels">
                  <div class="bar-label-left">
                    <span class="bigger">Eyeglasses</span>
                  </div>
                  <div class="bar-label-right">
                    <span class="info">25 items / 10 remaining</span>
                  </div>
                </div>
                <div class="bar-level-1" style="width: 100%">
                  <div class="bar-level-2" style="width: 70%">
                    <div class="bar-level-3" style="width: 40%"></div>
                  </div>
                </div>
              </div>
              <div class="os-progress-bar primary">
                <div class="bar-labels">
                  <div class="bar-label-left">
                    <span class="bigger">Outwear</span>
                  </div>
                  <div class="bar-label-right">
                    <span class="info">18 items / 7 remaining</span>
                  </div>
                </div>
                <div class="bar-level-1" style="width: 100%">
                  <div class="bar-level-2" style="width: 40%">
                    <div class="bar-level-3" style="width: 20%"></div>
                  </div>
                </div>
              </div>
              <div class="os-progress-bar primary">
                <div class="bar-labels">
                  <div class="bar-label-left">
                    <span class="bigger">Shoes</span>
                  </div>
                  <div class="bar-label-right">
                    <span class="info">15 items / 12 remaining</span>
                  </div>
                </div>
                <div class="bar-level-1" style="width: 100%">
                  <div class="bar-level-2" style="width: 60%">
                    <div class="bar-level-3" style="width: 30%"></div>
                  </div>
                </div>
              </div>
              <div class="os-progress-bar primary">
                <div class="bar-labels">
                  <div class="bar-label-left">
                    <span class="bigger">Jeans</span>
                  </div>
                  <div class="bar-label-right">
                    <span class="info">12 items / 4 remaining</span>
                  </div>
                </div>
                <div class="bar-level-1" style="width: 100%">
                  <div class="bar-level-2" style="width: 30%">
                    <div class="bar-level-3" style="width: 10%"></div>
                  </div>
                </div>
              </div>
              <div class="mt-4 border-top pt-3">
                <div class="element-actions d-none d-sm-block">
                  <form class="form-inline justify-content-sm-end">
                    <select class="form-control form-control-sm form-control-faded">
                      <option selected="true">
                        Last 30 days
                      </option>
                      <option>
                        This Week
                      </option>
                      <option>
                        This Month
                      </option>
                      <option>
                        Today
                      </option>
                    </select>
                  </form>
                </div>
                <h6 class="element-box-header">
                  Inventory History
                </h6>
                <div class="el-chart-w">
                  <canvas data-chart-data="13,28,19,24,43,49,40,35,42,46,38,32,45" height="50" id="liteLineChartV3" width="300"></canvas>
                </div>
              </div>
            </div>
          </div>
          <!--END - Questions per product                  -->
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-xxxl-9">
          <div class="element-wrapper">
            <h6 class="element-header">
              Unique Visitors Graph
            </h6>
            <div class="element-box">
              <div class="os-tabs-w">
                <div class="os-tabs-controls">
                  <ul class="nav nav-tabs smaller">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#tab_overview">Overview</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tab_sales">Sales</a>
                    </li>
                  </ul>
                  <ul class="nav nav-pills smaller d-none d-md-flex">
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#">Today</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#">7 Days</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#">14 Days</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#">Last Month</a>
                    </li>
                  </ul>
                </div>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_overview">
                    <div class="el-tablo bigger">
                      <div class="label">
                        Unique Visitors
                      </div>
                      <div class="value">
                        12,537
                      </div>
                    </div>
                    <div class="el-chart-w">
                      <canvas height="150px" id="lineChart" width="600px"></canvas>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_sales"></div>
                  <div class="tab-pane" id="tab_conversion"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-none d-xxxl-block col-xxxl-3">
          <div class="element-wrapper">
            <h6 class="element-header">
              Visitors by Browser
            </h6>
            <div class="element-box less-padding">
              <div class="el-chart-w">
                <canvas height="120" id="donutChart1" width="120"></canvas>
                <div class="inside-donut-chart-label">
                  <strong>1,248</strong><span>Visitors</span>
                </div>
              </div>
              <div class="el-legend condensed">
                <div class="row">
                  <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto">
                    <div class="legend-value-w">
                      <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                      <div class="legend-value">
                        <span>Safari</span>
                        <div class="legend-sub-value">
                          17%, 12 Visits
                        </div>
                      </div>
                    </div>
                    <div class="legend-value-w">
                      <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                      <div class="legend-value">
                        <span>Chrome</span>
                        <div class="legend-sub-value">
                          22%, 763 Visits
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 d-none d-xxxxl-block">
                    <div class="legend-value-w">
                      <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                      <div class="legend-value">
                        <span>Firefox</span>
                        <div class="legend-sub-value">
                          3%, 7 Visits
                        </div>
                      </div>
                    </div>
                    <div class="legend-value-w">
                      <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                      <div class="legend-value">
                        <span>Explorer</span>
                        <div class="legend-sub-value">
                          15%, 45 Visits
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     <!--------------------
      START - Color Scheme Toggler
      -------------------->
      <!--------------------
      END - Chat Popup Box
      -------------------->
    </div>
    <!--------------------
    START - Sidebar
    -------------------->
    <!--------------------
    END - Sidebar
    -------------------->
  </div> --}}
  
@endsection