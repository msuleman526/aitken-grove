@php
$content = $section->content_json ?? [];
$buttonText = $content['button_text'] ?? 'Contact Us';
$titleParts = $content['title_parts'] ?? [
    ['text' => 'We\'re Here', 'color' => '#5EC6C8'],
    ['text' => 'to Help', 'color' => '#000000'],
    ['text' => 'Get in Touch', 'color' => '#E62D5B'],
    ['text' => 'with Us', 'color' => '#000000'],
    ['text' => 'Anytime', 'color' => '#17687F']
];
$description = 'Whether you have a question, need assistance, or want to learn more about our services, we’d love to hear from you. Our team is always ready to provide the support you need and guide you toward the right solution.';
$contactInfo = $content['contact_info'] ?? [
    ['icon' => '/icons/footer/phone.png', 'text' => '+1 234 5678 900'],
    ['icon' => '/icons/footer/mail.png', 'text' => 'aitkengrove@gmail.com'],
    ['icon' => '/icons/footer/location.png', 'text' => '123 Medical District, Health City, HC 12345']
];
$formTitle = $content['form_title'] ?? 'Send Us a Message';
$formDescription = $content['form_description'] ?? 'Fill in the form below and our team will get back to you as soon as possible.';
@endphp

<section class="hero-contact-section">
    <div class="hero-contact-container">
        <!-- Left Column -->
        <div class="left-column">
            <!-- Button -->
            <div class="contact-button">
                {{ $buttonText }}
            </div>
            
            <!-- Title -->
            <div class="contact-title">
                @foreach($titleParts as $part)
                    <span style="color: {{ $part['color'] }}">{{ $part['text'] }}</span>
                    @if(!$loop->last) @endif
                @endforeach
            </div>
            
            <!-- Description -->
            <div class="contact-description">
                {{ $description }}
            </div>
            
            <!-- Contact Info Items -->
            <div class="contact-info">
                @foreach($contactInfo as $info)
                <div class="contact-info-item">
                    <div class="contact-icon">
                        <img src="{{ asset($info['icon']) }}" alt="Contact Icon" />
                    </div>
                    <div class="contact-text">
                        {{ $info['text'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Right Column -->
        <div class="right-column">
            <div class="contact-form-card">
                <!-- Form Title -->
                <div class="form-title">
                    <span style="color: #000000;">Send Us a</span>
                    <span style="color: #E62D5B;"> Message</span>
                </div>
                
                <!-- Form Description -->
                <div class="form-description">
                    {{ $formDescription }}
                </div>
                
                <!-- Contact Form -->
                <div class="contact-form">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" name="fullname" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone No</label>
                        <input type="tel" id="phone" name="phone" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    
                    <button type="submit" class="form-submit-btn">Send Message</button>
                </div>
            </div>
        </div>
    </div>
</section>
