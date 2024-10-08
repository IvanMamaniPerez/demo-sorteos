<?php

namespace App\Http\Controllers;

class EventController extends Controller
{
    public function create()
    {
        return view('events.pages.create');
    }

    public function index()
    {
        return view('events.pages.index');
    }

    public function explore()
    {
        return view('events.pages.explore');
    }

    public function exploreWinners()
    {
        return view('events.pages.explore-winners');
    }

    public function exploreGuaranteed()
    {
        return view('events.pages.explore-guaranteeds');
    }
}
