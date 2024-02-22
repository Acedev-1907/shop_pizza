@extends('master.admin')
@section('title', 'Table Customers')
@section('main')
    <form action="" class="form-inline" role="form">
        <div class="form-group">
            <label class="sr-only" for="">lable</label>
            <input class="form-control" name="key" placeholder="Input field">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        <a href="{{ route('customer.create') }}" class="btn btn-success pull-right">
            <i class="fa fa-plus"></i> Add new
        </a>
    </form>
    <br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>name</th>
                <th>gender</th>
                <th>phone</th>
                <th>email</th>
                <th>address</th>
            <tr>
        </thead>
        <tbody>
            @foreach ($data as $model)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $model->name }}</td>
                    <td>
                        @if ($model->gender == 0)
                            Nam
                        @elseif($model->gender == 1)
                            Nữ
                        @endif
                    </td>
                    <td>{{ $model->phone }} </td>
                    {{-- <td>{{ $model->status == 0 ? 'Hidde' : 'Publish' }}</td> --}}
                    <td>{{ $model->email }}</td>
                    <td>{{ $model->address }}</td>

                    <td class="text-right">
                        <form action="{{ route('customer.destroy', $model->id) }}" method="post"
                            onsubmit="return confirm('Are you sure want to delete it?')">
                            @csrf @method('DELETE')
                            <a href="{{ route('customer.edit', $model->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-edit"></i></a>
                            <button href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@stop()
