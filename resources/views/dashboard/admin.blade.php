@extends('layouts.dashboard-master')

@section('page-title', trans('app.dashboard'))

@section('custom-head')
    @include('dashboard.partials.counter-card-css')
@stop

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('dashboard') }}">{{ trans('app.dashboard') }}</a> /
    <a>{{ trans('app.dashboard') }}</a>
@stop

@section('content')
    <div class="container">
        @include('dashboard.partials.counter-card')
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="container p-4">
                        <h4>Registration History</h4>
                        <canvas class="mt-3" id="myChart" style="width:100%;max-width:600px"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                @include('dashboard.partials.latest-registration')
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script>
        var xValues = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var yValues = {!! json_encode(array_values($users_by_month)) !!};

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            min: 0,
                        }
                    }],
                }
            }
        });
    </script>
@stop
