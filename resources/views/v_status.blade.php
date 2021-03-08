@extends('template.v_template')

@section('content')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Master Status</h1>
		</div>

	    <table class="table table-bordered" style="background-color: white;">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Nama Status</th>
            <th width="280px"class="text-center">Deskripsi</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        <tr>
            <td class="text-center"></td>
            <td></td>
            <td></td>
            <td class="text-center">
                <form action="" method="POST">
 
                    <a class="btn btn-info btn-sm" href="">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="">Edit</a>

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
    </table>
@endsection