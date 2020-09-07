module.exports = {
    purge: [
        './resources/views/**/*blade.php',
    ],
    theme: {
        fontFamily: {
            'display': ['Bitter'],

        },
        extend: {
            colors: {
                bgBlue: '#f4f9fc',
                textBlue: '#0f1b61',
                highlightBlue: '#8fd3f4',
                highlightYellow: '#f4e04d',
                highlightTurquoise: '#A2F7B6',
                highlightPurple: '#D631E9',
                codeBackground: '#2C303A'
            }
        },
    },
    variants: {},
    plugins: [],
}
