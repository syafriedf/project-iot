@extends('template.v_template')

@section('content')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Master Operator</h1>
            <a href="#" data-toggle="modal" data-target="#exampleModal" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Add Operator</a>
		</div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nambah Operator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('operator.store') }}" method="POST">
                @csrf
                    <div class="form-group">
                    <strong>Nama Operator:</strong>
                        <input type="text" class="form-control"  placeholder="Nama Operator" name="opt_name">
                    </div>
                    <div class="form-group">
                        <strong>Divisi:</strong>
                        <textarea class="form-control" style="height:90px" placeholder="Divisi"  name="division"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nambah Operator</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('operator.update', $operators->opt_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                            <strong>Nama Operator:</strong>
                                <input type="text" class="form-control"  placeholder="Nama Operator" name="opt_name" value="{{$operators->opt_name}}">
                            </div>
                            <div class="form-group">
                                <strong>Divisi:</strong>
                                <textarea class="form-control" style="height:90px" placeholder="Divisi" value="{{$operators->division}}"  name="division"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>

	    <table class="table table-bordered" style="background-color: white;">
        <thead>
            <tr>
                <th width="20px" class="text-center">No</th>
                <th class="text-center">Nama Operator</th>
                <th width="280px"class="text-center">Divisi</th>
                <th width="280px"class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($operators as $data)
            <tr>
                <td class="text-center">{{++$i}}</td>
                <td class="text-center">{{$data->opt_name}}</td>
                <td class="text-center">{{$data->division}}</td>
                <td class="text-center">
                    <form action="{{ route('operator.destroy',$data->opt_id)}}" method="POST">
                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal1" href="{{ route('operator.edit',$data->opt_id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                Data Blog belum Tersedia.
            </div>
            @endforelse
        </tbody>
    </table>
    {!! $operators->links() !!}
@endsection