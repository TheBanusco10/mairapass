<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

use function PHPUnit\Framework\assertFalse;

class PasswordTest extends TestCase
{
    /**
     * El usuario puede crear contraseñas si no está loggeado
     *
     * @return void
     */
    public function testCreatePasswordWithoutLogin()
    {
        $logged = Auth::check();

        if (!$logged) {

            $response = $this->post(route('create'));
    
            $response->assertStatus(302);
        }
    }

    /**
     * El usuario puede ver la vista contraseñas si no está loggeado
     *
     * @return void
     */
    public function testEditViewPasswordWithoutLogin()
    {
        $logged = Auth::check();

        if (!$logged) {

            $response = $this->get(route('editPassword', ['password' => 96]));
    
            $response->assertStatus(302);
        }
    }

    /**
     * El usuario puede ver la vista contraseñas si no está loggeado
     *
     * @return void
     */
    public function testEditPasswordWithoutLogin()
    {
        $logged = Auth::check();

        if (!$logged) {

            $response = $this->put(route('updatePassword', ['password' => 96]));
    
            $response->assertStatus(302);
        }
    }
}
