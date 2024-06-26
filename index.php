<?php
    session_start();

    include 'fuggvenyek/adminellenorzes.php';

    $isAdmin = isAdmin();

?>
<!DOCTYPE html>

<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title>ECO Állatkert</title>

  <meta name="author" content="Csávás Levente Zsolt, és Tuza Tibor">
  <meta name="description" content="ECO Állatkert honlapja">
  <meta name="keywords" content="állatkert,szeged">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="img/giraffe.png">
  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
<nav>
    <a class="active">Kezdőlap</a>
    <a href="allatok.php">Állatok</a>
    <?php if (!isset( $_SESSION["felhasznalo"])) { ?>
        <a href="bejelentkezes.php">Bejelentkezés</a>
    <?php } else { ?>
        <a href="kosar.php">Kosár</a>
        <a href="profil.php">Profil</a>
        <?php if ($isAdmin === true) {?>
        <a href="admin.php">Admin</a>
        <?php } ?>
        <a href="kijelentkezes.php">Kijelentkezés</a>
    <?php } ?>
</nav>

  <main id="main-index">
    <img src="img/whitetiger.jpg" alt="tigris xd">
    <section>
      <h1>Üdvözlünk az ECO Állatkert honlapján!</h1>
      <article id="index-article">
          Fedezd fel az ECO Állatkert csodálatos világát, ahol egy felejthetetlen élmény vár!
          A mi állatkertünk sok állattal és szebbnél szebb növényekkel büszkélkedhet természetvédelem és kutatás érdekében.
          Nagy macskáktól az  igen pici bogarakig, a mi változatos állatkertünk garantálja a mókát!
          Az újító és interaktív programjainkon keresztül megismerheted az egyes állatainkat és növényeinket,
          továbbá betekintést is nyerhetsz a megőrzési és mindennapi törekvéseinkbe.
          Vegyél részt és ünnepelj velünk a természet szépségéért és sokszínűségéért!
      </article>
      <iframe id="google-terkep" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2758.921392704776!2d20.11770281401672!3d46.25179047341602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474487d1f7026fe1%3A0x290d7030b068f7e2!2sSzeged%20Zoo!5e0!3m2!1sen!2shu!4v1708795246601!5m2!1sen!2shu" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <div class="icon-kontenor">
        <a href="https://www.youtube.com/watch?v=Fu4F3mFk1pQ" target="_blank"> <img class="icon" src="img/youtube.png" alt="YouTube"></a>
        <a href="https://www.instagram.com/szegedzoo/" target="_blank"> <img class="icon" src="img/instagram.png" alt="Instagram"></a>
        <a href="https://www.facebook.com/szegedivadaspark" target="_blank"> <img class="icon" src="img/facebook.png" alt="Facebook"> </a>
      </div>
    </section>
  </main>

  <footer>
    <h1>Programok</h1>
      <?php
      $programfile = "fiokok/programok.json";
      $programok = json_decode(file_get_contents($programfile), true);

      if (empty($programok["programok"])) {
          echo '<h1 style="text-align: center;">' . 'Jelenleg nincs program' .'</h1>';
      }
      ?>
    <div id="programok">
        <?php
        $programfile = "fiokok/programok.json";
        $programok = json_decode(file_get_contents($programfile), true);

        foreach ($programok["programok"] as $program) {
            echo '<div class="program-container">';
            echo '<div class="program-container-cim">';
            echo '<h3>' . $program["program-nev"] . '</h3>';
            echo '</div>';
            echo '<div class="ar-container">';
            echo '<p>' . 'Ár:' . '</p>';
            echo '<p>' . $program["program-ar"] . '</p>';
            echo '</div>';
            echo '<div class="leiras-container">';
            echo '<p>' . 'Dátum:' . '</p>';
            echo '<p>' . $program["program-datum"] . '</p>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
  </footer>
</body>
</html>
