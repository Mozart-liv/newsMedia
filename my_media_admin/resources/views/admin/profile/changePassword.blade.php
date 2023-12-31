@extends('admin.layouts.app')

@section('content')
    <div class="col-10 offset-2 mt-5">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">User Profile</legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                    <!-- alert  -->
                    @if( session('updateSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('updateSuccess') }}
                    </div>
                    @endif

                    @if( session('fail'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('fail') }}
                    </div>
                    @endif
                    <!-- alert  -->

                      <form class="form-horizontal" action="{{ route('profile#changePassword') }}" method="post">
                        @csrf
                        <div class="form-group row ">
                          <label class="col-sm-3 col-form-label">Old Pasword</label>
                          <div class="col-sm-9">
                            <input type="password" name="oldPassword" class="form-control @error('oldPassword') is-invalid @enderror" placeholder="old password">
                            @error('oldPassword')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                          <label  class="col-sm-3 col-form-label">New Password</label>
                          <div class="col-sm-9">
                            <input type="password" name="newPassword" class="form-control @error('newPassword') is-invalid @enderror" placeholder="new password" >
                            @error('newPassword')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                          <label  class="col-sm-3 col-form-label">Confirm Password</label>
                          <div class="col-sm-9">
                            <input type="password" name="confirmPassword" class="form-control @error('confirmPassword') is-invalid @enderror" placeholder="confirm password" >
                            @error('confirmPassword')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn bg-dark text-white">Change Password</button>
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
