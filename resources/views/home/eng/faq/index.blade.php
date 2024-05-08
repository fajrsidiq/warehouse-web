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

        /* Animasi fadeIn */
    .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
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
    <div class="faq-container fade-in">
        <h1 style="text-align: center;"><span class="anchor-icon">⚓</span> Frequently Asked Questions (FAQ) <span class="anchor-icon">⚓</span></h1>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: What types of fish are available in stock?
            </div>
            <div class="answer">
                A:  Our stock includes a variety of high-quality fish types, including Tuna, Baby Tuna, Squid, Lemadang, Skipjack Tuna, Albacore Tuna, Marlin, Swordfish, Sailfish, and many more. For a complete list, please visit the "Fish Types" page.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: How can we contact Laut Biru Perkasa?
            </div>
            <div class="answer">
                A:  You can easily reach us through the following contacts :
                Wisnu (081394060849), 
                Amel (087883657036), 
                Nopal (081215625924)
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: What payment methods do we accept?
            </div>
            <div class="answer">
                A: We accept cash payment in person or by transfer to BCA account.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: What sizes of fish are available?
            </div>
            <div class="answer">
                A: The size of the fish we provide varies from small to large, depending on the type of fish you choose.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: How accessible is our location?
            </div>
            <div class="answer">
                A: Our location is very easy to access and also provides ample parking facilities for small and large vehicles.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: What is the quality of the fish we offer?
            </div>
            <div class="answer">
                A: We provide various grades of fish, including grade A, B, and C, so you can choose according to your needs.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: How long does it take to deliver a fish order?
            </div>
            <div class="answer">
                A: We pay close attention to the speed of delivery to ensure that the fish reaches you fresh and in prime condition.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: How do I place a fish order?
            </div>
            <div class="answer">
                A: You can easily place an order by contacting the number provided above or by visiting Laut Biru Perkasa in person.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: What services do we provide?
            </div>
            <div class="answer">
                A: We provide a range of services, from buying and selling fish to delivery to the ordering location, cold storage, and air blast freezing.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Do the fish we offer meet quality standards?
            </div>
            <div class="answer">
                A: Certainly, we have obtained official certificates that guarantee our fish meet the applicable standards of seafood quality and safety. The safety and quality of our fish are our top priorities.
            </div>
        </div>

        <!-- Tambahkan pertanyaan dan jawaban lainnya di sini -->

    </div>
</body>
</html>
