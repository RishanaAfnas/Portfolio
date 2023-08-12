@extends('admin.layout.master')
@section('content')
    <!-- resources/views/product/index.blade.php -->
    @if (session('success'))
        <div id="success" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Your other page content goes here -->


    <div class="content-header">
        <div class="container-fluid">
            <div id="success"></div>
            <div class="row mb-2">

                <div class="col-sm-6 mt-3">
                    <button class="btn   btn-success" data-toggle="modal" data-target="#addModal ">Add Details</button>


                </div>




                <div class="card-body table-responsive p-0">
                    <table class="table table-striped  table-valign-middle mt-4">
                        {{-- table-valign-middle mt-4 --}}
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Sub Title</th>

                            </tr>
                        </thead>
                        <tbody>


                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><button type="button" value="" class="btn  editbtn btn-sm"><i
                                            class="fas fa-edit"></i></button>
                                </td>
                                <td> <i class="fa fa-trash"></i> </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('about.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Title</label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp"
                                            id="title" name="title">

                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Description</label>
                                        <textarea class="form-control" id="about" aria-label="With textarea" name="description"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Sub title</label>
                                        <input type="text" class="form-control" id="subtitle"
                                            aria-describedby="emailHelp" name="subtitle">

                                    </div>

                                    <button type="submit" class="btn btn-primary addbtn">Save</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <input type="hidden" id="dataid" name="id">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Title</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" id="edit-title"
                                        name="title">

                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Description</label>
                                    <textarea class="form-control" aria-label="With textarea" name="description" id="edit-description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Sub title</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp"
                                        id="edit-subtitle" name="subtitle">

                                </div>

                                <button type="submit" class="btn btn-primary updateBtn">Update</button>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <input type="hidden" id="deleteDataId" name="id">

                                <h4>Are you sure want to delete this data</h4>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary deleteConfirmBtn">Yes Delete</button>

                            </div>

                        </div>
                    </div>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    {{-- <script type="text/javascript">
      setTimeout(() => {
      let get = document.getElementById('success');
      get.style.display = 'none';
      }, 5000);
      </script> --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {


            fetchData();

            function fetchData() {
                console.log("fetchData() function is called.");

                $.ajax({
                    type: "GET",
                    url: "{{ route('company.list') }}",

                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        console.log("AJAX request is being sent to /admin-company.");

                        $('tbody').html('');
                        let count = 1;
                        $.each(response.detail, function(key, item) {
                            $('tbody').append('<tr>\
                        <td>' + count++ + '</td>\
                        <td>' + item.title + '</td>\
                        <td>' + item.description + '</td>\
                        <td>' + item.subtitle + '</td>\
                        <td><button type="button" value="' + item.id + '" class="btn  editbtn btn-sm"><i class="fas fa-edit"></i></button>\
                        </td>\
                        <td> <button type="button" value="' + item.id + '" class="btn  deletebtn btn-sm"><i class="fa fa-trash"></i></button> </td>\
                      </tr>')
                        });
                    }


                });
            }

            $(document).on('click', '.editbtn', function(e) {
                e.preventDefault();
                var id = $(this).val();
                console.log(id);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/admin-edit/" + id,
                    success: function(response) {

                        if (response.status == 404) {
                            $('#success').html('');
                            $('#success').addClass('alert alert-danger');
                            $('#success').text(response.message);

                        } else {

                            $('#edit-title').val(response.details.title);
                            $('#edit-description').val(response.details.description);
                            $('#edit-subtitle').val(response.details.subtitle);
                            $('#dataid').val(id);


                        }
                    }

                });
            });
            $(document).on('click', '.updateBtn', function(e) {
                e.preventDefault();
                var id = $('#dataid').val();
                console.log(id);
                var data = {
                    'title': $('#edit-title').val(),
                    'description': $('#edit-description').val(),
                    'subtitle': $('#edit-subtitle').val(),

                }
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/admin-update/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 404) {

                            $('#success').html('');
                            $('#success').addClass('alert alert-danger');
                            $('#success').text(response.message);
                            // Hide the success message after 3 seconds (adjust as needed)

                        } else {
                            console.log("res");

                            $('#success').html('');
                            $('#success').addClass("alert alert-success");
                            $('#success').text(response.message);
                            setTimeout(function() {
                                $('#success').hide();
                            }, 3000);


                            $('#editModal').modal('hide');
                            $('#editModal').find('input').val('');
                            fetchData();

                        }
                    }

                });
            });
            $(document).on('click', '.deletebtn', function(e) {
                e.preventDefault();
                var id = $(this).val();
                console.log(id);
                $('#deleteDataId').val(id);
                $('#deleteModal').modal('show');
            });
            $(document).on('click', '.deleteConfirmBtn', function(e) {
                e.preventDefault();
                var id = $('#deleteDataId').val();
                console.log(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: "/admin-delete/" + id,
                    success: function(response) {
                        console.log(response);
                        $('#success').addClass("alert alert-success");
                        $('#success').text(response.message);
                        setTimeout(function() {
                            $('#success').hide();
                        }, 3000);
                        $("#deleteModal").modal('hide');
                        fetchData();
                    }
                })
            });


            $(document).on('click', '.addbtn', function(e) {
                e.preventDefault();
                console.log("hello");
                var data = {
                    'title': $('#title').val(),
                    'description': $('#about').val(),
                    'subtitle': $('#subtitle').val(),
                }
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/admin-store",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 200) {
                            $('#success').html('');
                            $('#success').addClass("alert alert-success");
                            $('#success').text(response.message);
                            setTimeout(function() {
                                $('#success').hide();
                            }, 3000);

                            $('#addModal').modal('hide');
                            $('#addModal').find('input').val('');
                            // Clear textarea field if needed
                            $('#about').val('');

                            fetchData()
                        }
                    }

                });



            });




        });
    </script>
@endsection
