@extends('admin.layout')

@section('content')
  
<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Users</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20">Create user</h4>

        @include('admin.commons.form-validate')

        <form method="POST" action="{{ route('admin.user.store') }}">
          @csrf

          <div class="row">
            <div class="mb-3 col-md-4">
              <label class="form-label" for="inputEmail4">Email</label>
              <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="mb-3 col-md-4">
              <label class="form-label" for="inputPassword4">Password</label>
              <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" value="{{ old('password') }}">
            </div>
            <div class="mb-3 col-md-4">
              <label class="form-label" for="inputPassword4">Password</label>
              <input type="password" name="password_confirmation" class="form-control" id="inputPassword4" placeholder="Password Confirmation" value="{{ old('password_confirmation') }}">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="inputAddress">Address</label>
            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{ old('address') }}">
          </div>
          <div class="mb-3">
            <label class="form-label" for="inputAddress2">Address 2</label>
            <input type="text" name="phone_number" class="form-control" id="inputAddress2" placeholder="+84xxxx" value="{{ old('phone_number') }}">
          </div>

          <div class="row">
            <div class="mb-3 col-md-4">
              <label class="form-label" for="inputState">Level</label>
              <select id="inputState" name="level_id" class="form-control">
                <option selected="selected">Choose level</option>
                {
                  @foreach($levels as $level)
                    <option value="{{ $level->id }}" {{ $level->id == old('level_id') ? 'selected' : '' }}>{{ $level->name }}</option>
                  @endforeach
                }
              </select>
            </div>
            <div class="mb-3 col-md-4">
              <label class="form-label" for="inputState">National</label>
              <select id="inputState" name="national_id" class="form-control">
                <option selected="selected">Choose national</option>
                {
                  @foreach($nationals as $national)
                    <option value="{{ $national->id }}" {{ $national->id == old('national_id') ? 'selected' : '' }}>{{ $national->name }}</option>
                  @endforeach
                }
              </select>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-color">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
