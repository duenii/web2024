@extends('layouts.home')

@section('tatle', 'Create Post News')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> PostNews </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('posts.create')}}" class="btn btn btn-gradient-success">เพิ่มข้อมูล</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                    @if (count($posts) > 0 )

                      
                    @if($message = Session::get('success'))
                            <div class="alert alert-success">
                               <i class="mdi mdi-check icon-md"> </i> {{ $message }}
                            </div>
                        @elseif ($message = Session::get('warning'))
                            <div class="alert alert-warning">
                               <i class="mdi mdi-tooltip-edit icon-md"></i> {{ $message }}
                            </div>

                        @elseif($message = Session::get('danger'))
                            <div class="alert alert-danger">
                                <i class="mdi mdi-delete icon-md"></i> {{ $message }}
                            </div>

                        @endif
          
                       
                        <table class="table table-hover mb-2 table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $rowpost)
                                <tr>
                                    <td>{{ $rowpost->id }}</td>
                                    <td><img src="{{ asset('/images/posts').'/'. $rowpost->gallery->image }}" alt="images"></td>
                                    {{-- <td>{{ $rowpost->title }}</td> --}}
                                    <td>{{ Str::limit($rowpost->title, 30, '...')  }}</td>
                                    <td>{{ $rowpost->category->name }}</td>
                                    <td> {{ $rowpost->publish == 1 ? 'แสดง' : 'ไม่แสดง' }}</td>
                                    <td> {{ date('d M Y', strtotime($rowpost->updated_at)) }} </td>
                                    <td>
                                        
                                          <a href="{{ route('posts.edit', $rowpost->id) }}" class="btn btn-warning btn-sm">Edit</a>
                       
                                          <!--<input type="submit" class="btn btn-danger btn-sm" value="DELETE" />-->
                                          <Button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $rowpost->id }}">DELETE</Button>
                  
                                          <!-- Modal -->
                                          <div class="modal" id="modal{{ $rowpost->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 class="modal-title" id="exampleModalLabel">Delete Data</h4>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <h5>ลบข้อมูล</h5><br>
                                                  <p>{{ $rowpost->title }}</p>
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary  btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                  <form method="post" action="{{ route('posts.destroy', $rowpost->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                  <!--<button type="button" class="btn btn-primary">Delete</button>-->
                                                  <input type="submit" class="btn btn-danger btn-sm" value="DELETE" />
                                                  
                                                                  
                                                </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          
                                    </td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                           
                        </table>
                        {{ $posts->links() }}

                        @else
                        <h3 class="text-center text0"> No post found</h3>


                        @endif
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection


{{-- @section('scripts')

    <!-- datatables script -->
	 <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

      <!-- datatables bootstrap script -->
	 <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

     <!-- datatables bootstrap script -->
	 <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

      <!-- datatables style css -->
	 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">

     <!-- create datatables -->
	  <script type="text/javascript">
        $(document).ready(function(){
             $('#post_table').DataTable();
      });
    </script>
@endsection --}}