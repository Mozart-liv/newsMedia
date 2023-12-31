@extends('admin.layouts.app')

@section('content')
    <div class="col-8 offset-2 mt-3">
        <div class="mb-3">
            <i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="text-center p-3">
                    @if ($data->image == null)
                    <img src="{{asset('postImg/default.png')}}"  width="400" class="img-thumbnail " alt="">
                @else
                    <img src="{{asset('postImg/' . $data->image)}}" width="400" class="img-thumbnail " alt=""></td>
                @endif
                </div>
            </div>
            <div class="card-body px-5">
                <h3 class="text-center border-bottom border-danger pb-3">{{ $data->title }}</h3>
                <i class="text-success">{{ $data->category }}</i>

                <p class="my-3">{{ $data->description }}</p>
            </div>

            <div class="card-footer">
                <a href="{{route('admin#editPostPage', $data->id)}}">
                <button class="btn btn-dark text-white mx-3 px-3"><i class="fas fa-edit"></i>Edit</button>
            </a>
            </div>
        </div>
    </div>

@endsection
