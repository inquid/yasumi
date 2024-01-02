<?php

declare(strict_types=1);
/*
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2024 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me at sachatelgenhof dot com>
 */

namespace Yasumi\tests\Australia\NewSouthWales;

use Yasumi\Holiday;
use Yasumi\tests\ProviderTestCase;

/**
 * Class for testing holidays in New South Wales (Australia).
 */
class NewSouthWalesTest extends NewSouthWalesBaseTestCase implements ProviderTestCase
{
    /**
     * @var int year random year number used for all tests in this Test Case
     */
    protected int $year;

    /**
     * Initial setup of this Test Case.
     *
     * @throws \Exception
     */
    protected function setUp(): void
    {
        $this->year = $this->generateRandomYear(1921);
    }

    /**
     * Tests if all official holidays in New South Wales (Australia) are defined by the provider class.
     */
    public function testOfficialHolidays(): void
    {
        $holidays = [
            'newYearsDay',
            'goodFriday',
            'easterMonday',
            'christmasDay',
            'secondChristmasDay',
            'australiaDay',
            'anzacDay',
            'easter',
            'easterSaturday',
            'queensBirthday',
            'labourDay',
        ];

        if (2022 == $this->year) {
            $holidays[] = 'nationalDayOfMourning';
        }

        $this->assertDefinedHolidays($holidays, $this->region, $this->year, Holiday::TYPE_OFFICIAL);
    }

    /**
     * Tests if all bank holidays in New South Wales (Australia) are defined by the provider class.
     */
    public function testBankHolidays(): void
    {
        $this->assertDefinedHolidays([
            'bankHoliday',
        ], $this->region, $this->year, Holiday::TYPE_BANK);
    }

    /**
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function testSources(): void
    {
        $this->assertSources($this->region, 1);
    }
}
