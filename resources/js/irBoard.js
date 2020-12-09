import axios from 'axios'
import Swal from 'sweetalert2';
const SimpleLightbox = require('simple-lightbox');
require('simple-lightbox/dist/simpleLightbox.min.css');


const irBoard = () => {
    const init = () => {
        setSimpleLightBox();
    };

    const setSimpleLightBox = () => {

        require('fullpage.js');
        new SimpleLightbox({elements: '.img a'});
    }

    init();
}


export default irBoard();
