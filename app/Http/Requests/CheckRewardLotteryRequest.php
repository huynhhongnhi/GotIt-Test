<?php

namespace App\Http\Requests;


/**
 * Class CheckRewardLotteryRequest.
 * @author nhihuynh
 * @since 2022/06/25
 * @package namespace App\Http\Requests
 */
class CheckRewardLotteryRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @author nhihuynh
     * @since 2022/06/25
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @author nhihuynh
     * @since 2022/06/25
     * @return array
     */
    public function rules()
    {
        $rules = [
            'code' => 'required|string|min:6',
        ];

        return $rules;
    }
}
