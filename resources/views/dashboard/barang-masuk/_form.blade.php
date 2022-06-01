<div class="box-body">
    <div class="row">
        
            
        
        
        <div class="col-sm-6 col-md-6">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('image', 'Gambar Produk*') !!}
                    {!! Form::file('image', $errors->has('image') ? ['class'=>'form-control is-invalid','accept'=>"image/*"] : ['class'=>'form-control','accept'=>"image/png, image/*"]) !!}
                    {!! $errors->first('image', '<p class="help-block invalid-feedback">:message</p>') !!}
                    
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('id_supplyer', 'Supplyer*') !!}
                    {!! Form::select('id_supplyer[]', $supplyer,[], array('class' => 'form-control')) !!}
                    {!! $errors->first('id_supplyer', '<p class="help-block invalid-feedback">:message</p>') !!} 
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('nama', 'Nama*') !!}
                    {!! Form::text('nama', @$barang->nama, $errors->has('nama') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('nama', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('harga_jual_satuan', 'Harga Jual') !!}
                    {!! Form::text('harga_jual_satuan', @$barang->harga_jual_satuan, $errors->has('harga_jual_satuan') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('harga_jual_satuan', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('stok', 'Stok*') !!}
                    {!! Form::text('stok', @$barang->harga_jual_satuan, $errors->has('stok') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('stok', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('kategori_id', 'Kategori*') !!}
                    {!! Form::select('kategori_id[]', $kategori,[], array('class' => 'form-control')) !!}
                    {!! $errors->first('kategori_id', '<p class="help-block invalid-feedback">:message</p>') !!} 
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('harga_beli_satuan', 'Harga Beli Satuan*') !!}
                    {!! Form::text('harga_beli_satuan', @$barang->harga_beli_satuan, $errors->has('harga_beli_satuan') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('harga_beli_satuan', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('kadaluarsa', 'Tanggal Kadaluarsa') !!}
                    {!! Form::text('kadaluarsa',@$webinar->kadaluarsa ,$errors->has('kadaluarsa') ? ['class'=>'form-control is-invalid datepicker','value'=>''] : ['class'=>'form-control datepicker','value'=>'']) !!}
                    {!! $errors->first('kadaluarsa', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('discount', 'Discount') !!} <p class="blockquote-footer font-italic">(tekan <mark>[Shift]</mark>/<mark>[Ctrl+alt]</mark> untuk memilih lebih dari satu)</p>
                
                    {!! Form::select('discount[]', $discount,[], array('class' => 'form-control ','multiple')) !!}
                    {!! $errors->first('discount', '<p class="help-block invalid-feedback">:message</p>') !!} 
                </div>
            </div>
            
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                
                    
                
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer pt-3">
    {!! Form::submit(isset($moderator) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block w-100 ', 'id' => 'save']) !!}
</div>
