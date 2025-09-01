<?php

namespace App\Http\Controllers;

use App\Models\Service;
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

        return view('services.show', compact('service'));
    }

    public function index(): View
    {
        $services = Service::active()->ordered()->get();
        
        return view('services.index', compact('services'));
    }
}
