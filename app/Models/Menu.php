<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'type',
        'url',
        'page_id',
        'parent_id',
        'order',
        'is_active',
    ];

    /**
     * Get the page that this menu item links to (for internal links).
     */
    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Get the parent menu item.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    /**
     * Get the child menu items.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order');
    }

    /**
     * Get all descendant menu items.
     */
    public function descendants()
    {
        return $this->children()->with('descendants');
    }

    /**
     * Get the full URL for this menu item.
     */
    public function getFullUrlAttribute(): string
    {
        if ($this->type === 'internal' && $this->page) {
            return route('pages.show', $this->page->slug);
        }
        if ($this->type === 'static') {
            $url = Str::slug($this->name);
            return url($url);
        }

        return $this->url ?? '#';
    }

    /**
     * Check if this menu item has children.
     */
    public function hasChildren(): bool
    {
        return $this->children()->count() > 0;
    }

    /**
     * Scope for active menu items.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for root menu items (no parent).
     */
    public function scopeRoots($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Scope for ordered menu items.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('name');
    }
}
