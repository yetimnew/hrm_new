@section('title','TIMS | Dashbord')
@extends('master.app')
@section('content')

<div class="col-md-12">

    <section class="dashboard-counts no-padding-bottom">
        <div class="container">
            <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-violet"><i class="icon-user"></i>
                        </div>
                        <div class="title"><span>Avilable<br>Trucks</span>
                            <div class="progress">
                                <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                            </div>
                        </div>

                        <div class="number">
                            <strong>
                                81 </strong>
                        </div>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-red"><i class="icon-padnote"></i>
                        </div>
                        <div class="title"><span>Number of<br>Drivers</span>
                            <div class="progress">
                                <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="70"
                                    aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                            </div>
                        </div>
                        <div class="number">
                            <strong>
                                76 </strong>
                        </div>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-green"><i class="icon-bill"></i>
                        </div>
                        <div class="title"><span>Active<br>Operation</span>
                            <div class="progress">
                                <div role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="40"
                                    aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                            </div>
                        </div>
                        <div class="number">
                            <strong>
                                5 </strong>
                        </div>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-orange"><i class="icon-check"></i>
                        </div>
                        <div class="title"><span>Total<br>Tonage</span>
                            <div class="progress">
                                <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                            </div>
                        </div>
                        <div class="number">
                            <strong>
                                23,327.00 </strong>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Header Section    -->
    <section class="dashboard-header">
        <div class="container">
            <div class="row">
                <!-- Statistics -->
                <div class="statistics col-lg-3 col-12">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-red"><i class="fa fa-tasks"></i>
                        </div>
                        <div class="text">
                            <strong id="totalTone">
                                23,327.00 </strong><br>
                            <lead>Avilable Tone</lead>
                        </div>
                    </div>
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-green"><i class="fa fa-calendar-o"></i>
                        </div>
                        <div class="text">
                            <strong id="lfTone">
                                50.00 </strong><br>
                            <lead>Uplifted Tone</lead>
                        </div>
                    </div>
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i>
                        </div>

                        <div class="text">
                            <strong id="reTone">
                                23,277.00 </strong><br>
                            <lead>Remaining Tone</lead>
                        </div>
                    </div>
                </div>
                <!-- Line Chart            -->
                <div class="chart col-lg-6 col-12">
                    <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">

                        <div class="table-responsive m-3">
                            <div class="text"><strong>Dayily Truck Status</strong>
                                <small class="pull-right text-muted ">
                                    2018-10-19 </small>
                            </div>
                            <table class="table  table-hover table-sm">
                                <thead>
                                    <tr class="bg-info text-white">
                                        <th>#</th>
                                        <th>Status </th>
                                        <th>Numbe</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class='p-0 m-0'>1</td>
                                        <td class='p-0 m-0'>On Road</td>
                                        <td class='p-0 m-0'>24</td>
                                        <td class='p-0 m-0'>29.63</td>
                                    </tr>
                                    <tr>
                                        <td class='p-0 m-0'>2</td>
                                        <td class='p-0 m-0'>On Load</td>
                                        <td class='p-0 m-0'>13</td>
                                        <td class='p-0 m-0'>16.05</td>
                                    </tr>
                                    <tr>
                                        <td class='p-0 m-0'>3</td>
                                        <td class='p-0 m-0'>Off Load</td>
                                        <td class='p-0 m-0'>13</td>
                                        <td class='p-0 m-0'>16.05</td>
                                    </tr>
                                    <tr>
                                        <td class='p-0 m-0'>4</td>
                                        <td class='p-0 m-0'>Accident</td>
                                        <td class='p-0 m-0'>7</td>
                                        <td class='p-0 m-0'>8.64</td>
                                    </tr>
                                    <tr>
                                        <td class='p-0 m-0'>5</td>
                                        <td class='p-0 m-0'>Load Shortage</td>
                                        <td class='p-0 m-0'>6</td>
                                        <td class='p-0 m-0'>7.41</td>
                                    </tr>
                                    <tr>
                                        <td class='p-0 m-0'>6</td>
                                        <td class='p-0 m-0'>road call</td>
                                        <td class='p-0 m-0'>6</td>
                                        <td class='p-0 m-0'>7.41</td>
                                    </tr>
                                    <tr>
                                        <td class='p-0 m-0'>7</td>
                                        <td class='p-0 m-0'>Insurance</td>
                                        <td class='p-0 m-0'>5</td>
                                        <td class='p-0 m-0'>6.17</td>
                                    </tr>
                                    <tr>
                                        <td class='p-0 m-0'>8</td>
                                        <td class='p-0 m-0'>Field Maintenace</td>
                                        <td class='p-0 m-0'>4</td>
                                        <td class='p-0 m-0'>4.94</td>
                                    </tr>
                                    <tr>
                                        <td class='p-0 m-0'>9</td>
                                        <td class='p-0 m-0'>On Quee</td>
                                        <td class='p-0 m-0'>2</td>
                                        <td class='p-0 m-0'>2.47</td>
                                    </tr>
                                    <tr>
                                        <td class='p-0 m-0'>10</td>
                                        <td class='p-0 m-0'>Under Maintenance</td>
                                        <td class='p-0 m-0'>1</td>
                                        <td class='p-0 m-0'>1.23</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="chart col-lg-3 col-12">
                    <!-- Bar Chart   -->
                    <div class="bar-chart has-shadow bg-white">
                        <div class="title"><strong class="text-violet">95%</strong><br><small>Current Server
                                Uptime</small>
                        </div>
                        <canvas id="barChartHome"></canvas>
                    </div>
                    <!-- Numbers-->
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-green"><i class="fa fa-line-chart"></i>
                        </div>
                        <div class="text"><strong>99.9%</strong><br><small>Success Rate</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section-->
    <section class="client no-padding-top">
        <div class="container">
            <div class="row">
                <!-- Work Amount  -->
                <div class="col-lg-7">
                    <div class="work-amount card">
                        <div class="card-body">
                            <div class="text-justify">
                                <h4 class="text-center" m-2>Operational Status </h4>
                            </div>
                            <div class="table-responsive">
                                <table id="trucks" class="table table-hover table-bordered">
                                    <thead class="p-0">
                                        <tr class="bg-info text-white p-0">
                                            <th>S/No</th>
                                            <th>Operation ID</th>
                                            <th>Cargo Volume</th>
                                            <th>Lifted Tone </th>
                                            <th>Remaining Tone</th>
                                            <th>%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class='p-1 m-1'> 1</td>
                                            <td class='p-1 m-1'>1125</td>
                                            <td class='p-1 m-1'>4,589.00</td>
                                            <td class='p-1 m-1'>50.00</td>
                                            <td class='p-1 m-1'>4,539.00</td>
                                            <td class='p-1 m-1'>1.09</td>
                                        </tr>
                                        <tr>
                                            <td class='p-1 m-1'> 2</td>
                                            <td class='p-1 m-1'>122</td>
                                            <td class='p-1 m-1'>1,457.00</td>
                                            <td class='p-1 m-1'>0.00</td>
                                            <td class='p-1 m-1'>0.00</td>
                                            <td class='p-1 m-1'>0.00</td>
                                        </tr>
                                        <tr>
                                            <td class='p-1 m-1'> 3</td>
                                            <td class='p-1 m-1'>1254</td>
                                            <td class='p-1 m-1'>147.00</td>
                                            <td class='p-1 m-1'>0.00</td>
                                            <td class='p-1 m-1'>0.00</td>
                                            <td class='p-1 m-1'>0.00</td>
                                        </tr>
                                        <tr>
                                            <td class='p-1 m-1'> 4</td>
                                            <td class='p-1 m-1'>12544</td>
                                            <td class='p-1 m-1'>12,547.00</td>
                                            <td class='p-1 m-1'>0.00</td>
                                            <td class='p-1 m-1'>0.00</td>
                                            <td class='p-1 m-1'>0.00</td>
                                        </tr>
                                        <tr>
                                            <td class='p-1 m-1'> 5</td>
                                            <td class='p-1 m-1'>35944</td>
                                            <td class='p-1 m-1'>4,587.00</td>
                                            <td class='p-1 m-1'>0.00</td>
                                            <td class='p-1 m-1'>0.00</td>
                                            <td class='p-1 m-1'>0.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Total Overdue             -->
                <div class="col-lg-5">
                    <div class="overdue card">

                        <div class="card-body">
                            <div class="text-justify">
                                <h4>Truck stutus of <span class="pull-right text-muted small"><em>2018-10-19</em>
                                    </span>

                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status Name</th>
                                            <th>Number of Vehecle</th>
                                            <th>%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Operation Status</td>
                                            <td>70</td>
                                            <td>86.42</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Graje Status</td>
                                            <td>11</td>
                                            <td>13.58</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
