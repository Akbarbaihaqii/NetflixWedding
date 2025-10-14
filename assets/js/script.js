document.addEventListener('DOMContentLoaded', () => {

    const splashScreen = document.getElementById('splash-screen');
    const openButton = document.getElementById('open-invitation');
    const mainContent = document.getElementById('main-content');
    const backgroundMusic = document.getElementById('background-music');

    // Dapatkan parameter dari URL sekali saja di awal
    const urlParams = new URLSearchParams(window.location.search);

    // Fungsi untuk membuka undangan (tetap sama)
    function openInvitation() {
        splashScreen.style.opacity = '0';
        
        backgroundMusic.play().catch(error => {
            console.log("Autoplay dicegah oleh browser.");
        });

        setTimeout(() => {
            splashScreen.style.display = 'none';
            mainContent.style.display = 'block';
            
            AOS.init({
                duration: 1000,
                once: true,
                offset: 50,
            });
        }, 500);
    }

    // --- INI BAGIAN LOGIKA UTAMANYA ---
    // Cek apakah ada tanda '?status=success' di URL
    if (urlParams.get('status') === 'success') {
        // JIKA ADA: Ini adalah refresh setelah kirim pesan.
        // Langsung lewati splash screen.
        splashScreen.style.display = 'none';
        mainContent.style.display = 'block';

        // Langsung inisialisasi AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 50,
        });

        // Tampilkan notifikasi "Terima Kasih"
        Swal.fire({
            title: 'Terima Kasih!',
            text: 'Ucapan dan doa Anda telah kami terima.',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#E50914',
            background: '#222',
            color: '#fff'
        });

        // Bersihkan URL agar saat di-refresh manual, splash screen muncul lagi
        const newUrl = window.location.pathname + '#guestbook';
        history.replaceState(null, '', newUrl);
        
    } else {
        // JIKA TIDAK ADA: Ini adalah kunjungan pertama (atau refresh manual).
        // Tampilkan splash screen dan buat tombolnya berfungsi.
        openButton.addEventListener('click', openInvitation);
    }
    
    // Inisialisasi library lain yang selalu dibutuhkan
    VanillaTilt.init(document.querySelectorAll("[data-tilt]"), {
        max: 15,
        speed: 400,
        glare: true,
        "max-glare": 0.2
    });

    tsParticles.load("tsparticles", {
        fpsLimit: 60,
        particles: {
            number: { value: 100, density: { enable: true, value_area: 800 } },
            color: { value: "#ffffff" },
            shape: { type: "circle" },
            opacity: {
                value: 0.5,
                random: true,
                anim: { enable: true, speed: 1, opacity_min: 0.1, sync: false }
            },
            size: {
                value: 2,
                random: true,
                anim: { enable: false }
            },
            line_linked: { enable: false },
            move: {
                enable: true,
                speed: 0.5,
                direction: "none",
                random: true,
                straight: false,
                out_mode: "out",
                bounce: false,
                attract: { enable: false }
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: { enable: false },
                onclick: { enable: false },
                resize: true
            }
        },
        retina_detect: true
    });
});