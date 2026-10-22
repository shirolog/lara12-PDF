# Student Management Project

Laravelで開発した学生管理システムです。

学生、教師、コース、クラス、受講登録、支払い情報を管理することができます。また、支払い情報から領収書PDFを出力する機能を実装しています。

## 概要

本アプリケーションでは、学生に関する情報を一元管理できます。

主な機能は以下のとおりです。

- 学生情報の登録・一覧表示・詳細表示・編集・削除
- 教師情報の管理
- コース情報の管理
- クラス（Batch）情報の管理
- 学生の受講登録管理
- 支払い情報の管理
- 支払い情報をもとにした領収書PDFの出力

## 使用技術

- PHP 8.4
- Laravel 12
- MySQL / MariaDB
- Blade
- Bootstrap
- HTML / CSS
- Composer
- barryvdh/laravel-dompdf

## データベース構成

主なテーブルは以下のとおりです。

| テーブル名 | 内容 |
|---|---|
| `students` | 学生情報 |
| `teachers` | 教師情報 |
| `courses` | コース情報 |
| `batches` | クラス情報 |
| `enrollments` | 受講登録情報 |
| `payments` | 支払い情報 |
| `users` | ユーザー情報 |

### テーブル間の関係

```text
Course
 └── Batch
       └── Enrollment ── Student
             └── Payment
```

Eloquentのリレーションを利用し、関連するデータを取得・管理しています。

## 実装した機能・技術

### CRUD機能

学生、教師、コース、クラス、受講登録、支払い情報について、各データの登録・表示・編集・削除機能を実装しました。

### Eloquentリレーション

モデル間の関連付けを行い、関連するデータを取得できるようにしています。

### バリデーション

コントローラーで入力値を検証し、不正なデータの登録を防止しています。

### Route Model Binding

ルートパラメータに対応するモデルを自動的に取得する仕組みを利用しています。

### Seeder

Seederを実行すると、動作確認用のサンプルユーザーが1件作成されます。

- 名前：`Test User`
- メールアドレス：`test@example.com`

### 領収書PDF出力

`barryvdh/laravel-dompdf` を使用し、支払い情報をもとに領収書をPDF形式で出力できるようにしています。

### データベースの整合性

外部キー制約を利用し、関連するテーブル間のデータ整合性を保つようにしています。

## 動作環境

- Windows
- PHP
- Composer
- MySQL / MariaDB
- Laravel対応のローカル開発環境

## セットアップ

### 1. リポジトリをクローン

```bash
git clone https://github.com/shirolog/lara12-PDF.git
cd lara12-PDF
```

### 2. Composerパッケージをインストール

```bash
composer install
```

### 3. 環境設定ファイルを作成

`.env.example` をコピーして `.env` を作成します。

```bash
copy .env.example .env
```

### 4. アプリケーションキーを生成

```bash
php artisan key:generate
```

### 5. データベースを設定

`.env` ファイルを開き、使用するデータベースの接続情報を設定してください。

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

`your_database`、`your_username`、`your_password` は、ご自身の環境に合わせて変更してください。

あらかじめ、設定した名前のデータベースを作成しておきます。

### 6. マイグレーションとSeederを実行

```bash
php artisan migrate --seed
```

テーブルが作成され、動作確認用のサンプルユーザーが登録されます。

### 7. 開発サーバーを起動

```bash
php artisan serve
```

ブラウザで以下のURLにアクセスしてください。

```text
http://127.0.0.1:8000
```

## テスト・動作確認

以下のコマンドでテストを実行し、正常に通過することを確認しています。

```bash
php artisan test
```

また、実装した各機能の動作確認を行っています。

## ライセンス

本プロジェクトは、学習およびポートフォリオを目的として作成しています。