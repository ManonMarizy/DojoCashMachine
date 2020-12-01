<?php

class CashMachine
{

    private $bill500 = 0;
    private $bill200 = 0;
    private $bill100 = 0;
    private $bill50 = 0;
    private $bill20 = 0;
    private $bill10 = 0;
    private $bill5 = 0;

    public function addCash($billValue, $numberBills)
    {

        $authorizedBills = [
            '500',
            '200',
            '100',
            '50',
            '20',
            '10',
            '5'
        ];

        if (!in_array($billValue, $authorizedBills) || $numberBills < 0) {
            return false;
        } else {
            switch ($billValue) {
                case 500:
                    return $this->setBill500($numberBills);
                    break;
                case 200:
                    return $this->setBill200($numberBills);
                    break;
                case 100:
                    return $this->setBill100($numberBills);
                    break;
                case 50:
                    return $this->setBill50($numberBills);
                    break;
                case 20:
                    return $this->setBill20($numberBills);
                    break;
                case 10:
                    return $this->setBill10($numberBills);
                    break;
                case 5:
                    return $this->setBill5($numberBills);
                    break;
            }
        }
    }

    public function getRemainingCash(): array
    {
        return [
            '500' => $this->getBill500(),
            '200' => $this->getBill200(),
            '100' => $this->getBill100(),
            '50' => $this->getBill50(),
            '20' => $this->getBill20(),
            '10' => $this->getBill10(),
            '5' => $this->getBill5(),
        ];
    }

    public function withdraw(int $giveMyMoney): array
    {
        $atmCash = $this->getRemainingCash();

        $cashAsked = [
            '500' => 0,
            '200' => 0,
            '100' => 0,
            '50' => 0,
            '20' => 0,
            '10' => 0,
            '5' => 0,
        ];

        $cashReturn = [];

        if ($giveMyMoney < 5) {
            return $cashReturn;
        }

        while($giveMyMoney > 4) {
            $atmCash = $this->getRemainingCash();
            if($atmCash['500'] > 0 && $giveMyMoney - 500 >= 0) {
                $atmCash['500'] -= 1;
                $giveMyMoney -= 500;
                $cashAsked['500'] += 1;
                $this->setBill500(-1);
            } else if($atmCash['200'] > 0 && $giveMyMoney - 200 >= 0) {
                $giveMyMoney -= 200;
                $cashAsked['200'] += 1;
                $this->setBill200(-1);
            } else if($atmCash['100'] > 0 && $giveMyMoney - 100 >= 0) {
                $giveMyMoney -= 100;
                $cashAsked['100'] += 1;
                $this->setBill100(-1);
            } else if($atmCash['50'] > 0 && $giveMyMoney - 50 >= 0) {
                $giveMyMoney -= 50;
                $cashAsked['50'] += 1;
                $this->setBill50(-1);
            } else if($atmCash['20'] > 0 && $giveMyMoney - 20 >= 0) {
                $giveMyMoney -= 20;
                $cashAsked['20'] += 1;
                $this->setBill20(-1);
            } else if($atmCash['10'] > 0 && $giveMyMoney - 10 >= 0) {
                $giveMyMoney -= 10;
                $cashAsked['10'] += 1;
                $this->setBill10(-1);
            } else if($atmCash['5'] > 0 && $giveMyMoney - 5 >= 0) {
                $giveMyMoney -= 5;
                $cashAsked['5'] += 1;
                $this->setBill5(-1);
            } else {
                break;
            }
        }

        foreach ($cashAsked as $bill => $nbBill) {
            if ($nbBill > 0) {
                $cashReturn[$bill] = $nbBill;
            }
        }

        return $cashReturn;
    }

    public function getBill500()
    {
        return $this->bill500;
    }

    public function getBill200()
    {
        return $this->bill200;
    }

    public function getBill100()
    {
        return $this->bill100;
    }

    public function getBill50()
    {
        return $this->bill50;
    }

    public function getBill20()
    {
        return $this->bill20;
    }

    public function getBill10()
    {
        return $this->bill10;
    }

    public function getBill5()
    {
        return $this->bill5;
    }

    public function setBill500($nbBill)
    {
        $this->bill500 = $this->getBill500() + $nbBill;
        return true;
    }

    public function setBill200($nbBill)
    {
        $this->bill200 = $this->getBill200() + $nbBill;
        return true;
    }

    public function setBill100($nbBill)
    {
        $this->bill100 = $this->getBill100() + $nbBill;
        return true;
    }

    public function setBill50($nbBill)
    {
        $this->bill50 = $this->getBill50() + $nbBill;
        return true;
    }

    public function setBill20($nbBill)
    {
        $this->bill20 = $this->getBill20() + $nbBill;
        return true;
    }

    public function setBill10($nbBill)
    {
        $this->bill10 = $this->getBill10() + $nbBill;
        return true;
    }

    public function setBill5($nbBill)
    {
        $this->bill5 = $this->getBill5() + $nbBill;
        return true;
    }
}