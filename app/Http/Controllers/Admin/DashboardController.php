<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Database\Eloquent\SoftDeletes;

class DashboardController extends Controller
{
    //
    
        //
        public function index(){
            $data = [
                "projects" => Project::all(),
            ]; 
            return view('portfolio.index', $data);
        }
        public function indexLight(){
            $data = [
                "projects" => Project::all(),
            ]; 
            return view('portfolio.homepage', $data);
        }
    
        public function show($id)
        {
            $project = Project::findOrFail($id);
            // $comic = Comic::findOrFail($id);
            return view('portfolio.show', ["project" => $project]);
        }
        public function create()
        {
            return view("portfolio.create");
        }
    
        public function store(Request $request)
        {
            $data = $request->validate([
                "titolo" => "required|string",
                "descrizione" => "required|string",
                "link_git_hub" => "nullable|string",
            ]);
    
            $newProject = new Project();
    
            $newProject->fill($data);
    
            $newProject->save();
    
            return redirect()->route('home.index', $newProject);
        }
    
        public function destroy($id){
            $project = Project::findOrFail($id);
    
            $project->delete();
            return redirect()->route("home.index");
        }

        public function edit($id)
        {
            $project = Project::findOrFail($id);
            return view("portfolio.edit", ["project" => $project]);
        }

        public function update(Request $request, $id)
        {
            $project = Project::findOrFail($id);
            $data = $request->validate([
                "titolo" => "required|string",
                "descrizione" => "required|string",
                "link_git_hub" => "nullable|string",
            ]);
            $project->update($data);
    
            return redirect()->route('portfolio.show', $project->id);
        }
}
