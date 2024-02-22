@extends('master.admin')
@section('title', 'Create Customer')
@section('main')

    <div class="row center">
        <div class="col-md-6">
            <form action="{{ route('customer.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name:</label>
                    <input name="name" type="text" placeholder="Your name *" class="form-control" required
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Mail:</label>
                    <input name="email" type="email" placeholder="Your email *" required class="form-control"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Phone:</label>
                    <input name="phone" type="text" placeholder="Your phone *" required class="form-control"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Address:</label>
                    <input name="address" type="text" placeholder="Your address *" required class="form-control"
                        value="{{ old('address') }}">
                    @error('address')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Gender:</label>
                    <select name="gender" class="form-control">
                        <option value="">Select One</option>
                        <option value="0">Male</option>
                        <option value="1">FeMale</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">password:</label>
                    <input name="password" type="password" placeholder="Your password *" required class="form-control">
                    @error('password')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Confirm password:</label>
                    <input name="confirm_password" type="password" placeholder="Your comfirm password *" required
                        class="form-control">
                    @error('confirm_password')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            </form>
        </div>
    </div>
@stop()
