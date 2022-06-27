<?php

namespace App\Repositories;

use App\Models\LotteryCode;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class LotteryCodeRepository.
 *
 * @package namespace App\Repositories;
 */
class LotteryCodeRepository extends BaseRepository implements LotteryCodeRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LotteryCode::class;
    }

    public function getLotteryByCode($code)
    {
        return $this->model->selectRaw("lottery_codes.code, lottery_codes.reward_id as lottery_reward_id, shops.chance_plus, shops.reward_id")
        ->leftJoin('staff', 'staff.id', '=', 'lottery_codes.staff_id')
        ->leftJoin('shops', 'shops.id', '=', 'staff.shop_id')
        ->where('code', $code)
        ->first();
    }
}
