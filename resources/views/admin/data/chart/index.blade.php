@extends('admin.layouts.app')
@section('title', 'Data Order')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">New User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="highcharts-figure">
                            <div id="container"></div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-6">
                <div class="card card-teal">
                    <div class="card-header">
                        <h3 class="card-title">Total Order</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="highcharts-figure">
                            <div id="container2"></div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        var user = <?php echo json_encode($users); ?>;
        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Jumlah registrasi user baru'
            },
            subtitle: {
                text: 'Jumlah registrasi user baru dalam kurun waktu 1 tahun'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            colors: ['#3C8DBC'],
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: 'User Baru',
                data: user
            }]
        });
    </script>
    <script>
        var income = <?php echo json_encode($incomes); ?>;
        Highcharts.chart('container2', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Jumlah penghasilan'
            },
            subtitle: {
                text: 'Jumlah penghasilan dalam kurun waktu 1 tahun'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            colors: ['#20C997'],
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: 'Jumlah penghasilan',
                data: income
            }]

        });
    </script>
@endsection
