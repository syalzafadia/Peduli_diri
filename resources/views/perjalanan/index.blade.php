@extends('layouts.app') 
@section('content')
 <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Table Perjalanan</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Suhu Tubuh</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                @foreach ($perjalanan as $pj => $p)
                <tbody>
                    <tr>
                        <td>{{$pj+1}}</td>
                        <td>{{$p->user->name}}</td>
                        <td>{{$p->tanggal}}</td>
                        <td>{{$p->jam}}</td>
                        <td>{{$p->lokasi}}</td>
                        <td>{{$p->suhu_tubuh}}</td>
                        <td>
                            <a href="/perjalanan/delete/{{$p->id_perjalanan}}" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
              </table>
              <br>
                <center><a href="/perjalanan/tambah" class="btn btn-success btn-sm">Tambah Data</a></center>
    </div>
</div>
@endsection