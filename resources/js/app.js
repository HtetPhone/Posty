import './bootstrap';
import { toggle } from './nav-toggle';


//nav
const toggleBtn = document.getElementById('mobile-menu-toggle')
const navMenu = document.getElementById('mobile-menu')

toggleBtn.addEventListener('click', (e) => {
    toggle(navMenu)
})

//feather-icons
import '/node_modules/feather-icons/dist/feather.min'
feather.replace();