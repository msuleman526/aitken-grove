@php
    // Default counts data if no section provided
    $defaultCounts = [
        ['number' => '15+', 'text' => 'Years of Care'],
        ['number' => '10,000+', 'text' => 'Happy Patients'],
        ['number' => '20+', 'text' => 'Expert Doctors'],
        ['number' => '5-Star', 'text' => 'Patient Reviews']
    ];
    
    // Use section data if available, otherwise use defaults
    $counts = $section && isset($section->content_json['counts']) ? $section->content_json['counts'] : $defaultCounts;
@endphp

<section class="about-counts-section">
    <div class="about-counts-container">
        @foreach($counts as $index => $count)
            <div class="count-box">
                <div class="count-number">{{ $count['number'] }}</div>
                <div class="count-text">{{ $count['text'] }}</div>
            </div>
        @endforeach
    </div>
</section>
