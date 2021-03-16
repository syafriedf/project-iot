@extends('template.v_template')

@section('content')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Master Status</h1>
            <a href="#" data-toggle="modal" data-target="#exampleModal" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
             <i class="fas fa-plus fa-sm text-white-50"></i> Add Status</a>
		</div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <!-- Modal Add Machine -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ route('status.store')}}" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Status ID: </strong>
                                <input type="number" name="sts_id" class="form-control" placeholder="Status ID">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Status Name: </strong>
                                <input class="form-control" style="height:90px" name="sts_name" placeholder="Status Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Status Description: </strong>
                                <input  class="form-control" style="height:90px" name="sts_desc" placeholder="Status Desc">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        </div>

              <!-- Modal Edit -->
              <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Machine</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        @foreach ($statuses as $data)
                            <form action="{{route('status.update', $data->sts_id)}}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Status ID: </strong>
                                            <input type="text" name="sts_id" class="form-control" value="{{$data->sts_id}}" placeholder="Nama Operator">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Status Name: </strong>
                                            <input class="form-control" style="height:90px" value="{{$data->sts_name}}" name="sts_name" placeholder="Divisi">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Status Desc: </strong>
                                            <input class="form-control" style="height:90px" value="{{$data->sts_desc}}" name="sts_desc" placeholder="Divisi">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>

	    <table class="table table-bordered" style="background-color: white;">
        <thead>
            <tr>
                <th width="20px" class="text-center">No</th>
                <th width="20px" class="text-center">Status</th>
                <th width="280px"class="text-center">Status Name</th>
                <th width="280px"class="text-center">Status Desc</th>
                <th width="280px"class="text-center">Action</th>
            </tr>
        </thead>
        @forelse ($statuses as $data)
                <tr>
                    <td class="text-center">{{ ++$i}}</td>
                    <td class="text-center">{{ $data->sts_id}}</td>
                    <td class="text-center">{{ $data->sts_name}}</td>
                    <td class="text-center">{{ $data->sts_desc}}</td>
                    <td class="text-center">
                        <form action="{{ route('status.destroy',$data->sts_id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('status.edit',$data->sts_id) }}" data-toggle="modal" data-target="#exampleModal1">Edit</a>
                            
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data belum Tersedia.
                </div>
        @endforelse
    </table>
    {!! $statuses->links() !!}
@endsection