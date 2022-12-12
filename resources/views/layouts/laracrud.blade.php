
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel AJAX CRUD</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/4.0.0-alpha.5.bootstrap-flex.min.css">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>

<body style="margin-top: 60px" class="container">


    <div class="container">

        <div class="card card-block">
            <h2 class="card-title">Sales APP
                <small>product display</small>
            </h2>
            {{-- <p class="card-text">Learn how to handle ajax with Laravel and jQuery.</p> --}}
            <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Link</button>
        </div>

        <div>
            <table class="table table-inverse">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Link</th>
                    <th>Description</th>
                    <th>Edit or Delete</th>
                </tr>
                </thead>
                <tbody id="links-list" name="links-list">
                @foreach ($links as $link)
                    <tr id="link{{$link->id}}">
                        <td>{{$link->id}}</td>
                        <td>{{$link->url}}</td>
                        <td>{{$link->description}}</td>
                        <td>
                            <button class="btn btn-info open-modal" value="{{$link->id}}">Edit
                            </button>
                            <button class="btn btn-danger delete-link" value="{{$link->id}}">Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="linkEditorModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="linkEditorModalLabel">Link Editor</h4>
                        </div>
                        <div class="modal-body">
                            <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label for="inputLink" class="col-sm-2 control-label">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="link" name="link"
                                               placeholder="Enter URL" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="description" name="description"
                                               placeholder="Enter Link Description" value="">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                            </button>
                            <input type="hidden" id="link_id" name="link_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- @endsection --}}
<script>
    < script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" >
    <script src="js/3.1.1.jquery.min.js"></script>
<script src="js/1.3.7.tether.min.js"></script>
<script src="js/4.0.0-alpha.5.bootstrap.min.js"></script>
<script src="js/laracrud.js"></script>
</script>

</script>
<script type="text/javascript">
jQuery(document).ready(function($){
    ////----- Open the modal to CREATE a link -----////
    jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#modalFormData').trigger("reset");
        jQuery('#linkEditorModal').modal('show');
    });

    ////----- Open the modal to UPDATE a link -----////
    jQuery('body').on('click', '.open-modal', function () {
        var link_id = $(this).val();
        $.get('links/' + link_id, function (data) {
            jQuery('#link_id').val(data.id);
            jQuery('#link').val(data.url);
            jQuery('#description').val(data.description);
            jQuery('#btn-save').val("update");
            jQuery('#linkEditorModal').modal('show');
        })
    });

    // Clicking the save button on the open modal for both CREATE and UPDATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            url: jQuery('#link').val(),
            description: jQuery('#description').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var link_id = jQuery('#link_id').val();
        var ajaxurl = 'links';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'links/' + link_id;
        }
        $.ajax({
            type: type,
            url: '/',
            data: formData,
            dataType: 'json',
            success: function (data) {
                var link = '' + data.id + '' + data.url + '' + data.description + '';
                link += 'Edit ';
                link += 'Delete';
                if (state == "add") {
                    jQuery('#links-list').append(link);
                } else {
                    $("#link" + link_id).replaceWith(link);
                }
                jQuery('#modalFormData').trigger("reset");
                jQuery('#linkEditorModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    ////----- DELETE a link and remove from the page -----////
    jQuery('.delete-link').click(function () {
        var link_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: 'links/' + link_id,
            success: function (data) {
                console.log(data);
                $("#link" + link_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});

</script>
