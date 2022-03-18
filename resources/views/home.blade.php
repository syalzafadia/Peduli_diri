{{-- Selamat datang {{ Auth::user()->name ?? ""}}
 <br>
<a href="{{ route('logout') }}"> Logout </a> --}}
@extends('layouts.app') 
@section('content') 
<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <!-- <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Sales <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div> -->
            <!-- End Sales Card -->

            <!-- Revenue Card -->
            <!-- <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Revenue <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div> -->
            <!-- End Revenue Card -->

            <!-- Customers Card -->
            <!-- <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->

                <!-- <div class="card-body">
                  <h5 class="card-title">Data Perjalanan <>| This Year</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class=""></i>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                    
                    </div>
                  </div>

                </div> -->
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
              <!-- <a href=" user/{{Auth::user()->id}}" class="btn btn-primary">Edit Profile</a> -->
            </div>
          </div>
        </div>
          <div class="col-xl-8">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column ">
             
              <h2>Selamat datang {{Auth::user()->name}}...</h2>
              <h4>Ayoo catat perjalanan kamu disini</h4>
              <p>Aman, Mudah, Cepat, Gratis, dan Aman</p>
              <!-- <a href=" user/{{Auth::user()->id}}" class="btn btn-primary">Edit Profile</a> -->
            </div>
          </div>
        </div>

        <!-- <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">

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
                        <td>{{$p->name}}</td>
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
            </div>
          </div> -->

        </div>
      </div>
    </section>
              </div>

            </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>
@endsection