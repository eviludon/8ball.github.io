<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マジック 8 ボール</title>
    <link rel="stylesheet" href="styles.css">
    <script>
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
    </script>
</head>
<body>

    <!-- Navbar with JP, EN links and Music Button -->
    <nav>
    <a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">English</a>
    <a href="indexjp.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'indexjp.php' ? 'active' : ''; ?>">日本語</a>
    <button id="music-btn" onclick="toggleMusic()">Pause Music</button>
</nav>


    <div class="container">
        <h1>マジック 8 ボール</h1>
        <img src="https://i.imgur.com/eU3li2h.png" alt="8ball">
        <p>未来が見える… もし勇気があれば、何でも聞いてください！</p>
        
        <form method="POST">
            <input type="text" name="question" placeholder="ここに質問を入力してください..." required>
            <input type="submit" value="マジック 8 ボールに聞く">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['question'])) {
            function magic8Ball($question) {
                echo "<div class='question'>あなたが聞いたのは: $question</div>";
                echo "<div class='message'>ちょっと待ってください... あなたの質問に答えます。</div>";

                // Generates a random number from 0 and 19
                $randomNumber = rand(0, 19);
                echo "<div class='randomNumber'>あなたのマジックナンバーは: $randomNumber</div>";

                // Switch case based on the random number
                switch ($randomNumber) {
                    case 0:
                        echo "<div class='answer'>それは確実です。</div>";
                        break;
                    case 1:
                        echo "<div class='answer'>間違いなくそうです。</div>";
                        break;
                    case 2:
                        echo "<div class='answer'>疑う余地はありません。</div>";
                        break;
                    case 3:
                        echo "<div class='answer'>はい - 間違いなく。</div>";
                        break;
                    case 4:
                        echo "<div class='answer'>それを信じてください。</div>";
                        break;
                    case 5:
                        echo "<div class='answer'>私が見る限り、はい。</div>";
                        break;
                    case 6:
                        echo "<div class='answer'>最も可能性が高いです。</div>";
                        break;
                    default:
                        echo "<div class='answer'>他に未来は見えません。</div>";
                }
                echo "<div class='message'>もう一度質問しますか？</div>";
            }

            // Get the question from the form submission 
            $question = htmlspecialchars($_POST['question']);
            magic8Ball($question);
        }
        ?>
    </div>

    <!-- Audio Player-->
    <audio id="bg-music" loop autoplay>
        <source src="music/FortuneTeller.mp3" type="audio/mp3">
        お使いのブラウザはオーディオ要素に対応していません。
    </audio>

</body>
</html>
