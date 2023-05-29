@extends('layouts.home')

@section('tatle', 'Create Sub About')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Submenu </h3>
           
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('subabouts.create')}}" class="btn btn btn-gradient-success">เพิ่มข้อมูล</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                    @if (count($subabouts) > 0 )

                        {{-- <h4 class="card-title">Table Post About</h4> --}}
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
                                    <th>Main menu</th>
                                    <th>Title Submenu</th>
                                    <th>Link</th>
                                   
                                    <th>Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subabouts as $rowsub)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-secondary"> {{ $rowsub->postabouts->title }}</td>
                                    <td>{{ $rowsub->title }}</td>                                  
                                    <td> 
                                     @if(!$rowsub->link == '')
                                        <a href="{{ $rowsub->link }}" class="btn btn-outline-info btn-sm"> <i class="mdi mdi-link-variant"></i> link</a>
                                     @endif
                                    </td>
                                    
                                    {{-- <td>{{ $rowsub->users->name }}</td> --}}
                                    <td> {{ date('d M Y', strtotime($rowsub->updated_at)) }} </td>
                                    <td>
                                        
                                          <a href="{{ route('subabouts.edit', $rowsub->id) }}" class="btn btn-warning btn-sm ">Edit</a>
                       
                                          <!--<input type="submit" class="btn btn-danger btn-sm" value="DELETE" />-->
                                          <Button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $rowsub->id }}">DELETE</Button>
                  
                                          <!-- Modal -->
                                          <div class="modal" id="modal{{ $rowsub->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 class="modal-title" id="exampleModalLabel">Delete Data</h4>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <h5>ลบข้อมูล </h5><br>
                                                  <p>{{ $rowsub->title }}</p>
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary  btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                  <form method="post" action="{{ route('subabouts.destroy', $rowsub->id) }}">
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

                        {{ $subabouts->links() }}

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