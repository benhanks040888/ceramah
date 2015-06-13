@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row content-about">
      <div class="section-navigation-container">
        <a href="{{ route('splash') }}" class="section-link prev-section"></a>
        <a href="{{ route('gallery') }}" class="section-link next-section"></a>
      </div>

      <figure class="col-xs-5 col-no-padding featured-image">
        <img src="{{ assets_url('images/m-subuh.jpg') }}" alt="Muhammad Subuh Sumohadiwidjojo">
      </figure>
      <div class="col-xs-7 intro-right-container">
        <header><h1><span>Tentang</span><br>Bapak Muhammad Subuh Sumohadiwidjojo</h1></header>
        <div class="copy-base custom-scrollbar">
          <p>Sejarah Subud mulai di sekitar tahun 1925, ketika almarhum R. M. Muhammad Subuh Sumohadiwijoyo secara tak terduga dijamah dengan hebat oleh kekuasaan Tuhan. Kontak dahsyat ini disusul dengan masa tiga tahun yang ditandai gejolak luar biasa di dalam jiwanya.</p>

          <p>Pada akhir masa itu, doanya terkabul dengan diperolehnya petunjuk bahwa karunia yang telah diterima beliau tidak hanya untuk dirinya sendiri dan dapat dibagi-bagikan kepada siapa saja yang berminat. Hanya disyaratkan bahwa anggota tidak boleh dicari-cari. Perlu menunggu kedatangan para peminat atas prakarsa mereka sendiri.</p>

          <p>Mula-mula kontak itu hanya disampaikan kepada anggota keluarga dan tetangga dekat, tetapi lama kelamaan ternyata ada peminat yang datang dari lain-lain tempat di Indonesia untuk menerima kontak, dan lambat laun anggota-anggota tertentu pada gilirannya juga diizinkan menyampaikan kontak kepada para peminat.</p>

          <p>Hanya, setelah terbitnya beberapa buku tentang Subud, karangan perseorangan, cukup banyak pembaca menemui di dalamnya sesuatu yang sedang mereka dambakan, secara sadar atau di bawah sadar, sehingga terbangkitlah hasratnya untuk masuk Subud. Mulai dari tahun 1957 sampai dengan wafatnya pada tahun 1987, Pak Subuh (panggilan akrabnya) banyak bepergian ke luar negeri.</p>

          <p>Mula sekali - lawatan pertamanya ke luar Indonesia - atas undangan mereka beliau mengunjungi selama beberapa bulan sekelompok kecil anggota Inggris yang telah menerima kontak melalui seorang Eropa yang pernah beberapa lama tinggal di Indonesia. Selama paroan kedua tahun 1957, ratusan oranga masuk Subud, banyak di antaranya warga Afrika, Australia, dan Amerika, serta negeri-negeri lain di Eropa.</p>
        </div>
        <nav class="bottom-navigation">
          <ul>
            <li><a href="{{ route('about') }}"><span class="label label-default">Tentang Bapak</span></a></li>
            <li><a href="{{ route('gallery') }}"><span class="label label-default">Photo Gallery</span></a></li>
            <li><a href="{{ route('disclaimer') }}"><span class="label label-default">Go To Surat dan Ceramah</span></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
@stop