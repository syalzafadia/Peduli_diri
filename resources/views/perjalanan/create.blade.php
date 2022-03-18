@extends('layouts.app') 
@section('content') 

@if($errors -> any())
<strong>ISI SEMUA DATA!</strong>
@foreach($errors -> all() as $error)
<pre>{{$error}}</pre>
@endforeach
@endif

<div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Perjalanan</h5>
              <form action="/perjalanan/store" method="post" class="row g-3">
                  @csrf
              <!-- Floating Labels Form -->
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="tanggal" placeholder="tanggal">
                    <label for="floating">Tanggal</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="time" class="form-control" name="jam" placeholder="jam">
                    <label for="floating">Jam</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="lokasi" name="lokasi" style="height: 100px;"></textarea>
                    <label for="floating">Lokasi</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" autocomplete="off" class="form-control" name="suhu_tubuh" placeholder="suhu_tubuh">
                      <label for="floating">Suhu Tubuh</label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->
            </div>
          </div>
@endsection