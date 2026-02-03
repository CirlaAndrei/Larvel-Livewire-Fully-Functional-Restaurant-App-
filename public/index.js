console.log('index.js loaded');

// Wait for DOM to be fully ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded');
    console.log('Custom dropdowns found:', document.querySelectorAll('.custom-dropdown').length);
    console.log('Custom dropdown roles found:', document.querySelectorAll('.custom-dropdown-roles').length);
    
    // --- Hamburger Menu ---
    const hamburger = document.querySelector('.hamburger');
    const navItems = document.querySelector('.nav-items');
    const close = document.querySelector('.close');
    const closeNav = document.querySelector('.nav') || document.querySelector('.nav-dashboard');

    if (hamburger && navItems && close) {
        hamburger.addEventListener('click', function() {
            if (navItems) navItems.classList.toggle('active');
            if (hamburger) hamburger.classList.toggle('active');
            if (close) close.classList.add('active');
        });
    }

    if (close && navItems && hamburger) {
        close.addEventListener('click', function() {
            if (navItems) navItems.classList.remove('active');
            if (hamburger) hamburger.classList.remove('active');
            if (close) close.classList.remove('active');
        });
    }

    // Fix: Check if closeNav exists before adding event listener
    if (closeNav) {
        document.body.addEventListener('click', function(e) {
            if (!closeNav.contains(e.target)) {
                if (navItems) navItems.classList.remove('active');
                if (hamburger) hamburger.classList.remove('active');
                if (close) close.classList.remove('active');
            }
        });
    }

    // --- Logout Dropdown ---
    const userLog = document.querySelector('.user-log');
    const dropdown = document.querySelector('.dropdown-options');

    if (userLog && dropdown) {
        userLog.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.classList.toggle('active');
        });

        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target) && !userLog.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });
    }

    // --- Sign / Login buttons ---
    const signBtn = document.getElementById('signButton');
    const logBtn = document.getElementById('logButton');

    if (signBtn && logBtn) {
    signBtn.addEventListener('click', () => {
        window.location.href = routes.register;
    });

    logBtn.addEventListener('click', () => {
        window.location.href = routes.login;
    });
    }
    // --- Highlight current page ---
    const currentPage = window.location.pathname;
    const signButton = document.querySelector('.btn-sign');
    const logButton = document.querySelector('.btn-log');

    if (currentPage === '/register' && signButton) {
        signButton.classList.add('highlight');
    } else if (currentPage === '/login' && logButton) {
        logButton.classList.add('highlight');
    }

    // --- INITIALIZE ALL DROPDOWNS HERE ---
    
    // 1. Regular custom dropdowns (for create user page)
    document.querySelectorAll('.custom-dropdown').forEach(dropdown => {
        const selected = dropdown.querySelector('.dropdown-selected');
        const options = dropdown.querySelector('.dropdown-roles');
        const hiddenInput = dropdown.querySelector('input[type="hidden"]');
        
        console.log('Initializing dropdown:', { dropdown, selected, options, hiddenInput });
        
        if (!selected || !options || !hiddenInput) {
            console.warn('Dropdown missing required elements');
            return;
        }

        // Toggle on click
        selected.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdown.classList.toggle('active');
            console.log('Dropdown toggled, active:', dropdown.classList.contains('active'));
        });

        // Handle option selection
        options.querySelectorAll('li').forEach(option => {
            option.addEventListener('click', (e) => {
                e.stopPropagation();
                selected.textContent = option.textContent;
                hiddenInput.value = option.dataset.value;
                dropdown.classList.remove('active');
                console.log('Option selected:', option.textContent, 'value:', option.dataset.value);
            });
        });

        // Close when clicking outside
        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });
    });

    // 2. User role dropdowns (for users table)
    initUserRoleDropdowns();
    
    // 3. Livewire integration
    if (typeof Livewire !== 'undefined') {
        console.log('Livewire detected, setting up hooks');
        Livewire.hook('message.processed', () => {
            console.log('Livewire update - reinitializing dropdowns');
            initUserRoleDropdowns();
        });
    }
});

// Function definitions (outside DOMContentLoaded)

function togglePasswordVisibility(inputId) {
    var passwordInput = document.getElementById(inputId);
    var eyeIcon = document.querySelector('.eye-icon');
    
    if (!passwordInput || !eyeIcon) {
        console.warn('Password input or eye icon not found');
        return;
    }

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        if (eyeIcon.dataset.open) eyeIcon.src = eyeIcon.dataset.open;
    } else {
        passwordInput.type = "password";
        if (eyeIcon.dataset.closed) eyeIcon.src = eyeIcon.dataset.closed;
    }
}

// Script for users - FIXED WITH NULL CHECKS
function toggleUsersDropdown() {
    var menu = document.getElementById('usersDropdownMenu');
    if (!menu) {
        console.warn('usersDropdownMenu not found');
        return;
    }
    
    if (menu.style.display === 'block') {
        menu.style.display = 'none';
    } else {
        menu.style.display = 'block';
    }
}

// Close dropdown when clicking outside - FIXED
document.addEventListener('click', function(event) {
    var dropdown = document.querySelector('.users-dropdown');
    var menu = document.getElementById('usersDropdownMenu');
    
    // Check if both elements exist
    if (!dropdown || !menu) return;
    
    if (!dropdown.contains(event.target)) {
        menu.style.display = 'none';
    }
});

function initUserRoleDropdowns() {
    console.log('Initializing user role dropdowns');
    document.querySelectorAll('.custom-dropdown-roles').forEach(dropdown => {
        if (dropdown.dataset.initialized === 'true') {
            console.log('Dropdown already initialized, skipping');
            return;
        }
        
        dropdown.dataset.initialized = 'true';
        console.log('Initializing dropdown:', dropdown);

        const selected = dropdown.querySelector('.dropdown-selected-users');
        const options = dropdown.querySelector('.dropdown-roles');
        const input = dropdown.querySelector('input[name="role"]');
        const form = dropdown;

        if (!selected || !options || !input || !form) {
            console.warn('User role dropdown missing elements');
            return;
        }

        selected.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdown.classList.toggle('active');
        });

        options.querySelectorAll('.role-item').forEach(item => {
            item.addEventListener('click', (e) => {
                e.stopPropagation();
                if (item.dataset.role && input) {
                    input.value = item.dataset.role;
                }
                if (selected && item.textContent) {
                    selected.textContent = item.textContent;
                }
                dropdown.classList.remove('active');
                if (form.submit) form.submit();
            });
        });
    });
}

// Initialize global click handler only once
if (!window.__userRoleDropdownGlobalClick) {
    window.__userRoleDropdownGlobalClick = true;

    document.addEventListener('click', () => {
        document.querySelectorAll('.custom-dropdown-roles.active').forEach(d => {
            if (d.classList) d.classList.remove('active');
        });
    });
}

// Optional: Add error boundary for unhandled errors
window.addEventListener('error', function(e) {
    console.error('Unhandled error:', e.error);
    return false;
});

// Optional: Add promise rejection handler
window.addEventListener('unhandledrejection', function(e) {
    console.error('Unhandled promise rejection:', e.reason);
});
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Mini chart function definition
    function miniChart(canvasId, data, color) {
        const ctx = document.getElementById(canvasId);
        if (!ctx) return;
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['', '', '', '', '', ''],
                datasets: [{
                    data: data,
                    borderColor: color,
                    backgroundColor: 'transparent',
                    tension: 0.4,
                    borderWidth: 2,
                    pointRadius: 0,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: false }
                },
                scales: {
                    x: { display: false },
                    y: { display: false }
                }
            }
        });
    }
    
    // 2. Create mini charts
    miniChart('incomeMini',    [120,140,160,150,180,200], '#22c55e');
    miniChart('ordersMini',    [30,40,35,50,60,55],       '#3b82f6');
    miniChart('customersMini', [10,20,18,25,30,28],       '#f59e0b');
    miniChart('visitorsMini',  [200,300,250,400,450,500], '#ef4444');
    
// 3. Orders chart with fixed height
const ordersCtx = document.getElementById('ordersChart');
if (ordersCtx) {
    new Chart(ordersCtx, {
        type: 'line',
        data: {
            labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
            datasets: [{
                label: 'Orders',
                data: [12, 19, 8, 15, 22, 30, 25],
                borderColor: '#e63946',
                backgroundColor: 'rgba(230,57,70,0.2)',
                tension: 0.4,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // IMPORTANT
            plugins: { 
                legend: { display: false }
            }
        }
    });
}

// Revenue data definition - ADD THIS!
const revenueData = {
    daily: {
        labels: ['6am', '9am', '12pm', '3pm', '6pm', '9pm', '12am'],
        data: [45, 120, 180, 140, 220, 150, 60],
        title: 'Daily Revenue'
    },
    weekly: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        data: [120, 190, 80, 150, 220, 300, 250],
        title: 'Weekly Revenue'
    },
    monthly: {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
        data: [850, 920, 780, 1050],
        title: 'Monthly Revenue'
    },
    yearly: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        data: [3200, 3800, 3500, 4100, 4200, 3900, 4500, 4800, 4600, 5000, 5200, 5800],
        title: 'Yearly Revenue'
    }
};

// 4. Revenue chart with time period toggle
const revenueCtx = document.getElementById('revenueChart');
let revenueChart = null;

if (revenueCtx) {
    revenueChart = new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: revenueData.weekly.labels,
            datasets: [{
                label: 'Revenue',
                data: revenueData.weekly.data,
                backgroundColor: '#457b9d'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // IMPORTANT
            plugins: { 
                legend: { display: false }
            }
        }
    });
}

// 5. Time period button functionality
const periodButtons = document.querySelectorAll('.period-btn');

if (periodButtons.length > 0) {
    // Find and activate the Weekly button
    periodButtons.forEach(btn => {
        if (btn.dataset.period === 'weekly') {
            btn.classList.add('active');
        }
    });
    
    periodButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            periodButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Get the selected period
            const period = this.dataset.period;
            
            // IMPORTANT: Select the title WITHIN THIS BUTTON'S GRAPH
            const graphCard = this.closest('.graph'); // Find the parent graph container
            const graphTitle = graphCard.querySelector('.graph-title'); // Find title within this graph
            
            // Update the graph title
            if (graphTitle) {
                graphTitle.textContent = revenueData[period].title;
            }
            
            // Update chart data
            if (revenueChart) {
                revenueChart.data.labels = revenueData[period].labels;
                revenueChart.data.datasets[0].data = revenueData[period].data;
                revenueChart.update();
            }
        });
    });
}
});