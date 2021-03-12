@extends('template.v_template')

@section('content')


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Master Operator</h1>
            <a href="#" data-toggle="modal" data-target="#exampleModal" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
             <i class="fas fa-plus fa-sm text-white-50"></i> Add Operator</a>
		</div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <!-- Modal Add Operator -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add operator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ route('operator.store')}}" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama Operator: </strong>
                                <input type="text" name="opt_name" class="form-control" placeholder="Nama Operator">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Divisi: </strong>
                                <textarea class="form-control" style="height:90px" name="division" placeholder="Divisi"></textarea>
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
                            <h5 class="modal-title" id="exampleModalLabel">Add operator</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        @foreach ($operators as $data)
                            <form action="{{route('operator.update', $data->opt_id)}}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Nama Operator: </strong>
                                            <input type="text" name="opt_name" class="form-control" value="{{$data->opt_name}}" placeholder="Nama Operator">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Divisi: </strong>
                                            <input class="form-control" style="height:90px" value="{{$data->division}}" name="division" placeholder="Divisi">
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
                <th>Nama Operator</th>
                <th width="280px"class="text-center">Divisi</th>
                <th width="280px"class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($operators as $data)
                <tr>
                    <td class="text-center">{{ ++$i}}</td>
                    <td>{{ $data->opt_name}}</td>
                    <td>{{ $data->division}}</td>
                    <td class="text-center">
                        <form action="{{ route('operator.destroy',$data->opt_id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('operator.edit',$data->opt_id) }}" data-toggle="modal" data-target="#exampleModal1">Edit</a>
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
        </tbody>
    </table><tr>
    {!! $operators->links() !!}
@endsection