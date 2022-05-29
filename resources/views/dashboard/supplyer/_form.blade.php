<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('nama', 'Nama Supplyer') !!}
                {!! Form::text('nama', @$supplyer->nama, $errors->has('nama') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('nama', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('alamat', 'Alamat') !!}
                {!! Form::text('alamat', @$supplyer->alamat, $errors->has('alamat') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('alamat', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('nomor_telepon', 'Nomor Telepon') !!}
                {!! Form::text('nomor_telepon', @$supplyer->nomor_telepon, $errors->has('nomor_telepon') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('nomor_telepon', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($supplyer) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
