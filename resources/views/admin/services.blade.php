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
                    <button class="btn   btn-success" data-toggle="modal" data-target="#addModal ">Add Services</button>


                </div>




                <div class="card-body table-responsive p-0">
                    <table class="table table-striped  table-valign-middle mt-4">
                        {{-- table-valign-middle mt-4 --}}
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Icon</th>
                                <th>Description</th>
                             
                            </tr>
                        </thead>
                        <tbody>


                            <tr>
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
                                <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Title</label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp"
                                            id="title" name="title">

                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Icon</label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp"
                                            id="icon" name="icon" placeholder=" Fontawesome icon class name">

                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Description</label>
                                        <textarea class="form-control" id="about" aria-label="With textarea" name="description"></textarea>
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
                                <h5 class="modal-title" id="exampleModalLabel">Edit Services</h5>
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
                                    <label for="exampleInputEmail1" class="form-label">Icon</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp"
                                        id="edit-icon" name="icon" placeholder=" Fontawesome icon class name">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Description</label>
                                    <textarea class="form-control" aria-label="With textarea" name="description" id="edit-description"></textarea>
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
                                <h5 class="modal-title" id="exampleModalLabel">Delete Services</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <input type="hidden" id="deleteDataId" name="id">

                                <h4>Are you sure want to delete this data</h4>
                                <button type="button" class="btn btn-secondary " data-dismiss="modal">No</button>
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
                    url: "{{ route('services.list') }}",

                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        console.log("AJAX request is being sent to /admin-company.");

                        $('tbody').html('');
                        let count = 1;
                        $.each(response.services, function(key, item) {
                            $('tbody').append('<tr>\
                        <td>' + count++ + '</td>\
                        <td>' + item.title + '</td>\
                        <td> <i class="' + item.icon + '"></i> </td>\
                        <td>' + item.description + '</td>\
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
                    url: "/services-edit/" + id,
                    success: function(response) {

                        if (response.status == 404) {
                            $('#success').html('');
                            $('#success').addClass('alert alert-danger');
                            $('#success').text(response.message);

                        } else {

                            $('#edit-title').val(response.services.title);
                            $('#edit-icon').val(response.services.icon);
                            $('#edit-description').val(response.services.description);
                           
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
                    'icon': $('#edit-icon').val(),
                    'description': $('#edit-description').val(),
                    

                }
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/services-update/" + id,
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
                    url: "/services-delete/" + id,
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
                    'icon': $('#icon').val(),
                    'description': $('#about').val(),
                    
                }
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/services-store",
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
