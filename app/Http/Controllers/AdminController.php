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

        $aforo_total =  $tables->sum('persons_number');
        $aforo_ocupado = $tables->where('booked', true)->sum('persons_number');
        $aforo_disponible = $aforo_total-$aforo_ocupado;

        $porcentage = intval(($aforo_disponible*100)/$aforo_total);
        
        return view('admin-view')->with('tables', $tables)->with('aforo_total', $aforo_total)->with('aforo_disponible', $aforo_disponible)->with('porcentage', $porcentage);
    }

    public function getAddTableView() {
        if (!Auth::check() || Auth::user()->email !== 'admin2@admin.com') {
            return redirect('/');
        }

        return view('add-table');
    }
    public function setAddTable(Request $request) {
        $datos = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'persons_number' => ['required', 'integer', 'min:1']
        ]);

        Table::create($datos);

        return back()->with('success', 'Mesa creada correctamente');
    }

    public function getEditTableView($id) {
        $table = Table::findOrFail($id);
        return view('edit-table')->with('table', $table);
    }
    public function setEditTable(Request $request, $id) {
        if (!Auth::check() || Auth::user()->email !== 'admin2@admin.com') {
            return redirect('/');
        }

        $datos = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'persons_number' => ['required', 'integer', 'min:1']
        ]);

        $table = Table::findOrFail($id);
        $table->update($datos);

        return back()->with('success', 'Mesa editada correctamente');
    }

    public function setDeleteTable(Request $request, $id) {
        $table = Table::findOrFail($id);
        $table->delete();

        return back();
    }
}
