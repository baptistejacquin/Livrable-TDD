<?php
/**
 * Created by PhpStorm.
 * User: baptiste.jacquin
 * Date: 16/05/2018
 * Time: 14:07
 */

namespace App\Http\Controllers;


use App\Projet;

class ProjectController
{
    public function index(){
        $projects = Projet::select()->get();
        return view("project", compact("projects"));
    }

    public function detail($id){
        $detail = Projet::where("id",$id)->get()->first();
        return view("projectDetail", compact("detail"));
    }
}