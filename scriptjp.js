// Function to toggle play/pause from audio
function toggleMusic() {
    var audio = document.getElementById("bg-music");
    var musicButton = document.getElementById("music-btn");

    // Check if the audio is paused or playing
    if (audio.paused) {
        audio.play();  // Play the audio
        musicButton.innerHTML = "音楽を一時停止";  // Change button text to "Pause Music"
    } else {
        audio.pause();  // Pause the audio
        musicButton.innerHTML = "音楽を再生";  // Change button text to "Play Music"
    }
}

// Ensure the button text is updated based on the audio state when the page loads
window.onload = function() {
    var audio = document.getElementById("bg-music");
    var musicButton = document.getElementById("music-btn");

    if (!audio.paused) {
        musicButton.innerHTML = "音楽を一時停止";  // Music is autoplaying, so show "Pause Music"
    } else {
        musicButton.innerHTML = "音楽を再生";  // Music is paused initially
    }
};

// Handle form submission with JavaScript (No server-side)
function submitQuestion(event) {
    event.preventDefault(); // Prevent default form submission
    const questionInput = document.querySelector('input[name="question"]');
    const question = questionInput.value;

    if (!question) return; // Avoid submitting empty questions

    // Store the question in local storage (simulating database)
    storeQuestion(question);

    // Show the Magic 8 Ball's answer
    showMagic8BallAnswer(question);

    // Clear the input field
    questionInput.value = '';
}

// Simulate storing questions in local storage
function storeQuestion(question) {
    let questions = JSON.parse(localStorage.getItem('questions')) || [];
    questions.push(question);
    localStorage.setItem('questions', JSON.stringify(questions));
}

// Show the Magic 8 Ball answer
function showMagic8BallAnswer(question) {
    const randomNumber = Math.floor(Math.random() * 20);
    const answer = getMagic8BallAnswer(randomNumber);
    
    const container = document.querySelector('.container');
    
    // Display the question
    const questionDiv = document.createElement('div');
    questionDiv.className = 'question';
    questionDiv.textContent = `あなたが聞いたのは: ${question}`;
    container.appendChild(questionDiv);

    // Display the answer
    const answerDiv = document.createElement('div');
    answerDiv.className = 'answer';
    answerDiv.textContent = answer;
    container.appendChild(answerDiv);

    // Display a prompt for another question
    const messageDiv = document.createElement('div');
    messageDiv.className = 'message';
    messageDiv.textContent = 'もう一度質問しますか？';
    container.appendChild(messageDiv);
}

// Magic 8 Ball answers
function getMagic8BallAnswer(randomNumber) {
    const answers = [
        "それは確実です。", "間違いなくそうです。", "疑う余地はありません。",
        "はい - 間違いなく。", "それを信じてください。", "私が見る限り、はい。",
        "最も可能性が高いです。", "はい。", "良い兆しです。", "はい、しかし…多分。",
        "後でまた聞いてください。", "今は予測できません。", "今は聞かない方がいい。",
        "私の情報では違います。", "あまり良くない兆しです。", "とても疑わしい。",
        "私の返事はノーです。", "絶対に違います。", "再考した方がいいかもしれません。",
        "他に未来は見えません。"
    ];
    return answers[randomNumber] || "わかりません...";
}
