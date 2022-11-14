import './styles/app.scss';

// loads the Bootstrap jQuery plugins
import 'bootstrap-sass/assets/javascripts/bootstrap/transition.js';
import 'bootstrap-sass/assets/javascripts/bootstrap/alert.js';
import 'bootstrap-sass/assets/javascripts/bootstrap/collapse.js';
import 'bootstrap-sass/assets/javascripts/bootstrap/dropdown.js';
import 'bootstrap-sass/assets/javascripts/bootstrap/modal.js';
import 'jquery';
import { Tooltip, Toast, Popover } from 'bootstrap';

// loads the code syntax highlighting library
import './js/highlight.js';

// Creates links to the Symfony documentation
import './js/doclinks.js';

// start the Stimulus application
import './bootstrap';

//
//$(function() {
////                setTimeOut("window.location.href='login.php';", 300000);
//    let timeout;
//
//    function myFunction() {
//        timeout = setTimeout(alertFunc, 3000);
//    }
//
//    function alertFunc() {
//        alert("Vous allez être déconnecté!");
//    }
//})