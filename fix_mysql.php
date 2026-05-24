<?php
try {
    $pdo = new PDO(
        'mysql:host=127.0.0.1;port=3307',
        'mysql',
        'Luis.1204$',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $pdo->exec("GRANT ALL PRIVILEGES ON davirapid.* TO 'mysql'@'%' IDENTIFIED BY 'Luis.1204$'");
    $pdo->exec("FLUSH PRIVILEGES");
    echo "OK - Permisos concedidos a 'mysql'@'%'\n";
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
