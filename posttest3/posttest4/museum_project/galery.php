<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Museum Lan - Gallery</title>
    <!-- <link rel="stylesheet" href="galery.css"> -->
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

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0px 50px;
  background: rgba(0, 0, 0, 0.3);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 9999;
}

.logo {
font-family: "Arthouse", serif;
font-size: 70px;
color: #f9f7cf;
margin: 15px;
}

.nav-links {
list-style: none;
display: flex;
font-weight: bold;
}

.nav-links li {
margin: 15px 0;
}

.nav-links li a {
color: #f8f0e5;
text-decoration: none;
font-size: 1.1rem;
margin: 25px;
}

.nav-links li a:hover {
color: rgb(252, 192, 138);
transition: 0.3s;
transform: scaleX(0.2);
}

/* Hamburger Menu */
.hamburger {
display: none;
flex-direction: column;
cursor: pointer;
gap: 5px;
}

.hamburger span {
width: 30px;
height: 3px;
background-color: white;
}

.contact-btn {
background-color: rgb(170, 118, 28);
color: #603f26;
padding: 10px 20px;
border-radius: 50px;
}

/* Dark Mode Button */
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


nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0px 50px;
  background: rgba(0, 0, 0, 0.3);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 9999;
}

    /*Gallery Section */
    .gallery {
        padding: 1rem ;
        background-color: white;
        width: 100%;
        margin: 0 auto;
    }

    .gallery h2 {
        color: #ad8572;
        text-align: center;
        margin: auto;
        font-size: 3rem;
        margin-top: 11rem;
        margin-bottom: 3rem;
    }

    .gallery {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: rem;
        border-bottom: 1px solid #ddd;
        padding: 100px;
        }

    .gallery:nth-child(odd) {
        flex-direction: row-reverse;
    }

    .galery-image {
        flex: 1;
        max-width: 40%;
        margin: 0 1rem;
    }

    .galery-image img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .gallery-content {
        flex: 1;
        padding: 1rem 2rem;
    }

    .gallery-content h3 {
        color: #603F26;
        font-weight: bold;
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }

    .gallery-content p {
        margin-top: 15px;
        font-size: 22px;
        color: black;
    }

    .dark-mode {
      background-color: #333;
      color: rgb(236, 231, 231);
    }

    .dark-mode .gallery {
      background-color: #6C4E31;
    }

    .dark-mode .gallery-content p {
      color: white;
    }

    .dark-mode .gallery-content h3 {
      color: rgb(208, 182, 148);
    }

    .dark-mode .gallery h2 {
        color: #f8f0e5;
    }

    .dark-mode footer a{
    color: #e3c00e;
  }

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


 
/* Tablet View (max-width: 768px) */
@media (max-width: 768px) {
    .gallery {
        flex-direction: column;
        align-items: center;
    }

    .gallery:nth-child(odd) {
        flex-direction: column;
    }

    .gallery-image,
    .gallery-content {
        max-width: 100%;
        flex: none;
        margin: 0;
        padding: 1rem 0;
    }

    .gallery-image img {
      width: 100%;
        margin-bottom: 1.5rem;
    }

    .gallery-content {
        text-align: center;
    }

    .hamburger {
        display: flex;
        flex-direction: column;
        cursor: pointer;
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
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
}

/* Mobile View (max-width: 480px) */
@media (max-width: 480px) {

  .gallery-image img {
        width: 95%; /* Memperbesar gambar sedikit untuk tampilan mobile */
        margin-bottom: 1.5rem;
    }
    
    .gallery {
        width: 100%; /* Change from 100px to 100% */
        padding: 20px;
    }

    .gallery-content h3 {
        font-size: 1.5rem;
    }

    .gallery-content p {
        font-size: 0.9rem;
    }

    .gallery h2 {
        font-size: 2.5rem;
        margin-top: 5rem;
    }

    .logo {
        font-size: 2rem;
    }

    .nav-links li a {
        font-size: 0.9rem;
    }
}



  </style>
  <body>
    <!-- Header -->
    <header>
      <nav>
        <div class="logo">Museum Lan</div>
        <ul class="nav-links">
          <li><a href="index.php">Home</a></li>
          <li><a href="#galery.php">Gallery</a></li>
          <li><a href="contac.php">Contact</a></li>
          <button id="dark-mode-toggle" class="dark-mode-toggle">
            Dark Mode
          </button>
        </ul>
        <div class="hamburger" onclick="toggleMenu()">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>
    </header>

    <!-- Gallery Section -->
    <!-- gambar 1 -->
    
    <section id="gallery" class="gallery">
      <h2>Welcome To Gallery Museum Lan</h2>

    <div class="gallery">
        <div class="galery-image">
            <img src="img/story1.JPG" alt="Art Piece 1" />
        </div>
        <div class="gallery-content">
            <h3>Madame Vigée-Le Brun et sa fille, Jeanne-Lucie-Louise, dite Julie (1780-1819)</h3>
                <p>Menurut otobiografinya, pelukis Amerika John Trumbull (1756-1843), melihat lukisan yang belum selesai di bengkel Vigée Le Brun di
                    Hôtel de Lubert pada 10 Agustus 1786. Dijual sebelum Revolusi,
                    dengan potret Hubert Robert, untuk harga yang tidak pernah dibayar
                    secara sempurna, kepada mantan jenderal petani, bankir istana dan
                    penjaga harta karun kerajaan, Jean Joseph, Marquis de La Borde
                    (1724-1794). Daftar penerimaan karya seni dan barang antik yang
                    ditemukan di kalangan pendatang dan narapidana. Kemudian kol. dan
                    hadiah dari Ny. Tripier Le Franc, mengikuti keinginan bibinya, Ny.
                    Vigée Le Brun, 1843.</p>
        </div>
    </div>

        <!-- gambar 2 -->
        <div class="gallery">
            <div class="galery-image">
                <img src="img/Story2.png" alt="Art Piece 2" />
            </div>
            <div class="gallery-content">
                <h3>Renaissance Sculpture</h3>
                <p>
                    Pada tahun 1818, seniman Théodore Géricault memutuskan untuk
                    melukis subjek kontemporer untuk Salon seni tahunan berikutnya di
                    Paris untuk membedakan dirinya dari pelukis sejarah tradisional.
                    Ia memilih sebuah peristiwa yang telah menyebabkan skandal dua
                    tahun sebelumnya: bangkai kapal Medusa, sebuah fregat angkatan
                    laut Prancis yang dikirim oleh Raja Louis XVIII untuk merebut
                    kembali Senegal dari Inggris. Kapal itu dikomandoi oleh seorang
                    kapten yang tidak kompeten yang menabrakkannya di lepas pantai
                    Afrika Barat kemudian meninggalkan 150 orang untuk hanyut di atas
                    rakit darurat, di mana mereka harus menggunakan kanibalisme untuk
                    tetap hidup. Hanya sepuluh yang selamat. Géricault mengambil
                    pendekatan ilmiah terhadap subjeknya, mewawancarai para penyintas
                    dan membuat sketsa anggota tubuh yang diamputasi yang dipinjamnya
                    dari sebuah rumah sakit. Rakit Medusa dianggap memalukan ketika
                    secara resmi dipresentasikan di Salon, tetapi selama
                    bertahun-tahun ia mendapatkan reputasi sebagai salah satu lukisan
                    Romantis besar pertama.
                </p>
            </div>
        </div>

        <!-- gambar 3 -->
        <div class="gallery">
          <div class="galery-image">
            <img src="img/story3.JPG" alt="Art Piece 2" />
          </div>
          <div class="gallery-content">
                <h3>
                    Family portrait in an interior, formerly called The Painter's
                    Family
                </h3>
                <p>
                    The carnations scattered on the floor are a sign of filial and
                    familial love, which is underlined by the painting in the
                    background, on the left (by Knupfer), representing Christ letting
                    the children come to him, and the procession of cupids sculpted on
                    the lintel of the fireplace. Note the custom of decorating the
                    fireplace (unused in the summer) with a large vase of flowers (cf.
                    Berkhout). A typical anecdotal (and commercial?) complacency once
                    led people to believe – at the end of the 18th century – that the
                    family represented here was that of the author of the painting, an
                    identification which was of course rejected by Hofstede de Groot.
                </p>
          </div>
        </div>

        <!-- gambar 4 -->
        <div class="gallery">
          <div class="galery-image">
            <img src="img/story4.jpg" alt="Art Piece 2" />
          </div>
          <div class="gallery-content">
                <h3>The Great Sphinx of Tanis</h3>
                <p>
                    For the ancient Egyptians, most artworks served a primarily
                    symbolic purpose. So this Great Sphinx was not just meant to look
                    good; it was, above all, a guardian. The lion’s body symbolises
                    the sky-god Horus and the human head represents the pharaoh, so
                    the sphinx demonstrates the link between the pharaoh and the gods
                    – especially the sun god Ra, the creator of the universe. With
                    its outstretched claws and tense body, this sphinx looks ready to
                    pounce, demonstrating its protective role. Sphinxes were placed at
                    the entrance to sacred places to keep evil forces away.
                </p>
          </div>
        </div>

        <!-- gambar 5 -->
        <div class="gallery">
            <div class="galery-image">
                <img src="img/story6.png" alt="Art Piece 5" />
            </div>
          <div class="gallery-content">
                <h3>Apollo Slaying the Serpent Python</h3>
                <p>
                    Louis XIV, the ‘Sun King’, identified himself with Apollo, the god
                    of the arts and the sun. In 1663, to reflect his dazzling image,
                    the king entrusted the decoration of the Galerie d’Apollon to his
                    court painter, Charles Le Brun. The latter oversaw an army of
                    artists and instructed them to elaborate on the theme of the sun.
                    The top of the vaulted ceiling is painted with allegories of the
                    hours from dawn to dusk, with the sun at its zenith in the centre.
                    Lower down, the months are modelled in stucco alongside paintings
                    of the four seasons. Twelve winged figures representing the hours
                    are depicted flying in the sky and the days of the week are
                    symbolised by animals; Thursday, for example, the day of Jupiter,
                    is represented by one of the god’s attributes, the eagle. The
                    overall decorative scheme was both artistically and politically
                    symbolic: like Apollo, the Sun King was the master of the universe
                    and a great patron of artists.
                </p>
            </div>
        </div>

        <!-- gambar 6 -->
        <div class="gallery">
            <div class="galery-image">
                <img src="img/st6.JPG" alt="Art Piece 6" />
                </div>
                    <div class="gallery-content">
                        <h3>Portrait of a Young Woman</h3>
                        <p>Collection Edmond-Auguste Bonnaffé (1825-1903), sold in 1897. Collection of the Marquise Gian-Martino Arconati Visconti, née Marie Peyrat (1840-1923), Paris. Donation Arconati Visconti, 1916 (committee of May 16, 1914, council of May 16, 1914, decree of November 11, 1916)</p>
                    </div>
                </div>
            </div>
      </div>
    </section>

      <!-- Footer -->
      <footer>
        <p>&copy; 2024 Museum Lan | All Rights Reserved</p>
        <p><a href="#">Siti Fauziah Wulandari</a> | <a href="https://classroom.google.com/c/NzEwMjM0NDcyMzE3/a/NzA2NzI0Nzc4MzA3/details">Posttest4</a></p>
      </footer>
  

    <script>
      // Dark Mode Toggle
      const toggleButton = document.getElementById("dark-mode-toggle");
      toggleButton.addEventListener("click", () => {
        document.body.classList.toggle("dark-mode");
      });

      // Hamburger Menu Logic
      const hamburger = document.querySelector(".hamburger");
      const navLinks = document.querySelector("nav ul");

      hamburger.addEventListener("click", () => {
        navLinks.classList.toggle("active");
      });
    </script>
  </body>
</html>
