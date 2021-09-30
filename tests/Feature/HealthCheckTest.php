<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    public function testHealthCheck()
    {
        $this->get('/api/healthcheck')->assertOk();
    }
}
