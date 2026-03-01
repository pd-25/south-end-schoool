<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendFrontendController;

Route::get('/', [FrontendFrontendController::class, 'index'])->name('home');

Route::prefix('about-us')->name('about.')->group(function () {
    Route::get('school-introduction', [FrontendFrontendController::class, 'schoolIntroduction'])->name('introduction');
    Route::get('mission-and-vision', [FrontendFrontendController::class, 'missionAndVision'])->name('mission_vision');
    Route::get('affiliation', [FrontendFrontendController::class, 'affiliation'])->name('affiliation');
});

Route::prefix('the-team')->name('team.')->group(function () {
    Route::get('school-management-committee', [FrontendFrontendController::class, 'schoolManagementCommittee'])->name('management_committee');
    Route::get('principals-desk', [FrontendFrontendController::class, 'principalsDesk'])->name('principals_desk');
    Route::get('vice-principals-desk', [FrontendFrontendController::class, 'vicePrincipalsDesk'])->name('vice_principals_desk');
    Route::get('teachers', [FrontendFrontendController::class, 'teachers'])->name('teachers');
    Route::get('librarian', [FrontendFrontendController::class, 'librarian'])->name('librarian');
    Route::get('office-assistants', [FrontendFrontendController::class, 'officeAssistants'])->name('office_assistants');
    Route::get('students-council', [FrontendFrontendController::class, 'studentsCouncil'])->name('students_council');
});

Route::prefix('school-facilities')->name('facilities.')->group(function () {
    Route::get('classrooms', [FrontendFrontendController::class, 'classrooms'])->name('classrooms');
    Route::get('school-labs', [FrontendFrontendController::class, 'schoolLabs'])->name('labs');
    Route::get('library', [FrontendFrontendController::class, 'library'])->name('library');
    Route::get('examination-hall', [FrontendFrontendController::class, 'examinationHall'])->name('examination_hall');
    Route::get('infirmary-room', [FrontendFrontendController::class, 'infirmaryRoom'])->name('infirmary_room');
    Route::get('safety-measures', [FrontendFrontendController::class, 'safetyMeasures'])->name('safety_measures');
});

Route::prefix('academics')->name('academics.')->group(function () {
    Route::get('pre-primary-division', [FrontendFrontendController::class, 'prePrimaryDivision'])->name('pre_primary');
    Route::get('middle-school-division', [FrontendFrontendController::class, 'middleSchoolDivision'])->name('middle_school');
    Route::get('senior-school-division', [FrontendFrontendController::class, 'seniorSchoolDivision'])->name('senior_school');
    Route::get('senior-secondary-division', [FrontendFrontendController::class, 'seniorSecondaryDivision'])->name('senior_secondary');
    Route::get('guidelines-for-education', [FrontendFrontendController::class, 'guidelinesForEducation'])->name('guidelines');
    Route::get('code-of-conduct', [FrontendFrontendController::class, 'codeOfConduct'])->name('code_of_conduct');
    Route::get('syllabus', [FrontendFrontendController::class, 'syllabus'])->name('syllabus');
    Route::get('results', [FrontendFrontendController::class, 'results'])->name('results');
});

Route::prefix('co-curricular-activities')->name('activities.')->group(function () {
    Route::get('house-system', [FrontendFrontendController::class, 'houseSystem'])->name('house_system');
    Route::get('inter-house-competitions', [FrontendFrontendController::class, 'interHouseCompetitions'])->name('competitions');
    Route::get('inter-house-sports', [FrontendFrontendController::class, 'interHouseSports'])->name('sports');
    Route::get('school-events', [FrontendFrontendController::class, 'schoolEvents'])->name('events');
    Route::get('picture-gallery', [FrontendFrontendController::class, 'pictureGallery'])->name('gallery');
    Route::get('single-gallery/{id}', [FrontendFrontendController::class, 'singleGallery'])->name('single_gallery');
});

Route::prefix('admission')->name('admission.')->group(function () {
    Route::get('rules', [FrontendFrontendController::class, 'rules'])->name('rules');
    Route::get('get-admission-form', [FrontendFrontendController::class, 'getAdmissionForm'])->name('form');
    Route::get('school-uniform', [FrontendFrontendController::class, 'schoolUniform'])->name('uniform');
    Route::get('withdrawal', [FrontendFrontendController::class, 'withdrawal'])->name('withdrawal');
    Route::get('contact-for-admission', [FrontendFrontendController::class, 'contactForAdmission'])->name('contact');
    Route::get('transfer-certificate', [FrontendFrontendController::class, 'transferCertificate'])->name('transfer_certificate');
});

Route::get('career-with-us', [FrontendFrontendController::class, 'careerWithUs'])->name('career');


require __DIR__ . '/admin.php';
