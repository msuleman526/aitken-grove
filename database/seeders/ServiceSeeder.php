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
                'why_choose_json' => [
                    'title' => 'Why Choose Our Family Health Care?',
                    'description' => 'We understand that every family deserves care that is reliable, personal, and convenient. Here\'s why families trust us:',
                    'points' => [
                        ['text' => 'Personalized care plans for every family member'],
                        ['text' => 'Preventive screenings and regular check-ups'],
                        ['text' => 'Experienced doctors across multiple specialties'],
                        ['text' => 'A caring, supportive, and family-friendly environment'],
                        ['text' => 'Convenient appointment scheduling and ongoing support']
                    ]
                ],
                'consultant_json' => [
                    'title' => 'Start Your Family\'s Care Today',
                    'description' => 'Take the first step toward better family health. Our dedicated doctors are here to provide personalized care and guidance.'
                ],
                'questions_json' => [
                    'title' => 'Frequently Asked Questions',
                    'items' => [
                        [
                            'question' => 'What ages do you provide family health care for?',
                            'answer' => 'We provide comprehensive health care for all ages, from newborns to seniors. Our family-focused approach ensures everyone in your family receives age-appropriate, personalized medical care.'
                        ],
                        [
                            'question' => 'Can I book an appointment for multiple family members at once?',
                            'answer' => 'Yes, we offer convenient family appointment scheduling. You can book appointments for multiple family members on the same day or coordinate visits to make healthcare management easier for busy families.'
                        ],
                        [
                            'question' => 'Do you offer preventive check-ups and screenings?',
                            'answer' => 'Absolutely. We provide comprehensive preventive care including routine check-ups, screenings, vaccinations, and health assessments to help prevent illness and maintain optimal health for your entire family.'
                        ],
                        [
                            'question' => 'Will I see the same doctor each time?',
                            'answer' => 'We strive to provide continuity of care by assigning you to a primary care physician. While we cannot guarantee the same doctor for every visit, our team works together to ensure consistent, coordinated care for your family.'
                        ],
                        [
                            'question' => 'Do you accept walk-in patients?',
                            'answer' => 'We primarily operate by appointment to ensure dedicated time for each patient. However, we do accommodate urgent situations and same-day appointments when possible. Please call ahead to check availability.'
                        ]
                    ]
                ],
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
                'why_choose_json' => [
                    'title' => 'Why Choose Our Pediatric Care?',
                    'description' => 'We understand that your children deserve specialized care that is gentle, comprehensive, and tailored to their unique needs.',
                    'points' => [
                        ['text' => 'Specialized care for infants, children, and adolescents'],
                        ['text' => 'Comprehensive developmental milestone tracking'],
                        ['text' => 'Gentle, child-friendly approach to medical care'],
                        ['text' => 'Preventive health services and immunizations'],
                        ['text' => 'Family-centered care with parent education and support']
                    ]
                ],
                'consultant_json' => [
                    'title' => 'Give Your Child the Best Care',
                    'description' => 'Schedule a consultation with our pediatric specialists and ensure your child\'s health and development are on track.'
                ],
                'questions_json' => [
                    'title' => 'Frequently Asked Questions',
                    'items' => [
                        [
                            'question' => 'What age range do your pediatric services cover?',
                            'answer' => 'Our pediatric care services are designed for infants, children, and adolescents from birth to 18 years old. We provide specialized care tailored to each developmental stage.'
                        ],
                        [
                            'question' => 'How often should my child have check-ups?',
                            'answer' => 'We recommend regular well-child visits according to pediatric guidelines: more frequent visits in the first year, then annually. Our team will provide a personalized schedule based on your child\'s specific needs.'
                        ],
                        [
                            'question' => 'Do you provide immunizations and vaccines?',
                            'answer' => 'Yes, we provide all routine childhood immunizations according to the recommended vaccination schedule, plus any additional vaccines your child may need for travel or specific health conditions.'
                        ],
                        [
                            'question' => 'Can parents stay with their child during appointments?',
                            'answer' => 'Absolutely. We encourage parent participation in all pediatric appointments. Your presence helps comfort your child and enables better communication about their health and care.'
                        ],
                        [
                            'question' => 'What should I expect during my child\'s first visit?',
                            'answer' => 'The first visit includes a comprehensive health assessment, discussion of medical history, physical examination, and development of a personalized care plan. We\'ll also answer any questions you have about your child\'s health.'
                        ]
                    ]
                ],
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
                'why_choose_json' => [
                    'title' => 'Why Choose Our Women\'s Health Care?',
                    'description' => 'We understand that women have unique health needs that require specialized, compassionate, and comprehensive care.',
                    'points' => [
                        ['text' => 'Comprehensive reproductive health services'],
                        ['text' => 'Expert prenatal and postnatal care'],
                        ['text' => 'Confidential and supportive environment'],
                        ['text' => 'Specialized women\'s wellness programs'],
                        ['text' => 'Emotional and psychological support throughout care']
                    ]
                ],
                'consultant_json' => [
                    'title' => 'Your Health Journey Starts Here',
                    'description' => 'Book a consultation with our women\'s health specialists for personalized care throughout every stage of your life.'
                ],
                'questions_json' => [
                    'title' => 'Frequently Asked Questions',
                    'items' => [
                        [
                            'question' => 'What women\'s health services do you offer?',
                            'answer' => 'We provide comprehensive women\'s health services including reproductive health care, prenatal and postnatal care, gynecological exams, contraception counseling, and specialized wellness programs for women.'
                        ],
                        [
                            'question' => 'Do you provide prenatal care and delivery services?',
                            'answer' => 'We offer comprehensive prenatal care throughout pregnancy, including regular check-ups, screenings, and support. For delivery, we coordinate with trusted hospital partners and specialists to ensure the best care.'
                        ],
                        [
                            'question' => 'Are your consultations confidential?',
                            'answer' => 'Absolutely. All women\'s health consultations are completely confidential. We provide a safe, supportive environment where you can discuss sensitive health matters with complete privacy and professional discretion.'
                        ],
                        [
                            'question' => 'Do you offer family planning counseling?',
                            'answer' => 'Yes, we provide comprehensive family planning services including contraception counseling, fertility guidance, and reproductive health planning to help you make informed decisions about your family\'s future.'
                        ],
                        [
                            'question' => 'What age should women start regular gynecological exams?',
                            'answer' => 'We generally recommend women begin regular gynecological exams around age 18 or when they become sexually active, whichever comes first. We\'ll work with you to determine the appropriate schedule for your individual needs.'
                        ]
                    ]
                ],
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
