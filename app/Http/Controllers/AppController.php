<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App;

class AppController extends Controller
{
    public function show(App $app)
    {
        $this->authorize('view', $app);

        return view('app')->with([
            'app' => $app,
        ]);
    }
}
