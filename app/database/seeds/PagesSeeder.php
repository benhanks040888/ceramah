<?php

use App\Models\Pages;

class PagesSeeder extends Seeder
{
  public function run()
  {
    DB::table('pages')->delete();

    Pages::create(array('section' => 'Tentang Bapak','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    Pages::create(array('section' => 'Kata Pembuka','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    Pages::create(array('section' => 'Sangkalan','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
  }
}