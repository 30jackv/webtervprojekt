<?php
    session_start();

    $adminfile = "fiokok/admin.json";

    $adminok = json_decode(file_get_contents($adminfile), true);

    $admine = false;

    foreach ($adminok["adminok"] as $admin) {
        if ($admin["felhasznalonev"] === $_SESSION["felhasznalo"]["felhasznalonev"]) {
            $admine = true;
            break;
        }
    }
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
  <link rel="stylesheet" href="css/allatok.css">
  <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
<nav>
  <a href="index.php">Kezdőlap</a>
  <a class="active">Állatok</a>
    <?php if (!isset($_SESSION["felhasznalo"])) { ?>
        <a href="bejelentkezes.php">Bejelentkezés</a>
    <?php } else { ?>
        <a href="kosar.php">Kosár</a>
        <a href="profil.php">Profil</a>
        <?php if (isset($admine) && ($admine === true)) {?>
            <a href="admin.php">Admin</a>
        <?php } ?>
        <a href="kijelentkezes.php">Kijelentkezés</a>
    <?php } ?>

</nav>

<main id="main-allat">
  <section>
    <img src="img/zsiraf.jpg" alt="Zsiráf">
    <h2>Zsiráf</h2>
    <a>
      A zsiráfok eredetileg egész Afrikában megtalálhatóak voltak, azonban manapság a Szaharától délre fekvő területeken élnek. A zsiráf a világ legmagasabb állata: marmagasságuk eléri a 3,3 métert. Nappal, a hűvösebb reggeli és esti órákban aktív, ilyenkor táplálkozik és iszik. Éjszaka többnyire állva (de olykor fekve), fejét mindig az egyik hátsó lábán nyugtatva alszik.
    </a>
  </section>
  <section>
    <img src="img/elefant.jpg" alt="Elefánt">
    <h2>Elefánt</h2>
    <a>
      Az elefántok a ma élő legnagyobb szárazföldi állatok, egyben a legtermetesebb szárazföldi emlősök. Számos lelet tanúsítja, hogy az őskori emberek fogyasztottak különféle elefántféléket, az ókor több civilizációjában pedig a hadsereg fő csapásmérő erői voltak. Indiában mindmáig kultikus tisztelet övezi őket.
    </a>
  </section>
  <section>
    <img src="img/jegesmedve.jpg" alt="Jegesmedve">
    <h2>Jegesmedve</h2>
    <a>
      A jegesmedve elterjedési területe az Északi-sarkvidék jégmezőinek déli része. A legtöbb jegesmedve szinte sohasem teszi a lábát igazi szárazföldre. A ragadozó emlősök rendjének legnagyobb testű képviselője. A jegesmedve szinte állandóan vándorúton van, s emiatt még saját territóriumot sem tart. Táplálékának zöme állati eredetű, s mivel a sarkvidék zord körülményei közt nemigen válogathat, szinte mindent megeszik.
    </a>
  </section>
  <section>
    <img src="img/whitetiger.jpg" alt="Fehér Tigris">
    <h2>Fehér tigris</h2>
    <a>
      1951-ben, India középső részén Shri Martand Singh maharadzsa egy hím fehér kölyköt talált, amelynek anyját nem sokkal azelőtt ölték meg. A maharadzsa elvitte a kölyköt a palotájába és a „Mohan” nevet adta neki. Tőle származik a jelenleg fogságban élő összes fehér tigris, mintegy 250 darab. Magyarországon négy helyen tartják mint például: a Nyíregyházi Állatparkban.
    </a>
  </section>

  <table id="allatok-tablazat">
    <caption>Állatok információi</caption>
    <thead>
    <tr>
      <th>Állat</th>
      <th>Név</th>
      <th>Kor</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>Zsiráf</td>
      <td>Pudli</td>
      <td>6 éves</td>
    </tr>
    <tr>
      <td>Elefánt</td>
      <td>Dumbo</td>
      <td>20 éves</td>
    </tr>
    <tr>
      <td>Jegesmedve</td>
      <td>Vili</td>
      <td>12 éves</td>
    </tr>
    <tr>
      <td>Fehér tigris</td>
      <td>Micimackó</td>
      <td>18 éves</td>
    </tr>
    </tbody>
  </table>
</main>

</body>
</html>