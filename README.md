# Student Management Project

Laravelで制作した学生管理システムです。

学生、講師、コース、バッチ、受講情報、支払い情報を管理することができます。

## 概要

学生管理を中心としたWebアプリケーションです。

学生・講師・コースなどの各種情報を登録・表示・編集・削除できるCRUD機能を実装しています。

また、コースとバッチ、学生と受講情報、受講情報と支払い情報など、テーブル間のリレーションを利用してデータを管理しています。

支払い情報については、支払明細書をPDFで表示する機能も実装しています。

## 主な機能

### 学生管理

* 学生情報の登録
* 学生情報の一覧表示
* 学生情報の詳細表示
* 学生情報の編集
* 学生情報の削除

### 講師管理

* 講師情報の登録
* 講師情報の一覧表示
* 講師情報の詳細表示
* 講師情報の編集
* 講師情報の削除

### コース管理

* コース情報の登録
* コース情報の一覧表示
* コース情報の詳細表示
* コース情報の編集
* コース情報の削除

### バッチ管理

* バッチ情報の登録
* バッチ情報の一覧表示
* バッチ情報の詳細表示
* バッチ情報の編集
* バッチ情報の削除
* コースとの関連付け

### 受講管理

* 受講情報の登録
* 受講情報の一覧表示
* 受講情報の詳細表示
* 受講情報の編集
* 受講情報の削除
* 学生・バッチとの関連付け

### 支払い管理

* 支払い情報の登録
* 支払い情報の一覧表示
* 支払い情報の詳細表示
* 支払い情報の編集
* 支払い情報の削除
* 受講情報との関連付け
* 支払明細書のPDF表示

## データベース構成

以下のテーブルを使用しています。

* `students`：学生情報
* `teachers`：講師情報
* `courses`：コース情報
* `batches`：バッチ情報
* `enrollments`：受講情報
* `payments`：支払い情報
* `users`：ユーザー情報

主なリレーションは以下の通りです。

```text
Course
  │
  └── Batch
        │
        └── Enrollment ── Student
              │
              └── Payment
```

## 使用技術

* PHP
* Laravel
* MySQL
* Blade
* Bootstrap
* HTML / CSS
* barryvdh/laravel-dompdf

## 主な実装内容

* LaravelによるCRUD処理
* Eloquent ORMによるテーブル間のリレーション
* Form RequestではなくController内でのバリデーション
* LaravelのRoute Model Binding
* Seederによる初期ユーザーの作成
* DomPDFを利用したPDF出力
* 外部キーによるデータの関連付け

## 開発環境

* Windows
* XAMPP
* Visual Studio Code

## セットアップ

### 1. リポジトリを取得

```bash
git clone [リポジトリURL]
cd [プロジェクト名]
```

### 2. Composerパッケージをインストール

```bash
composer install
```

### 3. `.env`を作成

```bash
cp .env.example .env
```

`.env`のデータベース設定を環境に合わせて変更してください。

### 4. アプリケーションキーを生成

```bash
php artisan key:generate
```

### 5. マイグレーションとSeederを実行

```bash
php artisan migrate --seed
```

Seederを実行すると、テスト用ユーザーが1件作成されます。

### 6. Laravelの開発サーバーを起動

```bash
php artisan serve
```

表示されたURLにアクセスしてください。

## PDF機能

支払明細書のPDF表示には `barryvdh/laravel-dompdf` を使用しています。

パッケージは `composer install` によってインストールされます。

初めてパッケージを導入する場合は、以下のコマンドを使用します。

```bash
composer require barryvdh/laravel-dompdf
```
