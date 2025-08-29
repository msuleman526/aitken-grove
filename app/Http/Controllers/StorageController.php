<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class StorageController extends Controller
{
    /**
     * Serve files from storage with proper error handling
     */
    public function serve(Request $request, $path)
    {
        try {
            $disk = Storage::disk('public');
            
            // Security: Prevent directory traversal
            $path = str_replace(['../', '..\\'], '', $path);
            
            // Check if file exists
            if (!$disk->exists($path)) {
                \Log::warning("Storage file not found: {$path}");
                abort(404, "File not found: {$path}");
            }
            
            $fullPath = $disk->path($path);
            
            // Check if file is readable
            if (!is_readable($fullPath)) {
                \Log::error("Storage file not readable: {$fullPath}");
                abort(403, 'File not accessible');
            }
            
            // Get file information
            $file = new \SplFileInfo($fullPath);
            $extension = strtolower($file->getExtension());
            
            // Define MIME types
            $mimeTypes = [
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
                'webp' => 'image/webp',
                'avif' => 'image/avif',
                'svg' => 'image/svg+xml',
                'css' => 'text/css',
                'js' => 'application/javascript',
                'pdf' => 'application/pdf',
                'txt' => 'text/plain',
            ];
            
            $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';
            
            // Create response with proper headers
            $response = new BinaryFileResponse($fullPath);
            $response->headers->set('Content-Type', $mimeType);
            $response->headers->set('Cache-Control', 'public, max-age=31536000');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            
            return $response;
            
        } catch (\Exception $e) {
            \Log::error("Storage serve error: {$e->getMessage()}", [
                'path' => $path,
                'trace' => $e->getTraceAsString()
            ]);
            
            abort(500, 'Internal server error accessing file');
        }
    }
}
