<?php
$judulHalaman = "Konsultasi";
$pesanSukses = false;
$error = "";
$nama = $email = $telepon = $pesan = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $telepon = trim($_POST["telepon"] ?? "");
    $pesan = trim($_POST["pesan"] ?? "");
    if ($nama && filter_var($email, FILTER_VALIDATE_EMAIL) && $telepon && $pesan) {
        $pesanSukses = true;
    } else {
        $error = "Mohon periksa kembali data yang diisi.";
    }
}
include "header.php";
?>
<section class="page-banner"><div class="container"><span class="eyebrow">KONSULTASI</span><h1>Ajukan pertanyaan</h1><p>Isi formulir berikut jika ingin meminta informasi seputar Hepatitis B.</p></div></section>
<section class="container form-section">
<div class="form-intro"><h2>Kami siap membantu memberikan informasi</h2><p>Formulir ini merupakan contoh fitur permintaan informasi untuk tugas website. Data tidak dikirim ke dokter dan tidak disimpan ke database.</p><div class="form-tip">Untuk keluhan kesehatan, silakan langsung menghubungi fasilitas kesehatan.</div></div>
<div class="form-card">
<?php if ($pesanSukses): ?>
    <div class="success-message">
        <div class="email-notice"><strong>Permintaan konsultasi berhasil dikirim!</strong><br>Informasi atau jawaban selanjutnya akan disampaikan melalui email yang Anda cantumkan.</div>
        <h2>Terima kasih, <?php echo htmlspecialchars($nama); ?>!</h2>
        <p>Data formulir berhasil diterima oleh halaman website ini. Untuk versi tugas ini, pengiriman email otomatis belum diaktifkan sehingga pengelola perlu mengirimkan balasan secara manual.</p>
        <a class="btn" href="konsultasi.php">Isi formulir lagi</a>
    </div>
<?php else: ?>
    <?php if ($error): ?><div class="alert"><?php echo $error; ?></div><?php endif; ?>
    <form id="consultForm" method="POST" action="konsultasi.php" novalidate>
        <label for="nama">Nama lengkap</label><input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" value="<?php echo htmlspecialchars($nama); ?>" required>
        <label for="email">Email</label><input type="email" id="email" name="email" placeholder="nama@email.com" value="<?php echo htmlspecialchars($email); ?>" required>
        <label for="telepon">Nomor telepon</label><input type="tel" id="telepon" name="telepon" placeholder="08xxxxxxxxxx" value="<?php echo htmlspecialchars($telepon); ?>" required>
        <label for="pesan">Pesan atau pertanyaan</label><textarea id="pesan" name="pesan" rows="5" placeholder="Tuliskan pertanyaan Anda..." required><?php echo htmlspecialchars($pesan); ?></textarea>
        <p class="form-error" id="formError"></p>
        <button class="btn submit-btn" type="submit">Kirim pertanyaan</button>
    </form>
<?php endif; ?>
</div>
</section>
<?php include "footer.php"; ?>
