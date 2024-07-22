@extends('layouts.frontend')
 <style>
        .card-img-top {
  object-fit: cover;
}

.card-img {

  object-fit: contain;
}


    </style>

@section('content')

<header class="bg-dark py-5">
  <div class="container px-4 px-lg-5 my-5">
    <div class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Sewa Papan Bunga <br> -</h1> 
            <p class="lead fw-normal text-white-50 mb-0">hanya dengan satu sentuhan</p> 
          </div>
        </div>
        <div class="carousel-item">
          <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Mewakili Cinta, Persahabatan, Dan Dukamu</h1>
            <p class="lead fw-normal text-white-50 mb-0">Satukan Perasaanmu Dengan Papan Bunga
            </p>
          </div>
        </div>
          </div>
    </div>
  </div>
</header>
<!-- Daftar Papan Bunga -->
<section class="py-5">
  <div class="container px-4 px-lg-5 mt-5">
    <h3 class="text-center mb-5">Daftar Papan Bunga</h3>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
      @foreach($papans as $papan)
      <div class="col mb-5">
        <div class="card h-100">
          <!-- Sale badge-->
          <div class="badge badge-custom {{ $papan->status == 'tersedia' ? 'bg-success' : 'bg-warning'}} text-white position-absolute"
            style="top: 0; right: 0">
            {{ $papan->status }}
          </div>
          <!-- Product image-->
          <img class="card-img" src="{{ Storage::url($papan->gambar) }}" alt="{{ $papan->nama_papan }}" />
          <!-- Product details-->
          <div class="card-body card-body-custom pt-4">
            <div class="text-center">
              <!-- Product name-->
              <h5 class="fw-bolder">{{ $papan->nama_papan }}</h5>
              <!-- Product price-->
              <div class="rent-price mb-3">
                <span class="text-primary">Rp.{{ number_format($papan->harga_sewa) }}</span>/Acara
              </div>
              <ul class="list-unstyled list-style-group">
                <li class="border-bottom p-2 d-flex justify-content-between">
                  <span>Ukuran Papan</span>
                  <span style="font-weight: 600">{{ $papan->ukuran_papan }}</span>
                </li>
                <li class="border-bottom p-2 d-flex justify-content-between">
                  <span>Stock</span>
                  <span style="font-weight: 600">{{ $papan->status}}</span>
                </li>
                <li class="border-bottom p-2 d-flex justify-content-between">
                  <span>Latar</span>
                  <span style="font-weight: 600">{{ $papan->latar}}</span>
                </li>
              </ul>
            </div>
          </div>
          <!-- Product actions-->
          <div class="card-footer border-top-0 bg-transparent">
            <div class="text-center">
              <a class="btn btn-primary mt-auto" href="https://api.whatsapp.com/send?phone=628126335986&text=saya%20ingin%20memesan%20papan%20bunga%20ini%20{{ $papan->nama_papan }}">Sewa</a>
              <a class="btn btn-info mt-auto text-white" href="{{ route('detail', ['papan' => $papan->slug]) }}">Detail</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container px-4 px-lg-5 mt-5">
    <h3 class="text-center mb-5">Galeri</h3>
    <div class="row justify-content-center">
      @foreach($galeris as $galeri)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="{{ Storage::url($galeri->gambar) }}" alt="{{ $galeri->judul }}">
            <div class="card-body text-center">
              <h5 class="card-title">{{ $galeri->judul }}</h5>
              <hr>
              <p class="card-text">{{ $galeri->deskripsi }}</p>
            </div>
            
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>






    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
    $('.carousel').carousel({
      pause: "hover",
      interval: 1000
    });
  });
</script>

@endsection