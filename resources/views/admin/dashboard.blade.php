@extends("layouts.backend")
@section("content")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Dashboard</h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href=""></a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row" id="dragdrop">
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-two">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                         <div><h2 class="mt-0 mb-1 text-info">234</h2>
                                             <span class="">Ordered</span>
                                         </div>
                                         <div class="ml-4"><h2 class="mt-0 mb-1 text-info">2345</h2>
                                             <span class="">Delivered</span>
                                         </div>
                                        </div>
                                    </div>
                                    <img class="ml-3" src="../../assets/images/icons/1.png" alt="">
                                </div>
                            </div>
                            <hr>
                            <span class="">Today</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-two">
                                <div class="media">
                                    <div class="media-body">
                                        <h2 class="mt-0 mb-1 text-danger">2,02,150</h2><span class="">Orders</span>
                                    </div>
                                    <img class="ml-3" src="../../assets/images/icons/2.png" alt="">
                                </div>
                            </div>
                            <hr>
                            <span class="">SOS</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-two">
                                <div class="media">
                                    <div class="media-body">
                                        <h2 class="mt-0 mb-1 text-warning">2,0</h2><span class="">Orders</span>
                                    </div>
                                    <img class="ml-3" src="../../assets/images/icons/3.png" alt="">
                                </div>
                            </div>
                            <hr>
                            <span class="">Tomorrow</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="graph-container">
                            <canvas id="bar-chart" width="800" height="450"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [
                    {
                        label: "",
                        backgroundColor: "#08306b",
                        data: [100,30,90,80,83,87, 65,99,91,85,67,49]
                    }
                ]
            },
            options: {
                title:{
                    display:true,
                    text:'Stock'
                },
                maintainAspectRatio: false,
                legend: { display: false },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection