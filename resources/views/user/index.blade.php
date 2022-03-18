@extends('layouts.app') 
@section('content') 
<div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              @if (auth()->user()->foto)
                <img src="{{ asset('images/' . auth()->user()->foto) }}" alt="Profile" class="rounded-circle"> </br>
              @else
                <img src="{{ asset('img/not-found.svg') }}" alt="Profile" class="rounded-circle"> </br>
              @endif

              <h2>{{Auth::user()->name}}</h2>
              <h3>{{ Auth::user()->nik}}</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile Details</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">NIK</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->nik ?? "-"}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name ?? "-"}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Username</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->username ?? "-"}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Telpon</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->telp ?? "-" }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email ?? "-" }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Provinsi</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->provinsi ?? "-"}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Kota</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->kota ?? "-"}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Kecamatan</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->kecamatan ?? "-"}}</div>
                  </div> 
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Kelurahan</div>
                    <div class="col-lg-9 col-md-8">{{Auth::user()->kelurahan ?? "-"}}</div>
                  </div>                 

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="" enctype="multipart/form-data">
                  @csrf
              {{method_field('POST')}}
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">

                        @if (auth()->user()->foto)
                           <img src="{{ asset('images/' . auth()->user()->foto) }}" alt="Profile" class="rounded-circle"> </br>
                        @else
                           <img src="{{ asset('img/not-found.svg') }}" alt="Profile" class="rounded-circle"> </br>
                        @endif
                        
                        <input type="file" name="foto" class="form-control"/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nik" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nik" type="text" autocomplete="off" class="form-control" id="nik" value="{{ Auth::user()->nik ?? "" }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" autocomplete="off" class="form-control" id="name" value="{{ Auth::user()->name ?? "" }}" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" autocomplete="off" class="form-control" id="username" value="{{ Auth::user()->username ?? "" }}" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="telp" class="col-md-4 col-lg-3 col-form-label">Telepon</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="telp" type="text" autocomplete="off" class="form-control" id="telp" value="{{ Auth::user()->telp ?? "" }}" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" autocomplete="off" class="form-control" id="Email" value="{{ Auth::user()->email ?? "" }}" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Provinsi</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-select" name="provinsi" id="provinsi">
                          <option selected>---Pilih Provinsi---</option>
                          @foreach ($provinsi as $r_prov)
                              <option  value="{{$r_prov->id}}">{{$r_prov->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Kota</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-select" name="kota" id="kota">
                          <option selected>---Pilih Kota---</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Kecamatan</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-select" name="kecamatan" id="kecamatan">
                          <option selected>---Pilih Kecamatan---</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Kelurahan</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-select" name="kelurahan" id="kelurahan">
                          <option selected>---Pilih Kelurahan---</option>
                        </select>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                    @if (session('error'))
                        <div class="alert alert-danger">
                        {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                        {{ session('success') }}
                        </div>
                    @endif

                  <form method="POST" action="{{ route('changepassword') }}" enctype="multipart/form-data">
                  @csrf
                  {{method_field('POST')}}

                    <div class="row mb-3">
                      <label for="current-password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="current-password" type="password" class="form-control" id="current-password" required>
                        @if ($errors->has('current-password'))
                            <div class="invalid-feedback">
                            {{ $errors->first('current-password') }}
                            </div>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="new-password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new-password" type="password" class="form-control" id="new-password" required>
                        @if ($errors->has('new-password'))
                            <div class="invalid-feedback">
                            {{ $errors->first('new-password') }}
                            </div>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="new-password-confirm" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new-password-confirm" type="password" class="form-control" id="new-password-confirm" required>
                        @if ($errors->has('new-password-confirm'))
                            <div class="invalid-feedback">
                            {{ $errors->first('new-password-confirm') }}
                            </div>
                        @endif
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection