<?php


namespace Tests\Feature;


use App\Models\User;
use CloudCreativity\LaravelJsonApi\Testing\TestResponse;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /**
     * Asserts all users can be retrieved from the /api/v1/users endpoint.
     */
    public function test_all_users_can_be_retrieved()
    {
        $users = User::factory()->count(3)->create();
        $response = $this->callReadAllUsersEndpoint();
        $response->assertFetchedMany($users);
    }

    /**
     * Asserts a specific user can be retrieved from the /api/v1/users/:id endpoint.
     */
    public function test_a_specific_user_can_be_retrieved()
    {
        $user = User::factory()->create();
        $response = $this->callReadSpecificUserEndpoint($user);
        $response->assertFetchedOne($user);
    }

    /**
     * Asserts a request to the /api/v1/users/:id endpoint fails when called after another request has been made.
     */
    public function test_calling_a_resource_specific_endpoint_after_any_request_throws_a_500_error()
    {
        $users = User::factory()->count(3)->create();

        $response = $this->callReadAllUsersEndpoint();
        $response->assertFetchedMany($users);
        $failingResponse = $this->callReadSpecificUserEndpoint($users->first());
        $failingResponse->assertStatus(500);
    }

    /**
     * Calls the /api/v1/users endpoint.
     *
     * @return TestResponse The request response.
     */
    private function callReadAllUsersEndpoint()
    {
        return $this->jsonApi()
            ->expects('users')
            ->get('/api/v1/users')
        ;
    }

    /**
     * Calls the /api/v1/users/:id endpoint.
     *
     * @param User $user    The user to retrieve.
     * @return TestResponse The request response.
     */
    private function callReadSpecificUserEndpoint(User $user)
    {
        return $this->jsonApi()
            ->expects('users')
            ->get('/api/v1/users/' . $user->id)
        ;
    }
}
