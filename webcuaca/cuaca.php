<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logocuaca.png">
    <title>SkyCast</title>
    <link rel="stylesheet" href="cuaca.css">
</head>
<body>
    <header>
        <div class="logo"><img src="logocuaca.png" alt="SkyCast"></div>
        <div class="brand">SkyCast</div>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="index.php#fitur">Fitur</a></li>
                <li><a href="about.php">Tentang Kami</a></li>
                <li><a href="contactus.php">Kontak</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section class="weather" id="weather">
            <h1>Cuaca Saat Ini</h1>
            <form method="post" action="">
                <label for="locationInput">Masukkan Lokasi:</label>
                <input type="text" id="locationInput" name="location" required>
                <button type="submit">Cek Cuaca</button>
            </form>
            <div class="weather-info">
                <?php
                // Inisialisasi variabel
                $location = "-";
                $temperature = "-";
                $description = "-";
                $humidity = "-";
                $wind = "-";

                // Cek apakah form telah disubmit
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $locationInput = $_POST['location'];
                    $apiKey = '016da82004e97468fe6f403f4206bb8f'; // Ganti dengan API key Anda
                    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$locationInput}&appid={$apiKey}&units=metric";

                    // Ambil data cuaca dari API
                    $response = file_get_contents($apiUrl);
                    $data = json_decode($response, true);

                    // Cek apakah data berhasil diambil
                    if ($data['cod'] == 200) {
                        $location = $data['name'];
                        $temperature = $data['main']['temp'] . " °C";
                        $description = $data['weather'][0]['description'];
                        $humidity = $data['main']['humidity'] . "%";
                        $wind = $data['wind']['speed'] . " m/s";
                    } else {
                        $description = "Lokasi tidak ditemukan.";
                    }
                }
                ?>
                <p id="location">Lokasi: <?php echo $location; ?></p>
                <p id="temperature">Suhu: <?php echo $temperature; ?></p>
                <p id="description">Kondisi: <?php echo $description; ?></p>
                <p id="humidity">Kelembapan: <?php echo $humidity; ?></p>
                <p id="wind">Kecepatan Angin: <?php echo $wind; ?></p>
            </div>
            <!-- <button id="refreshbutton">Cek Cuaca Lagi</button> -->
        </section>
    </main>
    <footer>
        <div class="footer-content">
            <h3>Ikuti Kami</h3>
            <div class="social-icons">
                <a href="https://www.facebook.com" target="_blank">
                    <img src="facebook.png" alt="Facebook" />
                </a>
                <a href="https://www.instagram.com" target="_blank">
                    <img src="instagram.png" alt="Instagram" />
                </a>
                <a href="https://www.x.com" target="_blank">
                    <img src="x.png" alt="X" />
                </a>
            </div>
        </div>
    </footer>
    
</body>
</html>