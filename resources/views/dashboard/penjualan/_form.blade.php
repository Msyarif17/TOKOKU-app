<div class="box-body">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('kategori_id', 'Kategori') !!}
                    {!! Form::select('kategori_id[]', array_merge(['0' => 'Please Select'], $kategori),[], array('class' => 'form-control kategori')) !!}
                    {!! $errors->first('kategori_id', '<p class="help-block invalid-feedback">:message</p>') !!} 
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('id_barang', 'Barang') !!}
                    {!! Form::select('id_barang[]', array_merge(['0' => 'Please Select'],$barang),[], array('class' => 'form-control barang')) !!}
                    {!! $errors->first('id_barang', '<p class="help-block invalid-feedback">:message</p>') !!} 
                </div>
            </div>
        </div>
       
    </div>
    <div class="row">
        
        
        <div class="col-sm-6 col-md-6">
            
            
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('nama', 'Nama') !!}
                    {!! Form::text('nama', @$barang->nama, $errors->has('nama') ? ['readonly','class' => 'form-control is-invalid'] : ['readonly','class' => 'form-control']) !!}
                    {!! $errors->first('nama', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('harga_jual_satuan', 'Harga Jual') !!}
                    {!! Form::text('harga_jual_satuan', @$barang->harga_jual_satuan, $errors->has('harga_jual_satuan') ? ['readonly','class' => 'form-control is-invalid harga_jual_satuan'] : ['readonly','class' => 'form-control harga_jual_satuan']) !!}
                    {!! $errors->first('harga_jual_satuan', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
            
        </div>
        <div class="col-sm-6 col-md-6">
            
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('discount', 'Discount') !!}
                    {!! Form::text('discount', 0, $errors->has('kadaluarsa') ? ['readonly','class' => 'form-control is-invalid'] : ['readonly','class' => 'form-control']) !!}
                    {!! $errors->first('discount', '<p class="help-block invalid-feedback">:message</p>') !!} 
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('stok', 'Stok') !!}
                    {!! Form::text('stok', @$barang->harga_jual_satuan, $errors->has('stok') ? ['readonly','class' => 'form-control is-invalid'] : ['readonly','class' => 'form-control']) !!}
                    {!! $errors->first('stok', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Tambah Ke Keranjang', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
