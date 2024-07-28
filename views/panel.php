<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
</head>
<body>
    <H1>Bienvenido a panel php</H1>
    <?php if (isset($_GET['success'])): ?>
        <p><?php echo htmlspecialchars($_GET['success']); ?></p>
    <?php endif; ?>
</body>
</html>