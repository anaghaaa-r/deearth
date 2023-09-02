<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Award;
use App\Models\Chinthaer;
use App\Models\Commercial;
use App\Models\Contact;
use App\Models\Home;
use App\Models\Institution;
use App\Models\People;
use App\Models\Publication;
use App\Models\UrbanDesign;
use Illuminate\Http\Request;

class ClientSideViewsController extends Controller
{
    public function viewHomes()
    {
        $homes = Home::orderBy('order', 'desc')
                ->orderBy('order_suffix', 'desc')
                ->get();

        return view('client.homes', compact('homes'));
    }

    public function homeDetails($id)
    {
        $work = Home::find($id);

        $home = Home::with(['gallery' => function ($query) {
            $query->orderBy('id', 'desc');
        }])->find($id);
        // $home = Home::with(['gallery'])->find($id);

        $gallery = $home->gallery;

        return view('client.home-details', compact('work', 'gallery'));
    }

    public function viewUrbanDesigns()
    {
        $urbandesigns = UrbanDesign::orderBy('order', 'desc')
                        ->orderBy('order_suffix', 'desc')
                        ->get();

        return view('client.urbandesign', compact('urbandesigns'));
    }

    public function urbanDesignDetails($id)
    {
        $work = UrbanDesign::find($id);

        // $urbandesign = UrbanDesign::with(['gallery' => function ($query) {
        //     $query->orderBy('id', 'asc');
        // }])->find($id);

        $urbandesign = UrbanDesign::with(['gallery'])->find($id);

        $gallery = $urbandesign->gallery;

        return view('client.urbandesign-details', compact('work', 'gallery'));
    }

    public function viewInstitutions()
    {
        $institutions = Institution::orderBy('order', 'desc')
                        ->orderBy('order_suffix', 'desc')
                        ->get();

        return view('client.institution', compact('institutions'));
    }

    public function institutionDetails($id)
    {
        $work = Institution::find($id);

        $institution = Institution::with(['gallery'])->find($id);

        $gallery = $institution->gallery;

        return view('client.institution-details', compact('work', 'gallery'));
    }

    public function viewCommercials()
    {
        $commercials = Commercial::orderBy('order', 'desc')
                    ->orderBy('order_suffix', 'desc')
                    ->get();

        return view('client.commercial', compact('commercials'));
    }

    public function commercialDetails($id)
    {
        $work = Commercial::find($id);

        $commercial = Commercial::with(['gallery'])->find($id);

        $gallery = $commercial->gallery;

        return view('client.commercial-details', compact('work', 'gallery'));
    }

    public function viewAboutus()
    {
        $aboutus = AboutUs::orderBy('id', 'desc')->get();

        return view('client.aboutus', compact('aboutus'));
    }

    public function viewAwards()
    {
        $awards = Award::orderBy('order', 'desc')
                ->orderBy('order_suffix', 'desc')
                ->get();

        return view('client.awards', compact('awards'));
    }

    public function viewPeople()
    {
        $people = People::orderBy('order', 'desc')
                ->orderBy('order_suffix', 'desc')
                ->get();

        return view('client.people', compact('people'));
    }

    public function viewContact()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();

        return view('client.contact', compact('contacts'));
    }

    public function viewPublications()
    {
        $publications = Publication::orderBy('order', 'desc')
                    ->orderBy('order_suffix', 'desc')
                    ->get();

        return view('client.publications', compact('publications'));
    }

    public function viewChinthaer()
    {
        $chinthaers = Chinthaer::orderBy('order', 'desc')
                    ->orderBy('order_suffix', 'desc')
                    ->get();

        return view('client.chinthaer', compact('chinthaers'));
    }

}
