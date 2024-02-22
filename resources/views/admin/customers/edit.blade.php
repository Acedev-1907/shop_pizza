@extends('master.admin')
@section('title', 'Edit customer ' . $customer->name)
@section('main')
    <div class="row center">
        <div class="col-md-6">
            <form action="{{ route('customer.update', $customer->id) }}" method="POST" role="form"
                enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="">Name:</label>
                    <input name="name" type="text" placeholder="Your name *" class="form-control" required
                        value="{{ $customer->name }}">
                    @error('name')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Mail:</label>
                    <input name="email" type="email" placeholder="Your email *" required class="form-control"
                        value="{{ $customer->email }}" readonly>
                    @error('email')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Phone:</label>
                    <input name="phone" type="text" placeholder="Your phone *" required class="form-control"
                        value="{{ $customer->phone }}">
                    @error('phone')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Address:</label>
                    <input name="address" type="text" placeholder="Your address *" required class="form-control"
                        value="{{ $customer->address }}">
                    @error('address')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Gender:</label>
                    <select name="gender" class="form-control">
                        <option value="">Select One</option>
                        <option value="0" {{ $customer->gender == 0 ? 'selected' : '' }}>Male
                        </option>
                        <option value="1" {{ $customer->gender == 1 ? 'selected' : '' }}>FeMale
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            </form>
        </div>
    </div>

@stop()
