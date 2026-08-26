const systemThemeQuery =
    window.matchMedia('(prefers-color-scheme: dark)');


function getStoredTheme() {

    return localStorage.getItem('theme') || 'system';
}


function getSystemTheme() {

    return systemThemeQuery.matches
        ? 'dark'
        : 'light';
}


function getActiveTheme(selectedTheme) {

    if (selectedTheme === 'system') {
        return getSystemTheme();
    }

    return selectedTheme;
}


function applyTheme(selectedTheme) {

    const activeTheme = getActiveTheme(selectedTheme);

    document.documentElement.setAttribute(
        'data-bs-theme',
        activeTheme
    );

    updateThemeButton(selectedTheme, activeTheme);
}


function updateThemeButton(selectedTheme, activeTheme) {

    const themeIcon =
        document.getElementById('currentThemeIcon');

    const themeButtons =
        document.querySelectorAll('[data-theme-value]');

    if (themeIcon) {

        if (activeTheme === 'dark') {
            themeIcon.className = 'ti ti-moon';
        } else {
            themeIcon.className = 'ti ti-sun';
        }
    }

    themeButtons.forEach((button) => {

        const isActive =
            button.dataset.themeValue === selectedTheme;

        button.classList.toggle('active', isActive);

        button.setAttribute(
            'aria-pressed',
            isActive ? 'true' : 'false'
        );
    });
}


function initializeTheme() {

    const selectedTheme = getStoredTheme();

    applyTheme(selectedTheme);

    const themeButtons =
        document.querySelectorAll('[data-theme-value]');

    themeButtons.forEach((button) => {

        button.addEventListener('click', () => {

            const newTheme =
                button.dataset.themeValue;

            localStorage.setItem(
                'theme',
                newTheme
            );

            applyTheme(newTheme);
        });
    });
}


if (document.readyState === 'loading') {

    document.addEventListener(
        'DOMContentLoaded',
        initializeTheme
    );

} else {

    initializeTheme();
}


systemThemeQuery.addEventListener('change', () => {

    if (getStoredTheme() === 'system') {
        applyTheme('system');
    }
});