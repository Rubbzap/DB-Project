<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองตั๋ว - Dreamworld Thailand</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="images/dreamworld_logo.png" alt="Dreamworld Thailand">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">หน้าแรก</a></li>
                <li><a href="booking.php">จองตั๋ว</a></li>
                <li><a href="events.php">อีเวนต์</a></li>
                <li><a href="login.php">ล็อกอิน</a></li>
            </ul>
        </nav>
    </header>

    <!-- Booking Section -->
    <main>
        <section class="booking-section">
            <h2>เลือกประเภทตั๋ว</h2>
            <form action="payment.php" method="POST">
                <label for="ticket_type">ประเภทตั๋ว:</label>
                <select id="ticket_type" name="ticket_type" required>
                    <option value="Standard">ตั๋วมาตรฐาน</option>
                    <option value="VIP">ตั๋ว VIP</option>
                    <option value="Children">ตั๋วเด็ก</option>
                </select>

                <label for="quantity">จำนวนตั๋ว:</label>
                <input type="number" id="quantity" name="quantity" required min="1" max="10">

                <button type="submit">ไปยังหน้าชำระเงิน</button>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Dreamworld Thailand. All rights reserved.</p>
    </footer>
</body>
</html>
