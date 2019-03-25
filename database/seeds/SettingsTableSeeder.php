<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create(array(
            'site_name' => 'Laravel\'s Blog',
            'address' => 'Croatia, Zagreb',
            'contact_number' => '+385 91 0000 000',
            'contact_email' => 'info@email.com'
        ));
    }
}
