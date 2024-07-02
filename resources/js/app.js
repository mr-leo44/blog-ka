import './bootstrap';
import 'flowbite';
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";

import jQuery from 'jquery';
import Quill from 'quill';
import Alpine from 'alpinejs';

window.$ = jQuery;
window.Alpine = Alpine;
window.Quill = Quill
Alpine.start();
