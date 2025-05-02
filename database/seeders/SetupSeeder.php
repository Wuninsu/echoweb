<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'logo', 'value' => null],
            ['key' => 'favicon', 'value' => null],
            ['key' => 'business_name', 'value' => 'Echo Edge'],
            ['key' => 'url', 'value' => 'https://www.myapplication.com'],
            ['key' => 'email', 'value' => 'info@myapplication.com'],
            ['key' => 'address', 'value' => '123 Main Street, Tamale, Ghana'],
            ['key' => 'phone', 'value' => '0554234794'],
            ['key' => 'phone2', 'value' => '0200041225'],
            ['key' => 'motto', 'value' => 'We Help your Business Strived'],
            ['key' => 'note', 'value' => 'This system is designed to streamline and automate key administrative and academic processes within a school'],
            ['key' => 'paystack_secret_key', 'value' => 'sk_test_xxxxxxxxxxxxxxxxxxxxxx'],
            ['key' => 'facebook_link', 'value' => null],
            ['key' => 'x_link', 'value' => null],
            ['key' => 'instagram', 'value' => null],
            ['key' => 'timezone', 'value' => 'Africa/Accra'],
            ['key' => 'date_format', 'value' => 'Y-m-d'],
            ['key' => 'time_format', 'value' => 'H:i:s'],
            ['key' => 'default_language', 'value' => 'en'],
            ['key' => 'footer_text', 'value' => '© 2025 My Application. All rights reserved.'],
            ['key' => 'maintenance_mode', 'value' => 'false'],
            ['key' => 'contact_form_email', 'value' => 'support@myapplication.com'],
            ['key' => 'sms_api_key', 'value' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx'],
            ['key' => 'google_analytics_id', 'value' => 'UA-XXXXXXXXX-X'],
            ['key' => 'facebook_pixel_id', 'value' => 'XXXXXXXXXXXXXX'],
            ['key' => 'default_avatar', 'value' => 'default-avatar.png'],
            ['key' => 'pagination_limit', 'value' => '10'],
            ['key' => 'max_upload_size', 'value' => '2048'],
            ['key' => 'enable_registration', 'value' => 'true'],
            ['key' => 'support_email', 'value' => 'support@myapplication.com'],
            ['key' => 'support_phone', 'value' => '+1234567890'],
            ['key' => 'recaptcha_site_key', 'value' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx'],
            ['key' => 'recaptcha_secret_key', 'value' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx'],

        ];
        foreach ($settings as $setting) {
            DB::table('setups')->updateOrInsert(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
