<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Setting::create([
            'site_name_ar' => 'مركز لياقة بدنية',
            'site_name_en' => 'Fitness Center',
            'site_lang_ar' => 'on',
            'site_lang_en' => 'on',
            'lang_front_button_status' => 'on',
        ]);
    }
}
