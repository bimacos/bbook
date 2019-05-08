@extends('layouts.templae')

@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="card-header"><h5>Daftar Tamu Alumni</h5></div>
		<div class="card-body">
			<table class="table table-stripped table-bordered table-hover">
				<thead align="center">
					<th>No</th>
					<th>Nama</th>
					<th>Kontak</th>
					<th>Keperluan</th>
					<th>Tanggal Berkunjung</th>
					<th>Foto</th>
					<th>Hapus</th>
				</thead>
				<tbody align="center">
					@foreach($pengunjung as $pengunjungs)
					<tr>
						<td>{{ $loop->index+1 }}</td>
						<td>{{ $pengunjungs->nama }}</td>
						<td>{{ $pengunjungs->kontak }}</td>
						<td>{{ $pengunjungs->keperluan }}</td>
						<td>{{ $pengunjungs->created_at->format('d F Y') }}</td>
						<td><img src="{{ asset('images/foto/'.$pengunjungs->foto) }}" alt="{{ $pengunjungs->foto }}" width="200px"></td>
						<td align="center">
							<a href="{{ url('hapusdata/'.$pengunjungs->id) }}" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection