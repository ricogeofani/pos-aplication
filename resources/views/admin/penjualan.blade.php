@extends('layouts.admin')

@push('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('header', 'Penjualan')
@section('content')
<component id="controller">

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <a href="{{ url('cartPenjualan') }}" class="btn btn-primary"> <i class="fa fa-plus"></i>Add Transaksi</a>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Penjualan</th>
                                        <th>Tanggal Penjualan</th>
                                        <th>Nama Karyawan</th>
                                        <th>Jabatan</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="modal-default" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form :action="actionUrl" method="post" autocomplete="of" @submit="submitForm($event, data.id)">
                    <div class="modal-header text-uppercase bg-warning">
                        <h4 class="modal-title" id="exampleModalLabel" v-if="!editStatus">Add Penjualan</h4>
                        <h4 class="modal-title" id="exampleModalLabel" v-if="editStatus">Edit Penjualan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="put" v-if="editStatus">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Nama Karyawan</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="id_karyawan" class="form-control">
                                        @foreach ($data_karyawan as $karyawan)
                                            <option :selected="{{ $karyawan->id }} == data.id_karyawan" :value="{{ $karyawan->id }}">{{ $karyawan->nama_karyawan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <label>Nama Pelanggan</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="id_pelanggan" class="form-control">
                                        @foreach ($data_pelanggan as $pelanggan)
                                            <option :selected="{{ $pelanggan->id }} == data.id_pelanggan" :value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-5">Update</button>
                    </div>
                </form>
            </div>
        </div>
        </div>

         <!-- Modal detail -->
      <div class="modal fade" id="modal-detail" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title" id="exampleModalLabel">Detail Penjualan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 mt-2">
                                        <h5>Nama Karyawan : </h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 v-for="karyawan in data" class="mb-2">@{{ karyawan.nama_karyawan }}</h5>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mt-2">
                                        <h5>Jabatan : </h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 v-for="karyawan in data" class="mb-2">@{{ karyawan.jabatan }}</h5>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mt-2">
                                        <h5>Nama Pelanggan : </h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 v-for="pelanggan in data">@{{ pelanggan.nama_pelanggan }}</h5>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                            </div>
                        </div>
                        
                        <span class="text-danger">::list barang</span>
                        <div class="row">
                            <div class="card mt-2 ml-2 bg-secondary" style="width: 9rem;" v-for="barang in data.barang">
                                <div class="card-body">
                                  <h5 class="card-title">@{{ barang.kode }}</h5><hr>
                                  <p class="card-text">@{{ barang.nama_barang }}</p>
                                  <p class="card-text">@{{ barang.qty_stok }} @{{ barang.unit }}</p>
                                  <p class="card-text">Rp. @{{ formatPrice(barang.harga_jual) }}</</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>

</component>
@endsection

@push('js')
        <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        var actionUrl = '{{ url('data/penjualan') }}';
        var columns = [
            {data: 'id', class: 'text-center', orderable: true},

            {render: function(index, row, data, meta){
                 const date =  new Date(data.created_at)
                 tanggal = date.getDate()
                 bulan = date.getMonth()
                 tahun = date.getFullYear()
                 
                 return tanggal+' - '+bulan+' - '+tahun
            }, orderable: false, width: '100px', class: 'text-center'},

            {data: 'karyawan.nama_karyawan', class: 'text-center', orderable: true},
            {data: 'karyawan.jabatan', class: 'text-center', orderable: true},
            {data: 'pelanggan.nama_pelanggan', class: 'text-center', orderable: true},

            {render: function(index, row, data, meta){
                return `
                <div class="d-flex">
                    <a href="#" class="btn btn-sm btn-info" onclick="controller.detailData(event, ${meta.row})">
                        Detail
                    </a>
                    <a href="#" class="btn btn-sm btn-warning ml-2" onclick="controller.editData(event, ${meta.row})">
                        Update
                    </a>
                    <a href="#" class="btn btn-danger btn-sm ml-2" onclick="controller.deleteData(event, ${data.id})">
                        Delete
                    </a>
                </div>
                `;
            }, orderable: false, width: '100px', class: 'text-center'},
        ];
    </script>

    <script src="{{ asset('js/data.js') }}"></script>

@endpush
