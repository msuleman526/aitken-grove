# 🏥 Aitken Grove Medical Center - Landing Page CMS

A Laravel-based Content Management System for the Aitken Grove Medical Center website, built with Filament v3 for easy content editing.

## ✨ Features

- **🎨 Modern Landing Page**: Responsive design with modular sections
- **📝 Content Management**: Easy-to-use Filament admin panel
- **🔧 Modular Sections**: Pre-built sections including Trust, Features, Testimonials, etc.
- **📱 Mobile Responsive**: Optimized for all device sizes
- **⚡ Fast & Optimized**: Built with Laravel 10/11 and modern web standards

## 🚀 Quick Setup

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Database Setup
```bash
# Configure your database in .env file
php artisan migrate
php artisan db:seed
```

### 4. Build Assets
```bash
npm run build
# or for development
npm run dev
```

### 5. Create Filament Admin User
```bash
php artisan make:filament-user
```

## 📖 Content Management

### Default Content
The system comes with pre-seeded content including:
- **Trust Section**: "Care You Can Trust" with 5 trust points
- **Default Home Page**: Ready-to-use landing page structure

### Accessing Admin Panel
1. Visit `/admin` on your site
2. Log in with your Filament admin credentials
3. Navigate to **Sections** to edit content

### Available Sections
- 🏥 **Trust Section** - Build patient confidence
- ⭐ **Features Section** - Highlight key services
- 💬 **Testimonials** - Patient reviews
- 💰 **Pricing** - Service pricing tables
- ❓ **FAQ** - Common questions
- 📞 **CTA Banner** - Call-to-action sections

## 🛠️ Development

### Project Structure
```
📁 resources/views/
├── 📁 components/          # Reusable section components
│   ├── trust-section.blade.php
│   ├── caring-section.blade.php
│   └── ...
├── 📁 landing/            # Landing page views
│   └── index.blade.php
└── 📁 layouts/            # Base layouts

📁 public/
├── 📁 css/               # Section-specific stylesheets
├── 📁 images/            # Images and media
└── 📁 icons/             # Icon assets

📁 app/Filament/Resources/ # Admin panel configuration
```

### Adding New Sections
1. Add section key to `SectionResource.php`
2. Create Blade component in `resources/views/components/`
3. Add CSS file in `public/css/`
4. Update landing page to include new section

### Design System
- **Primary Color**: `#E62D5B`
- **Secondary Color**: `#FFFFFF`
- **Accent Color**: `#000000`
- **Max Width**: `1440px`
- **Fonts**: 
  - Primary: Cal Sans (headings)
  - Secondary: Inter (body text)

## 📝 Commands

### Regenerate Landing Page Content
```bash
php artisan landing:seed
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## 🎯 Trust Section Details

The Trust section (`Care You Can Trust`) includes:
- **Height**: 689px
- **Background**: `#F5F5F5`
- **Layout**: Two-column (content left, image right)
- **Icons**: 60x60px trust icons (trust1.png to trust5.png)
- **Typography**: Cal Sans for titles, Inter for descriptions

### Default Trust Points
1. 100+ Specialist Doctors
2. 20+ Years of Excellence  
3. Same-Day Appointments
4. Modern Facilities & Equipment
5. Comprehensive Healthcare

## 📱 Responsive Breakpoints
- **Desktop**: 1200px+
- **Tablet**: 768px - 1199px
- **Mobile**: < 768px

## 🔒 Security
- Built on Laravel's secure foundation
- Filament admin panel with role-based access
- Input validation and sanitization

## 📄 License
This project is proprietary software for Aitken Grove Medical Center.

---

**Need help?** Check the knowledge base document or contact the development team.
