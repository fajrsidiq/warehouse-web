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
        <h1 style="text-align: center;"><span class="anchor-icon">⚓</span> 常见问题解答 (FAQ) <span class="anchor-icon">⚓</span></h1>
    
        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: 库存中有哪些种类的鱼？
            </div>
            <div class="answer">
                A: 我们的库存包括各种高质量的鱼类，包括金枪鱼、小金枪鱼、鱿鱼、雷马当、秋刀鱼、白条金枪鱼、旗鱼、剑鱼、帆鱼等。欲了解完整列表，请访问“鱼类种类”页面。
            </div>
        </div>
    
        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: 如何联系蓝海之力？
            </div>
            <div class="answer">
                A: 您可以通过以下联系方式轻松地联系我们：
                Wisnu（081394060849），
                Amel（087883657036），
                Nopal（081215625924）
            </div>
        </div>
    
        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: 我们接受哪些支付方式？
            </div>
            <div class="answer">
                A: 我们接受现金支付或通过转账至BCA账户支付。
            </div>
        </div>
    
        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: 我们提供哪些尺寸的鱼？
            </div>
            <div class="answer">
                A: 我们提供的鱼的大小因您选择的鱼类而异，从小到大各有不同。
            </div>
        </div>
    
        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: 我们的位置有多容易到达？
            </div>
            <div class="answer">
                A: 我们的位置非常容易到达，还提供充足的停车设施供小型和大型车辆使用。
            </div>
        </div>
    
        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: 我们提供的鱼的质量如何？
            </div>
            <div class="answer">
                A: 我们提供各种等级的鱼，包括A、B和C等级，因此您可以根据自己的需求进行选择。
            </div>
        </div>
    
        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: 我们提供的鱼订单需要多长时间才能送达？
            </div>
            <div class="answer">
                A: 我们非常注重交货速度，以确保鱼类新鲜到达且状态良好。
            </div>
        </div>
    
        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: 如何下订单购买鱼？
            </div>
            <div class="answer">
                A: 您可以通过上述提供的电话号码轻松下订单，也可以亲自到访蓝海之力。
            </div>
        </div>
    
        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: 我们提供哪些服务？
            </div>
            <div class="answer">
                A: 我们提供一系列服务，从购买和销售鱼类到送货至指定地点、冷藏和空气冲击冷冻。
            </div>
        </div>
    
        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: 我们提供的鱼是否符合质量标准？
            </div>
            <div class="answer">
                A: 当然，我们已获得官方证书，保证我们的鱼类符合适用的海产品质量和安全标准。鱼类的安全和质量是我们的首要任务。
            </div>
        </div>    

        <!-- Tambahkan pertanyaan dan jawaban lainnya di sini -->

    </div>
</body>
</html>
