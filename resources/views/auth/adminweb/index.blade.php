@extends('layouts.home')

@section('tatle', 'Create User')
@section('content')

<div class="main-panel">
  <div class="content-wrapper">
      <div class="page-header">
          <h3 class="page-title"> User </h3>
          <nav aria-label="breadcrumb">
              
              <ol class="breadcrumb">
                 
              </ol>
          </nav>
      </div>
      <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body table-responsive">

                      
                       
                        <div class="row">
                          <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                               
                                
                                <table class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th> # </th>
                                      <th> First name </th>
                                      <th> email </th>                         
                                      <th> role </th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($adminweb as $row)
                                    <tr>
                                      <td class="py-1">
                                        {{ $row->id }}
                                      </td>
                                      <td> {{ $row->name }} </td>
                                      <td> {{ $row->email }} </td>
                                      <td>  {{ $row->role_as }} </td>
                                     
                                    </tr> 
                                    @endforeach                  
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            
                          </div>
                         
                        </div>
                        
                     
                  </div>
              </div>
          </div>

      </div>
  </div>

</div>

 @endsection