<?php

namespace App\Http\Controllers;

use App\Models\Motor;

use Illuminate\view\View;
use Illuminate\Http\Request;

//insert data

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
class MotorController extends Controller
{
    public function index(Request $request): View
    {
        $pagination = 5;
        //get motors
        $motors = Motor::orderBy('id', 'ASC')->simplePaginate($pagination);

        //render view with motors
        return view('motors.index', compact('motors'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create():View{
        return view('motors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validasi data
        $this->validate($request, [
            // 'id' => 'required',
            'NamaMotor' => 'required',
            'PlatNomor' => 'required',
            'HargaMotor' => 'required'
        ]);

        //create data
        Motor::create([
            // 'id' => $request->id,
            'NamaMotor' => $request->NamaMotor,
            'PlatNomor' => $request->PlatNomor,
            'HargaMotor' => $request->HargaMotor
        ]);

        return redirect()->route('motors.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        //get motor by ID
        $motor = motor::findOrFail($id);

        //render view with motor
        return view('motors.edit', compact('motor'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'NamaMotor' => 'required',
            'PlatNomor' => 'required',
            'HargaMotor' => 'required'
        ]);

        //get motor by ID
        $motor = Motor::findOrFail($id);

        $motor->update([
            'NamaMotor' => $request->NamaMotor,
            'PlatNomor' => $request->PlatNomor,
            'HargaMotor' => $request->HargaMotor
        ]);
        
        //redirect to index
        return redirect()->route('motors.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get motor by ID
        $motor = motor::findOrFail($id);

        //delete motor
        $motor->delete();

        //redirect to index
        return redirect()->route('motors.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
