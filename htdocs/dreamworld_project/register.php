<?php
include('db_connection.php'); // เชื่อมต่อฐานข้อมูล

if (isset($_POST['submit'])) {
    // รับข้อมูลจากฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบว่า username ซ้ำกันในฐานข้อมูลหรือไม่
    $sql_check = "SELECT * FROM user_account WHERE user_name = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $username);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        echo "ชื่อผู้ใช้งานนี้ถูกใช้งานแล้ว.";
    } else {
        // เข้ารหัสรหัสผ่านก่อนบันทึก (เพื่อความปลอดภัย)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // สร้างคำสั่ง SQL เพื่อนำข้อมูลไปบันทึกในฐานข้อมูล
        $sql = "INSERT INTO user_account (user_name, user_pass) VALUES (?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            // ผูกตัวแปรกับคำสั่ง SQL
            $stmt->bind_param("ss", $username, $hashed_password);
            
            // ประมวลผลคำสั่ง
            if ($stmt->execute()) {
                echo "สมัครสมาชิกสำเร็จ!";
            } else {
                echo "เกิดข้อผิดพลาดในการสมัครสมาชิก: " . $stmt->error;
            }

            // ปิดการเชื่อมต่อ
            $stmt->close();
        } else {
            echo "ไม่สามารถเตรียมคำสั่ง SQL ได้: " . $conn->error;
        }
    }
    // ปิดการเชื่อมต่อฐานข้อมูล
    $stmt_check->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link rel="stylesheet" href="styles.css"> <!-- ลิงค์ไปที่ไฟล์ CSS -->
</head>
<body>
    <!-- ฟอร์มสมัครสมาชิก -->
    <div class="register-form">
        <h2>สมัครสมาชิก</h2>
        <form method="POST" action="register.php">
            <label for="username">ชื่อผู้ใช้งาน:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">รหัสผ่าน:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="submit">สมัครสมาชิก</button>
        </form>
    </div>
</body>
</html>
