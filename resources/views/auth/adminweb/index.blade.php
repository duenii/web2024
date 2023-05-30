@extends('layouts.home');

@section('content')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Form UserAdmin </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th> User </th>
                          <th> First name </th>
                          <th> email </th>                         
                          <th> edit </th>
                          <th> delete </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($user as $row)
                        <tr>
                          <td class="py-1">
                            <img src="../../assets/images/faces-clipart/pic-1.png" alt="image">
                          </td>
                          <td> {{ $row->name }} </td>
                          <td> {{ $row->email }} </td>
                          <td> <button type="button" class="btn btn-inverse-warning btn-fw">edit</button> </td>
                          <td> <button type="button" class="btn btn-inverse-danger btn-fw">delete</button></td>
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
        @endsection