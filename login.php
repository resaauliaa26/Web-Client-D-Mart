<?php
include 'koneksi.php';

$error = "";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Cek ke database HeidiSQL
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        // Simpan data login ke session browser
        $_SESSION['login'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama_lengkap'];
        $_SESSION['role'] = $row['role'];

        // Alihkan halaman sesuai role masing-masing
        if ($row['role'] == 'admin') {
            header("Location: dashboard_admin.php");
        } else {
            header("Location: dashboard.php");
        }
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rona Nuswa - Login Akun Pelanggan</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="css/hover-min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
      /* Penyelarasan Tema Warna Rona Nuswa - Gold & Dark Chocolate */
      .menu ul li a {
        color: #3D2314 !important; /* Dark Chocolate */
        font-weight: bold;
        position: relative;
      }
      .menu ul li a::after {
        content: "";
        position: absolute;
        width: 0;
        height: 3px;
        bottom: 0;
        left: 0;
        background-color: #D4AF37 !important; /* Gold */
        transition: width 0.3s ease-in-out;
        border-radius: 5px;
      }
      .menu ul li a:hover::after {
        width: 100%;
      }
      .badge {
        background-color: #D4AF37 !important; /* Gold */
        color: #3D2314 !important; /* Dark Chocolate */
        font-weight: bold;
      }
      .shopping-cart:hover {
        color: #D4AF37 !important;
        transform: scale(1.1);
        transition: 0.3s ease-in-out;
      }
      .btn-primary {
        background-color: #D4AF37 !important; /* Gold */
        border-color: #3D2314 !important;
        color: #3D2314 !important; /* Dark Chocolate */
        font-weight: bold;
      }
      .btn-primary:hover {
        background-color: #3D2314 !important; /* Dark Chocolate */
        color: #D4AF37 !important; /* Gold */
      }
      .login .form fieldset {
        border: 1px solid #D4AF37 !important;
        border-radius: 8px;
      }
      .login .form legend {
        color: #3D2314;
        font-weight: bold;
      }
      .login .form input[type="text"], 
      .login .form input[type="password"] {
        border: 1px solid #D4AF37;
        border-radius: 4px;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <header class="navbar">
      <nav id="site-top-nav" class="navbar-menu navbar-fixed-top">
        <div class="container">
          <div class="logo">
            <a href="index.html" title="Logo Rona Nuswa">
              <img
                src="img/logo.png"
                alt="Logo Rona Nuswa"
                class="img-responsive"
              />
            </a>
          </div>
          <div class="menu text-right">
            <ul>
              <li>
                <a class="hvr-underline-from-center" href="index.html">Home</a>
              </li>
              <li>
                <a class="hvr-underline-from-center" href="categories.html"
                  >Categories</a
                >
              </li>
              <li>
                <a class="hvr-underline-from-center" href="foods.html"
                  >Layanan Jasa</a
                >
              </li>
              <li>
                <a class="hvr-underline-from-center" href="order.html"
                  >Booking</a
                >
              </li>
              <li>
                <a class="hvr-underline-from-center" href="contact.html"
                  >Contact</a
                >
              </li>
              <li>
                <a class="hvr-underline-from-center" href="login.php" style="color: #D4AF37 !important;">Login</a>
              </li>
              <li>
                <a id="shopping-cart" class="shopping-cart">
                  <i class="fa fa-cart-arrow-down"></i>
                  <span class="badge">4</span>
                </a>
                <div id="cart-content" class="cart-content">
                  <h3 class="text-center">Daftar Booking</h3>
                  <table class="cart-table" border="0">
                    <tr>
                      <th>Layanan</th>
                      <th>Nama Paket</th>
                      <th>Tarif</th>
                      <th>Qty</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                    <tr>
                      <td><img src="img/layanan/wedding_makeup.jpg" alt="Layanan" /></td>
                      <td>Paket Wedding Silver</td>
                      <td>Rp 3.500.000</td>
                      <td>1</td>
                      <td>Rp 3.500.000</td>
                      <td><a href="#" class="btn-delete">&times;</a></td>
                    </tr>
                    <tr>
                      <td><img src="img/layanan/live_music.jpg" alt="Layanan" /></td>
                      <td>Band Akustik (Wedding)</td>
                      <td>Rp 3.000.000</td>
                      <td>1</td>
                      <td>Rp 3.000.000</td>
                      <td><a href="#" class="btn-delete">&times;</a></td>
                    </tr>
                    <tr>
                      <td><img src="img/layanan/kostum.jpg" alt="Layanan" /></td>
                      <td>Sewa Kostum Jaipong Merah</td>
                      <td>Rp 100.000</td>
                      <td>1</td>
                      <td>Rp 100.000</td>
                      <td><a href="#" class="btn-delete">&times;</a></td>
                    </tr>
                    <tr>
                      <th colspan="4">Total</th>
                      <th>Rp 6.600.000</th>
                      <th></th>
                    </tr>
                  </table>
                  <a href="order.html" class="btn-primary">Confirm Booking</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <section class="login">
      <div class="container">
        <h2 class="text-center">Login Akun</h2>
        <div class="heading-border"></div>

        <form action="" method="POST" class="form">
          <fieldset>
            <legend>Masuk ke Rona Nuswa</legend>
            
            <?php if($error): ?>
                <p style="color: #cc0000; font-weight: bold; margin-bottom: 15px; text-align: center;"><?= $error; ?></p>
            <?php endif; ?>

            <p class="label">Username Pelanggan</p>
            <input
              type="text"
              name="username"
              placeholder="Masukkan username Anda..."
              required
            />
            <p class="label">Password</p>
            <input
              type="password"
              name="password"
              placeholder="Masukkan kata sandi Anda..."
              required
            />
            <input type="submit" name="login" value="Login" class="btn-primary" />
          </fieldset>
        </form>
      </div>
    </section>

    <section class="footer">
      <div class="container">
        <div class="grid-3">
          <div class="text-center">
            <h3>About Us</h3>
            <br />
            <p>
              Rona Nuswa merupakan penyedia layanan profesional di bidang Seni
              Tari Tradisional Jaipongan, Tata Rias Artistik (MUA), serta
              Wedding Entertainment terpercaya untuk mewujudkan momen istimewa
              Anda dengan sentuhan budaya Nusantara yang elegan.
            </p>
          </div>
          <div class="text-center">
            <h3>Site Map</h3>
            <br />
            <div class="site-links">
              <a href="categories.html">Categories</a>
              <a href="foods.html">Layanan Jasa</a>
              <a href="order.html">Booking</a>
              <a href="contact.html">Contact</a>
              <a href="login.php">Login</a>
            </div>
          </div>
          <div class="social-links">
            <h3>Social Links</h3>
            <br />
            <div class="social">
              <ul>
                <li>
                  <a href="#"
                    ><img
                      src="https://img.icons8.com/color/48/null/facebook-new.png"
                  /></a>
                </li>
                <li>
                  <a href="#"
                    ><img
                      src="https://img.icons8.com/fluency/48/null/instagram-new.png"
                  /></a>
                </li>
                <li>
                  <a href="#"
                    ><img
                      src="https://img.icons8.com/color/48/null/twitter--v1.png"
                  /></a>
                </li>
                <li>
                  <a href="#"
                    ><img
                      src="https://img.icons8.com/color/48/null/linkedin-circled--v1.png"
                  /></a>
                </li>
                <li>
                  <a href="#"
                    ><img
                      src="https://img.icons8.com/color/48/null/youtube-play.png"
                  /></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="copyright">
      <div class="container text-center">
        <p>
          All rights reserved. Design By <a href="#">Code Arcade</a> & Rona
          Nuswa
        </p>
      </div>
      <a id="back-to-top" class="btn-primary">
        <i class="fa fa-angle-double-up"></i>
      </a>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>