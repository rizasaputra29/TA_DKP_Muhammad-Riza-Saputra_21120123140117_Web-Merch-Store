<?php
    session_start();
    
    function isLoggedIn() {
        return isset($_SESSION['username']);
    }

    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dewa 19 Page</title>
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>

<body>
    <header id="header">
        <nav id="nav-bar">
            <div class="nav-bar-content">
                <div class="img-container">
                    <img id="header-img" src="assets/img/logo dewa.png" alt="Logo Dewa19">
                </div>
                <ul>
                    <li><a class="nav-link" href="#Introduction">Introduction</a></li>
                    <li><a class="nav-link" href="#Hits_Albums">Hits Albums</a></li>
                    <li><a class="nav-link" href="#Shirts">Shirts</a></li>
                    <li><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <section id="Introduction">
            <h2>Introduction</h2>
            <p>
                Dewa 19, atau hanya disebut Dewa, adalah sebuah grup musik rock Indonesia yang dibentuk pada tahun 1986
                di Surabaya, Indonesia. Grup ini telah beberapa kali mengalami pergantian personel dan formasinya saat
                ini adalah Ahmad Dhani (kibor), Andra Junaidi (gitar), Yuke Sampurna (bas), dan Agung Yudha (drum).
                Setelah merajai panggung-panggung festival di akhir era 1980-an, Dewa 19 kemudian hijrah ke Jakarta dan
                merilis rekaman pertamanya pada tahun 1992. Grup ini meraih kesuksesan sepanjang dekade 1990-an dengan
                vokalis Ari Lasso dan dekade 2000-an dengan vokalis Once Mekel.
            </p>
            <p>
                Setelah keluarnya Once pada tahun 2011, Dewa terus berjalan sebagai "band tanpa vokalis". Sepuluh tahun
                kemudian, Virzha dan Ello resmi direkrut untuk mengisi vokal utama dengan konsep featuring (kolaborasi).
                Mulai tahun 2021, Dewa 19 telah merekam ulang banyak lagu-lagu lama mereka dengan dua vokalis tersebut.
                Sejak tahun 2012, grup ini juga mulai melakukan konser-konser reuni dengan menampilkan para mantan
                personel terdahulu. Memasuki dekade 2020-an, Dewa 19 berhasil menggelar beberapa tur stadion di
                Indonesia dan Malaysia. Mereka berhasil memecahkan rekor konser tunggal dengan jumlah penonton tertinggi
                di Indonesia, yakni sebanyak 75.000 orang di Stadion Internasional Jakarta (JIS), yang kemudian
                dilampaui oleh 85.000 orang di Stadion Utama Gelora Bung Karno (GBK).
            </p>
            <blockquote id="quote">
                <p><em>“Aku bisa membuatmu jatuh cinta kepadaku, meski kau tak cinta kepadaku.”</em></p>
                <cite>- Dewa19</cite>
            </blockquote>
        </section>

        <section id="Hits_Albums">
            <h2>Hits Albums</h2>
            <div class="hits-albums-container">
                <?php
        class Album {
            public $name;
            public $src;
            public $price;

            public function __construct($name, $src, $price) {
                $this->name = $name;
                $this->src = $src;
                $this->price = $price;
            }
        }

        class Queue {
            private $items = [];

            public function enqueue($item) {
                $this->items[] = $item;
            }

            public function dequeue() {
                return array_shift($this->items);
            }

            public function isEmpty() {
                return empty($this->items);
            }
        }

        $albumQueue = new Queue();
        $albumQueue->enqueue(new Album("Terbaik Terbaik", "assets/img/terbaik.jpeg", "Rp. 150.000"));
        $albumQueue->enqueue(new Album("Bintang Lima", "assets/img/bintang lima.png", "Rp. 150.000"));
        $albumQueue->enqueue(new Album("Laskar Cinta", "assets/img/laskar cinta.png", "Rp. 150.000"));
        $albumQueue->enqueue(new Album("Format Masa Depan", "assets/img/format masa.png", "Rp. 150.000"));

        while (!$albumQueue->isEmpty()) {
            $album = $albumQueue->dequeue();
            echo "<div class='product'>";
            echo "<div class='album-name'>";
            echo "<h2>{$album->name}</h2>";
            echo "</div>";
            echo "<img src='{$album->src}''>";
            echo "<h2>{$album->price}</h2>";
            echo "<form method='post' action='checkout.php'>";
            echo "<input type='hidden' name='product_type' value='album'>";
            echo "<input type='hidden' name='product_name' value='{$album->name}'>";
            echo "<button type='submit' class='btn'>Buy Now</button>";
            echo "</form>";
            echo "</div>";
        }
            ?>
        </section>

        <section id="Shirts">
            <h2>Shirts</h2>
            <div class="shirts-container">
                <?php
        class Shirt {
            public $name;
            public $src;
            public $price;
        
            public function __construct($name, $src, $price) {
                $this->name = $name;
                $this->src = $src;
                $this->price = $price;
            }
        }
        
        class Load {
            private $items = [];
        
            public function enqueue($item) {
                $this->items[] = $item;
            }
        
            public function dequeue() {
                return array_shift($this->items);
            }
        
            public function isEmpty() {
                return empty($this->items);
            }
        }
        
        $shirtQueue = new Load();
        $shirtQueue->enqueue(new Shirt("Terbaik Terbaik", "assets/img/baju terbaik.png", "Rp. 200.000"));
        $shirtQueue->enqueue(new Shirt("Bintang Lima", "assets/img/baju bintang lima.png", "Rp. 200.000"));
        $shirtQueue->enqueue(new Shirt("Laskar Cinta", "assets/img/baju laskar cinta.png", "Rp. 200.000"));
        $shirtQueue->enqueue(new Shirt("Format Masa Depan", "assets/img/baju format.png", "Rp. 200.000"));
        
        while (!$shirtQueue->isEmpty()) {
            $shirt = $shirtQueue->dequeue();
            echo "<div class='product'>";
            echo "<div class='shirt-name'>";
            echo "<h2>{$shirt->name}</h2>";
            echo "</div>";
            echo "<img src='{$shirt->src}' alt='{$shirt->name}'>";
            echo "<div class='product-details'>";
            echo "<h2>{$shirt->price}</h2>";
            echo "<form method='post' action='checkout.php'>";
            echo "<input type='hidden' name='product_type' value='shirt'>";
            echo "<input type='hidden' name='product_name' value='{$shirt->name}'>";
            echo "<button type='submit' class='btn'>Buy Now</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }        
        ?>
            </div>
        </section>
    </div>
</body>

</html>