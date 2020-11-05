# beginner-lesson1

## Usage

### Composerのインストール

```bash
$ composer install
```

### npmのインストール

```bash
$ npm install
```

### データベースとユーザの作成

```bash
$ mysql -u root -p****
create database lesson;
grant all privileges on lesson.* to lesson@localhost identified by 'secret';
exit
```

### テーブルの作成

```bash
$ php artisan migrate --seed
```

### API認証

```bash
$ php artisan passport:install
```

### ビルド

```bash
$ php artisan serve
Laravel development server started: <http://127.0.0.1:8000>
```

ブラウザにて http://127.0.0.1:8000 へアクセス
