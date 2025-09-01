<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'slug' => 'family-health-care',
                'title' => 'Family Health Care',
                'description' => 'Comprehensive medical services for every stage of life, from children to seniors, ensuring your family\'s health is always in safe hands.',
                'meta_title' => 'Family Health Care Services - Aitken Grove',
                'meta_description' => 'Comprehensive family health care services for all ages. From children to seniors, ensuring your family\'s health is in safe hands.',
                'button_text' => 'About Our Family Health Care',
                'about_title' => 'We believe good health begins at home. Our family health care services are designed to provide compassionate, continuous, and reliable care for you and your loved ones, no matter the age or stage of life.',
                'sort_order' => 1,
            ],
            [
                'slug' => 'pediatric-care',
                'title' => 'Pediatric Care',
                'description' => 'Specialized medical care for infants, children, and adolescents with a focus on preventive health and developmental milestones.',
                'meta_title' => 'Pediatric Care Services - Aitken Grove',
                'meta_description' => 'Expert pediatric care for infants, children, and teens. Preventive health services and developmental milestone tracking.',
                'button_text' => 'About Our Pediatric Care',
                'about_title' => 'We help you ensure your children receive expert medical guidance and preventive care to support every stage of life with confidence and professional care.',
                'sort_order' => 2,
            ],
            [
                'slug' => 'geriatric-medicine',
                'title' => 'Geriatric Medicine',
                'description' => 'Comprehensive healthcare services tailored specifically for older adults, focusing on age-related health concerns and quality of life.',
                'meta_title' => 'Geriatric Medicine Services - Aitken Grove',
                'meta_description' => 'Specialized geriatric medicine for older adults. Comprehensive care focusing on age-related health and quality of life.',
                'sort_order' => 3,
            ],
            [
                'slug' => 'preventive-care',
                'title' => 'Preventive Care',
                'description' => 'Proactive healthcare services including routine screenings, vaccinations, and health maintenance to prevent illness before it starts.',
                'meta_title' => 'Preventive Care Services - Aitken Grove',
                'meta_description' => 'Proactive preventive healthcare including screenings, vaccinations, and health maintenance to prevent illness.',
                'sort_order' => 4,
            ],
            [
                'slug' => 'chronic-disease-management',
                'title' => 'Chronic Disease Management',
                'description' => 'Ongoing care and support for patients with chronic conditions like diabetes, hypertension, and heart disease to improve quality of life.',
                'meta_title' => 'Chronic Disease Management - Aitken Grove',
                'meta_description' => 'Expert chronic disease management for diabetes, hypertension, heart disease and more. Ongoing care to improve quality of life.',
                'sort_order' => 5,
            ],
            [
                'slug' => 'womens-health',
                'title' => 'Women\'s Health',
                'description' => 'Comprehensive healthcare services for women including reproductive health, prenatal care, and specialized women\'s wellness programs.',
                'meta_title' => 'Women\'s Health Services - Aitken Grove',
                'meta_description' => 'Comprehensive women\'s health services including reproductive health, prenatal care, and specialized wellness programs.',
                'button_text' => 'About Our Women\'s Health',
                'about_title' => 'Our women\'s health services provide confidential, and professional support for pregnancy, unique health concerns, and motherhood and beyond with emotional care.',
                'sort_order' => 6,
            ],
            [
                'slug' => 'mens-health',
                'title' => 'Men\'s Health',
                'description' => 'Specialized healthcare services for men including preventive screenings, testosterone management, and men\'s wellness programs.',
                'meta_title' => 'Men\'s Health Services - Aitken Grove',
                'meta_description' => 'Specialized men\'s health services including preventive screenings, testosterone management, and wellness programs.',
                'sort_order' => 7,
            ],
            [
                'slug' => 'mental-health-counseling',
                'title' => 'Mental Health Counseling',
                'description' => 'Professional mental health services including counseling, therapy, and support for anxiety, depression, and other mental health concerns.',
                'meta_title' => 'Mental Health Counseling - Aitken Grove',
                'meta_description' => 'Professional mental health counseling and therapy for anxiety, depression, and other mental health concerns.',
                'sort_order' => 8,
            ],
            [
                'slug' => 'urgent-care',
                'title' => 'Urgent Care',
                'description' => 'Immediate medical attention for non-emergency conditions including minor injuries, illnesses, and urgent health concerns.',
                'meta_title' => 'Urgent Care Services - Aitken Grove',
                'meta_description' => 'Immediate urgent care for non-emergency conditions including minor injuries, illnesses, and urgent health concerns.',
                'sort_order' => 9,
            ],
            [
                'slug' => 'diagnostic-services',
                'title' => 'Diagnostic Services',
                'description' => 'Advanced diagnostic testing including laboratory services, imaging, and specialized tests to accurately diagnose health conditions.',
                'meta_title' => 'Diagnostic Services - Aitken Grove',
                'meta_description' => 'Advanced diagnostic testing including lab services, imaging, and specialized tests for accurate health condition diagnosis.',
                'sort_order' => 10,
            ],
            [
                'slug' => 'immunizations-vaccines',
                'title' => 'Immunizations & Vaccines',
                'description' => 'Complete vaccination services for all ages including routine immunizations, travel vaccines, and specialized vaccination programs.',
                'meta_title' => 'Immunizations & Vaccines - Aitken Grove',
                'meta_description' => 'Complete vaccination services for all ages including routine immunizations, travel vaccines, and specialized programs.',
                'sort_order' => 11,
            ],
            [
                'slug' => 'physical-therapy',
                'title' => 'Physical Therapy',
                'description' => 'Professional physical therapy services to help patients recover from injuries, manage pain, and improve mobility and function.',
                'meta_title' => 'Physical Therapy Services - Aitken Grove',
                'meta_description' => 'Professional physical therapy to help recover from injuries, manage pain, and improve mobility and function.',
                'sort_order' => 12,
            ],
            [
                'slug' => 'nutrition-counseling',
                'title' => 'Nutrition Counseling',
                'description' => 'Expert nutrition guidance and counseling to help patients achieve optimal health through personalized diet and lifestyle plans.',
                'meta_title' => 'Nutrition Counseling - Aitken Grove',
                'meta_description' => 'Expert nutrition guidance and counseling for optimal health through personalized diet and lifestyle plans.',
                'sort_order' => 13,
            ],
            [
                'slug' => 'telemedicine-services',
                'title' => 'Telemedicine Services',
                'description' => 'Convenient virtual healthcare consultations allowing patients to receive medical care from the comfort of their own homes.',
                'meta_title' => 'Telemedicine Services - Aitken Grove',
                'meta_description' => 'Convenient virtual healthcare consultations. Receive medical care from the comfort of your own home.',
                'sort_order' => 14,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::firstOrCreate(
                ['slug' => $serviceData['slug']],
                $serviceData
            );
        }
    }
}
