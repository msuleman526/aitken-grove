#!/bin/bash

# Questions Section Setup Script
# Run this from your Laravel root directory: C:\laragon\www\aitken-grove

echo "=== Setting up Questions Section ==="
echo ""

echo "1. Running migration to add questions_json column..."
php artisan migrate --force

echo ""
echo "2. Seeding services with questions data..."
php artisan db:seed --class=ServiceSeeder --force

echo ""
echo "3. Clearing cache..."
php artisan cache:clear

echo ""
echo "4. Optimizing application..."
php artisan optimize:clear

echo ""
echo "=== Setup Complete! ==="
echo "The Questions section should now work properly."
echo "Visit any service page to see the FAQ section."
echo ""
echo "To customize questions:"
echo "1. Go to Admin Panel > Services"
echo "2. Edit any service"
echo "3. Scroll to 'Questions Section'"
echo "4. Add your custom Q&A"
