<?php

namespace App\Http\Controllers;

use Intervention\Image\Image as InterventionImage;
use App\Models\Teacher;
use App\Models\Topper;
use App\Models\Galary;
use App\Models\GalleryImages;
use App\Models\NoticeBoard;
use App\Models\Event;
use App\Models\Syllabus;
use App\Models\Result;
use App\Models\LatestNews;
use App\Models\Career;
use App\Models\Council;
use App\Models\CouncilCategory;
use App\Models\GalleryCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // ─── Teachers ───────────────────────────────────

    public function teachersList()
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('admin.teachers.index', compact('teachers'));
    }

    public function teacherStore(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'category'      => 'required|in:teacher,librarian,office-assistant',
            'designation'   => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'experience'    => 'required|string|max:255',
            'photo'         => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        Teacher::create([
            'name'          => $request->name,
            'category'      => $request->category,
            'designation'   => $request->designation,
            'qualification' => $request->qualification,
            'experience'    => $request->experience,
            'photo'         => $this->storeTeacherPhoto($request->file('photo')),
        ]);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher added successfully!');
    }

    public function teacherUpdate(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'category'      => 'required|in:teacher,librarian,office-assistant',
            'designation'   => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'experience'    => 'required|string|max:255',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        $data = [
            'name'          => $request->name,
            'category'      => $request->category,
            'designation'   => $request->designation,
            'qualification' => $request->qualification,
            'experience'    => $request->experience,
        ];

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($teacher->photo && Storage::disk('public')->exists($teacher->photo)) {
                Storage::disk('public')->delete($teacher->photo);
            }
            $data['photo'] = $this->storeTeacherPhoto($request->file('photo'));
        }

        $teacher->update($data);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher updated successfully!');
    }

    private function storeTeacherPhoto(\Illuminate\Http\UploadedFile $file): string
    {
        $dir = storage_path('app/public/teachers');

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $filename = time() . '_' . uniqid() . '.jpg';
        $savePath = $dir . '/' . $filename;

        $manager = new ImageManager(new Driver());

        $manager->read($file)
            ->scaleDown(width: 800, height: 800)
            ->toJpeg(quality: 80)
            ->save($savePath);

        return 'teachers/' . $filename;
    }

    public function teacherDelete(Teacher $teacher)
    {
        if ($teacher->photo && Storage::disk('public')->exists($teacher->photo)) {
            Storage::disk('public')->delete($teacher->photo);
        }

        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher deleted successfully!');
    }

    // ─── Toppers ────────────────────────────────────

    public function toppersList()
    {
        $toppers = Topper::latest()->paginate(10);
        return view('admin.toppers.index', compact('toppers'));
    }

    public function topperStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('toppers', 'public');

        Topper::create([
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.toppers.index')->with('success', 'Topper added successfully!');
    }

    public function topperUpdate(Request $request, Topper $topper)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = ['name' => $request->name];

        if ($request->hasFile('image')) {
            if ($topper->image && Storage::disk('public')->exists($topper->image)) {
                Storage::disk('public')->delete($topper->image);
            }
            $data['image'] = $request->file('image')->store('toppers', 'public');
        }

        $topper->update($data);

        return redirect()->route('admin.toppers.index')->with('success', 'Topper updated successfully!');
    }

    public function topperDelete(Topper $topper)
    {
        if ($topper->image && Storage::disk('public')->exists($topper->image)) {
            Storage::disk('public')->delete($topper->image);
        }

        $topper->delete();

        return redirect()->route('admin.toppers.index')->with('success', 'Topper deleted successfully!');
    }

    // ─── Council Category ─────────────────────────────────────

    public function councilCategoryIndex()
    {
        $categories = CouncilCategory::latest()->get();
        return view('admin.council.category', compact('categories'));
    }

    public function councilCategoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:council_categories,name',
        ]);

        CouncilCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->back()
            ->with('success', 'Category created successfully.');
    }

    public function councilCategoryUpdate(Request $request, $id)
    {
        $category = CouncilCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:council_categories,name,' . $id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->back()
            ->with('success', 'Category updated successfully.');
    }

    public function councilCategoryDelete($id)
    {
        $category = CouncilCategory::findOrFail($id);
        $category->delete();

        return redirect()->back()
            ->with('success', 'Category deleted successfully.');
    }

    public function councilIndex()
    {
        $councils    = Council::with('category')->latest()->get();
        $categories  = CouncilCategory::latest()->get();
        return view('admin.council.index', compact('councils', 'categories'));
    }

    public function councilStore(Request $request)
    {
        $request->validate([
            'category_id'  => 'required|exists:council_categories,id',
            'heading'      => 'required|string|max:255',
            'designation'  => 'required|string|max:255',
            'image'        => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $imagePath = $request->file('image')->store('councils', 'public');

        Council::create([
            'category_id' => $request->category_id,
            'heading'     => $request->heading,
            'designation' => $request->designation,
            'image'       => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Council member added successfully.');
    }

    public function councilUpdate(Request $request, $council)
    {
        $councilModel = Council::findOrFail($council);

        $request->validate([
            'category_id'  => 'required|exists:council_categories,id',
            'heading'      => 'required|string|max:255',
            'designation'  => 'required|string|max:255',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $data = [
            'category_id' => $request->category_id,
            'heading'     => $request->heading,
            'designation' => $request->designation,
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($councilModel->image && Storage::disk('public')->exists($councilModel->image)) {
                Storage::disk('public')->delete($councilModel->image);
            }
            $data['image'] = $request->file('image')->store('councils', 'public');
        }

        $councilModel->update($data);

        return redirect()->back()->with('success', 'Council member updated successfully.');
    }

    public function councilDelete($council)
    {
        $councilModel = Council::findOrFail($council);

        if ($councilModel->image && Storage::disk('public')->exists($councilModel->image)) {
            Storage::disk('public')->delete($councilModel->image);
        }

        $councilModel->delete();

        return redirect()->back()->with('success', 'Council member deleted successfully.');
    }



    // ─── Gallery ─────────────────────────────────────
    public function galleryCategoryList()
    {
        $categories = GalleryCategory::latest()->paginate(10);
        return view('admin.gallery.category', compact('categories'));
    }

    public function galleryCategoryStore(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255|unique:gallery_categories,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $image    = $request->file('image');
        $filename = time() . '_' . uniqid() . '.jpg';
        $savePath = storage_path('app/public/gallery-categories/' . $filename);

        if (!file_exists(storage_path('app/public/gallery-categories'))) {
            mkdir(storage_path('app/public/gallery-categories'), 0755, true);
        }

        $manager = new ImageManager(new Driver());
        $manager->read($image)->scaleDown(width: 800)->toJpeg(quality: 80)->save($savePath);

        GalleryCategory::create([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
            'image' => 'gallery-categories/' . $filename,
        ]);

        return redirect()->route('admin.gallery.category.index')->with('success', 'Category added successfully!');
    }

    public function galleryCategoryUpdate(Request $request, $id)
    {
        $category = GalleryCategory::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255|unique:gallery_categories,name,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $image    = $request->file('image');
            $filename = time() . '_' . uniqid() . '.jpg';
            $savePath = storage_path('app/public/gallery-categories/' . $filename);

            if (!file_exists(storage_path('app/public/gallery-categories'))) {
                mkdir(storage_path('app/public/gallery-categories'), 0755, true);
            }

            $manager = new ImageManager(new Driver());
            $manager->read($image)->scaleDown(width: 800)->toJpeg(quality: 80)->save($savePath);

            $data['image'] = 'gallery-categories/' . $filename;
        }

        $category->update($data);

        return redirect()->route('admin.gallery.category.index')->with('success', 'Category updated successfully!');
    }

    public function galleryCategoryDelete($id)
    {
        $category = GalleryCategory::findOrFail($id);

        // Delete image from storage
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('admin.gallery.category.index')->with('success', 'Category deleted successfully!');
    }

    // ─────────────────────────────────────────────
    // Gallery CRUD
    // ─────────────────────────────────────────────

    public function galleryList()
    {
        $categories = GalleryCategory::orderBy('name')->get();
        $galleries  = Galary::with('category')->withCount('images')->latest()->paginate(10);

        return view('admin.gallery.index', compact('galleries', 'categories'));
    }

    public function galleryStore(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'category_id'       => 'required|exists:gallery_categories,id',
            'short_description' => 'nullable|string|max:255',
            'images'            => 'required|array|min:1',
            'images.*'          => 'image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $gallery = Galary::create([
            'name'              => $request->name,
            'category_id'       => $request->category_id,
            'short_description' => $request->short_description,
        ]);

        $this->storeGalleryImages($request->file('images'), $gallery->id);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery created successfully!');
    }

    public function galleryUpdate(Request $request, Galary $galary)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'category_id'       => 'required|exists:gallery_categories,id',
            'short_description' => 'nullable|string|max:255',
            'images'            => 'nullable|array',
            'images.*'          => 'image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $galary->update([
            'name'              => $request->name,
            'category_id'       => $request->category_id,
            'short_description' => $request->short_description,
        ]);

        if ($request->hasFile('images')) {
            $this->storeGalleryImages($request->file('images'), $galary->id);
        }

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery updated successfully!');
    }

    public function galleryDelete(Galary $galary)
    {
        foreach ($galary->images as $image) {
            if (Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }
        }

        $galary->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery deleted successfully!');
    }

    public function galleryImageDelete(GalleryImages $galleryImage)
    {
        if (Storage::disk('public')->exists($galleryImage->image)) {
            Storage::disk('public')->delete($galleryImage->image);
        }

        $galleryImage->delete();

        return back()->with('success', 'Image removed successfully!');
    }

    // ─────────────────────────────────────────────
    // Private helper
    // ─────────────────────────────────────────────

    private function storeGalleryImages(array $files, int $galleryId): void
    {
        $dir = storage_path('app/public/gallery/images');

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $manager = new ImageManager(new Driver());

        foreach ($files as $file) {
            $filename = time() . '_' . uniqid() . '.jpg';
            $savePath = $dir . '/' . $filename;

            $manager->read($file)
                ->scaleDown(width: 1200)
                ->toJpeg(quality: 75)
                ->save($savePath);

            GalleryImages::create([
                'gallery_id' => $galleryId,
                'image'      => 'gallery/images/' . $filename,
            ]);
        }
    }

    // ─── Notice Board ───────────────────────────────

    public function noticeBoardList()
    {
        $notices = NoticeBoard::latest()->paginate(10);
        return view('admin.noticeboard.index', compact('notices'));
    }

    public function noticeBoardStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'small_desc' => 'required|string|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'pdf' => 'required|mimes:pdf|max:5120',
            'date' => 'required|date',
        ]);

        $imagePath = $request->file('image')->store('noticeboard', 'public');
        $pdfPath = $request->file('pdf')->store('noticeboard/pdfs', 'public');

        NoticeBoard::create([
            'title' => $request->title,
            'small_desc' => $request->small_desc,
            'image' => $imagePath,
            'pdf' => $pdfPath,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.noticeboard.index')->with('success', 'Notice added successfully!');
    }

    public function noticeBoardUpdate(Request $request, NoticeBoard $noticeBoard)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'small_desc' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:5120',
            'date' => 'required|date',
        ]);

        $data = [
            'title' => $request->title,
            'small_desc' => $request->small_desc,
            'date' => $request->date,
        ];

        if ($request->hasFile('image')) {
            if ($noticeBoard->image && Storage::disk('public')->exists($noticeBoard->image)) {
                Storage::disk('public')->delete($noticeBoard->image);
            }
            $data['image'] = $request->file('image')->store('noticeboard', 'public');
        }

        if ($request->hasFile('pdf')) {
            if ($noticeBoard->pdf && Storage::disk('public')->exists($noticeBoard->pdf)) {
                Storage::disk('public')->delete($noticeBoard->pdf);
            }
            $data['pdf'] = $request->file('pdf')->store('noticeboard/pdfs', 'public');
        }

        $noticeBoard->update($data);

        return redirect()->route('admin.noticeboard.index')->with('success', 'Notice updated successfully!');
    }

    public function noticeBoardDelete(NoticeBoard $noticeBoard)
    {
        if ($noticeBoard->image && Storage::disk('public')->exists($noticeBoard->image)) {
            Storage::disk('public')->delete($noticeBoard->image);
        }

        if ($noticeBoard->pdf && Storage::disk('public')->exists($noticeBoard->pdf)) {
            Storage::disk('public')->delete($noticeBoard->pdf);
        }

        $noticeBoard->delete();

        return redirect()->route('admin.noticeboard.index')->with('success', 'Notice deleted successfully!');
    }

    // ─── Events ──────────────────────────────────────

    public function eventsList()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function eventStore(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
            'event_date'  => 'required|date',
            'event_type'  => 'required|string',
            'allowed'     => 'required|string',
        ]);

        // Intervention Image v3 — no facade needed
        $image    = $request->file('image');
        $filename = time() . '_' . uniqid() . '.jpg';
        $savePath = storage_path('app/public/events/' . $filename);

        // Make sure folder exists
        if (!file_exists(storage_path('app/public/events'))) {
            mkdir(storage_path('app/public/events'), 0755, true);
        }

        $manager = new ImageManager(new Driver());
        $manager->read($image)
            ->scaleDown(width: 1200)
            ->toJpeg(quality: 75)
            ->save($savePath);

        Event::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => 'events/' . $filename,
            'event_date'  => $request->event_date,
            'event_type'  => $request->event_type,
            'allowed'     => $request->allowed,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event added successfully!');
    }

    public function eventUpdate(Request $request, Event $event)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'event_date'  => 'required|date',
            'event_type'  => 'required|string',
            'allowed'     => 'required|string',
        ]);

        $data = [
            'title'       => $request->title,
            'description' => $request->description,
            'event_date'  => $request->event_date,
            'event_type'  => $request->event_type,
            'allowed'     => $request->allowed,
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }

            // Compress & resize new image
            $image    = $request->file('image');
            $filename = time() . '_' . uniqid() . '.jpg';
            $savePath = storage_path('app/public/events/' . $filename);

            if (!file_exists(storage_path('app/public/events'))) {
                mkdir(storage_path('app/public/events'), 0755, true);
            }

            $manager = new ImageManager(new Driver());
            $manager->read($image)
                ->scaleDown(width: 1200)
                ->toJpeg(quality: 75)
                ->save($savePath);

            $data['image'] = 'events/' . $filename;
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    public function eventDelete(Event $event)
    {
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }

    // ─── Syllabus ────────────────────────────────────

    public function syllabusList()
    {
        $syllabi = Syllabus::latest()->paginate(10);
        return view('admin.syllabus.index', compact('syllabi'));
    }

    public function syllabusStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'required|mimes:pdf|max:10240',
        ]);

        $pdfPath = $request->file('pdf')->store('syllabus', 'public');

        Syllabus::create([
            'title' => $request->title,
            'pdf' => $pdfPath,
        ]);

        return redirect()->route('admin.syllabus.index')->with('success', 'Syllabus added successfully!');
    }

    public function syllabusUpdate(Request $request, Syllabus $syllabus)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        $data = ['title' => $request->title];

        if ($request->hasFile('pdf')) {
            if ($syllabus->pdf && Storage::disk('public')->exists($syllabus->pdf)) {
                Storage::disk('public')->delete($syllabus->pdf);
            }
            $data['pdf'] = $request->file('pdf')->store('syllabus', 'public');
        }

        $syllabus->update($data);

        return redirect()->route('admin.syllabus.index')->with('success', 'Syllabus updated successfully!');
    }

    public function syllabusDelete(Syllabus $syllabus)
    {
        if ($syllabus->pdf && Storage::disk('public')->exists($syllabus->pdf)) {
            Storage::disk('public')->delete($syllabus->pdf);
        }

        $syllabus->delete();

        return redirect()->route('admin.syllabus.index')->with('success', 'Syllabus deleted successfully!');
    }

    // ─── Results ─────────────────────────────────────

    public function resultsList()
    {
        $results = Result::latest()->paginate(10);
        return view('admin.results.index', compact('results'));
    }

    public function resultStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'required|mimes:pdf|max:10240',
        ]);

        $pdfPath = $request->file('pdf')->store('results', 'public');

        Result::create([
            'title' => $request->title,
            'pdf' => $pdfPath,
        ]);

        return redirect()->route('admin.results.index')->with('success', 'Result added successfully!');
    }

    public function resultUpdate(Request $request, Result $result)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        $data = ['title' => $request->title];

        if ($request->hasFile('pdf')) {
            if ($result->pdf && Storage::disk('public')->exists($result->pdf)) {
                Storage::disk('public')->delete($result->pdf);
            }
            $data['pdf'] = $request->file('pdf')->store('results', 'public');
        }

        $result->update($data);

        return redirect()->route('admin.results.index')->with('success', 'Result updated successfully!');
    }

    public function resultDelete(Result $result)
    {
        if ($result->pdf && Storage::disk('public')->exists($result->pdf)) {
            Storage::disk('public')->delete($result->pdf);
        }

        $result->delete();

        return redirect()->route('admin.results.index')->with('success', 'Result deleted successfully!');
    }

    // ─── Latest News ────────────────────────────────

    public function latestNewsList()
    {
        $news = LatestNews::latest()->paginate(10);
        return view('admin.latest-news.index', compact('news'));
    }

    public function latestNewsStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        LatestNews::create([
            'title' => $request->title,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.latest-news.index')->with('success', 'News item added successfully!');
    }

    public function latestNewsUpdate(Request $request, LatestNews $latestNews)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $latestNews->update([
            'title' => $request->title,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.latest-news.index')->with('success', 'News item updated successfully!');
    }

    public function latestNewsToggle(LatestNews $latestNews)
    {
        $latestNews->update(['status' => !$latestNews->status]);

        return redirect()->route('admin.latest-news.index')->with('success', 'Status updated successfully!');
    }

    public function latestNewsDelete(LatestNews $latestNews)
    {
        $latestNews->delete();

        return redirect()->route('admin.latest-news.index')->with('success', 'News item deleted successfully!');
    }

    // ─── Careers ─────────────────────────────────────

    public function careersList()
    {
        $careers = Career::latest()->paginate(10);
        return view('admin.careers.index', compact('careers'));
    }

    public function careerStore(Request $request)
    {
        $request->validate([
            'post_name' => 'required|string|max:255',
            'openings' => 'required|string|max:255',
            'qualifications' => 'required|string|max:500',
        ]);

        Career::create([
            'post_name' => $request->post_name,
            'openings' => $request->openings,
            'qualifications' => $request->qualifications,
        ]);

        return redirect()->route('admin.careers.index')->with('success', 'Career opening added successfully!');
    }

    public function careerUpdate(Request $request, Career $career)
    {
        $request->validate([
            'post_name' => 'required|string|max:255',
            'openings' => 'required|string|max:255',
            'qualifications' => 'required|string|max:500',
        ]);

        $career->update([
            'post_name' => $request->post_name,
            'openings' => $request->openings,
            'qualifications' => $request->qualifications,
        ]);

        return redirect()->route('admin.careers.index')->with('success', 'Career opening updated successfully!');
    }

    public function careerDelete(Career $career)
    {
        $career->delete();

        return redirect()->route('admin.careers.index')->with('success', 'Career opening deleted successfully!');
    }
}
