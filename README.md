# Rese
###### 概要:飲食店予約アプリ。会員登録することで登録店舗の予約ができる。今回、会員が訪れた店舗の評価を投稿できる"口コミ機能"、店舗の並び順を変更できる"店舗一覧ソート機能"、新規の店舗情報をデータベースに追加できる"csvインポート機能"の3機能について開発を行った。
PC版トップページ
<img src="https://github.com/user-attachments/assets/32207f16-769c-413c-9e89-b903c5dcde9c" width="320px">
モバイル版トップページ
<img src="https://github.com/user-attachments/assets/c655a640-6e8d-4db3-908d-2dfbfd06bcca" width="100px">

## アプリケーションURL
###### 開発環境：http://localhost/
###### phpMyAdmin:http://localhost:8080

## 機能一覧
###### 一般ユーザー利用機能
###### 口コミ機能：ログイン状態で店舗詳細画面へ遷移すると、投稿されている評価の閲覧ページへのリンクが表示される。過去に訪れた店舗のページでは口コミ投稿ページへのリンクが表示される。口コミ投稿ページでは星の数（1～5）とコメントで評価をすることができ、jpeg、 png形式の画像ファイルのアップロードも可能。一般ユーザーは1店舗に1つの口コミを投稿でき、口コミ内容を編集することができる。一般ユーザーは自身の投稿した口コミを削除することができる。管理ユーザーは管理画面からすべての口コミの削除が可能。
###### 店舗一覧ソート機能：店舗はランダムな順で表示されるが、評価の高い順または低い順を選択することが出来る。
###### その他基本機能
###### 会員登録：新規ユーザー情報の登録。メールによるアドレス確認を通してユーザー登録を行うことができる。http://localhost:8025にアクセスし認証メールが確認できる。
###### ログイン：登録されたメールアドレスとパスワードによる認証機能。
###### ログアウト：ログアウト機能。
###### ユーザー情報取得：マイページでは自身の予約状況を確認できる。個々のページから予約の削除が可能である。またお気に入り登録された店舗を表示することができる。
###### 一般ユーザーが閲覧可能なページはレスポンシブ対応済。
###### 管理ユーザー利用機能
###### csvインポート機能：csvファイルとjpegまたはpng形式の画像ファイルをアップロードし新規の店舗情報を追加することができる。csvファイルの作成方法は後述。
###### 口コミ削除機能：管理ユーザーはすべての一般ユーザーの口コミ情報を閲覧・削除できる。
###### その他機能
###### 店舗代表者登録：店舗代表者の登録を行うことができる。

## 使用技術
###### Windows 11 WSL2
###### Ubuntu 20.04.6 LTS
###### Docker version 26.1.1
###### Docker Compose version v2.27.0
###### nginx 1.21.1
###### PHP 7.4.9
###### Laravel 8.83.8
###### MySQL 8.0.26
###### MailHog

## テーブル設計
<img src="https://github.com/user-attachments/assets/7bcaa26c-5211-4eb8-ba12-e8c8c10c22bb" width="200px">



## ER図
<img src="https://github.com/user-attachments/assets/839f5506-456d-436f-8402-42af5305e7dc" width="300px">
   
## 環境構築
######  1. git clone git@github.com:TsuneoHakoyama/20241216_Hakoyama_Pro-test.git
######  2. cd Hakoyama_Pro-test
######  3. docker desktopの起動
######  4. docker compose up -d --build 
######  5. docker compose exec php bash
######  6. composer install
######  7. cp .env.develop .env (本番環境の場合.env.productionを利用予定。現時点では環境変数は記載されていない。)
######  8. php artisan key:generate
######  9. php artisan migrate --seed
###### 10. php artisan storage:link
###### 11. chmod -R 777 storage bootstrap/cache
######
###### 一般ユーザーとしての利用
######      localhostにアクセス。左上のメニューから会員登録やログインページに遷移できる
######      user1@example.comはすでにレビューを2件(shop_id = 2 & 4)投稿したユーザーとしてログインできる。
######      user2@example.comは過去に店舗(shop_id = 4)を予約したがレビューは投稿していない。新規に口コミ登録が可能なユーザーとしてログインできる。
######      パスワードは"password"
######      
###### 管理ユーザーとしての利用
######      localhost/admin/loginにアクセスしadmin01@example.comでログイン。パスワードは"administrator"。管理画面から口コミ一覧へ遷移し一般ユーザーの口コミを削除できる。
######      店舗情報追加用のcsvファイルは以下のフォーマットで作成する。すべての項目が入力必須。店舗名は50文字以内。地域は"東京都"、"大阪府"、"福岡県"のいずれか、またジャンルは"寿司"、"焼肉"、"居酒屋"、"イタリアン"、"ラーメン"のいずれかから選択して記載。説明は400文字以内、画像はjpegもしくはpng形式でファイル名を記載。
<img src="https://github.com/user-attachments/assets/1f106a92-ab0b-44df-b9c6-11acfcec4663" width="150px">


