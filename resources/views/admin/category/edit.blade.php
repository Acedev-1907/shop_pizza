@extends('master.admin')
@section('title', 'Edit Category')
@section('main')
    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('category.update', $category->id) }}" method="POST" role="form"
                enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="">Category name</label>
                    <input type="text" name="name" class="form-control" id="" value="{{ $category->name }}"
                        placeholder="Input filed">
                </div>

                <div class="form-group">
                    <label for="">Category status</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" value="1"
                                {{ $category->status == 1 ? 'checked' : '' }}>
                            Publish
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" value="0"
                                {{ $category->status == 0 ? 'checked' : '' }}>
                            Hiden
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
            </form>
        </div>
    </div>
@stop()
