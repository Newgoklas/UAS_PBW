<?php
    session_start();
    if (!$_SESSION['isLoggedIn']) 
    {
        header("location: login.php");
    }
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaanku</title>
    <link rel="icon" href="images/LogoPerpustakaanku.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header id="atas" style="display: flex; align-items: center; justify-content: space-between; padding: 10px;">
         <!-- Logo atau Judul -->
         <div class="logo" style="text-align: left; flex-shrink: 0; display: flex; align-items: center; gap: 10px;">
            <img src="images/LogoPerpustakaanku.png" alt="Logo Perpustakaanku" style="width: 40px; height: 40px;">
            <span style="font-size: 20px; font-weight: bold; white-space: nowrap;">Perpustakaanku</span>
        </div>
      
        <!-- Logo atau Judul
        <div class="logo" style="text-align: left; flex-shrink: 0;">
            <span style="font-size: 20px; font-weight: bold; white-space: nowrap;">Perpustakaanku</span>
        </div> -->

        <!-- Navigasi -->
        <div class="navigation" style="flex-grow: 1; text-align: right;">
            <ul class="menu" style="list-style: none; margin: 0; padding: 0; display: flex; gap: 15px; justify-content: flex-end;">
                <li class="menu-item"><a href="#home" style="text-decoration: none;">Home</a></li>
                <!-- <li class="menu-item"><a href="#populer" style="text-decoration: none;">Etalase Buku</a></li> -->
                <li class="menu-item"><a href="input_buku.php" style="text-decoration: none;">Input Buku</a></li>
                <li class="menu-item"><a href="daftar_buku.php" style="text-decoration: none;">Daftar Buku</a></li>
                <li class="menu-item"><a href="logout.php" style="text-decoration: none;">Logout</a></li>
            </ul>
        </div>
    </header>

<section>
<div id="home" class="slider">
  <!-- Slider main container -->
  <div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide"><img src="images/Welcome.png" alt=""></div>
      <div class="swiper-slide"><img src="images/Perpustakaan1.jpg" alt=""></div>
      <div class="swiper-slide"><img src="images/Perpustakaannew.png" alt=""></div>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
  
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    const swiper = new Swiper('.swiper', {
    
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
  loop: true,

  // If we need pagination
   pagination: {
    el: '.swiper-pagination',
    clickable: true,
  }, 

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});
</script>

</section>
</div>
    <!-- <h1 id="populer" class="title-p">Games</h1>
    <section class="populer">
        <div class="Genshin">
            <div class="link">
                <a href="#harga-Genshin">
                        <img src="images/GenshinImpact.jpg" alt="">
                        <div class="judul-produk">Genshin Impact</div>
                </a>
            </div>
            <div class="overlay" id="harga-Genshin">
                <div class="popup">
                    <h2>HARGA GENSHIN IMPACT</h2>
                    <a class="close" href="#populer">&times;</a>
                    <br>
                    
                </div>
            </div>
        </div>
        <div class="Mobile Legends">
            <div class="link">
                <a href="#harga-ML">
                        <img src="images/mlbb.jpg" alt="">
                        <div class="judul-produk">Mobile Legends</div>
                </a>
            </div>
            <div class="overlay" id="harga-ML">
                <div class="popup">
                    <h2>HARGA MOBILE LEGENDS</h2>
                    <a class="close" href="#populer">&times;</a>
                    <br>
                    
                </div>
            </div>
        </div>
        <div class="PUBG">
            <div class="link">
                <a href="#harga-PUBG">
                        <img src="images/pubgm.jpg" alt="">
                        <div class="judul-produk">PUBG Mobile</div>
                </a>
            </div>
            <div class="overlay" id="harga-PUBG">
                <div class="popup">
                    <h2>HARGA PUBG MOBILE</h2>
                    <a class="close" href="#populer">&times;</a>
                    <br>
                    
                </div>
            </div>
        </div>
        <div class="FF">
            <div class="link">
                <a href="#harga-FF">
                        <img src="images/ff.png" alt="">
                        <div class="judul-produk">Free Fire</div>
                </a>
            </div>
            <div class="overlay" id="harga-FF">
                <div class="popup">
                    <h2>HARGA FREE FIRE</h2>
                    <a class="close" href="#populer">&times;</a>
                    <br>
                    
                </div>
            </div>
        </div>
        <div class="Honkai Impact">
            <div class="link">
                <a href="#harga-HI">
                        <img src="images/Honkai.png" alt="">
                        <div class="judul-produk">Honkai Impact 3rd</div>
                </a>
            </div>
            <div class="overlay" id="harga-HI">
                <div class="popup">
                    <h2>HARGA HONKAI IMPACT</h2>
                    <a class="close" href="#populer">&times;</a>
                    <br>
                    
                </div>
            </div>
        </div>
        <div class="Valorant">
            <div class="link">
                <a href="#home">
                        <img src="images/valorant.jpg" alt="">
                        <div class="judul-produk">Valorant</div>
                </a>
            </div>
        </div>
    </section>

    <h1 class="title-p">Aplikasi Premium</h1>
    <section id="aplikasipremium" class="populer">
        <div class="Spotify">
            <div class="link">
                <a href="#harga-spotify">
                        <img src="images/spotify.png" alt="">
                        <div class="judul-produk">Spotify</div>
                </a>
            </div>
            <div class="overlay" id="harga-spsotify">
                <div class="popup">
                    <h2>HARGA SPOTIFY</h2>
                    <a class="close" href="#populer">&times;</a>
                    <br>
                    
                </div>
            </div>
        </div>
        <div class="Netflix">
            <div class="link">
                <a href="#harga-Netflix">
                        <img src="images/netflix.png" alt="">
                        <div class="judul-produk">Netflix</div>
                </a>
            </div>
            <div class="overlay" id="harga-Netflix">
                <div class="popup">
                    <h2>HARGA NETFLIX</h2>
                    <a class="close" href="#populer">&times;</a>
                    <br>
                    
                </div>
            </div>
        </div>
        <div class="Picsart">
            <div class="link">
                <a href="#harga-Picsart">
                        <img src="images/picsart-app-icon.png" alt="">
                        <div class="judul-produk">Picsart</div>
                </a>
            </div>
            <div class="overlay" id="harga-Picsart">
                <div class="popup">
                    <h2>HARGA PICSART</h2>
                    <a class="close" href="#populer">&times;</a>
                    <br>
                    
                </div>
            </div>
        </div>
        <div class="HBO">
            <div class="link">
                <a href="#harga-HBO">
                        <img src="images/HBO go.png" alt="">
                        <div class="judul-produk">HBO</div>
                </a>
            </div>
            <div class="overlay" id="harga-HBO">
                <div class="popup">
                    <h2>HARGA HBO</h2>
                    <a class="close" href="#populer">&times;</a>
                    <br>
                    
                </div>
            </div>
        </div>
        <div class="Canva">
            <div class="link">
                <a href="#harga-Canva">
                        <img src="images/canva.png" alt="">
                        <div class="judul-produk">Canva</div>
                </a>
            </div>
            <div class="overlay" id="harga-Canva">
                <div class="popup">
                    <h2>HARGA CANVA</h2>
                    <a class="close" href="#populer">&times;</a>
                    <br>
                    
                </div>
            </div>
        </div>
        <div class="Alight Motion">
            <div class="link">
                <a href="#harga-AM">
                        <img src="images/am.png" alt="">
                        <div class="judul-produk">Alight Motion</div>
                </a>
            </div>
            <div class="overlay" id="harga-AM">
                <div class="popup">
                    <h2>HARGA ALIGTH MOTION</h2>
                    <a class="close" href="#populer">&times;</a>
                    <br>
                    
                </div>
            </div>
        </div>
        <div class="YT">
            <div class="link">
                <a href="#home">
                        <img src="images/YT.png" alt="">
                        <div class="judul-produk">Youtube Premium</div>
                </a>
            </div>
        </div>
    </section>

    <section class="tentang" id="tentang">
        <div class="card">
            <h1>TENTANG KAMI</h1>
            <br>
            <p>
                <a href="" class="title">NEMMASTORE</a> adalah website yang menyediakan layanan digital 
                <br>
                seperti layanan streaming premium, voucher game, dan lain-lain.
                <br>
                Kami berdiri sejak tahun 2023 dan telah dipercaya oleh berbagai konsumen.
            </p>
        </div>
    </section> -->

    <?php
    // $dbh = $koneksi->query("SELECT * FROM buku WHERE isdel = 0");
    // $bukus = $dbh->fetch(PDO::FETCH_ASSOC);
    ?>
<div class="daftar_buku" id="daftarbk">

<!-- <table border="1"> -->
    <!-- <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tahun Terbit</th>
        <th>Aksi</th>
    </tr> -->
    <?php 
        // $no = $bukus['id'];
        // while($bukus = $dbh->fetch(PDO::FETCH_ASSOC))
        // {
    ?>
        <!-- <tr>
            <td><?php echo $no ?> </td>
            <td><?php echo $bukus['judul'] ?></td>
            <td><?php echo $bukus['penulis'] ?></td>
            <td><?php echo $bukus['tahun'] ?></td>
            <td><a href="edit.php?id=<?php echo $bukus['id'] ?>">Edit</a> | <a 
            href="delete.php?id=<?php echo $bukus['id']?>">Hapus</a></td>
        </tr> -->
    <?php
        // $no++;
        // }
    ?>

<!-- </table> -->

    <!--Footer Start-->
    <!-- <footer id="sosmed">
        <div class="footerContainer">
          <div class="socialicons">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-whatsapp"></i></a>
            <a href="#home"><i class="fa-brands fa-instagram"></i></a>
          </div>
          <div class="footernav">
            <ul>
              <li><a href="">Home</a></li>
              <li><a href="">News</a></li>
              <li><a href="">About</a></li>
              <li><a href="">Contact Us</a></li>
              <li><a href="">Our Team</a></li>
            </ul>
          </div>
        </div> -->
        <div class="footereBottom">
          <p>Copyright & Copy 2023 Designed by <span class="designer">JawaSu Official</span></p>
        </div>
      </footer>
    <!--Footer End-->
</body>
</html>
