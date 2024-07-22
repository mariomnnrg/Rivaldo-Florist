@extends('layouts.frontend')

@section('content')

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">Detail Papan Bunga</h1>
      </div>
    </div>
  </header>
  <!-- Section-->
  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-8 mb-5">
          <div class="card h-100">
            <!-- Product image-->
            <img
              class="card-img-top"
              src="{{ Storage::url($papan->gambar) }}"
              alt="{{ $papan->nama_papan }}"
            />
            <!-- Product details-->
            <div class="card-body card-body-custom pt-4">
              <div>
                <!-- Product name-->
                <h3 class="fw-bolder text-primary">Deskripsi</h3>
                <p>
                 {{ $papan->deskripsi }}
                </p>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card">
            <!-- Product details-->
            <div class="card-body card-body-custom pt-4">
              <div class="text-center">
                <!-- Product name-->
                <div
                  class="d-flex justify-content-between align-items-center"
                >
                  <h5 class="fw-bolder">{{ $papan->nama_mobil }}</h5>
                  <div class="rent-price mb-3">
                    <span style="font-size: 1rem" class="text-primary"
                      >Rp.{{ number_format($papan->harga_sewa) }}</span
                    >\Acara
                  </div>
                </div>
                <ul class="list-unstyled list-style-group">
                  <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>Ukuran Papan</span>
                    <span style="font-weight: 600">{{ $papan->ukuran_papan }}</span>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer border-top-0 bg-transparent">
              <div class="text-center">
                <a class="btn d-flex align-items-center justify-content-center btn-primary mt-auto" href="https://api.whatsapp.com/send?phone=628126335986&text=saya%20ingin%20memesan%20papan%20bunga%20ini%20{{ $papan->nama_papan }}" style="column-gap: 0.4rem">Sewa Papan Bunga <i class="ri-whatsapp-line"></i></a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
