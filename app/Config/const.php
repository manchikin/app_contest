<?php
    $config = []; // 設定しないとエラーとなるため削除しないこと（バグ？）
    
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