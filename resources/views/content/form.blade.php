
    <div class="form-floating">
        {{ Form::select('page', $contentPage, $content->page, ['class' => 'form-select mb-5' . ($errors->has('page') ? ' is-invalid' : ''), 'placeholder' => 'Select Page', 'required']) }}
        {{ Form::label('page') }}
        {!! $errors->first('page', '<p class="invalid-feedback">:message</p>') !!}
    </div>
    
    <div class="form-floating">
        {{ Form::select('content_type', $contentType, $content->content_type, ['class' => 'form-select mb-5' . ($errors->has('content_type') ? ' is-invalid' : ''), 'placeholder' => 'Select Content Type', 'required']) }}
        {{ Form::label('content_type') }}
        {!! $errors->first('content_type', '<p class="invalid-feedback">:message</p>') !!}
    </div>

    <div class="form-floating mb-5">
        {{ Form::text('title', $content->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
        {{ Form::label('title') }}
        {!! $errors->first('title', '<p class="invalid-feedback">:message</p>') !!}
    </div>
    
    <div class="form-floating mb-5">
        {{ Form::text('subtitle', $content->subtitle, ['class' => 'form-control' . ($errors->has('subtitle') ? ' is-invalid' : ''), 'placeholder' => 'Subtitle']) }}
        {{ Form::label('subtitle') }}
        {!! $errors->first('subtitle', '<p class="invalid-feedback">:message</p>') !!}
    </div>
    
    <div class="form-floating mb-5">
        {{ Form::text('url', $content->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'URL']) }}
        {{ Form::label('url') }}
        {!! $errors->first('url', '<p class="invalid-feedback">:message</p>') !!}
    </div>

    <div class="form-floating mb-5">
        {{ Form::text('extra', $content->extra, ['class' => 'form-control' . ($errors->has('extra') ? ' is-invalid' : ''), 'placeholder' => 'Extra']) }}
        {{ Form::label('extra') }}
        {!! $errors->first('extra', '<p class="invalid-feedback">:message</p>') !!}
    </div>

    <div class="form-floating mb-5">
        {{ Form::textarea('body', $content->body, ['class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => 'Body']) }}
        {{ Form::label('body') }}
        {!! $errors->first('body', '<p class="invalid-feedback">:message</p>') !!}
    </div>

<div class="form-group mb-5">
    {{ Form::file('file', ['class' => 'form-control' . ($errors->has('file') ? ' is-invalid' : '')]) }}

    @if(!empty($content->file))
        <a href="{{ '/'.$content->file_dir.'/'.$content->file }}" class="btn btn-primary mt-5" target="_blank">{{ $content->file }}</a>
    @endif
    {!! $errors->first('file', '<p class="invalid-feedback">:message</p>') !!}
</div>
{{-- <div class="form-group">
    {{ Form::label('extra') }}
    {{ Form::text('extra', $content->extra, ['class' => 'form-control' . ($errors->has('extra') ? ' is-invalid' : ''), 'placeholder' => 'Extra']) }}
    {!! $errors->first('extra', '<p class="invalid-feedback">:message</p>') !!}
</div> --}}
<div class="form-group" id="gallery-files" style="display: none;">
    {{ Form::label('Files') }}
    {{ Form::file('gallery[]', ['class' => 'form-control mb-3' . ($errors->has('gallery') ? ' is-invalid' : ''), 'multiple']) }}
    {!! $errors->first('gallery', '<p class="invalid-feedback">:message</p>') !!}
    @foreach ($content->contentFiles as $v)
        <div class="btn-group mb-3 mr-3">
            <a href="{{ '/'.$v->file_dir.'/'.$v->file }}" class="btn btn-primary" target="_blank">{{ $v->file }}</a>
            <button class="btn btn-danger btn-delete-content-file" data-id="{{ $v->id }}"><i class="fa fa-times pr-0"></i></button>
        </div>
    @endforeach
</div>
<button type="submit" class="btn btn-primary">Submit</button>
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#content_type').change(function() {
                var contentType = $(this).val();
                if (contentType == 'files') {
                    $('#gallery-files').show();
                } else {
                    $('#gallery-files').hide();
                }
            });
            $('.btn-delete-content-file').click(function (e) { 
                e.preventDefault();

                var id = $(this).data('id');
                var this2 = $(this);

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Tindakan ini tidak bisa diurungkan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Lanjutkan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "get",
                            url: "{{ route('content.destroy-content-file', '') }}/" + id,
                            dataType: "json",
                            success: function (r) {
                                Swal.fire({
                                    icon: 'success',
                                    title: r.message
                                });

                                this2.closest('.btn-group').remove();
                            },
                            error: function (e) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi kesalahan'
                                });
                            },
                        });
                    }
                })
            });
            {!! $content->content_type == 'files' ? "$('#gallery-files').show();" : "$('#gallery-files').hide();" !!}
        });
    </script>
@endsection
