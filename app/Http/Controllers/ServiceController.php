<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function show(Service $service): View
    {
        // Ensure the service is active
        if (!$service->is_active) {
            abort(404);
        }

        // Get testimonials section from home page for reuse on service pages
        $testimonialsSection = Section::where('key', 'testimonials')
            ->where('is_visible', true)
            ->first();

        return view('services.show', compact('service', 'testimonialsSection'));
    }

    public function index(): View
    {
        $services = Service::active()->ordered()->get();
        
        return view('services.index', compact('services'));
    }
}
