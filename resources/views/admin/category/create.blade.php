@extends('master.admin')
@section('title', 'Create Category')
@section('main')

    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('category.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Category name</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="Input filed">
                </div>

                <div class="form-group">
                    <label for="">Category status</label>
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
            </form>
        </div>
    </div>
@stop()
