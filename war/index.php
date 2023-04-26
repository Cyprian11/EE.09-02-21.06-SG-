<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" type="text/css" href="styl2.css">
</head>
<body>
    <div class="banerlewy">
        <h1>Internetowy sklep z eko-warzywami</h1>
    </div>


    <div class="banerprawy">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <a href="https://terapiasokami.pl/" target="_blank"><li>soki</li></a>
        </ol>
    </div>

    <div class="blok">
        
        <?php
            $con=new mysqli("127.0.0.1","root","","dane2");
            $sql=mysqli_query($con,"SELECT nazwa, ilosc, opis, cena, zdjecie FROM produkty WHERE Produkty.Rodzaje_id=1||Produkty.Rodzaje_id=2");
            while($i=mysqli_fetch_array($sql)){
                echo
                "
                <div class='produkt'>
                
                <img src='$i[4]' width='300px' height='200px' alt='warzywniak'>
                <h5>$i[0]</h5>
                <p>Opis: $i[2]</p>
                <p>Na stanie: $i[1]</p>
                <h2>$i[3]zł</h2>
                </div>
                ";
            }
            
        ?>
    </div>


    <footer>
        <form action="" method="post">
           
            <label>Nazwa: <input type="text" name="nazwa" id="nazwa"></label>
            <label>Cena: <input type="number" name ="cena" id="cena"></label>
            
            <input type="submit" value="Dodaj produkt">
        </form>
        Stronę wykonał:000000000000
        <?php
        if(isset($_POST['nazwa']) && isset($_POST['cena'])){
            $nazwa=$_POST['nazwa'];
            $cena=$_POST['cena'];
            mysqli_query($con,"INSERT INTO produkty(Rodzaje_id,producenci_id,nazwa,ilosc,opis,cena,zdjecie) VALUES (1,4,'$nazwa',10,'',$cena,'owoce.jpg')");
            mysqli_close($con);

        }
        ?>
    </footer>
</body>
</html>