@extends('layouts.admin')
@push('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endpush

@section('header', 'transaksi penjualan')

@section('content')

<component id="controller">
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ url('cartPembelian') }}" class="btn btn-secondary ml-3 mt-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        <a href="javascript:location.reload(true)" class="btn btn-success mt-3"><i class="fa fa-undo" aria-hidden="true"></i> Refresh</a>
                    </div>
                </div>
                <div class="container">
                <table class="table table-striped">
                        <div class="thead">
                            <tr class="bg-warning text-center">
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>Unit</th>
                                <th>Qty Stok</th>
                                <th>Harga Beli</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </div>
                        <div class="tbody">
                            <form action="{{ url('data/pembelian') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-2">
                                            <label>Nama Karyawan</label>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="id_karyawan" class="form-control bg-secondary">
                                                <option value="0">.pilih karyawan</option>
                                                @foreach ($data_karyawan as $karyawan)
                                                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama_karyawan }}</option>
                                                @endforeach
                                            </select>        
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-2">
                                            <label>Nama Suplier</label>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="id_suplier" class="form-control bg-secondary">
                                                <option value="0">.pilih suplier</option>
                                                @foreach ($data_suplier as $suplier)
                                                    <option value="{{ $suplier->id }}">{{ $suplier->nama_suplier }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-2">
                                            <label>Status Pembayaran</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" name="status" value="1" required> Tunai 
                                            <input type="radio" name="status" value="0" required class="ml-5"> Kredit
                                        </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>
                                        
                                    @foreach ($data_cart as $cart)
                                    <tr class="text-center">    
                                        <input type="hidden" name="id_barang[]" value="{{ $cart->id_barang }}">
                                        <td>{{ $cart->kode }}</td>
                                        <td>{{ $cart->nama_barang }}</td>
                                        <td>{{ $cart->unit}}</td>
                                        <td >{{ $cart->qty_stok }}</td>
                                        <td>Rp. {{ number_format($cart->harga_beli, 2, ",", ".") }}</td>
                                        <td class="text-left">
                                            <input type="hidden" name="qty[]" value="{{ $cart->qty }}"> {{ $cart->qty }} {{ $cart->unit }}
                                        </td>
                                        <td>
                                            Rp. {{ number_format($total[] = $cart->qty * $cart->harga_beli, 2, ",", ".") }}
                                        </td>
                                    </tr>                           
                                    @endforeach
                                    <tr>
                                        <td colspan="7" align="right">
                                            <hr>
                                            <h3>Sub Total : <span class="text-danger">IDR Rp. {{ number_format(array_sum($total), 2, ",", ".") }}</span> </h3>
                                         </td>
                                    </tr>
                                    <tr class="table-none">
                                        <td colspan="6" align="right">
                                            <button type="submit" class="btn btn-primary">Beli Barang</button>
                                        </td>
                                    </tr>
                                </div>
                            </form>
                        </div>    
                </table>
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
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    {{-- show data --}}
    <script type="text/javascript">
    </script>

    {{-- asset javascript --}}
    <script src="{{ asset('js/data.js') }}"></script>
    
@endpush