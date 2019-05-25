<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Image;

use App\Forms\ProjectForm;
use App\Project;
use App\Helpers\Role;

class ProjectController extends Controller
{
    use FormBuilderTrait;

    /**
     * 列表
     *
     */
    public function index()
    {
        $records = Project::latest()->get();

        return view('projects.projects', compact('records'));
    }

    /**
     * 新建
     *
     */
    public function create(Role $role)
    {
        if(!$role->admin()) abort(403);

        $form = $this->form(ProjectForm::class, [
            'method' => 'POST',
            'url' => '/projects/store'
        ]);

        $title = '发布项目';
        $icon = 'cube';

        return view('form', compact('form','title','icon'));
    }

    /**
     * 保存
     *
     */
    public function store(Request $request, Role $role)
    {
        if(!$role->admin()) abort(403);

        $record = Project::create($request->all());
        return view('img_projects', compact('record'));
    }


    /**
     * image store
     *
     */
    public function imgStore(Request $request, Role $role)
    {
        if(!$role->admin()) abort(403);
        
        $img = $request->file('avatar');
        $id = $request->id;
        // $extension = $img->getClientOriginalExtension();
        // Storage::disk('img')->put($id.'.'.$extension,  File::get($img));
        $exists = Project::find($id);
        if(!$exists) abort('404');

        $new_img = 'storage/app/img/project-'.$id.'-'.time().'.jpg';

        $image = Image::make($img)
                // ->insert('img/guntleson_mark.png')
                ->save($new_img, 90);

        if($exists->img) unlink($exists->img);

        $exists->update(['img' => $new_img]);

        echo '200';
    }

    /**
     * delete
     *
     */
    public function delete($id, Role $role)
    {
        if(!$role->admin()) abort(403);

        $exists = Project::find($id);
        if(!$exists) abort('404');

        if($exists->img) unlink($exists->img);

        $exists->delete();
        return redirect()->back();
    }
}















