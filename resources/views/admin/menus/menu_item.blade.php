<div class="menu-item">
    <div class="menu-item-header">
        <div class="menu-info">
            <div>
                <strong>{{ $menu->name }}</strong>
                <div class="menu-meta">
                    @if($menu->type === 'internal' && $menu->page)
                        <span class="menu-badge badge-primary">Internal</span>
                        <span>→ {{ $menu->page->title }}</span>
                    @elseif($menu->type === 'external')
                        <span class="menu-badge badge-success">External</span>
                        <span>→ {{ $menu->url }}</span>
                    @elseif($menu->type === 'static')
                        <span class="menu-badge badge-warning">Static</span>
                        <span>→ {{ $menu->url }}</span>
                    @else
                        <span class="menu-badge badge-secondary">No Type</span>
                    @endif
                    @if($menu->order > 0)
                        <span>• Order: {{ $menu->order }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="menu-actions">
            <a href="{{ route('admin.menus.show', $menu) }}" class="btn btn-sm btn-info">
                <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this menu?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </div>

    @if($menu->hasChildren())
    <div class="menu-item-children">
        @foreach($menu->children as $child)
            <div class="menu-item-child">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $child->name }}</strong>
                        <div class="menu-meta">
                            @if($child->type === 'internal' && $child->page)
                                <span class="menu-badge badge-primary">Internal</span>
                                <span>→ {{ $child->page->title }}</span>
                            @elseif($child->type === 'external')
                                <span class="menu-badge badge-success">External</span>
                                <span>→ {{ $child->url }}</span>
                            @elseif($child->type === 'static')
                                <span class="menu-badge badge-warning">Static</span>
                                <span>→ {{ $child->url }}</span>
                            @else
                                <span class="menu-badge badge-secondary">No Type</span>
                            @endif
                            @if($child->order > 0)
                                <span>• Order: {{ $child->order }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="menu-actions">
                        <a href="{{ route('admin.menus.show', $child) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.menus.edit', $child) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.menus.destroy', $child) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this menu?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>
