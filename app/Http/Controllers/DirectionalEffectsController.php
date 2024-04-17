<?php

namespace App\Http\Controllers;

use App\Models\SubjectEffectsToDirectionalEffects;
use App\Models\DirectionalEffect;
use Illuminate\Http\Request;



class DirectionalEffectsController extends Controller
{
    public function read(Request $r) {
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        if (session()->get('user')) {
            // Zachowujemy listę wszystkich efektów kierunkowych
            $effects = DirectionalEffect::all();
    
            // Pobierz ID efektów kierunkowych powiązanych z danym subject_effects_id
            $directionalEffectsIds = SubjectEffectsToDirectionalEffects::where('subject_effects_id', $r->subject_effect_id)
                 ->pluck('directional_effects_id');
            
            // Pobierz tylko te efekty kierunkowe, które są przypisane do danego subject_effects_id
            $directional_linked_to_subject_effect = DirectionalEffect::whereIn('id', $directionalEffectsIds)
                ->get();
    
            return view("list-directional-effects-sylabus", [
                'email' => session()->get('user')['email'],
                'role' => session()->get('user')['role'],
                'department' => session()->get('user')['departmentSubjectContent'],
                'effects' => $effects, // Lista wszystkich efektów kierunkowych
                'code' => $r->code,
                'id' => $r->id,
                'subject_effect_id' => $r->subject_effect_id,
                'directionalEffectsIds' => $directionalEffectsIds,
                'directional_linked_to_subject_effect' => $directional_linked_to_subject_effect // Lista przefiltrowanych efektów kierunkowych
            ]);
            
        } else {
            return redirect()->back();
        }
    }
    

    public function span(Request $r) {
        $linker = new SubjectEffectsToDirectionalEffects();
        $linker->directional_effects_id = $r->directional_effect_id;
        $linker->subject_effects_id = $r->subject_effect_id;
        $linker->save();
        return redirect()->back();
    }

    public function unspan(Request $r) {
        SubjectEffectsToDirectionalEffects::where('directional_effects_id', $r->directional_effect_id)
        ->where('subject_effects_id', $r->subject_effect_id)
        ->delete();
        return redirect()->back();
    }
}
