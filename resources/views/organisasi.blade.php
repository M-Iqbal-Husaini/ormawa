@extends('layouts.user.main')
@section('content')

<!-- Start Banner Area -->
<section class="banner-area" style="background-image: url('{{ asset('assets/templates/user/img/banner/banner-ukm.jpg') }}'); background-size: cover; background-position: center;">
  <div class="container">
      <div class="row fullscreen align-items-center justify-content-start">
          <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-12 text-center">
                  <div class="banner-content">
                      <h1>DAFTAR ORMAWA</h1>
                      <p>Organisasi kemahasiswaan di tingkat universitas dan fakultas sebagai wadah pengembangan diri, keterlibatan dan partisipasi mahasiswa Unika Atma Jaya sejak menjadi mahasiswa baru hingga lulus.</p>
                  </div>
              </div>
              <div class="col-lg-7">
                <div class="banner-img">
                  <img class="img-fluid" src="" alt="">
                </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- End Banner Area -->

<!-- Start ORMAWA Section -->
<section class="section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Daftar Ormawa</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="single-ormawa">
                    <img src="{{ asset('assets/templates/user/img/hmti.jpg') }}" alt="BPM KM">
                    <h4>Himpunan Mahasiswa Teknik Informatika (HMTI)</h4>
                    <div class="btn-group mt-2">
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="single-ormawa">
                    <img src="{{ asset('assets/templates/user/img/bem.jpg') }}" alt="BEM KM">
                    <h4>Badan Eksekutif Mahasiswa (BEM KM)</h4>
                    <div class="btn-group mt-2">
                        <a href="#" class="btn btn-primary">Detail</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="single-ormawa">
                    <img src="{{ asset('assets/templates/user/img/bem.jpg') }}" alt="ADC">
                    <h4>Atma Jaya Debating Club (ADC)</h4>
                    <div class="btn-group mt-2">
                        <a href="#" class="btn btn-primary">Detail</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="single-ormawa">
                    <img src="{{ asset('assets/templates/user/img/bem.jpg') }}" alt="Fodim">
                    <h4>Forum Diskusi Ilmiah Mahasiswa (Fodim)</h4>
                    <div class="btn-group mt-2">
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End ORMAWA Section -->

@endsection

@section('styles')
<style>
.single-ormawa {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    background-color: #f9f9f9;
    transition: transform 0.3s, box-shadow 0.3s;
}
.single-ormawa:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}
.single-ormawa img {
    width: 100%;
    height: auto;
    margin-bottom: 15px;
    border-radius: 8px;
}
.single-ormawa h4 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 15px;
}
.btn-group .btn {
    margin: 0 5px;
    padding: 5px 15px;
    font-size: 14px;
}
</style>
@endsection

