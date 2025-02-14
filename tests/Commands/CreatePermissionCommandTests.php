<?php

namespace Junges\ACL\Tests\Commands;

use Junges\ACL\Tests\TestCase;
use Junges\ACL\Tests\Permission;
use Illuminate\Support\Facades\Artisan;

class CreatePermissionCommandTests extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function test_if_it_can_create_a_permission()
    {
        $permission = Artisan::call('permission:create', [
            'name' => 'Command test permission',
            'slug' => 'command-test-permission',
            'description' => 'Command test',
        ]);

        $this->assertCount(1, Permission::where('slug', 'command-test-permission')->get());
        $this->assertEquals(0, $permission);
    }
}
