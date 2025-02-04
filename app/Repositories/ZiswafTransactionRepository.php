<?php

namespace App\Repositories;

use App\Models\ZiswafTransaction;
use App\Repositories\Contracts\ZiswafTransactionRepositoryInterface;

class ZiswafTransactionRepository implements ZiswafTransactionRepositoryInterface
{

    public function getTotalAmountByCampaignId(int $id)
    {
        return ZiswafTransaction::class;
    }

    public function getTotalCustomerByCampaignId(int $id)
    {
        return ZiswafTransaction::class;
    }

}
