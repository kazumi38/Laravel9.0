<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Http\Requests\CreateTask;
use Carbon\Carbon;

class TaskTest extends TestCase
{
    // Reflesh the database and re-run migration for every test case. 
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function setUp(): void
    {
        parent::setUp();

        // Create a folder data before executing test data. 
        $this->seed('FoldersTableSeeder');
    }

    public function test_deu_date_should_be_date()
    {
        $response = $this->post('/folders/1/tasks/create',[
            'title' => 'Sample task',
            'due_date' => 123, // Exception Error format
        ]);
        $response->assertSessionHasErrors([
            'due_date' => '期限日には,日付を入力してください．',
        ]);
    }

    public function test_due_date_should_not_be_past()
    {
        $response = $this->post('/folders/1/tasks/create',[
            'title' => 'Sample task',
            'due_date' => Carbon::yesterday()->format('Y/m/d'), // Exception Error before today
        ]);
        $response->assertSessionHasErrors([
            'due_date' => '期限日には,今日以降の日付を入力してください．',
        ]);
    }

    
}
