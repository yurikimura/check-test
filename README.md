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

< - - - 作成した ER 図の画像 - - - >

## URL

- 開発環境：http://localhost/
- phpMyAdmin : http://localhost:8080/
