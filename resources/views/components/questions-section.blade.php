@php
    $questionsData = $service->questions_json ?? [];
    $title = $questionsData['title'] ?? 'Frequently Asked Questions';
    $questions = $questionsData['items'] ?? [];
@endphp

<div class="questions-section">
    <div class="questions-container">
        <h2 class="questions-title">
            @if($title === 'Frequently Asked Questions')
                <span style="color: #000000;">Frequently</span> 
                <span style="color: #E62D5B;">Asked Questions</span>
            @else
                {{ $title }}
            @endif
        </h2>
        
        @if(!empty($questions))
            <div class="questions-list">
                @foreach($questions as $index => $item)
                    <div class="question-item" data-question="{{ $index }}">
                        <div class="question-header" onclick="toggleQuestion({{ $index }})">
                            <div class="question-text">{{ $item['question'] }}</div>
                            <div class="question-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32">
                                    <circle cx="16" cy="16" r="16" fill="#E62D5B"/>
                                    <path d="M22 15h-5v-5a1 1 0 0 0-2 0v5h-5a1 1 0 0 0 0 2h5v5a1 1 0 0 0 2 0v-5h5a1 1 0 0 0 0-2z" fill="white"/>
                                </svg>
                            </div>
                        </div>
                        <div class="answer-content" style="display: none;">
                            <p>{{ $item['answer'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Show default questions when no data exists --}}
            <div class="questions-list">
                <div class="question-item" data-question="0">
                    <div class="question-header" onclick="toggleQuestion(0)">
                        <div class="question-text">What services do you provide?</div>
                        <div class="question-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32">
                                <circle cx="16" cy="16" r="16" fill="#E62D5B"/>
                                <path d="M22 15h-5v-5a1 1 0 0 0-2 0v5h-5a1 1 0 0 0 0 2h5v5a1 1 0 0 0 2 0v-5h5a1 1 0 0 0 0-2z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                    <div class="answer-content" style="display: none;">
                        <p>We provide comprehensive healthcare services tailored to meet your medical needs. Please contact us for more information about our specific services.</p>
                    </div>
                </div>
                
                <div class="question-item" data-question="1">
                    <div class="question-header" onclick="toggleQuestion(1)">
                        <div class="question-text">How do I schedule an appointment?</div>
                        <div class="question-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32">
                                <circle cx="16" cy="16" r="16" fill="#E62D5B"/>
                                <path d="M22 15h-5v-5a1 1 0 0 0-2 0v5h-5a1 1 0 0 0 0 2h5v5a1 1 0 0 0 2 0v-5h5a1 1 0 0 0 0-2z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                    <div class="answer-content" style="display: none;">
                        <p>You can schedule an appointment by calling our office or using our online booking system. Our staff will help you find a convenient time that works with your schedule.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<script>
function toggleQuestion(index) {
    const questionItem = document.querySelector(`[data-question="${index}"]`);
    const answerContent = questionItem.querySelector('.answer-content');
    const icon = questionItem.querySelector('.question-icon svg');
    
    if (answerContent.style.display === 'none' || answerContent.style.display === '') {
        // Show answer
        answerContent.style.display = 'block';
        icon.style.transform = 'rotate(45deg)';
    } else {
        // Hide answer
        answerContent.style.display = 'none';
        icon.style.transform = 'rotate(0deg)';
    }
}
</script>
