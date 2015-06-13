@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="content-disclaimer">
      <div class="row">
        <div class="col-xs-12 text-center disclaimer-container">
          <div class="disclaimer copy-base">
            <header>
              <h3>Sangkalan</h3>
              {{-- Disclaimer --}}
            </header>
            <p>Dokumen yang tersedia hanya dapat dibaca oleh Anggota Subud [dan patuh pada hak cipta]. Pengguna diminta untuk tidak memodifikasi, memproduksi kembali, meng-copy, menampilkan, mengambil foto ataupun mendistribusikan seluruh maupun sebagian dari dokumen ini dalam bentuk apapun atau media apapun tanpa persetujuan dari pemegang hak cipta.</p>
            <p>Sebelumnya, Bapak dan Ibu Rahayu sudah menjelaskan bahwa ceramah-ceramah yang diberikan merupakan penerimaan dan diberikan sesuai dengan kebutuhan dan kapasitas penonton pada waktu itu. Bapak dan Ibu Rahayu juga menjelaskan bahwa ceramah-ceramah dan tulisan-tulisannya merupakan bimbingan, nasihat dan klarifikasi, bukan merupakan peraturan.</p>
            <p>Surat-surat dari Bapak Muhammad Subuh dan Ibu Rahayu merupakan korespondensi pribadi [dicetak di sini dengan izin dari penanya]. Nasihat dan bimbingan yang diberikan khusus untuk keadaan koresponden.</p>

            {{-- <p>The documents you are about to access, is for viewing by Subud members only and is subject to copyright. You are politely reminded not to modify, reproduce, copy, display, photograph or distribute all or parts of the documents in any form or through any medium without the prior consent of the copyright owner.</p>

            <p>Bapak Muhammad Subuh and Ibu Rahayu have previously explained that their talks were received and provided to suit the needs and capacity of the relevant audience. They have also explained that their talks and writings are guidance, advice and clarifications, rather than rules.</p>

            <p>The selected letters constitute private correspondence. The advice and guidance therein may be specific to the circumstances of the correspondent.</p> --}}

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