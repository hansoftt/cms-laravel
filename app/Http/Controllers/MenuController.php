<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::roots()->ordered()->with('children')->get();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pages = Page::all();
        $parentMenus = Menu::roots()->ordered()->get();
        return view('admin.menus.create', compact('pages', 'parentMenus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:internal,external,static',
            'url' => 'nullable|string|max:255',
            'page_id' => 'nullable|exists:pages,id',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Custom validation for internal vs external
        if ($request->type === 'internal') {
            $request->validate([
                'page_id' => 'required|exists:pages,id',
                'url' => 'nullable|string|max:255',
            ]);
        } elseif ($request->type === 'external') {
            $request->validate([
                'url' => 'required|string|max:255',
                'page_id' => 'nullable|exists:pages,id',
            ]);
        } else {
            // Static type
            $request->validate([
                'url' => 'nullable|string|max:255',
                'page_id' => 'nullable|exists:pages,id',
            ]);
        }

        $data = $request->only(['name', 'type', 'url', 'page_id', 'parent_id', 'order', 'is_active']);
        $data['order'] = $data['order'] ?? 0;
        $data['is_active'] = $request->has('is_active');

        Menu::create($data);

        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('admin.menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $pages = Page::all();
        $parentMenus = Menu::where('id', '!=', $menu->id)
                          ->roots()
                          ->ordered()
                          ->get();
        return view('admin.menus.edit', compact('menu', 'pages', 'parentMenus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:internal,external,static',
            'url' => 'nullable|string|max:255',
            'page_id' => 'nullable|exists:pages,id',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Custom validation for internal vs external
        if ($request->type === 'internal') {
            $request->validate([
                'page_id' => 'required|exists:pages,id',
                'url' => 'nullable|string|max:255',
            ]);
        } elseif ($request->type === 'external') {
            $request->validate([
                'url' => 'required|string|max:255',
                'page_id' => 'nullable|exists:pages,id',
            ]);
        } else {
            // Static type
            $request->validate([
                'url' => 'nullable|string|max:255',
                'page_id' => 'nullable|exists:pages,id',
            ]);
        }

        $data = $request->only(['name', 'type', 'url', 'page_id', 'parent_id', 'order', 'is_active']);
        $data['order'] = $data['order'] ?? 0;
        $data['is_active'] = $request->has('is_active');

        $menu->update($data);

        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        // Check if menu has children
        if ($menu->hasChildren()) {
            return redirect()->route('admin.menus.index')
                             ->with('error', 'Cannot delete menu with child items. Please delete child items first.');
        }

        $menu->delete();

        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu deleted successfully.');
    }
}
