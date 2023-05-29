@extends('layouts.home')

@section('tatle', 'Create Post News')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        {{-- <div class="page-header">
            <h3 class="page-title"> Edit Form PostNews </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form PostNews</li>
                </ol>
            </nav>
        </div> --}}
        <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit PostNews </h4>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li> {{ $error }}</li>

                                @endforeach


                            </ul>

                        </div>


                        @endif


                        <form method="post" action="{{ route('posts.update', $post->id) }}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" id="exampleInputUsername2" placeholder="Title" value="{{ $post->title }}" require>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlSelect3" class="col-sm-3 col-form-label">type postnews</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" name="category_id" id="exampleFormControlSelect3" require>
                                        <option selected>เลือกประเภทข่าว</option>
                                        @if (count($category) > 0)
                                        @foreach($category as $cat_row)
                                        <option @selected( $post->category_id == $cat_row->id ) value="{{ $cat_row->id }}">{{ $cat_row->name }}</option>

                                        @endforeach

                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">File upload</label>
                                <div class="col-sm-9">
                                    <input type="file" name="file" class="form-control file-upload-info" require>
                                     <label for="exampleInputEmail2" class="col-sm-12 col-form-label">{{ $post->gallery->image }}</label> 
                                    <img src="{{ asset('/images/posts').'/'. $post->gallery->image }}" alt="images" width="150px">
                                </div>
                                
                            </div>

                            <div class="form-group row">
                                <label for="exampleTextarea1" class="col-sm-3 col-form-label">content</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="content" id="summernote" require> {{ $post->content }} </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleFormControlSelect3" class="col-sm-3 col-form-label"> Published</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" name="publish" id="exampleFormControlSelect3" require>
                                        <option selected>เลือกสถานะข่าว</option>
                                       
                                        <option @selected( $post->publish == 1) value="1">แสดง</option>
                                        <option @selected( $post->publish == 2) value="2">ไม่แสดง</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row text-center">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-gradient-primary mr-2">Save</button>
                                    <a href="{{ route('posts.index') }}" class="btn btn-light">Cancel</a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection

@section('scripts')

<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 400
        });

    });
</script>

@endsection