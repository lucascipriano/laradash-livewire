import axios from 'axios';
import Toastify from "toastify-js/src/toastify.js";
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.addEventListener('toastify', event => {
    // Access the __livewire object from the event
    const livewireData = event.__livewire;

    if (livewireData && livewireData.params && livewireData.params[0]) {
        const { msg, duration, gravity, position, style } = livewireData.params[0];

        // Use the extracted data to display the toast
        Toastify({
            text: msg,
            duration: duration || 2000,
            gravity: gravity || "top",
            position: position || "right",
            style: {
                background: style?.background || ''
            },
        }).showToast();
    } else {
        console.error('Invalid __livewire data:', livewireData);
    }
});
