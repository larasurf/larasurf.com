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
        extend: {
            invert: {
                25: '.25',
                50: '.5',
                75: '.75',
            },
        },
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
