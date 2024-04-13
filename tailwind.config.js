module.exports = {
    content: [
        './theme/**/*.php',
        './theme/**/*.js'
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '1.5rem',
                lg: '1rem'
            },
            center: true
        },
        fontFamily: {
        },
        colors: {
            blue: {
                DEFAULT: '#4295c9',
                dark: '#12274c',
                black: '#0a1d40',
            },
            yellow: {
                DEFAULT: '#e9ab42',
            },
            white: {
                DEFAULT: '#ffffff',
            },
            gray: {
                DEFAULT: '#f2f2f2',
                dark: '#dbdbdb',
            },
            black: {
                DEFAULT: '#000000',
            },
            red: {
                DEFAULT: '#c02b0a',
            }
        },
        fontSize: {
            xs: '.875rem',      // 14px
            sm: '1rem',         // 16px
            base: '1.125rem',   // 18px
            lg: '1.25rem',      // 20px
            xl: '1.375rem',     // 22px
            '2xl': '1.5rem',    // 24px
            '3xl': '1.625rem',  // 26px
            '4xl': '1.75rem',   // 28px
            '5xl': '2rem',      // 32px
            '6xl': '2.25rem',   // 36px
            '7xl': '2.625rem',   // 42px
            '8xl': '3rem',  // 48px
            '9xl': '3.25rem', // 52px
            '10xl': '3.625rem',   // 58px
            '11xl': '4.25rem', // 68px
            '12xl': '4.6875rem',  // 75px
            '13xl': '6.875rem',  // 110px
        },
        extend: {
            zIndex: {
                '-10': '-10'
            },
            inset: {
                '1/2': '50%'
            },
            backgroundColor: {
                transparent: 'transparent'
            },
            lineHeight: {
                '11': '3rem', // 48px
                '12': '3.625rem', // 58px
                '13': '4rem', // 64px
                '14': '4.5rem', // 72px
                '15': '5rem', // 80px
                '16': '5.625rem', // 90px
                '17': '6.25rem', // 100px
            },
        }
    },
    variants: {},
    plugins: []
};
