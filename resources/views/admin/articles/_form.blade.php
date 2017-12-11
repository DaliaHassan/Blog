<fieldset>
    <legend>Info</legend>
    <div class="form-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Category: </label>
                    <div class="col-md-9">
                        {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control'], ['placeholder' => 'Choose Category']); !!}
                        <div class="error">
                            <span style="color:red">
                                {{ $errors->first('category_id') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Title: </label>
                    <div class="col-md-9">
                        {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                        <div class="error">
                            <span style="color:red">
                                {{ $errors->first('title') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Body: </label>
                        <div class="col-md-9">
                            {!! Form::textarea('body', old('body'), ['class' => 'form-control']) !!}
                            <div class="error">
                                <span style="color:red">
                                    {{ $errors->first('body') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="publish" class="col-md-3 control-label">Publish</label>
                <div class="col-md-6">
                    {!! Form::checkbox('publish', true, old('publish')) !!}
                    <div class="error">
                        <span style="color:red">
                            {{ $errors->first('publish') }}
                        </span>
                    </div>
                </div>
            </div>
    </div>
</fieldset>
