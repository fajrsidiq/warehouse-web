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
                <span class="icon anchor-icon">🔍</span> Q: Apa saja jenis ikan yang tersedia didalam stok?
            </div>
            <div class="answer">
                A:  Stok kami meliputi beragam jenis ikan berkualitas, termasuk Tuna, Baby Tuna, Cumi-cumi, Lemadang, Cakalang, Albakora, Marlin, Sunglir, Layur, dan masih banyak lagi. Untuk melihat daftar lengkapnya, silakan kunjungi halaman "Jenis Ikan".
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Bagaimana cara kami untuk menghubungi Laut Biru Perkasa?
            </div>
            <div class="answer">
                A:  Anda dapat dengan mudah menghubungi kami melalui kontak berikut :
                Wisnu (081394060849), 
                Amel (087883657036), 
                Nopal (081215625924)
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Apa metode pembayaran yang kami terima?
            </div>
            <div class="answer">
                A: Kami menerima pembayaran tunai secara langsung atau melalui transfer ke rekening BCA.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Apa ukuran ikan yang tersedia?
            </div>
            <div class="answer">
                A: Ukuran ikan yang kami sediakan bervariasi, mulai dari yang kecil hingga besar, tergantung pada jenis ikan yang Anda pilih.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Seberapa mudah akses ke lokasi kami?
            </div>
            <div class="answer">
                A: Lokasi kami sangat mudah untuk diakses dan juga menyediakan fasilitas parkir yang luas untuk kendaraan kecil maupun besar.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Bagaimana kualitas ikan yang kami tawarkan?
            </div>
            <div class="answer">
                A: Kami menyediakan berbagai kualitas ikan, termasuk grade A, B, dan C, sehingga Anda dapat memilih sesuai dengan kebutuhan Anda.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Berapa lama waktu pengiriman pesanan ikan?
            </div>
            <div class="answer">
                A: Kami sangat memperhatikan kecepatan pengiriman karena kami ingin memastikan ikan sampai di tangan Anda dengan segar dan prima.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Bagaimana cara melakukan pemesanan ikan?
            </div>
            <div class="answer">
                A: Anda dapat dengan mudah melakukan pemesanan dengan menghubungi nomor yang tertera di atas atau bisa datang secara langsung ke Laut Biru Perkasa.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Apa saja layanan yang kami sediakan?
            </div>
            <div class="answer">
                A: Kami menyediakan berbagai layanan, mulai dari jual beli ikan hingga pengiriman ke lokasi pemesanan, cold storage, dan  air blast freezing.
            </div>
        </div>

        <div class="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <span class="icon anchor-icon">🔍</span> Q: Apakah ikan yang kami tawarkan memenuhi standar kelayakan?
            </div>
            <div class="answer">
                A: Tentu, kami telah memperoleh sertifikat resmi yang menjamin bahwa ikan kami memenuhi standar kelayakan hasil tangkapan laut yang berlaku. Keamanan dan kualitas ikan adalah prioritas utama kami.
            </div>
        </div>

        <!-- Tambahkan pertanyaan dan jawaban lainnya di sini -->

    </div>
</body>
</html>
