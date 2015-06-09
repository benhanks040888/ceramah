@extends('layouts.simple')

@section('content')
  <div class="container">
    <div class="text-center">
      <header>
        <h1>Sangkalan</h1>
      </header>
      <p>Dokumen yang tersedia hanya dapat dibaca oleh Anggota Subud [dan patuh pada hak cipta]. Pengguna diminta untuk tidak memodifikasi, memproduksi kembali, meng-copy, menampilkan, mengambil foto ataupun mendistribusikan seluruh maupun sebagian dari dokumen ini dalam bentuk apapun atau media apapun tanpa persetujuan dari pemegang hak cipta.</p>
      <p>Sebelumnya, Bapak dan Ibu Rahayu sudah menjelaskan bahwa ceramah-ceramah yang diberikan merupakan penerimaan dan diberikan sesuai dengan kebutuhan dan kapasitas penonton pada waktu itu. Bapak dan Ibu Rahayu juga menjelaskan bahwa ceramah-ceramah dan tulisan-tulisannya merupakan bimbingan, nasihat dan klarifikasi, bukan merupakan peraturan.</p>
      <p>Surat-surat dari Bapak Muhammad Subuh dan Ibu Rahayu merupakan korespondensi pribadi [dicetak di sini dengan izin dari penanya]. Nasihat dan bimbingan yang diberikan khusus untuk keadaan koresponden.</p>

      <div class="verification-container">
        <a href="{{ route('main') }}" class="btn btn-subud btn-default">Setuju</a>
        <a href="{{ URL::previous() }}" class="btn btn-subud btn-danger">Tidak Setuju</a>
      </div>
    </div>
  </div>
@stop