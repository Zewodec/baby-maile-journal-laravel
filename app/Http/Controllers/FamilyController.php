<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Parents;
use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function familyPage()
    {
        $user = \auth()->user();

        if ($user == null) {
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
                'children_name' => $user->children->where('id', $user->selected_children_id)->first()->name ?? null,
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
        $child->user_id = \auth()->id();
        $child->save();


        $pology_date = $request->birthday;
        $data_zachatya = $request->vagitnist_date;

        if ($data_zachatya !== null) {
            $start_last_menstruation = Carbon::parse($data_zachatya)->addDay(14)->format('Y-m-d');
            $alusherskiy_termin = Carbon::parse($data_zachatya)->addDay(280)->format('Y-m-d');
        } else if ($pology_date !== null) {
            $start_last_menstruation = Carbon::parse($pology_date)->addMonth(3)->subDay(7)->subYear(1)->format('Y-m-d');
            $alusherskiy_termin = Carbon::parse($pology_date)->addDay(280)->format('Y-m-d');
        }


        $settings = new Settings([
            'user_id' => \auth()->id(),
            'child_id' => $child->id,
            'start_last_menstruation' => $start_last_menstruation ?? null,
            'pology_date' => $pology_date ?? null,
            'alusherskiy_termin' => $alusherskiy_termin ?? null,
            'data_zachatya' => $data_zachatya ?? null,
        ]);


        return redirect()->route('family.index');
    }

    public function saveChildInfo(Request $request)
    {
        $child_name = $request->child_name;
        $child_surname = $request->child_surname;
        $child_birthday = $request->child_birthday;
        $child_sex = $request->child_sex;
        $child_id = $request->child_id;
//        child_image

        $child = Child::find($child_id);

        if ($child !== null) {
            $child->name = $child_name;
            $child->surname = $child_surname;
            $child->sex = $child_sex;

            if ($request->file('child_image')) {
                $child->child_image = $request->file('child_image')->store('child_images', 'public');
            }

            $child_settings = $child->settings;
            if (isset($child_settings)) {
                $child_settings->pology_date = $child_birthday;
                $child_settings->save();
            } else{
                $child_settings = new Settings();
                $child_settings->child_id = $child_id;
                $child_settings->user_id = \auth()->id();
                $child_settings->pology_date = $child_birthday;
                $child_settings->save();

            }
            $child->save();
        }

        return redirect()->route('family.index');
    }

    public function selectChild($id)
    {
        $user = \auth()->user();
        $user->selected_children_id = $id;
        $user->save();

        return redirect()->route('family.index');
    }

    public function deleteChild($child_id)
    {
        $child = Child::find($child_id);

        $child->delete();

        return redirect()->route('family.index');
    }

    public function saveParents(Request $request)
    {
        $user = \auth()->user();

        $parent_1_first_name = $request->parent_1_first_name;
        $parent_1_last_name = $request->parent_1_last_name;
//        $parent_1_image = $request->parent_1_image;

        $parent_2_first_name = $request->parent_2_first_name;
        $parent_2_last_name = $request->parent_2_last_name;
//        $parent_2_image = $request->parent_2_image;

        $parents = $user->parents;

        if ($parents !== null) {
            $parents = $parents->where('user_id', $user->id);
            $parents = $parents->first();
            $parents->parent_1_first_name = $parent_1_first_name;
            $parents->parent_1_last_name = $parent_1_last_name;

            if ($request->file('parent_1_image')) {
                $parents->parent_1_image = $request->file('parent_1_image')->store('parent_images', 'public');
            }

            $parents->parent_2_first_name = $parent_2_first_name;
            $parents->parent_2_last_name = $parent_2_last_name;
            if ($request->file('parent_2_image')) {
                $parents->parent_2_image = $request->file('parent_2_image')->store('parent_images', 'public');
            }

            $parents->save();
        } else {
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

