<fieldset>
    <legend>Info</legend>
    <div class="form-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Name: </label>
                    <div class="col-md-9">
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                        <div class="error">
                            <span style="color:red">
                                {{ $errors->first('name') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</fieldset>
