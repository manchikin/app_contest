<?php
    $config = []; // 設定しないとエラーとなるため削除しないこと（バグ？）

    // 用語
    define("CONST_USER_ID"        , 'ユーザID');
    define("CONST_LOGIN_ID"       , 'ログインID');
    define("CONST_USER_NAME"      , 'ユーザ');
    define("CONST_PASSWORD"       , 'パスワード');
    define("CONST_DEPARTMENT_NAME", '部署');
    define("CONST_ROLE"           , '権限');
    define("CONST_ROLE_ADMIN"     , '管理者');
    define("CONST_ROLE_COMMON"    , '一般');
    define("CONST_BOOK_NAME"      , '書籍');


    // バリデーションメッセージ

    // 全般
    define("MESSAGE_VALIDATION_ALL_001", '入力値が空です');
    define("MESSAGE_VALIDATION_ALL_002", '最低%s文字必要です');
    define("MESSAGE_VALIDATION_ALL_003", '最高%s文字です');
    define("MESSAGE_VALIDATION_ALL_004", 'すでに使用している#01です');

    // パスワード
    define("MESSAGE_VALIDATION_PWD_001", '前の入力値と異なります');

    // 検索メッセージ
    define("MESSAGE_SEARCH_ALL_001",     '該当する%sが見つかりません');

    // 完了メッセージ
    define("MESSAGE_FINISH_ALL_001",     '%sの%sが完了しました');

    // エラーメッセージ
    define("MESSAGE_ERROR_ALL_001",     '存在しない%sです');
    define("MESSAGE_ERROR_ALL_002",     'このページの閲覧権限がありません');

    // ログイン失敗時
    define("MESSAGE_ERROR_LOGIN_001", 'ログインIDもしくはパスワードが間違っています');


    // ページ名
    define("TITLE_DASHBOARD"    , "Dashboard");
    define("TITLE_BOOK_MANAGE"  , "書籍管理");
    define("TITLE_BOOK_SEARCH"  , "書籍検索");
    define("TITLE_MEMBER_SEARCH", "会員検索");
    define("TITLE_MEMBER_ADD"   , "会員登録");
    define("TITLE_MEMBER_EDIT"  , "会員情報変更");
    define("TITLE_LOGOUT"       , "ログアウト");
    // フッター
    define("MESSAGE_FOOTER", 'prototype for the application contest@2017');
