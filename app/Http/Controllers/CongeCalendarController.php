<?php

namespace App\Http\Controllers;

use App\Models\Calendar as ModelsCalendar;
use App\Models\Conge;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CongeCalendarController extends Controller
{
    public function index()
    {
        $events = [];

        $conges = Conge::all();

        foreach ($conges as $conge) {
            $events[] = Calendar::create([
                'title' => $conge->employe->nom . ' ' . $conge->employe->prenom,
                'start_date' => $conge->debut,
                'end_date' => $conge->fin,
                'color' => '#f05050',
                'url' => route('conges.show', $conge->id),
            ]);
        }

        return view('form.conges.calendar', compact('events'));
    }
}
