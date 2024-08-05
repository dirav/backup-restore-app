<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restore</title>
</head>
<body>
    <h1>Restore</h1>
    <form method="post" action="?action=restore">
        <label for="siteDirectory">Site Directory:</label>
        <input type="text" id="siteDirectory" name="siteDirectory" required><br>

        <label for="dbUser">Database User:</label>
        <input type="text" id="dbUser" name="dbUser" required><br>

        <label for="dbPassword">Database Password:</label>
        <input type="password" id="dbPassword" name="dbPassword" required><br>

        <label for="dbName">Database Name:</label>
        <input type="text" id="dbName" name="dbName" required><br>

        <label for="backupDate">Backup Date (YYYY-MM-DD):</label>
        <input type="text" id="backupDate" name="backupDate" required><br>

        <button type="submit">Restore</button>
    </form>

    <?php if (isset($result)): ?>
        <?php if ($result): ?>
            <p>Restore completed successfully.</p>
        <?php else: ?>
            <p>Restore failed.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>