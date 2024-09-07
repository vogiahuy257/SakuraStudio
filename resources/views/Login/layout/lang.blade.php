<div class="d-flex justify-content-end align-items-center mt-2 customBoxLanguage">
    <i class="bi bi-globe me-2"></i>
    <form action="{{ route('language.switch') }}" method="POST">
        @csrf
        <select id="languageSelector" name="language" class="form-select form-select-sm" onchange="this.form.submit()">
            <option value="en" @if(session('locale', 'en') == 'en') selected @endif>English</option>
            <option value="vi" @if(session('locale') == 'vi') selected @endif>Vietnamese</option>
            <option value="jp" @if(session('locale') == 'jp') selected @endif>Japanese</option>
        </select>
    </form>
</div>