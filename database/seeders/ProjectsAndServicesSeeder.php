<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class ProjectsAndServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Services
        $services = [
            [
                'title' => 'Web Development',
                'description' => 'We create responsive and secure web applications tailored to client needs.',
                'icon' => 'fa fa-code'
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Cross-platform mobile applications for Android and iOS devices.',
                'icon' => 'fa fa-mobile-alt'
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'SEO, SEM, and social media marketing to grow your business online.',
                'icon' => 'fa fa-bullhorn'
            ],
            [
                'title' => 'USSD Application Development',
                'description' => 'Interactive USSD systems for surveys, voting, payments, and service delivery.',
                'icon' => 'fa fa-th'
            ],
            [
                'title' => 'Custom Software Solutions',
                'description' => 'Tailored solutions for businesses such as CRMs, ERPs, and inventory systems.',
                'icon' => 'fa fa-cogs'
            ],
            [
                'title' => 'School Management Systems',
                'description' => 'Manage student records, attendance, results, and communication in one platform.',
                'icon' => 'fa fa-graduation-cap'
            ],
        ];

        DB::table('services')->insert($services);

        // Projects
        $projects = [
            [
                'title' => 'E-Commerce Website',
                'slug' => Str::slug('E-Commerce Website'),
                'description' => 'Online store with product catalog, cart, checkout, and payment gateway.',
                'client' => 'AfroMart Ltd.',
                'start_date' => '2024-01-10',
                'end_date' => '2024-03-15',
                'status' => 'completed',
                'service_id' => 1,
                'featured' => true,
                'url' => 'https://afromart.com',
                'technologies' => 'PHP, MySQL, JavaScript',
                'is_visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'USSD Voting System',
                'slug' => Str::slug('USSD Voting System'),
                'description' => 'A secure and fast voting system using USSD technology for real-time results.',
                'client' => 'National Youth Council',
                'start_date' => '2024-09-01',
                'end_date' => '2024-10-01',
                'status' => 'completed',
                'service_id' => 4,
                'featured' => false,
                'url' => 'https://voting.system.com',
                'technologies' => 'PHP, MySQL, USSD',
                'is_visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'School Management System',
                'slug' => Str::slug('School Management System'),
                'description' => 'Comprehensive school admin panel with student/teacher dashboards.',
                'client' => 'Bright Future Academy',
                'start_date' => '2025-01-05',
                'end_date' => null,
                'status' => 'ongoing',
                'service_id' => 6,
                'featured' => true,
                'url' => 'https://brightfutureacademy.com',
                'technologies' => 'Laravel, MySQL, Vue.js',
                'is_visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Freelancer Portfolio Website',
                'slug' => Str::slug('Freelancer Portfolio Website'),
                'description' => 'Clean and modern portfolio to showcase personal projects and services.',
                'client' => 'Fuseini Abdul-Hafiz',
                'start_date' => '2025-02-01',
                'end_date' => '2025-02-15',
                'status' => 'completed',
                'service_id' => 1,
                'featured' => false,
                'url' => 'https://fuseiniportfolio.com',
                'technologies' => 'HTML, CSS, JavaScript',
                'is_visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'NGO Donation Platform',
                'slug' => Str::slug('NGO Donation Platform'),
                'description' => 'Donation platform with online payment, donor records, and analytics.',
                'client' => 'Hope for All Foundation',
                'start_date' => '2024-07-01',
                'end_date' => '2024-09-10',
                'status' => 'completed',
                'service_id' => 2,
                'featured' => false,
                'url' => 'https://hopeforallfoundation.com',
                'technologies' => 'React, Node.js, MongoDB',
                'is_visible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('projects')->insert($projects);
    }
}
