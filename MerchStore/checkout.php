<?php
// session_start();

function hitungHargaTotal($productType, $productName) {
    $prices = [
        'album' => 150000,
        'shirt' => 200000
    ];
    return $prices[$productType] ?? 0; // Default to 0 if product type not found
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productType = $_POST["product_type"] ?? null;
    $productName = $_POST["product_name"] ?? null;

    if ($productType && $productName) {
        $total = hitungHargaTotal($productType, $productName);
    } else {
        $error = "Invalid request: missing product information.";
    }
} else {
    $error = "Invalid request method.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="assets/css/checkout.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
</head>
<body>
<div class="container">
    <h2>Checkout</h2>
    <?php
    if (isset($error)) {
        echo "<p>$error</p>";
    } elseif (isset($productType) && isset($productName)) {
        echo "<p>Thank you for purchasing $productName!</p>";
        echo "<p>Total harga: Rp. " . number_format($total, 0, ',', '.') . "</p>";

        if ($productType == 'album') {
            echo "<p>List Lagu</p>";
            switch ($productName) {
                case "Terbaik Terbaik":
                    echo '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/0QtVlnrFMVFDTFg1NYtDOT?utm_source=generator" width="100%" height="152" frameborder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>';
                    break;
                case "Bintang Lima":
                    echo '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/3LRdN6TlxSk6DJqpSWwdFQ?utm_source=generator" width="100%" height="152" frameborder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>';
                    break;
                case "Laskar Cinta":
                    echo '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/3JF2TLCAfnfGe7uahgIeWE?utm_source=generator" width="100%" height="152" frameborder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>';
                    break;
                case "Format Masa Depan":
                    echo '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/4eEU7HKuOnfbovQM9mISBy?utm_source=generator" width="100%" height="152" frameborder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>';
                    break;
            }
        }
    } else {
        echo "<p>Invalid request.</p>";
    }
    ?>
    <p><a href="index.php">Back to Home</a></p>
</div>
</body>
</html>
