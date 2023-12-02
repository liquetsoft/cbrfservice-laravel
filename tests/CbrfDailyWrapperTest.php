<?php

declare(strict_types=1);

namespace Liquetsoft\CbrfService\Laravel\Tests;

use Liquetsoft\CbrfService\CbrfDaily;
use Liquetsoft\CbrfService\CbrfEntityCurrencyInternal;
use Liquetsoft\CbrfService\Laravel\CbrfDailyWrapper;
use PHPUnit\Framework\Constraint\IsIdentical;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * @internal
 */
final class CbrfDailyWrapperTest extends BaseCase
{
    /**
     * @test
     */
    public function testGetCursOnDate(): void
    {
        $date = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'getCursOnDate',
            $date,
            $res
        );

        $testRes = $mock->getCursOnDate($date);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testGetCursOnDateByCharCode(): void
    {
        $charCode = 'USD';
        $date = new \DateTime();
        $res = null;

        $mock = $this->createCbrfDailyWrapper(
            'getCursOnDateByCharCode',
            [
                $date,
                $charCode,
            ],
            $res
        );

        $testRes = $mock->getCursOnDateByCharCode($date, $charCode);

        $this->assertSame($res, $testRes);
    }

    /**
     * @test
     */
    public function testGetCursOnDateByNumericCode(): void
    {
        $numericCode = 123;
        $date = new \DateTime();
        $res = null;

        $mock = $this->createCbrfDailyWrapper(
            'getCursOnDateByNumericCode',
            [
                $date,
                $numericCode,
            ],
            $res
        );

        $testRes = $mock->getCursOnDateByNumericCode($date, $numericCode);

        $this->assertSame($res, $testRes);
    }

    /**
     * @test
     */
    public function testEnumValutes(): void
    {
        $seld = true;
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'enumValutes',
            $seld,
            $res
        );

        $testRes = $mock->enumValutes($seld);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testEnumValutesDefault(): void
    {
        $seld = false;
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'enumValutes',
            $seld,
            $res
        );

        $testRes = $mock->enumValutes();

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testEnumValuteByCharCode(): void
    {
        $charCode = 'RUB';
        $seld = true;
        $res = null;

        $mock = $this->createCbrfDailyWrapper(
            'enumValuteByCharCode',
            [
                $charCode,
                $seld,
            ],
            $res
        );

        $testRes = $mock->enumValuteByCharCode($charCode, $seld);

        $this->assertSame($res, $testRes);
    }

    /**
     * @test
     */
    public function testEnumValuteByCharCodeDefault(): void
    {
        $charCode = 'RUB';
        $seld = false;
        $res = null;

        $mock = $this->createCbrfDailyWrapper(
            'enumValuteByCharCode',
            [
                $charCode,
                $seld,
            ],
            $res
        );

        $testRes = $mock->enumValuteByCharCode($charCode);

        $this->assertSame($res, $testRes);
    }

    /**
     * @test
     */
    public function testEnumValuteByNumericCode(): void
    {
        $numericCode = 123;
        $seld = true;
        $res = null;

        $mock = $this->createCbrfDailyWrapper(
            'enumValuteByNumericCode',
            [
                $numericCode,
                $seld,
            ],
            $res
        );

        $testRes = $mock->enumValuteByNumericCode($numericCode, $seld);

        $this->assertSame($res, $testRes);
    }

    /**
     * @test
     */
    public function testEnumValuteByNumericCodeDefault(): void
    {
        $numericCode = 123;
        $seld = false;
        $res = null;

        $mock = $this->createCbrfDailyWrapper(
            'enumValuteByNumericCode',
            [
                $numericCode,
                $seld,
            ],
            $res
        );

        $testRes = $mock->enumValuteByNumericCode($numericCode);

        $this->assertSame($res, $testRes);
    }

    /**
     * @test
     */
    public function testGetLatestDateTime(): void
    {
        $res = new \DateTime();

        $mock = $this->createCbrfDailyWrapper(
            'getLatestDateTime',
            null,
            $res
        );

        $testRes = $mock->getLatestDateTime();

        $this->assertSame(
            $res->format(\DATE_ATOM),
            $testRes->format(\DATE_ATOM)
        );
    }

    /**
     * @test
     */
    public function testGetLatestDateTimeSeld(): void
    {
        $res = new \DateTime();

        $mock = $this->createCbrfDailyWrapper(
            'getLatestDateTimeSeld',
            null,
            $res
        );

        $testRes = $mock->getLatestDateTimeSeld();

        $this->assertSame(
            $res->format(\DATE_ATOM),
            $testRes->format(\DATE_ATOM)
        );
    }

    /**
     * @test
     */
    public function testGetLatestDate(): void
    {
        $res = new \DateTime();

        $mock = $this->createCbrfDailyWrapper(
            'getLatestDate',
            null,
            $res
        );

        $testRes = $mock->getLatestDate();

        $this->assertSame(
            $res->format(\DATE_ATOM),
            $testRes->format(\DATE_ATOM)
        );
    }

    /**
     * @test
     */
    public function testGetLatestDateSeld(): void
    {
        $res = new \DateTime();

        $mock = $this->createCbrfDailyWrapper(
            'getLatestDateSeld',
            null,
            $res
        );

        $testRes = $mock->getLatestDateSeld();

        $this->assertSame(
            $res->format(\DATE_ATOM),
            $testRes->format(\DATE_ATOM)
        );
    }

    /**
     * @test
     */
    public function testGetCursDynamic(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        /** @var CbrfEntityCurrencyInternal */
        $currency = $this->getMockBuilder(CbrfEntityCurrencyInternal::class)->getMock();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'getCursDynamic',
            [
                $from,
                $to,
                $currency,
            ],
            $res
        );

        $testRes = $mock->getCursDynamic($from, $to, $currency);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testKeyRate(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'keyRate',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->keyRate($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testDragMetDynamic(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'dragMetDynamic',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->dragMetDynamic($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testSwapDynamic(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'swapDynamic',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->swapDynamic($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testDepoDynamic(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'depoDynamic',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->depoDynamic($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testOstatDynamic(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'ostatDynamic',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->ostatDynamic($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testOstatDepo(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'ostatDepo',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->ostatDepo($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testMrrf(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'mrrf',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->mrrf($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testMrrf7d(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'mrrf7d',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->mrrf7d($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testSaldo(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'saldo',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->saldo($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testRuoniaSV(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'ruoniaSV',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->ruoniaSV($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testRuonia(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'ruonia',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->ruonia($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testMkr(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'mkr',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->mkr($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testDv(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'dv',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->dv($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testRepoDebt(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'repoDebt',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->repoDebt($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testEnumReutersValutes(): void
    {
        $date = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'enumReutersValutes',
            $date,
            $res
        );

        $testRes = $mock->enumReutersValutes($date);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testGetReutersCursOnDate(): void
    {
        $date = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'getReutersCursOnDate',
            $date,
            $res
        );

        $testRes = $mock->getReutersCursOnDate($date);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testOvernight(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'overnight',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->overnight($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testSwapDayTotal(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'swapDayTotal',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->swapDayTotal($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testSwapMonthTotal(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'swapMonthTotal',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->swapMonthTotal($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testSwapInfoSell(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'swapInfoSell',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->swapInfoSell($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testSwapInfoSellVol(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'swapInfoSellVol',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->swapInfoSellVol($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testBLiquidity(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'bLiquidity',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->bLiquidity($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testBiCurBase(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'biCurBase',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->biCurBase($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testBiCurBacket(): void
    {
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'biCurBacket',
            null,
            $res
        );

        $testRes = $mock->biCurBacket();

        $this->assertSame($res, $testRes->toArray());
    }

    /**
     * @test
     */
    public function testRepoDebtUSD(): void
    {
        $from = new \DateTime();
        $to = new \DateTime();
        $res = [];

        $mock = $this->createCbrfDailyWrapper(
            'repoDebtUSD',
            [
                $from,
                $to,
            ],
            $res
        );

        $testRes = $mock->repoDebtUSD($from, $to);

        $this->assertSame($res, $testRes->toArray());
    }

    private function createCbrfDailyWrapper(string $method = '', mixed $params = [], mixed $return = null): CbrfDailyWrapper
    {
        $cbrfDailyMock = $this->createCbrfDailyMock($method, $params, $return);

        return new CbrfDailyWrapper($cbrfDailyMock);
    }

    /**
     * @return CbrfDaily&MockObject
     */
    private function createCbrfDailyMock(string $method = '', mixed $params = [], mixed $return = null): CbrfDaily
    {
        /** @var CbrfDaily&MockObject */
        $mock = $this->getMockBuilder(CbrfDaily::class)
            ->disableOriginalConstructor()
            ->getMock();

        if (!empty($method)) {
            $methodMock = $mock->expects($this->once())
                ->method($method)
                ->willReturn($return);
            if ($params !== null) {
                $methodMock->with(
                    ...array_map(
                        fn (mixed $param): IsIdentical => $this->identicalTo($param),
                        \is_array($params) ? $params : [$params]
                    )
                );
            }
        }

        return $mock;
    }
}
