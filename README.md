<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Cài đặt

1. Cài Laragon
2. Mở Laragon, chọn Start All, xong chọn Terminal
3. Chạy lệnh: git clone https://github.com/ta457/l2c-laravel.git
4. Chạy lệnh: cd l2c*
5. Chạy lệnh: composer install
6. Chạy lệnh: cp .env.example .env
7. Chạy lệnh: php artisan key:generate
8. Chạy lệnh: php artisan migrate (nếu nó hỏi có tạo DB không thì gõ yes)
9. Chạy lệnh: php artisan db:seed
10. Chạy lệnh: npm install
11. Chạy lệnh: php artisan serve
12. Mở một cửa sổ Terminal khác (click dấu + màu xanh ở góc trái Terminal), chạy lệnh: npm run dev
13. Vào localhost:8000
14. Tài khoản: admin@gmail.com / user@gmail.com (password: 11111111)

## Cách fix không hiện ảnh (avatar,...)

1. Mở Terminal mới, chạy: cd l2c*
2. Chạy: code .
3. Mở config/filesystems.php, sửa dòng 'default' =>...'local' thành 'default' => ... 'public'
4. Tìm file .env, sửa dòng FILESYSTEM_DISK=local thành FILESYSTEM_DISK=public
5. Chạy lệnh: php artisan storage:link
6. Chạy lệnh: php artisan config:clear