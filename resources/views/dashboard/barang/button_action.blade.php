@if ($barang->deleted_at)
    <form action="{{route('admin.barang.destroy',$barang->id)}}" method="post" class="d-inline">
        @method('PATCH')
        @csrf
        <button type="submit" class="btn btn-success btn-flast btn-sm" data-toggle="tootlip" data-placement="top"
                title="restore"><span class="fa fa-undo"></span></button>
    </form>
@else
<div class="container">
    <div class="row">
        <div class="col-6">
            <a href="{{route('admin.barang.edit',$barang->id)}}" class="btn  btn-primary btn-flat btn-sm" data-toggle="tooltip"
                data-placement="top" title="edit"><span class="fa fa-edit"></span></a>
        </div>
        <div class="col-6">
            <form action="{{route('admin.barang.destroy',$barang->id)}}" method="post" class="d-inline"
                onsubmit="return confirm('apakah anda yakin?')">
              @csrf
              <input type="hidden" name="_method" value="delete" />
              <button type="submit" class="btn btn-danger btn-flat btn-sm delete" data-toggle="tooltip"
                      data-placement="top" title="delete"><span class="fa fa-trash"></span></button>
          </form>
        </div>
    </div>
</div>
    
@endif
