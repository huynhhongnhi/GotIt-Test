<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckRewardLotteryRequest;
use App\Repositories\LotteryCodeRepositoryInterface;
use App\Repositories\RewardRepositoryInterface;
use Validator;

class StaffController extends Controller
{
    protected $lotteryCodeRepository;
    public function __construct(
        LotteryCodeRepositoryInterface $lotteryCodeRepository,
        RewardRepositoryInterface $rewardRepository
    ) {
        $this->lotteryCodeRepository = $lotteryCodeRepository;
        $this->rewardRepository = $rewardRepository;
    }

    public function index()
    {
        return view('search');
    }

    public function submit(CheckRewardLotteryRequest $req)
    {
        $totalLottery = $this->lotteryCodeRepository->count();

        $totalLotteryReceived = $this->lotteryCodeRepository->whereNotNull('reward_id')->count();

        $rewards = $this->rewardRepository->where('quality', '>', 0)->get();

        $sumQualityRewward = $rewards->sum('quality'); //
        
        // check if out of slots
        if ($totalLotteryReceived >= $sumQualityRewward) {
            $validator->after(function($validator) {
                $validator->errors()->add('code', 'Out of slots');
            });
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        
        $lottery = $this->lotteryCodeRepository->getLotteryByCode($req->code);
        // check find data by lottery code
        if (empty($lottery)) {
            $validator =  Validator::make($req->all(),[
                'code' => 'required',
            ]);
            $validator->after(function($validator) {
                $validator->errors()->add('code', 'Not found data');
            });
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
        } 
        // check code isset reward
        if (!empty($lottery) && $lottery->reward_id != null) {
            $rewardById = $this->rewardRepository->where('id', $lottery->lottery_reward_id)->first();
            return redirect()->back()->with('message', 'Congratulations! Your reward is ' . $rewardById->name);
        }

        //winning rate
        $hitRate = $sumQualityRewward / ($totalLottery - $totalLotteryReceived);
        $listChancePlus = [];
        $lists = [];
        $percent = 0;
        $listNameReward = [];
        foreach($rewards as $k => $reward) {
            $listNameReward[$reward->id] = $reward->name;
            $hitGift = $reward->quality / $sumQualityRewward;
            $hitRateGift = $hitGift * $hitRate;
            $listChancePlus[$reward->id] = $hitRateGift*100 / $hitRate;
            // priority for shop 
            if ($lottery->chance_plus && count($rewards) > 1) {
                if ($lottery->reward_id == $reward->id) {
                    $listChancePlus[$reward->id] = $listChancePlus[$reward->id] + $lottery->chance_plus;
                    $percent = 100 - $listChancePlus[$reward->id];
                } else {
                    $lists[$reward->id] = $hitRateGift;
                }
            }
        }
        // change perent when reward priority
        if ($lottery->chance_plus && count($lists) > 0) {
            foreach($lists as $key=>$value) {
                if (count($lists) == 1) {
                    $listChancePlus[$key] = $percent;
                } else {
                    $listChancePlus[$key] = $value * $percent / $hitRate;
                }
            }
        }
        // rand reward
        $rewardId = $this->randomReward($listChancePlus);
        if ($rewardId) {
            $this->lotteryCodeRepository->where('code', $lottery->code)->update(['reward_id' => $rewardId]);
            $fReward = $this->rewardRepository->where('id', $rewardId)->first();
            $this->rewardRepository->where('id', $rewardId)->update(['quality' => $fReward->quality-1]);
        }
        //result
        return redirect()->back()->with('status', 'Congratulations on winning the prize '. $listNameReward[$rewardId]);
        
    }

    public function randomReward($list = []) {
        $sum = 0;
        $choose = 0;
        $rand = rand(1, 100);
        
        foreach ($list as $f=>$v) {
            $sum += $v;
            if ( $sum >= $rand ) {
                $choose = $f;
                break;
            }
        }
        return $choose;
    }
}
