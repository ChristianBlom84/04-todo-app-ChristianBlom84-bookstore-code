<?php

namespace Bookstore\Domain\Customer;

use Bookstore\Domain\Customer;
use Bookstore\Domain\Person;

class Premium extends Person implements Customer
{
    public function getMonthlyFee(): float
    {
        return 10.0;
    }

    public function getAmountToBorrow(): int
    {
        return 10;
    }

    public function getType(): string
    {
        return 'Premium';
    }

    public function pay(float $amount): void
    {
        echo "Paying $amount.";
    }

    public function isExtentOfTaxes(): bool
    {
        return true;
    }
}
