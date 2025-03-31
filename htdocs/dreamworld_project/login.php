<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; // ไม่ต้องเข้ารหัสก่อนส่งไป

    // ตรวจสอบข้อมูลในฐานข้อมูล
    $sql = "SELECT * FROM user_account WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        echo $user["username"];

        // ตรวจสอบรหัสผ่านโดยใช้ password_verify
        if (password_verify($password, $user["PASSWORD"]) && $username == $user["username"]) {
            $_SESSION['username'] = $user['username'];
            header("Location: index.php"); // ไปหน้าแรกหลังเข้าสู่ระบบสำเร็จ
            exit();
        } else {
            $error = "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
        }
    } else {
        $error = "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - Dreamworld Thailand</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/dreamworld_logo.png" alt="Dreamworld Thailand">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">หน้าแรก</a></li>
                <li><a href="register.php">สมัครสมาชิก</a></li>
                <li><a href="login.php">เข้าสู่ระบบ</a></li>
            </ul>
        </nav>
    </header>

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

    <footer>
        <p>&copy; 2025 Dreamworld Thailand. All rights reserved.</p>
    </footer>
</body>
</html>
<?php
// ตัวอย่างการซ่อนข้อความ "Connected successfully"
if (isset($connected) && $connected === true) {
    // ปิดการแสดงผลข้อความ
}
?>