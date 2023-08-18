<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .faq-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f7f9fc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .faq {
            margin-bottom: 20px;
            border: 1px solid #b0c5e0;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .question {
            font-weight: bold;
            margin-bottom: 10px;
            cursor: pointer;
            color: #4285f4;
            display: flex;
            align-items: center;
        }
        .answer {
            margin-left: 20px;
            display: none;
            color: #333;
        }
        .icon {
            margin-right: 5px;
        }
        .anchor-icon {
            font-size: 24px;
        }
    </style>
    <script>
        function toggleAnswer(element) {
            var answer = element.nextElementSibling;
            if (answer.style.display === "block") {
                answer.style.display = "none";
            } else {
                answer.style.display = "block";
            }
        }
    </script>
</head>
<body>
    <div class="faq-container">
        <h1 style="text-align: center;"><span class="anchor-icon">⚓</span> Frequently Asked Questions (FAQ) <span class="anchor-icon">⚓</span></h1>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Pertanyaan 1?
            </div>
            <div class="answer">
                A: Jawaban 1.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Pertanyaan 2?
            </div>
            <div class="answer">
                A: Jawaban 2.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Pertanyaan 3?
            </div>
            <div class="answer">
                A: Jawaban 3.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Pertanyaan 4?
            </div>
            <div class="answer">
                A: Jawaban 4.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Pertanyaan 5?
            </div>
            <div class="answer">
                A: Jawaban 5.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Pertanyaan 6?
            </div>
            <div class="answer">
                A: Jawaban 6.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Pertanyaan 7?
            </div>
            <div class="answer">
                A: Jawaban 7.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Pertanyaan 8?
            </div>
            <div class="answer">
                A: Jawaban 8.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Pertanyaan 9?
            </div>
            <div class="answer">
                A: Jawaban 9.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Pertanyaan 10?
            </div>
            <div class="answer">
                A: Jawaban 10.
            </div>
        </div>

        <!-- Tambahkan pertanyaan dan jawaban lainnya di sini -->

    </div>
</body>
</html>
