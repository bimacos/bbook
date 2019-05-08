@extends('layouts.template')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header"><h5>Filter Daftar Tamu Berdasarkan Tanggal</h5></div>
					<div class="card-body">
						<form action="{{ url('filter_tanggal/result') }}" method="GET">
							<div class="row">
								<div class="form-group col-md-5">
									<label class="form-control-label">Tanggal Awal</label>
									<input type="date" name="tgl_awal" class="form-control">
								</div>
								<div class="col-md-2 text-center"><br><h1>-</h1></div>
								<div class="form-group col-md-5">
									<label class="form-control-label">Tanggal Akhir</label>
									<input type="date" name="tgl_akhir" class="form-control">
								</div>
							</div>
							<div class="col-md-12 text-right">
								<input type="submit" class="btn btn-info" value="Cari">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection