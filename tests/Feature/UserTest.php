<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    // 初期設定
    protected function setUp(): void
    {
        parent::setUp();

        // テストユーザーを作成します。
        $this->user = User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password'), // ハッシュ化
        ]);
    }

    /**
     * @test
     * @return void
     */
    public function 初期画面表示(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function ログイン画面表示(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function ログイン失敗(): void
    {
        $response = $this->post('/login');
        $response->assertStatus(302);
    }

    /**
     * @test
     * @return void
     */
    public function ログイン成功(): void
    {
        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => 'password',
        ]);
        $this->assertAuthenticatedAs($this->user);
        $response->assertRedirect('/dashboard')->assertStatus(302);
    }
}
