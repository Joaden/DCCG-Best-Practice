(self["webpackChunk"] = self["webpackChunk"] || []).push([["login"],{

/***/ "./assets/login.js":
/*!*************************!*\
  !*** ./assets/login.js ***!
  \*************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
$(function () {
  var usernameEl = $('#email');
  var passwordEl = $('#password'); // in a real application, the user/password should never be hardcoded
  // but for the demo application it's very convenient to do so

  if (!usernameEl.val() || 'john@gmail.fr' === usernameEl.val()) {
    usernameEl.val('john@gmail.fr');
    passwordEl.val('kitten');
  }
});

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_jquery_dist_jquery_js"], () => (__webpack_exec__("./assets/login.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoibG9naW4uanMiLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7O0FBQUFBLENBQUMsQ0FBQyxZQUFXO0FBQ1QsTUFBSUMsVUFBVSxHQUFHRCxDQUFDLENBQUMsUUFBRCxDQUFsQjtBQUNBLE1BQUlFLFVBQVUsR0FBR0YsQ0FBQyxDQUFDLFdBQUQsQ0FBbEIsQ0FGUyxDQUlUO0FBQ0E7O0FBQ0EsTUFBSSxDQUFDQyxVQUFVLENBQUNFLEdBQVgsRUFBRCxJQUFxQixvQkFBb0JGLFVBQVUsQ0FBQ0UsR0FBWCxFQUE3QyxFQUErRDtBQUMzREYsSUFBQUEsVUFBVSxDQUFDRSxHQUFYLENBQWUsZUFBZjtBQUNBRCxJQUFBQSxVQUFVLENBQUNDLEdBQVgsQ0FBZSxRQUFmO0FBQ0g7QUFDSixDQVZBLENBQUQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvbG9naW4uanMiXSwic291cmNlc0NvbnRlbnQiOlsiJChmdW5jdGlvbigpIHtcbiAgICB2YXIgdXNlcm5hbWVFbCA9ICQoJyNlbWFpbCcpO1xuICAgIHZhciBwYXNzd29yZEVsID0gJCgnI3Bhc3N3b3JkJyk7XG5cbiAgICAvLyBpbiBhIHJlYWwgYXBwbGljYXRpb24sIHRoZSB1c2VyL3Bhc3N3b3JkIHNob3VsZCBuZXZlciBiZSBoYXJkY29kZWRcbiAgICAvLyBidXQgZm9yIHRoZSBkZW1vIGFwcGxpY2F0aW9uIGl0J3MgdmVyeSBjb252ZW5pZW50IHRvIGRvIHNvXG4gICAgaWYgKCF1c2VybmFtZUVsLnZhbCgpIHx8ICdqb2huQGdtYWlsLmZyJyA9PT0gdXNlcm5hbWVFbC52YWwoKSkge1xuICAgICAgICB1c2VybmFtZUVsLnZhbCgnam9obkBnbWFpbC5mcicpO1xuICAgICAgICBwYXNzd29yZEVsLnZhbCgna2l0dGVuJyk7XG4gICAgfVxufSk7XG4iXSwibmFtZXMiOlsiJCIsInVzZXJuYW1lRWwiLCJwYXNzd29yZEVsIiwidmFsIl0sInNvdXJjZVJvb3QiOiIifQ==