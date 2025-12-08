<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Page extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = [
        'title',
        'slug',
        'type',
        'content1',
        'content2',
        'content3',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            } else {
                $page->slug = Str::slug($page->slug);
            }
        });

        static::updating(function ($page) {
            if ($page->isDirty('title') && empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            } elseif ($page->isDirty('title')) {
                $page->slug = Str::slug($page->title);
            }
        });

        // Add cascade delete for media files
        static::deleting(function ($page) {
            // Log the deletion for debugging
            Log::info('Deleting page with ID: ' . $page->id . ' - Media files will be cascade deleted');

            // The Media Library's InteractsWithMedia trait handles automatic cleanup
            // via database foreign key constraints, but we'll add explicit cleanup for safety
            if ($page->media()->count() > 0) {
                $mediaCount = $page->media()->count();
                Log::info("Page {$page->id} has {$mediaCount} media files to be deleted");

                // Clear all media collections to ensure clean deletion
                $page->clearMediaCollection('header-images');
                $page->clearMediaCollection('content-images');

                // Get remaining media count after clearing header-images collection
                $remainingMedia = $page->media()->count();
                if ($remainingMedia > 0) {
                    Log::warning("Page {$page->id} still has {$remainingMedia} media files after clearing collections");
                }
            }
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get content fields based on page type.
     */
    public function getContentFields()
    {
        switch($this->type) {
            case 'single-column':
                return ['content1'];
            case '2-columns':
                return ['content1', 'content2'];
            case '3-columns':
                return ['content1', 'content2', 'content3'];
            default:
                return ['content1'];
        }
    }

    /**
     * Get content values based on page type.
     */
    public function getContentValues()
    {
        $fields = $this->getContentFields();
        $values = [];

        foreach($fields as $field) {
            $values[$field] = $this->$field;
        }

        return $values;
    }

    /**
     * Check if page has multiple columns.
     */
    public function hasMultipleColumns()
    {
        return in_array($this->type, ['2-columns', '3-columns']);
    }

    /**
     * Get header image URL using Media Library pattern.
     */
    public function getHeaderImageUrl()
    {
        $media = $this->getFirstMedia('header-images');
        return $media ? $media->getUrl() : asset('assets/img/banner/banner1.jpg');
    }

    /**
     * Get header image path using Media Library pattern.
     */
    public function getHeaderImagePath()
    {
        $media = $this->getFirstMedia('header-images');
        return $media ? $media->getPath() : null;
    }

    /**
     * Check if page has header image using Media Library pattern.
     */
    public function hasHeaderImage()
    {
        return $this->getMedia('header-images')->isNotEmpty();
    }

    /**
     * Delete header image using Media Library pattern.
     */
    public function deleteHeaderImage()
    {
        $this->clearMediaCollection('header-images');
    }

    /**
     * Add header image using Media Library pattern.
     */
    public function addHeaderImage($file)
    {
        // Clear existing header images first (only one allowed)
        $this->clearMediaCollection('header-images');

        // Add new header image
        return $this->addMediaFromRequest('header_image')
                    ->toMediaCollection('header-images');
    }

    /**
     * Register media collections.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('header-images')
             ->singleFile()
             ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);

        $this->addMediaCollection('content-images')
             ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);
    }

    /**
     * Register media conversions.
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
             ->width(300)
             ->height(300)
             ->sharpen(10)
             ->optimize()
             ->nonQueued();
    }

    /**
     * Get media count for debugging.
     */
    public function getMediaCount()
    {
        return $this->media()->count();
    }

    /**
     * Get header images count for debugging.
     */
    public function getHeaderImagesCount()
    {
        return $this->getMedia('header-images')->count();
    }

    /**
     * Force delete all media (for testing cascade delete).
     */
    public function forceDeleteAllMedia()
    {
        $mediaItems = $this->media;

        foreach ($mediaItems as $media) {
            Log::info('Force deleting media ID: ' . $media->id . ' for page: ' . $this->id);
            $media->delete();
        }

        return $this->getMediaCount() === 0;
    }

    /**
     * Attach content image to page (for images uploaded through Summernote).
     */
    public function attachContentImage($imageUrl)
    {
        // Extract filename from URL
        $filename = basename(parse_url($imageUrl, PHP_URL_PATH));

        // Check if file exists in content-images directory
        $sourcePath = storage_path('app/public/media/content-images/' . $filename);

        if (file_exists($sourcePath)) {
            // Move file to page's content-images collection
            $media = $this->addMedia($sourcePath)
                         ->usingName($filename)
                         ->usingFileName($filename)
                         ->toMediaCollection('content-images');

            // Remove the temporary file
            unlink($sourcePath);

            Log::info('Content image attached to page: ' . $this->id . ', media ID: ' . $media->id);

            return $media;
        }

        return null;
    }

    /**
     * Get content images for this page.
     */
    public function getContentImages()
    {
        return $this->getMedia('content-images');
    }
}
