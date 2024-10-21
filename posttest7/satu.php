<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memorial Exhibit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

@font-face {
    font-family: "Arthouse";
    src: url("fonts/Arthouse.ttf") format("truetype");
}

body {
    font-family: "Cormorant Garamond", serif;
}

.logo {
    font-family: "Arthouse", serif;
    font-size: 70px;
    color: #7c6c43;
    margin: 15px;
}

nav {
    top: 0;
    left: 0;
    right: 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0px 30px;
    background: #fff;
    position: fixed;
    z-index: 9999;

}

.dark-mode-toggle {
    padding: 10px 20px;
    margin-top: 3px;
    margin-bottom: 3px;
    cursor: pointer;
    background-color: rgb(170, 118, 28);
    color: #e7ded7;
    font-style: bold;
    padding: 10px 20px;
    border-radius: 50px;
    font-weight: bold;
    font-family: "Cormorant Garamond", serif;
}

/* Warna default (light mode) */
body {
    background-color: white;
    color: black;
}

/* Dark mode styling */
body.dark-mode {
    background-color: #121212;
}

nav.dark-mode {
    background-color: #333;
}

a.dark-mode {
    color: #ddd;
}

p.dark-mode {
    color: #491414;
}

footer.dark-mode {
    background-color: #333;
    color: white;
}

body.dark-mode {
    background-color: #E1D7C6;
    color: #333;
}

.hamburger .dark-mode {
    color: #E1D7C6;
}

body.dark-mode .logo {
    color: white;
}

.dark-mode .content p {
    color: #130d06
}

.dark-mode .content {
    background-color: #d9bf9d;
}

nav .dark-mode {
    background-color: rgb(48, 48, 48);
}

nav ul {
    list-style: none;
    display: flex;
}

nav ul li {
    margin-left: 20px;
}

.nav-links li a {
    text-decoration: none;
    color: rgb(142, 59, 59);
    font-weight: bold;
}

.dark-mode {
    background-color: #333;
    color: #fff;
}

.dark-mode a {
    color: #fff;
}

.dark-mode .hamburger span {
    background-color: white;
}

.btn-buy-tickets a {
    background-color: #d4bf82;
    color: black;
    padding: 10px 20px;
    text-decoration: none;
    font-weight: bold;
    border-radius: 5px;
}

.banner {
    position: relative;
    height: 50vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

#banner-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
}

.banner-text {
    text-align: center;
}

.banner-text h1 {
    color: white;
    font-size: 50px;
    letter-spacing: 2px;
    padding: 5px;
    margin-top: 50px;
    margin-bottom: 30px;
    text-align: center;
}

.banner-text p {
    color: white;
    font-size: 25px;
    text-align: center;

}

main .content {
    background-color: #f0e5d8;
    padding: 50px;
    text-align: center;
    color: black;
}

main .content h2 {
    color: hsl(30, 50%, 30%);
    font-size: 40px;
    margin-top: 20px;
    margin-bottom: 20px;
}

main .content p {
    color: rgb(143, 102, 61);
    font-size: 25px;
    line-height: 1.6;
    margin-bottom: 15px;
}

.nav-links.active {
    display: flex;
}

.nav-links li {
    margin: 15px 0;
}

.nav-links li a {
    color: #9c6e2e;
    text-decoration: none;
    font-size: 1.5rem;
    margin: 25px;
}

.nav-links li a:hover {
    color: rgb(252, 192, 138);
    transition: 0.3s;
}

main {
    padding: 20px;
    text-align: center;
}

.hamburger {
    display: none;
    flex-direction: column;
    cursor: pointer;
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
}

.hamburger span {
    width: 25px;
    height: 3px;
    background-color: #7c6c43;
    margin: 4px;
    transition: 0.3s;
}


.required {
    color: red;
}


select {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.container {
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    padding: 20px;

}

.left-side {
    margin-right: 80px;
    flex: 1;
}

.right-side {
    margin-left: 60px;
    margin-right: 199px;
    max-width: 700px;
    display: flex;
    flex-direction: column;
}

h1 {
    margin-top: 5rem;
    text-align: center;
    padding-bottom: 10px;
    font-size: 36px;
    color: #705C53;
    margin-bottom: 20px;
}

.item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #ccc;
    cursor: pointer;
}

.item:last-child {
    border-bottom: none;
}

.item a {

    text-decoration: none;
    color: #A66E38;
    font-size: 30px;
    flex-grow: 1;
}

.item i {
    margin-left: 200px;
    color: #000;
    font-size: 20px;
}

.contentisi {
    margin-bottom: 10px;
    display: none;
    padding: 5px 0;
    color: #555;
}

.item-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.contentisi img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 10px 0;
}

.membership-btn {
    display: inline-block;
    width: auto;
    padding: 8px 12px;
    margin: 10px 0;
    font-size: 14px;
    color: #8B4513;
    background-color: transparent;
    text-align: center;
    text-decoration: none;
    border: 2px solid #8B4513;
    border-radius: 25px;
    cursor: pointer;
}

.membership-btn:hover {
    background-color: #F5F5DC;
    color: #8B4513;
}

.membership-info {
    margin-top: -5px;
    margin-bottom: 20px;
    font-size: 14px;
    color: black;/
}

/* Footer */
footer {
    background-color: #333;
    color: white;
    padding: 20px 0;
    text-align: center;
}

footer a {
    color: white;
    text-decoration: none;
}

footer a:hover {
    text-decoration: underline;
}

a {
    color: #A28B55;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {

    .nav-links {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 60px;
        right: 20px;
        background-color: #333;
        padding: 10px;
    }

    .hamburger {
        align-items: flex-start;
        display: flex;
        flex-direction: column;
        cursor: pointer;
        position: fixed;
        top: 25px;
        right: 20px;
        z-index: 9999;
    }

    nav {
        flex-direction: column;
        align-items: flex-start;
    }

    .nav-links {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 60px;
        right: 20px;
        background-color: #333;
        padding: 10px;
    }

    .nav-links.active {
        display: flex;
    }

    .nav-links li {
        margin: 10px 0;
    }

    .nav-links li a {
        color: white;
        text-decoration: none;
        font-size: 18px;
    }

    .dark-mode-toggle {
        margin-top: 10px;
    }

    .banner {
        height: 50vh;
    }

    .banner-text h1 {
        font-size: 8vw;
        margin-top: 90px;
        margin-bottom: 20px;

    }

    .banner-text p {
        font-size: 5vw;
    }

    .content {
        padding: 30px;
    }

    main .content h2 {
        font-size: 28px;
    }

    main .content p {
        font-size: 18px;
    }
}

@media (max-width: 480px) {
    .logo {
        font-size: 35px;
    }

    .navbar {
        padding: 15px;
    }

    .banner {
        height: 30vh;
    }

    .banner-text h1 {
        font-size: 6vw;
    }


    .banner-text p {
        font-size: 3.5vw;
    }

    .content {
        padding: 20px;
    }

    main .content h2 {
        font-size: 24px;
    }

    main .content p {
        font-size: 16px;
    }

    .form-container {
        max-width: 100%;
        padding: 10px;
    }

    .nav-links li a {
        font-size: 0.9rem;
    }

    footer {
        width: 100%;
        padding: 0 15px;
        box-sizing: border-box;
    }
}
</style>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">Museum Lan</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="ticket.php">Ticket</a></li>
                <li><a href="galery.php">Gallery</a></li>
                <button id="dark-mode-toggle" class="dark-mode-toggle">Dark Mode</button>
            </ul>

            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>

        <div class="banner">
            <video autoplay muted loop id="banner-video">
                <source src="ShortFilm.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="banner-text">
                <h1>JOIN US</h1>
                <p>Your support makes the museum thrive.</p>
            </div>
        </div>
    </header>

    <main>
        <section class="content">
            <h2>Join a community driven to explore Earth’s epic journey</h2>
            <p>"The Lan National Museum of Natural History is a place of awe and wonder, preserving an irreplaceable
                record of Earth’s ever-changing physical, biological, and cultural diversity. Join our community today
                and together we will fuel curiosity and inspire the next generation of knowledge seekers through active
                exploration and discovery."</p>
        </section>
    </main>

    <div class="container">
        <div class="left-side">
            <h1>Dukung Kami</h1>
        </div>
        <div class="right-side">
            <div class="item" onclick="toggleContent('contentisi1')">
                <a href="#">Keanggotaan Lan Society</a>
                <i class="fas fa-plus"></i>
            </div>
            <div id="contentisi1" class="contentisi">
                <img src="img/item1.png" alt="Museum" />
                <p>Lihat, Belajar, dan Jelajahi Seni Bersama. Bergabunglah ke dalam keanggotaan LAN Society untuk
                    bertemu teman dan menikmati dunia seni modern dan kontemporer, dengan berbagai manfaat dan penawaran
                    seperti potongan harga khusus Anggota. Dapatkan akses pertama ke program-program kami, kesempatan
                    melihat persiapan di balik layar, diskon khusus, undangan eksklusif ke program seperti pratinjau
                    pameran, dan akses gratis masuk museum selama setahun penuh. Daftarkan diri Anda, anggota keluarga,
                    atau hadiahkan keanggotaan ini kepada kerabat Anda sekarang juga!</p>

                <!-- Tombol Perorangan -->
                <a href="formulir.php" class="membership-btn">Perorangan Rp.250.000/tahun</a>
                <p class="membership-info">- Berlaku untuk 1 orang dewasa</p>

                <!-- Tombol Pelajar -->
                <a href="https://contoh-link-pelajar.com" class="membership-btn">Pelajar Rp.150.000/tahun</a>
                <p class="membership-info">- Berlaku untuk 1 orang pelajar <br>- Kartu Pelajar yang berlaku diperlukan
                </p>

                <!-- Tombol Pelajar -->
                <a href="https://contoh-link-pelajar.com" class="membership-btn">Pelajar Rp.500.000/tahun</a>
                <p class="membership-info">- Berlaku untuk 2 orang dewasa + 2 orang anak (Maks. 12 tahun)
                    <br>Keuntungan Anggota<br>
                    <br>-Akses museum gratis selama satu tahun</br>
                    <br>-Undangan ke pratinjau pameran sebelum dibuka untuk umum dan acara-acara
                    eksklusif LAN Society seperti Out & About</br>
                    <br>-Tur pameran khusus anggota
                    <br>-Antrean prioritas untuk anggota
                    <br>-Alokasi tiket terdahulu
                    <br>-Potongan harga 10% dari tiket masuk untuk 1 (satu) teman
                    <br>-Potongan harga 10% dari tiket lokakarya atau program-program terpilih
                    <br>-Potongan harga 10% untuk pembelian Common Grounds, Museum LAN
                    <br>-Potongan harga 20% untuk pembelian pertama di toko fisik Shop at LAN di museum,
                    <br>-Potongan harga 10% untuk setiap pembelian di toko fisik Shop at LAN. Diskon berlaku untuk
                    produk berharga normal
                    <br>-Dapatkan nawala daring (newsletter) bulanan Museum LAN yang berisi informasi seputar pameran,
                    tiket terdahulu, program, acara, dan penawaran spesial
                    <br>-Keanggotaan berlaku selama 12 bulan.<br />
                </p>

            </div>

            <div class="item" onclick="toggleContent('contentisi2')">
                <a href="#">Program Lan</a>
                <i class="fas fa-plus"></i>
            </div>
            <div id="contentisi2" class="contentisi">
                <p>
                    <br>Mari berbagi kecintaan Anda pada seni. Museum LAN mendukung kami dalam membangun pengalaman seni
                    yang luar biasa di Indonesia.<br>
                    <br>Dukungan Anda membantu kami dalam membangun koleksi museum, melestarikan karya seni, dan
                    menciptakan pengalaman pendidikan seni yang menarik bagi publik.<br>
                </p>

                <p>
                    <br>Untuk menjadi bagian dari Keluarga Museum Lan, silakan menghubungi Yayasan Museum LAN di<br>
                    <a href="mailto:foundation@museumlan.org" style="color: brown;">foundation@museumlan.org</a> atau
                    <a href="tel:+6287712228886" style="color: brown;">+62 877 1222 8886</a>
                </p>

            </div>

            <div class="item" onclick="toggleContent('contentisi3')">
                <a href="#">Keanggotaan Korporat</a>
                <i class="fas fa-plus"></i>
            </div>
            <div id="contentisi3" class="contentisi">
                <p> <br>Mari berbagi kecintaan Anda pada seni. Museum Lan mendukung kami dalam membangun pengalaman seni
                    yang luar biasa di Indonesia.
                    <br>
                    <br>Dukungan Anda membantu kami dalam membangun koleksi museum, melestarikan karya seni, dan
                    menciptakan pengalaman pendidikan seni yang menarik bagi publik.<br>
                    <br>Untuk menjadi bagian dari Keluarga Museum Lan, silakan menghubungi Yayasan Museum Lan di <a
                        href="mailto:foundation@museumlan.org" style="color: brown;">foundation@museumlan.org</a> atau
                    <a href="tel:+6287712228886" style="color: brown;">+62 877 1222 8886</a>
                </p><br>
            </div>

            <div class="item" onclick="toggleContent('contentisi4')">
                <a href="#">Inisiatif Pendukung Edukasi</a>
                <i class="fas fa-plus"></i>
            </div>
            <div id="contentisi4" class="contentisi">
                <br>
                <p>Berikan Hadiah Edukasi!<br>
                    <br>Museum LAN adalah salah satu museum seni yang dapat diakses publik di Indonesia dengan komitmen
                    berkelanjutan untuk pendidikan seni. Kami mengandalkan dukungan dari banyak pihak untuk menghadirkan
                    pengalaman pendidikan yang berarti bagi pelajar dari berbagai latar belakang budaya dan ekonomi.<br>
                    <br>Bergabunglah bersama kami dalam Inisiatif Pendukung Edukasi dan hadiahkan sebuah kunjungan
                    lapangan ke Museum LAN untuk satu kelas berisi hingga 50 pelajar dari sekolah di Samarinda. Museum
                    LAN memilih sekolah berdasarkan kebutuhan dan atas komitmen kami akan keberagaman; program ini
                    bertujuan untuk mendukung partisipasi budaya dari para pelajar dengan latar belakang sosial ekonomi
                    yang beragam.<br>
                    <br>Dengan Rp2.500.000, satu kelas yang berisi hingga 50 pelajar akan mendapatkan tiket akses ke
                    museum, termasuk makan siang dan transportasi bus, serta program lengkap yang dipandu oleh tim
                    edukasi museum. Selain itu, para guru dan pendidik akan diundang ke acara Forum Pendidik yang
                    diadakan baik secara daring maupun tatap muka, di mana mereka akan bertemu dengan guru dan pendidik
                    lain dari penjuru Indonesia.<br>
                </p>
                <br>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Museum Lan | All Rights Reserved</p>
        <p>
            <a href="#">Siti Fauziah Wulandari</a> |
            <a href="https://classroom.google.com/c/NzEwMjM0NDcyMzE3/a/NzA2NzI0Nzc4MzA3/details">Posttest4</a>
        </p>
    </footer>

    <script>
    hamburger.addEventListener("click", () => {
        navLinks.classList.toggle("active");
    });
    const toggleButton = document.getElementById("dark-mode-toggle");

    toggleButton.addEventListener("click", () => {
        document.body.classList.toggle("dark-mode");
        document.querySelector("nav").classList.toggle("dark-mode");

        const links = document.querySelectorAll("a");
        links.forEach((link) => link.classList.toggle("dark-mode"));

        ent.querySelector("footer").classList.toggle("dark-mode");
    });

    function toggleContent(contentId) {
        const content = document.getElementById(contentId);
        if (content.style.display === "none" || content.style.display === "") {
            content.style.display = "block";
        } else {
            content.style.display = "none";
        }
    }
    </script>

</body>

</html>