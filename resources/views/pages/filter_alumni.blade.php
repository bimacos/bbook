@extends('layouts.template)

@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="card-header"><h5>Daftar Tamu Alumni</h5></div>
		<div class="card-body">
			<table class="table table-stripped table-bordered table-hover">
				<thead align="center">
					<th>No</th>
					<th>Nama</th>
					<th>Status</th>
					<th>Kontak</th>
					<th>Keperluan</th>
					<th>Foto</th>
					<th>Tanggal Berkunjung</th>
					<th>Hapus</th>
				</thead>
				<tbody align="center">
					@foreach($alumni as $alumnis)
					<tr>
						<td>{{ $loop->index+1 }}</td>
						<td>{{ $alumnis->nama }}</td>
						<td>{{ $alumnis->status }}</td>
						<td>{{ $alumnis->kontak }}</td>
						<td>{{ $alumnis->keperluan }}</td>
						<td><img src="{{ asset('images/foto/'.$alumnis->foto) }}" alt="{{ $alumnis->foto }}" width="200px"></td>
						<td>{{ $alumnis->created_at->format('d F Y') }}</td>
						<td align="center">
							<a href="{{ url('hapusdata/'.$alumnis->id) }}" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection