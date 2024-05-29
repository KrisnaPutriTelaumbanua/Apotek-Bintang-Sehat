<?php


namespace App\Http\Controllers;

use App\Export\KaryawanXLS;
use App\Models\Karyawan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'posisi'=>'required',
            'dob' => 'required|date,|before:' . Carbon::now()->addDay()->format('Y-m-d') . '',
        ]);
        $karyawan = Karyawan::find($request->id);
        if ($karyawan === null) {
            abort(404);
        }
        $karyawan->name = $request->name;
        $karyawan->email = $request->email;
        $karyawan->posisi = $request->posisi;
        $karyawan->dob = $request->dob;
        $karyawan->save();
        return redirect(url('/karyawan'));
    }

    public function edit(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);
        if ($karyawan === null) {
            abort(404);
        }
        return view('content.karyawan.edit', [
            'karyawan' => $karyawan
        ]);
    }

    public function delete(Request $request)
    {
        $idKaryawan = $request->id;
        $karyawan = Karyawan::find($idKaryawan);
        if ($karyawan === null) {
            return response()->json([], 404);
        }
        $karyawan->delete();
        return response()->json([], 200);
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'posisi'=>'required',
            'dob' => 'required|date|before:' . Carbon::now()->addDay()->format('Y-m-d') . '',
        ]);
        #sudah tervalidasi
        $karyawan = new Karyawan();
        $karyawan->name = $request->name;
        $karyawan->email = $request->email;
        $karyawan->posisi = $request->posisi;
        $karyawan->dob = $request->dob;
        $karyawan->save();
        return redirect(url('/karyawan'));

    }

    public function list()
    {
        $karyawan = Karyawan::query()->paginate(10);
        return view('content.karyawan.list', [
            'karyawan' => $karyawan
        ]);
    }

    public function add()
    {
        return view('content.karyawan.add');
    }

    public function excel()
    {
        return Excel::download(new karyawanXLS(), 'karyawan_' . date('YmdHis') . '.xlsx');
    }

}

