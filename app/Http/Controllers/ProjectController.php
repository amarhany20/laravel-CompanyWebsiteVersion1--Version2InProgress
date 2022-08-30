<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'admin-activated']);
    //     // $this->middleware('auth')->except();

    // }
    public function index()
    {
        $navProjects = Project::orderBy('created_at', 'desc')->take(6)->get();
        $types = Project::select('type')->distinct()->get();

        if (request()->has('type')) {
            $projects = Project::where('type', request('type'))->orderBy('created_at', 'desc')->paginate(10)->appends('type', request('type'));
        } else {
            $projects = Project::orderBy('created_at', 'desc')->paginate(10);
        }
        return view('home.projects.projects', compact("navProjects", "projects", "types"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.createprojects');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'title' => 'bail|required|min:5|max:75',
            'subTitle' => 'bail|required|min:5|max:100',
            'content' => 'max:3000',
            'type' => 'required|min:4|max:100',
            'images' => 'required',

        ]);
        $newImageName = time() . '-' . $request->title . '.' . $request->file('image')->extension();

        $project = new Project();
        $project->title = $request->input('title');
        $project->subTitle = $request->input('subTitle');
        $project->content = $request->input('content');
        $project->type = $request->input('type');
        $project->date = now();
        $project->main_image_path = $newImageName;
        $project->save();
        $request->image->move(public_path('images'), $newImageName);

        //adding images

        if ($request->has('images')) {
            $count = 0;
            foreach ($request->file('images') as $image) {
                $newImagesName = time() . '-' . $request->title . '-' . $count . '.' . $image->extension();
                $image->move(public_path('images'), $newImagesName);
                $count++;
                ProjectImages::create([
                    'image_path' => $newImagesName,
                    'projectID' => $project->id,
                ]);
            }
        }

        return redirect('admin/projects/menu')->with('status', 'Project has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $navProjects = Project::orderBy('created_at', 'desc')->take(6)->get();
        $project = Project::find($id);
        return view('home.projects.project', compact("navProjects", "project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($projectid)
    {
        $project = Project::find($projectid); // ->get maybe https://stackoverflow.com/questions/13697981/laravel-when-to-use-get
        return view('admin.projects.editprojects', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $projectid)
    {

        $request->validate([
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5048',
            'title' => 'bail|required|min:5|max:75',
            'subTitle' => 'bail|required|min:5|max:100',
            'content' => 'max:3000',
            'type' => 'required|min:4|max:100',
            'images' => 'nullable',
        ]);

        $project = Project::find($projectid);
        $project->title = $request->input('title');
        $project->subTitle = $request->input('subTitle');
        $project->content = $request->input('content');
        $project->type = $request->input('type');
        $project->date = now();

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->title . '.' . $request->file('image')->extension();
            $request->image->move(public_path('images'), $newImageName);
            if (File::exists('images/' . $project->main_image_path)) {
                File::delete('images/' . $project->main_image_path);
            }
            $project->main_image_path = $newImageName;
        }

        $project->save();

        if ($request->has('images')) {
            foreach ($project->images as $image) {
                if (File::exists('images/' . $image->image_path)) {
                    File::delete('images/' . $image->image_path);
                }
                $image->delete();

            }
            $count = 0;
            foreach ($request->file('images') as $image) {
                $newImagesName = time() . '-' . $request->title . '-' . $count . '.' . $image->extension();
                $image->move(public_path('images'), $newImagesName);
                $count++;
                ProjectImages::create([
                    'image_path' => $newImagesName,
                    'projectID' => $project->id,
                ]);
            }
        }

        return redirect('admin/projects/select')->with('status', 'Project has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($projectid)
    {
        $project = Project::findOrFail($projectid);
        if (File::exists('images/' . $project->main_image_path)) {
            File::delete('images/' . $project->main_image_path);
        }
        $project->delete();
        return redirect('admin/projects/select')->with('status', 'Project has been Deleted');
    }

    function list() {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('admin.projects.select', compact('projects'));
    }
}
