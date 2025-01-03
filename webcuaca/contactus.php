<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logocuaca.png">
    <title>SkyCast</title>
    <link rel="stylesheet" href="contact.css">
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

    <section class="contact">
        <h1>Kontak Kami</h1>
        <p>Jika Anda memiliki pertanyaan atau saran, silakan isi formulir di bawah ini:</p>
        
        <?php
        include 'config.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data dari form
            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
            $message = $conn->real_escape_string($_POST['message']);

            // Simpan ke database
            $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";
            if ($conn->query($sql) === TRUE) {
                echo "<p style='color: green;'>Terima kasih atas saran dan kritik Anda!</p>";
            } else {
                echo "<p style='color: red;'>Terjadi kesalahan: " . $conn->error . "</p>";
            }
        }
        ?>

        <form action="contactus.php" method="post">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Pesan:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit">Kirim Pesan</button>
        </form>
    </section>

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
