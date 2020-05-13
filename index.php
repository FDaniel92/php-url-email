<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Abbvie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1 {
            color: #021849;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-size: 60px;
        }
        img {
            text-align: center;
            margin: 0 auto;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>
<body>
    <?php
        $email = $_GET["email"];
        $approved_status = $_GET["approve"];

        $to = "adatvedelem.hu@abbvie.com";
        $headers = "Content-Type: text/plain; charset=utf-8\r\nFrom: info@jacsomedia.hu";
        $subject =  "AbbVie approval script report";
        $validation_message = $email . " e-mail cím az adatvédelmi tájékoztatót elfogadta.";
        $unvalid_message = $email . " e-mail cím az adatvédelmi tájékoztatót elutasította.";
        $isValidEmail = preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email);

        if (!$isValidEmail) {
            echo "<h1>Hibás email cím!</h1>";
        } else {
            if ($approved_status === "1") {
                echo "<h1>Köszönjük a válaszát!</h1>";
                mail($to, $subject, $validation_message, $headers);
            } else if ($approved_status === "0") {
                echo "<h1>Köszönjük a válaszát!</h1>";
                mail($to, $subject, $unvalid_message, $headers);
            } else {
                echo "<h1>Hibás approved érték!</h1>";
            }
        }
    ?>

    <img src="abbvie.jpg" alt="abbvie logo" />
</body>
</html>