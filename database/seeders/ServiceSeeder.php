<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Structural Design',
                'description' => 'Precision engineering for safety and longevity across all structure types.',
                'icon' => 'building-office',
                'order' => 1,
            ],
            [
                'title' => 'Hollow Block Construction',
                'description' => 'Using Grade A blocks that are 3-4x stronger than traditional red bricks.',
                'icon' => 'cube',
                'order' => 2,
            ],
            [
                'title' => 'Architectural Visuals',
                'description' => 'Breathtaking 3D visualizations to help you walk through your dream home before it is built.',
                'icon' => 'photo',
                'order' => 3,
            ],
            [
                'title' => 'Smart Home Setup',
                'description' => 'Automate your lighting, security, and climate with state-of-the-art tech.',
                'icon' => 'cpu-chip',
                'order' => 4,
            ],
            [
                'title' => 'Interior Design',
                'description' => 'Curated spaces reflecting your unique lifestyle with premium materials.',
                'icon' => 'home-modern',
                'order' => 5,
            ],
            [
                'title' => 'Landscaping',
                'description' => 'Rooftop gardens and landscapes that bring nature into your luxury home.',
                'icon' => 'sun',
                'order' => 6,
            ],
        ];

        foreach ($services as $service) {
            \App\Models\Service::updateOrCreate(['title' => $service['title']], $service);
        }
    }
}
