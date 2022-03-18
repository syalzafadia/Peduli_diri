@extends('layouts.app') 
@section('content') 
<div class="pagetitle">
    <h1>Isi Data</h1>
</div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Kota</h5>
              <!-- Vertical Form -->
              <form action="/kota/store" method="post" class="row g-3">
                  @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Kota</label>
                    <select name="kota" id="id_kota">
                        <option value="jakarta">Jakarta</option>
                        <option value="bogor">Bogor</option>
                        <option value="depok">Depok</option>
                        <option value="tanggerang">Tanggerang</option>
                        <option value="bekasi">Bekasi</option>
                     </select>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                    </div>
                </form><!-- Vertical Form -->
    </div>
</div>
@endsection