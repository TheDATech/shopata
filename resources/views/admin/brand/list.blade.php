@extends('admin.layouts.master')

@section('title','Brand List')

@section('style')

@endsection

@section('content')

                          {{-- Delete message on delete start--}}
      @if(session()->has('delete'))
        <div id="alert" class="alert alert-danger alert-dismissible deletefade in mb-1" style="display: none" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Delete!</strong> {{session('delete')}}

        </div>
      @endif
                           {{-- Delete message delete end--}}

                            {{-- Update message on update start--}}
      @if(session()->has('updated'))
        <div id="alert" class="alert alert-primary alert-dismissible deletefade in mb-1" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Update!</strong> {{session('updated')}}
        </div>
      @endif
                            {{-- Update message on update end--}}

                            {{-- submit message on submit start--}}

      @if(session()->has('submit'))
        <div id="alert" class="alert alert-success alert-dismissible deletefade in mb-1" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Submit!</strong> {{session('submit')}}
        </div>
      @endif
                            {{-- submit message on submit end--}}

  <div class="page-header">
    <h3 class="page-title">
      Brand
    </h3>
    <a type="button" class="btn btn-info btn-fw" href="{{url('admin/brand/create')}}"><i class="icon-plus"></i>&nbsp;Add Brand</a>

  </div>

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Brands List</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <div id="order-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                  <div class="row">
                    <div class="col-sm-12">

                      <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">

                        <thead>
                          <tr role="row">
                              <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order #: activate to sort column descending" style="width: 58px;">#</th>
                              <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 103px;">Brand</th>
                              <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 103px;">User</th>
                              <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 103px;">Created At</th>
                              <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 65px;">Edit</th>
                              <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 61px;">Delete</th></tr>
                        </thead>

                        <tbody>

                            @forelse ($brands as $brand)

                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{$brand->id}}</td>
                                    <td>{{$brand->title}}</td>
                                    <td style="text-transform:uppercase">{{$brand->user->name}}</td>
                                    <td>{{$brand->created_at->format('Y-m-d')}}</td>
                                    <td>
                                        <a type="button" href="{{url('admin/brand/'.$brand->id.'/edit')}}" style="padding:10px" class="btn btn-md btn-primary btn-icon-text">
                                            <i class="ti-pencil-alt"></i>&nbsp;
                                            Edit
                                            {{-- <i class="fas fa-pencil-alt btn-icon-append"></i> --}}

                                        </a>
                                    </td>
                                    <td>
                                            <form action="{{ url('admin/brand/'.$brand->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="padding:10px" class="btn btn-md btn-danger btn-icon-text delete-brand" style="padding:10px">
                                                <i class="ti-trash"></i>&nbsp;
                                                    Delete
                                            </button>
                                            </form>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td>No Brands Found.</td>
                                </tr>

                            @endforelse

                        </tbody>

                      </table>

                    </div>
                  </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')



    <script>

      //--------------------------- Alert message
        $(document).ready(function() {
            $("#alert").fadeTo(500, 100).fadeOut(500, function(){
                $("#alert").alert('close');
            });
        });

    </script>


@endsection

