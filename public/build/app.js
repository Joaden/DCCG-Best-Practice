(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/controllers sync recursive ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \\.(j|t)sx?$":
/*!*****************************************************************************************************************!*\
  !*** ./assets/controllers/ sync ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \.(j|t)sx?$ ***!
  \*****************************************************************************************************************/
/***/ ((module) => {

function webpackEmptyContext(req) {
	var e = new Error("Cannot find module '" + req + "'");
	e.code = 'MODULE_NOT_FOUND';
	throw e;
}
webpackEmptyContext.keys = () => ([]);
webpackEmptyContext.resolve = webpackEmptyContext;
webpackEmptyContext.id = "./assets/controllers sync recursive ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \\.(j|t)sx?$";
module.exports = webpackEmptyContext;

/***/ }),

/***/ "./node_modules/@symfony/stimulus-bridge/dist/webpack/loader.js!./assets/controllers.json":
/*!************************************************************************************************!*\
  !*** ./node_modules/@symfony/stimulus-bridge/dist/webpack/loader.js!./assets/controllers.json ***!
  \************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
});

/***/ }),

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");
/* harmony import */ var bootstrap_sass_assets_javascripts_bootstrap_transition_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! bootstrap-sass/assets/javascripts/bootstrap/transition.js */ "./node_modules/bootstrap-sass/assets/javascripts/bootstrap/transition.js");
/* harmony import */ var bootstrap_sass_assets_javascripts_bootstrap_transition_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(bootstrap_sass_assets_javascripts_bootstrap_transition_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var bootstrap_sass_assets_javascripts_bootstrap_alert_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! bootstrap-sass/assets/javascripts/bootstrap/alert.js */ "./node_modules/bootstrap-sass/assets/javascripts/bootstrap/alert.js");
/* harmony import */ var bootstrap_sass_assets_javascripts_bootstrap_alert_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(bootstrap_sass_assets_javascripts_bootstrap_alert_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var bootstrap_sass_assets_javascripts_bootstrap_collapse_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! bootstrap-sass/assets/javascripts/bootstrap/collapse.js */ "./node_modules/bootstrap-sass/assets/javascripts/bootstrap/collapse.js");
/* harmony import */ var bootstrap_sass_assets_javascripts_bootstrap_collapse_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(bootstrap_sass_assets_javascripts_bootstrap_collapse_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var bootstrap_sass_assets_javascripts_bootstrap_dropdown_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! bootstrap-sass/assets/javascripts/bootstrap/dropdown.js */ "./node_modules/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js");
/* harmony import */ var bootstrap_sass_assets_javascripts_bootstrap_dropdown_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(bootstrap_sass_assets_javascripts_bootstrap_dropdown_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var bootstrap_sass_assets_javascripts_bootstrap_modal_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! bootstrap-sass/assets/javascripts/bootstrap/modal.js */ "./node_modules/bootstrap-sass/assets/javascripts/bootstrap/modal.js");
/* harmony import */ var bootstrap_sass_assets_javascripts_bootstrap_modal_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(bootstrap_sass_assets_javascripts_bootstrap_modal_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var bootstrap__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/npm.js");
/* harmony import */ var bootstrap__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(bootstrap__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _js_highlight_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./js/highlight.js */ "./assets/js/highlight.js");
/* harmony import */ var _js_doclinks_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./js/doclinks.js */ "./assets/js/doclinks.js");
/* harmony import */ var _js_doclinks_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_js_doclinks_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _bootstrap__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./bootstrap */ "./assets/bootstrap.js");
 // loads the Bootstrap jQuery plugins







 // loads the code syntax highlighting library

 // Creates links to the Symfony documentation

 // start the Stimulus application

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

/***/ }),

/***/ "./assets/bootstrap.js":
/*!*****************************!*\
  !*** ./assets/bootstrap.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "app": () => (/* binding */ app)
/* harmony export */ });
/* harmony import */ var _symfony_stimulus_bridge__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @symfony/stimulus-bridge */ "./node_modules/@symfony/stimulus-bridge/dist/index.js");
 // Registers Stimulus controllers from controllers.json and in the controllers/ directory

var app = (0,_symfony_stimulus_bridge__WEBPACK_IMPORTED_MODULE_0__.startStimulusApp)(__webpack_require__("./assets/controllers sync recursive ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \\.(j|t)sx?$")); // register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);

/***/ }),

/***/ "./assets/js/doclinks.js":
/*!*******************************!*\
  !*** ./assets/js/doclinks.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

"use strict";
/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
 // Wraps some elements in anchor tags referencing to the Symfony documentation

__webpack_require__(/*! core-js/modules/es.array.find.js */ "./node_modules/core-js/modules/es.array.find.js");

__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");

__webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.string.replace.js */ "./node_modules/core-js/modules/es.string.replace.js");

__webpack_require__(/*! core-js/modules/es.string.match.js */ "./node_modules/core-js/modules/es.string.match.js");

$(function () {
  var $modal = $('#sourceCodeModal');
  var $controllerCode = $modal.find('code.php');
  var $templateCode = $modal.find('code.twig');

  function anchor(url, content) {
    return '<a class="doclink" target="_blank" href="' + url + '">' + content + '</a>';
  }

  ; // Wraps links to the Symfony documentation

  $modal.find('.hljs-comment').each(function () {
    $(this).html($(this).html().replace(/https:\/\/symfony.com\/doc\/[\w/.#-]+/g, function (url) {
      return anchor(url, url);
    }));
  }); // Wraps Symfony's annotations

  var annotations = {
    '@Cache': 'https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/cache.html',
    '@IsGranted': 'https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/security.html#isgranted',
    '@ParamConverter': 'https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/converters.html',
    '@Route': 'https://symfony.com/doc/current/routing.html#creating-routes-as-annotations',
    '@Security': 'https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/security.html#security'
  };
  $controllerCode.find('.hljs-doctag').each(function () {
    var annotation = $(this).text();

    if (annotations[annotation]) {
      $(this).html(anchor(annotations[annotation], annotation));
    }
  }); // Wraps Twig's tags

  $templateCode.find('.hljs-template-tag > .hljs-name').each(function () {
    var tag = $(this).text();

    if ('else' === tag || tag.match(/^end/)) {
      return;
    }

    var url = 'https://twig.symfony.com/doc/3.x/tags/' + tag + '.html#' + tag;
    $(this).html(anchor(url, tag));
  }); // Wraps Twig's functions

  $templateCode.find('.hljs-template-variable > .hljs-name').each(function () {
    var func = $(this).text();
    var url = 'https://twig.symfony.com/doc/3.x/functions/' + func + '.html#' + func;
    $(this).html(anchor(url, func));
  });
});

/***/ }),

/***/ "./assets/js/highlight.js":
/*!********************************!*\
  !*** ./assets/js/highlight.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var highlight_js_lib_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! highlight.js/lib/core */ "./node_modules/highlight.js/lib/core.js");
/* harmony import */ var highlight_js_lib_core__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(highlight_js_lib_core__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var highlight_js_lib_languages_php__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! highlight.js/lib/languages/php */ "./node_modules/highlight.js/lib/languages/php.js");
/* harmony import */ var highlight_js_lib_languages_php__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(highlight_js_lib_languages_php__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var highlight_js_lib_languages_twig__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! highlight.js/lib/languages/twig */ "./node_modules/highlight.js/lib/languages/twig.js");
/* harmony import */ var highlight_js_lib_languages_twig__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(highlight_js_lib_languages_twig__WEBPACK_IMPORTED_MODULE_2__);



highlight_js_lib_core__WEBPACK_IMPORTED_MODULE_0___default().registerLanguage('php', (highlight_js_lib_languages_php__WEBPACK_IMPORTED_MODULE_1___default()));
highlight_js_lib_core__WEBPACK_IMPORTED_MODULE_0___default().registerLanguage('twig', (highlight_js_lib_languages_twig__WEBPACK_IMPORTED_MODULE_2___default()));
highlight_js_lib_core__WEBPACK_IMPORTED_MODULE_0___default().initHighlightingOnLoad();

/***/ }),

/***/ "./assets/styles/app.scss":
/*!********************************!*\
  !*** ./assets/styles/app.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js","vendors-node_modules_core-js_internals_add-to-unscopables_js-node_modules_core-js_internals_a-dd2802","vendors-node_modules_core-js_modules_es_string_replace_js","vendors-node_modules_symfony_stimulus-bridge_dist_index_js-node_modules_bootstrap-sass_assets-80efd5"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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LFFBQUlRLElBQUksR0FBR2hCLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUWEsSUFBUixFQUFYO0FBRUEsUUFBSVAsR0FBRyxHQUFHLGdEQUFnRFUsSUFBaEQsR0FBdUQsUUFBdkQsR0FBa0VBLElBQTVFO0FBRUFoQixJQUFBQSxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFTLElBQVIsQ0FBYUosTUFBTSxDQUFDQyxHQUFELEVBQU1VLElBQU4sQ0FBbkI7QUFDSCxHQU5EO0FBT0gsQ0F0REEsQ0FBRDs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FDSEE7QUFDQTtBQUNBO0FBRUFDLDZFQUFBLENBQXNCLEtBQXRCLEVBQTZCQyx1RUFBN0I7QUFDQUQsNkVBQUEsQ0FBc0IsTUFBdEIsRUFBOEJFLHdFQUE5QjtBQUVBRixtRkFBQTs7Ozs7Ozs7Ozs7O0FDUEEiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vfC9cXC4oanx0KXN4Iiwid2VicGFjazovLy8uL2Fzc2V0cy9jb250cm9sbGVycy5qc29uIiwid2VicGFjazovLy8uL2Fzc2V0cy9hcHAuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2Jvb3RzdHJhcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvZG9jbGlua3MuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2hpZ2hsaWdodC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL2FwcC5zY3NzIl0sInNvdXJjZXNDb250ZW50IjpbImZ1bmN0aW9uIHdlYnBhY2tFbXB0eUNvbnRleHQocmVxKSB7XG5cdHZhciBlID0gbmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIiArIHJlcSArIFwiJ1wiKTtcblx0ZS5jb2RlID0gJ01PRFVMRV9OT1RfRk9VTkQnO1xuXHR0aHJvdyBlO1xufVxud2VicGFja0VtcHR5Q29udGV4dC5rZXlzID0gKCkgPT4gKFtdKTtcbndlYnBhY2tFbXB0eUNvbnRleHQucmVzb2x2ZSA9IHdlYnBhY2tFbXB0eUNvbnRleHQ7XG53ZWJwYWNrRW1wdHlDb250ZXh0LmlkID0gXCIuL2Fzc2V0cy9jb250cm9sbGVycyBzeW5jIHJlY3Vyc2l2ZSAuL25vZGVfbW9kdWxlcy9Ac3ltZm9ueS9zdGltdWx1cy1icmlkZ2UvbGF6eS1jb250cm9sbGVyLWxvYWRlci5qcyEgXFxcXC4oanx0KXN4PyRcIjtcbm1vZHVsZS5leHBvcnRzID0gd2VicGFja0VtcHR5Q29udGV4dDsiLCJleHBvcnQgZGVmYXVsdCB7XG59OyIsImltcG9ydCAnLi9zdHlsZXMvYXBwLnNjc3MnO1xuXG4vLyBsb2FkcyB0aGUgQm9vdHN0cmFwIGpRdWVyeSBwbHVnaW5zXG5pbXBvcnQgJ2Jvb3RzdHJhcC1zYXNzL2Fzc2V0cy9qYXZhc2NyaXB0cy9ib290c3RyYXAvdHJhbnNpdGlvbi5qcyc7XG5pbXBvcnQgJ2Jvb3RzdHJhcC1zYXNzL2Fzc2V0cy9qYXZhc2NyaXB0cy9ib290c3RyYXAvYWxlcnQuanMnO1xuaW1wb3J0ICdib290c3RyYXAtc2Fzcy9hc3NldHMvamF2YXNjcmlwdHMvYm9vdHN0cmFwL2NvbGxhcHNlLmpzJztcbmltcG9ydCAnYm9vdHN0cmFwLXNhc3MvYXNzZXRzL2phdmFzY3JpcHRzL2Jvb3RzdHJhcC9kcm9wZG93bi5qcyc7XG5pbXBvcnQgJ2Jvb3RzdHJhcC1zYXNzL2Fzc2V0cy9qYXZhc2NyaXB0cy9ib290c3RyYXAvbW9kYWwuanMnO1xuaW1wb3J0ICdqcXVlcnknO1xuaW1wb3J0IHsgVG9vbHRpcCwgVG9hc3QsIFBvcG92ZXIgfSBmcm9tICdib290c3RyYXAnO1xuXG4vLyBsb2FkcyB0aGUgY29kZSBzeW50YXggaGlnaGxpZ2h0aW5nIGxpYnJhcnlcbmltcG9ydCAnLi9qcy9oaWdobGlnaHQuanMnO1xuXG4vLyBDcmVhdGVzIGxpbmtzIHRvIHRoZSBTeW1mb255IGRvY3VtZW50YXRpb25cbmltcG9ydCAnLi9qcy9kb2NsaW5rcy5qcyc7XG5cbi8vIHN0YXJ0IHRoZSBTdGltdWx1cyBhcHBsaWNhdGlvblxuaW1wb3J0ICcuL2Jvb3RzdHJhcCc7XG5cbi8vXG4vLyQoZnVuY3Rpb24oKSB7XG4vLy8vICAgICAgICAgICAgICAgIHNldFRpbWVPdXQoXCJ3aW5kb3cubG9jYXRpb24uaHJlZj0nbG9naW4ucGhwJztcIiwgMzAwMDAwKTtcbi8vICAgIGxldCB0aW1lb3V0O1xuLy9cbi8vICAgIGZ1bmN0aW9uIG15RnVuY3Rpb24oKSB7XG4vLyAgICAgICAgdGltZW91dCA9IHNldFRpbWVvdXQoYWxlcnRGdW5jLCAzMDAwKTtcbi8vICAgIH1cbi8vXG4vLyAgICBmdW5jdGlvbiBhbGVydEZ1bmMoKSB7XG4vLyAgICAgICAgYWxlcnQoXCJWb3VzIGFsbGV6IMOqdHJlIGTDqWNvbm5lY3TDqSFcIik7XG4vLyAgICB9XG4vL30pIiwiaW1wb3J0IHsgc3RhcnRTdGltdWx1c0FwcCB9IGZyb20gJ0BzeW1mb255L3N0aW11bHVzLWJyaWRnZSc7XG5cbi8vIFJlZ2lzdGVycyBTdGltdWx1cyBjb250cm9sbGVycyBmcm9tIGNvbnRyb2xsZXJzLmpzb24gYW5kIGluIHRoZSBjb250cm9sbGVycy8gZGlyZWN0b3J5XG5leHBvcnQgY29uc3QgYXBwID0gc3RhcnRTdGltdWx1c0FwcChyZXF1aXJlLmNvbnRleHQoXG4gICAgJ0BzeW1mb255L3N0aW11bHVzLWJyaWRnZS9sYXp5LWNvbnRyb2xsZXItbG9hZGVyIS4vY29udHJvbGxlcnMnLFxuICAgIHRydWUsXG4gICAgL1xcLihqfHQpc3g/JC9cbikpO1xuXG4vLyByZWdpc3RlciBhbnkgY3VzdG9tLCAzcmQgcGFydHkgY29udHJvbGxlcnMgaGVyZVxuLy8gYXBwLnJlZ2lzdGVyKCdzb21lX2NvbnRyb2xsZXJfbmFtZScsIFNvbWVJbXBvcnRlZENvbnRyb2xsZXIpO1xuIiwiJ3VzZSBzdHJpY3QnO1xuXG4vLyBXcmFwcyBzb21lIGVsZW1lbnRzIGluIGFuY2hvciB0YWdzIHJlZmVyZW5jaW5nIHRvIHRoZSBTeW1mb255IGRvY3VtZW50YXRpb25cbiQoZnVuY3Rpb24oKSB7XG4gICAgdmFyICRtb2RhbCA9ICQoJyNzb3VyY2VDb2RlTW9kYWwnKTtcbiAgICB2YXIgJGNvbnRyb2xsZXJDb2RlID0gJG1vZGFsLmZpbmQoJ2NvZGUucGhwJyk7XG4gICAgdmFyICR0ZW1wbGF0ZUNvZGUgPSAkbW9kYWwuZmluZCgnY29kZS50d2lnJyk7XG5cbiAgICBmdW5jdGlvbiBhbmNob3IodXJsLCBjb250ZW50KSB7XG4gICAgICAgIHJldHVybiAnPGEgY2xhc3M9XCJkb2NsaW5rXCIgdGFyZ2V0PVwiX2JsYW5rXCIgaHJlZj1cIicgKyB1cmwgKyAnXCI+JyArIGNvbnRlbnQgKyAnPC9hPic7XG4gICAgfTtcblxuICAgIC8vIFdyYXBzIGxpbmtzIHRvIHRoZSBTeW1mb255IGRvY3VtZW50YXRpb25cbiAgICAkbW9kYWwuZmluZCgnLmhsanMtY29tbWVudCcpLmVhY2goZnVuY3Rpb24oKSB7XG4gICAgICAgICQodGhpcykuaHRtbCgkKHRoaXMpLmh0bWwoKS5yZXBsYWNlKC9odHRwczpcXC9cXC9zeW1mb255LmNvbVxcL2RvY1xcL1tcXHcvLiMtXSsvZywgZnVuY3Rpb24odXJsKSB7XG4gICAgICAgICAgICByZXR1cm4gYW5jaG9yKHVybCwgdXJsKTtcbiAgICAgICAgfSkpO1xuICAgIH0pO1xuXG4gICAgLy8gV3JhcHMgU3ltZm9ueSdzIGFubm90YXRpb25zXG4gICAgdmFyIGFubm90YXRpb25zID0ge1xuICAgICAgICAnQENhY2hlJzogJ2h0dHBzOi8vc3ltZm9ueS5jb20vZG9jL2N1cnJlbnQvYnVuZGxlcy9TZW5zaW9GcmFtZXdvcmtFeHRyYUJ1bmRsZS9hbm5vdGF0aW9ucy9jYWNoZS5odG1sJyxcbiAgICAgICAgJ0BJc0dyYW50ZWQnOiAnaHR0cHM6Ly9zeW1mb255LmNvbS9kb2MvY3VycmVudC9idW5kbGVzL1NlbnNpb0ZyYW1ld29ya0V4dHJhQnVuZGxlL2Fubm90YXRpb25zL3NlY3VyaXR5Lmh0bWwjaXNncmFudGVkJyxcbiAgICAgICAgJ0BQYXJhbUNvbnZlcnRlcic6ICdodHRwczovL3N5bWZvbnkuY29tL2RvYy9jdXJyZW50L2J1bmRsZXMvU2Vuc2lvRnJhbWV3b3JrRXh0cmFCdW5kbGUvYW5ub3RhdGlvbnMvY29udmVydGVycy5odG1sJyxcbiAgICAgICAgJ0BSb3V0ZSc6ICdodHRwczovL3N5bWZvbnkuY29tL2RvYy9jdXJyZW50L3JvdXRpbmcuaHRtbCNjcmVhdGluZy1yb3V0ZXMtYXMtYW5ub3RhdGlvbnMnLFxuICAgICAgICAnQFNlY3VyaXR5JzogJ2h0dHBzOi8vc3ltZm9ueS5jb20vZG9jL2N1cnJlbnQvYnVuZGxlcy9TZW5zaW9GcmFtZXdvcmtFeHRyYUJ1bmRsZS9hbm5vdGF0aW9ucy9zZWN1cml0eS5odG1sI3NlY3VyaXR5J1xuICAgIH07XG5cbiAgICAkY29udHJvbGxlckNvZGUuZmluZCgnLmhsanMtZG9jdGFnJykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgICAgdmFyIGFubm90YXRpb24gPSAkKHRoaXMpLnRleHQoKTtcblxuICAgICAgICBpZiAoYW5ub3RhdGlvbnNbYW5ub3RhdGlvbl0pIHtcbiAgICAgICAgICAgICQodGhpcykuaHRtbChhbmNob3IoYW5ub3RhdGlvbnNbYW5ub3RhdGlvbl0sIGFubm90YXRpb24pKTtcbiAgICAgICAgfVxuICAgIH0pO1xuXG4gICAgLy8gV3JhcHMgVHdpZydzIHRhZ3NcbiAgICAkdGVtcGxhdGVDb2RlLmZpbmQoJy5obGpzLXRlbXBsYXRlLXRhZyA+IC5obGpzLW5hbWUnKS5lYWNoKGZ1bmN0aW9uKCkge1xuICAgICAgICB2YXIgdGFnID0gJCh0aGlzKS50ZXh0KCk7XG5cbiAgICAgICAgaWYgKCdlbHNlJyA9PT0gdGFnIHx8IHRhZy5tYXRjaCgvXmVuZC8pKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICB2YXIgdXJsID0gJ2h0dHBzOi8vdHdpZy5zeW1mb255LmNvbS9kb2MvMy54L3RhZ3MvJyArIHRhZyArICcuaHRtbCMnICsgdGFnO1xuXG4gICAgICAgICQodGhpcykuaHRtbChhbmNob3IodXJsLCB0YWcpKTtcbiAgICB9KTtcblxuICAgIC8vIFdyYXBzIFR3aWcncyBmdW5jdGlvbnNcbiAgICAkdGVtcGxhdGVDb2RlLmZpbmQoJy5obGpzLXRlbXBsYXRlLXZhcmlhYmxlID4gLmhsanMtbmFtZScpLmVhY2goZnVuY3Rpb24oKSB7XG4gICAgICAgIHZhciBmdW5jID0gJCh0aGlzKS50ZXh0KCk7XG5cbiAgICAgICAgdmFyIHVybCA9ICdodHRwczovL3R3aWcuc3ltZm9ueS5jb20vZG9jLzMueC9mdW5jdGlvbnMvJyArIGZ1bmMgKyAnLmh0bWwjJyArIGZ1bmM7XG5cbiAgICAgICAgJCh0aGlzKS5odG1sKGFuY2hvcih1cmwsIGZ1bmMpKTtcbiAgICB9KTtcbn0pO1xuIiwiaW1wb3J0IGhsanMgZnJvbSAnaGlnaGxpZ2h0LmpzL2xpYi9jb3JlJztcbmltcG9ydCBwaHAgZnJvbSAnaGlnaGxpZ2h0LmpzL2xpYi9sYW5ndWFnZXMvcGhwJztcbmltcG9ydCB0d2lnIGZyb20gJ2hpZ2hsaWdodC5qcy9saWIvbGFuZ3VhZ2VzL3R3aWcnO1xuXG5obGpzLnJlZ2lzdGVyTGFuZ3VhZ2UoJ3BocCcsIHBocCk7XG5obGpzLnJlZ2lzdGVyTGFuZ3VhZ2UoJ3R3aWcnLCB0d2lnKTtcblxuaGxqcy5pbml0SGlnaGxpZ2h0aW5nT25Mb2FkKCk7XG4iLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOlsiVG9vbHRpcCIsIlRvYXN0IiwiUG9wb3ZlciIsInN0YXJ0U3RpbXVsdXNBcHAiLCJhcHAiLCJyZXF1aXJlIiwiY29udGV4dCIsIiQiLCIkbW9kYWwiLCIkY29udHJvbGxlckNvZGUiLCJmaW5kIiwiJHRlbXBsYXRlQ29kZSIsImFuY2hvciIsInVybCIsImNvbnRlbnQiLCJlYWNoIiwiaHRtbCIsInJlcGxhY2UiLCJhbm5vdGF0aW9ucyIsImFubm90YXRpb24iLCJ0ZXh0IiwidGFnIiwibWF0Y2giLCJmdW5jIiwiaGxqcyIsInBocCIsInR3aWciLCJyZWdpc3Rlckxhbmd1YWdlIiwiaW5pdEhpZ2hsaWdodGluZ09uTG9hZCJdLCJzb3VyY2VSb290IjoiIn0=