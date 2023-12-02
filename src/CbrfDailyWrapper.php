<?php

declare(strict_types=1);

namespace Liquetsoft\CbrfService\Laravel;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Liquetsoft\CbrfService\CbrfDaily;
use Liquetsoft\CbrfService\CbrfEntityCurrencyInternal;
use Liquetsoft\CbrfService\Entity\BiCurBacketItem;
use Liquetsoft\CbrfService\Entity\BiCurBaseRate;
use Liquetsoft\CbrfService\Entity\BliquidityRate;
use Liquetsoft\CbrfService\Entity\CurrencyEnum;
use Liquetsoft\CbrfService\Entity\CurrencyRate;
use Liquetsoft\CbrfService\Entity\DepoRate;
use Liquetsoft\CbrfService\Entity\Dv;
use Liquetsoft\CbrfService\Entity\InternationalReserve;
use Liquetsoft\CbrfService\Entity\InternationalReserveWeek;
use Liquetsoft\CbrfService\Entity\KeyRate;
use Liquetsoft\CbrfService\Entity\Mkr;
use Liquetsoft\CbrfService\Entity\OstatDepoRate;
use Liquetsoft\CbrfService\Entity\OstatRate;
use Liquetsoft\CbrfService\Entity\OvernightRate;
use Liquetsoft\CbrfService\Entity\PreciousMetalRate;
use Liquetsoft\CbrfService\Entity\RepoDebt;
use Liquetsoft\CbrfService\Entity\RepoDebtUSDRate;
use Liquetsoft\CbrfService\Entity\ReutersCurrency;
use Liquetsoft\CbrfService\Entity\ReutersCurrencyRate;
use Liquetsoft\CbrfService\Entity\RuoniaBid;
use Liquetsoft\CbrfService\Entity\RuoniaIndex;
use Liquetsoft\CbrfService\Entity\Saldo;
use Liquetsoft\CbrfService\Entity\SwapDayTotalRate;
use Liquetsoft\CbrfService\Entity\SwapInfoSellItem;
use Liquetsoft\CbrfService\Entity\SwapInfoSellVolItem;
use Liquetsoft\CbrfService\Entity\SwapMonthTotalRate;
use Liquetsoft\CbrfService\Entity\SwapRate;
use Liquetsoft\CbrfService\Exception\CbrfException;

/**
 * Laravel wrapper for CbrfDaily service.
 */
final class CbrfDailyWrapper
{
    public function __construct(private readonly CbrfDaily $cbrfDaily)
    {
    }

    /**
     * Returns list of rates for all currencies for set date.
     *
     * @return Collection<int, CurrencyRate>
     *
     * @throws CbrfException
     */
    public function getCursOnDate(\DateTimeInterface $date): Collection
    {
        return collect($this->cbrfDaily->getCursOnDate($date));
    }

    /**
     * Returns rate for currency with set char code.
     *
     * @throws CbrfException
     */
    public function getCursOnDateByCharCode(\DateTimeInterface $date, string $charCode): ?CurrencyRate
    {
        return $this->cbrfDaily->getCursOnDateByCharCode($date, $charCode);
    }

    /**
     * Returns rate for currency with set numeric code.
     *
     * @throws CbrfException
     */
    public function getCursOnDateByNumericCode(\DateTimeInterface $date, int $numericCode): ?CurrencyRate
    {
        return $this->cbrfDaily->getCursOnDateByNumericCode($date, $numericCode);
    }

    /**
     * List of all currencies that allowed on cbrf service.
     *
     * @return Collection<int, CurrencyEnum>
     *
     * @throws CbrfException
     */
    public function enumValutes(bool $seld = false): Collection
    {
        return collect($this->cbrfDaily->enumValutes($seld));
    }

    /**
     * Returns enum for currency with set char code.
     *
     * @throws CbrfException
     */
    public function enumValuteByCharCode(string $charCode, bool $seld = false): ?CurrencyEnum
    {
        return $this->cbrfDaily->enumValuteByCharCode($charCode, $seld);
    }

    /**
     * Returns enum for currency with set numeric code.
     *
     * @throws CbrfException
     */
    public function enumValuteByNumericCode(int $numericCode, bool $seld = false): ?CurrencyEnum
    {
        return $this->cbrfDaily->enumValuteByNumericCode($numericCode, $seld);
    }

    /**
     * Latest per day date and time of publication.
     *
     * @throws CbrfException
     */
    public function getLatestDateTime(): Carbon
    {
        return Carbon::parse($this->cbrfDaily->getLatestDateTime());
    }

    /**
     * Latest per day date and time of seld.
     *
     * @throws CbrfException
     */
    public function getLatestDateTimeSeld(): Carbon
    {
        return Carbon::parse($this->cbrfDaily->getLatestDateTimeSeld());
    }

    /**
     * Latest per month date and time of publication.
     *
     * @throws CbrfException
     */
    public function getLatestDate(): Carbon
    {
        return Carbon::parse($this->cbrfDaily->getLatestDate());
    }

    /**
     * Latest per month date and time of seld.
     *
     * @throws CbrfException
     */
    public function getLatestDateSeld(): Carbon
    {
        return Carbon::parse($this->cbrfDaily->getLatestDateSeld());
    }

    /**
     * Returns rate dynamic for set currency within set dates.
     *
     * @return Collection<int, CurrencyRate>
     *
     * @throws CbrfException
     */
    public function getCursDynamic(\DateTimeInterface $from, \DateTimeInterface $to, CbrfEntityCurrencyInternal $currency): Collection
    {
        return collect($this->cbrfDaily->getCursDynamic($from, $to, $currency));
    }

    /**
     * Returns key rate dynamic within set dates.
     *
     * @return Collection<int, KeyRate>
     *
     * @throws CbrfException
     */
    public function keyRate(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->keyRate($from, $to));
    }

    /**
     * Returns list of presious metals prices within set dates.
     *
     * @return Collection<int, PreciousMetalRate>
     *
     * @throws CbrfException
     */
    public function dragMetDynamic(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->dragMetDynamic($from, $to));
    }

    /**
     * Returns list of swap rates within set dates.
     *
     * @return Collection<int, SwapRate>
     *
     * @throws CbrfException
     */
    public function swapDynamic(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->swapDynamic($from, $to));
    }

    /**
     * Returns list depo dynamic items within set dates.
     *
     * @return Collection<int, DepoRate>
     *
     * @throws CbrfException
     */
    public function depoDynamic(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->depoDynamic($from, $to));
    }

    /**
     * Returns the dynamic of balances of funds items within set dates.
     *
     * @return Collection<int, OstatRate>
     *
     * @throws CbrfException
     */
    public function ostatDynamic(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->ostatDynamic($from, $to));
    }

    /**
     * Returns the banks deposites at bank of Russia.
     *
     * @return Collection<int, OstatDepoRate>
     *
     * @throws CbrfException
     */
    public function ostatDepo(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->ostatDepo($from, $to));
    }

    /**
     * Returns international valute reseves of Russia for month.
     *
     * @return Collection<int, InternationalReserve>
     *
     * @throws CbrfException
     */
    public function mrrf(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->mrrf($from, $to));
    }

    /**
     * Returns international valute reseves of Russia for week.
     *
     * @return Collection<int, InternationalReserveWeek>
     *
     * @throws CbrfException
     */
    public function mrrf7d(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->mrrf7d($from, $to));
    }

    /**
     * Returns operations saldo.
     *
     * @return Collection<int, Saldo>
     *
     * @throws CbrfException
     */
    public function saldo(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->saldo($from, $to));
    }

    /**
     * Returns Ruonia index.
     *
     * @return Collection<int, RuoniaIndex>
     *
     * @throws CbrfException
     */
    public function ruoniaSV(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->ruoniaSV($from, $to));
    }

    /**
     * Returns Ruonia bid.
     *
     * @return Collection<int, RuoniaBid>
     *
     * @throws CbrfException
     */
    public function ruonia(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->ruonia($from, $to));
    }

    /**
     * Returns inter banks credit market bids.
     *
     * @return Collection<int, Mkr>
     *
     * @throws CbrfException
     */
    public function mkr(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->mkr($from, $to));
    }

    /**
     * Returns requirements for credit organisations.
     *
     * @return Collection<int, Dv>
     *
     * @throws CbrfException
     */
    public function dv(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->dv($from, $to));
    }

    /**
     * Returns debts of credit organisations.
     *
     * @return Collection<int, RepoDebt>
     *
     * @throws CbrfException
     */
    public function repoDebt(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->repoDebt($from, $to));
    }

    /**
     * Returns list of Reuters currencies.
     *
     * @return Collection<int, ReutersCurrency>
     *
     * @throws CbrfException
     */
    public function enumReutersValutes(\DateTimeInterface $date): Collection
    {
        return collect($this->cbrfDaily->enumReutersValutes($date));
    }

    /**
     * Returns list of Reuters rates for all currencies for set date.
     *
     * @return Collection<int, ReutersCurrencyRate>
     *
     * @throws CbrfException
     */
    public function getReutersCursOnDate(\DateTimeInterface $date): Collection
    {
        return collect($this->cbrfDaily->getReutersCursOnDate($date));
    }

    /**
     * Returns rates of overnight loans.
     *
     * @return Collection<int, OvernightRate>
     *
     * @throws CbrfException
     */
    public function overnight(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->overnight($from, $to));
    }

    /**
     * Returns rates for currency swap.
     *
     * @return Collection<int, SwapDayTotalRate>
     *
     * @throws CbrfException
     */
    public function swapDayTotal(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->swapDayTotal($from, $to));
    }

    /**
     * Returns rates for currency swap by eur and usd.
     *
     * @return Collection<int, SwapMonthTotalRate>
     *
     * @throws CbrfException
     */
    public function swapMonthTotal(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->swapMonthTotal($from, $to));
    }

    /**
     * Returns conditions for currency swap.
     *
     * @return Collection<int, SwapInfoSellItem>
     *
     * @throws CbrfException
     */
    public function swapInfoSell(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->swapInfoSell($from, $to));
    }

    /**
     * Returns sell volume for currency swap.
     *
     * @return Collection<int, SwapInfoSellVolItem>
     *
     * @throws CbrfException
     */
    public function swapInfoSellVol(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->swapInfoSellVol($from, $to));
    }

    /**
     * Returns banks liquidity.
     *
     * @return Collection<int, BliquidityRate>
     *
     * @throws CbrfException
     */
    public function bLiquidity(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->bLiquidity($from, $to));
    }

    /**
     * Returns bi currency backet price.
     *
     * @return Collection<int, BiCurBaseRate>
     *
     * @throws CbrfException
     */
    public function biCurBase(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->biCurBase($from, $to));
    }

    /**
     * Returns bi currency backet structure.
     *
     * @return Collection<int, BiCurBacketItem>
     *
     * @throws CbrfException
     */
    public function biCurBacket(): Collection
    {
        return collect($this->cbrfDaily->biCurBacket());
    }

    /**
     * Returns repo debts.
     *
     * @return Collection<int, RepoDebtUSDRate>
     *
     * @throws CbrfException
     */
    public function repoDebtUSD(\DateTimeInterface $from, \DateTimeInterface $to): Collection
    {
        return collect($this->cbrfDaily->repoDebtUSD($from, $to));
    }
}
