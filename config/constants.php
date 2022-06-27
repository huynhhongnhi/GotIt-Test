<?php

if (!defined('HTTP_CODE_STATUS')) {
    define('HTTP_CODE_STATUS', [
        'errorValidate' => 400,
        'errorSystem' => 500,
        'success' => 200

    ]);
}

if (!defined('MESSAGES')) {
    define('MESSAGES', [
        'success' => 'Thành công',
        'errorSystem' => 'Lỗi hệ thống'
    ]);
}