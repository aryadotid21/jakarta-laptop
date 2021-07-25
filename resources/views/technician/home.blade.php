@extends('technician.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $order->whereNotIn('status', ['Finished'])->count() }}</h3>
                        <p>New Orders ( Today:
                            {{ $order->whereNotIn('status', ['Finished'])->where('created_at', '>=', Carbon::today())->count() }}
                            )</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3> @currency($order->where('status', 'Finished')->sum('total_price')) </h3>
                        <p>Total Income ( Today:
                            @currency($order->where('status', 'Finished')->where('created_at', '>=',
                            Carbon::today())->sum('total_price')) )</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $user->where('role_id', 3)->count() }}</h3>
                        <p>User Registrations ( Today:
                            {{ $user->where('role_id', 3)->where('created_at', '>=', Carbon::today())->count() }}
                            )</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $laptop->where('status', 'Ready')->count() }}</h3>
                        <p>Laptop Ready ( Not ready: {{ $laptop->whereNotIn('status', ['Ready'])->count() }} )</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-laptop"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $order->where('status', 'Finished')->count() }}</h3>
                        <p>Finished Order ( Today:
                            {{ $order->where('status', 'Finished')->where('created_at', '>=', Carbon::today())->count() }}
                            )</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-checkmark-circle"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $user->where('role_id', 1)->count() }}</h3>
                        <p>Admin</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-briefcase"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $user->where('role_id', 2)->count() }}</h3>
                        <p>Technician</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-wrench"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $question->count() }}</h3>
                        <p>Question</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-mail"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
    @include('sweetalert::alert')
@endsection
