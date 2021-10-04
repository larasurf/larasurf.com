module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        listStyleType: {
            none: 'none',
            disc: 'disc',
            circle: 'circle',
            square: 'square',
        },
        extend: {},
    },
    variants: {
        extend: {
            invert: ['hover'],
            textColor: ['active'],
            backgroundColor: ['active'],
        },
    },
    plugins: [],
}
