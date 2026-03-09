<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Table;

class AdminController extends Controller
{
    //

    public function getAdminPanel() {
        if (!Auth::check() || Auth::user()->email !== 'admin2@admin.com') {
            return redirect('/');
        }

        $tables = Table::all();
        return view('admin-view')->with('tables', $tables);
    }

    public function getAddTableView() {
        if (!Auth::check() || Auth::user()->email !== 'admin2@admin.com') {
            return redirect('/');
        }

        return view('add-table');
    }
}
