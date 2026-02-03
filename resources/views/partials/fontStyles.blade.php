{{-- Preload fonts to prevent FOUT (Flash of Unstyled Text) --}}
<link rel="preload" href="{{ asset('fonts/bitter-v28-latin-regular.woff2') }}" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="{{ asset('fonts/bitter-v28-latin-700.woff2') }}" as="font" type="font/woff2" crossorigin>

<style>
    /* bitter-regular - latin */
    @font-face {
        font-family: 'Bitter';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url('../fonts/bitter-v28-latin-regular.eot'); /* IE9 Compat Modes */
        src: local(''),
        url('../fonts/bitter-v28-latin-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
        url('../fonts/bitter-v28-latin-regular.woff2') format('woff2'), /* Super Modern Browsers */
        url('../fonts/bitter-v28-latin-regular.woff') format('woff'), /* Modern Browsers */
        url('../fonts/bitter-v28-latin-regular.ttf') format('truetype'), /* Safari, Android, iOS */
        url('../fonts/bitter-v28-latin-regular.svg#Bitter') format('svg'); /* Legacy iOS */
    }

    @font-face {
        font-family: 'Bitter';
        font-style: normal;
        font-weight: 600;
        font-display: swap;
        src: url('../fonts/bitter-v28-latin-regular.eot'); /* IE9 Compat Modes */
        src: local(''),
        url('../fonts/bitter-v28-latin-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
        url('../fonts/bitter-v28-latin-regular.woff2') format('woff2'), /* Super Modern Browsers */
        url('../fonts/bitter-v28-latin-regular.woff') format('woff'), /* Modern Browsers */
        url('../fonts/bitter-v28-latin-regular.ttf') format('truetype'), /* Safari, Android, iOS */
        url('../fonts/bitter-v28-latin-regular.svg#Bitter') format('svg'); /* Legacy iOS */
    }

    /* bitter-700 - latin */
    @font-face {
        font-family: 'Bitter';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url('../fonts/bitter-v28-latin-700.eot'); /* IE9 Compat Modes */
        src: local(''),
        url('../fonts/bitter-v28-latin-700.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
        url('../fonts/bitter-v28-latin-700.woff2') format('woff2'), /* Super Modern Browsers */
        url('../fonts/bitter-v28-latin-700.woff') format('woff'), /* Modern Browsers */
        url('../fonts/bitter-v28-latin-700.ttf') format('truetype'), /* Safari, Android, iOS */
        url('../fonts/bitter-v28-latin-700.svg#Bitter') format('svg'); /* Legacy iOS */
    }
</style>
