n("en");function n(t){fetch(`/js/lang/${t}.json`).then(e=>e.json()).then(e=>{document.getElementById("settingHeaderText").textContent=e.setting,document.getElementById("settingText").textContent=e.setting,document.getElementById("dashboardText").textContent=e.dashboard,document.getElementById("userText").textContent=e.user}).catch(e=>console.error("Error loading language file:",e))}
