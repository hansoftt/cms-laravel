<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::latest()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages',
            'type' => 'required|in:single-column,2-columns,3-columns',
            'content1' => 'required_if:type,single-column|string',
            'content2' => 'required_if:type,2-columns,3-columns|string',
            'content3' => 'required_if:type,3-columns|string',
        ]);

        $data = $request->only(['title', 'slug', 'type', 'content1', 'content2', 'content3']);

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        } else {
            $data['slug'] = Str::slug($data['slug']);
        }

        $page = Page::create($data);

        // Handle header image using Media Library
        if ($request->hasFile('header_image')) {
            $page->addMediaFromRequest('header_image')
                 ->toMediaCollection('header-images');
        }

        return redirect()->route('admin.pages.index')
                         ->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug = 'home')
    {
        $menu = Menu::where('name', Str::title(str_replace('-', ' ', $slug)))->first();

        // First check if there's a custom view for this slug
        if ($slug && view()->exists('pages.' . $slug)) {
            if (($menu && $menu->type === 'static') || $slug === 'home') {
                return view('pages.' . $slug);
            }
        }

        $request = app(Request::class);

        // Check if there's a route with this slug name and call its controller method
        if (Route::has($slug)) {
            try {
                // Get the route information
                $route = Route::getRoutes()->getByName($slug);

                if ($route && $route->getActionName() !== 'App\Http\Controllers\PageController@show') {
                    // Extract controller and method from the action
                    $action = $route->getAction();
                    $controller = $action['controller'] ?? null;

                    if ($controller && strpos($controller, '@') !== false) {
                        list($controllerClass, $method) = explode('@', $controller);

                        // Check if controller class exists and method is callable
                        if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
                            $controllerInstance = app()->make($controllerClass);

                            // Call the controller method with the request
                            return app()->call([$controllerInstance, $method], [$request]);
                        }
                    }
                }
            } catch (\Exception $e) {
                // If there's any error calling the route, continue to page lookup
            }
        }

        // Check if there's a page with this slug
        $page = Page::where('slug', $slug)->first();

        if ($page) {
            // Check if this is an admin request (coming from admin panel)
            if ($request->has('admin') || $request->is('admin/*')) {
                return view('admin.pages.show', compact('page'));
            }

            // Return frontend page view based on type
            return $this->renderPageContent($page);
        }

        // Show hard coded page for slug if exists
        if (view()->exists('pages.' . $slug)) {
            return view('pages.' . $slug);
        }

        // If no page found, show 404
        abort(404, 'Page not found');
    }

    /**
     * Render page content based on type.
     */
    private function renderPageContent(Page $page)
    {
        $data = [
            'page' => $page,
            'title' => $page->title,
        ];

        // Add content fields based on page type
        switch($page->type) {
            case 'single-column':
                $data['content'] = $page->content1;
                break;
            case '2-columns':
                $data['left_content'] = $page->content1;
                $data['right_content'] = $page->content2;
                break;
            case '3-columns':
                $data['left_content'] = $page->content1;
                $data['middle_content'] = $page->content2;
                $data['right_content'] = $page->content3;
                break;
        }

        return view('page', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug,' . $page->id,
            'type' => 'required|in:single-column,2-columns,3-columns',
            'content1' => 'required_if:type,single-column|string',
            'content2' => 'required_if:type,2-columns,3-columns|string',
            'content3' => 'required_if:type,3-columns|string',
        ]);

        $data = $request->only(['title', 'slug', 'type', 'content1', 'content2', 'content3']);

        // Handle header image using Media Library
        if ($request->hasFile('header_image')) {
            // Clear existing header images and add new one
            $page->clearMediaCollection('header-images');
            $page->addMediaFromRequest('header_image')
                 ->toMediaCollection('header-images');
        } elseif ($request->has('remove_header_image') && $request->remove_header_image === '1') {
            // Remove header image
            $page->clearMediaCollection('header-images');
        }

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        } else {
            $data['slug'] = Str::slug($data['slug']);
        }

        $page->update($data);

        return redirect()->route('admin.pages.index')
                         ->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $pageId = $page->id;
        $mediaCount = $page->getMediaCount();

        Log::info("Deleting page {$pageId} with {$mediaCount} media files");

        $page->delete();

        Log::info("Page {$pageId} deleted successfully - Media files should be cascade deleted");

        return redirect()->route('admin.pages.index')
                         ->with('success', 'Page deleted successfully.');
    }

    /**
     * Upload content image for Summernote editor using Media Library disk logic.
     */
    public function uploadContentImage(Request $request)
    {
        Log::info('Content image upload request received');
        Log::info('Request files: ' . json_encode($request->allFiles()));
        Log::info('Request has file: ' . ($request->hasFile('image') ? 'true' : 'false'));

        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);

        Log::info('Content image validation passed successfully');

        try {
            // Use Media Library's built-in temporary upload handling
            // The Media Library will automatically use the configured disk ('public')
            // Files will be stored in storage/app/public/ and accessible via public/storage/

            $image = $request->file('image');

            // Generate unique filename using Media Library's naming strategy
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Use Laravel's Storage facade with the Media Library's configured disk
            $disk = config('media-library.disk_name', 'public');
            $path = $image->storeAs('media/content-images', $filename, $disk);

            // Verify file was uploaded successfully using Storage
            if (!Storage::disk($disk)->exists($path)) {
                throw new \Exception('Failed to save file to Media Library disk');
            }

            // Generate URL using Laravel's asset helper (Media Library compatible)
            $url = asset('storage/' . $path);

            Log::info('Content image uploaded successfully via Media Library. URL: ' . $url);
            Log::info('Storage path: ' . $path);

            return response()->json([
                'success' => true,
                'message' => 'Image uploaded successfully via Media Library',
                'url' => $url,
                'filename' => $filename,
                'storage_path' => $path,
                'disk' => 'public'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid file format or size',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Content image upload failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to upload image via Media Library: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Upload header image for pages using Media Library disk logic.
     */
    public function uploadHeaderImage(Request $request)
    {
        Log::info('Header image upload request received');
        Log::info('Request files: ' . json_encode($request->allFiles()));
        Log::info('Request has file: ' . ($request->hasFile('header_image') ? 'true' : 'false'));

        // Validate the uploaded file
        $request->validate([
            'header_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);

        Log::info('Header image validation passed');

        try {
            // Use Media Library's built-in disk logic for header images
            // Files will be stored using the configured 'public' disk
            $image = $request->file('header_image');

            // Generate unique filename using Media Library's naming strategy
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Use Laravel's Storage facade with the Media Library's configured disk
            $disk = config('media-library.disk_name', 'public');
            $path = $image->storeAs('media/header-images', $filename, $disk);

            // Verify file was uploaded successfully using Storage
            if (!Storage::disk($disk)->exists($path)) {
                throw new \Exception('Failed to save file to Media Library disk');
            }

            // Generate URL using Laravel's asset helper (Media Library compatible)
            $url = asset('storage/' . $path);

            Log::info('Header image uploaded successfully via Media Library. URL: ' . $url);
            Log::info('Storage path: ' . $path);

            return response()->json([
                'success' => true,
                'message' => 'Header image uploaded successfully via Media Library',
                'url' => $url,
                'filename' => $filename,
                'storage_path' => $path,
                'disk' => 'public'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid file format or size',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Header image upload failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to upload header image via Media Library: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Test cascade delete functionality (for debugging).
     */
    public function testCascadeDelete(Page $page)
    {
        $pageId = $page->id;
        $mediaCount = $page->getMediaCount();
        $headerImagesCount = $page->getHeaderImagesCount();

        $result = [
            'page_id' => $pageId,
            'media_count_before' => $mediaCount,
            'header_images_count_before' => $headerImagesCount,
            'media_files' => $page->media->pluck('id', 'name')->toArray(),
        ];

        // Delete the page (this should trigger cascade delete)
        $page->delete();

        Log::info('Cascade delete test completed for page: ' . $pageId);

        return response()->json([
            'success' => true,
            'message' => 'Cascade delete test completed',
            'result' => $result
        ]);
    }
}
