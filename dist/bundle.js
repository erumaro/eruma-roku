/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _sass_style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./sass/style.scss */ \"./src/sass/style.scss\");\n/* harmony import */ var _sass_style_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_sass_style_scss__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _modules_navbarBurger__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/navbarBurger */ \"./src/modules/navbarBurger.js\");\n/* harmony import */ var _modules_validateComments__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/validateComments */ \"./src/modules/validateComments.js\");\n\n\n\nObject(_modules_navbarBurger__WEBPACK_IMPORTED_MODULE_1__[\"navbarBurger\"])();\nObject(_modules_validateComments__WEBPACK_IMPORTED_MODULE_2__[\"validateComments\"])();\n\n//# sourceURL=webpack:///./src/index.js?");

/***/ }),

/***/ "./src/modules/navbarBurger.js":
/*!*************************************!*\
  !*** ./src/modules/navbarBurger.js ***!
  \*************************************/
/*! exports provided: navbarBurger */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"navbarBurger\", function() { return navbarBurger; });\nfunction navbarBurger() {\n  return document.addEventListener('DOMContentLoaded', function () {\n    var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);\n\n    if ($navbarBurgers.length > 0) {\n      $navbarBurgers.forEach(function (el) {\n        el.addEventListener('click', function () {\n          var target = el.dataset.target;\n          var $target = document.getElementById(target);\n          el.classList.toggle('is-active');\n          $target.classList.toggle('is-active');\n          var expandMenu = el.getAttribute('aria-expanded');\n\n          if (expandMenu == 'true') {\n            expandMenu = 'false';\n          } else {\n            expandMenu = 'true';\n          }\n\n          el.setAttribute('aria-expanded', expandMenu);\n        });\n      });\n    }\n  });\n}\n\n\n\n//# sourceURL=webpack:///./src/modules/navbarBurger.js?");

/***/ }),

/***/ "./src/modules/validateComments.js":
/*!*****************************************!*\
  !*** ./src/modules/validateComments.js ***!
  \*****************************************/
/*! exports provided: validateComments */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"validateComments\", function() { return validateComments; });\nfunction validateComments() {\n  return document.addEventListener('DOMContentLoaded', function () {\n    jQuery(function ($) {\n      $(\"#commentform\").validate({\n        rules: {\n          author: {\n            required: true,\n            minlength: 2\n          },\n          email: {\n            required: true,\n            email: true\n          },\n          comment: {\n            required: true,\n            minlength: 20\n          },\n          url: {\n            required: false,\n            url: true\n          }\n        },\n        messages: {\n          author: \"Var vänlig och fyll i fältet.\",\n          email: \"Vargod och fyll i en giltig email adress\",\n          comment: \"Skriv en kommenmtar innan du skickar.\",\n          url: \"Var vänlig skriv en giltig url/länk\"\n        },\n        errorElement: \"div\",\n        errorPlacement: function errorPlacement(error, element) {\n          element.after(error);\n        }\n      });\n    });\n  });\n}\n\n\n\n//# sourceURL=webpack:///./src/modules/validateComments.js?");

/***/ }),

/***/ "./src/sass/style.scss":
/*!*****************************!*\
  !*** ./src/sass/style.scss ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./src/sass/style.scss?");

/***/ })

/******/ });