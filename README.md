# 📚 TiengAnh - Nền Tảng Học & Luyện Thi Tiếng Anh Trực Tuyến

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-6.x-646CFF?style=for-the-badge&logo=vite&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green.style=for-the-badge)

**TiengAnh** là ứng dụng web toàn diện hỗ trợ học tập, ôn luyện và kiểm tra trình độ Tiếng Anh được xây dựng trên nền tảng **Laravel 12** kết hợp **Vite** và giao diện hiện đại. Hệ thống tích hợp đầy đủ các kỹ năng học thuật (Nghe, Nói, Đọc, Viết, Từ vựng, Ngữ pháp) cùng hệ thống quản trị khóa học dành cho Admin.

---

## 🚀 Tính Năng Nổi Bật

### 👨‍🎓 Dành cho Học viên (User)
* **Tổng quan học tập (Dashboard):** Theo dõi tiến độ, số điểm kinh nghiệm (XP), cấp độ hiện tại.
* **Rèn luyện 4 Kỹ năng:**
  * **Listening (Luyện nghe):** Bài tập nghe theo chủ đề với file âm thanh trực quan.
  * **Speaking (Luyện nói):** Thực hành phát âm và hội thoại.
  * **Reading (Luyện đọc):** Bài đọc hiểu ngắn và chuyên sâu.
  * **Writing (Luyện viết):** Bài tập viết câu, đoạn văn và luận.
* **Củng cố kiến thức:**
  * **Vocabulary (Từ vựng):** Tra cứu và học từ vựng theo cấp độ/chủ đề.
  * **Grammar (Ngữ pháp):** Hệ thống lý thuyết và bài tập ngữ pháp từ cơ bản đến nâng cao.
  * **Flashcards:** Thẻ ghi nhớ thông minh giúp ghi nhớ từ mới hiệu quả.
  * **Exercises & Exams:** Kho bài tập tự luyện và các đề thi thử thời gian thực.
* **Động lực & Tương tác:**
  * **Leaderboard (Bảng xếp hạng):** Tuyên dương top học viên có thành tích xuất sắc.
  * **Learning Progress:** Thống kê chi tiết quá trình hoàn thành bài học.
  * **Trang cá nhân & Cài đặt:** Quản lý thông tin tài khoản, mật khẩu, cấu hình giao diện.

### 🛡️ Dành cho Quản trị viên (Admin)
* **Admin Dashboard:** Thống kê tổng quan số lượng khóa học, bài học và người dùng.
* **Quản lý Khóa học & Bài học (Course & Lesson Management):**
  * Thêm, sửa, xóa các khóa học theo cấp độ (A1 - C2).
  * Quản lý danh sách bài học thuộc từng khóa học.
* **Quản lý Người dùng (User Management):**
  * Xem danh sách học viên và thông tin chi tiết.
  * Phân quyền tài khoản (User / Admin).
  * Xóa tài khoản hoặc quản lý trạng thái.

---

## 🛠️ Công Nghệ Sử Dụng

* **Backend:** PHP 8.2+, Laravel 12.x (MVC Framework)
* **Database:** MySQL / MariaDB (Hỗ trợ SQLite cho môi trường test)
* **Frontend:** Blade Templates, Vite, Tailwind CSS / Custom CSS, JavaScript (ES6+)
* **Authentication:** Laravel Session Guard & Role-based Access Control (RBAC)

---

## 📋 Yêu Cầu Hệ Thống

Trước khi cài đặt, hãy đảm bảo máy tính của bạn đã cài sẵn:
* **PHP:** `>= 8.2` (cần bật các extension `pdo_mysql`, `mbstring`, `openssl`, `curl`)
* **Composer:** `>= 2.x`
* **Node.js:** `>= 18.x` & **npm**
* **MySQL Server:** `>= 8.0` hoặc MariaDB (XAMPP / Laragon / MySQL Service)

---

## 📦 Hướng Dẫn Cài Đặt & Khởi Chạy

### Cách 1: Khởi chạy nhanh bằng script (Khuyên dùng trên Windows)

Dự án có sẵn script khởi động tự động kiểm tra MySQL, chạy Laravel Server và mở trình duyệt:

1. Chạy file **`start-server.bat`** (Nhấp đúp chuột hoặc click chuột phải chọn *Run as administrator*).
2. Hệ thống sẽ tự động bật MySQL service, khởi chạy Laravel development server và mở trình duyệt tại địa chỉ `http://localhost:8000`.

---

### Cách 2: Cài đặt thủ công (Manual Setup)

#### 1. Clone repository & Truy cập thư mục dự án
```bash
git clone <repository-url>
cd TiengAnh
```

#### 2. Cài đặt các thư viện phụ thuộc (Dependencies)
```bash
# Cài đặt PHP packages
composer install

# Cài đặt Node modules
npm install
```

#### 3. Cấu hình file môi trường (`.env`)
Sao chép file `.env.example` thành `.env`:
```bash
cp .env.example .env
```
Cập nhật thông tin kết nối Cơ sở dữ liệu trong `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tienganh
DB_USERNAME=root
DB_PASSWORD=
```

#### 4. Khởi tạo Application Key & Database
```bash
# Tạo APP_KEY
php artisan key:generate

# Chạy Migration và nạp dữ liệu mẫu (Seeder)
php artisan migrate --seed
```

#### 5. Khởi chạy Server
Mở 2 cửa sổ terminal:

* **Terminal 1 (Backend):**
  ```bash
  php artisan serve
  ```
* **Terminal 2 (Frontend Assets - Vite):**
  ```bash
  npm run dev
  ```

Mở trình duyệt và truy cập: **`http://127.0.0.1:8000`**

---

## 🔑 Tài Khoản Quản Trị Mặc Định

Sau khi chạy lệnh `php artisan db:seed` (hoặc `php artisan migrate --seed`), hệ thống sẽ khởi tạo sẵn tài khoản Admin:

* **Email:** `admin@tienganh.vn`
* **Mật khẩu:** `Admin@123`
* **Quyền hạn:** Quản trị viên (Admin)

> ⚠️ *Lưu ý: Bạn nên đổi mật khẩu tài khoản admin ngay sau lần đăng nhập đầu tiên để đảm bảo an toàn.*

---

## 📂 Cấu Trúc Thư Mục Dự Án

```
TiengAnh/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/           # Controllers dành cho Admin
│   │   │   └── Auth/            # Controllers xác thực (Login, Register)
│   │   └── Middleware/         # Phân quyền & kiểm tra truy cập
│   └── Models/                  # Eloquent Models (User, Course, Lesson, ...)
├── database/
│   ├── migrations/              # Các cấu trúc bảng CSDL
│   └── seeders/                 # Dữ liệu mẫu (AdminSeeder, DatabaseSeeder)
├── public/                      # Chứa tài nguyên công khai (Images, Audio, CSS, JS)
├── resources/
│   ├── views/                   # Giao diện Blade Templates
│   └── js / css / scss          # File frontend nguồn
├── routes/
│   └── web.php                  # Định tuyến ứng dụng Web
├── start-server.bat             # Batch script khởi động nhanh ứng dụng
├── start-server.ps1             # PowerShell script tự động hóa khởi động
└── vite.config.js               # Cấu hình Vite build tool
```

---

## 📝 Giấy Phép (License)

Dự án được phát triển dưới giấy phép [MIT License](LICENSE).
