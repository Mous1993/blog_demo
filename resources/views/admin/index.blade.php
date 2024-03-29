@extends('layouts.admin.app')

@section('content')

  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    @include('layouts.admin.sidebar')
    <!-- /#sidebar-wrapper -->
    
    <!-- Page Content -->
    <div id="page-content-wrapper">

      @include('layouts.admin.header')

      <div class="container-fluid">
        <div class="container">
          <h2>Edit Posts</h2>
          <!-- <p>The .table-responsive class creates a responsive table which will scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, there is no difference:</p>                                                                                       -->
          <div class="table-responsive">          
          <table class="table table-dark">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Category</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach($post AS $post)
              <tr>
                <td  class="counterCell">)</td>
                <td><a href="{{route('admin.show',$post->id)}}" style=" text-decoration: none; ">{{ $post->title }}</a></td>
                <td>{{ str_limit( $post->description , $limit = 100, $end = '...') }}</td>
                <td>{{ $post->created_at->format('d M Y')  }}</td>
                <td>{{ $post->category->title }}</td>
                <td>
                <a href="{{ route('admin.edit',$post->id) }}"><i class="icon-edit"></i></a> 
                | 
                <a  href="#" onclick="delete_post()" style="color:red;"><i class="icon-trash"></i></a></td>
              </tr>
              @endforeach

              @include('admin.delete_form')

            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
  @include('layouts.admin.footer')
  
@endsection