<?php

namespace App\Repositories;

use App\Models\Reward;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class LotteryCodeRepository.
 *
 * @package namespace App\Repositories;
 */
class RewardRepository extends BaseRepository implements RewardRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Reward::class;
    }

    public function getLotteryByCode($code)
    {
        return $this->model->selectRaw("lottery_codes.code, shops.chance_plus, shops.reward_id")
        ->leftJoin('staff', 'staff.id', '=', 'lottery_codes.staff_id')
        ->leftJoin('shops', 'shops.id', '=', 'staff.shop_id')
        ->where('code', $code)
        ->first();
    }
}
