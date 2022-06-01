@extends('layouts.dashboard')
@section('plugins.Datatables', true)

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Stok Barang</h3>
                        <div class="float-right">
                            <a href="{{route('admin.barang.create')}}" class="btn btn-success btn-flat btn-sm"
                               title="Tambah"><i class="fa fa-plus"></i> Tambah Barang</a>
                            <a href="{{route('admin.barang.create')}}" class="btn btn-primary btn-flat btn-sm"
                               title="Tambah"><i class="fa fa-barcode"></i> Scan Barcode</a>
                            <a href="{{route('admin.barang.create')}}" class="btn btn-warning btn-flat btn-sm"
                               title="Tambah"><i class="fa fa-print"></i> Print Semua Barcode</a>
                            <a href="{{route('admin.barang.create')}}" class="btn btn-dark btn-flat btn-sm"
                               title="Tambah"><i class="fa fa-print"></i> Print Semua Data</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table id="data" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nama </th>
                                    <th>Barcode</th>
                                    <th>Harga Eceran</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@push('js')
    <script>
        $(function() {
            $('#data').DataTable({
                serverSide: true,
                processing: true,
                searchDelay: 1000,
                ajax: {
                    url: '{{route('admin.barang.index')}}',
                },
                columns: [
                    {data: 'nama'},
                    {data: 'barcode_img'},
                    {data: 'hargaEcer'},
                    {data: 'stok'},
                    
                    {
                        data: 'status', name: 'deleted_at', render: function (datum, type, row) {
                            if (row.status == 'Active') {
                                return `<span class="badge badge-success">${row.status}<span>`;
                            } else {
                                return `<span class="badge badge-danger">${row.status}<span>`;
                            }

                        }
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },

                ]
            });
        });
    </script>
@endpush
