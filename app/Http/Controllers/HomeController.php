<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlbumModel;
use App\BannerModel;
use App\BeritaModel;
use App\DataGuruModel;
use App\KataSambutanModel;
use App\LinkModel;
use App\ProfilModel;
use App\SaranaDanPrasaranaModel;
use App\user;
use App\HeaderModel;
use App\GaleryModel;
use App\VisidanMisiModel;
use Session; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.pages.index');
    }

    public function getuser()
    {
        return view('auth.pages.edituser');
    }
    public function upuser(Request $r, $id)
    {
        $up = User::find($id);
        $up->name = $r->name;
        $up->email = $r->email;

        if($r->password == "")
        {
            $up->password = $up->password;
        }
        else
        {
            $up->password =  bcrypt($r->password) ;
        }
        $up->update();
        if($up)
        {
            Session::flash('sukses','Data Berhasil  Di Update!');
        }
        else
        {
            Session::flash('gagal','Data Gagal Di Update!');
        }
        


        return back();
    }
    
//=================get====================//
    public function dinam($id)
    {
        $url = $_SERVER['REQUEST_URI'];
        if($url == '/home/berita')
        {
            $tampil = BeritaModel::orderBy('id','desc')->get();
            return view('auth.pages.berita', compact('template','tampil'));
        }
        elseif($url == '/home/profil')
        {
            $tampil = ProfilModel::first();
             return view('auth.pages.profil', compact('tampil'));
        }
        elseif($url == '/home/visidanmisi')
        {
            $tampil = VisidanMisiModel::first();
             return view('auth.pages.visidanmisi', compact('tampil'));
        }
        elseif($url == '/home/saranadanprasarana')
        {
            $tampil = SaranaDanPrasaranaModel::first();
             return view('auth.pages.saranadanprasarana', compact('tampil'));
        }
        elseif($url == '/home/banner')
        {
            $tampil = BannerModel::orderBy('id','desc')->get();
             return view('auth.pages.banner', compact('tampil'));
        }
        elseif($url == '/home/link')
        {
            $tampil = LinkModel::orderBy('id','desc')->get();
             return view('auth.pages.link', compact('tampil'));
        }
        elseif($url == '/home/galery')
        {
            $tampil = AlbumModel::orderBy('id','desc')->get();
             return view('auth.pages.galery', compact('tampil'));
        }
        elseif($url == '/home/katasambutan')
        {
            $tampil = KataSambutanModel::first();
             return view('auth.pages.katasambutan', compact('tampil'));
        }
        elseif($url == '/home/dataguru')
        {
            $tampil = DataGuruModel::where('level','0')->orderBy('id','desc')->get();
             return view('auth.pages.dataguru', compact('tampil'));
        }
        elseif($url == '/home/datastaf')
        {
             $tampil = DataGuruModel::where('level','1')->orderBy('id','desc')->get();
             return view('auth.pages.datastaf', compact('tampil'));
        }
        elseif($url == '/home/album')
        {
            $tampil = BeritaModel::orderBy('id','desc')->get();
             return view('auth.pages.album', compact('tampil'));
        }
         elseif($url == '/home/header')
        {
            $tampil = HeaderModel::orderBy('id','desc')->get();
             return view('auth.pages.header', compact('tampil'));
        }
         
        else{
            abort(404);
        }
        
       
    }

//===============detail============//
    public function detail($slug)
    {
        $cktampil = AlbumModel::where('slug',$slug)->first();
        $tampil = GaleryModel::where('id_album',$cktampil->id)->orderBy('id','desc')->get();

       // dd($tampil);
        return view('auth.pages.detail',compact('tampil'));
    }
    public function dldetail($id)
    {
        //$cktampil = AlbumModel::where('slug',$slug)->first();
        $tampil = GaleryModel::find($id);
        $target = 'upload/galery/'.$tampil->file;
        unlink($target);
        $tampil->delete();
        if($tampil)
        {
           Session::flash('sukses','Data Berhasil Dihapus!'); 
        }
        else{
            Session::flash('gagal','Data Gagal Dihapus!'); 
        }
       // dd($tampil);
        return back();
    }


//============save===========//
    public function svdinam(Request $r)
    {
        $url = $_SERVER['REQUEST_URI'];
        if($url == '/home/berita')
        {
            if(@count($r->file('fotoheader')) > 0){

            $r->validate([
                'judul' => 'required|max:255',
                'deskripsi' => 'required|max:255',
                'isi' => 'required',
                'fotoheader' => 'required|mimes:jpeg,bmp,png,jpg|max:1024',
            ]);


            $slimit = str_limit($r->judul,'20');
            $sslug = str_slug($slimit,'_');
            $file = $r->file('fotoheader');
            //dd($file);
            $ext = $file->getClientOriginalExtension();
            $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
            $file->move('upload/fotoberita',$namafile);

            $input = new BeritaModel();
            $input->judul = $r->judul;
            $input->slug = str_slug($r->judul);
            $input->deskripsi = $r->deskripsi;
            $input->isi = $r->isi;
            $input->fotoheader = $namafile;
            $input->status = 'Y';
            $input->popular = 0;
            $input->save();
        }else{

            $r->validate([
                'judul' => 'required|max:255',
                'deskripsi' => 'required|max:255',
                'isi' => 'required',
            ]);


            $input = new BeritaModel();
            $input->judul = $r->judul;
            $input->slug = str_slug($r->judul);
            $input->deskripsi = $r->deskripsi;
            $input->isi = $r->isi;
            $input->fotoheader = '0';
            $input->status = 'Y';
            $input->popular = 0;
            $input->save();
        }
            if($input)
            {
               Session::flash('sukses','Data Berhasil Disimpan!'); 
            }
            else{
                Session::flash('gagal','Data Gagal Disimpan!'); 
            }
            
            return back();
        }
        elseif($url == '/home/profil')
        {
            $r->validate([
                'profil' => 'required'
            ]);
             $input = $r->all();
             $profil = ProfilModel::create($input);
             if($profil)
             {
               Session::flash('sukses','Data Berhasil Disimpan!'); 
            }
            else{
                Session::flash('gagal','Data Gagal Disimpan!'); 
            }

             return back();
        }
        elseif($url == '/home/visidanmisi')
        {
            $r->validate([
                'visidanmisi' => 'required'
            ]);
             $input = $r->all();
             $profil = VisidanMisiModel::create($input);
             if($profil)
             {
               Session::flash('sukses','Data Berhasil Disimpan!'); 
            }
            else{
                Session::flash('gagal','Data Gagal Disimpan!'); 
            }

             return back();
        }
        elseif($url == '/home/saranadanprasarana')
        {
            $r->validate([
                'saranadanprasarana' => 'required'
            ]);
             $input = $r->all();
             $SaranaDanPrasaranaModel = SaranaDanPrasaranaModel::create($input);
             if($SaranaDanPrasaranaModel)
             {
               Session::flash('sukses','Data Berhasil Disimpan!'); 
            }
            else{
                Session::flash('gagal','Data Gagal Disimpan!'); 
            }
            
             return back();
        }
        elseif($url == '/home/banner')
        {
            $r->validate([
                'title' => 'required|max:191',
                'link' => 'required|max:191',
                'imgbanner' => 'required|mimes:jpeg,bmp,png,jpg|max:1024',
            ]);

            $slimit = str_limit($r->title,'20');
            $sslug = str_slug($slimit,'_');
            $file = $r->file('imgbanner');
            //dd($file);
            $ext = $file->getClientOriginalExtension();
            $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
            $file->move('upload/banner',$namafile);

            $input = new BannerModel();
            $input->title = $r->title;
            $input->link = $r->link;
            $input->imgbanner = $namafile;
            $input->status = 'Y';
            $input->save();
            if($input)
             {
               Session::flash('sukses','Data Berhasil Disimpan!'); 
            }
            else{
                Session::flash('gagal','Data Gagal Disimpan!'); 
            }
            
             return back();
        }
        elseif($url == '/home/link')
        {
            $r->validate([
                'title' => 'required|max:191',
                'link' => 'required|max:191',
            ]);


             $input = $r->all();
             $link = LinkModel::create($input);
             if($link)
             {
               Session::flash('sukses','Data Berhasil Disimpan!'); 
            }
            else{
                Session::flash('gagal','Data Gagal Disimpan!'); 
            }
            
             return back();
        }
        elseif($url == '/home/galery')
        {
            $r->validate([
                'judul' => 'required|max:191',
                'tanggal' => 'required|max:191',
                
            ]);
             $input = new AlbumModel();
             $input->judul = $r->judul;
             $input->slug = str_slug($r->judul);
             $input->tanggal = $r->tanggal;
             $input->status = 'Y';
             $input->save();
             if($input)
             {
               Session::flash('sukses','Data Berhasil Disimpan!'); 
            }
            else{
                Session::flash('gagal','Data gagal Disimpan!'); 
            }
             return back();
        }
        elseif($url == '/home/katasambutan')
        {
             $r->validate([
                'nama' => 'required|max:191',
                'katasambutan' => 'required',
                'foto' => 'required|mimes:jpeg,bmp,png,jpg|max:1024',
            ]);

            $slimit = str_limit($r->nama,'20');
            $sslug = str_slug($slimit,'_');
            $file = $r->file('foto');
            //dd($file);
            $ext = $file->getClientOriginalExtension();
            $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
            $file->move('upload/fotokepalasekolah',$namafile);

             $input = new KataSambutanModel();
             $input->nama = $r->nama;
             $input->katasambutan = $r->katasambutan;
             $input->jabatan = 'Kepala Sekolah';
             $input->foto = $namafile;
             $input->save();
             if($input)
             {
               Session::flash('sukses','Data Berhasil Disimpan!'); 
            }
            else{
                Session::flash('gagal','Data gagal Disimpan!'); 
            }
             return back();
        }
        elseif($url == '/home/header')
        {
            $r->validate([
                'title' => 'required|max:191',
                'foto' => 'required|mimes:jpeg,bmp,png,jpg|max:1024',
            ]);
            $slimit = str_limit($r->title,'20');
            $sslug = str_slug($slimit,'_');
            $file = $r->file('foto');
            //dd($file);
            $ext = $file->getClientOriginalExtension();
            $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
            $file->move('upload/header',$namafile);

             $input = new HeaderModel();
             $input->title = $r->title;
             $input->foto = $namafile;
             $input->save();
             if($input)
             {
               Session::flash('sukses','Data Berhasil Disimpan!'); 
            }
            else{
                Session::flash('gagal','Data gagal Disimpan!'); 
            }
             return back();
        }
         elseif($url == '/home/datagurudanstaf')
        {
            $r->validate([
                'nama' => 'required|max:191',
                'tempat' => 'required|max:191',
                'tgllahir' => 'required|max:191',
                'alamat' => 'required',
                'nohp' => 'required|max:191|numeric',
                'foto' => 'required|mimes:jpeg,bmp,png,jpg|max:1024',
            ]);


            $slimit = str_limit($r->nama,'20');
            $sslug = str_slug($slimit,'_');
            $file = $r->file('foto');
            //dd($file);
            $ext = $file->getClientOriginalExtension();
            $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
            $file->move('upload/datagurudanstaf',$namafile);

             $input = new DataGuruModel();
             $input->nama = $r->nama;
             $input->slug = str_slug($r->nama);
             $input->tempat = $r->tempat;
             $input->tgllahir = $r->tgllahir;
             $input->alamat = $r->alamat;
             $input->nohp = $r->nohp;
             $input->level = $r->level;
             $input->foto = $namafile;
             $input->save();
             if($input)
             {
               Session::flash('sukses','Data Berhasil Disimpan!'); 
            }
            else{
                Session::flash('gagal','Data gagal Disimpan!'); 
            }
             return back();
        }
        //  elseif($url == '/home/foto')
        // {
        //     $slimit = str_limit($r->title,'20');
        //     $sslug = str_slug($slimit,'_');
        //     $file = $r->file('foto');
        //     //dd($file);
        //     $ext = $file->getClientOriginalExtension();
        //     $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
        //     $file->move('upload/galery',$namafile);

        //      $input = new DataGuruModel();
        //      $input->title = $r->title;
        //      $input->id_album = $r->id_album;
        //      $input->foto = $namafile;
        //      $input->save();
        //      if($input)
        //      {
        //        Session::flash('sukses','Data Berhasil Disimpan!'); 
        //     }
        //     else{
        //         Session::flash('gagal','Data gagal Disimpan!'); 
        //     }
        //      return back();
        // }
        elseif($url == '/home/sgalery')
        {
            $slimit = str_limit($r->title,'20');
            $sslug = str_slug($slimit,'_');
            
            if($r->type == '1')
            {
                $r->validate([
                    'title' => 'required|max:191',
                    'idalbum' => 'required|max:191',
                    'file' => 'required|mimetypes:video/mp4,|max:512000',
                ]);

                $file = $r->file('file');
                //dd($file);
                $ext = $file->getClientOriginalExtension();

                $namafile = "VDO_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
            }
            elseif($r->type == '0'){

                $r->validate([
                    'title' => 'required|max:191',
                    'idalbum' => 'required|max:191',
                    'foto' => 'required|mimes:jpeg,bmp,png,jpg|max:1024',
                ]);

                $file = $r->file('file');
                //dd($file);
                $ext = $file->getClientOriginalExtension();

                $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
            }
            $file->move('upload/galery',$namafile);

             $input = new GaleryModel();
             $input->title = $r->title;
             $input->slug = str_slug($r->title);
             $input->id_album = $r->idalbum;
             $input->type = $r->type;
             $input->file = $namafile;
             $input->save();
             if($input)
             {
               Session::flash('sukses','Data Berhasil Disimpan!'); 
            }
            else{
                Session::flash('gagal','Data gagal Disimpan!'); 
            }
             return back();
        }
        else{
            return redirect('/home');
        }
        
       
    }

//============update==============//
     public function updinam(Request $r,$link,$id)
    {
        $url = $_SERVER['REQUEST_URI'];
        
        if($url == '/home/upheader/'.$id)
        {
            $input = HeaderModel::find($id);
            $input->title = $r->title;
            if(@count($r->file('foto')) > 0)
            {
            $target = 'upload/header/'.$input->foto;
            unlink($target);
           $slimit = str_limit($r->title,'20');
            $sslug = str_slug($slimit,'_');
            $file = $r->file('foto');
            //dd($file);
            $ext = $file->getClientOriginalExtension();
            $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
            $file->move('upload/header',$namafile);
             $input->foto = $namafile;
         }else{
            $input->foto = $input->foto;
         }
             $input->update();
             if($input)
             {
               Session::flash('sukses','Data Berhasil DiUpdate!'); 
            }
            else{
                Session::flash('gagal','Data gagal DiUpdateDiUpdate!'); 
            }
             return back();
        }

        elseif($url == '/home/upberita/'.$id)
        {
            $input =  BeritaModel::find($id);
            $input->judul = $r->judul;
            $input->slug = str_slug($r->judul);
            $input->deskripsi = $r->deskripsi;
            $input->isi = $r->isi;

            if(@count($r->file('fotoheader')) > 0){
                if($input->fotoheader != '0'){
                $target = 'upload/fotoberita/'.$input->fotoheader;
                unlink($target);
                }
            $slimit = str_limit($r->judul,'20');
            $sslug = str_slug($slimit,'_');
            $file = $r->file('fotoheader');
            //dd($file);
            $ext = $file->getClientOriginalExtension();
            $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
            $file->move('upload/fotoberita',$namafile);
            $input->fotoheader = $namafile;
            }else{
                $input->fotoheader = $input->fotoheader;   
            }
            $input->status = $input->status;
            $input->popular =  $input->popular;
            $input->update();
            if($input)
            {
               Session::flash('sukses','Data Berhasil DiUpdate!'); 
            }
            else{
                Session::flash('gagal','Data Gagal DiUpdate!'); 
            }
            
            return back();
        }
        elseif($url == '/home/upprofil/'.$id)
        {
            $profil = ProfilModel::find($id);
            $profil->profil = $r->profil;
            $profil->update();
             if($profil)
             {
               Session::flash('sukses','Data Berhasil DiUpdate!'); 
            }
            else{
                Session::flash('gagal','Data Gagal DiUpdate!'); 
            }

             return back();
        }

         elseif($url == '/home/upvisidanmisi/'.$id)
        {
            $upvm = VisidanMisiModel::find($id);
            $upvm->visidanmisi = $r->visidanmisi;
            $upvm->update();
             if($upvm)
             {
               Session::flash('sukses','Data Berhasil DiUpdate!'); 
            }
            else{
                Session::flash('gagal','Data Gagal DiUpdate!'); 
            }

             return back();
        }
        elseif($url == '/home/upsaranadanprasarana/'.$id)
        {
            $SaranaDanPrasaranaModel = SaranaDanPrasaranaModel::find($id);
            $SaranaDanPrasaranaModel->saranadanprasarana = $r->saranadanprasarana;
            $SaranaDanPrasaranaModel->update();
             if($SaranaDanPrasaranaModel)
             {
               Session::flash('sukses','Data Berhasil DiUpdate!'); 
            }
            else{
                Session::flash('gagal','Data Gagal DiUpdate!'); 
            }
            
             return back();
        }
        elseif($url == '/home/upbanner/'.$id)
        {
            $input = BannerModel::find($id);
            $input->title = $r->title;
            $input->link = $r->link;

            if(@count($r->imgbanner) > 0){

            $target = 'upload/banner/'.$input->imgbanner;
            unlink($target);

            $slimit = str_limit($r->title,'20');
            $sslug = str_slug($slimit,'_');
            $file = $r->file('imgbanner');
            //dd($file);
            $ext = $file->getClientOriginalExtension();
            $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
            $file->move('upload/banner',$namafile);
            $input->imgbanner = $namafile;
            }else{
               $input->imgbanner = $input->imgbanner; 
            }
            $input->update();
            if($input)
             {
               Session::flash('sukses','Data Berhasil DiUpdate!'); 
            }
            else{
                Session::flash('gagal','Data Gagal DiUpdate!'); 
            }
            
             return back();
        }
        elseif($url == '/home/uplink/'.$id)
        {
             $link = LinkModel::find($id);
             $link->title = $r->title;
             $link->link = $r->link;
             $link->save();

             if($link)
             {
               Session::flash('sukses','Data Berhasil Disimpan!'); 
            }
            else{
                Session::flash('gagal','Data Gagal Disimpan!'); 
            }
            
             return back();
        }

         elseif($url == '/home/upgalery/'.$id)
        {
             $input = AlbumModel::find($id);
             $input->judul = $r->judul;
             $input->slug = str_slug($r->judul);
             $input->tanggal = $r->tanggal;
             $input->status = 'Y';
             $input->update();
             if($input)
             {
               Session::flash('sukses','Data Berhasil DiUpdate!'); 
            }
            else{
                Session::flash('gagal','Data gagal DiUpdate!'); 
            }
             return back();
        }
        elseif($url == '/home/upkatasambutan/'.$id)
        {
             $input = KataSambutanModel::find($id);
             $input->nama = $r->nama;
             $input->katasambutan = $r->katasambutan;

             if(@count($r->file('foto')) > 0){
                $target = 'upload/fotokepalasekolah/'.$input->foto;
                unlink($target);
                $slimit = str_limit($r->nama,'20');
                $sslug = str_slug($slimit,'_');
                $file = $r->file('foto');
                //dd($file);
                $ext = $file->getClientOriginalExtension();
                $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
                $file->move('upload/fotokepalasekolah',$namafile);
                $input->foto = $namafile;
             }
             else{
                $input->foto = $input->foto;
             }
             $input->update();
             if($input)
             {
               Session::flash('sukses','Data Berhasil DiUpdate!'); 
            }
            else{
                Session::flash('gagal','Data gagal DiUpdate!'); 
            }
             return back();
        }

         elseif($url == '/home/updatagurudanstaf/'.$id)
        {
            $input = DataGuruModel::find($id);
            $input->nama = $r->nama;
            $input->slug = str_slug($r->nama);
            $input->tempat = $r->tempat;
            $input->tgllahir = $r->tgllahir;
            $input->alamat = $r->alamat;
            $input->nohp = $r->nohp;

            if(@count($r->file('foto')) > 0){
                $target = 'upload/datagurudanstaf/'.$input->foto;
                unlink($target);
                $slimit = str_limit($r->nama,'20');
                $sslug = str_slug($slimit,'_');
                $file = $r->file('foto');
                //dd($file);
                $ext = $file->getClientOriginalExtension();
                $namafile = "IMG_".$sslug."_".date('Y_m_d_H_s_i'). ".$ext";
                $file->move('upload/datagurudanstaf',$namafile);
                $input->foto = $namafile;
            }
            else{
                $input->foto = $input->foto;
            }
            
             $input->update();
             if($input)
             {
               Session::flash('sukses','Data Berhasil DiUpdate!'); 
            }
            else{
                Session::flash('gagal','Data gagal DiUpdate!'); 
            }
             return back();
        }

    }
//==============delete================//
    public function dldinam($slug,$id)
    {
        $url = $_SERVER['REQUEST_URI'];
        
        if($url == '/home/delete/fotoheader/'.$id)
        {
            $dl = HeaderModel::find($id);
            $target = 'upload/header/'.$dl->foto;
            unlink($target);
            $dl->delete();
            if($dl)
             {
               Session::flash('sukses','Data Berhasil DiDelete!'); 
            }
            else{
                Session::flash('gagal','Data gagal DiDelete!'); 
            }
             return back();
        }

        elseif($url == '/home/delete/berita/'.$id)
        {
            $dl = BeritaModel::find($id);
            $target = 'upload/fotoberita/'.$dl->fotoheader;
            unlink($target);
            $dl->delete();
            if($dl)
             {
               Session::flash('sukses','Data Berhasil DiDelete!'); 
            }
            else{
                Session::flash('gagal','Data gagal DiDelete!'); 
            }
             return back();
        }

        elseif($url == '/home/delete/banner/'.$id)
        {
            $dl = BannerModel::find($id);
            $target = 'upload/banner/'.$dl->imgbanner;
            unlink($target);
            $dl->delete();
            if($dl)
             {
               Session::flash('sukses','Data Berhasil DiDelete!'); 
            }
            else{
                Session::flash('gagal','Data gagal DiDelete!'); 
            }
             return back();
        }
        elseif($url == '/home/delete/link/'.$id)
        {
            $dl = LinkModel::find($id);
            $dl->delete();
            if($dl)
             {
               Session::flash('sukses','Data Berhasil DiDelete!'); 
            }
            else{
                Session::flash('gagal','Data gagal DiDelete!'); 
            }
             return back();
        }
        elseif($url == '/home/delete/galery/'.$id)
        {

            $dl = AlbumModel::find($id);

            $cek = GaleryModel::where('id_album',$dl->id)->get();            
            $jumlah = @count($cek);
            //dd($cek);
            if($jumlah > 0)
            {
                foreach ($cek as $c){
                   $dlg = GaleryModel::find($c->id);
                   $target = 'upload/galery/'.$c->file;
                   unlink($target);
                   $dlg->delete();
                }
            }
            $dl->delete();
            if($dl)
             {
               Session::flash('sukses','Data Berhasil DiDelete!'); 
            }
            else{
                Session::flash('gagal','Data gagal DiDelete!'); 
            }
             return back();
        }
        elseif($url == '/home/delete/datagurudanstaf/'.$id)
        {
            $dl = DataGuruModel::find($id);
            $target = 'upload/datagurudanstaf/'.$dl->foto;
            unlink($target);
            $dl->delete();
            if($dl)
             {
               Session::flash('sukses','Data Berhasil DiDelete!'); 
            }
            else{
                Session::flash('gagal','Data gagal DiDelete!'); 
            }
             return back();
        }
        
    }
}
