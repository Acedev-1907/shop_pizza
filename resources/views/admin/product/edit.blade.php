@extends('master.admin')
@section('title', 'Edit product' . $product->name)
@section('main')
    <form action="{{ route('product.update', $product->id) }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="">Product name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" id=""
                        placeholder="Input filed">
                </div>

                <div class="form-group">
                    <label for="">Product Desscripton</label>
                    <textarea name="description" class="form-control description" placeholder="Product content">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Product other image</label>
                    <input type="file" name="other_img[]" class="form-control" id="" placeholder="Input filed"
                        multiple onchange="previewImages(event)">
                    <div id="preview-container" style="padding-top:10px"></div>
                    <hr>
                    <div class="row" style="padding: 1em">
                        @foreach ($product->images as $img)
                            <div class="col-md-3" style="position:relative">
                                <a href="" class="thumbnail">
                                    <img src="{{ asset('upload/product/') . '/' . $img->image }}">
                                </a>
                                <a onclick="return confirm('Are you sure delete it?')"
                                    href="{{ route('product.destroyImage', $img->id) }}"
                                    style="position: absolute; top:5px; right:20px" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Product category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Choice One---</option>
                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                                {{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Product price</label>
                    <input type="text" name="price" class="form-control" value="{{ $product->price }}" id=""
                        placeholder="Input filed">
                </div>

                <div class="form-group">
                    <label for="">Product sale</label>
                    <input type="text" name="sale_price" class="form-control" value="{{ $product->sale_price }}"
                        id="" placeholder="Input filed">
                </div>

                <div class="form-group">
                    <label for="">Product Status</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" value="1"
                                {{ $product->status == 1 ? 'checked' : '' }}>
                            Publish
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" value="0"
                                {{ $product->status == 0 ? 'checked' : '' }}>
                            Hiden
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Product Image</label>

                    <input type="file"class="form-control" id="image-input" name="img" onchange="changeImage(event)">
                    <img id="preview" src="{{ asset('/upload/product/' . $product->image) }}" alt="Product Image"
                        style="width:60%">
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
    <style>
        .image-container {
            position: relative;
            display: inline-block;
            /* margin-top: 18px; */
            margin-right: -20px;
        }
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
