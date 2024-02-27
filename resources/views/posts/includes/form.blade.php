@csrf
<div class="form-content">

    <div class="form-element">
        <div>
            <label for="title">Title</label>
            @error('title')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
        <!-- Oude manier: (werkt nog steeds) <?= isset($_POST['title'])? $_POST['title'] : $post->title ?> $post->title ipv $post['title'] omdat $post hier een object is en geen array.-->
    </div>

    <div class="form-element">
        <div>
            <label for="subtitle">Subtitle</label>
            @error('subtitle')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $post->subtitle) }}">
    </div>

    @if($post->id)
        <div class="form-element">
            <div>
                <label for="url">Url</label>
                @error('url')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
            <input type="text" name="url" id="url" value="{{ old('url,', $post->url) }}">
        </div>
    @endif

    <div>
        <label>
            <input type="checkbox" value="1" name="published" id="published" {{ old('published', $post->published) ? 'checked' : '' }}>
            {{--
            De eerste parameter van de old-functie = value van formulierveld 'published'. Tweede parameter = default value, hier ingevuld als tabeldata.
            Dus indien formulier(request) NIET aangevinkt, dan wordt aangevinkt afhankelijk van tabeldata.
            Indien formulier WEL aangevinkt, dan wordt aangevinkt en zelfs niet gekeken naar tabeldata.
            --}}
            Published
        </label>
        @error('published')
            <div class="form-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-element">
        <div>
            <label for="status">Status</label>
            @error('status')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <select name="status" id="status">
            @foreach (['draft', 'final'] as $option)
                <option value="{{ $option }}" {{ old('status', $post->status) == $option ? 'selected' : '' }}>
                    {{ ucfirst($option) }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-element">
        <div>
            <label for="content">Content</label>
            @error('content')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>
        <textarea name="content" id="content">{{ old('content', $post->content) }}</textarea>
    </div>

    <div>
        <input type="submit" value="{{ $buttonText ?? 'Save' }}"> <!--Buttontext is variabel omdat form voor zowel toevoegen als aanpassen wordt gebruikt.-->
    </div>

</div>
