@extends('layouts.sideNav')
@section('content')

<!-- Page Header -->
<div class="page-header row no-gutters pb-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0 d-flex">
        <h1 class="page-title ml-3">DASHBOARD</h1>
    </div>
</div>
<style>
.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}

.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}

.circle-tile-heading .fa {
    line-height: 80px;
}

.circle-tile-content {
    padding-top: 50px;
}

.circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
}

.circle-tile-description {
    text-transform: uppercase;
}

.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}

.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}

.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}

.circle-tile-heading.green:hover {
    background-color: #138F77;
}

.circle-tile-heading.orange:hover {
    background-color: #DA8C10;
}

.circle-tile-heading.blue:hover {
    background-color: #2473A6;
}

.circle-tile-heading.red:hover {
    background-color: #CF4435;
}

.circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
}

.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-blue {
    background-color: #34495E;
}

.green {
    background-color: #16A085;
}

.blue {
    background-color: #2980B9;
}

.orange {
    background-color: #F39C12;
}

.red {
    background-color: #E74C3C;
}

.purple {
    background-color: #8E44AD;
}

.dark-gray {
    background-color: #7F8C8D;
}

.gray {
    background-color: #95A5A6;
}

.light-gray {
    background-color: #BDC3C7;
}

.yellow {
    background-color: #F1C40F;
}

.text-dark-blue {
    color: #34495E;
}

.text-green {
    color: #16A085;
}

.text-blue {
    color: #2980B9;
}

.text-orange {
    color: #F39C12;
}

.text-red {
    color: #E74C3C;
}

.text-purple {
    color: #8E44AD;
}

.text-faded {
    color: rgba(255, 255, 255, 0.7);
}
</style>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div id="chart_div"></div>
                <!-- form dashboard -->
                <form>
                    </head>

                    <body>
                        <div id="piechart" style="width: 400px; height: 300px;"></div>
                    </body>

                    </html>

                </form>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card" style="height: 360px;">
            <div class="card-body">
                <div id="chart_div"></div>
                <!-- form dashboard -->
                <form>
                    <div class=" col-sm-12">
                        <div class="circle-tile ">
                            <a href="#">
                                <div class="circle-tile-heading yellow"><i class="fa fa-file fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content yellow">
                                <div class="circle-tile-description text-faded">Total My E-Jobsheet</div>
                                <div class="circle-tile-number text-faded "
                                    style="height: 170px; font-size: 60px; line-height: 120px;">{{$stdEjob}}</div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var stdPending = <?php echo $stdPending; ?>;
    var stdReviewed = <?php echo $stdReviewed; ?>;
    var stdRejected = <?php echo $stdRejected; ?>;
    var stdProceed = <?php echo $stdProceed; ?>;
    var stdCompleted = <?php echo $stdCompleted; ?>;

    var data = google.visualization.arrayToDataTable([
        ['asasas', 'Hours per Day'],
        ['Pending', stdPending],
        ['Reviewed', stdReviewed],
        ['Rejected', stdRejected],
        ['Proceed', stdProceed],
        ['Completed', stdCompleted]
    ]);

    var options = {
        title: 'My E-Jobsheet',
        width: 500, // Specify the desired width in pixels
        height: 300 // Specify the desired height in pixels
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
}
</script>

@endsection