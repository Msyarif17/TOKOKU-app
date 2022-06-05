<div class="box-body">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('nama', 'Nama Penerima') !!}
                    {!! Form::text('nama', '', $errors->has('nama') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('nama', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('alamat', 'Alamat') !!}
                    {!! Form::text('alamat', '', $errors->has('alamat') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('alamat', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('nomor_telepon', 'Nomor Telepon') !!}
                    {!! Form::text('nomor_telepon', '', $errors->has('nomor_telepon') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('nomor_telepon', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('pengirim', 'Pengirim') !!}
                    {!! Form::select('pengirim[]', $pengirim,[], array('class' => 'form-control')) !!}
                    {!! $errors->first('pengirim', '<p class="help-block invalid-feedback">:message</p>') !!} 
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('transportasi', 'Transportasi') !!}
                    {!! Form::select('transportasi[]', $transportasi,[], array('class' => 'form-control')) !!}
                    {!! $errors->first('transportasi', '<p class="help-block invalid-feedback">:message</p>') !!} 
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('staf', 'staf') !!}
                    {!! Form::text('staf', @$barang->staf, $errors->has('staf') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control datepicker']) !!}
                    {!! $errors->first('staf', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('discount', 'Discount') !!}
                    {!! Form::select('discount[]', $discount,[], array('class' => 'form-control','multiple')) !!}
                    {!! $errors->first('discount', '<p class="help-block invalid-feedback">:message</p>') !!} 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($barang) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
