<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="settingHeaderText">Setting</h1>
</div>

<div class="mt-2 rounded shadow p-2">
    <div class="p-3">
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