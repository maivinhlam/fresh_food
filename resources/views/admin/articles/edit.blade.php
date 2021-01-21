@extends('admin.layouts.common')

@section('content')

<section class="content">

    <form action={{ route('articles.store') }} method="POST">
        @csrf
        <div class="form-group">
            <div id="editor">
            </div>
        </div>
    </form>
    <button type="button" id="save" class="btn btn-primary" data-id="{{ $id }}">Submit</button>
</section>

@endsection

@section('myscript')
<script src="{{ asset("ckeditor/ckeditor.js") }}"></script>
<script>
    CKEDITOR.replace('editor', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
        extraPlugins: 'image2',
        extraPlugins: 'autogrow',
        autoGrow_minHeight: 200,
        autoGrow_bottomSpace: 50,
    });

    jQuery(document).ready(function () {
        jQuery('#save').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var content = CKEDITOR.instances['editor'].getData();

            var id = {{ $id }};
            var url = "{{ route('articles.update', $id) }}";
            jQuery.ajax({
                url: url,
                method: 'PUT',

                data: {
                    id: id,
                    content: content
                },
                success: function (result) {
                    if (result.errors) {
                        jQuery('.alert-danger').html('');

                        jQuery.each(result.errors, function (key, value) {
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<li>' + value + '</li>');
                        });
                    } else {
                        jQuery('.alert-danger').hide();
                        $('#open').hide();
                        $('#modalEdit').modal('hide');

                        toastr["success"](result.success)
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.addClass('is-invalid');
                            el.next().remove();
                            el.after($('<span class="error invalid-feedback">' + error[0] + '</span>'));
                        });
                    }
                }
            });
        });
    });
</script>
@include('ckfinder::setup')


<script>
    jQuery(document).ready(function () {
        var id = {{ $id }};
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "GET",
            url: "{{ route('articles.show', $id) }}",
            data: {
                id: id,
            },
            success: function (msg) {
                CKEDITOR.instances['editor'].setData(msg[0].content);
            }
        });
    });
</script>
@endsection
