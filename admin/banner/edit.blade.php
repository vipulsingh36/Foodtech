@extends('admin.layout')
@section('title','Edit Banner Slider')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
@component('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard','Banner Slider'=>'admin/banner']])
    @slot('title') Edit Banner Slider @endslot
    @slot('add_btn')  @endslot
    @slot('active') Edit Banner Slider @endslot
@endcomponent
<!-- Main content -->
<section class="content card">
    <div class="container-fluid card-body">
        <!-- form start -->
        <form class="form-horizontal" id="update_banner"  method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            @if($banner)
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                   <input type="hidden" class="url" value="{{url('admin/banner/'.$banner->id)}}" >
                   <input type="hidden" class="rdt-url" value="{{url('admin/banner')}}" >
                    <!-- jquery validation -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Banner Slider Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Title</span>
                                    </div>
                                    <div class="col-md-10">
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{$banner->title}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <span class="col-md-2">Image</span>
                                <div class="custom-file col-md-7">
                                    <input type="hidden" class="custom-file-input" name="old_img" value="{{$banner->banner_img}}" />
                                    <input type="file" class="custom-file-input" name="img" onChange="readURL(this);">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                                <div class="col-md-3 text-right">
                                    @if($banner->banner_img != '')
                                    <img id="image" src="{{asset('public/banner/'.$banner->banner_img)}}" alt="" width="200px" height="150px">
                                    @else
                                    <img id="image" src="{{asset('public/banner/')}}" alt="" width="80px" height="80px">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Page Link</span>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="page_link" placeholder="Page Link" value="{{$banner->pagelink}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Status</span>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="banner_status"  style="width: 100%;">
                                            <option value="1" {{ ($banner->status == "1" ? "selected":"") }}>Publish</option>
                                            <option value="0" {{ ($banner->status == "0" ? "selected":"") }}>Unpublish</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            @endif
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form> <!-- /.form start -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>
@stop