<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('nama', 'Nama Kategori') !!}
                {!! Form::text('nama', @$kategori->nama, $errors->has('nama') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('nama', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        
        
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($kategori) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
