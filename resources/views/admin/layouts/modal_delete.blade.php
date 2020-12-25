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
