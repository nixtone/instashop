<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    <div class="tab-area">
        <div class="tab-label message">
            <div class="tab-item active">Основное</div>
            <div class="tab-item">Характеристики</div>
            <div class="tab-item">SEO</div>
        </div>
        <div class="tab-page">

            {{-- Основное --}}
            <div class="tab-item active">
                <div class="field_area">
                    <label for="name_field">Название @error('name') <span class="err">{{ $message }}</span> @enderror</label>
                    <input type="text" name="name" id="name_field" class="field" value="{{ old('name', $category->name ?? '') }}">
                </div>
                <div class="field_area">
                    <label for="slug_field">Транслит @error('slug') <span class="err">{{ $message }}</span> @enderror</label>
                    <input type="text" name="slug" id="slug_field" class="field" value="{{ old('slug', $category->slug ?? '') }}">
                </div>
                <div class="field_area">
                    <label for="short_name_field">Короткое название @error('short_name') <span class="err">{{ $message }}</span> @enderror</label>
                    <input type="text" name="short_name" id="short_name_field" class="field" value="{{ old('short_name', $category->short_name ?? '') }}">
                </div>
                <div class="field_area">
                    <label for="parent_id_field">Родительская категория</label>
                    <select name="parent_id" id="parent_id_field" class="field">
                        {{-- TODO: раскинуть selected create update --}}
                        <option value="">не выбрано</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" @if(isset($category) AND $category->id == $cat->id) selected @endif>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field_area">
                    <label for="preview_field">Превью</label>
                    <input type="file" name="preview[]" id="preview_field" class="field" @accept('image') multiple>
                    @if(isset($category) AND $category->getFiles('preview')->count())
                        <div class="preview-list" style="">
                            @foreach($category->getFiles('preview') as $preview)
                                <a href="{{ $preview }}" class="preview-link">
                                    <img src="{{ $preview }}" alt="" class="preview">
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="field_area">
                    <label for="external_link_field">Ссылка для парсинга @error('external_link') <span class="err">{{ $message }}</span> @enderror</label>
                    <input type="text" name="external_link" id="external_link_field" class="field" value="{{ old('external_link', $category->external_link ?? '') }}">
                </div>
                <div class="field_area">
                    <label for="sort_field">Сортировка @error('sort') <span class="err">{{ $message }}</span> @enderror</label>
                    <input type="text" name="sort" id="sort_field" class="field" value="{{ old('sort', $category->sort ?? '') }}">
                </div>
                <div class="field_area check">
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" name="active" id="active_field" @if(isset($category) AND $category->active) checked @endif value="1">
                    <label for="active_field">Активность @error('active') <span class="err">{{ $message }}</span> @enderror</label>
                </div>
            </div>

            {{-- Характеристики --}}
            <div class="tab-item">
                @foreach($options as $option)
                    <div class="field_area">
                        <input
                            type="checkbox"
                            name="options[]"
                            id="option{{ $option->id }}_field"
                            value="{{ $option->id }}"
                            @if($category && $category->options->contains($option->id)) checked @endif>
                        <label for="option{{ $option->id }}_field">{{ $option->name }}</label>
                    </div>
                @endforeach
            </div>

            {{-- SEO --}}
            <div class="tab-item">
                <div class="field_area">
                    <label for="seo_title_field">Title @error('seo_title') <span class="err">{{ $message }}</span> @enderror</label>
                    <input type="text" name="seo_title" id="seo_title_field" class="field" value="{{ old('seo_title', $category->seo_title ?? '') }}">
                </div>
                <div class="field_area">
                    <label for="seo_description_field">Description @error('seo_description') <span class="err">{{ $message }}</span> @enderror</label>
                    <input type="text" name="seo_description" id="seo_description_field" class="field" value="{{ old('seo_description', $category->seo_description ?? '') }}">
                </div>
                <div class="field_area">
                    <label for="seo_keywords_field">Keywords @error('seo_keywords') <span class="err">{{ $message }}</span> @enderror</label>
                    <input type="text" name="seo_keywords" id="seo_keywords_field" class="field" value="{{ old('seo_keywords', $category->seo_keywords ?? '') }}">
                </div>
            </div>
        </div>
    </div>

    <div class="btn_area under">
        @csrf
        @if(isset($category))
            @method($method)
            <input type="submit" value="Редактировать" class="btn">
            <a href="{{ route('category.show', $category->slug) }}">На сайт</a>
        @else
            <input type="submit" value="Создать" class="btn">
        @endif
    </div>

</form>

@if(isset($category))
<div>
    <form action="{{ route('admin.category.delete', $category->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Удалить мягко">
    </form>
    <form action="{{ route('admin.category.delete.force', $category->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Удалить жестко">
    </form>
</div>
@endif
