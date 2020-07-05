import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css"

export const toastify = ({ message }) => {
  Toastify({
    text: message,
    duration: 3000,
    close: true,
    gravity: "top", // `top` or `bottom`
    position: 'center', // `left`, `center` or `right`
    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
    stopOnFocus: true, // Prevents dismissing of toast on hover
  }).showToast();
};
