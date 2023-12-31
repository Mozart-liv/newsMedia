@extends('admin.layouts.app')

@section('content')
    <div class="col-6 offset-3 mt-3">
        <div class="mb-3">
            <i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
        </div>
        <div class="card p-3">
            <div class="card-img">
                @if ($post->image == null)
                    <img src="{{asset('postImg/default.png')}}"  width="500" class="img-thumbnail" alt="">
                @else
                    <img src="{{asset('postImg/' . $post->image)}}" width="500" class="img-thumbnail" alt=""></td>
                @endif
            </div>

            <div class="card-body">
                <form action="{{route('admin#updatePost', $post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Post title</label>
                        <input type="text" name="postTitle" value="{{$post->title}}" class="form-control @error('postTitle') is-invalid @enderror">
                        @error('postTitle')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea name="postDes" class="form-control @error('postDes') is-invalid @enderror" id="" cols="20" rows="10">{{ $post->description }}</textarea>
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
                        <select name="postCategory" id="" class="form-control @error('postCategory') is-invalid @enderror">
                            <option value="">Choose category</option>
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}" @if ($post->category_id == $c->id) selected @endif >{{ $c->title }}</option>
                            @endforeach
                        </select>
                        @error('postCategory')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark">Update Category</button>
                </form>
            </div>
        </div>
    </div>

@endsection
