<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $sis = Siswa::latest()->paginate(5);

        //render view with posts
        return view('siswa.index', compact('sis'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        // return('oke');
        //validate form
        // $this->validate($request, [
        //     'nama'     => 'required',
        //     'kelas'   => 'required'
        // ]);

        $siswa = new Siswa();
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->save();
        // print_r($siswa);die;



        //kode b
        // $siswa = [
        //     $siswa->nama = $request->nama,
        //     $siswa->kelas = $request->kelas,
        // ];
        // Siswa::create($siswa);

        //kode c
        //create post
        // Siswa::create([
        //     'nama'     => $request->nama,
        //     'kelas'   => $request->kelas
        // ]);

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(string $id)
    {
        $sis = Siswa::find($id);
        return view('siswa.edit', compact('sis'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, string $id)
    {
        //validate form
        // $this->validate($request, [
        //     'nama'     => 'required',
        //     'kelas'   => 'required'
        // ]);

        $sis = Siswa::find($id);
        $sis->nama = $request->nama;
        $sis->kelas = $request->kelas;
        $sis->save();
        // dd($re);


            //update post with new image
        //     $sis->update([
        //         'nama'     => $request->nama,
        //         'kelas'   => $request->kelas
        //     ]);

        //  {

        //     //update post without image
        //     $sis->update([
        //         'nama'     => $request->nama,
        //         'kelas'   => $request->kelas
        //     ]);
        // }

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
  /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy( $id)
    {
  //delete image
       

    
        //delete post
        $sis=Siswa::find($id);
        $sis->delete();

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}