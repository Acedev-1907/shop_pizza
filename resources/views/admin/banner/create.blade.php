@extends('master.admin')
@section('title', 'Create Banner')
@section('main')
    <form action="{{ route('banner.store') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Banner name</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="Input name">
                </div>
                <div class="form-group">
                    <label for="">Banner description</label>
                    <input type="text" name="description" class="form-control" id=""
                        placeholder="Input description">
                </div>
                <div class="form-group">
                    <label for="">Banner Image</label>
                    <input type="file" name="img" class="form-control" id="" placeholder="Input filed"
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
                    <img id="preview" src="#" alt="Preview Image" style="display: none; width:40%">
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
