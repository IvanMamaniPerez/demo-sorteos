<?php

namespace App\Traits;

use App\Enums\SellTypeDocumentEnum;
use App\Enums\UserSellSequenceStatusEnum;
use App\Models\Sell;
use App\Models\User;
use App\Models\UserSellSequence;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait SellerSequencesTrait
{

    public function setSeriesAndSequence(Sell $sell): Sell
    {
        $seller           = $sell->order->seller;
        $userSellSequence = $this->getDefaultSequenceOfTypeDocument($seller, $sell->type_document);
        $sell->series     = $userSellSequence->series;
        $sell->sequence   = $userSellSequence->sequence;
        if ($sell->exists) {
            $sell->save();
        }
        return $sell;
    }

    /**
     * Get the user sell sequence default by type document for the sell and increment the sequence
     * @param User $seller
     * @param SellTypeDocumentEnum $typeDocument
     * @return UserSellSequence
     */
    public function getDefaultSequenceOfTypeDocumentAndIncrement(User $seller, SellTypeDocumentEnum $typeDocument): UserSellSequence
    {
        DB::beginTransaction();
        try {
            $userSellSequence = UserSellSequence::where('user_id', $seller->id)
                ->firstOrCreate([
                    'user_id'       => $seller->id,
                    'type_document' => $typeDocument,
                    'status'        => UserSellSequenceStatusEnum::DEFAULT,
                ], [
                    'series'        => Str::padLeft(1, 3, '0'),
                    'sequence'      => Str::padLeft(0, 8, '0'),
                ]);

            $userSellSequence = $this->incrementCorrelative($userSellSequence);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return $userSellSequence;
    }

    /**
     * Increment the sequence of the user sell sequence
     * @param UserSellSequence $userSellSequence
     * @return UserSellSequence $userSellSequence
     */
    public function incrementCorrelative(UserSellSequence $userSellSequence): UserSellSequence
    {
        $userSellSequence->sequence = Str::padLeft((int) $userSellSequence->sequence + 1, 8, '0');
        $userSellSequence->save();
        return $userSellSequence;
    }
}
