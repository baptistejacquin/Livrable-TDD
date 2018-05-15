<?php
/**
 * Created by PhpStorm.
 * User: baptiste.jacquin
 * Date: 15/05/2018
 * Time: 14:31
 */

namespace Tests\Feature;


use Tests\TestCase;

class ProjectTest extends TestCase
{
    public function testStatus(){
        $response = $this->get('/project');

        $response->assertStatus(200);
    }

    public function testLookForH1(){
        $response = $this->get('/project');

        $response->assertSee("<h1> Liste des projets </h1>");
    }
}