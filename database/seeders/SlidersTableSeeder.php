<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'Welcome to Echo Edge',
                'subtitle' => 'Your Trusted Tech Partner',
                'description' => 'We provide cutting-edge solutions tailored to your business goals.',
                'button_text' => 'Get Started',
                'button_link' => '/contact',
                'image' => null,
                'order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Transforming Ideas into Reality',
                'subtitle' => 'Web • Mobile • Cloud',
                'description' => 'Custom software development services that help drive innovation and growth.',
                'button_text' => 'View Services',
                'button_link' => '/services',
                'image' => null,
                'order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Build with Confidence',
                'subtitle' => 'Secure, Scalable, Robust',
                'description' => 'Our experts craft scalable platforms that meet your business objectives.',
                'button_text' => 'See Projects',
                'button_link' => '/projects',
                'image' => null,
                'order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('sliders')->insert($sliders);
    }
}
