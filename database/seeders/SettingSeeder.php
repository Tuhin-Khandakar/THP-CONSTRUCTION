<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General
            [
                'key' => 'site_logo',
                'value' => null,
                'type' => 'image',
                'label' => 'Site Logo',
                'group' => 'general',
            ],
            [
                'key' => 'site_favicon',
                'value' => null,
                'type' => 'image',
                'label' => 'Site Favicon',
                'group' => 'general',
            ],
            [
                'key' => 'site_name',
                'value' => 'THP Construction',
                'type' => 'text',
                'label' => 'Site Name',
                'group' => 'general',
            ],
            
            // About Page
            [
                'key' => 'about_title',
                'value' => 'Beyond Brick & Mortar.',
                'type' => 'text',
                'label' => 'About Title',
                'group' => 'about',
            ],
            [
                'key' => 'about_subtitle',
                'value' => 'THE MISSION',
                'type' => 'text',
                'label' => 'About Subtitle',
                'group' => 'about',
            ],
            [
                'key' => 'about_description',
                'value' => 'THP Construction was founded on the principle that modern luxury shouldn\'t be exclusive. By combining advanced engineering like Concrete Hollow Blocks with timeless European aesthetics, we build homes that last for generations.',
                'type' => 'textarea',
                'label' => 'About Description',
                'group' => 'about',
            ],
            [
                'key' => 'about_image_1',
                'value' => null,
                'type' => 'image',
                'label' => 'About Main Image',
                'group' => 'about',
            ],
            
            // Founder Section
            [
                'key' => 'founder_name',
                'value' => 'Engr. Tasnim Haque Pranto',
                'type' => 'text',
                'label' => 'Founder Name',
                'group' => 'founder',
            ],
            [
                'key' => 'founder_title',
                'value' => 'BSC CIVIL ENGINEERING',
                'type' => 'text',
                'label' => 'Founder Title',
                'group' => 'founder',
            ],
            [
                'key' => 'founder_bio',
                'value' => 'As a civil engineer, my vision for THP was never just about building structures. It was about solving the core issues of Bangladeshi construction: high costs, weak traditional bricks, and outdated designs.',
                'type' => 'textarea',
                'label' => 'Founder Bio',
                'group' => 'founder',
            ],
            [
                'key' => 'founder_image',
                'value' => null,
                'type' => 'image',
                'label' => 'Founder Image',
                'group' => 'founder',
            ],
            [
                'key' => 'founder_signature',
                'value' => null,
                'type' => 'image',
                'label' => 'Founder Signature',
                'group' => 'founder',
            ],

            // Hero Section
            [
                'key' => 'hero_title',
                'value' => 'Architectural Excellence For Modern Living.',
                'type' => 'text',
                'label' => 'Hero Title',
                'group' => 'home',
            ],
            [
                'key' => 'hero_subtitle',
                'value' => 'Modern Luxury Within Reach',
                'type' => 'text',
                'label' => 'Hero Subtitle',
                'group' => 'home',
            ],
            [
                'key' => 'hero_description',
                'value' => 'Specializing in Concrete Hollow Block construction — 4x stronger, eco-friendly, and European-inspired designs for the discerning homeowner.',
                'type' => 'textarea',
                'label' => 'Hero Description',
                'group' => 'home',
            ],
            [
                'key' => 'hero_image',
                'value' => null,
                'type' => 'image',
                'label' => 'Hero Background Image',
                'group' => 'home',
            ],

            // Expertise Section
            [
                'key' => 'expertise_title',
                'value' => 'Comprehensive Solutions for Luxury Construction.',
                'type' => 'text',
                'label' => 'Expertise Title',
                'group' => 'home',
            ],
            [
                'key' => 'expertise_subtitle',
                'value' => 'Our Expertise',
                'type' => 'text',
                'label' => 'Expertise Subtitle',
                'group' => 'home',
            ],

            // Stats Section
            [
                'key' => 'stats_projects',
                'value' => '150',
                'type' => 'text',
                'label' => 'Stats: Projects Done',
                'group' => 'home',
            ],
            [
                'key' => 'stats_strength',
                'value' => '300',
                'type' => 'text',
                'label' => 'Stats: More Strength (%)',
                'group' => 'home',
            ],
            [
                'key' => 'stats_warranty',
                'value' => '100',
                'type' => 'text',
                'label' => 'Stats: Warranty Years',
                'group' => 'home',
            ],
            [
                'key' => 'stats_clients',
                'value' => '250',
                'type' => 'text',
                'label' => 'Stats: Happy Clients',
                'group' => 'home',
            ],

            // Portfolio Section
            [
                'key' => 'portfolio_title',
                'value' => 'Selected Masterpieces',
                'type' => 'text',
                'label' => 'Portfolio Title',
                'group' => 'home',
            ],
            [
                'key' => 'portfolio_subtitle',
                'value' => 'Portfolio',
                'type' => 'text',
                'label' => 'Portfolio Subtitle',
                'group' => 'home',
            ],

            // CTA Section
            [
                'key' => 'cta_title',
                'value' => 'Ready to Build Your Legacy Project?',
                'type' => 'text',
                'label' => 'CTA Title',
                'group' => 'home',
            ],
            [
                'key' => 'cta_description',
                'value' => 'Join 250+ homeowners who trusted THP for structural integrity and modern architectural beauty.',
                'type' => 'textarea',
                'label' => 'CTA Description',
                'group' => 'home',
            ],

            // Contact Page
            [
                'key' => 'contact_title',
                'value' => 'Let\'s Build It Together',
                'type' => 'text',
                'label' => 'Contact Title',
                'group' => 'contact',
            ],
            [
                'key' => 'contact_description',
                'value' => 'Have a project in mind? Reach out to start your journey towards a modern luxury home.',
                'type' => 'textarea',
                'label' => 'Contact Description',
                'group' => 'contact',
            ],
            [
                'key' => 'contact_whatsapp',
                'value' => '+880 1625 412437',
                'type' => 'text',
                'label' => 'WhatsApp Number',
                'group' => 'contact',
            ],
            [
                'key' => 'contact_email',
                'value' => 'haqtasnim21@gmail.com',
                'type' => 'text',
                'label' => 'Contact Email',
                'group' => 'contact',
            ],
            [
                'key' => 'contact_address',
                'value' => '48/1 Satirpara, Narsingdi Sadar, Dhaka, Bangladesh.',
                'type' => 'textarea',
                'label' => 'Contact Address',
                'group' => 'contact',
            ],

            // Projects Page
            [
                'key' => 'projects_title',
                'value' => 'Our Architectural Masterpieces',
                'type' => 'text',
                'label' => 'Projects Page Title',
                'group' => 'projects',
            ],
            [
                'key' => 'projects_description',
                'value' => 'Explore our portfolio of modern luxury homes and commercial structures built with precision.',
                'type' => 'textarea',
                'label' => 'Projects Page Description',
                'group' => 'projects',
            ],

            // Blogs Page
            [
                'key' => 'blogs_title',
                'value' => 'Construction Insights & Updates',
                'type' => 'text',
                'label' => 'Blogs Page Title',
                'group' => 'blogs',
            ],
            [
                'key' => 'blogs_description',
                'value' => 'Stay updated with the latest trends in modern architecture and construction technology.',
                'type' => 'textarea',
                'label' => 'Blogs Page Description',
                'group' => 'blogs',
            ],

            // Footer
            [
                'key' => 'footer_about',
                'value' => '"Modern Luxury Within Reach" — Lead by Engr. Tasnim Haque Pranto, we redefine construction with European elegance and local resilience.',
                'type' => 'textarea',
                'label' => 'Footer About Text',
                'group' => 'footer',
            ],
            [
                'key' => 'footer_facebook',
                'value' => 'https://facebook.com/thpconstruction2026',
                'type' => 'text',
                'label' => 'Facebook URL',
                'group' => 'footer',
            ],
            [
                'key' => 'footer_copyright',
                'value' => 'THP Construction. All rights reserved. Designed for Excellence.',
                'type' => 'text',
                'label' => 'Copyright Text',
                'group' => 'footer',
            ],

            // About Page - Hollow Block
            [
                'key' => 'hb_title',
                'value' => 'Why Concrete Hollow Blocks?',
                'type' => 'text',
                'label' => 'Hollow Block Title',
                'group' => 'about',
            ],
            [
                'key' => 'hb_subtitle',
                'value' => 'The future of construction is here. Stronger, Faster, Greener.',
                'type' => 'textarea',
                'label' => 'Hollow Block Subtitle',
                'group' => 'about',
            ],
            [
                'key' => 'hb_card1_title',
                'value' => 'Superior Strength',
                'type' => 'text',
                'label' => 'HB Card 1 Title',
                'group' => 'about',
            ],
            [
                'key' => 'hb_card1_text',
                'value' => 'Our Grade A blocks withstand 3x-4x more pressure than traditional red bricks, ensuring a lifetime of safety.',
                'type' => 'textarea',
                'label' => 'HB Card 1 Text',
                'group' => 'about',
            ],
            [
                'key' => 'hb_card2_title',
                'value' => 'Thermal Insulation',
                'type' => 'text',
                'label' => 'HB Card 2 Title',
                'group' => 'about',
            ],
            [
                'key' => 'hb_card2_text',
                'value' => 'Hollow cores trap air, providing natural insulation that keeps your home 5°C cooler in summer.',
                'type' => 'textarea',
                'label' => 'HB Card 2 Text',
                'group' => 'about',
            ],
            [
                'key' => 'hb_card3_title',
                'value' => 'Eco-Friendly',
                'type' => 'text',
                'label' => 'HB Card 3 Title',
                'group' => 'about',
            ],
            [
                'key' => 'hb_card3_text',
                'value' => 'Reduces topsoil depletion and coal burning. Our blocks are the greener choice for a better Bangladesh.',
                'type' => 'textarea',
                'label' => 'HB Card 3 Text',
                'group' => 'about',
            ],

            // About Page - Team
            [
                'key' => 'team_title',
                'value' => 'Meet The Experts',
                'type' => 'text',
                'label' => 'Team Title',
                'group' => 'about',
            ],
            [
                'key' => 'team_description',
                'value' => 'The passionate professionals who turn your dreams into reality.',
                'type' => 'textarea',
                'label' => 'Team Description',
                'group' => 'about',
            ],

            // Services Page
            [
                'key' => 'services_title',
                'value' => 'Architectural & Engineering Services',
                'type' => 'text',
                'label' => 'Services Page Title',
                'group' => 'services',
            ],
            [
                'key' => 'services_description',
                'value' => 'From initial soil testing to final interior touches, we provide a complete end-to-end ecosystem for luxury construction.',
                'type' => 'textarea',
                'label' => 'Services Page Description',
                'group' => 'services',
            ],
            [
                'key' => 'packages_title',
                'value' => 'Building Packages',
                'type' => 'text',
                'label' => 'Packages Section Title',
                'group' => 'services',
            ],
            [
                'key' => 'packages_description',
                'value' => 'Transparent pricing for premium construction. All packages include modern finishing.',
                'type' => 'textarea',
                'label' => 'Packages Section Description',
                'group' => 'services',
            ],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
