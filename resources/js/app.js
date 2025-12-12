import './bootstrap';
import 'flowbite';
import '../css/app.css';
import '../css/style.css';

import Alpine from 'alpinejs';
import mask from '@alpinejs/mask';
Alpine.plugin(mask);

window.Alpine = Alpine;

Alpine.start();

const selectElements = document.querySelectorAll('.status-form #status_id');
console.log(selectElements)
for(let elem of selectElements){
    elem.addEventListener('change', function() {
        this.form.submit();
    })
}
