@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        @if (session('pesan'))
            <script>alert('{{ session('pesan') }}')</script>
        @endif
                <div class="col-md-10">
                <form action="{{ url('input/simpan') }}" method="post">
                    {{ csrf_field() }}
                    <div class="card">
                        <div class="card-header" style="color:#2b90d9;"><h2>Penginputan Tamu</h2></div>
                        <div class="card-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                <label class="form-control-label">Nama Tamu</label>
                                <input type="text" placeholder="Nama" class="form-control{{ $errors->has('nama_tamu') ? ' is-invalid' : ''}}" name="nama_tamu" required>
                                </div>
                            <br>
                                <div class="form-group">
                                <label class="form-control-label">Keperluan</label>
                                <input type="text" placeholder="Keperluan" class="form-control" name="keperluan" required>
                                </div>
                            <br>
                                <div class="form-group">
                                <label class="form-control-label">Kontak</label>
                                <input type="number" placeholder="+62" class="form-control" name="kontak" maxlength="15" required>
                                </div>
                            <br>
                                <div class="form-group">
                                <label class="form-control-label">Tanggal</label>
                                <input type="date" class="form-control" name="tgl" required>
                                </div>
                            <br>
                                    <button type="submit" class="btn btn-primary" name="simpan"><i class="fa fa-upload"> </i>Simpan</button>
            

                        </div>
                        <div class="col-md-6">
                            <input type="hidden" name="foto" id="foto">
                        <video autoplay id="video" style="width: 100%; background-color: #fff; border: thin solid #ddd; padding: 10px; margin: 0;">
                        </video>
                        <img src="" id="hasilCameraImg" style="width: 100%; border: thin solid #ddd; padding: 10px; margin: 0; display: none;">
                        <canvas width="640" height="480" id="hasilCameraCanvas" style="display: none;"></canvas>
                        <br>
                        <br>
                        <button type="button" class="btn btn-primary" onclick="snapshot()">Ambil Gambar</button>
                        <button type="button" class="btn btn-danger"  onclick="ulang()">Reset Foto</button>
                        </div>
                        </form>     
                        <script>

                        var video            = document.querySelector('#video');
                        var canvas           = document.querySelector('#hasilCameraCanvas');
                        var ctx              = canvas.getContext('2d');
                        var localMediaStream = null;

                        function snapshot() {
                          if (localMediaStream) {
                            ctx.drawImage(video, 0, 0);
                            document.querySelector('#hasilCameraImg').src           = canvas.toDataURL('images/fotoorang/png');
                            document.getElementById('foto').value                   = canvas.toDataURL('images/fotoorang/png');
                            video.style.display                                     = 'none';
                            document.getElementById('hasilCameraImg').style.display = 'block';
                          }
                        }
                        function ulang(){
                          video.style.display = 'block';
                          document.getElementById('hasilCameraImg').style.display = 'none';
                          document.getElementById('foto').value = '';
                        }
                        var errorEuy = function(e) {
                          console.log('Reeeejected!', e);
                        };
                        navigator.getUserMedia({video: true}, function(stream) {
                          video.src        = window.URL.createObjectURL(stream);
                          localMediaStream = stream;
                        }, errorEuy);
                    </script>
                        </div>
                        <br>
                        <hr>
                        <br>
                       <div class="col-md-12">
                            <div class="card-footer text-muted">
                             <div class="table-responsive">
                                <table id="example" class="table table-striped table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>   
                                            <th>Nama Tamu</th>
                                            <th>Keperluan</th>
                                            <th>Kontak</th>
                                            <th>Tanggal</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bukutamus as $bukutamu)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $bukutamu -> nama }}</td>
                                                    <td>{{ $bukutamu -> keperluan }}</td>
                                                    <td>{{ $bukutamu -> kontak }}</td>
                                                    <td>{{ $bukutamu->created_at}}</td>
                                                    <td><img src="{{ asset('img/foto/'.$bukutamu -> foto)}}" alt="{{ $bukutamu -> foto}}" width="200px"></td>
                                                    <td><a href="{{ url('hapus/'.$bukutamu->id) }}"><i class="fa fa-trash-o text-danger" style="font-size: 18pt;"></i></a></td>
                                                </tr>
                                        @endforeach
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
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection
