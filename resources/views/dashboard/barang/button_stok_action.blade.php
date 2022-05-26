<div class="container">
    <div class="row">
        <div class="col-2">
            <a href="{{route('admin.barang.kurangiStok',$barang->id)}}" class="btn btn-danger btn-flat btn-sm my-auto" data-toggle="tooltip"
                data-placement="top" title="edit"><span class="fa fa-minus"></span></a>   
        </div>
        <div class="col-4">
            <input class="form-control" type="text" name="" value="{{$barang->stok}}"id="" readonly>
        </div>
        <div class="col-2">
            <a href="{{route('admin.barang.tambahStok',$barang->id)}}" class="btn btn-success btn-flat btn-sm my-auto" data-toggle="tooltip"
                data-placement="top" title="edit"><span class="fa fa-plus"></span></a>  
        </div>
    </div>
</div>