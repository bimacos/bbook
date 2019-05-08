@extends('layouts.template')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		@if (session('pesan'))
			<script>alert('{{ session('pesan') }}')</script>
			@endif
			<div class="card">
				<div class="card-header"><h5>Filter Daftar Tamu Berdasarkan Tanggal</h5></div>
				<div class="card-body">
					<form action="{{ url('filter_tanggal/result') }}" method="get">
						<div class="row">
							<div class="form-group col-md-5">
								<label class="form-control-label">Tanggal Awal</label>
								<input type="date" name="tgl_awal" class="form-control" value="{{ $tgl_awal }}">
							</div>
							<div class="col-md-2 text-center"><br><h1>-</h1></div>
							<div class="form-group col-md-5">
								<label class="form-control-label">Tanggal Akhir</label>
								<input type="date" name="tgl_akhir" class="form-control" value="{{ $tgl_akhir }}">
							</div>
						</div>
						<div class="col-md-12 text-right">
							<input type="submit" class="btn btn-info" value="Cari">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card" style="margin-top: 20px">
				<div class="card-header"><h5>Daftar Tamu</h5></div>
				<div class="card-body">
					<div class="col-md-12">
						<h3 class="text-center">Laporan Tamu Dari Tanggal<br>{{ $tgl_awal }} Sampai {{ $tgl_akhir }}</h3>
					</div>
					<div class="text-left col-lg-12">
					<a href="" class="btn btn-success" onclick="window.print()">Print</a>
					</div>
					<br>
					<table class="table table-stripped table-bordered table-hover">
						<thead align="center">
							<th>No</th>
							<th>Nama</th>
							<th>Kontak</th>
							<th>Keperluan</th>
							<th>Foto</th>
							<th>Tanggal Berkunjung</th>
							<th>Hapus</th>
						</thead>
						<tbody align="center">
							@foreach($result as $tglresult)
							<tr>
								<td>{{ $loop->index+1 }}</td>
								<td>{{ $tglresult->nama }}</td>
								<td>{{ $tglresult->kontak }}</td>
								<td>{{ $tglresult->keperluan }}</td>
								<td><img src="{{ asset('img/foto/'.$tglresult->foto) }}" alt="{{ $tglresult->foto }}" width="200px"></td>
								<td>{{ date($tglresult->created_at) }}</td>
								<td align="center">
									<a href="{{ url('hapus_tanggal/'.$tglresult->id) }}" class="btn btn-danger">Hapus</a>
									<a href="{{ url('edit_tanggal/'.$tglresult->id) }}" class="btn btn-primary">Edit</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection