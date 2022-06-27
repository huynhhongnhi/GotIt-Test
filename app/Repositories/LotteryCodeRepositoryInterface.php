<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LotteryCodeRepository.
 *
 * @package namespace App\Repositories;
 */
interface LotteryCodeRepositoryInterface extends RepositoryInterface
{
    public function getLotteryByCode($code);
}
