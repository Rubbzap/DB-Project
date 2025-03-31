<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - Dreamworld Thailand</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="images/dreamworld_logo.png" alt="Dreamworld Thailand">
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <section class="form-section">
            <h2>เข้าสู่ระบบ</h2>
            <form action="login.php" method="POST">
                <label for="username">ชื่อผู้ใช้งาน:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">รหัสผ่าน:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">เข้าสู่ระบบ</button>
            </form>

            <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Dreamworld Thailand. All rights reserved.</p>
    </footer>
</body>
</html>
