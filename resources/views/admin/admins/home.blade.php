@extends('admin.layouts.common')
@section('myCSS')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
@section('content')

<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>

        <div class="card-body p-0">
            {{-- search --}}
            <div class="row p-3">
                <div class="col-md-6">
                    <form method="GET" id="search-user-grid" action="http://laravel-grid.herokuapp.com/users">
                        <div class="input-group mb-12">
                            <input type="text" class="form-control" name="q" placeholder="search users by their name,email ..." value="" required="required" aria-label="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="float-right">
                        <button type="button" href="#" title="add new user" data-type="create" class="btn btn-success show_modal_form" data-toggle="modal"
                             data-target="#modalEdit" data-title="Create" data-url="{{ route('admins.store')}}" >
                            <i class="fa fa-plus-circle"></i>
                            Create
                        </button>

                        <a href="{{route('admins.index')}}" title="refresh table for users" class="btn btn-primary" data-trigger-pjax="1" data-pjax-target="#user-grid">
                            <i class="fa fa-refresh"></i>
                            Refresh
                        </a>

                        <div class="btn-group pull-right grid-export-button" role="group" title="export data">
                            <button id="export-button" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-download"></i>&nbsp;Export
                            </button>
                            <div class="dropdown-menu" aria-labelledby="export-button">
                                <a href="http://laravel-grid.herokuapp.com/users?_pjax=%23user-grid&amp;export=xlsx" class="dropdown-item" title="export to excel" aria-labelledby="xlsx">
                                    <i class="fa fa-file-excel-o"></i>&nbsp;excel
                                </a>
                                <a href="http://laravel-grid.herokuapp.com/users?_pjax=%23user-grid&amp;export=csv" class="dropdown-item" title="export to csv" aria-labelledby="csv">
                                    <i class="fa fa-file"></i>&nbsp;csv
                                </a>
                                <a href="http://laravel-grid.herokuapp.com/users?_pjax=%23user-grid&amp;export=pdf" class="dropdown-item" title="export to pdf" aria-labelledby="pdf">
                                    <i class="fa fa-file-pdf-o"></i>&nbsp;pdf
                                </a>
                                <a href="http://laravel-grid.herokuapp.com/users?_pjax=%23user-grid&amp;export=html" class="dropdown-item" title="export to html" aria-labelledby="html">
                                    <i class="fa fa-html5"></i>&nbsp;html
                                </a>
                                <a href="http://laravel-grid.herokuapp.com/users?_pjax=%23user-grid&amp;export=json" class="dropdown-item" title="export to json" aria-labelledby="json">
                                    <i class="fa fa-file-o"></i>&nbsp;json
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th scope="col" style="width: 4%"></th>
                        <th scope="col" style="width: 25%">
                            Name
                        </th>
                        <th scope="col" style="width: 21%">
                            Email
                        </th>
                        <th scope="col" style="width: 15%">
                            Role
                        </th>
                        <th scope="col" style="width: 15%">
                            Phone
                        </th>
                        <th scope="col" style="width: 20%">
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <th scope="row" class="p-1 d-flex justify-content-center align-items-center">
                                <?php
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $perPage = isset($_GET['perPage']) ? $_GET['perPage'] : 1;
                                ?>
                                {{ (($page -1) * count($admins)) + ($loop->index + 1) }}
                            </th>
                            <td>
                                <a href="#">
                                    {{ $admin->name }}
                                </a>
                            </td>
                            <td class="" >
                                {{ $admin->email }}
                            </td>
                            <td class="">
                                {{ $admin->role_name }}
                            </td>
                            <td class="">
                                {{ $admin->phone }}
                            </td>
                            <td class="project-actions p-0 text-center">
                                <div class="">
                                    {{-- <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a> --}}

                                    <button type="button" class="btn btn-info btn-sm mb-1" data-type="edit" data-toggle="modal" data-target="#modalEdit"
                                        data-title="Edit"
                                        data-name="{{ $admin->link }}"
                                        data-image="{{ $admin->image }}"
                                        data-url="{{ route('admins.update', $admin->id) }}"
                                        >
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </button>

                                    <button id="btn_delete" type="button" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#modalDelete"
                                        data-title="Delete"
                                        data-name="{{ $admin->link }}"
                                        data-image="{{ $admin->image }}"
                                        data-url="{{ route('admins.destroy', $admin->id) }}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                        </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $admins->onEachSide(1)->links() }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>

@include('admin.layouts.modal_delete')
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="formProduct" enctype="multipart/form-data">
                    {{-- @method('PUT') --}}
                    @csrf
                    <div class="form-group">
                        <label for="admin_name" class="control-label">Link:</label>
                        <input type="text" class="form-control" id="admin_name" name="link">
                    </div>

                    <div class="form-group">
                        <label for="price" class="control-label">Image Link:</label>
                        <input type="text" class="form-control" id="admin_name" name="image_link">
                    </div>
                    <div class="form-group">
                        <label for="image_path" class="control-label">Image Path:</label>
                        <input type="file" class="form-control mousewheel_increment" id="image_path" name="image_path">
                    </div>

                    <div class="float-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-times"></i>&nbsp; Close</button>
                        <button type="submit" class="btn btn-success">
                            <i class="far fa-save"></i>&nbsp; Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

@section('myscript')

<script>
    $('#modalDelete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var link = button.data('link'); // Extract info from data-* attributes
        var image = button.data('image');
        var url = button.data('url');
        $('#formDelete').attr('action', url);
    });

    $('#modalEdit').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var type =  button.data('type');
        var url = button.data('url');
        if(type == 'edit') {
            var title = button.data('title');

            var link = button.data('link');
            var image = button.data('image');

            var modal = $(this);
            modal.find('.modal-title').text(title);
            modal.find('.modal-body #link').val(link);
            modal.find('.modal-body #image').val(image);

            $('#formProduct').attr('action', url);
            $('.modal-header').addClass('bg-info').removeClass('bg-success');
            var methodPUT = "<input type='hidden' name='_method' value='PUT' id='methodPUT'>";
            $('#formProduct').append(methodPUT);
        } else {
            $('.modal-header').addClass('bg-success').removeClass('bg-info');
            var title = button.data('title');
            var modal = $(this);
            modal.find('.modal-title').text(title);
            $('#formProduct').attr('action', url);
            $('#formProduct').find('#methodPUT').val('POST');
        }
    })



</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@if (Session::has('success'))
    <script>
        toastr["success"]("{{Session::get('success')}}", "Success")

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
    </script>
@endif
@endsection
