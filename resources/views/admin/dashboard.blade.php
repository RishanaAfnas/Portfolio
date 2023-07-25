@extends('admin.layout.master')
@section('content')
<div class="welcome-container">
  <h1>Welcome, {{ session('adminName') }}!</h1>
  <!-- You can add additional content or messages here -->
</div>
@endsection