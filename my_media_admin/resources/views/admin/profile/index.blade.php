@extends('admin.layouts.app')

@section('content')
    <div class="col-8 offset-3 mt-5">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">User Profile</legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                    @if( session('updateSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('updateSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                      <form class="form-horizontal" action="{{ route('profile#update') }}" method="post">
                        @csrf
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Name" value="{{ old('name', $user->name) }}">
                            @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                          <div class="col-sm-10">
                            <input type="number" name="phone" class="form-control" id="inputPhone" placeholder="Phone" value="{{ $user->phone }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-10">
                            <textarea name="address" class="form-control" placeholder="Address" id="" cols="30" rows="5">{{ $user->address }}</textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                          <div class="col-sm-10">
                            <select name="gender" id="" class="form-control">
                                @if ( $user->gender == 'male')
                                    <option value="empty">Choose gender</option>
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                @elseif ($user->gender == 'female')
                                    <option value="empty">Choose gender</option>
                                    <option value="male">Male</option>
                                    <option value="female" selected>Female</option>
                                @else
                                    <option value="empty" selected>Choose gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                @endif

                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn bg-dark text-white">Update</button>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <a href="{{ route('profile#changePasswordPage') }}">Change Password</a>
                          </div>
                        </div>

                      </form>

                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
