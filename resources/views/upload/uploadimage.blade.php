@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Upload Your Image</h1>
        <form name="post-image-form" id="post-image-form" role="form" enctype="multipart/form-data" data-parsley-validate>
{{--            {{csrf_field()}}--}}

            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label>Alt Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Add Title">
            </div>

            <div class="form-group">
                <label>Image:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>


            <div class="form-group">
                <button class="btn btn-success upload-image" type="button">Upload Image</button>
            </div>
            <br/>

            <div class="image-div">
                <span><h1>Your Uploaded Image</h1></span>
                <img id='img-upload'/>
            </div>
        </form>

    </div>

@endsection