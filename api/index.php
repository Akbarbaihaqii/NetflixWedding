<?php
$messages_file = 'data/messages.json';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['name']) && !empty($_POST['message'])) {
        $name = htmlspecialchars(strip_tags($_POST['name']));
        $message = htmlspecialchars(strip_tags($_POST['message']));
        $timestamp = date('d M Y, H:i');

        $new_message = [
            'name' => $name,
            'message' => $message,
            'timestamp' => $timestamp
        ];

        $messages = [];
        if (file_exists($messages_file)) {
            $messages = json_decode(file_get_contents($messages_file), true);
        }

        array_unshift($messages, $new_message);
        file_put_contents($messages_file, json_encode($messages, JSON_PRETTY_PRINT));
        
        header("Location: " . $_SERVER['PHP_SELF'] . "?status=success#guestbook");
        exit();
    }
}

// Get existing messages
$guest_messages = [];
if (file_exists($messages_file)) {
    $guest_messages = json_decode(file_get_contents($messages_file), true);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Narativa Wedding</title>
<link rel="icon" type="image/jpeg" href="assets/images/lg.jpg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Bebas+Neue&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div id="splash-screen">
        <h1 class="splash-logo">NIKAHFIX</h1>
        <p>Who's watching?</p>
        <div class="profile">
    <img src="assets/images/nf1.jpg" alt="Guest Profile" class="profile-icon">
    <span>Guest</span>
</div>
        <button id="open-invitation">OPEN INVITATION</button>
    </div>

    <div id="main-content" style="display: none;">
        <section class="hero-poster" style="background-image: url('assets/images/bg-poster.png');">
            <div id="tsparticles"></div>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <span class="brand-logo">NIKAHFIX</span>
                <h1>Fidella & Farhan:</h1>
                <h2 class="tagline">Menuju Sah</h2>
                <div class="coming-soon-badge">
                    <span>Coming Soon</span>
                    <p>12 Desember 2025</p>
                </div>
                <div class="hashtags">
                    <span>#getmarried</span>
                    <span>#romantic</span>
                    <span>#lovestory</span>
                </div>
            </div>
        </section>

        <main class="container">
            <section class="content-section" data-aos="fade-up">
                <h2 class="section-title">Breaking News</h2>
                <div class="news-content">
                    <img src="assets/images/bg-1.png" alt="Couple Photo" data-aos="zoom-in">
                    <p data-aos="fade-up" data-aos-delay="200">Hai semuanya! Akhirnya saat yang ditunggu-tunggu datang juga. Bersamaan dengan undangan ini, kami mau mengabarkan bahwa kami akan segera melabuhkan cinta kami dalam ikatan pernikahan.</p>
                    <p data-aos="fade-up" data-aos-delay="300">Kami sangat berharap doa terbaik dari kalian semua. Doakan semoga semua rencana kami dilancarkan ya!</p>
                </div>
            </section>
            
            <section class="content-section" data-aos="fade-up">
                <h2 class="section-title">Bride & Groom</h2>
                <div class="couple-container">
                    <div class="person-card" data-aos="fade-right" data-tilt>
                        <img src="assets/images/bg-2.png" alt="Farhan Budi Marwanto">
                        <h3>Farhan Budi Marwanto</h3>
                        <p>Putra Kedua dari Bapak Sugiarto dan Ibu Sumiyem</p>
                    </div>
                    <div class="person-card" data-aos="fade-left" data-tilt>
                        <img src="assets/images/bg-3.png" alt="Fidella Arya Dewi">
                        <h3>Fidella Arya Dewi</h3>
                        <p>Putri Pertama dari Bapak Ariyanto dan Ibu Dewi Astutik</p>
                    </div>
                </div>
            </section>

            <section class="content-section" data-aos="fade-up">
                <h2 class="section-title">Timeline & Location</h2>
                <div class="timeline-card" data-aos="zoom-in-up">
                    <img src="assets/images/bg-4.png" alt="Akad Nikah">
                    <div class="timeline-details">
                        <span class="event-tag">Akad Nikah</span>
                        <h4>12 Desember 2024</h4>
                        <div class="time-tags">
                            <span>14.00 s.d 15.00</span>
                            <span>#WIB</span>
                        </div>
                        <p class="address">Bertempat di Griya Mbah Lurah - Jl. Pemuda Utara, Tegal Duwur, Pokak, Kec. Ceper, Kabupaten Klaten, Jawa Tengah 57465</p>
                        <a href="#" class="gmaps-link">Buka Google Maps >></a>
                    </div>
                </div>
                <div class="timeline-card" data-aos="zoom-in-up" data-aos-delay="200">
                    <img src="assets/images/bg-5.png" alt="Ramah Tamah">
                    <div class="timeline-details">
                        <span class="event-tag">Ramah Tamah</span>
                        <h4>12 Desember 2024</h4>
                        <div class="time-tags">
                            <span>15.00 s.d 17.00</span>
                            <span>#WIB</span>
                        </div>
                        <p class="address">Bertempat di Griya Mbah Lurah - Jl. Pemuda Utara, Tegal Duwur, Pokak, Kec. Ceper, Kabupaten Klaten, Jawa Tengah 57465</p>
                        <a href="#" class="gmaps-link">Buka Google Maps >></a>
                    </div>
                </div>
            </section>
            
            <section id="guestbook" class="content-section" data-aos="fade-up">
                <h2 class="section-title">Buku Tamu</h2>
                <div class="guest-form-container">
                    <h3>Kirim Ucapan & Doa</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <input type="text" name="name" placeholder="Nama Kamu" required>
                        <textarea name="message" rows="4" placeholder="Tulis ucapanmu di sini..." required></textarea>
                        <button type="submit">Kirim Ucapan</button>
                    </form>
                </div>
                <div class="messages-display-container">
                    <?php if (!empty($guest_messages)): ?>
                        <?php foreach ($guest_messages as $msg): ?>
                            <div class="message-card">
                                <h4><?php echo $msg['name']; ?></h4>
                                <p>"<?php echo $msg['message']; ?>"</p>
                                <span><?php echo $msg['timestamp']; ?></span>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p style="text-align: center; width: 100%;">Jadilah yang pertama mengirim ucapan!</p>
                    <?php endif; ?>
                </div>
            </section>
        </main>

        <footer class="main-footer" data-aos="fade-in">
            <span class="brand-logo">NIKAHFIX</span>
            <p>We really appreciate and thank full for sharing in our Intimate Wedding Celebration. We are grateful for your presence, warm wishes and your generous gift.</p>
            <p class="closing">See You On Our Big Day</p>
            <h3>FIDELLA & FARHAN</h3>
            <div class="social-icons">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-tiktok"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
            <span>Made with Narativa</span>
        </footer>

    </div> 

    <audio id="background-music" src="assets/audio/lg1.mp3" loop></audio>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles-slim@2.12.0/tsparticles.slim.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>
</html>