# Service Pages System - Setup Guide

## Overview
The Service pages system allows you to create one Service page template that works as 14 different pages, each with unique content, meta data, and URLs.

## Quick Setup

1. **Run the setup command:**
   ```bash
   php artisan setup:services
   ```
   This will run migrations and seed 14 default services.

2. **Access Filament Admin:**
   - Go to `/admin/services`
   - You'll see all 14 services ready for editing

## Features

### ✅ One Page Template, 14 Different Services
- **URL Structure**: `/service/family-health-care`, `/service/pediatric-care`, etc.
- **Unique Content**: Each service has its own title, description, and hero background
- **SEO Ready**: Individual meta titles, descriptions, canonical URLs, and robots settings

### ✅ Service Hero Section
- **Height**: 636px as specified
- **Background**: Default `service-cover.png` or custom uploaded image
- **Title Styling**: Cal Sans, 600 weight, 60px, white color, 600px width
- **Description Styling**: Inter, 400 weight, 20px, white color, 150% line-height
- **Fully Responsive**: Adapts to all screen sizes

### ✅ Admin Management via Filament
- **Easy Editing**: Update titles, descriptions, and background images
- **SEO Control**: Meta titles, descriptions, canonical URLs, robots settings
- **Image Upload**: Custom hero backgrounds with automatic optimization
- **Status Control**: Active/inactive services
- **Sorting**: Custom sort order for navigation

## Default Services Created

1. Family Health Care (`/service/family-health-care`)
2. Pediatric Care (`/service/pediatric-care`)
3. Geriatric Medicine (`/service/geriatric-medicine`)
4. Preventive Care (`/service/preventive-care`)
5. Chronic Disease Management (`/service/chronic-disease-management`)
6. Women's Health (`/service/womens-health`)
7. Men's Health (`/service/mens-health`)
8. Mental Health Counseling (`/service/mental-health-counseling`)
9. Urgent Care (`/service/urgent-care`)
10. Diagnostic Services (`/service/diagnostic-services`)
11. Immunizations & Vaccines (`/service/immunizations-vaccines`)
12. Physical Therapy (`/service/physical-therapy`)
13. Nutrition Counseling (`/service/nutrition-counseling`)
14. Telemedicine Services (`/service/telemedicine-services`)

## Navigation Integration

The header navigation automatically includes:
- Services dropdown with top 5 services
- "View All Services" link to `/services`
- Services index page showing all services in a grid

## File Structure

```
app/Models/Service.php                              # Service model
app/Http/Controllers/ServiceController.php         # Service controller
app/Filament/Resources/ServiceResource.php         # Filament admin
database/migrations/..._create_services_table.php  # Database migration
database/seeders/ServiceSeeder.php                 # Default services
resources/views/services/show.blade.php            # Individual service page
resources/views/services/index.blade.php           # All services page
resources/views/components/service-hero.blade.php  # Hero component
public/css/service-hero.css                        # Hero styling
public/css/services-index.css                      # Index page styling
```

## Adding New Services

1. Go to `/admin/services`
2. Click "Create"
3. Fill in:
   - **Title**: Service name (slug auto-generates)
   - **Description**: Service description for hero section
   - **Hero Background**: Optional custom image (2880×1600 recommended)
   - **SEO Fields**: Meta title, description, canonical URL, robots
4. Save and the new service will be available at `/service/your-slug`

## Customization

### Change Default Hero Background
Replace `public/images/service-cover.png` with your default background image.

### Modify Hero Styling
Edit `public/css/service-hero.css` to change fonts, colors, or layout.

### Add Content Sections
You can extend the service pages by adding more content sections below the hero in `resources/views/services/show.blade.php`.

## SEO Features

Each service page includes:
- ✅ **Title Tag**: Customizable or defaults to service title
- ✅ **Meta Description**: Customizable or defaults to service description  
- ✅ **Canonical URL**: Auto-generated or custom
- ✅ **Meta Robots**: Control indexing (index/noindex, follow/nofollow)
- ✅ **Open Graph Tags**: For social media sharing
- ✅ **Twitter Cards**: For Twitter sharing

## URL Examples

- All Services: `https://yoursite.com/services`
- Family Health Care: `https://yoursite.com/service/family-health-care`
- Pediatric Care: `https://yoursite.com/service/pediatric-care`
- Women's Health: `https://yoursite.com/service/womens-health`

## Ready to Use!

The system is now ready. You can:
1. Visit any service URL to see the page
2. Edit content via Filament admin
3. Add new services as needed
4. Customize styling and layout

All 14 services work as separate pages with unique content, but use the same template structure for easy maintenance.
