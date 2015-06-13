<div class="container footer-container">
  <footer class="row" id="footer">
    <div class="col-xs-3 col-no-padding" id="title">
      <p>Surat-surat &amp; ceramah-ceramah pilihan<br>Selected letters and talks</p>
    </div>
    
    <div class="col-xs-7" id="copyright">
      <p>
        &copy; 1955-{{ date('Y') }} by Subud Publication. All rights reserved. This site or any portion of its content may not be reproduced or used in any manner whatsoever without the express written permission of the publisher. Subud&reg; and the seven circles symbol are registered marks of the World Subud Association.
      </p>
    </div>

    <div class="col-xs-2" id="language">
      <a class="btn btn-lang @if(Cookie::get('subud_lang') === 'en')btn-active @endif " href="javascript:void(0)" onclick="changeLanguage('en')" role="button">en</a>
      <a class="btn btn-lang @if(Cookie::get('subud_lang') !== 'en')btn-active @endif " href="javascript:void(0)" onclick="changeLanguage('id')" role="button">id</a>
    </div>
  </footer>
</div>

<script>
	function changeLanguage(lang){
		$.ajaxSetup({
		  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url: "{{ URL::route('language') }}",  //Server script to process data
			type: 'POST',
			dataType: 'json',
			data: "lang="+lang,
			cache: false,
			success: function(data){
        if (data.status == 1) {
  				location.reload();
        }
			}
		});
	}
</script>