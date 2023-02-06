<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Note;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events =Event::latest()
        ->where('name', 'LIKE', "%$request->name%")
        ->get();

         return Inertia::render('Events/Index',
            [
                'events'=>$events
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Events/Create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate(
            [
                'name'=>'required',
                'slug'=>'required|unique:events,slug',
                'description'=>'required',


            ]
        );


        $event= new Event();
        $event->name=$request->name;
        $event->slug=$request->slug;
        $event->description=$request->description;


        if($event->save()){
            return redirect()->route('events.edit',$event->id);

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return Inertia::render('Events/Show',compact('event'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return Inertia::render('Events/Edit',compact('event'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

        $request->validate(
            [
                'name'=>'required',
                'slug'=>'required|unique:events,slug',
                'description'=>'required',


            ]
        );

        // $event->update($request->all());

        $event->name=$request->name;
        $event->slug=$request->slug;
        $event->description=$request->description;


        if($event->update()){
            return redirect()->route('events.index');

        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('status','Event deleted');
    }
}
