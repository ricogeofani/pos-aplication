@extends('layouts.admin')

@push('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('header', 'barang')
@section('content')
<component id="controller">

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <a href="#" @click="addData()" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                Add Data
                            </a>
                            <a href="javascript:location.reload(true)" class="btn btn-success"><i class="fa fa-undo" aria-hidden="true"></i> Refresh</a>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Unit</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Qty Stok</th>
                                        <th>Kategory</th>
                                        <th>Suplier</th>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form :action="actionUrl" method="post" autocomplete="of" @submit="submitForm($event, data.id)">
                    <div class="modal-header text-uppercase bg-warning">
                        <h4 class="modal-title" id="exampleModalLabel" v-if="!editStatus">Add Suplier</h4>
                        <h4 class="modal-title" id="exampleModalLabel" v-if="editStatus">Edit suplier</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="put" v-if="editStatus">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Kode</label>
                                <input type="text" name="kode" :value="data.kode" class="form-control" required>
                            </div> 
                            <div class="form-group col-md-6">
                                <label>Nama Barang</label>
                                <input type="text" name="nama" :value="data.nama_barang" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Unit</label>
                                <select name="unit" class="form-control">
                                    <option :selected="data.unit == 'pcs' " value="pcs">Pcs</option>
                                    <option :selected="data.unit == 'karton' " value="karton">Karton</option>
                                </select>
                            </div> 
                            <div class="form-group col-md-6">
                                <label>Harga Beli</label>
                                <input type="text" name="harga_beli" :value="data.harga_beli" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Harga Jual</label>
                                <input type="text" name="harga_jual" :value="data.harga_jual" class="form-control" required>
                            </div> 
                            <div class="form-group col-md-6">
                                <label>Qty Stok</label>
                                <input type="text" name="qty_stok" :value="data.qty_stok" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Kategory</label>
                                <select name="id_kategory" class="form-control">
                                    @foreach ($data_kategory as $kategory)
                                        <option :selected="{{ $kategory->id }} == data.id_kategory" :value="{{ $kategory->id }}">{{ $kategory->nama_kategory }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group col-md-6">
                                <label>Suplier</label>
                                <select name="id_suplier" class="form-control">
                                    @foreach ($data_suplier as $suplier)
                                        <option :selected="{{ $suplier->id }} == data.id_suplier" :value="{{ $suplier->id }}">{{ $suplier->nama_suplier }}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-5">Save Data</button>
                    </div>
                </form>
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
        var actionUrl = '{{ url('data/barang') }}';
        var columns = [
            {data: 'kode', class: 'text-center', orderable: true},
            {data: 'nama_barang', class: 'text-center', orderable: true},
            {data: 'unit', class: 'text-center', orderable: true},

            {render: function(index, row, data, meta) {
                harga_beli = data.harga_beli
                const rupiah = (harga_beli)=>{
                    return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                    }).format(harga_beli);
                }
                return rupiah(harga_beli);
            }, orderable: true, class: 'text-center'},

            {render: function(index, row, data, meta) {
                harga_jual = data.harga_jual
                const rupiah = (harga_jual)=>{
                    return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                    }).format(harga_jual);
                }
                return rupiah(harga_jual);
            }, orderable: true, class: 'text-center'},

            {data: 'qty_stok', class: 'text-center', orderable: true},
            {data: 'kategory.nama_kategory', class: 'text-center', orderable: true},
            {data: 'suplier.nama_suplier', class: 'text-center', orderable: true},

            {render: function(index, row, data, meta){
                return `
                <div class="d-flex">
                    <a href="#" class="btn btn-sm btn-warning" onclick="controller.editData(event, ${meta.row})">
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
