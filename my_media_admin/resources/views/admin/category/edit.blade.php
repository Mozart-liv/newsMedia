@extends('admin.layouts.app')

@section('content')
    <div class="col-5 offset-3 mt-3">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin#updateCategory', $id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" name="categoryName" value="{{$category->title}}" class="form-control @error('categoryName') is-invalid @enderror">
                        @error('categoryName')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea name="categoryDes" class="form-control @error('categoryDes') is-invalid @enderror" id="" cols="20" rows="10">{{ $category->description }}</textarea>
                        @error('categoryDes')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-outline-dark">Update Category</button>
                </form>
            </div>
        </div>
    </div>

@endsection
