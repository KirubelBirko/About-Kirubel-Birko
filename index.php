<!DOCTYPE html>
<html lang="NL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="Kirubel Birko">
    <link rel="stylesheet" href="css/style.css">
    <title>About me</title>
</head>
<body>
<?php
include "includes/header.php";
?>
<main>


<section id="wie-ben-ik1">
<section id="snelleoptions">
    <article>
        <h2><a href="#wie-ben-ik1">Wie ben ik</a></h2>
        <h2><a href="#wat-kan-ik">Wat kan ik</a></h2>
    </article>
</section>


<section id="wie-ben-ik">
    <article>
        <h1>Over mij</h1>
        <p>Mijn naam is <strong>Kirubel Birko</strong>, een 17-jarige gedreven student uit <strong>leiden</strong> met een passie voor technologie en sport. Naast het Nederlands beheers ik de taal <strong>Amhaars (Ethiopisch)</strong>, wat mij een unieke culturele achtergrond en een brede blik op de wereld geeft.    

            In mijn vrije tijd vind je me vaak op het voetbalveld, waar ik heb geleerd wat teamwork en discipline betekenen.
            Deze mentaliteit neem ik mee naar mijn werk als ontwikkelaar. Coderen is voor mij namelijk meer dan alleen een studie; het is mijn passie.
            Ik vind het geweldig om complexe problemen op te lossen en ideeën tot leven te brengen in de browser.
            <strong>Ik ben altijd op zoek naar nieuwe technieken om mijn skills naar een hoger niveau te tillen.</strong>
        </p>
    </article>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15764020.106597275!2d30.407914434293845!3d8.932822765324546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1635d0dc41add52b%3A0xf6f6a67f5348c55a!2sEthiopi%C3%AB!5e0!3m2!1snl!2snl!4v1715160000000!5m2!1snl!2snl">
    </iframe>
</section>
</section>


<section id="wat-kan-ik">
    <section id="wat-kan-ik-codes">
    <article>
    <h2>Javascript</h2>
    <h2>PHP</h2>
    <h2>SQL-database</h2>
    <h2>HTML/CSS</h2>
    </article>
    </section>

<articel>
    <h1>Invul formulier<h1>
</articel>





<?php

$host = 'localhost';
$db   = 'feedback_db'; 
$user = 'root';              
$pass = '';                  

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        
        $voornaam     = $_POST['Voornaam'];
        $achternaam   = $_POST['Achternaam']; 
        $bedrijf      = $_POST['Bedrijfsnaam']; 
        $rating       = $_POST['rating'] ?? 0;
        $feedback     = $_POST['feedback'];

        
        $sql = "INSERT INTO feedback_tabel (voornaam, achternaam, bedrijfsnaam, rating, feedback_tekst) 
                VALUES (:v, :a, :b, :r, :f)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            'v' => $voornaam,
            'a' => $achternaam,
            'b' => $bedrijf,
            'r' => $rating,
            'f' => $feedback
        ]);

        echo "Dit word gestuurd naar de database, $voornaam van $bedrijf!";
    }
} catch (PDOException $e) {
    die("Fout bij verbinden: " . $e->getMessage());
}
?>


<form action="" method="post">

<section class="Voornaam">
    <input type="text" name="Voornaam" placeholder="voornaam" required>
</section>


<section class="Achternaam">
    <input type="text" name="Achternaam" placeholder="achternaam" required>
</section>


<section class="Bedrijfsnaam">
    <input type="text" name="Bedrijfsnaam" placeholder="bedrijfsnaam" required>
</section>

<section class="Stars">
    <input type="radio" id="star5" name="rating" value="5">
        <label for="star5" title="5 sterren">★</label>
        
        <input type="radio" id="star4" name="rating" value="4">
        <label for="star4" title="4 sterren">★</label>
        
        <input type="radio" id="star3" name="rating" value="3">
        <label for="star3" title="3 sterren">★</label>
        
        <input type="radio" id="star2" name="rating" value="2">
        <label for="star2" title="2 sterren">★</label>
        
        <input type="radio" id="star1" name="rating" value="1">
        <label for="star1" title="1 ster">★</label>
</section>


<section class="Feedback">
    <input type="text" name="feedback"placeholder="feedback" required>
</section>

<section>
    <button type="submit" class="submit-btn">Verstuur Gegevens</button>
</section>

</form>
</section>

</main>
<?php
include "includes/footer.php";
?>
</body>
</html>