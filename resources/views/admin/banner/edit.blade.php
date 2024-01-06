@extends('master.admin')
@section('title', 'Edit Category')
@section('main')
    <form action="{{ route('banner.update', $banner->id) }}"method="POST" role="form" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Banner name</label>
                    <input type="text" name="name" class="form-control" id="" value="{{ $banner->name }}"
                        placeholder="Input name">
                </div>
                <div class="form-group">
                    <label for="">Banner description</label>
                    <input type="text" name="description" class="form-control" id=""
                        value="{{ $banner->description }}" placeholder="Input description">
                </div>
                <div class="form-group">
                    <label for="">Product Image</label>
                    <input type="file"class="form-control" id="image-input" name="img"
                        onchange="previewImage(event)">
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="status" value="1" checked>
                        Publish
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="status" value="0">
                        Hiden
                    </label>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            </div>
            <div class="col-md-9" style="text-align: -webkit-center;">
                <div class="form-group">
                    <img id="preview" src="{{ asset('/upload/gallery/' . $banner->image) }}" alt="Product Image"
                        style="width:40%">
                </div>
            </div>
        </div>
    </form>
    <script>
        // JavaScript
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@stop()
