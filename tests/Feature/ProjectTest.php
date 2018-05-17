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
    public function testStatus(){
        $response = $this->get('/project');

        $response->assertStatus(200);
    }

    public function testLookForH1(){
        $response = $this->get('/project');

        $response->assertSee(" Liste des projets");
        
    }
    public function testNameProject(){
        $response = $this->get('/project');

        $response->assertSee("Baptiste");

    }

//    public function testFactory(){
//        $factory = factory(Projet::class, 10)->make();
//        dump($factory);
//    }
}