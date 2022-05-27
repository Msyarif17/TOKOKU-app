@extends('layouts.dashboard')
@section('plugins.Datatables', true)

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                @include('layouts.flash')
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Kategori</h3>
                        <div class="float-right">
                            <a href="{{route('admin.kategori-barang.create')}}" class="btn btn-success btn-flat btn-sm"
                               title="Tambah">Tambah</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table id="data" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kode</th>
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
                    url: '{{route('admin.kategori-barang.index')}}',
                },
                columns: [
                    {data: 'nama'},
                    {data: 'kode'},
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
