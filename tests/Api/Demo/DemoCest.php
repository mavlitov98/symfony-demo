<?php

declare(strict_types=1);

namespace App\Tests\Api\Demo;

use App\Tests\Codeception\Support\ApiTester;

class DemoCest
{    
    public function demo(ApiTester $I): void
    {
        $I->sendPost('/demo');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['message' => 'Hello from Demo!']);
    }
}