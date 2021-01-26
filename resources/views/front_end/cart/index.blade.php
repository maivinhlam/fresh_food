@extends('front_end.layouts.common')
@section('myHead')
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="../css/detail-product.css">
@endsection
@section('content')
<table class="table table-striped table-bordered mt-5">
    <thead>
        <tr>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá</th>
            <th scope="col">Tổng</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>

        <tr>
            <td colspan="3">Tổng: </td>
            <td colspan="4" class="text-right">
                <button type="button" class="btn btn-success">Cập nhật giỏ hàng</button>
                <button type="button" class="btn btn-success">Xoá giỏ hàng</button>
                <button type="button" class="btn btn-success">Đặt mua & thanh toán</button>
            </td>
        </tr>
    </tbody>
</table>

<form class="needs-validation my-5" novalidate>
    <div class="font-weight-bold mb-3">Đặt hàng và thanh toán</div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom01">Email</label>
            <input type="email" class="form-control" id="validationCustom01" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6 mb-3">

        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom01">Họ và tên</label>
            <input type="text" class="form-control" id="validationCustom01" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6 mb-3">

        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom01">Điện thoại</label>
            <input type="number" class="form-control" id="validationCustom01" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6 mb-3">

        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom01">Địa chỉ</label>
            <input type="text" class="form-control" id="validationCustom01" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6 mb-3">

        </div>
    </div>

    <button class="btn btn-primary" type="submit">Submit form</button>
</form>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection

@section('myscript')

@endsection
