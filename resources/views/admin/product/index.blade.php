@extends('master.admin')
@section('title', 'Table Product')
@section('main')
    <form action="" class="form-inline" role="form">
        <div class="form-group">
            <label class="sr-only" for="">lable</label>
            <input class="form-control" name="key" placeholder="Input field">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        <a href="{{ route('product.create') }}" class="btn btn-success pull-right">
            <i class="fa fa-plus"></i> Add new
        </a>
    </form>
    <br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Proucct Name</th>
                <th>Category</th>
                <th>Price</th>
                <th></th>
                <th>Image</th>
            <tr>
        </thead>
        <tbody>
            @foreach ($data as $model)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $model->name }}</td>
                    <td>{{ $model->cat->name }}</td>
                    <td>{{ $model->price }} <span class="label label-success">{{ $model->sale_price }}</span> VNĐ</td>
                    {{-- <td>{{ $model->status == 0 ? 'Hidde' : 'Publish' }}</td> --}}
                    <td>
                        @if ($model->status == 0)
                            <span style="color: red;">Hidde</span>
                        @else
                            <span style="color: rgb(45, 234, 45);">Publish</span>
                        @endif
                    </td>
                    <td>
                        <img src="{{ asset('/upload/product') . '/' . $model->image }}" width="80">
                    </td>
                    <td class="text-right">
                        <form action="{{ route('product.destroy', $model->id) }}" method="post"
                            onsubmit="return confirm('Are you sure want to delete it?')">
                            @csrf @method('DELETE')
                            <a href="{{ route('product.edit', $model->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-edit"></i></a>
                            <button href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@stop()
