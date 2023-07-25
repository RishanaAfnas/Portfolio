@extends('admin.layout.master')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 mt-3">
       <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add User</button>
      
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-striped table-valign-middle mt-4">
          <thead>
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Sales</th>
            <th>More</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>
              <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
              Some Product
            </td>
            <td>$13 USD</td>
            <td>
              <small class="text-success mr-1">
                <i class="fas fa-arrow-up"></i>
                12%
              </small>
              12,000 Sold
            </td>
            <td>
              <a href="#" class="text-muted">
                <i class="fas fa-search"></i>
              </a>
            </td>
          </tr>
          <tr>
            <td>
              <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
              Another Product
            </td>
            <td>$29 USD</td>
          
          </tr>
          </tbody>
        </table>
    
    </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection