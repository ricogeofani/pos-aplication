@extends('layouts.admin')

@push('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('header', 'user setting')
@section('content')
<component id="controller">

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <a href="#" @click="addData()" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Data</a>
                            <a href="javascript:location.reload(true)" class="btn btn-success"><i class="fa fa-undo" aria-hidden="true"></i> Refresh</a>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
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
                        <h4 class="modal-title" id="exampleModalLabel" v-if="!editStatus">User Register</h4>
                        <h4 class="modal-title" id="exampleModalLabel" v-if="editStatus">Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="put" v-if="editStatus">
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <select name="id_karyawan" class="form-control">
                                @foreach ($data_karyawan as $karyawan)
                                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama_karyawan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" :value="data.email" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label>password</label>
                            <input type="password" name="password" :value="data.password" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label>password confirm</label>
                            <input type="password" name="passwordConfirm" class="form-control" required>
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
        var actionUrl = '{{ url('data/user') }}';
        var columns = [
            {data: 'karyawan.nama_karyawan', class: 'text-center', orderable: true},
            {data: 'email', class: 'text-center', orderable: true},
            {data: 'karyawan.jabatan', class: 'text-center', orderable: true},
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
