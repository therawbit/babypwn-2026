<?php
// Database connection setup
$db_file = 'db/af8b5cbe045dd970c81e77acd7ad0d40.db';

try {
    $db = new PDO("sqlite:$db_file");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$pirate_name = "%" . $search_query . "%"; // Use for LIKE search

$sql = "SELECT id, pirate, flag FROM jolly_rogers WHERE pirate LIKE '$pirate_name' AND restricted = 0";

$results = [];
try {
    $stmt = $db->query($sql); 
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $error_message = "A mysterious sea current blocked your search: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>One Piece: Journey or Treasure.</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>The Pirates of the Universe</h1>
        <p>Explore the known Jolly Rogers. The Unknown are Hidden from general public. Only known to the people of Mary Geoise</p>
    </header>

    <main>
        <div class="search-container">
            <form method="GET" action="index.php">
                <input type="text" name="search" placeholder="Search for a Pirate Crew..." value="<?= htmlspecialchars($search_query) ?>">
                <button type="submit">Search</button>
            </form>
        </div>

        <?php if (isset($error_message)): ?>
            <p class="error"><?= $error_message ?></p>
        <?php endif; ?>

        <h2>Jolly Rogers Found:</h2>

        <div class="pirate-grid">
            <?php foreach ($results as $pirate): ?>
                <div class="pirate-card">
                    <img src="images/<?= htmlspecialchars($pirate['flag']) ?>" alt="<?= htmlspecialchars($pirate['pirate']) ?> Flag">
                    <h3><?= htmlspecialchars($pirate['pirate']) ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
            

    </main>
    <footer style="text-align:center;">
    Challenge by <a style="color: white;" href="https://sudarshandevkota.com.np" target="_blank">therawbit</a>
</footer>
</body>
</html>
