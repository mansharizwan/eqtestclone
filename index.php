<?php
// db.php - Database configuration
$servername = "localhost";
$username = "ufmo7njmacww5";
$password = "11sfr0qvmbjh";
$dbname = "db42k5g1pigsit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emotional Intelligence (EQ) Test</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #333;
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 800px;
            overflow: hidden;
            position: relative;
        }
        
        .header {
            background: linear-gradient(to right, #4b6cb7, #182848);
            color: white;
            padding: 25px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .content {
            padding: 30px;
        }
        
        .btn {
            display: inline-block;
            background: linear-gradient(to right, #4b6cb7, #182848);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        .btn-secondary {
            background: #e0e0e0;
            color: #333;
        }
        
        .btn-secondary:hover {
            background: #d0d0d0;
        }
        
        /* Homepage Styles */
        .intro {
            line-height: 1.8;
            margin-bottom: 30px;
        }
        
        .intro p {
            margin-bottom: 15px;
            font-size: 1.1rem;
        }
        
        .features {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 30px 0;
        }
        
        .feature {
            flex: 1;
            min-width: 200px;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .feature h3 {
            color: #4b6cb7;
            margin-bottom: 10px;
        }
        
        /* Quiz Styles */
        .question-container {
            margin-bottom: 25px;
        }
        
        .question-number {
            font-weight: bold;
            color: #4b6cb7;
            margin-bottom: 5px;
        }
        
        .question-text {
            font-size: 1.2rem;
            margin-bottom: 20px;
            line-height: 1.5;
        }
        
        .options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        
        .option {
            padding: 15px;
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .option:hover {
            background: #e9ecef;
            border-color: #4b6cb7;
        }
        
        .option.selected {
            background: #d0e1ff;
            border-color: #4b6cb7;
            font-weight: bold;
        }
        
        .quiz-controls {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        
        .progress-bar {
            height: 10px;
            background: #e9ecef;
            border-radius: 5px;
            margin: 20px 0;
            overflow: hidden;
        }
        
        .progress {
            height: 100%;
            background: linear-gradient(to right, #4b6cb7, #182848);
            width: 0%;
            transition: width 0.3s ease;
        }
        
        /* Results Styles */
        .result-container {
            text-align: center;
        }
        
        .score-display {
            font-size: 5rem;
            font-weight: bold;
            background: linear-gradient(to right, #4b6cb7, #182848);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 20px 0;
        }
        
        .feedback {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 15px;
            margin: 25px 0;
            text-align: left;
        }
        
        .feedback h3 {
            color: #4b6cb7;
            margin-bottom: 15px;
        }
        
        .strengths, .improvements {
            margin-bottom: 20px;
        }
        
        .strengths ul, .improvements ul {
            padding-left: 20px;
            margin-top: 10px;
        }
        
        .strengths li, .improvements li {
            margin-bottom: 8px;
        }
        
        .share-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .share-btn {
            padding: 10px 20px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-weight: 600;
        }
        
        .twitter {
            background: #1DA1F2;
        }
        
        .facebook {
            background: #4267B2;
        }
        
        .linkedin {
            background: #0077B5;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }
            
            .content {
                padding: 20px;
            }
            
            .score-display {
                font-size: 3.5rem;
            }
            
            .feature {
                min-width: 100%;
            }
        }
        
        @media (max-width: 480px) {
            .header h1 {
                font-size: 1.7rem;
            }
            
            .score-display {
                font-size: 2.8rem;
            }
            
            .btn {
                padding: 10px 20px;
                font-size: 1rem;
            }
        }
        
        /* Hidden class for toggling views */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Emotional Intelligence Test</h1>
            <p>Discover your emotional strengths and growth areas</p>
        </div>
        
        <div class="content">
            <!-- Homepage -->
            <div id="homepage">
                <div class="intro">
                    <p>Emotional Intelligence (EQ) is the ability to recognize, understand, and manage our own emotions while also recognizing, understanding, and influencing the emotions of others.</p>
                    <p>This test will assess your EQ across three key dimensions:</p>
                </div>
                
                <div class="features">
                    <div class="feature">
                        <h3>Self-Awareness</h3>
                        <p>Recognizing your own emotions and their effects</p>
                    </div>
                    <div class="feature">
                        <h3>Empathy</h3>
                        <p>Sensing others' feelings and perspectives</p>
                    </div>
                    <div class="feature">
                        <h3>Emotional Regulation</h3>
                        <p>Managing disruptive emotions and impulses</p>
                    </div>
                </div>
                
                <div style="text-align: center; margin-top: 30px;">
                    <button id="startBtn" class="btn">Start EQ Test</button>
                </div>
            </div>
            
            <!-- Quiz Section -->
            <div id="quiz" class="hidden">
                <div class="progress-bar">
                    <div class="progress" id="progressBar"></div>
                </div>
                
                <div id="questionContainer" class="question-container">
                    <!-- Questions will be loaded here -->
                </div>
                
                <div class="quiz-controls">
                    <button id="prevBtn" class="btn btn-secondary">Previous</button>
                    <button id="nextBtn" class="btn">Next</button>
                    <button id="submitBtn" class="btn hidden">Submit Answers</button>
                </div>
            </div>
            
            <!-- Results Section -->
            <div id="results" class="hidden">
                <div class="result-container">
                    <h2>Your Emotional Intelligence Score</h2>
                    <div class="score-display" id="scoreDisplay">85</div>
                    <p id="scoreText">Excellent emotional intelligence!</p>
                    
                    <div class="feedback">
                        <h3>Personalized Feedback</h3>
                        <div class="strengths">
                            <h4>Your Strengths:</h4>
                            <ul id="strengthsList">
                                <!-- Strengths will be populated here -->
                            </ul>
                        </div>
                        <div class="improvements">
                            <h4>Areas for Improvement:</h4>
                            <ul id="improvementsList">
                                <!-- Improvements will be populated here -->
                            </ul>
                        </div>
                    </div>
                    
                    <div class="share-buttons">
                        <a href="#" class="share-btn twitter">Share on Twitter</a>
                        <a href="#" class="share-btn facebook">Share on Facebook</a>
                        <a href="#" class="share-btn linkedin">Share on LinkedIn</a>
                    </div>
                    
                    <div style="margin-top: 30px;">
                        <button id="retakeBtn" class="btn">Retake Test</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // EQ Test Questions
        const questions = [
            {
                text: "When you feel frustrated at work, how do you typically respond?",
                options: [
                    "I take a deep breath and think about how to address the situation constructively",
                    "I express my frustration immediately to whoever is nearby",
                    "I suppress my feelings and try to ignore them",
                    "I leave the situation and cool down before addressing it"
                ],
                category: "emotional_regulation"
            },
            {
                text: "How do you react when a colleague is visibly upset?",
                options: [
                    "I ask them if they want to talk about it",
                    "I give them space and check in later",
                    "I try to cheer them up with humor",
                    "I feel uncomfortable and avoid them"
                ],
                category: "empathy"
            },
            {
                text: "When receiving critical feedback, what is your typical response?",
                options: [
                    "I listen carefully and ask clarifying questions",
                    "I get defensive and explain why I did what I did",
                    "I feel hurt but try not to show it",
                    "I immediately think about how to improve"
                ],
                category: "self_awareness"
            },
            {
                text: "How well do you recognize your own emotional triggers?",
                options: [
                    "I can identify most of my triggers and how they affect me",
                    "I sometimes recognize them after the fact",
                    "I rarely notice what triggers my emotions",
                    "I'm very aware of my triggers and plan how to manage them"
                ],
                category: "self_awareness"
            },
            {
                text: "When in a conflict, how do you handle your emotions?",
                options: [
                    "I stay calm and focus on resolving the issue",
                    "I express my feelings strongly to make my point",
                    "I withdraw to avoid confrontation",
                    "I try to understand the other person's perspective first"
                ],
                category: "emotional_regulation"
            },
            {
                text: "How do you respond when someone shares good news with you?",
                options: [
                    "I show genuine enthusiasm and ask follow-up questions",
                    "I congratulate them but don't engage further",
                    "I feel happy for them but don't show it much",
                    "I immediately share my own good news"
                ],
                category: "empathy"
            },
            {
                text: "How accurately can you describe your current emotional state?",
                options: [
                    "I can precisely identify and articulate my feelings",
                    "I know generally how I feel but not specifically",
                    "I'm not sure how I'm feeling right now",
                    "I can identify my feelings but struggle to explain them"
                ],
                category: "self_awareness"
            },
            {
                text: "When you're feeling stressed, what do you typically do?",
                options: [
                    "I use healthy coping strategies like exercise or meditation",
                    "I distract myself with work or entertainment",
                    "I tend to take it out on others",
                    "I push through without addressing my stress"
                ],
                category: "emotional_regulation"
            },
            {
                text: "How do you react when someone disagrees with your opinion?",
                options: [
                    "I listen to understand their perspective",
                    "I try to convince them they're wrong",
                    "I get frustrated and disengage",
                    "I consider if they might have a valid point"
                ],
                category: "empathy"
            },
            {
                text: "How often do you reflect on your emotional reactions after an event?",
                options: [
                    "Regularly - it helps me grow",
                    "Occasionally when something significant happens",
                    "Rarely - I prefer to move on",
                    "Only when someone points out my reaction"
                ],
                category: "self_awareness"
            }
        ];
        
        // DOM Elements
        const homepage = document.getElementById('homepage');
        const quiz = document.getElementById('quiz');
        const results = document.getElementById('results');
        const startBtn = document.getElementById('startBtn');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const retakeBtn = document.getElementById('retakeBtn');
        const questionContainer = document.getElementById('questionContainer');
        const progressBar = document.getElementById('progressBar');
        const scoreDisplay = document.getElementById('scoreDisplay');
        const scoreText = document.getElementById('scoreText');
        const strengthsList = document.getElementById('strengthsList');
        const improvementsList = document.getElementById('improvementsList');
        
        // Quiz state
        let currentQuestion = 0;
        let userAnswers = new Array(questions.length).fill(null);
        
        // Initialize the quiz
        function initQuiz() {
            currentQuestion = 0;
            userAnswers = new Array(questions.length).fill(null);
            loadQuestion();
            updateProgressBar();
            prevBtn.classList.add('hidden');
            submitBtn.classList.add('hidden');
            nextBtn.classList.remove('hidden');
        }
        
        // Load current question
        function loadQuestion() {
            const q = questions[currentQuestion];
            let optionsHTML = '';
            
            q.options.forEach((option, index) => {
                const isSelected = userAnswers[currentQuestion] === index;
                optionsHTML += `
                    <div class="option ${isSelected ? 'selected' : ''}" data-index="${index}">
                        ${option}
                    </div>
                `;
            });
            
            questionContainer.innerHTML = `
                <div class="question-number">Question ${currentQuestion + 1} of ${questions.length}</div>
                <div class="question-text">${q.text}</div>
                <div class="options">${optionsHTML}</div>
            `;
            
            // Add event listeners to options
            document.querySelectorAll('.option').forEach(option => {
                option.addEventListener('click', () => {
                    // Remove selected class from all options
                    document.querySelectorAll('.option').forEach(opt => {
                        opt.classList.remove('selected');
                    });
                    
                    // Add selected class to clicked option
                    option.classList.add('selected');
                    
                    // Store answer
                    userAnswers[currentQuestion] = parseInt(option.dataset.index);
                });
            });
            
            // Update navigation buttons
            if (currentQuestion === 0) {
                prevBtn.classList.add('hidden');
            } else {
                prevBtn.classList.remove('hidden');
            }
            
            if (currentQuestion === questions.length - 1) {
                nextBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
            } else {
                nextBtn.classList.remove('hidden');
                submitBtn.classList.add('hidden');
            }
        }
        
        // Update progress bar
        function updateProgressBar() {
            const progress = ((currentQuestion) / questions.length) * 100;
            progressBar.style.width = `${progress}%`;
        }
        
        // Calculate EQ score and feedback
        function calculateResults() {
            // Scoring system (1-4 points per question)
            // Higher scores indicate better EQ
            const scoring = [
                [3, 1, 1, 4], // Q1: emotional_regulation
                [4, 3, 2, 1], // Q2: empathy
                [4, 1, 2, 3], // Q3: self_awareness
                [4, 2, 1, 3], // Q4: self_awareness
                [4, 2, 1, 3], // Q5: emotional_regulation
                [4, 2, 1, 3], // Q6: empathy
                [4, 2, 1, 3], // Q7: self_awareness
                [4, 2, 1, 3], // Q8: emotional_regulation
                [4, 1, 2, 3], // Q9: empathy
                [4, 2, 1, 3]  // Q10: self_awareness
            ];
            
            let totalScore = 0;
            let categoryScores = { self_awareness: 0, empathy: 0, emotional_regulation: 0 };
            let categoryCounts = { self_awareness: 0, empathy: 0, emotional_regulation: 0 };
            
            // Calculate scores
            for (let i = 0; i < questions.length; i++) {
                const answer = userAnswers[i];
                if (answer !== null) {
                    const points = scoring[i][answer];
                    totalScore += points;
                    
                    const category = questions[i].category;
                    categoryScores[category] += points;
                    categoryCounts[category]++;
                }
            }
            
            // Calculate average score (0-100 scale)
            const maxPossible = questions.length * 4;
            const percentage = Math.round((totalScore / maxPossible) * 100);
            
            // Determine feedback based on score
            let feedbackText = "";
            if (percentage >= 85) {
                feedbackText = "Excellent emotional intelligence! You have a strong awareness of your emotions and how they affect others.";
            } else if (percentage >= 70) {
                feedbackText = "Good emotional intelligence! You generally manage your emotions well and show empathy toward others.";
            } else if (percentage >= 50) {
                feedbackText = "Average emotional intelligence. There are opportunities to develop your emotional awareness and regulation skills.";
            } else {
                feedbackText = "Developing emotional intelligence. Focusing on understanding your emotions and those of others will benefit you greatly.";
            }
            
            // Calculate category averages
            const selfAwarenessAvg = Math.round((categoryScores.self_awareness / categoryCounts.self_awareness) * 25);
            const empathyAvg = Math.round((categoryScores.empathy / categoryCounts.empathy) * 25);
            const emotionalRegulationAvg = Math.round((categoryScores.emotional_regulation / categoryCounts.emotional_regulation) * 25);
            
            // Determine strengths and improvements
            const categories = [
                { name: "Self-Awareness", score: selfAwarenessAvg },
                { name: "Empathy", score: empathyAvg },
                { name: "Emotional Regulation", score: emotionalRegulationAvg }
            ];
            
            // Sort categories by score
            categories.sort((a, b) => b.score - a.score);
            
            // Set strengths (top 2)
            strengthsList.innerHTML = "";
            for (let i = 0; i < 2; i++) {
                const li = document.createElement('li');
                li.textContent = categories[i].name;
                strengthsList.appendChild(li);
            }
            
            // Set improvements (lowest)
            improvementsList.innerHTML = "";
            const li = document.createElement('li');
            li.textContent = categories[2].name;
            improvementsList.appendChild(li);
            
            // Display results
            scoreDisplay.textContent = percentage;
            scoreText.textContent = feedbackText;
            
            // Save to database (simulated with AJAX)
            saveResultsToDatabase(percentage, selfAwarenessAvg, empathyAvg, emotionalRegulationAvg);
        }
        
        // Save results to database
        function saveResultsToDatabase(totalScore, selfAwareness, empathy, emotionalRegulation) {
            // In a real implementation, you would send this data to a PHP script
            // For this demo, we'll just log it
            console.log("Saving results to database:", {
                totalScore,
                selfAwareness,
                empathy,
                emotionalRegulation
            });
        }
        
        // Event Listeners
        startBtn.addEventListener('click', () => {
            homepage.classList.add('hidden');
            quiz.classList.remove('hidden');
            initQuiz();
        });
        
        prevBtn.addEventListener('click', () => {
            if (currentQuestion > 0) {
                currentQuestion--;
                loadQuestion();
                updateProgressBar();
            }
        });
        
        nextBtn.addEventListener('click', () => {
            if (userAnswers[currentQuestion] === null) {
                alert('Please select an answer before proceeding.');
                return;
            }
            
            if (currentQuestion < questions.length - 1) {
                currentQuestion++;
                loadQuestion();
                updateProgressBar();
            }
        });
        
        submitBtn.addEventListener('click', () => {
            if (userAnswers[currentQuestion] === null) {
                alert('Please select an answer before submitting.');
                return;
            }
            
            quiz.classList.add('hidden');
            results.classList.remove('hidden');
            calculateResults();
        });
        
        retakeBtn.addEventListener('click', () => {
            results.classList.add('hidden');
            homepage.classList.remove('hidden');
        });
        
        // Initialize the app
        document.addEventListener('DOMContentLoaded', () => {
            // Check if we should show results (for demo purposes, we'll start on homepage)
            // In a real app, you might check URL parameters or session data
        });
    </script>
</body>
</html>
