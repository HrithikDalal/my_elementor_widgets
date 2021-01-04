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
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/js/blocks.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/blocks.js":
/*!**************************!*\
  !*** ./src/js/blocks.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _blocks_example_block__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./blocks/example-block */ "./src/js/blocks/example-block/index.js");
/* harmony import */ var _blocks_example_block__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_blocks_example_block__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _blocks_example_dynamic_block__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./blocks/example-dynamic-block */ "./src/js/blocks/example-dynamic-block/index.js");
/* harmony import */ var _blocks_example_dynamic_block__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_blocks_example_dynamic_block__WEBPACK_IMPORTED_MODULE_1__);
/**
 * All blocks scripts imports.
 *
 * @package hrithik-features
 */
// Blocks

/**
 * Internal dependencies
 */



/***/ }),

/***/ "./src/js/blocks/example-block/index.js":
/*!**********************************************!*\
  !*** ./src/js/blocks/example-block/index.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Example block.
 * Delete or update this block as needed.
 *
 * @package hrithik-features
 */
var registerBlockType = wp.blocks.registerBlockType;
var __ = wp.i18n.__;
registerBlockType('hrithik-features/example-block', {
  /**
   * Block title.
   *
   * @member {string}
   */
  title: __('Example Block', 'hrithik-features'),

  /**
   * Block icons shown in editor.
   *
   * @member {string}
   */
  icon: 'book',

  /**
   * Block Category
   *
   * @member {string}
   */
  category: 'common',

  /**
   * Describes the structure of the block in the context of the editor.
   *
   * @return {Object} Block elements.
   */
  edit: function edit() {
    return null;
  },

  /**
   * Defines the way in which the different attributes should be combined
   * into the final markup for front-end but actual template will be returned using php.
   *
   * @return {null} Null.
   */
  save: function save() {
    return null;
  }
});

/***/ }),

/***/ "./src/js/blocks/example-dynamic-block/index.js":
/*!******************************************************!*\
  !*** ./src/js/blocks/example-dynamic-block/index.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Example block.
 * Delete or update this block as needed.
 *
 * @package hrithik-features
 */
var registerBlockType = wp.blocks.registerBlockType;
var ServerSideRender = wp.editor.ServerSideRender;
var __ = wp.i18n.__;
registerBlockType('hrithik-features/example-dynamic-block', {
  /**
   * Block title.
   *
   * @member {string}
   */
  title: __('Example Dynamic Block', 'hrithik-features'),

  /**
   * Block icons shown in editor.
   *
   * @member {string}
   */
  icon: 'book',

  /**
   * Block Category
   *
   * @member {string}
   */
  category: 'common',

  /**
   * Block Attributes.
   *
   * @member {Object}
   */
  attributes: {
    postId: {
      type: 'integer',
      "default": 0
    }
  },

  /**
   * Describes the structure of the block in the context of the editor.
   *
   * @param {Object} props block props.
   * @return {Object} Block elements.
   */
  edit: function edit(props) {
    var attributes = props.attributes;
    return React.createElement(ServerSideRender, {
      block: "hrithik-features/example-dynamic-block",
      attributes: attributes
    });
  },

  /**
   * Defines the way in which the different attributes should be combined
   * into the final markup for front-end but actual template will be returned using php.
   *
   * @return {null} Null.
   */
  save: function save() {
    return null;
  }
});

/***/ })

/******/ });
//# sourceMappingURL=blocks.js.map