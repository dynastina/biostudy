        
        <div class="form-floating">
            {{ Form::text('name', $announcement->name, ['class' => 'form-control mb-3' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name', 'required']) }}
            {{ Form::label('name') }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-floating">
            {{ Form::select('target', $target, $announcement->target, ['class' => 'form-select mb-5' . ($errors->has('target') ? ' is-invalid' : ''), 'placeholder' => 'Select Content Type', 'required']) }}
            {{ Form::label('target') }}
            {!! $errors->first('target', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <button type="submit" class="btn btn-primary mt-5">Submit</button>