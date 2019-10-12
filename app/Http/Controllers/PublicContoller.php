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

class PublicContoller extends Controller
{
    public function index()
    {
    	$album = AlbumModel::orderBy('id','desc')->paginate(3);
    	$benner = BannerModel::orderBy('id','desc')->get();
    	$berita = BeritaModel::orderBy('id','desc')->paginate(3);
    	$berita1 = BeritaModel::where('fotoheader','!=','0')->orderBy('id','desc')->paginate(3);
    	$popular = BeritaModel::orderBy('popular','desc')->paginate(5);
    	$datagurudanstaf = DataGuruModel::orderBy('id','desc')->get();
    	$katasambutan = KataSambutanModel::orderBy('id','desc')->first();
    	$link = LinkModel::orderBy('id','desc')->get();
    	$profil = ProfilModel::orderBy('id','desc')->get();
    	$saradanprasarana = SaranaDanPrasaranaModel::orderBy('id','desc')->get();
    	$header = HeaderModel::orderBy('id','desc')->first();
    	$galery = GaleryModel::orderBy('id','desc')->paginate(8);

    	return view('pages.index',compact('album','benner','berita','datagurudanstaf','katasambutan','link','profil','saradanprasarana','header','galery','popular','berita1'));
    }
    public function singlepath()
    {
    	$album = AlbumModel::orderBy('id','desc')->paginate(10);
    	$benner = BannerModel::orderBy('id','desc')->get();
    	$berita = BeritaModel::orderBy('id','desc')->paginate(10);
    	$berita1 = BeritaModel::where('fotoheader','!=','0')->orderBy('id','desc')->paginate(3);
    	$popular = BeritaModel::orderBy('popular','desc')->paginate(5);
    	$datagurudanstaf = DataGuruModel::orderBy('id','desc')->get();
    	$katasambutan = KataSambutanModel::orderBy('id','desc')->first();
    	$link = LinkModel::orderBy('id','desc')->get();
    	$profil = ProfilModel::orderBy('id','desc')->first();
    	$saranadanprasarana = SaranaDanPrasaranaModel::orderBy('id','desc')->first();
        $header = HeaderModel::orderBy('id','desc')->first();
    	$visidanmisi = VisidanMisiModel::orderBy('id','desc')->first();
    	$galery = GaleryModel::orderBy('id','desc')->paginate(8);

    	$url = $_SERVER['REQUEST_URI'];
//=========singlepath_2==============//
    	if($url == '/public/profil')
    	{
    		$kondisi = 'profil';
    		return view('pages.singlepath_2',compact('album','benner','berita','datagurudanstaf','katasambutan','link','profil','saradanprasarana','header','galery','popular','berita1','kondisi'));
    	}
    	elseif($url == '/public/saranadanprasarana')
    	{
    		$kondisi = 'saranadanprasarana';
    		return view('pages.singlepath_2',compact('album','benner','berita','datagurudanstaf','katasambutan','link','profil','saranadanprasarana','header','galery','popular','berita1','kondisi'));
    	}
        elseif($url == '/public/visidanmisi')
        {
            $kondisi = 'visidanmisi';
            return view('pages.singlepath_2',compact('album','benner','berita','datagurudanstaf','katasambutan','link','profil','saranadanprasarana','header','galery','popular','berita1','kondisi','visidanmisi'));
        }
    	elseif($url == '/public/guru')
    	{
    		$kondisi = 'guru';
    		return view('pages.singlepath_2',compact('album','benner','berita','datagurudanstaf','katasambutan','link','profil','saradanprasarana','header','galery','popular','berita1','kondisi'));
    	}
    	elseif($url == '/public/staf')
    	{
    		$kondisi = 'staf';
    		return view('pages.singlepath_2',compact('album','benner','berita','datagurudanstaf','katasambutan','link','profil','saradanprasarana','header','galery','popular','berita1','kondisi'));
    	}
    	elseif($url == '/public/about')
    	{
    		$kondisi = 'about';
    		return view('pages.singlepath_2',compact('album','benner','berita','datagurudanstaf','katasambutan','link','profil','saradanprasarana','header','galery','popular','berita1','kondisi'));
    	}

//==========singlepath_1===========//
    	elseif($url == '/public/berita')
    	{
    		$kondisi = 'berita';
    		return view('pages.singlepath_1',compact('album','benner','berita','datagurudanstaf','katasambutan','link','profil','saradanprasarana','header','galery','popular','berita1','kondisi'));
    	}
    	elseif($url == '/public/galery')
    	{
    		$kondisi = 'galery';
    		return view('pages.singlepath_1',compact('album','benner','berita','datagurudanstaf','katasambutan','link','profil','saradanprasarana','header','galery','popular','berita1','kondisi'));
    	}
    	else{
    		abort(404);
    	}
    	
    }
    public function singlepath1($kon,$slug)
    {
    	$album = AlbumModel::orderBy('id','desc')->paginate(10);
    	$benner = BannerModel::orderBy('id','desc')->get();
    	
    	$berita1 = BeritaModel::where('fotoheader','!=','0')->orderBy('id','desc')->paginate(3);
    	$popular = BeritaModel::orderBy('popular','desc')->paginate(5);
    	$datagurudanstaf = DataGuruModel::orderBy('id','desc')->get();
    	$katasambutan = KataSambutanModel::orderBy('id','desc')->first();
    	$link = LinkModel::orderBy('id','desc')->get();
    	$profil = ProfilModel::orderBy('id','desc')->first();
    	$saranadanprasarana = SaranaDanPrasaranaModel::orderBy('id','desc')->first();
    	$header = HeaderModel::orderBy('id','desc')->first();
        $galery = GaleryModel::orderBy('id','desc')->paginate(8);
    	

    	$url = $_SERVER['REQUEST_URI'];
    	//dd($url);
    	if($url == '/singlepath/berita/'.$slug)
    	{
    		$berita = BeritaModel::where('slug',$slug)->first();
            $berita->popular = $berita->popular + 1;
            $berita->update();
    		//dd($berita);
    		$kondisi = 'singlepath/berita';
    		return view('pages.singlepath_1',compact('album','benner','berita','datagurudanstaf','katasambutan','link','profil','saradanprasarana','header','galery','popular','berita1','kondisi'));
    	}
    	elseif($url == '/singlepath/biodata/'.$slug)
    	{
    		$datagurudanstaf = DataGuruModel::where('slug',$slug)->first();
    		$kondisi = 'singlepath/biodata';
    		return view('pages.singlepath_1',compact('album','benner','berita','datagurudanstaf','katasambutan','link','profil','saradanprasarana','header','galery','popular','berita1','kondisi'));
    	}
        elseif($url == '/singlepath/album/'.$slug)
        {
            $cekgalery = AlbumModel::where('slug',$slug)->first();
            $galery = GaleryModel::where('id_album',$cekgalery->id)->orderBy('id','desc')->get();
            $kondisi = 'singlepath/album';
            return view('pages.singlepath_2',compact('album','benner','berita','datagurudanstaf','katasambutan','link','profil','saradanprasarana','header','galery','popular','berita1','kondisi'));
        }
    	else{
    		abort(404);
    	}
    }
}
