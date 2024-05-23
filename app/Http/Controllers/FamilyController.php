<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Parents;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function familyPage()
    {
        $user = \auth()->user();

        if ($user == null){
            redirect('/');
        }


        if ($user->selected_children_id === null) {
            // select first child if user has children
            $children = $user->children->first();
            if ($user->selected_children_id !== null) {
            $user->selected_children_id = $children->id;
            $user->save();
            }
        }

        $children_age_string = Child::find($user->selected_children_id);

        if ($children_age_string !== null) {
            $children_age_string = Child::find($user->selected_children_id)->getBirthday();
        }

        $parents = $user->parents;


        return view('pages.family',
            [
                'user' => $user,
                'children' => $user->children,
                'children_name'=> $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
                'children_age_string' => $children_age_string,
                'parents' => $parents,
            ]);
    }

    public function addChild(Request $request)
    {
        $child = new Child();
        $child->name = $request->child_name;
        $child->surname = $request->child_surname;
        $child->sex = $request->sex;
        $child->birthday = $request->birthday;
        $child->vagitnist_date = $request->vagitnist_date;
        $child->user_id = \auth()->id();
        $child->save();

        return redirect()->route('family.index');
    }

    public function selectChild($id)
    {
        $user = \auth()->user();
        $user->selected_children_id = $id;
        $user->save();

        return redirect()->route('family.index');
    }

//    public function deleteChild($id)
//    {
//        $child = Child::find($id);
//        $child->delete();
//
//        return redirect()->route('family.index');
//    }

    public function saveParents(Request $request)
    {
        $user = \auth()->user();

        $parents = $user->parents->first();

        $parent_1_first_name = $request->parent_1_first_name;
        $parent_1_last_name = $request->parent_1_last_name;
//        $parent_1_image = $request->parent_1_image;

        $parent_2_first_name = $request->parent_2_first_name;
        $parent_2_last_name = $request->parent_2_last_name;
//        $parent_2_image = $request->parent_2_image;

        if ($parents !== null){
            $parents->parent_1_first_name = $parent_1_first_name;
            $parents->parent_1_last_name = $parent_1_last_name;

            $parents->parent_1_image = $request->file('parent_1_image') ? $request->file('parent_1_image')->store('parent_images', 'public') : 'parent_images/parent-avatar.png';

            $parents->parent_2_first_name = $parent_2_first_name;
            $parents->parent_2_last_name = $parent_2_last_name;
            $parents->parent_2_image = $request->file('parent_2_image') ? $request->file('parent_2_image')->store('parent_images', 'public') : 'parent_images/parent-avatar.png';

            $parents->save();
        } else{
            $parents = new Parents();
            $parents->user_id = $user->id;
            $parents->parent_1_first_name = $parent_1_first_name;
            $parents->parent_1_last_name = $parent_1_last_name;
            $parents->parent_1_image = $request->file('parent_1_image') ? $request->file('parent_1_image')->store('parent_images', 'public') : 'parent_images/parent-avatar.png';
            $parents->parent_2_first_name = $parent_2_first_name;
            $parents->parent_2_last_name = $parent_2_last_name;
            $parents->parent_2_image = $request->file('parent_2_image') ? $request->file('parent_2_image')->store('parent_images', 'public') : 'parent_images/parent-avatar.png';
            $parents->save();
        }

        return redirect()->route('family.index');
    }
}

