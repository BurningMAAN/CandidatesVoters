<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" href="css/style6.css">
    <title>Rinkimu svetaine</title>
</head>
<body>
    <div class="wrapper">
    <div class="bgTest">
    </div>
        <div class="main">
            <img src="img/main.svg" alt="main">
            <div class="languageSelect">
                <ul>
                    <li>LT</li>
                    <li>EN</li>
                    <li>RU</li>
                </ul>
            </div>
            <div class="logoText">
                <h1>LOGO</h1>
            </div>
                <div class="portrait">
                    <img src="img/zemelapis.svg" alt="map">
                    <div class="shadow">
                        <img src="img/shadow.svg" alt="shadow">
                        <div class="logo">
                            <img src="img/logo.svg" alt="logo">
                        </div>
                    </div>
                </div>
                <div id="meniu">
                    <img src="img/meniu.svg" alt="meniu">

                    <div id="list_choices">
                        <ul>
                            <li><a href="apie.php">APIE MUS</a></li>
                            <li><a href="kandidatai.php">KANDIDATAI</a></li>
                            <li><a href="laimetojai.php">LAIMETOJAI</a></li>
                        </ul>
                    </div>
                </div>
                <hr class="spacer" id="upper">
        <div class="textarea">
            <h1>TIE, KURIE ATSPEJO</h1>
            <ul>
                <?php
                header("Content-Type: text/html;charset=UTF-8");
                require('main.php');
                $laimetojai = GetWinningVoters($balsai, $kandidatai);
                for($i = 0; $i < sizeof($balsuotojai); $i++){
                    for($j = 0; $j < sizeof($laimetojai); $j++){
                        if($balsuotojai[$i]->ID == $laimetojai[$j]){
                            echo "<li>" . $balsuotojai[$i]->FirstName . ' ' . $balsuotojai[$i]->LastName ."</li>";
                        }
                    }
                }
                ?>
            </ul>
        </div>
        <div class="copyright">
        <p>All rights reserved</p>
        </div>
        <div class="companyName">
        <p>Random text here</p>
        </div>
        <hr class="spacer" id="lower">
    </div>
            
</body>
</html>