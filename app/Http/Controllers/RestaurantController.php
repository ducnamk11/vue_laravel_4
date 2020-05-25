<?php

namespace App\Http\Controllers;

use App\Services\RestoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index(RestoService $restoService)
    {
        $restos = $restoService->userRestoAndTables();
        return view('restos.resto-index', compact('restos'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'tables' => 'required',
        ]);
        return response(
            Auth::user()->restaurants()->create($request->all()),
            201
        );
    }
}
