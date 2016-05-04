<tr class="{{ $post->is_pinned == '1' ? 'warning' : '' }} {{ in_array($post->status, ['draft', 'deleted', 'refused']) ? 'active' : '' }}">
    <td>
        <div>
            {{ $post->id }}
        </div>
        <div>
            <span title="Views" class="label label-{{ ($post->views > 0) ? 'success' : 'danger' }}">{{ $post->views or '0' }}</span>
        </div>
    </td>
    <td>
        <div>
            <a href="{{ route('root-post-edit', ['post_id' => $post->id]) }}">{!! highlight_str($post->title, $q) !!}</a>
            @if($post->status == 'draft')
                <span class="purple-text">Draft</span>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="post-options">
                    <a href="{{ route('view', ['slug' => $post->slug]) }}" target="_blank"
                       class="brown-text">View</a>
                    <a href="{{ route('root-post-edit', ['post_id' => $post->id]) }}"
                       class="brown-text">Edit</a>
                    @if($post->status == 'active')
                        <a href="{{ route('root-post-to-draft', ['post_id' => $post->id]) }}"
                           class="brown-text">To Draft</a>
                    @else
                        <a href="{{ route('root-post-to-active', ['post_id' => $post->id]) }}"
                           class="brown-text">Publish</a>
                    @endif
                    @if($post->status != 'deleted')
                        <a href="{{ route('root-post-to-deleted', ['post_id' => $post->id]) }}"
                           class="brown-text">Delete</a>
                    @else
                        <a href="{{ route('root-post-to-draft', ['post_id' => $post->id]) }}"
                           class="brown-text">Recover</a>
                    @endif
                    @if($post->is_pinned)
                        <a href="{{ route('root-post-unpin', ['post_id' => $post->id]) }}"
                           class="brown-text">Unpin</a>
                    @else
                        <a href="{{ route('root-post-pin', ['post_id' => $post->id]) }}"
                           class="brown-text">Pin</a>
                    @endif
                </div>
            </div>
            <div class="col-md-6 text-right">
                <div class="post-category text-muted pull-right">
                    <div class="dropdown">
                        <a id="drop3" class="dropdown-toggle btn btn-xs btn-{{ ($post->category_id == '1' ? 'danger' : 'info') }}"
                           aria-expanded="false" aria-haspopup="true"
                           role="button" data-toggle="dropdown" href="#">
                            {{ $post->category->title }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            @foreach($categories as $category)
                                <?php if($category->id == $post->category_id) continue; ?>
                                <li><a href="{{ route('root-post-to-category', ['post_id' => $post->id, 'category_id' => $category->id]) }}">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </td>
    <td>
        <div>
            {{ date('Y.m.d H:i', strtotime($post->published_at)) }}
        </div>
        <div>
            <small class="text-muted">{{ hdate($post->published_at) }}</small>
        </div>
    </td>
</tr>
