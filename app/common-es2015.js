(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["common"],{

/***/ "./src/app/validators/custom-validators.ts":
/*!*************************************************!*\
  !*** ./src/app/validators/custom-validators.ts ***!
  \*************************************************/
/*! exports provided: ExactMatchDirective */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ExactMatchDirective", function() { return ExactMatchDirective; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm2015/forms.js");



class ExactMatchDirective {
    constructor(exactMatch) {
        this.exactMatch = exactMatch;
        this.valFn = _angular_forms__WEBPACK_IMPORTED_MODULE_1__["Validators"].nullValidator;
    }
    validate(control) {
        const duplicate = control.value;
        const real = control.root.get(this.exactMatch);
        if (real && duplicate !== real.value) {
            return {
                exactMatch: false,
            };
        }
        return null;
    }
}
ExactMatchDirective.ɵfac = function ExactMatchDirective_Factory(t) { return new (t || ExactMatchDirective)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵinjectAttribute"]("exactMatch")); };
ExactMatchDirective.ɵdir = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineDirective"]({ type: ExactMatchDirective, selectors: [["", "exactMatch", ""]], features: [_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵProvidersFeature"]([
            {
                provide: _angular_forms__WEBPACK_IMPORTED_MODULE_1__["NG_VALIDATORS"],
                useExisting: Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["forwardRef"])(() => ExactMatchDirective),
                multi: true,
            },
        ])] });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](ExactMatchDirective, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Directive"],
        args: [{
                // tslint:disable-next-line:directive-selector
                selector: "[exactMatch]",
                providers: [
                    {
                        provide: _angular_forms__WEBPACK_IMPORTED_MODULE_1__["NG_VALIDATORS"],
                        useExisting: Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["forwardRef"])(() => ExactMatchDirective),
                        multi: true,
                    },
                ],
            }]
    }], function () { return [{ type: undefined, decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Attribute"],
                args: ["exactMatch"]
            }] }]; }, null); })();


/***/ }),

/***/ "./src/app/validators/validators.module.ts":
/*!*************************************************!*\
  !*** ./src/app/validators/validators.module.ts ***!
  \*************************************************/
/*! exports provided: ValidatorsModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ValidatorsModule", function() { return ValidatorsModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/common.js");
/* harmony import */ var _custom_validators__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./custom-validators */ "./src/app/validators/custom-validators.ts");




class ValidatorsModule {
}
ValidatorsModule.ɵmod = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineNgModule"]({ type: ValidatorsModule });
ValidatorsModule.ɵinj = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineInjector"]({ factory: function ValidatorsModule_Factory(t) { return new (t || ValidatorsModule)(); }, imports: [[
            _angular_common__WEBPACK_IMPORTED_MODULE_1__["CommonModule"],
        ]] });
(function () { (typeof ngJitMode === "undefined" || ngJitMode) && _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵsetNgModuleScope"](ValidatorsModule, { declarations: [_custom_validators__WEBPACK_IMPORTED_MODULE_2__["ExactMatchDirective"]], imports: [_angular_common__WEBPACK_IMPORTED_MODULE_1__["CommonModule"]], exports: [_custom_validators__WEBPACK_IMPORTED_MODULE_2__["ExactMatchDirective"]] }); })();
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](ValidatorsModule, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"],
        args: [{
                declarations: [_custom_validators__WEBPACK_IMPORTED_MODULE_2__["ExactMatchDirective"]],
                imports: [
                    _angular_common__WEBPACK_IMPORTED_MODULE_1__["CommonModule"],
                ],
                exports: [_custom_validators__WEBPACK_IMPORTED_MODULE_2__["ExactMatchDirective"]]
            }]
    }], null, null); })();


/***/ })

}]);
//# sourceMappingURL=common-es2015.js.map