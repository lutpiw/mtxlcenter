<?php

namespace App\Repositories\Contracts;

interface ZiswafTransactionRepositoryInterface
{
    public function getTotalAmountByCampaignId(int $id);
    public function getTotalCustomerByCampaignId(int $id);
}
