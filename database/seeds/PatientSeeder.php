<?php

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::create(
            attributes: [
                'name' => 'patient',
                'email' => 'patient@admin.com',
                'age' => '30',
                'password' => bcrypt('123456'),
                'status' => 'on',
                'freeze' => 'on',
                'notification_id' => 1,
            ],
        );
    }
}
