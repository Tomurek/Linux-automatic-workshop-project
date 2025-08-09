// JS dla stron demo
function showAddUser() {
  document.getElementById('showAddUser').style.display = 'flex';
}
function hideAddUser() {
  document.getElementById('showAddUser').style.display = 'none';
}
function showEditUser() {
  document.getElementById('showEditUser').style.display = 'flex';
}
function hideEditUser() {
  document.getElementById('showEditUser').style.display = 'none';
}
function showDellUser() {
  document.getElementById('showDellUser').style.display = 'flex';
}
function hideDellUser() {
  document.getElementById('showDellUser').style.display = 'none';
}
function showAdd() {
  document.getElementById('showAdd').style.display = 'flex';
}
function hideAdd() {
  document.getElementById('showAdd').style.display = 'none';
}
function showEdit() {
  document.getElementById('showEdit').style.display = 'flex';
}
function hideEdit() {
  document.getElementById('showEdit').style.display = 'none';
}
function showDell() {
  document.getElementById('showDell').style.display = 'flex';
}
function hideDell() {
  document.getElementById('showDell').style.display = 'none';
}
function showBackup() {
  document.getElementById('showBackup').style.display = 'flex';
}
function hideBackup() {
  document.getElementById('showBackup').style.display = 'none';
}
// Status demo
let services = [
  { name: 'ATFTPD', status: 'RUNNING', type: 'server' },
  { name: 'SSH', status: 'OFFLINE', type: 'error' },
  { name: 'WWW', status: 'WARNING', type: 'warning' }
];
function renderStatus() {
  const tbody = document.getElementById('statusBody');
  if (!tbody) return;
  tbody.innerHTML = '';
  services.forEach(service => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td data-title='Usługa'>${service.name}</td>
      <td data-title='Status'>
        <div class='box'>
          <div class='server ${service.type}'>
            <ul style='display:flex;gap:2px;padding:0;margin:0;'>
              <li></li><li></li><li></li><li></li><li></li><li></li>
            </ul>
          </div>
          <span>${service.status}</span>
        </div>
      </td>
      <td class='select'>
        ${service.status === 'RUNNING' ? `<button class='button' onclick='changeStatus("${service.name}","OFFLINE")'>Wyłącz</button>` : `<button class='button' onclick='changeStatus("${service.name}","RUNNING")'>Restart</button>`}
        <button class='button' onclick='refreshStatus()'>Odśwież</button>
      </td>
    `;
    tbody.appendChild(tr);
  });
}
function changeStatus(name, newStatus) {
  const idx = services.findIndex(s => s.name === name);
  if(idx !== -1) {
    services[idx].status = newStatus;
    services[idx].type = newStatus === 'RUNNING' ? 'server' : (newStatus === 'OFFLINE' ? 'error' : 'warning');
    renderStatus();
  }
}
function refreshStatus() {
  renderStatus();
}
window.onload = function() {
  if (typeof renderStatus === 'function') renderStatus();
};

// Motyw demo zgodny z wersją PHP
function switchTheme(event) {
  if (event.target.checked) {
    document.documentElement.setAttribute('data-theme', 'dark');
    localStorage.setItem('theme', 'dark');
  } else {
    document.documentElement.setAttribute('data-theme', 'light');
    localStorage.setItem('theme', 'light');
  }
}

window.addEventListener('DOMContentLoaded', function() {
  const toggleSwitch = document.getElementById('dark-mode-switch');
  // Ustaw motyw na podstawie localStorage
  const currentTheme = localStorage.getItem('theme');
  if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);
    if (toggleSwitch) toggleSwitch.checked = currentTheme === 'dark';
  }
  if (toggleSwitch) {
    toggleSwitch.addEventListener('change', switchTheme, false);
  }
});
