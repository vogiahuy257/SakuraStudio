
//  const languageSelector = document.getElementById('languageSelector');
//  languageSelector.addEventListener('change', function () {
//      const selectedLanguage = this.value;
//      loadLanguage(selectedLanguage);
//  });
 loadLanguage('en');
 

 function loadLanguage(lang) {
     fetch(`/js/lang/${lang}.json`)
         .then(response => response.json())
         .then(data => {
             document.getElementById('settingHeaderText').textContent = data.setting;
            document.getElementById('settingText').textContent = data.setting;
            document.getElementById('dashboardText').textContent = data.dashboard;
            document.getElementById('userText').textContent = data.user
         })
         .catch(error => console.error('Error loading language file:', error));
 }