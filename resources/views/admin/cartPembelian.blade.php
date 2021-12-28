@extends('layouts.admin')

@push('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('header', 'cart pembelian')
@section('content')
<component id="controller">

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <a href="#" @click="addData()" class="btn btn-primary"><i class="fa fa-plus"></i> Add Barang</a>
                            <a href="javascript:location.reload(true)" class="btn btn-success"><i class="fa fa-undo" aria-hidden="true"></i> Refresh</a>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>kode</th>
                                        <th>Nama Barang</th>
                                        <th>Unit</th>
                                        <th>Qty Stok</th>
                                        <th>Harga Beli</th>
                                        <th>Jumlah/unit</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                            <a href="{{ url('transaksiPembelian') }}" class="btn btn-warning float-right mt-5 mr-5">Checkout</a>
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
                        <h4 class="modal-title" id="exampleModalLabel" v-if="!editStatus">Add Barang</h4>
                        <h4 class="modal-title" id="exampleModalLabel" v-if="editStatus">Edit Barang</h4>
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
                                    <label>Nama Barang</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="id_barang" class="form-control">
                                        <option value="0">.pilih barang</option>
                                        @foreach ($data_barang as $barang)
                                            <option :selected="{{ $barang->id }} == data.id_barang" :value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <label>Jumlah</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" name="qty" class="form-control" :value="data.qty">
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-5" v-if="!editStatus">Tambah</button>
                        <button type="submit" class="btn btn-primary mr-5" v-if="editStatus">Edit</button>
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
        var actionUrl = '{{ url('data/cart') }}';
        var columns = [
            {data: 'barang.kode', class: 'text-center', orderable: true},
            {data: 'barang.nama_barang', class: 'text-center', orderable: true},
            {data: 'barang.unit', class: 'text-center', orderable: true},
            {data: 'barang.qty_stok', class: 'text-center', orderable: true},
            
            {render: function(index, row, data, meta) {
                const harga = data.barang.harga_beli

                const rupiah = (harga)=>{
                    return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                    }).format(harga);
                }
                return rupiah(harga);
            }, orderable: true, class: 'text-center'},


            {data: 'qty', class: 'text-center', orderable: true},
            
            {render: function(index, row, data, meta) {
                const sub_bayar = data.qty * data.barang.harga_beli

                const rupiah = (sub_bayar)=>{
                    return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                    }).format(sub_bayar);
                }
                return rupiah(sub_bayar);
            }, orderable: true, class: 'text-center'},

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
