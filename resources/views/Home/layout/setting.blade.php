

<div class="mt-2 rounded shadow p-2">
    <h1 class="h2" id="settingHeaderText">Setting</h1>
    <div class="p-3">
        <h5 id="languageHeaderText">language:</h5>
        <form action="{{ route('language.switch') }}" method="POST">
            @csrf
            <select id="languageSelector" name="language" class="form-select form-select-sm" onchange="this.form.submit()">
                <option value="en" @if(session('locale', 'en') == 'en') selected @endif>English</option>
                <option value="vi" @if(session('locale') == 'vi') selected @endif>Vietnamese</option>
                <option value="jp" @if(session('locale') == 'jp') selected @endif>Japanese</option>
            </select>
        </form>
    </div>
</div>