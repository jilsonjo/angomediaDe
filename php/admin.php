<?PHP
ob_start();
session_start();
//require_once "./funcs.php";
require_once "./User.class.php";

date_default_timezone_set("Europe/Berlin");
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', 1);
//////////////////////////////////////////////////////////////////////////////////////////////////
?>
<!doctype html>
<html lang="de">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kontaktaufnehmen für Webentwicklung und Grafikdesign in Berlin</title>
  <meta name="description" content="Ich erstelle Ihre individuelle Website, Ihren optimierten Onlineshop oder gestalte Ihr attraktives Grafikdesign. Rufen Sie an, ich berate Sie kostenlos!">
  <meta name="author" content="Jilson João">
  <meta name="robots" content="nofollow">
  <meta name="googlebot" content="noindex">
  <link rel="stylesheet" href="../styles/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../styles/main.css">
  <!-- <script defer src="../js/validateUser.js"></script> -->
</head>

<body id="top" class="d-flex flex-column h-100">
  <header>
    <nav id="navBar" class="navbar navbar-expand-md py-0 navbar-light nav-bg border-bottom fixed-top" aria-label="Fourth navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html"><img src="..images/Logo-Angomedia-webdesign-obb.png" alt="Kontakt-Webentwicklung-Webdesign"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample04">
          <ul class="navbar-nav ms-auto mb-2 mb-md-0 text-uppercase">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.html"><i class="bi bi-house-fill"></i>Startseite</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profil.html"><i class="bi bi-person-square"></i>Profil</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="webdesign-berlin.html" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-gear-wide"></i>Leistungen</a>
              <ul class="dropdown-menu text-capitalize" aria-labelledby="dropdown04">
                <li><a class="dropdown-item" href="webdesign-berlin.html"><i class="bi bi-laptop"></i>Webdesign & Development</a></li>
                <li><a class="dropdown-item" href="webdesign-berlin.html#onlineshop"><i class="bi bi-cart3"></i>Online Shops</a></li>
                                  <li><a class="dropdown-item" href="grafikdesign-berlin.html"><i class="bi bi-brush"></i>Grafikdesign & Printdesign</a></li>
                  <li><a class="dropdown-item" href="webdesign-preise.html"><i class="bi bi-brush"></i>Webdesign-Preise</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Kontakt.html"><i class="bi bi-info-square-fill"></i>Kontakt</a>
            </li>
          </ul>
          <a class="nav-link" href="Kontakt.html">
            <button class="btn btn-outline-success">
              Anfrage
              <span class="d-none d-xl-inline">
                senden
              </span>
            </button>
          </a>
        </div>
      </div>
    </nav>
  </header>

  <!-- Begin page content -->
  <main class="flex-shrink-0">
    <section class="container-fuid contact">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center">
            <img src="images/angomedia-webdesign-kontakt.webp" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h1 class="">User Admin</br>
              <span class="text-colored">Privatbereich</span>
            </h1>
          </div>
        </div>
      </div>
    </section>
    <section class="container-fuid contact-area">
      <div class="container user contact-details">
        <div style="color: #ff3333;" id="serverError"></div>
        <?PHP
        $user_logged = $_SESSION["useremail"];
        if ($user_logged !== "tipapa@tipapa.de") {
          header('Location: https://angomedia.de');
        } else { ?>
          <div><a href="/php/logout.php"><?PHP echo $user_logged . " ist eingelogget."; ?></a></div>
        <?PHP }

        $db = new User;
        $data = $db->get_user_data();

        foreach ($data as $key => $value) { ?>
          <div class="userdata" style="border-bottom: #ddd solid 1px; padding:10px; margin-bottom: 15px">
            <div class="userdata-item">
              <Span> Datum: <?PHP echo date('d.m.Y H:i:s', (int)$value["CDatetime"]); ?></Span>
            </div>
            <div class="userdata-item">
              <Span><?PHP echo $value["CGender"] . " "; ?></Span><Span><?PHP echo $value["CName"] ?></Span>
            </div>
            <div class="userdata-item">
              <Span>E-Mail: <?PHP echo $value["CEmail"] ?></Span>
            </div>
            <div class="userdata-item">
              <Span> Tel: <?PHP echo $value["CFone"] . " "; ?></Span>
            </div>
            <div class="userdata-item">
              <Span><?PHP echo $value["CMessage"] ?></Span>
            </div>
          </div>
        <?PHP } ?>
      </div>
    </section>
    <div id="downArrow" class="show-arrow"><a href="#top"><i class="bi bi-chevron-up"></i></a></div>
  </main>
  <footer class="footer mt-auto pt-3 border-top">
    <div class="container ">
      <div class="row">
        <div class="col-md-4">
          <h5>Unsere Leistungen für Sie</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="webdesign-berlin.html">Webdesign</a></li>
            <li><a class="link-secondary" href="grafikdesign-berlin.html">Grafikdesign</a></li>
            <li><a class="link-secondary" href="webdesign-berlin.html#onlineshop">Onlineshop</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Kontakt aufnehmen!</h5>
          <ul class="list-unstyled text-small">
            <li>info@angomedia.de</li>
            <li>Tel: 01722902449</li>
            <li><a class="link-secondary" href="Kontakt.html">Jetzt Nachricht schreiben</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Öffnungszeiten</h5>
          <ul class="list-unstyled text-small">
            <li>Mo. - Fr. von 9:00 bis 18:00 Uhr</li>
            <li>Sa. von 10:00 bis 16:30 Uhr</li>
            <li>Sonst nach Veranbachung</li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <div class="container-fluid footer-bar">
    <div class="container-md px-0 px-md-3">
      <div class="row align-items-center">
        <div class="col-md-4 ">
          <span>
            <small class=" mb-3 text-muted text-uppercase"><a class="" href="#"><img src="images/Logo-Angomedia-webdesign-obb.png" height="20"></a>&nbsp;<b>copyright &copy; 2021</b> </small>
          </span>
        </div>
        <div class="col-md-3 col-lg-4">
          <div class="row">
            <div class="col-3">
              <a href=""><i class="bi bi-facebook" style="font-size: 30px; color: #336699;"></i></a>
            </div>
            <div class="col-3">
              <a href=""><i class="bi bi-youtube" style="font-size: 30px; color: #ff3333;"></i></a>
            </div>
            <div class="col-3">
              <a href=""><i class="bi bi-twitter" style="font-size: 30px; color: #3399ff;"></i></a>
            </div>
            <div class="col-3">
              <a href=""><i class="bi bi-instagram" style="font-size: 30px; color: #555;"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-5 col-lg-4 p-0">
          <ul class="d-flex m-0 p-0">
            <a href="/impressum.html">Impressum</a>
            </li>
            <li>
              <a href="/agb.html">AGB</a>
            </li>
            <li>
              <a href="/datenschutz.html">Datenschutz</a>
            </li>
            <li>
              <a href="/logout.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <script src="styles/bootstrap-5.0.0-beta2-dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="js/main.js"></script>  -->
  <?PHP
  //////////////////////////////////////////////////////////////////////////////////////////////////
  ob_end_flush();
  ?>
</body>

</html>