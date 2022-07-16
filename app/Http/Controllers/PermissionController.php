<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $this->authorize('view', Permission::class);
        $permissions = Permission::get();
        return view('backend.pages.permission', compact('permissions'));
    }
}