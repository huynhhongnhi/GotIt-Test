<?php

/**
* API response error
*
* @param type $errorCode
* @param type $message
* @return response
*/
function responseError($code = 500, $message = null, $isRsJson = true)
{
    // $result = [
    //     'code' => $code,
    //     'message' => $message ?? MESSAGES['errorSystem']
    // ];
    // return $isRsJson ? response()->json($result, intval(substr($code, 0, 3))) : $result;
    $result = [
        'error' => [
            'code' => $code,
            'message' => $message ?? HttpResponseCode::getMessageForCode($code)
        ]
    ];
    return $isRsJson ? response()->json($result, intval(substr($code, 0, 3))) : $result;
}

/**
* API response success
*
* @param type $message
* @return response
*/
function responseSuccess($data = null, $message = null, $code = 200)
{
    $result = [
    'code' => $code,
    'message' => $message ?? MESSAGES['success'],
    ];

    if (!is_null($data)) {
        $result['data'] = $data;
    }
    return response()->json($result, $code);
}