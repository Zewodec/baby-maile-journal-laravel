<!DOCTYPE html>
<html lang="uk">
<head>
    <title>@yield('title', 'BabyMile Journal')</title>
    @include('layouts.link-meta')

    @yield('head')

</head>
<body class="@yield('body-classes', '')">
@include('helping-modal')

@include('layouts.header')

@include('layouts.burger-menu')

@include('layouts.dialog.add-child')

@include('layouts.dialog.change-password')

@yield('content')

@include('layouts.footer')

<script src="{{URL::asset('js/burgermenu.js')}}"></script>
@yield('scripts')

<!-- Custom Script to Handle Font Size Adjustments and Colorblind Mode -->
<script>

    // Define a map of existing colors and their replacements for colorblind mode
    const colorBlindMap = {
        "#BDABA2": "#6D9EEB",   // Khaki-color -> Soft blue
        "#FFF9F4": "#FDF0D5",   // Lite-Khaki-color -> Light peach
        "#DFD4CE": "#C2D1D7",   // Medium-Khaki-color -> Muted light blue
        "#AEA29C": "#A6A8D1"    // Dark-Khaki-color -> Medium periwinkle
    };

    function applyColorblindMode(enable) {
        // Get all elements on the page
        const allElements = document.querySelectorAll('*');

        allElements.forEach((element) => {
            const styles = window.getComputedStyle(element);

            // Check and update the background color
            const currentBackgroundColor = rgbToHex(styles.backgroundColor);
            if (colorBlindMap[currentBackgroundColor]) {
                element.style.backgroundColor = enable ? colorBlindMap[currentBackgroundColor] : currentBackgroundColor;
            }

            // Check and update the text color
            const currentTextColor = rgbToHex(styles.color);
            if (colorBlindMap[currentTextColor]) {
                element.style.color = enable ? colorBlindMap[currentTextColor] : currentTextColor;
            }
        });
    }

    // Helper function to convert RGB color to Hex format
    function rgbToHex(rgb) {
        const result = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
        return result ? "#" + ((1 << 24) + (parseInt(result[1]) << 16) + (parseInt(result[2]) << 8) + parseInt(result[3])).toString(16).slice(1).toUpperCase() : rgb;
    }


    // Function to adjust font size for individual elements
    function adjustFontSize(action) {
        // Select all text elements where font size should be adjusted
        const elements = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, li'); // Add or modify as needed

        elements.forEach(function (element) {
            const currentFontSize = window.getComputedStyle(element, null).getPropertyValue('font-size');
            const currentSize = parseFloat(currentFontSize);

            if (action === 'increase') {
                element.style.fontSize = (currentSize + 1) + 'px';
            } else if (action === 'decrease') {
                element.style.fontSize = (currentSize - 1) + 'px';
            }
        });
    }

    // Function to apply colorblind mode and persist settings
    function applySettings() {
        const isColorblind = document.getElementById('colorblindMode').checked;

        if (isColorblind) {
            document.body.classList.add('colorblind-friendly');
        } else {
            document.body.classList.remove('colorblind-friendly');
        }

        // Persist settings using localStorage
        localStorage.setItem('colorblindMode', isColorblind ? 'enabled' : 'disabled');
    }

    // Apply saved colorblind mode on page load
    window.onload = function () {
        const savedColorblindMode = localStorage.getItem('colorblindMode');

        if (savedColorblindMode === 'enabled') {
            document.body.classList.add('colorblind-friendly');
            document.getElementById('colorblindMode').checked = true;
        }
    }

    document.getElementById('colorblindMode').addEventListener('change', function () {
        applyColorblindMode(this.checked);

        // Optionally persist the setting using localStorage
        localStorage.setItem('colorblindMode', this.checked ? 'enabled' : 'disabled');
    });

    // Apply saved colorblind mode on page load
    window.onload = function () {
        const savedColorblindMode = localStorage.getItem('colorblindMode');
        if (savedColorblindMode === 'enabled') {
            document.getElementById('colorblindMode').checked = true;
            applyColorblindMode(true);
        }
    }
</script>

</body>
</html>
