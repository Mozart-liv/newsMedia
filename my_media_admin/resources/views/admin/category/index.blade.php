@extends('admin.layouts.app')

@section('content')
    <div class="col-5">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin#createCategory')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" name="categoryName" class="form-control @error('categoryName') is-invalid @enderror">
                        @error('categoryName')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea name="categoryDes" class="form-control @error('categoryDes') is-invalid @enderror" id="" cols="20" rows="10"></textarea>
                        @error('categoryDes')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-outline-dark">Add Category</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-7">
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
                  Category List
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
                      <th>Category Name</th>
                      <th>Description</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($categoryData as $item)
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->title }}</td>
                      <td>{{ $item->description }}</td>
                      <td>
                        <a href="{{route('admin#editCategoryPage', $item->id)}}">
                            <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                        </a>
                        <a href="{{route('admin#deleteCategory', $item->id)}}">
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
