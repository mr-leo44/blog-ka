import './bootstrap';
import 'flowbite';
import 'tom-select/dist/css/tom-select.default.css';

import TomSelect from 'tom-select';
import jQuery from 'jquery';
import Alpine from 'alpinejs';

window.$ = jQuery;
window.Alpine = Alpine;
window.TomSelect = TomSelect;
Alpine.start();
