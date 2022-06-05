@extends('layouts.dashboard')
@section('content')
    <section class="content">
        
        <div class="row">
           
            <div class="col-12"> 
                @include('layouts.flash')
                <div class="card mt-4">
                    
                    <div class="card-header">
                        <h3 class="card-title">Detail Pengiriman</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.aplikasi-penjualan.store', 'method' => 'post', 'autocomplete' => 'false','enctype'=>'multipart/form-data']) !!}
                        @include('dashboard.barang._form-pegiriman')
                        {!! Form::close() !!}
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