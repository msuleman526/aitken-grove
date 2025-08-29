<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storage Test Suite - Aitken Grove</title>
    <style>
        body { font-family: 'Inter', Arial, sans-serif; margin: 20px; background: #f8f9fa; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { text-align: center; margin-bottom: 30px; }
        .header h1 { color: #E62D5B; margin-bottom: 5px; }
        .section { margin-bottom: 30px; padding: 20px; border: 1px solid #dee2e6; border-radius: 6px; }
        .section h2 { color: #333; border-bottom: 2px solid #E62D5B; padding-bottom: 10px; }
        .status-good { color: #28a745; font-weight: bold; }
        .status-warn { color: #ffc107; font-weight: bold; }
        .status-error { color: #dc3545; font-weight: bold; }
        .test-result { margin: 10px 0; padding: 10px; border-radius: 4px; }
        .test-result.success { background: #d4edda; border-left: 4px solid #28a745; }
        .test-result.warning { background: #fff3cd; border-left: 4px solid #ffc107; }
        .test-result.error { background: #f8d7da; border-left: 4px solid #dc3545; }
        .file-list { background: #f8f9fa; padding: 15px; border-radius: 4px; margin: 10px 0; }
        .image-test { display: inline-block; margin: 10px; text-align: center; }
        .image-test img { max-width: 200px; max-height: 150px; border: 2px solid #dee2e6; border-radius: 4px; }
        .btn { display: inline-block; padding: 10px 20px; background: #E62D5B; color: white; text-decoration: none; border-radius: 4px; margin: 5px; }
        .btn:hover { background: #c02347; }
        pre { background: #f8f9fa; padding: 10px; border-radius: 4px; overflow-x: auto; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏥 Aitken Grove - Storage Test Suite</h1>
            <p>Comprehensive storage system testing and diagnostics</p>
        </div>

        @php
            use Illuminate\Support\Facades\Storage;
        @endphp

        @try
            {{-- Test 1: Storage Configuration --}}
            <div class="section">
                <h2>📁 Storage Configuration</h2>
                
                @php
                    $publicDisk = Storage::disk('public');
                    $publicRoot = $publicDisk->path('');
                    $publicUrl = $publicDisk->url('');
                @endphp
                
                <div class="test-result success">
                    <strong>✅ Public Disk Configuration</strong><br>
                    Root Path: <code>{{ $publicRoot }}</code><br>
                    Base URL: <code>{{ $publicUrl }}</code>
                </div>
                
        @catch (Exception $e)
            <div class="test-result error">
                <strong>❌ Storage Configuration Error</strong><br>
                {{ $e->getMessage() }}
            </div>
        @endtry
        
        {{-- Test 2: Directory Structure --}}
        <h3>📂 Directory Structure</h3>
        @php
            $directories = [
                'storage/app/public' => storage_path('app/public'),
                'storage/app/public/caring-images' => storage_path('app/public/caring-images'),
                'public/storage' => public_path('storage'),
            ];
        @endphp
        
        @foreach ($directories as $name => $path)
            @if (file_exists($path))
                @php
                    $status = is_dir($path) ? 'directory' : (is_link($path) ? 'symbolic link' : 'file');
                @endphp
                <div class="test-result success">✅ <strong>{{ $name }}</strong>: Exists as {{ $status }}</div>
            @else
                <div class="test-result error">❌ <strong>{{ $name }}</strong>: Missing</div>
            @endif
        @endforeach
        </div>
        
        {{-- Test 3: File Listing --}}
        <div class="section">
            <h2>📋 File Inventory</h2>
            
            @try
                @if ($publicDisk->exists('caring-images'))
                    @php
                        $files = $publicDisk->files('caring-images');
                    @endphp
                    
                    @if (count($files) > 0)
                        <div class="test-result success">
                            <strong>✅ Found {{ count($files) }} files in caring-images:</strong>
                            <div class="file-list">
                                @foreach ($files as $file)
                                    @php
                                        $size = $publicDisk->size($file);
                                        $url = $publicDisk->url($file);
                                    @endphp
                                    <div>📄 <strong>{{ basename($file) }}</strong> ({{ number_format($size) }} bytes)</div>
                                    <div style="margin-left: 20px; font-size: 0.9em; color: #666;">URL: {{ $url }}</div><br>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="test-result warning">⚠️ <strong>caring-images directory is empty</strong></div>
                    @endif
                @else
                    <div class="test-result error">❌ <strong>caring-images directory does not exist</strong></div>
                @endif
            @catch (Exception $e)
                <div class="test-result error">❌ <strong>Error reading files:</strong> {{ $e->getMessage() }}</div>
            @endtry
        </div>
        
        {{-- Test 4: Image Access Test --}}
        <div class="section">
            <h2>🖼️ Image Access Test</h2>
            
            @php
                $testImages = [
                    'caring-images/01K3TBJZZH6CEHWY75HG7CDFPT.jpg',
                    'caring-images/01K3TBJZZH6CEHWY75HG7CDFPT.txt',
                ];
            @endphp
            
            @foreach ($testImages as $testImage)
                @if ($publicDisk->exists($testImage))
                    @php
                        $url = $publicDisk->url($testImage);
                        $fileName = basename($testImage);
                    @endphp
                    
                    @if (pathinfo($testImage, PATHINFO_EXTENSION) === 'jpg')
                        <div class="image-test">
                            <strong>{{ $fileName }}</strong><br>
                            <img src="{{ $url }}" alt="{{ $fileName }}" onerror="this.style.border='2px solid #dc3545'; this.alt='Failed to load';">
                            <br><small>{{ $url }}</small>
                        </div>
                    @else
                        <div class="test-result success">✅ <strong>{{ $fileName }}</strong>: <a href="{{ $url }}" target="_blank">View File</a></div>
                    @endif
                @else
                    <div class="test-result error">❌ <strong>{{ basename($testImage) }}</strong>: File not found</div>
                @endif
            @endforeach
        </div>
        
        {{-- Test 5: Write Test --}}
        <div class="section">
            <h2>✍️ Write Permission Test</h2>
            
            @try
                @php
                    $testFileName = 'write-test-' . date('Y-m-d-H-i-s') . '.txt';
                    $testContent = 'Storage write test at ' . date('Y-m-d H:i:s');
                    
                    $publicDisk->put("caring-images/{$testFileName}", $testContent);
                @endphp
                
                @if ($publicDisk->exists("caring-images/{$testFileName}"))
                    <div class="test-result success">✅ <strong>Write test successful:</strong> Created {{ $testFileName }}</div>
                    
                    @php
                        // Clean up test file
                        $publicDisk->delete("caring-images/{$testFileName}");
                    @endphp
                    <div class="test-result success">✅ <strong>Cleanup successful:</strong> Removed test file</div>
                @else
                    <div class="test-result error">❌ <strong>Write test failed:</strong> Could not create test file</div>
                @endif
            @catch (Exception $e)
                <div class="test-result error">❌ <strong>Write test error:</strong> {{ $e->getMessage() }}</div>
            @endtry
        </div>
        
        {{-- Test 6: URL Generation Test --}}
        <div class="section">
            <h2>🔗 URL Generation Test</h2>
            
            @php
                $samplePaths = [
                    'caring-images/sample.jpg',
                    'caring-images/test.png',
                    'caring-images/01K3TBJZZH6CEHWY75HG7CDFPT.jpg',
                ];
            @endphp
            
            @foreach ($samplePaths as $path)
                @try
                    @php
                        $url = $publicDisk->url($path);
                        $exists = $publicDisk->exists($path) ? 'EXISTS' : 'MISSING';
                        $status = $publicDisk->exists($path) ? 'success' : 'warning';
                    @endphp
                    
                    <div class="test-result {{ $status }}">
                        <strong>{{ basename($path) }}</strong> ({{ $exists }})<br>
                        Generated URL: <code>{{ $url }}</code>
                    </div>
                @catch (Exception $e)
                    <div class="test-result error">❌ <strong>URL generation failed for {{ $path }}:</strong> {{ $e->getMessage() }}</div>
                @endtry
            @endforeach
        </div>
        
        {{-- Test 7: Actions --}}
        <div class="section">
            <h2>🛠️ Quick Actions</h2>
            <a href="{{ url('/') }}" class="btn">🏠 Back to Homepage</a>
            <a href="{{ url('/admin') }}" class="btn">⚙️ Admin Panel</a>
            <a href="{{ url('/debug-storage') }}" class="btn">🔍 Debug Script</a>
            <br><br>
            
            <h3>Manual Actions (run in terminal):</h3>
            <pre>cd C:\laragon\www\aitken-grove
php artisan storage:link
php artisan storage:check
php create-test-image.php</pre>
        </div>
    </div>

    <script>
        // Auto-refresh every 30 seconds
        setTimeout(() => {
            location.reload();
        }, 30000);
        
        console.log('🏥 Aitken Grove Storage Test Suite loaded');
        console.log('Auto-refresh in 30 seconds...');
    </script>
</body>
</html>
