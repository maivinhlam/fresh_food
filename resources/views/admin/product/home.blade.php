@extends('admin.layouts.common')
@section('myCSS')
<style>
    .swal2-icon.swal2-warning {
        border-color: #facea8;
        color: #f8bb86;
    }

    .swal2-icon {
        position: relative;
        box-sizing: content-box;
        justify-content: center;
        width: 5em;
        height: 5em;
        margin: 1.25em auto 1.875em;
        border: .25em solid transparent;
        border-radius: 50%;
        font-family: inherit;
        line-height: 5em;
        cursor: default;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .swal2-icon .swal2-icon-content {
        display: flex;
        align-items: center;
        font-size: 3.75em;
    }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
@section('content')

<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product</h3>

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
                             data-target="#modalEdit" data-title="Create Product" data-url="{{ route('products.store')}}" >
                            <i class="fa fa-plus-circle"></i>
                            Create
                        </button>

                        <a href="{{route('products.index')}}" title="refresh table for users" class="btn btn-primary" data-trigger-pjax="1" data-pjax-target="#user-grid">
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
                        <th scope="col" style="width: 1%"></th>
                        <th scope="col" style="width: 20%">
                            name
                        </th>
                        <th scope="col" style="width: 10%">
                            price
                        </th>

                        <th scope="col" style="width: 30%">
                            description
                        </th>
                        <th scope="col" style="width: 9%">
                            Image
                        </th>
                        <th scope="col" style="width: 10%">

                        </th>
                        <th scope="col" style="width: 7%">
                        </th>
                        <th scope="col" style="width: 13%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row" class="p-1 d-flex justify-content-center align-items-center">
                                <?php
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $perPage = isset($_GET['perPage']) ? $_GET['perPage'] : 1;
                                ?>
                                {{ (($page -1) * count($products)) + ($loop->index + 1) }}
                            </th>
                            <td>
                                <a href="#">
                                    {{ $product->name }}
                                </a>
                                <br />
                                <small>
                                    <i>Created: {{ $product->created_at }}</i>
                                    <br>
                                    <i>Creator Id: {{ $product->creator_id }}</i>
                                </small>
                            </td>
                            <td>
                                <small>
                                    Price: {{ number_format($product->price, 0, ',', '.' ) }} đ
                                    <br>
                                    Sell Percen: {{ $product->sell_percen }}%
                            </td>
                            <td class="" >
                                {{ $product->description }}
                            </td>
                            <td class="">
                                <img src="{{ $product->image_path }}" alt="{{ $product->name }}" height="80px">
                            </td>
                            <td class="">
                                <small>
                                    Amount: {{ number_format($product->amount, 0, ',', '.') }}

                                    <br>
                                    View Count: {{ number_format($product->view_count, 0, ',', '.') }}
                                </small>
                            </td>
                            <td>
                                <small>
                                    Type: {{ number_format($product->type_id) }}

                                    <br>
                                    Brand: {{ number_format($product->brand_id) }}
                                </small>
                            </td>
                            <td class="project-actions p-0 text-center">
                                <div class="">
                                    {{-- <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a> --}}
                                    <button type="button" class="btn btn-info btn-sm mb-1" data-type="edit" data-toggle="modal" data-target="#modalEdit"
                                        data-title="Edit Product"
                                        data-type_id="{{ $product->type_id }}"
                                        data-brand_id="{{ $product->brand_id }}"
                                        data-name="{{ $product->name }}"
                                        data-price="{{ $product->price }}"
                                        data-sell_percen="{{ $product->sell_percen }}"
                                        data-amount="{{ $product->amount }}"
                                        data-description="{{ $product->description }}"
                                        data-image_path="{{ $product->image_path }}"
                                        data-view_count="{{ $product->view_count }}"
                                        data-url="{{ route('products.update', $product->id) }}"
                                        >
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </button>
                                    <button id="btn_delete" type="button" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#modalDelete" data-title="Delete Product"
                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-url="{{ route('products.destroy', $product->id) }}">
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
                {{ $products->onEachSide(1)->links() }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="" id="formDelete">
                    @method('DELETE')
                    @csrf
                    <div class="form-group d-flex flex-column text-center">
                        <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                            <div class="swal2-icon-content">!</div>
                        </div>
                        <label for="recipient-name" class="control-label display-4">Are you sure?</label>
                        <label for="recipient-name" class="control-label">You won't be able to revert this!</label>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary" value="Delete">Yes, delete it!</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="formProduct">
                    {{-- @method('PUT') --}}
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="type_id" class="control-label">Product Type:</label>
                            <a href="#" type="button" class="badge badge-primary"><i class="fa fa-plus-circle"></i>&nbsp; Add</a>
                            <select class="form-control" id="product_type" name="type">
                            @foreach($producrtypes as $producrtype)
                                <option value="{{$producrtype->id}}">{{$producrtype->name}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sell_percen" class="control-label">Brand:</label>
                            <a href="#" type="button" class="badge badge-primary"><i class="fa fa-plus-circle"></i>&nbsp; Add</a>
                            <select class="form-control" id="brand" name="brand">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{$brand->name}}</option>
                            @endforeach
                              </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Product Name:</label>
                        <input type="text" class="form-control" id="product_name" name="name">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price" class="control-label">Price:</label>
                            <input type="number" class="form-control" id="price" name="price" value="1" step="100000" min="0" max="1000000000">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sell_percen" class="control-label">Sell Percen:</label>
                            <input type="number" class="form-control mousewheel_increment" id="sell_percen" name="sell_percen" min="0" max="100" step="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="control-label">Amount:</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="1" step="10" min="0" max="1000000000">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                        <label for="description" class="control-label">Description:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image_path" class="control-label">Image:</label>
                        <input type="text" class="form-control" id="image_path" name="image_path">
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
        var name = button.data('name'); // Extract info from data-* attributes
        var title = button.data('title');
        var url = button.data('url');
        $('#formDelete').attr('action', url);
    });

    $('#modalEdit').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var type =  button.data('type');
        var url = button.data('url');
        if(type == 'edit') {
            var title = button.data('title');
            var type_id = button.data('type_id');
            var brand_id = button.data('brand_id');
            var name = button.data('name');
            var price = button.data('price');
            var sell_percen = button.data('sell_percen');
            var amount = button.data('amount');
            var description = button.data('description');
            var image_path = button.data('image_path');
            var view_count = button.data('view_count');
            var title = button.data('title');
            console.log(type_id);
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.modal-title').text(title);
            modal.find('.modal-body #product_type').val(type_id);
            modal.find('.modal-body #brand').val(brand_id);
            modal.find('.modal-body #product_name').val(name);
            modal.find('.modal-body #price').val(price);
            modal.find('.modal-body #sell_percen').val(sell_percen);

            modal.find('.modal-body #amount').val(amount);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #image_path').val(image_path);
            modal.find('.modal-body #view_count').val(view_count);

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
