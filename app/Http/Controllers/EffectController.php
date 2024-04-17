<?php

namespace App\Http\Controllers;

use App\Models\SylabusToEffect;
use App\Models\SubjectEffect;
use Illuminate\Http\Request;



class EffectController extends Controller
{
    
    public function read(Request $r) {
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        if (session()->get('user')) {   
            $groupBelongsToSubject = SylabusToEffect::where('sylabus_id', (int) $r->id)
                ->pluck('subject_effects_id')
                ->toArray();
            $effects = SubjectEffect::whereIn('id', $groupBelongsToSubject)->get();
            $ste = SylabusToEffect::all();
            // dd($groupBelongsToSubject);
            return view("effects-sylabus", [
                'email' =>              session()->get('user')['email'],
                'role' =>               session()->get('user')['role'],
                'department' =>         session()->get('user')['depSubjectContentartment'],
                'effects'=>             $effects,
                'code' =>               $r->code,
                'id' =>                 $r->id,
            ]);
            
        } else {
            return redirect()->back();
        }
    }

    public function add(Request $r) {
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        if (session()->get('user')) 
        {   
            $effects = SylabusToEffect::all();
            return view("add-effect-sylabus", [
                'email' =>              session()->get('user')['email'],
                'role' =>               session()->get('user')['role'],
                'department' =>         session()->get('user')['department'],
                'effect'=>              $effects,
                'code' =>               $r->code,
                'id' =>                 $r->id,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function create(Request $r) {      
        $data = $r->validate([
            'symbol' => 'required',
            'category_effects_id' => 'required',
            'description' => 'required',
        ]);
        $effect = new SubjectEffect($data);
        $effect->save();
        // Go to the next page and combine two id's in link table
        return redirect()->route('spanEffect', ['id' => $r->id, 'code' => $r->code, 'subject_effect_id' => $effect->id]);
    }

    public function span(Request $r) {
        $lastRecordId = SubjectEffect::orderBy('id', 'desc')->first()->id;
        $effect = new SylabusToEffect();
        $effect->sylabus_id = $r->id;
        $effect->subject_effects_id = $r->subject_effect_id;
        $effect->save();
        return redirect()->route('readEffect', ['id' => $r->id, 'code' => $r->code, 'flag'=>0]);
    }

    public function edit(Request $r) {
                
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        if (session()->get('user')) 
        {   
            $effect = SubjectEffect::find($r->id);
            return view("edit-effect-sylabus", [
                'email' =>              session()->get('user')['email'],
                'role' =>               session()->get('user')['role'],
                'department' =>         session()->get('user')['department'],
                'effect'=>              $effect,
                'id' =>                 $r->id,
                'code' =>               $r->code
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function detailed(Request $r) {
                
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        if (session()->get('user')) 
        {   
            $effects = SubjectEffect::find($r->id);
            $category = $effects->categories->name;
            return view("detailed-effect-sylabus", [
                'email' =>              session()->get('user')['email'],
                'role' =>               session()->get('user')['role'],
                'department' =>         session()->get('user')['department'],
                'effects'=>             $effects,
                'category'=>            $category,  
                'id' =>                 $r->id,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $r) {
        $data = $r->validate([
            'symbol' => 'required',
            'category_effects_id' => 'required',
            'description' => 'required',
        ]);
        $effect = SubjectEffect::find($r->id);
        $effect->symbol = $r->symbol;
        $effect->category_effects_id = $r->category_effects_id;
        $effect->description = $r->description;
        $effect->update();
        
        echo "<script>window.history.go(-2);</script>"; 
    }

    
    public function destroy(Request $r) {
        $effect = SubjectEffect::find($r->id);
        if ($effect) {
            $effect->delete();
            return redirect()->back();
        }
    }
}
