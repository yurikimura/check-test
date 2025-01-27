# お問い合わせフォーム

## 環境構築

Docker ビルド

1. `git clone https://github.com/yurikimura/check-test`
2. `docker-compose up -d --build`

※ MySQL は、OS によって起動しない場合があるのでそれぞれの PC に合わせて docker-compose.yaml ファイルを編集してください。

Laravel 環境構築

1. `docker-compose exec php bash`
2. `composer install`
3. env.example ファイルから.env を作成し、環境変数を変更
4. `php artisan key.generate`
5. `php artisan migrate`
6. `php artisan db:seed`

## 使用技術(実行環境)

- PHP 7.4.9
- Laravel 8.83.8
- MySQL 10.3.39

## ER 図

<img width="651" alt="Image" src="https://github.com/user-attachments/assets/0bf094ea-e982-4b8d-bfd7-b58fe19ab36d" />

## URL

- 開発環境
  - ホーム画面 http://localhost/
  - オーナー向け画面 http://localhost/admin
- phpMyAdmin : http://localhost:8080/
