// tailwind.config.js
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: "#0D6EFD",
                    foreground: "#ffffff",
                },
                secondary: {
                    DEFAULT: "#6C757D",
                    foreground: "#ffffff",
                },
                success: {
                    DEFAULT: "#198754",
                    foreground: "#ffffff",
                },
                danger: {
                    DEFAULT: "#DC3545",
                    foreground: "#ffffff",
                },
                warning: {
                    DEFAULT: "#FFC107",
                    foreground: "#000000",
                },
                info: {
                    DEFAULT: "#0DCAF0",
                    foreground: "#000000",
                },
                light: {
                    DEFAULT: "#F8F9FA",
                    foreground: "#000000",
                },
                dark: {
                    DEFAULT: "#212529",
                    foreground: "#ffffff",
                },
            }
        }
    },

    plugins: [
        require('@tailwindcss/typography'),
    ],
}
