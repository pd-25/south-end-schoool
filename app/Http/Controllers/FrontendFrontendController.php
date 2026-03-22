<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Models\Topper;
use App\Models\NoticeBoard;
use App\Models\Teacher;
use App\Models\Event;
use App\Models\Galary;
use App\Models\GalleryImages;
use App\Models\LatestNews;
use App\Models\Result;
use App\Models\Syllabus;

class FrontendFrontendController extends Controller
{
    public function index()
    {
        $toppers = Topper::latest()->take(4)->get();
        $notices = NoticeBoard::latest()->take(10)->get();
        $teachers = Teacher::all();
        $events = Event::latest()->take(6)->get();
        $latestNews = LatestNews::active()->orderBy('id', 'desc')->get();
        return view('frontend.home', compact('toppers', 'notices', 'teachers', 'events', 'latestNews'));
    }

    public function schoolIntroduction()
    {
        return view('frontend.school-introduction');
    }

    public function missionAndVision()
    {
        return view('frontend.mission-and-vision');
    }

    public function affiliation()
    {
        return view('frontend.affiliation');
    }

    public function schoolManagementCommittee()
    {
        return view('frontend.school-management-committee');
    }

    public function principalsDesk()
    {
        return view('frontend.principals-desk');
    }

    public function vicePrincipalsDesk()
    {
        return view('frontend.vice-principals-desk');
    }

    public function teachers()
    {
        $teachers = Teacher::where('category', 'teacher')->latest()->get();
        return view('frontend.teachers', compact('teachers'));
    }

    public function librarian()
    {
        $teachers = Teacher::where('category', 'librarian')->latest()->get();
        return view('frontend.librarian', compact('teachers'));
    }

    public function officeAssistants()
    {
        $teachers = Teacher::where('category', 'office-assistant')->latest()->get();

        return view('frontend.office-assistants', compact('teachers'));
    }

    public function studentsCouncil()
    {
        return view('frontend.students-council');
    }

    public function classrooms()
    {
        return view('frontend.classrooms');
    }

    public function schoolLabs()
    {
        return view('frontend.school-labs');
    }

    public function library()
    {
        return view('frontend.library');
    }

    public function examinationHall()
    {
        return view('frontend.examination-hall');
    }

    public function infirmaryRoom()
    {
        return view('frontend.infirmary-room');
    }

    public function safetyMeasures()
    {
        return view('frontend.safety-measures');
    }

    public function prePrimaryDivision()
    {
        return view('frontend.pre-primary-division');
    }

    public function middleSchoolDivision()
    {
        return view('frontend.middle-school-division');
    }

    public function seniorSchoolDivision()
    {
        return view('frontend.senior-school-division');
    }

    public function seniorSecondaryDivision()
    {
        return view('frontend.senior-secondary-division');
    }

    public function guidelinesForEducation()
    {
        return view('frontend.guidelines-for-education');
    }

    public function codeOfConduct()
    {
        return view('frontend.code-of-conduct');
    }

    public function syllabus()
    {
        $syllabus = Syllabus::orderBy('id', 'desc')->get();
        return view('frontend.syllabus', compact('syllabus'));
    }

    public function results()
    {
        $results = Result::orderBy('id', 'desc')->get();
        return view('frontend.results', ['results' => $results]);
    }

    public function houseSystem()
    {
        return view('frontend.house-system');
    }

    public function interHouseCompetitions()
    {
        $events = Event::where('event_type', 'inter-house-competitions')->latest()->get();

        return view('frontend.inter-house-competitions', compact('events'));
    }

    public function interHouseSports()
    {
        $events = Event::where('event_type', 'inter-house-sports')->latest()->get();

        return view('frontend.inter-house-sports', compact('events'));
    }

    public function schoolEvents()
    {
        $events = Event::where('event_type', 'school-events')->latest()->get();

        return view('frontend.school-events', compact('events'));
    }

    public function pictureGallery()
    {
        $pictureGalleries = Galary::with(['category', 'images' => fn($q) => $q->limit(1)])
            ->latest()
            ->get();

        return view('frontend.picture-gallery', compact('pictureGalleries'));
    }


    public function singleGallery($id)
    {
        $galleryDetails = Galary::findOrFail($id);
        $gallery = GalleryImages::where('gallery_id', $id)->get();
        return view('frontend.single-gallery', compact('gallery', 'galleryDetails'));
    }

    public function rules()
    {
        return view('frontend.rules');
    }

    public function getAdmissionForm()
    {
        return view('frontend.get-admission-form');
    }

    public function schoolUniform()
    {
        return view('frontend.school-uniform');
    }

    public function withdrawal()
    {
        return view('frontend.withdrawal');
    }

    public function contactForAdmission()
    {
        return view('frontend.contact-for-admission');
    }

    public function transferCertificate()
    {
        return view('frontend.transfer-certificate');
    }

    public function careerWithUs()
    {
        $careers = Career::orderBy('id', 'desc')->get();
        return view('frontend.career-with-us', compact('careers'));
    }
}
