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
        $setups = [
            ['key' => 'logo', 'value' => null],
            ['key' => 'favicon', 'value' => null],
            ['key' => 'main_background_image', 'value' => null],
            ['key' => 'footer_background_image', 'value' => null],
            ['key' => 'favicon', 'value' => null],
            ['key' => 'business_name', 'value' => 'Echo Edge'],
            ['key' => 'url', 'value' => 'https://www.myapplication.com'],
            ['key' => 'email', 'value' => 'info@myapplication.com'],
            ['key' => 'address', 'value' => '123 Main Street, Tamale, Ghana'],
            ['key' => 'support_email', 'value' => 'support@myapplication.com'],
            ['key' => 'support_phone', 'value' => '+1234567890'],
            ['key' => 'motto', 'value' => 'We Help your Business Strived'],
            ['key' => 'facebook_link', 'value' => 'facebook.com'],
            ['key' => 'x_link', 'value' => 'x.com'],
            ['key' => 'instagram_link', 'value' => 'instagram.com'],
            ['key' => 'youtube_link', 'value' => 'youtube.com'],
            ['key' => 'timezone', 'value' => 'Africa/Accra'],
            ['key' => 'date_format', 'value' => 'Y-m-d'],
            ['key' => 'time_format', 'value' => 'H:i:s'],
            ['key' => 'default_language', 'value' => 'en'],
            ['key' => 'footer_text', 'value' => 'Echo Edge is a passionate digital solutions provider committed to delivering top-quality web
                            development, branding, and
                            innovative technology services.
                            Our mission is to help businesses grow and succeed in the digital world.'],
            ['key' => 'copy_right_text', 'value' => '© 2025 Echo Edge Digitals. All rights reserved.'],
            ['key' => 'maintenance_mode', 'value' => 'false'],
            ['key' => 'contact_form_email', 'value' => 'support@myapplication.com'],
            ['key' => 'sms_api_key', 'value' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx'],
            ['key' => 'google_analytics_id', 'value' => 'UA-XXXXXXXXX-X'],
            ['key' => 'facebook_pixel_id', 'value' => 'XXXXXXXXXXXXXX'],
            ['key' => 'pagination_limit', 'value' => '10'],
            ['key' => 'max_upload_size', 'value' => '2048'],
            ['key' => 'enable_registration', 'value' => 'true'],
            ['key' => 'recaptcha_site_key', 'value' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx'],
            ['key' => 'recaptcha_secret_key', 'value' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx'],
            ['key' => 'site_description', 'value' => 'A modern platform for business and education management.'],
            ['key' => 'keywords', 'value' => 'Echo Edge, USSD solutions, Web applications Ghana, School management software, Digital solutions Tamale, Laravel development Ghana'],

            // Added entries
            ['key' => 'about_us', 'value' => 'Echo Edge is a forward-thinking tech company providing innovative digital solutions for education and business.'],
            ['key' => 'about_us_sub', 'value' => 'With a focus on user-friendly platforms and automation, we empower institutions and companies to thrive in the digital age.'],
            ['key' => 'mission_statement', 'value' => 'To empower businesses and educational institutions through reliable, modern, and efficient digital tools.'],
            ['key' => 'vision_statement', 'value' => 'To be the leading provider of transformative digital solutions across Africa.'],
            ['key' => 'why_choose_us', 'value' => 'At Echo Edge, we combine innovation, experience, and a passion for technology to deliver digital solutions that make an impact. From web development to strategic consulting, our team is dedicated to exceeding expectations and helping your business grow.'],
            ['key' => 'why_choose_us_points', 'value' => json_encode([
                [
                    'title' => 'Experienced Team',
                    'description' => 'Our skilled professionals bring deep expertise across multiple domains to every project.',
                ],
                [
                    'title' => 'Client-Centered Approach',
                    'description' => 'We listen, understand, and tailor every solution to meet your business goals.',
                ],
                [
                    'title' => 'Proven Results',
                    'description' => 'We deliver results that matter—on time, within budget, and beyond expectations.',
                ],
            ])]
        ];

        foreach ($setups as $setting) {
            DB::table('setups')->updateOrInsert(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
