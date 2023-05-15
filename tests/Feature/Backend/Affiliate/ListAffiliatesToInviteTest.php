<?php

namespace Tests\Feature\Backend\User;

use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ListUserTest.
 */
class ListAffiliatesToInviteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_a_user_with_correct_permissions_can_list_affiliates_to_invite()
    {
        $this->actingAs($user = User::factory()->admin()->create());

        $user->syncPermissions(['admin.access.user.list']);

        $this->get('/admin/auth/affiliate')->assertOk();

        $user->syncPermissions([]);

        $response = $this->get('/admin/auth/affiliate');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

}
