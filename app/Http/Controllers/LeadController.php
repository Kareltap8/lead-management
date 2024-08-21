<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Status;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::with('status')->get(); // Загружаем статус лида
        $statuses = Status::all(); // Получаем все статусы

        // Получаем количество лидов по статусам
        $statusCounts = Lead::with('status')
            ->selectRaw('status_id, count(*) as count')
            ->groupBy('status_id')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->status_id => $item->count];
            });

        return view('leads.leads', [
            'leads' => $leads,
            'statuses' => $statuses,
            'statusCounts' => $statusCounts,
        ]);
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        $validatedData['status_id'] = 1;
        $lead = Lead::create($validatedData);

        return redirect()->route('leads.index')->with('success', 'Лид успешно добавлен!');
    }

    public function edit(Lead $lead)
    {
        $statuses = Status::all(); 
        return view('leads.lead-edit', compact('lead', 'statuses')); 
    }

    public function update(Request $request, Lead $lead)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'status_id' => 'required|integer',
        ]);

        $lead->update($validatedData);

        return redirect()->route('leads.index')->with('success', 'Лид успешно обновлен!');
    }

    
    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()->route('leads.index')->with('success', 'Лид успешно удален!');
    }
}
