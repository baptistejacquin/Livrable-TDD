<?php
/**
 * Created by PhpStorm.
 * User: baptiste.jacquin
 * Date: 16/05/2018
 * Time: 14:07
 */

namespace App\Http\Controllers;


use App\Projet;
use Mockery\Exception;

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
    public function create(){
        $user =\Auth::user();
        try {
            if ($user->can('create', Projet::class)){
                $newProject = new Projet();
                $newProject->title = "test";
                $newProject->author = "test";
                $newProject->description ="test";
                $newProject->user_id = 1;
                $newProject->save();
            }
        } catch (\Throwable $throwable){
         throw new Exception("nope");
        }
    }

    public function createView(){
        $user =\Auth::user();
        try {
            if ($user->can('create', Projet::class)){
                return "test";
            }
        } catch (\Throwable $throwable){
           return redirect()->route("project");
        }
    }
}