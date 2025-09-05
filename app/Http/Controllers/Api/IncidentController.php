<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Incident; // ✅ important
use App\Http\Requests\StoreIncidentRequest; // ✅ si tu l’as créé
use App\Http\Requests\UpdateStatusRequest;
class IncidentController extends Controller
{
public function index(Request $request)
{
$incidents = Incident::query()->paginate(15);
return response()->json($incidents);
}


public function show($id)
{
$incident = Incident::findOrFail($id);
return response()->json($incident);
}


public function store(StoreIncidentRequest $request)
{
$data = $request->only(['contract_id','date','description','location']);
$data['status'] = 'ouvert';
$incident = Incident::create($data);
return response()->json($incident, 201);
}


public function updateStatus(UpdateStatusRequest $request, $id)
{
$incident = Incident::findOrFail($id);
$newStatus = $request->input('status');


if (! $incident->canTransitionTo($newStatus)) {
return response()->json([
'message' => "Transition de {$incident->status} vers {$newStatus} non autorisée"
], 422);
}


$incident->status = $newStatus;
$incident->save();


return response()->json($incident);
}


// optionnel: supprimer, modifier description, etc.
}
