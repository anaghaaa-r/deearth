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

class ManageViewsController extends Controller
{

    // works
    public function viewWorks()
    {
        $homeOrder = Home::max('id');

        preg_match('/^(\d+)([a-z]*)$/i', $homeOrder, $matches);
        $numericPart = isset($matches[1]) ? (int)$matches[1] : 0;
        $nonNumericPart = isset($matches[2]) ? $matches[2] : '';
        $nextHomeOrder = $numericPart + 1 . $nonNumericPart;

        $homes = Home::orderBy('order', 'desc')
                ->orderBy('order_suffix', 'desc')
                ->get();

        $urbandesignOrder = UrbanDesign::max('id');

        preg_match('/^(\d+)([a-z]*)$/i', $urbandesignOrder, $matches);
        $numericPart = isset($matches[1]) ? (int)$matches[1] : 0;
        $nonNumericPart = isset($matches[2]) ? $matches[2] : '';
        $nextUrbanDesignOrder = $numericPart + 1 . $nonNumericPart;

        $urbandesigns = UrbanDesign::orderBy('order', 'desc')
                        ->orderBy('order_suffix', 'desc')
                        ->get();

        $institutionOrder = Institution::max('id');

        preg_match('/^(\d+)([a-z]*)$/i', $institutionOrder, $matches);
        $numericPart = isset($matches[1]) ? (int)$matches[1] : 0;
        $nonNumericPart = isset($matches[2]) ? $matches[2] : '';
        $nextInstitutionOrder = $numericPart + 1 . $nonNumericPart;

        $institutions = Institution::orderBy('order', 'desc')
                        ->orderBy('order_suffix', 'desc')
                        ->get();

        $commercialOrder = Commercial::max('id');

        preg_match('/^(\d+)([a-z]*)$/i', $commercialOrder, $matches);
        $numericPart = isset($matches[1]) ? (int)$matches[1] : 0;
        $nonNumericPart = isset($matches[2]) ? $matches[2] : '';
        $nextCommercialOrder = $numericPart + 1 . $nonNumericPart;

        $commercials = Commercial::orderBy('order', 'desc')
                        ->orderBy('order_suffix', 'desc')
                        ->get();

        return view('admin.works', compact('homes', 'urbandesigns', 'institutions', 'commercials', 'nextHomeOrder', 'nextUrbanDesignOrder', 'nextInstitutionOrder', 'nextCommercialOrder'));
    }


    // view office
    public function viewOffice()
    {
        $aboutus = AboutUs::orderBy('id', 'desc')->get();

        $awardOrder = Award::max('id');

        preg_match('/^(\d+)([a-z]*)$/i', $awardOrder, $matches);
        $numericPart = isset($matches[1]) ? (int)$matches[1] : 0;
        $nonNumericPart = isset($matches[2]) ? $matches[2] : '';
        $nextAwardOrder = $numericPart + 1 . $nonNumericPart;

        $awards = Award::orderBy('order', 'desc')
                ->orderBy('order_suffix', 'desc')
                ->get();

        $peopleOrder = People::max('id');

        preg_match('/^(\d+)([a-z]*)$/i', $peopleOrder, $matches);
        $numericPart = isset($matches[1]) ? (int)$matches[1] : 0;
        $nonNumericPart = isset($matches[2]) ? $matches[2] : '';
        $nextPeopleOrder = $numericPart + 1 . $nonNumericPart;

        $people = People::orderBy('order', 'desc')
                ->orderBy('order_suffix', 'desc')
                ->get();

        $contact = Contact::orderBy('id', 'desc')->get();

        return view('admin.office', compact('aboutus', 'awards', 'people', 'contact', 'nextAwardOrder', 'nextPeopleOrder'));
    }

    // view archives
    public function viewArchives()
    {
        $publicationOrder = Publication::max('id');

        preg_match('/^(\d+)([a-z]*)$/i', $publicationOrder, $matches);
        $numericPart = isset($matches[1]) ? (int)$matches[1] : 0;
        $nonNumericPart = isset($matches[2]) ? $matches[2] : '';
        $nextPublicationOrder = $numericPart + 1 . $nonNumericPart;

        $publications = Publication::orderBy('order', 'desc')
                        ->orderBy('order_suffix', 'desc')
                        ->get();

        $chinthaerOrder = Chinthaer::max('id');

        preg_match('/^(\d+)([a-z]*)$/i', $chinthaerOrder, $matches);
        $numericPart = isset($matches[1]) ? (int)$matches[1] : 0;
        $nonNumericPart = isset($matches[2]) ? $matches[2] : '';
        $nextChinthaerOrder = $numericPart + 1 . $nonNumericPart;

        $chinthaers = Chinthaer::orderBy('order', 'desc')
                    ->orderBy('order_suffix', 'desc')
                    ->get();

        return view('admin.archives', compact('publications', 'chinthaers', 'nextPublicationOrder', 'nextChinthaerOrder')); 
    }

    // gallery
    public function viewGallery($context, $id)
    {
        if($context === 'home')
        {
            $model = Home::with(['gallery' => function ($query) {
                $query->orderBy('id', 'desc');
            }])->find($id);
        }
        elseif($context === 'urbandesign')
        {
            $model = UrbanDesign::with(['gallery' => function ($query) {
                $query->orderBy('id', 'desc');
            }])->find($id);
        }
        elseif($context === 'institution')
        {
            $model = Institution::with(['gallery' => function ($query) {
                $query->orderBy('id', 'desc');
            }])->find($id);
        }
        elseif($context === 'commercial')
        {
            $model = Commercial::with(['gallery' => function ($query) {
                $query->orderBy('id', 'desc');
            }])->find($id);
        }
        else
        {
            abort(404);
        }

        if(!$model)
        {
            return response()->json([
                'status' => false,
                'message' => 'not found',
            ], 404);
        }

        $gallery = $model->gallery;

        return view('admin.gallery', [
            'gallery' => $gallery,
            'model' => $model,
            'context' => $context
        ]);
    }
}
