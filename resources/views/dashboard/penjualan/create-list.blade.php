@extends('layouts.dashboard')
@section('plugins.DateRangePicker', true)
@push('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
@endpush
@section('content')
    <section class="container">
        <div class="row pt-4">
            
        </div>
        <div class="row pt-3">
            <div class="col-8">
                <div class="row p-0 m-0">
                
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Scan QR</h3>
                            </div>
                            <div class="card-body">
                                @include('dashboard.penjualan.barcode-scaner')
                            </div>
                        </div>
                    </div>
                    <div class="col-12"> 
                        @include('layouts.flash')
                        <div class="card ">
                            
                            <div class="card-header">
                                <h3 class="card-title">Aplikasi Penjualan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {!! Form::open(['route' => 'admin.aplikasi-penjualan.store', 'method' => 'post', 'autocomplete' => 'false','enctype'=>'multipart/form-data']) !!}
                                @include('dashboard.penjualan._form')
                                {!! Form::close() !!}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
           </div>
            
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Keranjang Belanja</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.aplikasi-penjualan.store', 'method' => 'post', 'autocomplete' => 'false','enctype'=>'multipart/form-data']) !!}
                        @include('dashboard.penjualan.cart')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
           
            $('.kategori').change(function(){
                var id = $(this).val();
                var url = '{{ route("admin.getDetails", ":id") }}';
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        var len = 0;
                        if (response.data != null) {
                            len = response.data.length;
                        }
                        $(".barang").empty();
                        $("#datalistOptions").empty();
                        $(".barang").append('<option value="0">Please Select</option>');
                        if (len>0) {
                            for (var i = 0; i<len; i++) {
                                var id = response.data[i].id;
                                var name = response.data[i].nama;
                                var barcode = response.data[i].kode;
                                var option = "<option value='"+id+"'>"+name+"</option>"; 
                                var datalist = "<option value='"+barcode+"'>";
                                $("#datalistOptions").append(datalist);
                                $(".barang").append(option);
                            }
                        }
                        
                        

                    }
                });
            });
            $(".barang").change(function(){
                            var id = $(".barang").val();
                            var url = '{{ route("admin.getDiscount", ":id") }}';
                            url = url.replace(':id', id);
                            
                            $.ajax({
                                url: url,
                                type: 'get',
                                dataType: 'json',
                                success: function(response){
                                    var len = 0;
                                    console.log(response);
                                    
                                    if(response != null){
                                        $("#nama").val(response.data.nama);
                                        $("#harga_jual_satuan").val(response.data.harga_jual_satuan);
                                        $("#stok").val(response.data.stok);
                                        $("#harga_beli_satuan").val(response.data.harga_beli_satuan);
                                        $("#kadaluarsa").val(response.data.kadaluarsa);
                                        $("#discount").val(response.data.discount);
                                    }

                                    
                                }
                            });
                        });
                        $("#exampleDataList").on('keypress',function(e){
                            if(e.which == 13) {
                                var id = $("#exampleDataList").val();
                                var url = '{{ route("admin.datalist", ":id") }}';
                                url = url.replace(':id', id);
                                
                                $.ajax({
                                    url: url,
                                    type: 'get',
                                    dataType: 'json',
                                    success: function(response){
                                        var len = 0;
                                        console.log(response);
                                        
                                        if(response != null){
                                            $("#nama").val(response.data.nama);
                                            $("#harga_jual_satuan").val(response.data.harga_jual_satuan);
                                            $("#stok").val(response.data.stok);
                                            $("#harga_beli_satuan").val(response.data.harga_beli_satuan);
                                            $("#kadaluarsa").val(response.data.kadaluarsa);
                                            $("#discount").val(response.data.discount);
                                        }

                                        
                                    }
                                });
                            }
                        });
        });
        
            
            
            
        
        
    </script>
@endpush
