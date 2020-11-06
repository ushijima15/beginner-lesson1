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

![image](https://user-images.githubusercontent.com/52206492/98334880-3b9f6200-2047-11eb-9e03-c4e6dd34bd23.png)

ブラウザにて http://127.0.0.1:8000 へアクセス
