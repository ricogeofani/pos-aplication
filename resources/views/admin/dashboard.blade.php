@extends('layouts.admin')

@push('css')
    <style type="text/css"></style>
@endpush

@section('header', 'dashboard')

@section('content')
<component id="controller">

        <div class="container">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-sm-12 col-md-3">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>{{ $total_barang }}</h3>
                  <p>Data Barang</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('barang') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-12 col-md-3">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $total_kategory }}</h3>
                  <p>Data kategory</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('kategory') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-12 col-md-3">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $total_karyawan }}</h3>
                  <p>Data Karyawan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('karyawan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-12 col-md-3">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $total_pelanggan }}</h3>
                  <p>Data Pelanggan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('pelanggan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-4">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $total_suplier }}</h3>
                  <p>Data Suplier</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('suplier') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-4">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>{{ $total_penjualan }}</h3>
                  <p>Data Penjualan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('penjualan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-4">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>{{ $total_pembelian }}</h3>
                  <p>Data Pembelian</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('pembelian') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3 mx-auto">
            <div class="col-md-12 col-12">
            <!-- BAR CHART -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title text-danger">Grafik Data Penjualan dan Pembelian</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
        </div>

</component>
@endsection

@push('js')
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

<script type="text/javascript">
  var data_bar = '{!! json_encode($data_bar) !!}';
  $(function () {

   //-------------
    //- BAR CHART -
    //------------
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'Oktober', 'November', 'December'],
      datasets: JSON.parse(data_bar)
    }

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

  })
</script>

@endpush