<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::insert([
            [
                'question' => 'What services do you offer?',
                'answer' => 'We offer a wide range of digital solutions including web design, development, branding, and consulting.',
                'is_active' => true,
            ],
            [
                'question' => 'How can I contact support?',
                'answer' => 'You can reach our support team by emailing support@example.com or calling (123) 456-7890.',
                'is_active' => true,
            ],
            [
                'question' => 'Do you provide custom solutions?',
                'answer' => 'Yes, we specialize in custom software and website solutions tailored to your specific needs.',
                'is_active' => true,
            ],
            [
                'question' => 'What is your project turnaround time?',
                'answer' => 'Project timelines vary depending on complexity, but we typically deliver within 2–6 weeks.',
                'is_active' => true,
            ],
            [
                'question' => 'Can I request revisions?',
                'answer' => 'Absolutely. We offer a set number of revisions based on your package to ensure satisfaction.',
                'is_active' => true,
            ],
            [
                'question' => 'Do you offer ongoing support or maintenance?',
                'answer' => 'Yes, we provide maintenance and support packages to keep your system running smoothly.',
                'is_active' => true,
            ],
        ]);
    }
}
