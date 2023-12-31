@extends('admin.layouts.app')

@section('content')
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin#createPost')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Post title</label>
                        <input type="text" name="postTitle" value="{{old('postTitle')}}" class="form-control @error('postTitle') is-invalid @enderror">
                        @error('postTitle')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea name="postDes" class="form-control @error('postDes') is-invalid @enderror" id="" cols="20" rows="10">{{old('postDes')}}</textarea>
                        @error('postDes')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="postImg" value="{{old('postImg')}}" id="" class="form-control @error('postImg') is-invalid @enderror">
                        @error('postImg')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Category</label>
                        <select name="postCategory" id="" class="form-control">
                            <option value="">Choose category</option>
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}">{{ $c->title }}</option>
                            @endforeach
                        </select>
                        @error('postCategory')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark">Create Post</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-8">
        <!-- alert  -->
            @if( session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        <!-- alert -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Post List
                </h3>

                <div class="card-tools">
                    <form action="{{route('admin#category')}}" method="get">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request('search') }}">

                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            </div>
                        </div>
                    </form>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th></th>
                    </tr>
                  </thead>
                <tbody>
                    @forelse ($posts as $item)
                    <tr>
                      <td class="align-middle">{{ $item->id }}</td>
                      <td class="align-middle">{{ $item->title }}</td>
                      <td class="align-middle">
                        @if ($item->image == null)
                            <img src="{{asset('postImg/default.png')}}"  width="100" class="img-thumbnail" alt="">
                        @else
                            <img src="{{asset('postImg/' . $item->image)}}" width="100" class="img-thumbnail" alt=""></td>
                        @endif

                      <td class="align-middle">
                        <a href="{{ route('admin#detailPost', $item->id) }}">
                            <button class="btn btn-sm bg-dark text-white"><i class="fa-solid fa-circle-info"></i></button>
                        </a>

                        <a href="{{route('admin#deletePost', $item->id)}}">
                            <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </a>

                      </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No data</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
@endsection
