@extends('master.admin')
@section('title', 'Create new a product')
@section('main')
    <form action="{{ route('product.store') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="">Product name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id=""
                        placeholder="Input filed">
                    @error('name')
                        <div class="help-block" style="color: red">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Product Desscripton</label>
                    <textarea name="description" class="form-control description" placeholder="Product content">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="help-block" style="color: red">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Product other image</label>
                    <input type="file" name="other_img[]" class="form-control" id="" placeholder="Input filed"
                        multiple onchange="previewImages(event)">
                    <div id="preview-container"></div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Product category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Choice One---</option>
                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}" {{ $cat->id == old('category_id') ? 'selected' : '' }}>
                                {{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="help-block" style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Product price</label>
                    <input type="text" name="price" value="{{ old('price') }}" class="form-control" id=""
                        placeholder="Input filed">
                    @error('price')
                        <div class="help-block" style="color: red">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Product sale</label>
                    <input type="text" name="sale_price" value="{{ old('sale_price') }}" class="form-control"
                        id="" placeholder="Input filed">
                    @error('sale_price')
                        <div class="help-block" style="color: red">{{ $message }}</div>
                    @enderror
                </div>

                <label for="">Product Status</label>
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

                <div class="form-group">
                    <label for="">Product Image</label>
                    <input type="file" name="img" class="form-control" id="" placeholder="Input filed"
                        onchange="previewImage(event)">
                    <img id="preview" src="#" alt="Preview Image" style="display: none; width:60%">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
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

        function previewImages(event) {
            var previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = '';

            var files = event.target.files;
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var imageContainer = document.createElement('div');
                    imageContainer.className = 'image-container';

                    var image = document.createElement('img');
                    image.src = e.target.result;
                    image.style.width = '50%';
                    image.style.maxWidth = '250px';
                    imageContainer.appendChild(image);

                    // var removeButton = document.createElement('button');
                    // removeButton.innerHTML = '<i class="fa fa-trash"></i>';
                    // removeButton.className = 'remove-button';
                    // removeButton.addEventListener('click', function() {
                    //     imageContainer.remove();
                    // });
                    // imageContainer.appendChild(removeButton);

                    previewContainer.appendChild(imageContainer);
                }

                reader.readAsDataURL(files[i]);
            }
        }
    </script>

    {{-- chỉnh nút remove hình --}}
    <style>
        .image-container {
            position: relative;
            display: inline-block;
            margin-top: 18px;
            margin-right: -20px;
        }

        /* .remove-button {
                    position: absolute;
                    top: 5px;
                    right: 35%;
                    padding: 5px;
                    background-color: red;
                    color: white;
                    border: none;
                    cursor: pointer;
                    border-radius: 10%;
                } */
    </style>
@stop()
@section('css')
    <link rel="stylesheet" href="{{ asset('ad_asset/plugins/summernote/summernote.min.css') }}">
@stop()
@section('js')
    <script src="{{ asset('ad_asset/plugins/summernote/summernote.min.js') }}"></script>
    <script>
        $('.description').summernote({
            height: 250
        })
    </script>
@stop()
