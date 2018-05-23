<?php
/**
 * Created by PhpStorm.
 * User: baptiste.jacquin
 * Date: 15/05/2018
 * Time: 14:31
 */

namespace Tests\Feature;


use App\Projet;
use App\User;
use Tests\TestCase;
use Mockery\Exception;

class ProjectTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    public function testStatus()
    {
        $response = $this->get('/project');

        $response->assertStatus(200);
    }

    public function testLookForH1()
    {
        $response = $this->get('/project');

        $response->assertSee(" Liste des projets");

    }
    public function testNameProject(){
        factory(Projet::class, 10)->create();
        $projet = Projet::all()->random();
        $url = '/project';
        $response = $this->get($url);
        $response->assertSee($projet->title);
    }

    public function testRelationModel(){
        factory(Projet::class)->create();
        $testedProject = Projet::all()->first();
        $testedUser = $testedProject->user;
        $this->assertInstanceOf(User::class, $testedUser);
    }

    public function testProjectNameDetail()
    {
        factory(Projet::class, 10)->create();
        $projet = Projet::all()->random();
        $url = '/project/' . $projet->id;
        $response = $this->get($url);
        $response->assertSee($projet->title);
    }

    public function testAuth(){
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->post('/create',["title"=>"test","author"=>"test","description"=>"test","user_id"=>$user->id]);
        $response->assertStatus(200);
        $projet = Projet::all()->first();
        $this->assertEquals($projet->user_id,$user->id);
    }

    public function testPostWithOutLog(){
        $this->expectException(Exception::class);
        $this->post('/create',["title"=>"test","author"=>"test","description"=>"test","user_id"=>1]);
    }

    public function testFormWithOutLog(){
//        $this->expectException(Exception::class);
        $url ="/createProject";
        $response = $this->get($url);
        $response->assertRedirect('/project');

    }

    public function testFormWithLog(){
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get('/createProject');
        $response->assertStatus(200);

    }
}