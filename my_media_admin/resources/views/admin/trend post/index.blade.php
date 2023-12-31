@extends('admin.layouts.app')
 @section('content')
    <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
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
                      <th>view count</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($post as $item)
                            <tr>
                                <td class="align-middle">{{ $item->post_id }}</td>
                                <td class="align-middle">{{ $item->title }}</td>
                                <td class="align-middle">
                                    @if ($item->image == null)
                                        <img src="{{asset('postImg/default.png')}}"  width="100" class="img-thumbnail" alt="">
                                    @else
                                        <img src="{{asset('postImg/' . $item->image)}}" width="100" class="img-thumbnail" alt=""></td>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $item->view }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('admin#detailPost', $item->post_id) }}">
                                        <button class="btn btn-sm bg-dark text-white"><i class="fa-solid fa-circle-info"></i></button>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>
 @endsection
