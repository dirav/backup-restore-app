<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Backup</title>
</head>
<body>
    <h1>Backup</h1>
    <form method="post" action="?action=backup">
        <label for="siteDirectory">Site Directory:</label>
        <input type="text" id="siteDirectory" name="siteDirectory" required><br>

        <label for="dbUser">Database User:</label>
        <input type="text" id="dbUser" name="dbUser" required><br>

        <label for="dbPassword">Database Password:</label>
        <input type="password" id="dbPassword" name="dbPassword" required><br>

        <label for="dbName">Database Name:</label>
        <input type="text" id="dbName" name="dbName" required><br>

        <button type="submit">Backup</button>
    </form>

    <?php if (isset($result)): ?>
        <?php if ($result): ?>
            <p>Backup completed successfully.</p>
        <?php else: ?>
            <p>Backup failed.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>