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

    public function testProjectNameDetail()
    {
        factory(Projet::class, 10)->create();
        $projet = Projet::all()->random();
        $url = '/project/' . $projet->id;
        $response = $this->get($url);
        $response->assertSee($projet->title);
    }
}