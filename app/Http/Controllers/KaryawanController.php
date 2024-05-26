<?php


namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;

use App\Export\TeacherXLS;
use App\Models\Karyawan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'posisi' => 'required',
            'tanggal_mulai' => 'required|date',
        ]);
        $karyawan = Karyawan::find($request->id);
        if ($karyawan === null) {
            abort(404);
        }
        $karyawan->nama = $request->nama;
        $karyawan->email = $request->email;
        $karyawan->posisi = $request->posisi;
        $karyawan->tanggal_mulai = $request->tanggal_mulai;
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
            'nama' => 'required',
            'email' => 'required|email',
            'posisi' => 'required',
            'tanggal_mulai' => 'required|date',
        ]);

        #sudah tervalidasi
        $karyawan = new Karyawan();
        $karyawan->nama = $request->nama;
        $karyawan->email = $request->email;
        $karyawan->posisi = $request->posisi;
        $karyawan->tanggal_mulai = $request->tanggal_mulai;
        $karyawan->save();
        return redirect(url('/karyawan'));

    }

    public function list()
    {
        $karyawan = Karyawan::paginate(10);

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
        return Excel::download(new KaryawanXLS(), 'karyawan_' . date('YmdHis') . '.xlsx');
    }

}

