@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="content-disclaimer">
      <div class="row">
        <div class="col-xs-12 text-center disclaimer-container">
          <div class="disclaimer copy-base">
            <header>
              <h3>Sangkalan</h3>
            </header>
            <p>Dokumen yang tersedia hanya dapat dibaca oleh Anggota Subud [dan patuh pada hak cipta]. Pengguna diminta untuk tidak memodifikasi, memproduksi kembali, meng-copy, menampilkan, mengambil foto ataupun mendistribusikan seluruh maupun sebagian dari dokumen ini dalam bentuk apapun atau media apapun tanpa persetujuan dari pemegang hak cipta.</p>
            <p>Sebelumnya, Bapak dan Ibu Rahayu sudah menjelaskan bahwa ceramah-ceramah yang diberikan merupakan penerimaan dan diberikan sesuai dengan kebutuhan dan kapasitas penonton pada waktu itu. Bapak dan Ibu Rahayu juga menjelaskan bahwa ceramah-ceramah dan tulisan-tulisannya merupakan bimbingan, nasihat dan klarifikasi, bukan merupakan peraturan.</p>
            <p>Surat-surat dari Bapak Muhammad Subuh dan Ibu Rahayu merupakan korespondensi pribadi [dicetak di sini dengan izin dari penanya]. Nasihat dan bimbingan yang diberikan khusus untuk keadaan koresponden.</p>
          </div>
          <div class="verification-container">
            <a href="{{ route('main') }}" class="btn btn-subud btn-default">Setuju</a>
            <a href="{{ URL::previous() }}" class="btn btn-subud btn-danger">Tidak Setuju</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop