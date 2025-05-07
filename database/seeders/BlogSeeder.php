<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'author_id' => 1,
                'title' => 'The Rise of USSD Voting Systems',
                'slug' => Str::slug('The Rise of USSD Voting Systems'),
                'content' => 'USSD voting is revolutionizing secure, real-time elections, especially in low-connectivity regions.',
                'image' => null,
                'published_at' => Carbon::now(),
                'status' => 'published',
            ],
            [
                'author_id' => 1,
                'title' => '5 Reasons to Invest in Digital Transformation',
                'slug' => Str::slug('5 Reasons to Invest in Digital Transformation'),
                'content' => 'Digital transformation enables businesses to improve efficiency, customer experience, and innovation.',
                'image' => null,
                'published_at' => Carbon::now()->subDays(3),
                'status' => 'published',
            ],
            [
                'author_id' => 1,
                'title' => 'How to Design Scalable Web Applications',
                'slug' => Str::slug('How to Design Scalable Web Applications'),
                'content' => 'Learn the best practices for building web applications that grow with your users and business needs.',
                'image' => null,
                'published_at' => Carbon::now()->subWeek(),
                'status' => 'published',
            ],
            [
                'author_id' => 1,
                'title' => 'Mobile-First Development: Why It Matters in 2025',
                'slug' => Str::slug('Mobile-First Development: Why It Matters in 2025'),
                'content' => 'With more users on mobile, prioritizing mobile-first design ensures accessibility and usability.',
                'image' => null,
                'published_at' => Carbon::now()->subDays(10),
                'status' => 'published',
            ],
            [
                'author_id' => 1,
                'title' => 'Echo Edge’s Approach to Problem Solving',
                'slug' => Str::slug('Echo Edge’s Approach to Problem Solving'),
                'content' => 'At Echo Edge, we combine technology and strategy to provide tailor-made solutions to clients.',
                'image' => null,
                'published_at' => Carbon::now()->subDays(14),
                'status' => 'published',
            ],
        ];

        DB::table('blogs')->insert($blogs);
    }
}
