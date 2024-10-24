/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    screens: {
      xxs: '370px',
      xs: '480px',
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1249px',
    },
    fontFamily: {
      Juana: ['Juana', 'sans-serif'],
      Eina: ['Eina', 'sans-serif'],
    },
    fontSize: {
      xs: '14px',
      sm: '16px',
      base: '18px',
      lg: '20px',
      xl: '24px',
      'xl-2': '28px',
      '2xl': '30px',
      '3xl': '38px',
      '4xl': '50px',
      '5xl': '58px',
      '6xl': '60px',
    },
    colors: {
      white: '#ffffff',
      black: '#000000',
      mist: '#C7D9D4',
      'mist-100': '#F1F5F4',
      'mist-300': '#E3ECE9',
      charcoal: '#242132',
      ocean: '#002E45',
      magenta: '#8C1D40',
      azure: '#1C1C69',
      taupe: '#8C7A6B',
    }, // Extend Tailwind's default colors

    backgroundImage: {
      'gradient-1':
        'linear-gradient(180deg, rgba(199, 217, 212, 0.00) 0%, #002E45 100%)',
      'gradient-2':
        'linear-gradient(270deg, rgba(199, 217, 212, 0.00) 0%, rgba(36, 33, 50, 0.80) 200%)',
      'gradient-3':
        'linear-gradient(270deg, rgba(0, 46, 69, 0.00) 0%, rgba(0, 46, 69, 0.65) 100%)',
      'gradient-4': 'linear-gradient(222deg, #C7D9D4 0%, #002E45 75%)',
      'gradient-5': 'linear-gradient(180deg, rgba(199, 217, 212, 0), #002e45)',
    },
  },
  plugins: [],
};

export default config;
