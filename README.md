# QRIS Subscription App
Harga: Rp700.000/bulan (30 hari).
Fitur: login pelanggan, admin dashboard, aktivasi/perpanjangan, suspend, WhatsApp, QR generator.
Instalasi:
1. Import database/schema.sql.
2. Buat user MariaDB dan edit config/database.php.
3. Jalankan: php generate_admin_hash.php 'PasswordAdminKuat'
4. INSERT hash hasil ke tabel admins.
5. Set document root web server ke folder public/.
6. Aktifkan HTTPS.
7. Buka /admin/login.php.
Catatan: WhatsApp hanya kanal kontak. Admin mengaktifkan akun setelah pembayaran dikonfirmasi. Versi ini tidak menganggap klik WhatsApp sebagai bukti pembayaran.
