<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests\EventTypeRequest;
use App\Models\EventType;
use App\Http\Controllers\Controller;

class EventTypesController extends Controller
{

    public function index()
    {
        $eventTypes = EventType::all();
        return view('admin.eventTypes.index', compact('eventTypes'));
    }

    public function create()
    {
        return view('admin.eventTypes.create');
    }

    public function store(EventTypeRequest $request)
    {
        $eventType = EventType::create($request->all());
        $eventType->save();
        return redirect(route('event-types.index'))->with('success', 'Event Created');
    }

    public function edit(EventType $eventType)
    {
        return view('admin.eventTypes.edit', compact('eventType'));
    }

    public function update(EventTypeRequest $request, EventType $eventType)
    {
        $eventType->update($request->all());
        return redirect(route('event-types.index'))->with('success', 'Event updated');
    }

    public function show(EventType $eventType)
    {
        return view('admin.eventTypes.show', compact('eventType'));
    }

    public function destroy($id)
    {
        $eventType = EventType::findOrFail($id);
        $eventType->delete();
        return redirect(route('event-types.index'))->with('success', 'Event deleted');
    }

}
