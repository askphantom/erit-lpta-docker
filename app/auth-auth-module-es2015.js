(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["auth-auth-module"],{

/***/ "./src/app/@auth/auth.module.ts":
/*!**************************************!*\
  !*** ./src/app/@auth/auth.module.ts ***!
  \**************************************/
/*! exports provided: AuthModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthModule", function() { return AuthModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _auth_auth_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./auth/auth.component */ "./src/app/@auth/auth/auth.component.ts");
/* harmony import */ var _auth_routing_module__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./auth.routing.module */ "./src/app/@auth/auth.routing.module.ts");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm2015/forms.js");
/* harmony import */ var _validators_validators_module__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../validators/validators.module */ "./src/app/validators/validators.module.ts");
/* harmony import */ var _angular_material_radio__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @angular/material/radio */ "./node_modules/@angular/material/__ivy_ngcc__/fesm2015/radio.js");
/* harmony import */ var _signup_signup_component__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./signup/signup.component */ "./src/app/@auth/signup/signup.component.ts");
/* harmony import */ var _login_login_component__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./login/login.component */ "./src/app/@auth/login/login.component.ts");
/* harmony import */ var _verify_email_verify_email_component__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./verify-email/verify-email.component */ "./src/app/@auth/verify-email/verify-email.component.ts");
/* harmony import */ var _forgot_password_forgot_password_component__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./forgot-password/forgot-password.component */ "./src/app/@auth/forgot-password/forgot-password.component.ts");
/* harmony import */ var _change_password_change_password_component__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./change-password/change-password.component */ "./src/app/@auth/change-password/change-password.component.ts");














class AuthModule {
}
AuthModule.ɵmod = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineNgModule"]({ type: AuthModule });
AuthModule.ɵinj = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineInjector"]({ factory: function AuthModule_Factory(t) { return new (t || AuthModule)(); }, providers: [], imports: [[_angular_common__WEBPACK_IMPORTED_MODULE_3__["CommonModule"],
            _auth_routing_module__WEBPACK_IMPORTED_MODULE_2__["AuthRoutingModule"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_4__["FormsModule"],
            _validators_validators_module__WEBPACK_IMPORTED_MODULE_5__["ValidatorsModule"],
            _angular_material_radio__WEBPACK_IMPORTED_MODULE_6__["MatRadioModule"]
        ]] });
(function () { (typeof ngJitMode === "undefined" || ngJitMode) && _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵsetNgModuleScope"](AuthModule, { declarations: [_auth_auth_component__WEBPACK_IMPORTED_MODULE_1__["AuthComponent"], _auth_auth_component__WEBPACK_IMPORTED_MODULE_1__["AuthComponent"], _signup_signup_component__WEBPACK_IMPORTED_MODULE_7__["SignupComponent"], _login_login_component__WEBPACK_IMPORTED_MODULE_8__["LoginComponent"], _verify_email_verify_email_component__WEBPACK_IMPORTED_MODULE_9__["VerifyEmailComponent"], _forgot_password_forgot_password_component__WEBPACK_IMPORTED_MODULE_10__["ForgotPasswordComponent"], _change_password_change_password_component__WEBPACK_IMPORTED_MODULE_11__["ChangePasswordComponent"]], imports: [_angular_common__WEBPACK_IMPORTED_MODULE_3__["CommonModule"],
        _auth_routing_module__WEBPACK_IMPORTED_MODULE_2__["AuthRoutingModule"],
        _angular_forms__WEBPACK_IMPORTED_MODULE_4__["FormsModule"],
        _validators_validators_module__WEBPACK_IMPORTED_MODULE_5__["ValidatorsModule"],
        _angular_material_radio__WEBPACK_IMPORTED_MODULE_6__["MatRadioModule"]] }); })();
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](AuthModule, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"],
        args: [{
                imports: [_angular_common__WEBPACK_IMPORTED_MODULE_3__["CommonModule"],
                    _auth_routing_module__WEBPACK_IMPORTED_MODULE_2__["AuthRoutingModule"],
                    _angular_forms__WEBPACK_IMPORTED_MODULE_4__["FormsModule"],
                    _validators_validators_module__WEBPACK_IMPORTED_MODULE_5__["ValidatorsModule"],
                    _angular_material_radio__WEBPACK_IMPORTED_MODULE_6__["MatRadioModule"]
                ],
                exports: [],
                declarations: [_auth_auth_component__WEBPACK_IMPORTED_MODULE_1__["AuthComponent"], ..._auth_routing_module__WEBPACK_IMPORTED_MODULE_2__["routedComponent"]],
                schemas: [],
                providers: [],
            }]
    }], null, null); })();


/***/ }),

/***/ "./src/app/@auth/auth.routing.module.ts":
/*!**********************************************!*\
  !*** ./src/app/@auth/auth.routing.module.ts ***!
  \**********************************************/
/*! exports provided: AuthRoutingModule, routedComponent, usedGuards */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthRoutingModule", function() { return AuthRoutingModule; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "routedComponent", function() { return routedComponent; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "usedGuards", function() { return usedGuards; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var ___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! . */ "./src/app/@auth/index.ts");
/* harmony import */ var _guards__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../@guards */ "./src/app/@guards/index.ts");






const routes = [
    {
        path: "",
        component: ___WEBPACK_IMPORTED_MODULE_2__["AuthComponent"],
        children: [
            {
                path: "register",
                component: ___WEBPACK_IMPORTED_MODULE_2__["SignupComponent"],
                canActivate: [_guards__WEBPACK_IMPORTED_MODULE_3__["AlreadyLoggedInGuard"]],
            },
            {
                path: "login",
                component: ___WEBPACK_IMPORTED_MODULE_2__["LoginComponent"],
                canActivate: [_guards__WEBPACK_IMPORTED_MODULE_3__["AlreadyLoggedInGuard"]],
            },
            {
                path: "forgot-password",
                component: ___WEBPACK_IMPORTED_MODULE_2__["ForgotPasswordComponent"],
                canActivate: [_guards__WEBPACK_IMPORTED_MODULE_3__["AlreadyLoggedInGuard"]],
            },
            { path: "reset-password", component: ___WEBPACK_IMPORTED_MODULE_2__["ChangePasswordComponent"] },
            { path: "email-verification", component: ___WEBPACK_IMPORTED_MODULE_2__["VerifyEmailComponent"] },
            { path: "verify", component: ___WEBPACK_IMPORTED_MODULE_2__["VerifyEmailComponent"] },
            // { path: 'verification-sent/:email', component: VerificationSentComponent },
            { path: "", pathMatch: "full", redirectTo: "login" },
        ],
    },
];
class AuthRoutingModule {
}
AuthRoutingModule.ɵmod = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineNgModule"]({ type: AuthRoutingModule });
AuthRoutingModule.ɵinj = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineInjector"]({ factory: function AuthRoutingModule_Factory(t) { return new (t || AuthRoutingModule)(); }, imports: [[_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"].forChild(routes)],
        _angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"]] });
(function () { (typeof ngJitMode === "undefined" || ngJitMode) && _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵsetNgModuleScope"](AuthRoutingModule, { imports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"]], exports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"]] }); })();
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](AuthRoutingModule, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"],
        args: [{
                imports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"].forChild(routes)],
                exports: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterModule"]],
            }]
    }], null, null); })();
const routedComponent = [
    ___WEBPACK_IMPORTED_MODULE_2__["AuthComponent"],
    ___WEBPACK_IMPORTED_MODULE_2__["SignupComponent"],
    ___WEBPACK_IMPORTED_MODULE_2__["LoginComponent"],
    ___WEBPACK_IMPORTED_MODULE_2__["VerifyEmailComponent"],
    ___WEBPACK_IMPORTED_MODULE_2__["ForgotPasswordComponent"],
    ___WEBPACK_IMPORTED_MODULE_2__["ChangePasswordComponent"],
];
const usedGuards = [_guards__WEBPACK_IMPORTED_MODULE_3__["AlreadyLoggedInGuard"]];


/***/ }),

/***/ "./src/app/@auth/auth/auth.component.ts":
/*!**********************************************!*\
  !*** ./src/app/@auth/auth/auth.component.ts ***!
  \**********************************************/
/*! exports provided: AuthComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthComponent", function() { return AuthComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../@core */ "./src/app/@core/index.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");




class AuthComponent {
    constructor(authService) {
        this.authService = authService;
        this.loading = false;
    }
    ngOnInit() {
        this.checkForLoadingState();
    }
    checkForLoadingState() {
        this.loadingSubscription = this.authService.state$
            .subscribe(arg => this.loading = arg);
    }
    ngOnDestroy() {
        this.loadingSubscription.unsubscribe();
    }
}
AuthComponent.ɵfac = function AuthComponent_Factory(t) { return new (t || AuthComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_core__WEBPACK_IMPORTED_MODULE_1__["AuthService"])); };
AuthComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineComponent"]({ type: AuthComponent, selectors: [["auth"]], decls: 4, vars: 0, consts: [["id", "container"], [1, "d-flex", "flex-column", "main-box", "position-relative"], [1, "auth-card", "m-md-auto", "m-0"]], template: function AuthComponent_Template(rf, ctx) { if (rf & 1) {
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "div", 0);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](1, "div", 1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](2, "div", 2);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](3, "router-outlet");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    } }, directives: [_angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterOutlet"]], styles: [".bg-img[_ngcontent-%COMP%] {\n  background-image: url('bg@2x.png');\n  background-repeat: no-repeat;\n  background-size: cover;\n  background-color: #FF9B07;\n  height: 100vh;\n  border-radius: 20px;\n}\n\nheader[_ngcontent-%COMP%] {\n  height: 50px;\n  width: 100%;\n  background: #fff;\n}\n\nform[_ngcontent-%COMP%] {\n  width: 95%;\n  max-width: 540px;\n  height: -moz-max-content;\n  height: max-content;\n}\n\n.auth-card[_ngcontent-%COMP%] {\n  width: 75%;\n  min-width: 650px;\n  height: -moz-fit-content;\n  height: fit-content;\n}\n\n.main-box[_ngcontent-%COMP%] {\n  min-height: 100vh;\n  background-color: #f4f7fb;\n}\n\n.auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n  padding: 3rem;\n  height: 500px;\n}\n\n.form-input[_ngcontent-%COMP%] {\n  padding-bottom: 13px;\n}\n\na[_ngcontent-%COMP%] {\n  font-weight: 500;\n}\n\n.password-reveal[_ngcontent-%COMP%] {\n  position: absolute;\n  bottom: 30%;\n  right: 18px;\n}\n\n.fade-in[_ngcontent-%COMP%] {\n  opacity: 1;\n  animation-name: fadeInOpacity;\n  animation-iteration-count: 1;\n  animation-timing-function: ease-in;\n  animation-duration: 0.3s;\n}\n\n@keyframes fadeInOpacity {\n  0% {\n    opacity: 0;\n  }\n  100% {\n    opacity: 1;\n  }\n}\n\n@media (max-width: 768px) {\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    height: auto;\n  }\n\n  .bg-img[_ngcontent-%COMP%] {\n    border-radius: 0px;\n  }\n\n  .auth-card[_ngcontent-%COMP%] {\n    width: 100%;\n    min-width: 100%;\n  }\n\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    padding: 1.5rem;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div.col-lg-7[_ngcontent-%COMP%] {\n    border-radius: 20px;\n    margin-top: -20px;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h1[_ngcontent-%COMP%] {\n    font-size: 30px;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h5[_ngcontent-%COMP%], .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h6[_ngcontent-%COMP%] {\n    font-size: small;\n  }\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvYXV0aC9DOlxcbGFyYWdvblxcd3d3XFxlcml0YXBwL3NyY1xcYXBwXFxAYXV0aFxcYXV0aFxcYXV0aC5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvYXV0aC9hdXRoLmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBQ0Usa0NBQUE7RUFDQSw0QkFBQTtFQUNBLHNCQUFBO0VBQ0EseUJBQUE7RUFDQSxhQUFBO0VBQ0EsbUJBQUE7QUNDRjs7QURFQTtFQUNFLFlBQUE7RUFDQSxXQUFBO0VBQ0EsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSxnQkFBQTtFQUNBLHdCQUFBO0VBQUEsbUJBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSxnQkFBQTtFQUNBLHdCQUFBO0VBQUEsbUJBQUE7QUNDRjs7QURFQTtFQUNFLGlCQUFBO0VBQ0EseUJBQUE7QUNDRjs7QURFQTtFQUNFLGFBQUE7RUFDQSxhQUFBO0FDQ0Y7O0FERUE7RUFDRSxvQkFBQTtBQ0NGOztBREVBO0VBQ0UsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLGtCQUFBO0VBQ0EsV0FBQTtFQUNBLFdBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSw2QkFBQTtFQUNBLDRCQUFBO0VBQ0Esa0NBQUE7RUFDQSx3QkFBQTtBQ0NGOztBREVBO0VBQ0U7SUFDRSxVQUFBO0VDQ0Y7RURDQTtJQUNFLFVBQUE7RUNDRjtBQUNGOztBREVBO0VBQ0U7SUFDRSxZQUFBO0VDQUY7O0VERUE7SUFDRSxrQkFBQTtFQ0NGOztFREVBO0lBQ0UsV0FBQTtJQUNBLGVBQUE7RUNDRjs7RURFQTtJQUNFLGVBQUE7RUNDRjtFREFFO0lBQ0UsbUJBQUE7SUFDQSxpQkFBQTtFQ0VKO0VEQUU7SUFDRSxlQUFBO0VDRUo7RURDRTs7SUFFRSxnQkFBQTtFQ0NKO0FBQ0YiLCJmaWxlIjoic3JjL2FwcC9AYXV0aC9hdXRoL2F1dGguY29tcG9uZW50LnNjc3MiLCJzb3VyY2VzQ29udGVudCI6WyIuYmctaW1nIHtcclxuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCIuLi8uLi8uLi9hc3NldHMvaW1hZ2VzL2JnQDJ4LnBuZ1wiKTtcclxuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xyXG4gIGJhY2tncm91bmQtc2l6ZTogY292ZXI7XHJcbiAgYmFja2dyb3VuZC1jb2xvcjogI0ZGOUIwNztcclxuICBoZWlnaHQ6IDEwMHZoO1xyXG4gIGJvcmRlci1yYWRpdXM6IDIwcHg7XHJcbn1cclxuXHJcbmhlYWRlciB7XHJcbiAgaGVpZ2h0OiA1MHB4O1xyXG4gIHdpZHRoOiAxMDAlO1xyXG4gIGJhY2tncm91bmQ6ICNmZmY7XHJcbn1cclxuXHJcbmZvcm0ge1xyXG4gIHdpZHRoOiA5NSU7XHJcbiAgbWF4LXdpZHRoOiA1NDBweDtcclxuICBoZWlnaHQ6IG1heC1jb250ZW50O1xyXG59XHJcblxyXG4uYXV0aC1jYXJkIHtcclxuICB3aWR0aDogNzUlO1xyXG4gIG1pbi13aWR0aDogNjUwcHg7XHJcbiAgaGVpZ2h0OiBmaXQtY29udGVudDtcclxufVxyXG5cclxuLm1haW4tYm94IHtcclxuICBtaW4taGVpZ2h0OiAxMDB2aDtcclxuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjRmN2ZiO1xyXG59XHJcblxyXG4uYXV0aC1ib3ggPiBkaXYge1xyXG4gIHBhZGRpbmc6IDNyZW07XHJcbiAgaGVpZ2h0OiA1MDBweDtcclxufVxyXG5cclxuLmZvcm0taW5wdXQge1xyXG4gIHBhZGRpbmctYm90dG9tOiAxM3B4O1xyXG59XHJcblxyXG5hIHtcclxuICBmb250LXdlaWdodDogNTAwO1xyXG59XHJcblxyXG4ucGFzc3dvcmQtcmV2ZWFsIHtcclxuICBwb3NpdGlvbjogYWJzb2x1dGU7XHJcbiAgYm90dG9tOiAzMCU7XHJcbiAgcmlnaHQ6IDE4cHg7XHJcbn1cclxuXHJcbi5mYWRlLWluIHtcclxuICBvcGFjaXR5OiAxO1xyXG4gIGFuaW1hdGlvbi1uYW1lOiBmYWRlSW5PcGFjaXR5O1xyXG4gIGFuaW1hdGlvbi1pdGVyYXRpb24tY291bnQ6IDE7XHJcbiAgYW5pbWF0aW9uLXRpbWluZy1mdW5jdGlvbjogZWFzZS1pbjtcclxuICBhbmltYXRpb24tZHVyYXRpb246IDAuM3M7XHJcbn1cclxuXHJcbkBrZXlmcmFtZXMgZmFkZUluT3BhY2l0eSB7XHJcbiAgMCUge1xyXG4gICAgb3BhY2l0eTogMDtcclxuICB9XHJcbiAgMTAwJSB7XHJcbiAgICBvcGFjaXR5OiAxO1xyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDc2OHB4KSB7XHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIGhlaWdodDogYXV0bztcclxuICB9XHJcbiAgLmJnLWltZyB7XHJcbiAgICBib3JkZXItcmFkaXVzOiAwcHg7XHJcbiAgfVxyXG5cclxuICAuYXV0aC1jYXJkIHtcclxuICAgIHdpZHRoOiAxMDAlO1xyXG4gICAgbWluLXdpZHRoOiAxMDAlO1xyXG4gIH1cclxuXHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIHBhZGRpbmc6IDEuNXJlbTtcclxuICAgICYuY29sLWxnLTcge1xyXG4gICAgICBib3JkZXItcmFkaXVzOiAyMHB4O1xyXG4gICAgICBtYXJnaW4tdG9wOiAtMjBweDtcclxuICAgIH1cclxuICAgIGgxIHtcclxuICAgICAgZm9udC1zaXplOiAzMHB4O1xyXG4gICAgfVxyXG5cclxuICAgIGg1LFxyXG4gICAgaDYge1xyXG4gICAgICBmb250LXNpemU6IHNtYWxsO1xyXG4gICAgfVxyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDQyNXB4KSB7XHJcbn1cclxuIiwiLmJnLWltZyB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcIi4uLy4uLy4uL2Fzc2V0cy9pbWFnZXMvYmdAMngucG5nXCIpO1xuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjRkY5QjA3O1xuICBoZWlnaHQ6IDEwMHZoO1xuICBib3JkZXItcmFkaXVzOiAyMHB4O1xufVxuXG5oZWFkZXIge1xuICBoZWlnaHQ6IDUwcHg7XG4gIHdpZHRoOiAxMDAlO1xuICBiYWNrZ3JvdW5kOiAjZmZmO1xufVxuXG5mb3JtIHtcbiAgd2lkdGg6IDk1JTtcbiAgbWF4LXdpZHRoOiA1NDBweDtcbiAgaGVpZ2h0OiBtYXgtY29udGVudDtcbn1cblxuLmF1dGgtY2FyZCB7XG4gIHdpZHRoOiA3NSU7XG4gIG1pbi13aWR0aDogNjUwcHg7XG4gIGhlaWdodDogZml0LWNvbnRlbnQ7XG59XG5cbi5tYWluLWJveCB7XG4gIG1pbi1oZWlnaHQ6IDEwMHZoO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjRmN2ZiO1xufVxuXG4uYXV0aC1ib3ggPiBkaXYge1xuICBwYWRkaW5nOiAzcmVtO1xuICBoZWlnaHQ6IDUwMHB4O1xufVxuXG4uZm9ybS1pbnB1dCB7XG4gIHBhZGRpbmctYm90dG9tOiAxM3B4O1xufVxuXG5hIHtcbiAgZm9udC13ZWlnaHQ6IDUwMDtcbn1cblxuLnBhc3N3b3JkLXJldmVhbCB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgYm90dG9tOiAzMCU7XG4gIHJpZ2h0OiAxOHB4O1xufVxuXG4uZmFkZS1pbiB7XG4gIG9wYWNpdHk6IDE7XG4gIGFuaW1hdGlvbi1uYW1lOiBmYWRlSW5PcGFjaXR5O1xuICBhbmltYXRpb24taXRlcmF0aW9uLWNvdW50OiAxO1xuICBhbmltYXRpb24tdGltaW5nLWZ1bmN0aW9uOiBlYXNlLWluO1xuICBhbmltYXRpb24tZHVyYXRpb246IDAuM3M7XG59XG5cbkBrZXlmcmFtZXMgZmFkZUluT3BhY2l0eSB7XG4gIDAlIHtcbiAgICBvcGFjaXR5OiAwO1xuICB9XG4gIDEwMCUge1xuICAgIG9wYWNpdHk6IDE7XG4gIH1cbn1cbkBtZWRpYSAobWF4LXdpZHRoOiA3NjhweCkge1xuICAuYXV0aC1ib3ggPiBkaXYge1xuICAgIGhlaWdodDogYXV0bztcbiAgfVxuXG4gIC5iZy1pbWcge1xuICAgIGJvcmRlci1yYWRpdXM6IDBweDtcbiAgfVxuXG4gIC5hdXRoLWNhcmQge1xuICAgIHdpZHRoOiAxMDAlO1xuICAgIG1pbi13aWR0aDogMTAwJTtcbiAgfVxuXG4gIC5hdXRoLWJveCA+IGRpdiB7XG4gICAgcGFkZGluZzogMS41cmVtO1xuICB9XG4gIC5hdXRoLWJveCA+IGRpdi5jb2wtbGctNyB7XG4gICAgYm9yZGVyLXJhZGl1czogMjBweDtcbiAgICBtYXJnaW4tdG9wOiAtMjBweDtcbiAgfVxuICAuYXV0aC1ib3ggPiBkaXYgaDEge1xuICAgIGZvbnQtc2l6ZTogMzBweDtcbiAgfVxuICAuYXV0aC1ib3ggPiBkaXYgaDUsXG4uYXV0aC1ib3ggPiBkaXYgaDYge1xuICAgIGZvbnQtc2l6ZTogc21hbGw7XG4gIH1cbn0iXX0= */"] });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](AuthComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"],
        args: [{
                selector: 'auth',
                templateUrl: './auth.component.html',
                styleUrls: ['./auth.component.scss']
            }]
    }], function () { return [{ type: _core__WEBPACK_IMPORTED_MODULE_1__["AuthService"] }]; }, null); })();


/***/ }),

/***/ "./src/app/@auth/change-password/change-password.component.ts":
/*!********************************************************************!*\
  !*** ./src/app/@auth/change-password/change-password.component.ts ***!
  \********************************************************************/
/*! exports provided: ChangePasswordComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ChangePasswordComponent", function() { return ChangePasswordComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _model__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../@model */ "./src/app/@model/index.ts");
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../@core */ "./src/app/@core/index.ts");
/* harmony import */ var ngx_toastr__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ngx-toastr */ "./node_modules/ngx-toastr/__ivy_ngcc__/fesm2015/ngx-toastr.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var _core_general_service__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../@core/general.service */ "./src/app/@core/general.service.ts");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm2015/forms.js");
/* harmony import */ var _validators_custom_validators__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../../validators/custom-validators */ "./src/app/validators/custom-validators.ts");










function ChangePasswordComponent_form_6_img_7_Template(rf, ctx) { if (rf & 1) {
    const _r41 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "img", 20);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("click", function ChangePasswordComponent_form_6_img_7_Template_img_click_0_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵrestoreView"](_r41); const ctx_r40 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"](2); return ctx_r40.hidePassword = ctx_r40.authService.changePasswordState(ctx_r40.hidePassword, $event, 0); });
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function ChangePasswordComponent_form_6_img_8_Template(rf, ctx) { if (rf & 1) {
    const _r43 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "img", 21);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("click", function ChangePasswordComponent_form_6_img_8_Template_img_click_0_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵrestoreView"](_r43); const ctx_r42 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"](2); return ctx_r42.hidePassword = ctx_r42.authService.changePasswordState(ctx_r42.hidePassword, $event, 0); });
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function ChangePasswordComponent_form_6_img_14_Template(rf, ctx) { if (rf & 1) {
    const _r45 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "img", 20);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("click", function ChangePasswordComponent_form_6_img_14_Template_img_click_0_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵrestoreView"](_r45); const ctx_r44 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"](2); return ctx_r44.hideConfirmPassword = ctx_r44.authService.changePasswordState(ctx_r44.hideConfirmPassword, $event, 0); });
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function ChangePasswordComponent_form_6_img_15_Template(rf, ctx) { if (rf & 1) {
    const _r47 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "img", 21);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("click", function ChangePasswordComponent_form_6_img_15_Template_img_click_0_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵrestoreView"](_r47); const ctx_r46 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"](2); return ctx_r46.hideConfirmPassword = ctx_r46.authService.changePasswordState(ctx_r46.hideConfirmPassword, $event, 0); });
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function ChangePasswordComponent_form_6_Template(rf, ctx) { if (rf & 1) {
    const _r49 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "form", 8, 9);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngSubmit", function ChangePasswordComponent_form_6_Template_form_ngSubmit_0_listener() { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵrestoreView"](_r49); const ctx_r48 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"](); return ctx_r48.reset(ctx_r48.user); });
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](2, "div", 10);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](3, "label", 11);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](4, "New Password");
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](5, "div", 12);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](6, "input", 13);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngModelChange", function ChangePasswordComponent_form_6_Template_input_ngModelChange_6_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵrestoreView"](_r49); const ctx_r50 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"](); return ctx_r50.user.password = $event; });
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](7, ChangePasswordComponent_form_6_img_7_Template, 1, 0, "img", 14);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](8, ChangePasswordComponent_form_6_img_8_Template, 1, 0, "img", 15);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](9, "div", 16);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](10, "label", 17);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](11, "Confirm Password");
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](12, "div", 12);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](13, "input", 18);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngModelChange", function ChangePasswordComponent_form_6_Template_input_ngModelChange_13_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵrestoreView"](_r49); const ctx_r51 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"](); return ctx_r51.user.confirm_password = $event; });
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](14, ChangePasswordComponent_form_6_img_14_Template, 1, 0, "img", 14);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](15, ChangePasswordComponent_form_6_img_15_Template, 1, 0, "img", 15);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](16, "button", 19);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](17, " Send Reset Link ");
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} if (rf & 2) {
    const _r35 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵreference"](1);
    const ctx_r32 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](6);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngModel", ctx_r32.user.password);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx_r32.hidePassword);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", !ctx_r32.hidePassword);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](5);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngModel", ctx_r32.user.confirm_password);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx_r32.hideConfirmPassword);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", !ctx_r32.hideConfirmPassword);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("disabled", !_r35.valid);
} }
function ChangePasswordComponent_div_7_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "div");
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](1, "img", 22);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](2, "p", 23);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](3, "Account verification was not successful");
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r33 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵpropertyInterpolate1"]("src", "assets/images/verify-", ctx_r33.isVerified, ".svg", _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵsanitizeUrl"]);
} }
function ChangePasswordComponent_div_8_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "div", 24);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](1, "i", 25);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
class ChangePasswordComponent {
    constructor(authService, toastr, router, generalService, route) {
        this.authService = authService;
        this.toastr = toastr;
        this.router = router;
        this.generalService = generalService;
        this.route = route;
        this.loading = true;
        this.user = new _model__WEBPACK_IMPORTED_MODULE_1__["User"]();
        this.hidePassword = true;
        this.hideConfirmPassword = true;
    }
    ngOnInit() {
        this.route.queryParams.subscribe((params) => {
            this.code = params.code;
            this.email = params["email"];
            this.verify(params.code, params["email"]);
        });
    }
    reset(user) {
        this.loading = true;
        this.authService.showLoader(true);
        this.authService
            .resetPassword({ code: this.code, pwd: user.password, email: this.email })
            .subscribe((data) => {
            this.loading = false;
            this.authService.showLoader(false);
            if (data.status._text != "Failed") {
                this.toastr.success("Your password has been reset, Kindly Login ", "Success ");
                this.router.navigate(["/auth/login"]);
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.loading = false;
            this.authService.showLoader(false);
            this.toastr.error(error.error.message || error.message || error, "Oops", {
                timeOut: 15000,
            });
        });
    }
    verify(code, email) {
        this.authService.showLoader(true);
        this.authService.verifyEmail({ code, email }).subscribe((data) => {
            this.loading = false;
            this.authService.showLoader(false);
            if (data.status._text != "Failed") {
                this.isVerified = true;
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
                this.isVerified = false;
            }
        }, (error) => {
            this.isVerified = false;
            this.authService.showLoader(false);
            this.loading = false;
            this.toastr.error("Mail not verified", "", {
                timeOut: 15000,
            });
        });
    }
}
ChangePasswordComponent.ɵfac = function ChangePasswordComponent_Factory(t) { return new (t || ChangePasswordComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_core__WEBPACK_IMPORTED_MODULE_2__["AuthService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](ngx_toastr__WEBPACK_IMPORTED_MODULE_3__["ToastrService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_angular_router__WEBPACK_IMPORTED_MODULE_4__["Router"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_core_general_service__WEBPACK_IMPORTED_MODULE_5__["GeneralService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"])); };
ChangePasswordComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineComponent"]({ type: ChangePasswordComponent, selectors: [["app-change-password"]], decls: 9, vars: 3, consts: [[1, "auth-box", "d-flex", "flex-column", "flex-md-row"], [1, "col-md-5", "p-2", "p-md-4", "d-flex", "flex-column"], [1, "font-weight-medium", "text-green-400", "font-weight-med", "mt-md-5", "mt-1", "mb-2", "text-md-center"], ["src", "./assets/images/forgot-password.svg", "alt", "nigenius logo", "srcset", "", 1, "mt-md-5", "mt-1", "mr-auto", "mr-md-0", "align-self-center"], [1, "col-md-7", "pl-3", "pt-0", "pt-md-3", "p-md-4", "bg-grey", "position-relative"], ["class", "mt-5", 3, "ngSubmit", 4, "ngIf"], [4, "ngIf"], ["id", "loading-overlay", 4, "ngIf"], [1, "mt-5", 3, "ngSubmit"], ["resetPasswordForm", "ngForm"], [1, "form-input", "mt-md-5", "mt-2", "pt-md-4", "pt-2"], ["for", "password", 1, "mb-0"], [1, "position-relative"], ["id", "password", "placeholder", "Type your password", "type", "password", "required", "", "name", "password", 1, "form-control", 3, "ngModel", "ngModelChange"], ["class", "password-reveal fade-in", "src", "./assets/images/icons/password-icon.svg", 3, "click", 4, "ngIf"], ["class", "password-reveal fade-in", "src", "./assets/images/icons/password-reveal-icon.svg", 3, "click", 4, "ngIf"], [1, "form-input"], ["for", "confirm-password"], ["id", "confirm-password", "placeholder", "Re-Type password", "type", "password", "exactMatch", "password", "required", "", "name", "confrim-password", 1, "form-control", 3, "ngModel", "ngModelChange"], [1, "btn", "bg-success", "bg-green-400", "bg-success", 3, "disabled"], ["src", "./assets/images/icons/password-icon.svg", 1, "password-reveal", "fade-in", 3, "click"], ["src", "./assets/images/icons/password-reveal-icon.svg", 1, "password-reveal", "fade-in", 3, "click"], ["alt", "verify image", 3, "src"], [1, "text-main"], ["id", "loading-overlay"], [1, "fa", "fa-spinner", "edit", "fa-pulse", "fa-3x", "fa-fw"]], template: function ChangePasswordComponent_Template(rf, ctx) { if (rf & 1) {
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "div", 0);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](1, "div", 1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](2, "h2", 2);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](3, " Reset Password? ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](4, "img", 3);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](5, "div", 4);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](6, ChangePasswordComponent_form_6_Template, 18, 7, "form", 5);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](7, ChangePasswordComponent_div_7_Template, 4, 1, "div", 6);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](8, ChangePasswordComponent_div_8_Template, 2, 0, "div", 7);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    } if (rf & 2) {
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](6);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx.isVerified);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", !ctx.isVerified);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx.loading);
    } }, directives: [_angular_common__WEBPACK_IMPORTED_MODULE_6__["NgIf"], _angular_forms__WEBPACK_IMPORTED_MODULE_7__["ɵangular_packages_forms_forms_y"], _angular_forms__WEBPACK_IMPORTED_MODULE_7__["NgControlStatusGroup"], _angular_forms__WEBPACK_IMPORTED_MODULE_7__["NgForm"], _angular_forms__WEBPACK_IMPORTED_MODULE_7__["DefaultValueAccessor"], _angular_forms__WEBPACK_IMPORTED_MODULE_7__["RequiredValidator"], _angular_forms__WEBPACK_IMPORTED_MODULE_7__["NgControlStatus"], _angular_forms__WEBPACK_IMPORTED_MODULE_7__["NgModel"], _validators_custom_validators__WEBPACK_IMPORTED_MODULE_8__["ExactMatchDirective"]], styles: [".bg-img[_ngcontent-%COMP%] {\n  background-image: url('bg@2x.png');\n  background-repeat: no-repeat;\n  background-size: cover;\n  background-color: #FF9B07;\n  height: 100vh;\n  border-radius: 20px;\n}\n\nheader[_ngcontent-%COMP%] {\n  height: 50px;\n  width: 100%;\n  background: #fff;\n}\n\nform[_ngcontent-%COMP%] {\n  width: 95%;\n  max-width: 540px;\n  height: -moz-max-content;\n  height: max-content;\n}\n\n.auth-card[_ngcontent-%COMP%] {\n  width: 75%;\n  min-width: 650px;\n  height: -moz-fit-content;\n  height: fit-content;\n}\n\n.main-box[_ngcontent-%COMP%] {\n  min-height: 100vh;\n  background-color: #f4f7fb;\n}\n\n.auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n  padding: 3rem;\n  height: 500px;\n}\n\n.form-input[_ngcontent-%COMP%] {\n  padding-bottom: 13px;\n}\n\na[_ngcontent-%COMP%] {\n  font-weight: 500;\n}\n\n.password-reveal[_ngcontent-%COMP%] {\n  position: absolute;\n  bottom: 30%;\n  right: 18px;\n}\n\n.fade-in[_ngcontent-%COMP%] {\n  opacity: 1;\n  animation-name: fadeInOpacity;\n  animation-iteration-count: 1;\n  animation-timing-function: ease-in;\n  animation-duration: 0.3s;\n}\n\n@keyframes fadeInOpacity {\n  0% {\n    opacity: 0;\n  }\n  100% {\n    opacity: 1;\n  }\n}\n\n@media (max-width: 768px) {\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    height: auto;\n  }\n\n  .bg-img[_ngcontent-%COMP%] {\n    border-radius: 0px;\n  }\n\n  .auth-card[_ngcontent-%COMP%] {\n    width: 100%;\n    min-width: 100%;\n  }\n\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    padding: 1.5rem;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div.col-lg-7[_ngcontent-%COMP%] {\n    border-radius: 20px;\n    margin-top: -20px;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h1[_ngcontent-%COMP%] {\n    font-size: 30px;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h5[_ngcontent-%COMP%], .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h6[_ngcontent-%COMP%] {\n    font-size: small;\n  }\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvYXV0aC9DOlxcbGFyYWdvblxcd3d3XFxlcml0YXBwL3NyY1xcYXBwXFxAYXV0aFxcYXV0aFxcYXV0aC5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvYXV0aC9hdXRoLmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBQ0Usa0NBQUE7RUFDQSw0QkFBQTtFQUNBLHNCQUFBO0VBQ0EseUJBQUE7RUFDQSxhQUFBO0VBQ0EsbUJBQUE7QUNDRjs7QURFQTtFQUNFLFlBQUE7RUFDQSxXQUFBO0VBQ0EsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSxnQkFBQTtFQUNBLHdCQUFBO0VBQUEsbUJBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSxnQkFBQTtFQUNBLHdCQUFBO0VBQUEsbUJBQUE7QUNDRjs7QURFQTtFQUNFLGlCQUFBO0VBQ0EseUJBQUE7QUNDRjs7QURFQTtFQUNFLGFBQUE7RUFDQSxhQUFBO0FDQ0Y7O0FERUE7RUFDRSxvQkFBQTtBQ0NGOztBREVBO0VBQ0UsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLGtCQUFBO0VBQ0EsV0FBQTtFQUNBLFdBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSw2QkFBQTtFQUNBLDRCQUFBO0VBQ0Esa0NBQUE7RUFDQSx3QkFBQTtBQ0NGOztBREVBO0VBQ0U7SUFDRSxVQUFBO0VDQ0Y7RURDQTtJQUNFLFVBQUE7RUNDRjtBQUNGOztBREVBO0VBQ0U7SUFDRSxZQUFBO0VDQUY7O0VERUE7SUFDRSxrQkFBQTtFQ0NGOztFREVBO0lBQ0UsV0FBQTtJQUNBLGVBQUE7RUNDRjs7RURFQTtJQUNFLGVBQUE7RUNDRjtFREFFO0lBQ0UsbUJBQUE7SUFDQSxpQkFBQTtFQ0VKO0VEQUU7SUFDRSxlQUFBO0VDRUo7RURDRTs7SUFFRSxnQkFBQTtFQ0NKO0FBQ0YiLCJmaWxlIjoic3JjL2FwcC9AYXV0aC9hdXRoL2F1dGguY29tcG9uZW50LnNjc3MiLCJzb3VyY2VzQ29udGVudCI6WyIuYmctaW1nIHtcclxuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCIuLi8uLi8uLi9hc3NldHMvaW1hZ2VzL2JnQDJ4LnBuZ1wiKTtcclxuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xyXG4gIGJhY2tncm91bmQtc2l6ZTogY292ZXI7XHJcbiAgYmFja2dyb3VuZC1jb2xvcjogI0ZGOUIwNztcclxuICBoZWlnaHQ6IDEwMHZoO1xyXG4gIGJvcmRlci1yYWRpdXM6IDIwcHg7XHJcbn1cclxuXHJcbmhlYWRlciB7XHJcbiAgaGVpZ2h0OiA1MHB4O1xyXG4gIHdpZHRoOiAxMDAlO1xyXG4gIGJhY2tncm91bmQ6ICNmZmY7XHJcbn1cclxuXHJcbmZvcm0ge1xyXG4gIHdpZHRoOiA5NSU7XHJcbiAgbWF4LXdpZHRoOiA1NDBweDtcclxuICBoZWlnaHQ6IG1heC1jb250ZW50O1xyXG59XHJcblxyXG4uYXV0aC1jYXJkIHtcclxuICB3aWR0aDogNzUlO1xyXG4gIG1pbi13aWR0aDogNjUwcHg7XHJcbiAgaGVpZ2h0OiBmaXQtY29udGVudDtcclxufVxyXG5cclxuLm1haW4tYm94IHtcclxuICBtaW4taGVpZ2h0OiAxMDB2aDtcclxuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjRmN2ZiO1xyXG59XHJcblxyXG4uYXV0aC1ib3ggPiBkaXYge1xyXG4gIHBhZGRpbmc6IDNyZW07XHJcbiAgaGVpZ2h0OiA1MDBweDtcclxufVxyXG5cclxuLmZvcm0taW5wdXQge1xyXG4gIHBhZGRpbmctYm90dG9tOiAxM3B4O1xyXG59XHJcblxyXG5hIHtcclxuICBmb250LXdlaWdodDogNTAwO1xyXG59XHJcblxyXG4ucGFzc3dvcmQtcmV2ZWFsIHtcclxuICBwb3NpdGlvbjogYWJzb2x1dGU7XHJcbiAgYm90dG9tOiAzMCU7XHJcbiAgcmlnaHQ6IDE4cHg7XHJcbn1cclxuXHJcbi5mYWRlLWluIHtcclxuICBvcGFjaXR5OiAxO1xyXG4gIGFuaW1hdGlvbi1uYW1lOiBmYWRlSW5PcGFjaXR5O1xyXG4gIGFuaW1hdGlvbi1pdGVyYXRpb24tY291bnQ6IDE7XHJcbiAgYW5pbWF0aW9uLXRpbWluZy1mdW5jdGlvbjogZWFzZS1pbjtcclxuICBhbmltYXRpb24tZHVyYXRpb246IDAuM3M7XHJcbn1cclxuXHJcbkBrZXlmcmFtZXMgZmFkZUluT3BhY2l0eSB7XHJcbiAgMCUge1xyXG4gICAgb3BhY2l0eTogMDtcclxuICB9XHJcbiAgMTAwJSB7XHJcbiAgICBvcGFjaXR5OiAxO1xyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDc2OHB4KSB7XHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIGhlaWdodDogYXV0bztcclxuICB9XHJcbiAgLmJnLWltZyB7XHJcbiAgICBib3JkZXItcmFkaXVzOiAwcHg7XHJcbiAgfVxyXG5cclxuICAuYXV0aC1jYXJkIHtcclxuICAgIHdpZHRoOiAxMDAlO1xyXG4gICAgbWluLXdpZHRoOiAxMDAlO1xyXG4gIH1cclxuXHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIHBhZGRpbmc6IDEuNXJlbTtcclxuICAgICYuY29sLWxnLTcge1xyXG4gICAgICBib3JkZXItcmFkaXVzOiAyMHB4O1xyXG4gICAgICBtYXJnaW4tdG9wOiAtMjBweDtcclxuICAgIH1cclxuICAgIGgxIHtcclxuICAgICAgZm9udC1zaXplOiAzMHB4O1xyXG4gICAgfVxyXG5cclxuICAgIGg1LFxyXG4gICAgaDYge1xyXG4gICAgICBmb250LXNpemU6IHNtYWxsO1xyXG4gICAgfVxyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDQyNXB4KSB7XHJcbn1cclxuIiwiLmJnLWltZyB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcIi4uLy4uLy4uL2Fzc2V0cy9pbWFnZXMvYmdAMngucG5nXCIpO1xuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjRkY5QjA3O1xuICBoZWlnaHQ6IDEwMHZoO1xuICBib3JkZXItcmFkaXVzOiAyMHB4O1xufVxuXG5oZWFkZXIge1xuICBoZWlnaHQ6IDUwcHg7XG4gIHdpZHRoOiAxMDAlO1xuICBiYWNrZ3JvdW5kOiAjZmZmO1xufVxuXG5mb3JtIHtcbiAgd2lkdGg6IDk1JTtcbiAgbWF4LXdpZHRoOiA1NDBweDtcbiAgaGVpZ2h0OiBtYXgtY29udGVudDtcbn1cblxuLmF1dGgtY2FyZCB7XG4gIHdpZHRoOiA3NSU7XG4gIG1pbi13aWR0aDogNjUwcHg7XG4gIGhlaWdodDogZml0LWNvbnRlbnQ7XG59XG5cbi5tYWluLWJveCB7XG4gIG1pbi1oZWlnaHQ6IDEwMHZoO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjRmN2ZiO1xufVxuXG4uYXV0aC1ib3ggPiBkaXYge1xuICBwYWRkaW5nOiAzcmVtO1xuICBoZWlnaHQ6IDUwMHB4O1xufVxuXG4uZm9ybS1pbnB1dCB7XG4gIHBhZGRpbmctYm90dG9tOiAxM3B4O1xufVxuXG5hIHtcbiAgZm9udC13ZWlnaHQ6IDUwMDtcbn1cblxuLnBhc3N3b3JkLXJldmVhbCB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgYm90dG9tOiAzMCU7XG4gIHJpZ2h0OiAxOHB4O1xufVxuXG4uZmFkZS1pbiB7XG4gIG9wYWNpdHk6IDE7XG4gIGFuaW1hdGlvbi1uYW1lOiBmYWRlSW5PcGFjaXR5O1xuICBhbmltYXRpb24taXRlcmF0aW9uLWNvdW50OiAxO1xuICBhbmltYXRpb24tdGltaW5nLWZ1bmN0aW9uOiBlYXNlLWluO1xuICBhbmltYXRpb24tZHVyYXRpb246IDAuM3M7XG59XG5cbkBrZXlmcmFtZXMgZmFkZUluT3BhY2l0eSB7XG4gIDAlIHtcbiAgICBvcGFjaXR5OiAwO1xuICB9XG4gIDEwMCUge1xuICAgIG9wYWNpdHk6IDE7XG4gIH1cbn1cbkBtZWRpYSAobWF4LXdpZHRoOiA3NjhweCkge1xuICAuYXV0aC1ib3ggPiBkaXYge1xuICAgIGhlaWdodDogYXV0bztcbiAgfVxuXG4gIC5iZy1pbWcge1xuICAgIGJvcmRlci1yYWRpdXM6IDBweDtcbiAgfVxuXG4gIC5hdXRoLWNhcmQge1xuICAgIHdpZHRoOiAxMDAlO1xuICAgIG1pbi13aWR0aDogMTAwJTtcbiAgfVxuXG4gIC5hdXRoLWJveCA+IGRpdiB7XG4gICAgcGFkZGluZzogMS41cmVtO1xuICB9XG4gIC5hdXRoLWJveCA+IGRpdi5jb2wtbGctNyB7XG4gICAgYm9yZGVyLXJhZGl1czogMjBweDtcbiAgICBtYXJnaW4tdG9wOiAtMjBweDtcbiAgfVxuICAuYXV0aC1ib3ggPiBkaXYgaDEge1xuICAgIGZvbnQtc2l6ZTogMzBweDtcbiAgfVxuICAuYXV0aC1ib3ggPiBkaXYgaDUsXG4uYXV0aC1ib3ggPiBkaXYgaDYge1xuICAgIGZvbnQtc2l6ZTogc21hbGw7XG4gIH1cbn0iXX0= */", "img[_ngcontent-%COMP%] {\n  max-width: 70%;\n}\n\n@media (max-width: 768px) {\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    height: auto;\n  }\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvZm9yZ290LXBhc3N3b3JkL0M6XFxsYXJhZ29uXFx3d3dcXGVyaXRhcHAvc3JjXFxhcHBcXEBhdXRoXFxmb3Jnb3QtcGFzc3dvcmRcXGZvcmdvdC1wYXNzd29yZC5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvZm9yZ290LXBhc3N3b3JkL2ZvcmdvdC1wYXNzd29yZC5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtFQUNFLGNBQUE7QUNDRjs7QURFQTtFQUNFO0lBQ0UsWUFBQTtFQ0NGO0FBQ0YiLCJmaWxlIjoic3JjL2FwcC9AYXV0aC9mb3Jnb3QtcGFzc3dvcmQvZm9yZ290LXBhc3N3b3JkLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiaW1nIHtcclxuICBtYXgtd2lkdGg6IDcwJTtcclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDc2OHB4KSB7XHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIGhlaWdodDogYXV0bztcclxuICB9XHJcbn1cclxuIiwiaW1nIHtcbiAgbWF4LXdpZHRoOiA3MCU7XG59XG5cbkBtZWRpYSAobWF4LXdpZHRoOiA3NjhweCkge1xuICAuYXV0aC1ib3ggPiBkaXYge1xuICAgIGhlaWdodDogYXV0bztcbiAgfVxufSJdfQ== */", "img[_ngcontent-%COMP%] {\n  margin-bottom: 20px;\n}\n\n.loader[_ngcontent-%COMP%] {\n  top: 10px;\n  left: 40%;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvdmVyaWZ5LWVtYWlsL0M6XFxsYXJhZ29uXFx3d3dcXGVyaXRhcHAvc3JjXFxhcHBcXEBhdXRoXFx2ZXJpZnktZW1haWxcXHZlcmlmeS1lbWFpbC5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvdmVyaWZ5LWVtYWlsL3ZlcmlmeS1lbWFpbC5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtFQUNFLG1CQUFBO0FDQ0Y7O0FEQ0E7RUFDRSxTQUFBO0VBQ0EsU0FBQTtBQ0VGIiwiZmlsZSI6InNyYy9hcHAvQGF1dGgvdmVyaWZ5LWVtYWlsL3ZlcmlmeS1lbWFpbC5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbImltZ3tcclxuICBtYXJnaW4tYm90dG9tOjIwcHg7XHJcbn1cclxuLmxvYWRlcntcclxuICB0b3A6IDEwcHg7XHJcbiAgbGVmdDogNDAlO1xyXG59XHJcbiIsImltZyB7XG4gIG1hcmdpbi1ib3R0b206IDIwcHg7XG59XG5cbi5sb2FkZXIge1xuICB0b3A6IDEwcHg7XG4gIGxlZnQ6IDQwJTtcbn0iXX0= */", ".password-reveal[_ngcontent-%COMP%] {\n  top: 30%;\n  bottom: 0;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvY2hhbmdlLXBhc3N3b3JkL0M6XFxsYXJhZ29uXFx3d3dcXGVyaXRhcHAvc3JjXFxhcHBcXEBhdXRoXFxjaGFuZ2UtcGFzc3dvcmRcXGNoYW5nZS1wYXNzd29yZC5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvY2hhbmdlLXBhc3N3b3JkL2NoYW5nZS1wYXNzd29yZC5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtFQUNJLFFBQUE7RUFDQSxTQUFBO0FDQ0oiLCJmaWxlIjoic3JjL2FwcC9AYXV0aC9jaGFuZ2UtcGFzc3dvcmQvY2hhbmdlLXBhc3N3b3JkLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLnBhc3N3b3JkLXJldmVhbHtcclxuICAgIHRvcDogMzAlO1xyXG4gICAgYm90dG9tOiAwO1xyXG59XHJcbiIsIi5wYXNzd29yZC1yZXZlYWwge1xuICB0b3A6IDMwJTtcbiAgYm90dG9tOiAwO1xufSJdfQ== */"] });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](ChangePasswordComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"],
        args: [{
                selector: "app-change-password",
                templateUrl: "./change-password.component.html",
                styleUrls: [
                    "./../auth/auth.component.scss",
                    "./../forgot-password/forgot-password.component.scss",
                    "./../verify-email/verify-email.component.scss",
                    "./change-password.component.scss",
                ],
            }]
    }], function () { return [{ type: _core__WEBPACK_IMPORTED_MODULE_2__["AuthService"] }, { type: ngx_toastr__WEBPACK_IMPORTED_MODULE_3__["ToastrService"] }, { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__["Router"] }, { type: _core_general_service__WEBPACK_IMPORTED_MODULE_5__["GeneralService"] }, { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"] }]; }, null); })();


/***/ }),

/***/ "./src/app/@auth/forgot-password/forgot-password.component.ts":
/*!********************************************************************!*\
  !*** ./src/app/@auth/forgot-password/forgot-password.component.ts ***!
  \********************************************************************/
/*! exports provided: ForgotPasswordComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ForgotPasswordComponent", function() { return ForgotPasswordComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var src_app_config__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! src/app/config */ "./src/app/config.ts");
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../@core */ "./src/app/@core/index.ts");
/* harmony import */ var ngx_toastr__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ngx-toastr */ "./node_modules/ngx-toastr/__ivy_ngcc__/fesm2015/ngx-toastr.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm2015/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/common.js");








function ForgotPasswordComponent_div_24_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "div", 15);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](1, "i", 16);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
const _c0 = function (a0) { return [a0]; };
class ForgotPasswordComponent {
    constructor(authService, toastr) {
        this.authService = authService;
        this.toastr = toastr;
        this.routes = src_app_config__WEBPACK_IMPORTED_MODULE_1__["appRoutes"];
    }
    ngOnInit() { }
    resetPassword(email) {
        this.authService.showLoader(true);
        this.submitting = true;
        this.authService.forgotPassword(email).subscribe((data) => {
            this.submitting = false;
            this.authService.showLoader(false);
            if (data.status._text != "Failed") {
                this.toastr.success("A reset link will be sent to the provided email address in less than 5 minutes, check your inbox and spam folder", ":)", {
                    timeOut: 15000,
                });
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.submitting = false;
            this.authService.showLoader(false);
            this.toastr.error(error.error.message || error.message || error || error, "Oops!!");
        });
    }
}
ForgotPasswordComponent.ɵfac = function ForgotPasswordComponent_Factory(t) { return new (t || ForgotPasswordComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_core__WEBPACK_IMPORTED_MODULE_2__["AuthService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](ngx_toastr__WEBPACK_IMPORTED_MODULE_3__["ToastrService"])); };
ForgotPasswordComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineComponent"]({ type: ForgotPasswordComponent, selectors: [["app-verify"]], decls: 25, vars: 9, consts: [[1, "auth-box", "d-flex", "flex-column", "flex-md-row"], [1, "col-md-5", "p-2", "p-md-4", "d-flex", "flex-column"], [1, "font-weight-medium", "text-green-400", "font-weight-med", "mt-md-5", "mt-1", "mb-2", "text-md-center"], ["src", "./assets/images/forgot-password.svg", "alt", "nigenius logo", "srcset", "", 1, "mt-md-5", "mt-1", "mr-auto", "mr-md-0", "align-self-center"], [1, "col-md-7", "pl-3", "pt-0", "pt-md-3", "p-md-4", "bg-grey", "position-relative"], [1, "mt-md-5", "mt-1", 3, "ngSubmit"], ["forgotPasswordForm", "ngForm"], [1, "form-input", "mt-md-5", "mt-2", "pt-md-4", "pt-2"], ["for", "email", 1, "font-weight-light"], ["id", "email", "placeholder", "Type your registered email Address", "type", "email", "required", "", "name", "email", 1, "form-control", 3, "ngModel", "ngModelChange"], [1, "btn", "bg-green-400", "bg-success", 3, "disabled"], [1, "pt-4"], [1, "font-weight-light"], [1, "", 3, "routerLink"], ["id", "loading-overlay", 4, "ngIf"], ["id", "loading-overlay"], [1, "fa", "fa-spinner", "edit", "fa-pulse", "fa-3x", "fa-fw"]], template: function ForgotPasswordComponent_Template(rf, ctx) { if (rf & 1) {
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "div", 0);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](1, "div", 1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](2, "h2", 2);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](3, " Forgot Password? ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](4, "img", 3);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](5, "div", 4);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](6, "form", 5, 6);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngSubmit", function ForgotPasswordComponent_Template_form_ngSubmit_6_listener() { return ctx.resetPassword(ctx.email); });
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](8, "div", 7);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](9, "label", 8);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](10, "Don't worry, happens to the best of us.");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](11, "input", 9);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngModelChange", function ForgotPasswordComponent_Template_input_ngModelChange_11_listener($event) { return ctx.email = $event; });
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](12, "button", 10);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](13, " Send Reset Link ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](14, "p", 11);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](15, "small", 12);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](16, "Back to ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](17, "a", 13);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](18, " Log in ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](19, "br");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](20, "small", 12);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](21, " Don't have an account yet? ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](22, "a", 13);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](23, " Create one ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](24, ForgotPasswordComponent_div_24_Template, 2, 0, "div", 14);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    } if (rf & 2) {
        const _r22 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵreference"](7);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](11);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngModel", ctx.email);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("disabled", !_r22.valid);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](5);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("routerLink", _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵpureFunction1"](5, _c0, ctx.routes.login));
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](5);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("routerLink", _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵpureFunction1"](7, _c0, ctx.routes.register));
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](2);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx.submitting);
    } }, directives: [_angular_forms__WEBPACK_IMPORTED_MODULE_4__["ɵangular_packages_forms_forms_y"], _angular_forms__WEBPACK_IMPORTED_MODULE_4__["NgControlStatusGroup"], _angular_forms__WEBPACK_IMPORTED_MODULE_4__["NgForm"], _angular_forms__WEBPACK_IMPORTED_MODULE_4__["DefaultValueAccessor"], _angular_forms__WEBPACK_IMPORTED_MODULE_4__["RequiredValidator"], _angular_forms__WEBPACK_IMPORTED_MODULE_4__["NgControlStatus"], _angular_forms__WEBPACK_IMPORTED_MODULE_4__["NgModel"], _angular_router__WEBPACK_IMPORTED_MODULE_5__["RouterLinkWithHref"], _angular_common__WEBPACK_IMPORTED_MODULE_6__["NgIf"]], styles: [".bg-img[_ngcontent-%COMP%] {\n  background-image: url('bg@2x.png');\n  background-repeat: no-repeat;\n  background-size: cover;\n  background-color: #FF9B07;\n  height: 100vh;\n  border-radius: 20px;\n}\n\nheader[_ngcontent-%COMP%] {\n  height: 50px;\n  width: 100%;\n  background: #fff;\n}\n\nform[_ngcontent-%COMP%] {\n  width: 95%;\n  max-width: 540px;\n  height: -moz-max-content;\n  height: max-content;\n}\n\n.auth-card[_ngcontent-%COMP%] {\n  width: 75%;\n  min-width: 650px;\n  height: -moz-fit-content;\n  height: fit-content;\n}\n\n.main-box[_ngcontent-%COMP%] {\n  min-height: 100vh;\n  background-color: #f4f7fb;\n}\n\n.auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n  padding: 3rem;\n  height: 500px;\n}\n\n.form-input[_ngcontent-%COMP%] {\n  padding-bottom: 13px;\n}\n\na[_ngcontent-%COMP%] {\n  font-weight: 500;\n}\n\n.password-reveal[_ngcontent-%COMP%] {\n  position: absolute;\n  bottom: 30%;\n  right: 18px;\n}\n\n.fade-in[_ngcontent-%COMP%] {\n  opacity: 1;\n  animation-name: fadeInOpacity;\n  animation-iteration-count: 1;\n  animation-timing-function: ease-in;\n  animation-duration: 0.3s;\n}\n\n@keyframes fadeInOpacity {\n  0% {\n    opacity: 0;\n  }\n  100% {\n    opacity: 1;\n  }\n}\n\n@media (max-width: 768px) {\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    height: auto;\n  }\n\n  .bg-img[_ngcontent-%COMP%] {\n    border-radius: 0px;\n  }\n\n  .auth-card[_ngcontent-%COMP%] {\n    width: 100%;\n    min-width: 100%;\n  }\n\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    padding: 1.5rem;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div.col-lg-7[_ngcontent-%COMP%] {\n    border-radius: 20px;\n    margin-top: -20px;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h1[_ngcontent-%COMP%] {\n    font-size: 30px;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h5[_ngcontent-%COMP%], .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h6[_ngcontent-%COMP%] {\n    font-size: small;\n  }\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvYXV0aC9DOlxcbGFyYWdvblxcd3d3XFxlcml0YXBwL3NyY1xcYXBwXFxAYXV0aFxcYXV0aFxcYXV0aC5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvYXV0aC9hdXRoLmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBQ0Usa0NBQUE7RUFDQSw0QkFBQTtFQUNBLHNCQUFBO0VBQ0EseUJBQUE7RUFDQSxhQUFBO0VBQ0EsbUJBQUE7QUNDRjs7QURFQTtFQUNFLFlBQUE7RUFDQSxXQUFBO0VBQ0EsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSxnQkFBQTtFQUNBLHdCQUFBO0VBQUEsbUJBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSxnQkFBQTtFQUNBLHdCQUFBO0VBQUEsbUJBQUE7QUNDRjs7QURFQTtFQUNFLGlCQUFBO0VBQ0EseUJBQUE7QUNDRjs7QURFQTtFQUNFLGFBQUE7RUFDQSxhQUFBO0FDQ0Y7O0FERUE7RUFDRSxvQkFBQTtBQ0NGOztBREVBO0VBQ0UsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLGtCQUFBO0VBQ0EsV0FBQTtFQUNBLFdBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSw2QkFBQTtFQUNBLDRCQUFBO0VBQ0Esa0NBQUE7RUFDQSx3QkFBQTtBQ0NGOztBREVBO0VBQ0U7SUFDRSxVQUFBO0VDQ0Y7RURDQTtJQUNFLFVBQUE7RUNDRjtBQUNGOztBREVBO0VBQ0U7SUFDRSxZQUFBO0VDQUY7O0VERUE7SUFDRSxrQkFBQTtFQ0NGOztFREVBO0lBQ0UsV0FBQTtJQUNBLGVBQUE7RUNDRjs7RURFQTtJQUNFLGVBQUE7RUNDRjtFREFFO0lBQ0UsbUJBQUE7SUFDQSxpQkFBQTtFQ0VKO0VEQUU7SUFDRSxlQUFBO0VDRUo7RURDRTs7SUFFRSxnQkFBQTtFQ0NKO0FBQ0YiLCJmaWxlIjoic3JjL2FwcC9AYXV0aC9hdXRoL2F1dGguY29tcG9uZW50LnNjc3MiLCJzb3VyY2VzQ29udGVudCI6WyIuYmctaW1nIHtcclxuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCIuLi8uLi8uLi9hc3NldHMvaW1hZ2VzL2JnQDJ4LnBuZ1wiKTtcclxuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xyXG4gIGJhY2tncm91bmQtc2l6ZTogY292ZXI7XHJcbiAgYmFja2dyb3VuZC1jb2xvcjogI0ZGOUIwNztcclxuICBoZWlnaHQ6IDEwMHZoO1xyXG4gIGJvcmRlci1yYWRpdXM6IDIwcHg7XHJcbn1cclxuXHJcbmhlYWRlciB7XHJcbiAgaGVpZ2h0OiA1MHB4O1xyXG4gIHdpZHRoOiAxMDAlO1xyXG4gIGJhY2tncm91bmQ6ICNmZmY7XHJcbn1cclxuXHJcbmZvcm0ge1xyXG4gIHdpZHRoOiA5NSU7XHJcbiAgbWF4LXdpZHRoOiA1NDBweDtcclxuICBoZWlnaHQ6IG1heC1jb250ZW50O1xyXG59XHJcblxyXG4uYXV0aC1jYXJkIHtcclxuICB3aWR0aDogNzUlO1xyXG4gIG1pbi13aWR0aDogNjUwcHg7XHJcbiAgaGVpZ2h0OiBmaXQtY29udGVudDtcclxufVxyXG5cclxuLm1haW4tYm94IHtcclxuICBtaW4taGVpZ2h0OiAxMDB2aDtcclxuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjRmN2ZiO1xyXG59XHJcblxyXG4uYXV0aC1ib3ggPiBkaXYge1xyXG4gIHBhZGRpbmc6IDNyZW07XHJcbiAgaGVpZ2h0OiA1MDBweDtcclxufVxyXG5cclxuLmZvcm0taW5wdXQge1xyXG4gIHBhZGRpbmctYm90dG9tOiAxM3B4O1xyXG59XHJcblxyXG5hIHtcclxuICBmb250LXdlaWdodDogNTAwO1xyXG59XHJcblxyXG4ucGFzc3dvcmQtcmV2ZWFsIHtcclxuICBwb3NpdGlvbjogYWJzb2x1dGU7XHJcbiAgYm90dG9tOiAzMCU7XHJcbiAgcmlnaHQ6IDE4cHg7XHJcbn1cclxuXHJcbi5mYWRlLWluIHtcclxuICBvcGFjaXR5OiAxO1xyXG4gIGFuaW1hdGlvbi1uYW1lOiBmYWRlSW5PcGFjaXR5O1xyXG4gIGFuaW1hdGlvbi1pdGVyYXRpb24tY291bnQ6IDE7XHJcbiAgYW5pbWF0aW9uLXRpbWluZy1mdW5jdGlvbjogZWFzZS1pbjtcclxuICBhbmltYXRpb24tZHVyYXRpb246IDAuM3M7XHJcbn1cclxuXHJcbkBrZXlmcmFtZXMgZmFkZUluT3BhY2l0eSB7XHJcbiAgMCUge1xyXG4gICAgb3BhY2l0eTogMDtcclxuICB9XHJcbiAgMTAwJSB7XHJcbiAgICBvcGFjaXR5OiAxO1xyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDc2OHB4KSB7XHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIGhlaWdodDogYXV0bztcclxuICB9XHJcbiAgLmJnLWltZyB7XHJcbiAgICBib3JkZXItcmFkaXVzOiAwcHg7XHJcbiAgfVxyXG5cclxuICAuYXV0aC1jYXJkIHtcclxuICAgIHdpZHRoOiAxMDAlO1xyXG4gICAgbWluLXdpZHRoOiAxMDAlO1xyXG4gIH1cclxuXHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIHBhZGRpbmc6IDEuNXJlbTtcclxuICAgICYuY29sLWxnLTcge1xyXG4gICAgICBib3JkZXItcmFkaXVzOiAyMHB4O1xyXG4gICAgICBtYXJnaW4tdG9wOiAtMjBweDtcclxuICAgIH1cclxuICAgIGgxIHtcclxuICAgICAgZm9udC1zaXplOiAzMHB4O1xyXG4gICAgfVxyXG5cclxuICAgIGg1LFxyXG4gICAgaDYge1xyXG4gICAgICBmb250LXNpemU6IHNtYWxsO1xyXG4gICAgfVxyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDQyNXB4KSB7XHJcbn1cclxuIiwiLmJnLWltZyB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcIi4uLy4uLy4uL2Fzc2V0cy9pbWFnZXMvYmdAMngucG5nXCIpO1xuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjRkY5QjA3O1xuICBoZWlnaHQ6IDEwMHZoO1xuICBib3JkZXItcmFkaXVzOiAyMHB4O1xufVxuXG5oZWFkZXIge1xuICBoZWlnaHQ6IDUwcHg7XG4gIHdpZHRoOiAxMDAlO1xuICBiYWNrZ3JvdW5kOiAjZmZmO1xufVxuXG5mb3JtIHtcbiAgd2lkdGg6IDk1JTtcbiAgbWF4LXdpZHRoOiA1NDBweDtcbiAgaGVpZ2h0OiBtYXgtY29udGVudDtcbn1cblxuLmF1dGgtY2FyZCB7XG4gIHdpZHRoOiA3NSU7XG4gIG1pbi13aWR0aDogNjUwcHg7XG4gIGhlaWdodDogZml0LWNvbnRlbnQ7XG59XG5cbi5tYWluLWJveCB7XG4gIG1pbi1oZWlnaHQ6IDEwMHZoO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjRmN2ZiO1xufVxuXG4uYXV0aC1ib3ggPiBkaXYge1xuICBwYWRkaW5nOiAzcmVtO1xuICBoZWlnaHQ6IDUwMHB4O1xufVxuXG4uZm9ybS1pbnB1dCB7XG4gIHBhZGRpbmctYm90dG9tOiAxM3B4O1xufVxuXG5hIHtcbiAgZm9udC13ZWlnaHQ6IDUwMDtcbn1cblxuLnBhc3N3b3JkLXJldmVhbCB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgYm90dG9tOiAzMCU7XG4gIHJpZ2h0OiAxOHB4O1xufVxuXG4uZmFkZS1pbiB7XG4gIG9wYWNpdHk6IDE7XG4gIGFuaW1hdGlvbi1uYW1lOiBmYWRlSW5PcGFjaXR5O1xuICBhbmltYXRpb24taXRlcmF0aW9uLWNvdW50OiAxO1xuICBhbmltYXRpb24tdGltaW5nLWZ1bmN0aW9uOiBlYXNlLWluO1xuICBhbmltYXRpb24tZHVyYXRpb246IDAuM3M7XG59XG5cbkBrZXlmcmFtZXMgZmFkZUluT3BhY2l0eSB7XG4gIDAlIHtcbiAgICBvcGFjaXR5OiAwO1xuICB9XG4gIDEwMCUge1xuICAgIG9wYWNpdHk6IDE7XG4gIH1cbn1cbkBtZWRpYSAobWF4LXdpZHRoOiA3NjhweCkge1xuICAuYXV0aC1ib3ggPiBkaXYge1xuICAgIGhlaWdodDogYXV0bztcbiAgfVxuXG4gIC5iZy1pbWcge1xuICAgIGJvcmRlci1yYWRpdXM6IDBweDtcbiAgfVxuXG4gIC5hdXRoLWNhcmQge1xuICAgIHdpZHRoOiAxMDAlO1xuICAgIG1pbi13aWR0aDogMTAwJTtcbiAgfVxuXG4gIC5hdXRoLWJveCA+IGRpdiB7XG4gICAgcGFkZGluZzogMS41cmVtO1xuICB9XG4gIC5hdXRoLWJveCA+IGRpdi5jb2wtbGctNyB7XG4gICAgYm9yZGVyLXJhZGl1czogMjBweDtcbiAgICBtYXJnaW4tdG9wOiAtMjBweDtcbiAgfVxuICAuYXV0aC1ib3ggPiBkaXYgaDEge1xuICAgIGZvbnQtc2l6ZTogMzBweDtcbiAgfVxuICAuYXV0aC1ib3ggPiBkaXYgaDUsXG4uYXV0aC1ib3ggPiBkaXYgaDYge1xuICAgIGZvbnQtc2l6ZTogc21hbGw7XG4gIH1cbn0iXX0= */", "img[_ngcontent-%COMP%] {\n  max-width: 70%;\n}\n\n@media (max-width: 768px) {\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    height: auto;\n  }\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvZm9yZ290LXBhc3N3b3JkL0M6XFxsYXJhZ29uXFx3d3dcXGVyaXRhcHAvc3JjXFxhcHBcXEBhdXRoXFxmb3Jnb3QtcGFzc3dvcmRcXGZvcmdvdC1wYXNzd29yZC5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvZm9yZ290LXBhc3N3b3JkL2ZvcmdvdC1wYXNzd29yZC5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtFQUNFLGNBQUE7QUNDRjs7QURFQTtFQUNFO0lBQ0UsWUFBQTtFQ0NGO0FBQ0YiLCJmaWxlIjoic3JjL2FwcC9AYXV0aC9mb3Jnb3QtcGFzc3dvcmQvZm9yZ290LXBhc3N3b3JkLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiaW1nIHtcclxuICBtYXgtd2lkdGg6IDcwJTtcclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDc2OHB4KSB7XHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIGhlaWdodDogYXV0bztcclxuICB9XHJcbn1cclxuIiwiaW1nIHtcbiAgbWF4LXdpZHRoOiA3MCU7XG59XG5cbkBtZWRpYSAobWF4LXdpZHRoOiA3NjhweCkge1xuICAuYXV0aC1ib3ggPiBkaXYge1xuICAgIGhlaWdodDogYXV0bztcbiAgfVxufSJdfQ== */"] });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](ForgotPasswordComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"],
        args: [{
                selector: "app-verify",
                templateUrl: "./forgot-password.component.html",
                styleUrls: [
                    "./../auth/auth.component.scss",
                    "./forgot-password.component.scss",
                ],
            }]
    }], function () { return [{ type: _core__WEBPACK_IMPORTED_MODULE_2__["AuthService"] }, { type: ngx_toastr__WEBPACK_IMPORTED_MODULE_3__["ToastrService"] }]; }, null); })();


/***/ }),

/***/ "./src/app/@auth/index.ts":
/*!********************************!*\
  !*** ./src/app/@auth/index.ts ***!
  \********************************/
/*! exports provided: AuthComponent, LoginComponent, SignupComponent, ForgotPasswordComponent, VerifyEmailComponent, ChangePasswordComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _auth_auth_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./auth/auth.component */ "./src/app/@auth/auth/auth.component.ts");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "AuthComponent", function() { return _auth_auth_component__WEBPACK_IMPORTED_MODULE_0__["AuthComponent"]; });

/* harmony import */ var _login_login_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./login/login.component */ "./src/app/@auth/login/login.component.ts");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "LoginComponent", function() { return _login_login_component__WEBPACK_IMPORTED_MODULE_1__["LoginComponent"]; });

/* harmony import */ var _signup_signup_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./signup/signup.component */ "./src/app/@auth/signup/signup.component.ts");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "SignupComponent", function() { return _signup_signup_component__WEBPACK_IMPORTED_MODULE_2__["SignupComponent"]; });

/* harmony import */ var _forgot_password_forgot_password_component__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./forgot-password/forgot-password.component */ "./src/app/@auth/forgot-password/forgot-password.component.ts");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "ForgotPasswordComponent", function() { return _forgot_password_forgot_password_component__WEBPACK_IMPORTED_MODULE_3__["ForgotPasswordComponent"]; });

/* harmony import */ var _verify_email_verify_email_component__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./verify-email/verify-email.component */ "./src/app/@auth/verify-email/verify-email.component.ts");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "VerifyEmailComponent", function() { return _verify_email_verify_email_component__WEBPACK_IMPORTED_MODULE_4__["VerifyEmailComponent"]; });

/* harmony import */ var _change_password_change_password_component__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./change-password/change-password.component */ "./src/app/@auth/change-password/change-password.component.ts");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "ChangePasswordComponent", function() { return _change_password_change_password_component__WEBPACK_IMPORTED_MODULE_5__["ChangePasswordComponent"]; });







// export * from './verification-sent/verification-sent.component';


/***/ }),

/***/ "./src/app/@auth/login/login.component.ts":
/*!************************************************!*\
  !*** ./src/app/@auth/login/login.component.ts ***!
  \************************************************/
/*! exports provided: LoginComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "LoginComponent", function() { return LoginComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _model__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../@model */ "./src/app/@model/index.ts");
/* harmony import */ var src_app_config__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! src/app/config */ "./src/app/config.ts");
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../@core */ "./src/app/@core/index.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var ngx_toastr__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ngx-toastr */ "./node_modules/ngx-toastr/__ivy_ngcc__/fesm2015/ngx-toastr.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm2015/forms.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/common.js");










function LoginComponent_img_20_Template(rf, ctx) { if (rf & 1) {
    const _r5 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "img", 23);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("click", function LoginComponent_img_20_Template_img_click_0_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵrestoreView"](_r5); const ctx_r4 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"](); return ctx_r4.hidePassword = ctx_r4.authService.changePasswordState(ctx_r4.hidePassword, $event); });
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function LoginComponent_img_21_Template(rf, ctx) { if (rf & 1) {
    const _r7 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "img", 24);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("click", function LoginComponent_img_21_Template_img_click_0_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵrestoreView"](_r7); const ctx_r6 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"](); return ctx_r6.hidePassword = ctx_r6.authService.changePasswordState(ctx_r6.hidePassword, $event); });
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function LoginComponent_div_34_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "div", 25);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](1, "i", 26);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
const _c0 = function (a0) { return [a0]; };
class LoginComponent {
    constructor(authService, generalService, router, route, toastr) {
        this.authService = authService;
        this.generalService = generalService;
        this.router = router;
        this.route = route;
        this.toastr = toastr;
        this.hidePassword = true;
        this.user = new _model__WEBPACK_IMPORTED_MODULE_1__["User"]();
        this.routes = src_app_config__WEBPACK_IMPORTED_MODULE_2__["appRoutes"];
    }
    ngOnInit() {
        this.getReturnUrl();
    }
    getReturnUrl() {
        this.route.queryParamMap.subscribe((param) => {
            this.returnUrl = param.get("returnUrl");
        });
    }
    loginUser(user) {
        this.submitting = true;
        this.authService.showLoader(true);
        this.authService.login(user).subscribe((data) => {
            this.submitting = false;
            data = this.generalService.convertToOneLayerViewModel(data);
            this.authService.showLoader(false);
            // debugger;
            if (data.status === "EmailUnverified") {
                this.authService.resendVerification(user.email).subscribe((data) => {
                    if (data.status != "Failed") {
                        this.toastr.info(data.status_message._text, "Email not verified", { timeOut: 100000000 });
                    }
                }, (error) => {
                    this.submitting = false;
                    this.authService.showLoader(false);
                    this.toastr.error(error.error.response.message || error.message || error, "Oops");
                });
            }
            else if (data.status === "Success") {
                delete data.status;
                delete data.status_message;
                this.authService.saveUserLocally(data);
                this.authService.saveUserToken(data.token);
                if (this.returnUrl) {
                    this.router.navigateByUrl(this.returnUrl);
                }
                else {
                    this.router.navigate(["./page/"]);
                }
                this.toastr.clear();
                this.toastr.success("You are In!");
            }
            else {
                this.toastr.error(data.status_message, "Oops");
            }
            // } else {
            //   this.toastr.error(data.message, 'Oops');
            // }
        }, (error) => {
            try {
                error = this.generalService.xmlToJson(error.error);
                this.submitting = false;
                this.authService.showLoader(false);
                this.toastr.error(error.status_message._text ||
                    "Something went wrong when trying to create a user");
            }
            catch (error) {
                this.submitting = false;
                this.authService.showLoader(false);
                this.toastr.error("Something went wrong when trying to create a user");
            }
        });
    }
}
LoginComponent.ɵfac = function LoginComponent_Factory(t) { return new (t || LoginComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_core__WEBPACK_IMPORTED_MODULE_3__["AuthService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_core__WEBPACK_IMPORTED_MODULE_3__["GeneralService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_angular_router__WEBPACK_IMPORTED_MODULE_4__["Router"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](ngx_toastr__WEBPACK_IMPORTED_MODULE_5__["ToastrService"])); };
LoginComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineComponent"]({ type: LoginComponent, selectors: [["app-login"]], decls: 35, vars: 12, consts: [[1, "auth-box", "d-flex", "flex-column", "flex-md-row"], [1, "col-lg-5", "d-flex", "bg-img", "flex-column", "align-items-start"], ["src", "./assets/images/logo-white.png", "alt", "nigenius logo", "srcset", "", 1, "mt-auto", "d-flex", "d-md-none"], [1, "text-white", "font-weight-medium", "font-weight-med", "mt-4"], [1, "font-weight-thin", "text-white"], ["src", "./assets/images/logo-white.png", "alt", "nigenius logo", "srcset", "", 1, "mt-auto", "d-none", "d-md-flex"], [1, "col-lg-7", "bg-grey", "position-relative", "d-flex", "align-items-center", "pb-0", "pt-5"], [3, "ngSubmit"], ["loginForm", "ngForm"], [1, "form-input"], ["for", "email", 1, "font-weight-light"], ["id", "email", "type", "email", "required", "", "name", "email", 1, "form-control", 3, "ngModel", "ngModelChange"], [1, "form-input", "position-relative"], ["for", "password", 1, "font-weight-light"], ["id", "password", "type", "password", "required", "", "name", "password", 1, "form-control", 3, "ngModel", "ngModelChange"], ["class", "password-reveal fade-in", "src", "./assets/images/icons/password-icon.svg", 3, "click", 4, "ngIf"], ["class", "password-reveal fade-in", "src", "./assets/images/icons/password-reveal-icon.svg", 3, "click", 4, "ngIf"], [1, "btn", "bg-green-400", "bg-success", "cta-btn", 3, "disabled"], [1, "pt-4"], [1, "font-weight-light"], [3, "routerLink"], [1, "", 3, "routerLink"], ["id", "loading-overlay", 4, "ngIf"], ["src", "./assets/images/icons/password-icon.svg", 1, "password-reveal", "fade-in", 3, "click"], ["src", "./assets/images/icons/password-reveal-icon.svg", 1, "password-reveal", "fade-in", 3, "click"], ["id", "loading-overlay"], [1, "fa", "fa-spinner", "edit", "fa-pulse", "fa-3x", "fa-fw"]], template: function LoginComponent_Template(rf, ctx) { if (rf & 1) {
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "div", 0);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](1, "div", 1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](2, "div");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](3, "img", 2);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](4, "h1", 3);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](5, "Login");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](6, "h5", 4);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](7, " Pick up from where you left off. ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](8, "img", 5);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](9, "div", 6);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](10, "form", 7, 8);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngSubmit", function LoginComponent_Template_form_ngSubmit_10_listener() { return ctx.loginUser(ctx.user); });
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](12, "div", 9);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](13, "label", 10);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](14, "Email address");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](15, "input", 11);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngModelChange", function LoginComponent_Template_input_ngModelChange_15_listener($event) { return ctx.user.email = $event; });
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](16, "div", 12);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](17, "label", 13);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](18, "Password");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](19, "input", 14);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngModelChange", function LoginComponent_Template_input_ngModelChange_19_listener($event) { return ctx.user.password = $event; });
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](20, LoginComponent_img_20_Template, 1, 0, "img", 15);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](21, LoginComponent_img_21_Template, 1, 0, "img", 16);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](22, "button", 17);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](23, " Log In ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](24, "p", 18);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](25, "small", 19);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](26, "Don't have an account yet? ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](27, "a", 20);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](28, " Create one");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](29, "br");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](30, "small", 19);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](31, " Forgot Password? ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](32, "a", 21);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](33, " Click here to reset");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](34, LoginComponent_div_34_Template, 2, 0, "div", 22);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    } if (rf & 2) {
        const _r0 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵreference"](11);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](15);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngModel", ctx.user.email);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](4);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngModel", ctx.user.password);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx.hidePassword);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", !ctx.hidePassword);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("disabled", !_r0.valid);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](5);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("routerLink", _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵpureFunction1"](8, _c0, ctx.routes.register));
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](5);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("routerLink", _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵpureFunction1"](10, _c0, ctx.routes.forgot));
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](2);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx.submitting);
    } }, directives: [_angular_forms__WEBPACK_IMPORTED_MODULE_6__["ɵangular_packages_forms_forms_y"], _angular_forms__WEBPACK_IMPORTED_MODULE_6__["NgControlStatusGroup"], _angular_forms__WEBPACK_IMPORTED_MODULE_6__["NgForm"], _angular_forms__WEBPACK_IMPORTED_MODULE_6__["DefaultValueAccessor"], _angular_forms__WEBPACK_IMPORTED_MODULE_6__["RequiredValidator"], _angular_forms__WEBPACK_IMPORTED_MODULE_6__["NgControlStatus"], _angular_forms__WEBPACK_IMPORTED_MODULE_6__["NgModel"], _angular_common__WEBPACK_IMPORTED_MODULE_7__["NgIf"], _angular_router__WEBPACK_IMPORTED_MODULE_4__["RouterLinkWithHref"]], styles: [".bg-img[_ngcontent-%COMP%] {\n  background-image: url('bg@2x.png');\n  background-repeat: no-repeat;\n  background-size: cover;\n  background-color: #FF9B07;\n  height: 100vh;\n  border-radius: 20px;\n}\n\nheader[_ngcontent-%COMP%] {\n  height: 50px;\n  width: 100%;\n  background: #fff;\n}\n\nform[_ngcontent-%COMP%] {\n  width: 95%;\n  max-width: 540px;\n  height: -moz-max-content;\n  height: max-content;\n}\n\n.auth-card[_ngcontent-%COMP%] {\n  width: 75%;\n  min-width: 650px;\n  height: -moz-fit-content;\n  height: fit-content;\n}\n\n.main-box[_ngcontent-%COMP%] {\n  min-height: 100vh;\n  background-color: #f4f7fb;\n}\n\n.auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n  padding: 3rem;\n  height: 500px;\n}\n\n.form-input[_ngcontent-%COMP%] {\n  padding-bottom: 13px;\n}\n\na[_ngcontent-%COMP%] {\n  font-weight: 500;\n}\n\n.password-reveal[_ngcontent-%COMP%] {\n  position: absolute;\n  bottom: 30%;\n  right: 18px;\n}\n\n.fade-in[_ngcontent-%COMP%] {\n  opacity: 1;\n  animation-name: fadeInOpacity;\n  animation-iteration-count: 1;\n  animation-timing-function: ease-in;\n  animation-duration: 0.3s;\n}\n\n@keyframes fadeInOpacity {\n  0% {\n    opacity: 0;\n  }\n  100% {\n    opacity: 1;\n  }\n}\n\n@media (max-width: 768px) {\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    height: auto;\n  }\n\n  .bg-img[_ngcontent-%COMP%] {\n    border-radius: 0px;\n  }\n\n  .auth-card[_ngcontent-%COMP%] {\n    width: 100%;\n    min-width: 100%;\n  }\n\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    padding: 1.5rem;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div.col-lg-7[_ngcontent-%COMP%] {\n    border-radius: 20px;\n    margin-top: -20px;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h1[_ngcontent-%COMP%] {\n    font-size: 30px;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h5[_ngcontent-%COMP%], .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h6[_ngcontent-%COMP%] {\n    font-size: small;\n  }\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvYXV0aC9DOlxcbGFyYWdvblxcd3d3XFxlcml0YXBwL3NyY1xcYXBwXFxAYXV0aFxcYXV0aFxcYXV0aC5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvYXV0aC9hdXRoLmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBQ0Usa0NBQUE7RUFDQSw0QkFBQTtFQUNBLHNCQUFBO0VBQ0EseUJBQUE7RUFDQSxhQUFBO0VBQ0EsbUJBQUE7QUNDRjs7QURFQTtFQUNFLFlBQUE7RUFDQSxXQUFBO0VBQ0EsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSxnQkFBQTtFQUNBLHdCQUFBO0VBQUEsbUJBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSxnQkFBQTtFQUNBLHdCQUFBO0VBQUEsbUJBQUE7QUNDRjs7QURFQTtFQUNFLGlCQUFBO0VBQ0EseUJBQUE7QUNDRjs7QURFQTtFQUNFLGFBQUE7RUFDQSxhQUFBO0FDQ0Y7O0FERUE7RUFDRSxvQkFBQTtBQ0NGOztBREVBO0VBQ0UsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLGtCQUFBO0VBQ0EsV0FBQTtFQUNBLFdBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSw2QkFBQTtFQUNBLDRCQUFBO0VBQ0Esa0NBQUE7RUFDQSx3QkFBQTtBQ0NGOztBREVBO0VBQ0U7SUFDRSxVQUFBO0VDQ0Y7RURDQTtJQUNFLFVBQUE7RUNDRjtBQUNGOztBREVBO0VBQ0U7SUFDRSxZQUFBO0VDQUY7O0VERUE7SUFDRSxrQkFBQTtFQ0NGOztFREVBO0lBQ0UsV0FBQTtJQUNBLGVBQUE7RUNDRjs7RURFQTtJQUNFLGVBQUE7RUNDRjtFREFFO0lBQ0UsbUJBQUE7SUFDQSxpQkFBQTtFQ0VKO0VEQUU7SUFDRSxlQUFBO0VDRUo7RURDRTs7SUFFRSxnQkFBQTtFQ0NKO0FBQ0YiLCJmaWxlIjoic3JjL2FwcC9AYXV0aC9hdXRoL2F1dGguY29tcG9uZW50LnNjc3MiLCJzb3VyY2VzQ29udGVudCI6WyIuYmctaW1nIHtcclxuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCIuLi8uLi8uLi9hc3NldHMvaW1hZ2VzL2JnQDJ4LnBuZ1wiKTtcclxuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xyXG4gIGJhY2tncm91bmQtc2l6ZTogY292ZXI7XHJcbiAgYmFja2dyb3VuZC1jb2xvcjogI0ZGOUIwNztcclxuICBoZWlnaHQ6IDEwMHZoO1xyXG4gIGJvcmRlci1yYWRpdXM6IDIwcHg7XHJcbn1cclxuXHJcbmhlYWRlciB7XHJcbiAgaGVpZ2h0OiA1MHB4O1xyXG4gIHdpZHRoOiAxMDAlO1xyXG4gIGJhY2tncm91bmQ6ICNmZmY7XHJcbn1cclxuXHJcbmZvcm0ge1xyXG4gIHdpZHRoOiA5NSU7XHJcbiAgbWF4LXdpZHRoOiA1NDBweDtcclxuICBoZWlnaHQ6IG1heC1jb250ZW50O1xyXG59XHJcblxyXG4uYXV0aC1jYXJkIHtcclxuICB3aWR0aDogNzUlO1xyXG4gIG1pbi13aWR0aDogNjUwcHg7XHJcbiAgaGVpZ2h0OiBmaXQtY29udGVudDtcclxufVxyXG5cclxuLm1haW4tYm94IHtcclxuICBtaW4taGVpZ2h0OiAxMDB2aDtcclxuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjRmN2ZiO1xyXG59XHJcblxyXG4uYXV0aC1ib3ggPiBkaXYge1xyXG4gIHBhZGRpbmc6IDNyZW07XHJcbiAgaGVpZ2h0OiA1MDBweDtcclxufVxyXG5cclxuLmZvcm0taW5wdXQge1xyXG4gIHBhZGRpbmctYm90dG9tOiAxM3B4O1xyXG59XHJcblxyXG5hIHtcclxuICBmb250LXdlaWdodDogNTAwO1xyXG59XHJcblxyXG4ucGFzc3dvcmQtcmV2ZWFsIHtcclxuICBwb3NpdGlvbjogYWJzb2x1dGU7XHJcbiAgYm90dG9tOiAzMCU7XHJcbiAgcmlnaHQ6IDE4cHg7XHJcbn1cclxuXHJcbi5mYWRlLWluIHtcclxuICBvcGFjaXR5OiAxO1xyXG4gIGFuaW1hdGlvbi1uYW1lOiBmYWRlSW5PcGFjaXR5O1xyXG4gIGFuaW1hdGlvbi1pdGVyYXRpb24tY291bnQ6IDE7XHJcbiAgYW5pbWF0aW9uLXRpbWluZy1mdW5jdGlvbjogZWFzZS1pbjtcclxuICBhbmltYXRpb24tZHVyYXRpb246IDAuM3M7XHJcbn1cclxuXHJcbkBrZXlmcmFtZXMgZmFkZUluT3BhY2l0eSB7XHJcbiAgMCUge1xyXG4gICAgb3BhY2l0eTogMDtcclxuICB9XHJcbiAgMTAwJSB7XHJcbiAgICBvcGFjaXR5OiAxO1xyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDc2OHB4KSB7XHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIGhlaWdodDogYXV0bztcclxuICB9XHJcbiAgLmJnLWltZyB7XHJcbiAgICBib3JkZXItcmFkaXVzOiAwcHg7XHJcbiAgfVxyXG5cclxuICAuYXV0aC1jYXJkIHtcclxuICAgIHdpZHRoOiAxMDAlO1xyXG4gICAgbWluLXdpZHRoOiAxMDAlO1xyXG4gIH1cclxuXHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIHBhZGRpbmc6IDEuNXJlbTtcclxuICAgICYuY29sLWxnLTcge1xyXG4gICAgICBib3JkZXItcmFkaXVzOiAyMHB4O1xyXG4gICAgICBtYXJnaW4tdG9wOiAtMjBweDtcclxuICAgIH1cclxuICAgIGgxIHtcclxuICAgICAgZm9udC1zaXplOiAzMHB4O1xyXG4gICAgfVxyXG5cclxuICAgIGg1LFxyXG4gICAgaDYge1xyXG4gICAgICBmb250LXNpemU6IHNtYWxsO1xyXG4gICAgfVxyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDQyNXB4KSB7XHJcbn1cclxuIiwiLmJnLWltZyB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcIi4uLy4uLy4uL2Fzc2V0cy9pbWFnZXMvYmdAMngucG5nXCIpO1xuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjRkY5QjA3O1xuICBoZWlnaHQ6IDEwMHZoO1xuICBib3JkZXItcmFkaXVzOiAyMHB4O1xufVxuXG5oZWFkZXIge1xuICBoZWlnaHQ6IDUwcHg7XG4gIHdpZHRoOiAxMDAlO1xuICBiYWNrZ3JvdW5kOiAjZmZmO1xufVxuXG5mb3JtIHtcbiAgd2lkdGg6IDk1JTtcbiAgbWF4LXdpZHRoOiA1NDBweDtcbiAgaGVpZ2h0OiBtYXgtY29udGVudDtcbn1cblxuLmF1dGgtY2FyZCB7XG4gIHdpZHRoOiA3NSU7XG4gIG1pbi13aWR0aDogNjUwcHg7XG4gIGhlaWdodDogZml0LWNvbnRlbnQ7XG59XG5cbi5tYWluLWJveCB7XG4gIG1pbi1oZWlnaHQ6IDEwMHZoO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjRmN2ZiO1xufVxuXG4uYXV0aC1ib3ggPiBkaXYge1xuICBwYWRkaW5nOiAzcmVtO1xuICBoZWlnaHQ6IDUwMHB4O1xufVxuXG4uZm9ybS1pbnB1dCB7XG4gIHBhZGRpbmctYm90dG9tOiAxM3B4O1xufVxuXG5hIHtcbiAgZm9udC13ZWlnaHQ6IDUwMDtcbn1cblxuLnBhc3N3b3JkLXJldmVhbCB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgYm90dG9tOiAzMCU7XG4gIHJpZ2h0OiAxOHB4O1xufVxuXG4uZmFkZS1pbiB7XG4gIG9wYWNpdHk6IDE7XG4gIGFuaW1hdGlvbi1uYW1lOiBmYWRlSW5PcGFjaXR5O1xuICBhbmltYXRpb24taXRlcmF0aW9uLWNvdW50OiAxO1xuICBhbmltYXRpb24tdGltaW5nLWZ1bmN0aW9uOiBlYXNlLWluO1xuICBhbmltYXRpb24tZHVyYXRpb246IDAuM3M7XG59XG5cbkBrZXlmcmFtZXMgZmFkZUluT3BhY2l0eSB7XG4gIDAlIHtcbiAgICBvcGFjaXR5OiAwO1xuICB9XG4gIDEwMCUge1xuICAgIG9wYWNpdHk6IDE7XG4gIH1cbn1cbkBtZWRpYSAobWF4LXdpZHRoOiA3NjhweCkge1xuICAuYXV0aC1ib3ggPiBkaXYge1xuICAgIGhlaWdodDogYXV0bztcbiAgfVxuXG4gIC5iZy1pbWcge1xuICAgIGJvcmRlci1yYWRpdXM6IDBweDtcbiAgfVxuXG4gIC5hdXRoLWNhcmQge1xuICAgIHdpZHRoOiAxMDAlO1xuICAgIG1pbi13aWR0aDogMTAwJTtcbiAgfVxuXG4gIC5hdXRoLWJveCA+IGRpdiB7XG4gICAgcGFkZGluZzogMS41cmVtO1xuICB9XG4gIC5hdXRoLWJveCA+IGRpdi5jb2wtbGctNyB7XG4gICAgYm9yZGVyLXJhZGl1czogMjBweDtcbiAgICBtYXJnaW4tdG9wOiAtMjBweDtcbiAgfVxuICAuYXV0aC1ib3ggPiBkaXYgaDEge1xuICAgIGZvbnQtc2l6ZTogMzBweDtcbiAgfVxuICAuYXV0aC1ib3ggPiBkaXYgaDUsXG4uYXV0aC1ib3ggPiBkaXYgaDYge1xuICAgIGZvbnQtc2l6ZTogc21hbGw7XG4gIH1cbn0iXX0= */", ".cta-btn[_ngcontent-%COMP%] {\n  width: 150px;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvbG9naW4vQzpcXGxhcmFnb25cXHd3d1xcZXJpdGFwcC9zcmNcXGFwcFxcQGF1dGhcXGxvZ2luXFxsb2dpbi5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvbG9naW4vbG9naW4uY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFDRSxZQUFBO0FDQ0YiLCJmaWxlIjoic3JjL2FwcC9AYXV0aC9sb2dpbi9sb2dpbi5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5jdGEtYnRuIHtcclxuICB3aWR0aDogMTUwcHg7XHJcbn1cclxuIiwiLmN0YS1idG4ge1xuICB3aWR0aDogMTUwcHg7XG59Il19 */"] });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](LoginComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"],
        args: [{
                selector: "app-login",
                templateUrl: "./login.component.html",
                styleUrls: ["./../auth/auth.component.scss", "./login.component.scss"],
            }]
    }], function () { return [{ type: _core__WEBPACK_IMPORTED_MODULE_3__["AuthService"] }, { type: _core__WEBPACK_IMPORTED_MODULE_3__["GeneralService"] }, { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__["Router"] }, { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"] }, { type: ngx_toastr__WEBPACK_IMPORTED_MODULE_5__["ToastrService"] }]; }, null); })();


/***/ }),

/***/ "./src/app/@auth/signup/signup.component.ts":
/*!**************************************************!*\
  !*** ./src/app/@auth/signup/signup.component.ts ***!
  \**************************************************/
/*! exports provided: SignupComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SignupComponent", function() { return SignupComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _model__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../@model */ "./src/app/@model/index.ts");
/* harmony import */ var src_app_config__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! src/app/config */ "./src/app/config.ts");
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../@core */ "./src/app/@core/index.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var ngx_toastr__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ngx-toastr */ "./node_modules/ngx-toastr/__ivy_ngcc__/fesm2015/ngx-toastr.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm2015/forms.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/common.js");
/* harmony import */ var _validators_custom_validators__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../../validators/custom-validators */ "./src/app/validators/custom-validators.ts");











function SignupComponent_img_46_Template(rf, ctx) { if (rf & 1) {
    const _r15 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "img", 39);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("click", function SignupComponent_img_46_Template_img_click_0_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵrestoreView"](_r15); const ctx_r14 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"](); return ctx_r14.hidePassword = ctx_r14.authService.changePasswordState(ctx_r14.hidePassword, $event, 0); });
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function SignupComponent_img_47_Template(rf, ctx) { if (rf & 1) {
    const _r17 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "img", 40);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("click", function SignupComponent_img_47_Template_img_click_0_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵrestoreView"](_r17); const ctx_r16 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"](); return ctx_r16.hidePassword = ctx_r16.authService.changePasswordState(ctx_r16.hidePassword, $event, 0); });
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function SignupComponent_img_50_Template(rf, ctx) { if (rf & 1) {
    const _r19 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "img", 39);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("click", function SignupComponent_img_50_Template_img_click_0_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵrestoreView"](_r19); const ctx_r18 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"](); return ctx_r18.hideConfirmPassword = ctx_r18.authService.changePasswordState(ctx_r18.hideConfirmPassword, $event, 0); });
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function SignupComponent_img_51_Template(rf, ctx) { if (rf & 1) {
    const _r21 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "img", 40);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("click", function SignupComponent_img_51_Template_img_click_0_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵrestoreView"](_r21); const ctx_r20 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"](); return ctx_r20.hideConfirmPassword = ctx_r20.authService.changePasswordState(ctx_r20.hideConfirmPassword, $event, 0); });
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function SignupComponent_div_64_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "div", 41);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](1, "i", 42);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
const _c0 = function (a0) { return [a0]; };
class SignupComponent {
    constructor(authService, router, toastr, route, generalService) {
        this.authService = authService;
        this.router = router;
        this.toastr = toastr;
        this.route = route;
        this.generalService = generalService;
        this.routes = src_app_config__WEBPACK_IMPORTED_MODULE_2__["appRoutes"];
        this.user = new _model__WEBPACK_IMPORTED_MODULE_1__["User"]();
        this.submitting = false;
        this.hidePassword = true;
        this.hideConfirmPassword = true;
    }
    ngOnInit() {
        this.getSubscriptionPackageId();
    }
    getSubscriptionPackageId() {
        this.route.queryParamMap.subscribe((param) => {
            this.packageID = param.get("sub");
        });
    }
    signUpUser(user) {
        this.authService.showLoader(true);
        this.submitting = true;
        delete user.confirmpassword;
        if (this.packageID) {
            user.package_id = this.packageID;
        }
        this.authService.signup(user).subscribe((data) => {
            this.submitting = false;
            this.authService.showLoader(false);
            if (data.status._text != "Failed") {
                this.toastr.success("You're in, check your email, we will send you a verification link in less than 5 minutes, check your inbox and spam folder :)", "", { timeOut: 100000000 });
                // this.router.navigate(['./page/']);
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            try {
                error = this.generalService.xmlToJson(error.error);
                this.submitting = false;
                this.authService.showLoader(false);
                this.toastr.error(error.status_message._text ||
                    "Something went wrong when trying to create a user");
            }
            catch (error) {
                this.submitting = false;
                this.authService.showLoader(false);
                this.toastr.error("Something went wrong when trying to create a user");
            }
        });
    }
}
SignupComponent.ɵfac = function SignupComponent_Factory(t) { return new (t || SignupComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_core__WEBPACK_IMPORTED_MODULE_3__["AuthService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_angular_router__WEBPACK_IMPORTED_MODULE_4__["Router"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](ngx_toastr__WEBPACK_IMPORTED_MODULE_5__["ToastrService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_core__WEBPACK_IMPORTED_MODULE_3__["GeneralService"])); };
SignupComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineComponent"]({ type: SignupComponent, selectors: [["app-signup"]], decls: 65, vars: 19, consts: [[1, "auth-box", "d-flex", "flex-column", "flex-md-row"], [1, "col-lg-5", "d-flex", "bg-img", "flex-column", "align-items-start"], ["src", "./assets/images/logo-white.png", "alt", "nigenius logo", "srcset", "", 1, "mt-auto", "d-flex", "d-md-none"], [1, "text-white", "font-weight-medium", "font-weight-med", "mt-md-5", "mt-4"], [1, "font-weight-thin", "text-white", "mb-0", "mb-md-2"], [1, "font-weight-thin", "text-white", "pt-md-2", "pt-0"], ["src", "./assets/images/logo-white.png", "alt", "nigenius logo", "srcset", "", 1, "mt-auto", "d-none", "d-md-flex"], [1, "col-lg-7", "bg-grey", "position-relative"], [1, "pull-down", 3, "ngSubmit"], ["signUpForm", "ngForm"], [1, "form-input"], [1, "d-flex", "flex-row"], ["for", "gender", 1, "col-lg-4", "pl-0", "pr-0", "col-sm-12", "font-weight-light"], [1, "col-lg-4", "pl-0", "pr-0", "col-sm-12"], ["type", "radio", "id", "male", "name", "gender", "value", "male", 3, "ngModel", "ngModelChange"], ["for", "male", 1, "font-weight-light", "ml-2"], [1, "col-lg-4", "pr-0", "col-sm-12"], ["type", "radio", "id", "female", "name", "gender", "value", "female", 3, "ngModel", "ngModelChange"], ["for", "female", 1, "font-weight-light", "ml-2"], ["for", "name", 1, "font-weight-light"], [1, "col-lg-6", "pl-0", "pr-0", "col-sm-12"], ["type", "text", "placeholder", "First name", "required", "", "name", "first-name", 1, "form-control", 3, "ngModel", "ngModelChange"], [1, "col-lg-6", "pr-0", "col-sm-12"], ["type", "text", "placeholder", "Last name", "required", "", "name", "surname", 1, "form-control", 3, "ngModel", "ngModelChange"], ["for", "email", 1, "font-weight-light"], ["id", "email", "placeholder", "Type a valid email address", "type", "email", "required", "", "name", "email", 1, "form-control", 3, "ngModel", "ngModelChange"], ["for", "password", 1, "font-weight-light"], ["id", "password", 1, "d-flex", "flex-md-row", "flex-column"], [1, "position-relative", "col-md-6", "pl-0", "pr-0", "col-12"], ["placeholder", "Type your password", "type", "password", "required", "", "name", "password", 1, "form-control", 3, "ngModel", "ngModelChange"], ["class", "password-reveal fade-in", "src", "./assets/images/icons/password-icon.svg", 3, "click", 4, "ngIf"], ["class", "password-reveal fade-in", "src", "./assets/images/icons/password-reveal-icon.svg", 3, "click", 4, "ngIf"], [1, "position-relative", "col-md-6", "pl-0", "pl-md-2", "pt-2", "pt-md-0", "pr-0", "col-12"], ["placeholder", "Re-Type password", "type", "password", "exactMatch", "password", "required", "", "name", "confrim-password", 1, "form-control", 3, "ngModel", "ngModelChange"], [1, "btn", "bg-green-400", "bg-success", "cta-btn", 3, "disabled"], [1, "pt-4"], [1, "font-weight-light"], [1, "", 3, "routerLink"], ["id", "loading-overlay", 4, "ngIf"], ["src", "./assets/images/icons/password-icon.svg", 1, "password-reveal", "fade-in", 3, "click"], ["src", "./assets/images/icons/password-reveal-icon.svg", 1, "password-reveal", "fade-in", 3, "click"], ["id", "loading-overlay"], [1, "fa", "fa-spinner", "edit", "fa-pulse", "fa-3x", "fa-fw"]], template: function SignupComponent_Template(rf, ctx) { if (rf & 1) {
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "div", 0);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](1, "div", 1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](2, "div");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](3, "img", 2);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](4, "h1", 3);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](5, " Sign Up ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](6, "h6", 4);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](7, " Nigenius is much better when you have an account. ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](8, "h6", 5);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](9, " Why not create one now. ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](10, "img", 6);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](11, "div", 7);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](12, "form", 8, 9);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngSubmit", function SignupComponent_Template_form_ngSubmit_12_listener() { return ctx.signUpUser(ctx.user); });
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](14, "div", 10);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](15, "div", 11);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](16, "label", 12);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](17, "Gender");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](18, "div", 13);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](19, "input", 14);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngModelChange", function SignupComponent_Template_input_ngModelChange_19_listener($event) { return ctx.user.gender = $event; });
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](20, "label", 15);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](21, "Male");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](22, "br");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](23, "div", 16);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](24, "input", 17);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngModelChange", function SignupComponent_Template_input_ngModelChange_24_listener($event) { return ctx.user.gender = $event; });
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](25, "label", 18);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](26, "Female");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](27, "br");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](28, "div", 10);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](29, "label", 19);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](30, "Name");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](31, "div", 11);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](32, "div", 20);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](33, "input", 21);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngModelChange", function SignupComponent_Template_input_ngModelChange_33_listener($event) { return ctx.user.first_name = $event; });
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](34, "div", 22);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](35, "input", 23);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngModelChange", function SignupComponent_Template_input_ngModelChange_35_listener($event) { return ctx.user.surname = $event; });
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](36, "div", 10);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](37, "label", 24);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](38, "Email Address");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](39, "input", 25);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngModelChange", function SignupComponent_Template_input_ngModelChange_39_listener($event) { return ctx.user.email = $event; });
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](40, "div", 10);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](41, "label", 26);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](42, "Password");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](43, "div", 27);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](44, "div", 28);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](45, "input", 29);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngModelChange", function SignupComponent_Template_input_ngModelChange_45_listener($event) { return ctx.user.password = $event; });
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](46, SignupComponent_img_46_Template, 1, 0, "img", 30);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](47, SignupComponent_img_47_Template, 1, 0, "img", 31);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](48, "div", 32);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](49, "input", 33);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵlistener"]("ngModelChange", function SignupComponent_Template_input_ngModelChange_49_listener($event) { return ctx.user.confirm_password = $event; });
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](50, SignupComponent_img_50_Template, 1, 0, "img", 30);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](51, SignupComponent_img_51_Template, 1, 0, "img", 31);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](52, "button", 34);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](53, " Sign up ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](54, "p", 35);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](55, "small", 36);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](56, "Already have an account? ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](57, "a", 37);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](58, " Log in");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](59, "br");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](60, "small", 36);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](61, " Forgot Password? ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](62, "a", 37);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](63, " Click here to reset");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](64, SignupComponent_div_64_Template, 2, 0, "div", 38);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    } if (rf & 2) {
        const _r8 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵreference"](13);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](19);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngModel", ctx.user.gender);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](5);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngModel", ctx.user.gender);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](9);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngModel", ctx.user.first_name);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](2);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngModel", ctx.user.surname);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](4);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngModel", ctx.user.email);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](6);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngModel", ctx.user.password);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx.hidePassword);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", !ctx.hidePassword);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](2);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngModel", ctx.user.confirm_password);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx.hideConfirmPassword);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", !ctx.hideConfirmPassword);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("disabled", !_r8.valid);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](5);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("routerLink", _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵpureFunction1"](15, _c0, ctx.routes.login));
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](5);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("routerLink", _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵpureFunction1"](17, _c0, ctx.routes.forgot));
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](2);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx.submitting);
    } }, directives: [_angular_forms__WEBPACK_IMPORTED_MODULE_6__["ɵangular_packages_forms_forms_y"], _angular_forms__WEBPACK_IMPORTED_MODULE_6__["NgControlStatusGroup"], _angular_forms__WEBPACK_IMPORTED_MODULE_6__["NgForm"], _angular_forms__WEBPACK_IMPORTED_MODULE_6__["RadioControlValueAccessor"], _angular_forms__WEBPACK_IMPORTED_MODULE_6__["DefaultValueAccessor"], _angular_forms__WEBPACK_IMPORTED_MODULE_6__["NgControlStatus"], _angular_forms__WEBPACK_IMPORTED_MODULE_6__["NgModel"], _angular_forms__WEBPACK_IMPORTED_MODULE_6__["RequiredValidator"], _angular_common__WEBPACK_IMPORTED_MODULE_7__["NgIf"], _validators_custom_validators__WEBPACK_IMPORTED_MODULE_8__["ExactMatchDirective"], _angular_router__WEBPACK_IMPORTED_MODULE_4__["RouterLinkWithHref"]], styles: [".bg-img[_ngcontent-%COMP%] {\n  background-image: url('bg@2x.png');\n  background-repeat: no-repeat;\n  background-size: cover;\n  background-color: #FF9B07;\n  height: 100vh;\n  border-radius: 20px;\n}\n\nheader[_ngcontent-%COMP%] {\n  height: 50px;\n  width: 100%;\n  background: #fff;\n}\n\nform[_ngcontent-%COMP%] {\n  width: 95%;\n  max-width: 540px;\n  height: -moz-max-content;\n  height: max-content;\n}\n\n.auth-card[_ngcontent-%COMP%] {\n  width: 75%;\n  min-width: 650px;\n  height: -moz-fit-content;\n  height: fit-content;\n}\n\n.main-box[_ngcontent-%COMP%] {\n  min-height: 100vh;\n  background-color: #f4f7fb;\n}\n\n.auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n  padding: 3rem;\n  height: 500px;\n}\n\n.form-input[_ngcontent-%COMP%] {\n  padding-bottom: 13px;\n}\n\na[_ngcontent-%COMP%] {\n  font-weight: 500;\n}\n\n.password-reveal[_ngcontent-%COMP%] {\n  position: absolute;\n  bottom: 30%;\n  right: 18px;\n}\n\n.fade-in[_ngcontent-%COMP%] {\n  opacity: 1;\n  animation-name: fadeInOpacity;\n  animation-iteration-count: 1;\n  animation-timing-function: ease-in;\n  animation-duration: 0.3s;\n}\n\n@keyframes fadeInOpacity {\n  0% {\n    opacity: 0;\n  }\n  100% {\n    opacity: 1;\n  }\n}\n\n@media (max-width: 768px) {\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    height: auto;\n  }\n\n  .bg-img[_ngcontent-%COMP%] {\n    border-radius: 0px;\n  }\n\n  .auth-card[_ngcontent-%COMP%] {\n    width: 100%;\n    min-width: 100%;\n  }\n\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    padding: 1.5rem;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div.col-lg-7[_ngcontent-%COMP%] {\n    border-radius: 20px;\n    margin-top: -20px;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h1[_ngcontent-%COMP%] {\n    font-size: 30px;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h5[_ngcontent-%COMP%], .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h6[_ngcontent-%COMP%] {\n    font-size: small;\n  }\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvYXV0aC9DOlxcbGFyYWdvblxcd3d3XFxlcml0YXBwL3NyY1xcYXBwXFxAYXV0aFxcYXV0aFxcYXV0aC5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvYXV0aC9hdXRoLmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBQ0Usa0NBQUE7RUFDQSw0QkFBQTtFQUNBLHNCQUFBO0VBQ0EseUJBQUE7RUFDQSxhQUFBO0VBQ0EsbUJBQUE7QUNDRjs7QURFQTtFQUNFLFlBQUE7RUFDQSxXQUFBO0VBQ0EsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSxnQkFBQTtFQUNBLHdCQUFBO0VBQUEsbUJBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSxnQkFBQTtFQUNBLHdCQUFBO0VBQUEsbUJBQUE7QUNDRjs7QURFQTtFQUNFLGlCQUFBO0VBQ0EseUJBQUE7QUNDRjs7QURFQTtFQUNFLGFBQUE7RUFDQSxhQUFBO0FDQ0Y7O0FERUE7RUFDRSxvQkFBQTtBQ0NGOztBREVBO0VBQ0UsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLGtCQUFBO0VBQ0EsV0FBQTtFQUNBLFdBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSw2QkFBQTtFQUNBLDRCQUFBO0VBQ0Esa0NBQUE7RUFDQSx3QkFBQTtBQ0NGOztBREVBO0VBQ0U7SUFDRSxVQUFBO0VDQ0Y7RURDQTtJQUNFLFVBQUE7RUNDRjtBQUNGOztBREVBO0VBQ0U7SUFDRSxZQUFBO0VDQUY7O0VERUE7SUFDRSxrQkFBQTtFQ0NGOztFREVBO0lBQ0UsV0FBQTtJQUNBLGVBQUE7RUNDRjs7RURFQTtJQUNFLGVBQUE7RUNDRjtFREFFO0lBQ0UsbUJBQUE7SUFDQSxpQkFBQTtFQ0VKO0VEQUU7SUFDRSxlQUFBO0VDRUo7RURDRTs7SUFFRSxnQkFBQTtFQ0NKO0FBQ0YiLCJmaWxlIjoic3JjL2FwcC9AYXV0aC9hdXRoL2F1dGguY29tcG9uZW50LnNjc3MiLCJzb3VyY2VzQ29udGVudCI6WyIuYmctaW1nIHtcclxuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCIuLi8uLi8uLi9hc3NldHMvaW1hZ2VzL2JnQDJ4LnBuZ1wiKTtcclxuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xyXG4gIGJhY2tncm91bmQtc2l6ZTogY292ZXI7XHJcbiAgYmFja2dyb3VuZC1jb2xvcjogI0ZGOUIwNztcclxuICBoZWlnaHQ6IDEwMHZoO1xyXG4gIGJvcmRlci1yYWRpdXM6IDIwcHg7XHJcbn1cclxuXHJcbmhlYWRlciB7XHJcbiAgaGVpZ2h0OiA1MHB4O1xyXG4gIHdpZHRoOiAxMDAlO1xyXG4gIGJhY2tncm91bmQ6ICNmZmY7XHJcbn1cclxuXHJcbmZvcm0ge1xyXG4gIHdpZHRoOiA5NSU7XHJcbiAgbWF4LXdpZHRoOiA1NDBweDtcclxuICBoZWlnaHQ6IG1heC1jb250ZW50O1xyXG59XHJcblxyXG4uYXV0aC1jYXJkIHtcclxuICB3aWR0aDogNzUlO1xyXG4gIG1pbi13aWR0aDogNjUwcHg7XHJcbiAgaGVpZ2h0OiBmaXQtY29udGVudDtcclxufVxyXG5cclxuLm1haW4tYm94IHtcclxuICBtaW4taGVpZ2h0OiAxMDB2aDtcclxuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjRmN2ZiO1xyXG59XHJcblxyXG4uYXV0aC1ib3ggPiBkaXYge1xyXG4gIHBhZGRpbmc6IDNyZW07XHJcbiAgaGVpZ2h0OiA1MDBweDtcclxufVxyXG5cclxuLmZvcm0taW5wdXQge1xyXG4gIHBhZGRpbmctYm90dG9tOiAxM3B4O1xyXG59XHJcblxyXG5hIHtcclxuICBmb250LXdlaWdodDogNTAwO1xyXG59XHJcblxyXG4ucGFzc3dvcmQtcmV2ZWFsIHtcclxuICBwb3NpdGlvbjogYWJzb2x1dGU7XHJcbiAgYm90dG9tOiAzMCU7XHJcbiAgcmlnaHQ6IDE4cHg7XHJcbn1cclxuXHJcbi5mYWRlLWluIHtcclxuICBvcGFjaXR5OiAxO1xyXG4gIGFuaW1hdGlvbi1uYW1lOiBmYWRlSW5PcGFjaXR5O1xyXG4gIGFuaW1hdGlvbi1pdGVyYXRpb24tY291bnQ6IDE7XHJcbiAgYW5pbWF0aW9uLXRpbWluZy1mdW5jdGlvbjogZWFzZS1pbjtcclxuICBhbmltYXRpb24tZHVyYXRpb246IDAuM3M7XHJcbn1cclxuXHJcbkBrZXlmcmFtZXMgZmFkZUluT3BhY2l0eSB7XHJcbiAgMCUge1xyXG4gICAgb3BhY2l0eTogMDtcclxuICB9XHJcbiAgMTAwJSB7XHJcbiAgICBvcGFjaXR5OiAxO1xyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDc2OHB4KSB7XHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIGhlaWdodDogYXV0bztcclxuICB9XHJcbiAgLmJnLWltZyB7XHJcbiAgICBib3JkZXItcmFkaXVzOiAwcHg7XHJcbiAgfVxyXG5cclxuICAuYXV0aC1jYXJkIHtcclxuICAgIHdpZHRoOiAxMDAlO1xyXG4gICAgbWluLXdpZHRoOiAxMDAlO1xyXG4gIH1cclxuXHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIHBhZGRpbmc6IDEuNXJlbTtcclxuICAgICYuY29sLWxnLTcge1xyXG4gICAgICBib3JkZXItcmFkaXVzOiAyMHB4O1xyXG4gICAgICBtYXJnaW4tdG9wOiAtMjBweDtcclxuICAgIH1cclxuICAgIGgxIHtcclxuICAgICAgZm9udC1zaXplOiAzMHB4O1xyXG4gICAgfVxyXG5cclxuICAgIGg1LFxyXG4gICAgaDYge1xyXG4gICAgICBmb250LXNpemU6IHNtYWxsO1xyXG4gICAgfVxyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDQyNXB4KSB7XHJcbn1cclxuIiwiLmJnLWltZyB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcIi4uLy4uLy4uL2Fzc2V0cy9pbWFnZXMvYmdAMngucG5nXCIpO1xuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjRkY5QjA3O1xuICBoZWlnaHQ6IDEwMHZoO1xuICBib3JkZXItcmFkaXVzOiAyMHB4O1xufVxuXG5oZWFkZXIge1xuICBoZWlnaHQ6IDUwcHg7XG4gIHdpZHRoOiAxMDAlO1xuICBiYWNrZ3JvdW5kOiAjZmZmO1xufVxuXG5mb3JtIHtcbiAgd2lkdGg6IDk1JTtcbiAgbWF4LXdpZHRoOiA1NDBweDtcbiAgaGVpZ2h0OiBtYXgtY29udGVudDtcbn1cblxuLmF1dGgtY2FyZCB7XG4gIHdpZHRoOiA3NSU7XG4gIG1pbi13aWR0aDogNjUwcHg7XG4gIGhlaWdodDogZml0LWNvbnRlbnQ7XG59XG5cbi5tYWluLWJveCB7XG4gIG1pbi1oZWlnaHQ6IDEwMHZoO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjRmN2ZiO1xufVxuXG4uYXV0aC1ib3ggPiBkaXYge1xuICBwYWRkaW5nOiAzcmVtO1xuICBoZWlnaHQ6IDUwMHB4O1xufVxuXG4uZm9ybS1pbnB1dCB7XG4gIHBhZGRpbmctYm90dG9tOiAxM3B4O1xufVxuXG5hIHtcbiAgZm9udC13ZWlnaHQ6IDUwMDtcbn1cblxuLnBhc3N3b3JkLXJldmVhbCB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgYm90dG9tOiAzMCU7XG4gIHJpZ2h0OiAxOHB4O1xufVxuXG4uZmFkZS1pbiB7XG4gIG9wYWNpdHk6IDE7XG4gIGFuaW1hdGlvbi1uYW1lOiBmYWRlSW5PcGFjaXR5O1xuICBhbmltYXRpb24taXRlcmF0aW9uLWNvdW50OiAxO1xuICBhbmltYXRpb24tdGltaW5nLWZ1bmN0aW9uOiBlYXNlLWluO1xuICBhbmltYXRpb24tZHVyYXRpb246IDAuM3M7XG59XG5cbkBrZXlmcmFtZXMgZmFkZUluT3BhY2l0eSB7XG4gIDAlIHtcbiAgICBvcGFjaXR5OiAwO1xuICB9XG4gIDEwMCUge1xuICAgIG9wYWNpdHk6IDE7XG4gIH1cbn1cbkBtZWRpYSAobWF4LXdpZHRoOiA3NjhweCkge1xuICAuYXV0aC1ib3ggPiBkaXYge1xuICAgIGhlaWdodDogYXV0bztcbiAgfVxuXG4gIC5iZy1pbWcge1xuICAgIGJvcmRlci1yYWRpdXM6IDBweDtcbiAgfVxuXG4gIC5hdXRoLWNhcmQge1xuICAgIHdpZHRoOiAxMDAlO1xuICAgIG1pbi13aWR0aDogMTAwJTtcbiAgfVxuXG4gIC5hdXRoLWJveCA+IGRpdiB7XG4gICAgcGFkZGluZzogMS41cmVtO1xuICB9XG4gIC5hdXRoLWJveCA+IGRpdi5jb2wtbGctNyB7XG4gICAgYm9yZGVyLXJhZGl1czogMjBweDtcbiAgICBtYXJnaW4tdG9wOiAtMjBweDtcbiAgfVxuICAuYXV0aC1ib3ggPiBkaXYgaDEge1xuICAgIGZvbnQtc2l6ZTogMzBweDtcbiAgfVxuICAuYXV0aC1ib3ggPiBkaXYgaDUsXG4uYXV0aC1ib3ggPiBkaXYgaDYge1xuICAgIGZvbnQtc2l6ZTogc21hbGw7XG4gIH1cbn0iXX0= */", ".cta-btn[_ngcontent-%COMP%] {\n  width: 150px;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvbG9naW4vQzpcXGxhcmFnb25cXHd3d1xcZXJpdGFwcC9zcmNcXGFwcFxcQGF1dGhcXGxvZ2luXFxsb2dpbi5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvbG9naW4vbG9naW4uY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFDRSxZQUFBO0FDQ0YiLCJmaWxlIjoic3JjL2FwcC9AYXV0aC9sb2dpbi9sb2dpbi5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5jdGEtYnRuIHtcclxuICB3aWR0aDogMTUwcHg7XHJcbn1cclxuIiwiLmN0YS1idG4ge1xuICB3aWR0aDogMTUwcHg7XG59Il19 */", "#change-password-type-trigger[_ngcontent-%COMP%] {\n  bottom: 15%;\n  right: 0.5rem;\n  font-size: 0.9rem;\n  cursor: pointer;\n}\n\n.sign-up-card[_ngcontent-%COMP%] {\n  width: 70%;\n  max-width: 1024px;\n  min-width: 300px;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvc2lnbnVwL0M6XFxsYXJhZ29uXFx3d3dcXGVyaXRhcHAvc3JjXFxhcHBcXEBhdXRoXFxzaWdudXBcXHNpZ251cC5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvc2lnbnVwL3NpZ251cC5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtFQUNJLFdBQUE7RUFDQSxhQUFBO0VBQ0EsaUJBQUE7RUFDQSxlQUFBO0FDQ0o7O0FERUE7RUFDSSxVQUFBO0VBQ0EsaUJBQUE7RUFDQSxnQkFBQTtBQ0NKIiwiZmlsZSI6InNyYy9hcHAvQGF1dGgvc2lnbnVwL3NpZ251cC5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIiNjaGFuZ2UtcGFzc3dvcmQtdHlwZS10cmlnZ2Vye1xyXG4gICAgYm90dG9tOiAxNSU7XHJcbiAgICByaWdodDogMC41cmVtO1xyXG4gICAgZm9udC1zaXplOiAwLjlyZW07XHJcbiAgICBjdXJzb3I6IHBvaW50ZXI7XHJcbn1cclxuXHJcbi5zaWduLXVwLWNhcmR7XHJcbiAgICB3aWR0aDogNzAlO1xyXG4gICAgbWF4LXdpZHRoOiAxMDI0cHg7XHJcbiAgICBtaW4td2lkdGg6IDMwMHB4O1xyXG59IiwiI2NoYW5nZS1wYXNzd29yZC10eXBlLXRyaWdnZXIge1xuICBib3R0b206IDE1JTtcbiAgcmlnaHQ6IDAuNXJlbTtcbiAgZm9udC1zaXplOiAwLjlyZW07XG4gIGN1cnNvcjogcG9pbnRlcjtcbn1cblxuLnNpZ24tdXAtY2FyZCB7XG4gIHdpZHRoOiA3MCU7XG4gIG1heC13aWR0aDogMTAyNHB4O1xuICBtaW4td2lkdGg6IDMwMHB4O1xufSJdfQ== */"] });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](SignupComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"],
        args: [{
                selector: "app-signup",
                templateUrl: "./signup.component.html",
                styleUrls: [
                    "./../auth/auth.component.scss",
                    "./../login/login.component.scss",
                    "./signup.component.scss",
                ],
            }]
    }], function () { return [{ type: _core__WEBPACK_IMPORTED_MODULE_3__["AuthService"] }, { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__["Router"] }, { type: ngx_toastr__WEBPACK_IMPORTED_MODULE_5__["ToastrService"] }, { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__["ActivatedRoute"] }, { type: _core__WEBPACK_IMPORTED_MODULE_3__["GeneralService"] }]; }, null); })();


/***/ }),

/***/ "./src/app/@auth/verify-email/verify-email.component.ts":
/*!**************************************************************!*\
  !*** ./src/app/@auth/verify-email/verify-email.component.ts ***!
  \**************************************************************/
/*! exports provided: VerifyEmailComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "VerifyEmailComponent", function() { return VerifyEmailComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../@core */ "./src/app/@core/index.ts");
/* harmony import */ var ngx_toastr__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ngx-toastr */ "./node_modules/ngx-toastr/__ivy_ngcc__/fesm2015/ngx-toastr.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/common.js");






function VerifyEmailComponent_h2_1_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "h2", 5);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](1, "Verifying your details.. ");
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function VerifyEmailComponent_h2_2_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "h2", 5);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](1, "Your email has been verified ");
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function VerifyEmailComponent_div_4_img_1_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](0, "img", 10);
} }
function VerifyEmailComponent_div_4_img_2_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](0, "img", 11);
} }
function VerifyEmailComponent_div_4_p_3_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "p", 12);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](1, "Your Account Has been Activated");
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function VerifyEmailComponent_div_4_p_4_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "p", 12);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](1, "Account activation was not successful ");
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
function VerifyEmailComponent_div_4_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "div", 6);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](1, VerifyEmailComponent_div_4_img_1_Template, 1, 0, "img", 7);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](2, VerifyEmailComponent_div_4_img_2_Template, 1, 0, "img", 8);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](3, VerifyEmailComponent_div_4_p_3_Template, 2, 0, "p", 9);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](4, VerifyEmailComponent_div_4_p_4_Template, 2, 0, "p", 9);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r26 = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵnextContext"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx_r26.isVerified);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", !ctx_r26.isVerified);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx_r26.isVerified);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", !ctx_r26.isVerified);
} }
function VerifyEmailComponent_div_5_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "div", 13);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](1, "i", 14);
    _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
} }
class VerifyEmailComponent {
    constructor(authService, generalService, toastr, router, route) {
        this.authService = authService;
        this.generalService = generalService;
        this.toastr = toastr;
        this.router = router;
        this.route = route;
        this.loading = true;
        this.status = "Please wait while we verify your email Address";
    }
    ngOnInit() {
        this.route.queryParams.subscribe((params) => {
            this.verify(params.code, params["email"]);
        });
    }
    verify(code, email) {
        this.authService.showLoader(true);
        this.authService.verifyRegistrationEmail({ code, email }).subscribe((data) => {
            this.loading = false;
            if (data.status._text != "Failed") {
                this.isVerified = true;
                this.authService.showLoader(false);
                this.status = "Hurray your email is now verified :)";
                this.toastr.success("You will be redirected to the Login to access the portal", "Email verified ", {
                    timeOut: 15000,
                });
                setTimeout(() => {
                    this.router.navigate(["/auth/login"]);
                }, 4000);
            }
            else {
                this.isVerified = false;
                this.authService.showLoader(false);
                this.status = "Something went wrong during verification process";
                this.toastr.error(data.status_message._text || "Email Not Verified :(", "Oops,", {
                    timeOut: 15000,
                });
            }
        }, (error) => {
            this.loading = false;
            this.isVerified = false;
            this.authService.showLoader(false);
            this.status = "Something went wrong during verification process";
            this.toastr.error(error.error.message || "Email Not Verified :(", "Oops,", {
                timeOut: 15000,
            });
        });
    }
}
VerifyEmailComponent.ɵfac = function VerifyEmailComponent_Factory(t) { return new (t || VerifyEmailComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_core__WEBPACK_IMPORTED_MODULE_1__["AuthService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_core__WEBPACK_IMPORTED_MODULE_1__["GeneralService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](ngx_toastr__WEBPACK_IMPORTED_MODULE_2__["ToastrService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_angular_router__WEBPACK_IMPORTED_MODULE_3__["Router"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](_angular_router__WEBPACK_IMPORTED_MODULE_3__["ActivatedRoute"])); };
VerifyEmailComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineComponent"]({ type: VerifyEmailComponent, selectors: [["app-verify-email"]], decls: 6, vars: 4, consts: [[1, "fade-in-right"], ["class", "text-center text-main text-center", 4, "ngIf"], [1, "position-relative"], ["class", "text-center", 4, "ngIf"], ["class", "loader w-100 m-auto d-flex position-absolute", 4, "ngIf"], [1, "text-center", "text-main", "text-center"], [1, "text-center"], ["src", "assets/images/verification-sent.svg", "alt", "verify image", 4, "ngIf"], ["src", "assets/images/verification-failed.svg", "alt", "verify image", 4, "ngIf"], ["class", "text-main", 4, "ngIf"], ["src", "assets/images/verification-sent.svg", "alt", "verify image"], ["src", "assets/images/verification-failed.svg", "alt", "verify image"], [1, "text-main"], [1, "loader", "w-100", "m-auto", "d-flex", "position-absolute"], [1, "fas", "fa-circle-notch", "fa-3x", "fa-spin"]], template: function VerifyEmailComponent_Template(rf, ctx) { if (rf & 1) {
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "div", 0);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](1, VerifyEmailComponent_h2_1_Template, 2, 0, "h2", 1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](2, VerifyEmailComponent_h2_2_Template, 2, 0, "h2", 1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](3, "div", 2);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](4, VerifyEmailComponent_div_4_Template, 5, 4, "div", 3);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtemplate"](5, VerifyEmailComponent_div_5_Template, 2, 0, "div", 4);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    } if (rf & 2) {
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx.loading);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx.isVerified);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](2);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", !ctx.loading);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("ngIf", ctx.loading);
    } }, directives: [_angular_common__WEBPACK_IMPORTED_MODULE_4__["NgIf"]], styles: [".bg-img[_ngcontent-%COMP%] {\n  background-image: url('bg@2x.png');\n  background-repeat: no-repeat;\n  background-size: cover;\n  background-color: #FF9B07;\n  height: 100vh;\n  border-radius: 20px;\n}\n\nheader[_ngcontent-%COMP%] {\n  height: 50px;\n  width: 100%;\n  background: #fff;\n}\n\nform[_ngcontent-%COMP%] {\n  width: 95%;\n  max-width: 540px;\n  height: -moz-max-content;\n  height: max-content;\n}\n\n.auth-card[_ngcontent-%COMP%] {\n  width: 75%;\n  min-width: 650px;\n  height: -moz-fit-content;\n  height: fit-content;\n}\n\n.main-box[_ngcontent-%COMP%] {\n  min-height: 100vh;\n  background-color: #f4f7fb;\n}\n\n.auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n  padding: 3rem;\n  height: 500px;\n}\n\n.form-input[_ngcontent-%COMP%] {\n  padding-bottom: 13px;\n}\n\na[_ngcontent-%COMP%] {\n  font-weight: 500;\n}\n\n.password-reveal[_ngcontent-%COMP%] {\n  position: absolute;\n  bottom: 30%;\n  right: 18px;\n}\n\n.fade-in[_ngcontent-%COMP%] {\n  opacity: 1;\n  animation-name: fadeInOpacity;\n  animation-iteration-count: 1;\n  animation-timing-function: ease-in;\n  animation-duration: 0.3s;\n}\n\n@keyframes fadeInOpacity {\n  0% {\n    opacity: 0;\n  }\n  100% {\n    opacity: 1;\n  }\n}\n\n@media (max-width: 768px) {\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    height: auto;\n  }\n\n  .bg-img[_ngcontent-%COMP%] {\n    border-radius: 0px;\n  }\n\n  .auth-card[_ngcontent-%COMP%] {\n    width: 100%;\n    min-width: 100%;\n  }\n\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    padding: 1.5rem;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div.col-lg-7[_ngcontent-%COMP%] {\n    border-radius: 20px;\n    margin-top: -20px;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h1[_ngcontent-%COMP%] {\n    font-size: 30px;\n  }\n  .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h5[_ngcontent-%COMP%], .auth-box[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%]   h6[_ngcontent-%COMP%] {\n    font-size: small;\n  }\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvYXV0aC9DOlxcbGFyYWdvblxcd3d3XFxlcml0YXBwL3NyY1xcYXBwXFxAYXV0aFxcYXV0aFxcYXV0aC5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvYXV0aC9hdXRoLmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBQ0Usa0NBQUE7RUFDQSw0QkFBQTtFQUNBLHNCQUFBO0VBQ0EseUJBQUE7RUFDQSxhQUFBO0VBQ0EsbUJBQUE7QUNDRjs7QURFQTtFQUNFLFlBQUE7RUFDQSxXQUFBO0VBQ0EsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSxnQkFBQTtFQUNBLHdCQUFBO0VBQUEsbUJBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSxnQkFBQTtFQUNBLHdCQUFBO0VBQUEsbUJBQUE7QUNDRjs7QURFQTtFQUNFLGlCQUFBO0VBQ0EseUJBQUE7QUNDRjs7QURFQTtFQUNFLGFBQUE7RUFDQSxhQUFBO0FDQ0Y7O0FERUE7RUFDRSxvQkFBQTtBQ0NGOztBREVBO0VBQ0UsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLGtCQUFBO0VBQ0EsV0FBQTtFQUNBLFdBQUE7QUNDRjs7QURFQTtFQUNFLFVBQUE7RUFDQSw2QkFBQTtFQUNBLDRCQUFBO0VBQ0Esa0NBQUE7RUFDQSx3QkFBQTtBQ0NGOztBREVBO0VBQ0U7SUFDRSxVQUFBO0VDQ0Y7RURDQTtJQUNFLFVBQUE7RUNDRjtBQUNGOztBREVBO0VBQ0U7SUFDRSxZQUFBO0VDQUY7O0VERUE7SUFDRSxrQkFBQTtFQ0NGOztFREVBO0lBQ0UsV0FBQTtJQUNBLGVBQUE7RUNDRjs7RURFQTtJQUNFLGVBQUE7RUNDRjtFREFFO0lBQ0UsbUJBQUE7SUFDQSxpQkFBQTtFQ0VKO0VEQUU7SUFDRSxlQUFBO0VDRUo7RURDRTs7SUFFRSxnQkFBQTtFQ0NKO0FBQ0YiLCJmaWxlIjoic3JjL2FwcC9AYXV0aC9hdXRoL2F1dGguY29tcG9uZW50LnNjc3MiLCJzb3VyY2VzQ29udGVudCI6WyIuYmctaW1nIHtcclxuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCIuLi8uLi8uLi9hc3NldHMvaW1hZ2VzL2JnQDJ4LnBuZ1wiKTtcclxuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xyXG4gIGJhY2tncm91bmQtc2l6ZTogY292ZXI7XHJcbiAgYmFja2dyb3VuZC1jb2xvcjogI0ZGOUIwNztcclxuICBoZWlnaHQ6IDEwMHZoO1xyXG4gIGJvcmRlci1yYWRpdXM6IDIwcHg7XHJcbn1cclxuXHJcbmhlYWRlciB7XHJcbiAgaGVpZ2h0OiA1MHB4O1xyXG4gIHdpZHRoOiAxMDAlO1xyXG4gIGJhY2tncm91bmQ6ICNmZmY7XHJcbn1cclxuXHJcbmZvcm0ge1xyXG4gIHdpZHRoOiA5NSU7XHJcbiAgbWF4LXdpZHRoOiA1NDBweDtcclxuICBoZWlnaHQ6IG1heC1jb250ZW50O1xyXG59XHJcblxyXG4uYXV0aC1jYXJkIHtcclxuICB3aWR0aDogNzUlO1xyXG4gIG1pbi13aWR0aDogNjUwcHg7XHJcbiAgaGVpZ2h0OiBmaXQtY29udGVudDtcclxufVxyXG5cclxuLm1haW4tYm94IHtcclxuICBtaW4taGVpZ2h0OiAxMDB2aDtcclxuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjRmN2ZiO1xyXG59XHJcblxyXG4uYXV0aC1ib3ggPiBkaXYge1xyXG4gIHBhZGRpbmc6IDNyZW07XHJcbiAgaGVpZ2h0OiA1MDBweDtcclxufVxyXG5cclxuLmZvcm0taW5wdXQge1xyXG4gIHBhZGRpbmctYm90dG9tOiAxM3B4O1xyXG59XHJcblxyXG5hIHtcclxuICBmb250LXdlaWdodDogNTAwO1xyXG59XHJcblxyXG4ucGFzc3dvcmQtcmV2ZWFsIHtcclxuICBwb3NpdGlvbjogYWJzb2x1dGU7XHJcbiAgYm90dG9tOiAzMCU7XHJcbiAgcmlnaHQ6IDE4cHg7XHJcbn1cclxuXHJcbi5mYWRlLWluIHtcclxuICBvcGFjaXR5OiAxO1xyXG4gIGFuaW1hdGlvbi1uYW1lOiBmYWRlSW5PcGFjaXR5O1xyXG4gIGFuaW1hdGlvbi1pdGVyYXRpb24tY291bnQ6IDE7XHJcbiAgYW5pbWF0aW9uLXRpbWluZy1mdW5jdGlvbjogZWFzZS1pbjtcclxuICBhbmltYXRpb24tZHVyYXRpb246IDAuM3M7XHJcbn1cclxuXHJcbkBrZXlmcmFtZXMgZmFkZUluT3BhY2l0eSB7XHJcbiAgMCUge1xyXG4gICAgb3BhY2l0eTogMDtcclxuICB9XHJcbiAgMTAwJSB7XHJcbiAgICBvcGFjaXR5OiAxO1xyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDc2OHB4KSB7XHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIGhlaWdodDogYXV0bztcclxuICB9XHJcbiAgLmJnLWltZyB7XHJcbiAgICBib3JkZXItcmFkaXVzOiAwcHg7XHJcbiAgfVxyXG5cclxuICAuYXV0aC1jYXJkIHtcclxuICAgIHdpZHRoOiAxMDAlO1xyXG4gICAgbWluLXdpZHRoOiAxMDAlO1xyXG4gIH1cclxuXHJcbiAgLmF1dGgtYm94ID4gZGl2IHtcclxuICAgIHBhZGRpbmc6IDEuNXJlbTtcclxuICAgICYuY29sLWxnLTcge1xyXG4gICAgICBib3JkZXItcmFkaXVzOiAyMHB4O1xyXG4gICAgICBtYXJnaW4tdG9wOiAtMjBweDtcclxuICAgIH1cclxuICAgIGgxIHtcclxuICAgICAgZm9udC1zaXplOiAzMHB4O1xyXG4gICAgfVxyXG5cclxuICAgIGg1LFxyXG4gICAgaDYge1xyXG4gICAgICBmb250LXNpemU6IHNtYWxsO1xyXG4gICAgfVxyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDQyNXB4KSB7XHJcbn1cclxuIiwiLmJnLWltZyB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcIi4uLy4uLy4uL2Fzc2V0cy9pbWFnZXMvYmdAMngucG5nXCIpO1xuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICBiYWNrZ3JvdW5kLXNpemU6IGNvdmVyO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjRkY5QjA3O1xuICBoZWlnaHQ6IDEwMHZoO1xuICBib3JkZXItcmFkaXVzOiAyMHB4O1xufVxuXG5oZWFkZXIge1xuICBoZWlnaHQ6IDUwcHg7XG4gIHdpZHRoOiAxMDAlO1xuICBiYWNrZ3JvdW5kOiAjZmZmO1xufVxuXG5mb3JtIHtcbiAgd2lkdGg6IDk1JTtcbiAgbWF4LXdpZHRoOiA1NDBweDtcbiAgaGVpZ2h0OiBtYXgtY29udGVudDtcbn1cblxuLmF1dGgtY2FyZCB7XG4gIHdpZHRoOiA3NSU7XG4gIG1pbi13aWR0aDogNjUwcHg7XG4gIGhlaWdodDogZml0LWNvbnRlbnQ7XG59XG5cbi5tYWluLWJveCB7XG4gIG1pbi1oZWlnaHQ6IDEwMHZoO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjRmN2ZiO1xufVxuXG4uYXV0aC1ib3ggPiBkaXYge1xuICBwYWRkaW5nOiAzcmVtO1xuICBoZWlnaHQ6IDUwMHB4O1xufVxuXG4uZm9ybS1pbnB1dCB7XG4gIHBhZGRpbmctYm90dG9tOiAxM3B4O1xufVxuXG5hIHtcbiAgZm9udC13ZWlnaHQ6IDUwMDtcbn1cblxuLnBhc3N3b3JkLXJldmVhbCB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgYm90dG9tOiAzMCU7XG4gIHJpZ2h0OiAxOHB4O1xufVxuXG4uZmFkZS1pbiB7XG4gIG9wYWNpdHk6IDE7XG4gIGFuaW1hdGlvbi1uYW1lOiBmYWRlSW5PcGFjaXR5O1xuICBhbmltYXRpb24taXRlcmF0aW9uLWNvdW50OiAxO1xuICBhbmltYXRpb24tdGltaW5nLWZ1bmN0aW9uOiBlYXNlLWluO1xuICBhbmltYXRpb24tZHVyYXRpb246IDAuM3M7XG59XG5cbkBrZXlmcmFtZXMgZmFkZUluT3BhY2l0eSB7XG4gIDAlIHtcbiAgICBvcGFjaXR5OiAwO1xuICB9XG4gIDEwMCUge1xuICAgIG9wYWNpdHk6IDE7XG4gIH1cbn1cbkBtZWRpYSAobWF4LXdpZHRoOiA3NjhweCkge1xuICAuYXV0aC1ib3ggPiBkaXYge1xuICAgIGhlaWdodDogYXV0bztcbiAgfVxuXG4gIC5iZy1pbWcge1xuICAgIGJvcmRlci1yYWRpdXM6IDBweDtcbiAgfVxuXG4gIC5hdXRoLWNhcmQge1xuICAgIHdpZHRoOiAxMDAlO1xuICAgIG1pbi13aWR0aDogMTAwJTtcbiAgfVxuXG4gIC5hdXRoLWJveCA+IGRpdiB7XG4gICAgcGFkZGluZzogMS41cmVtO1xuICB9XG4gIC5hdXRoLWJveCA+IGRpdi5jb2wtbGctNyB7XG4gICAgYm9yZGVyLXJhZGl1czogMjBweDtcbiAgICBtYXJnaW4tdG9wOiAtMjBweDtcbiAgfVxuICAuYXV0aC1ib3ggPiBkaXYgaDEge1xuICAgIGZvbnQtc2l6ZTogMzBweDtcbiAgfVxuICAuYXV0aC1ib3ggPiBkaXYgaDUsXG4uYXV0aC1ib3ggPiBkaXYgaDYge1xuICAgIGZvbnQtc2l6ZTogc21hbGw7XG4gIH1cbn0iXX0= */", "img[_ngcontent-%COMP%] {\n  margin-bottom: 20px;\n}\n\n.loader[_ngcontent-%COMP%] {\n  top: 10px;\n  left: 40%;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQGF1dGgvdmVyaWZ5LWVtYWlsL0M6XFxsYXJhZ29uXFx3d3dcXGVyaXRhcHAvc3JjXFxhcHBcXEBhdXRoXFx2ZXJpZnktZW1haWxcXHZlcmlmeS1lbWFpbC5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQGF1dGgvdmVyaWZ5LWVtYWlsL3ZlcmlmeS1lbWFpbC5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtFQUNFLG1CQUFBO0FDQ0Y7O0FEQ0E7RUFDRSxTQUFBO0VBQ0EsU0FBQTtBQ0VGIiwiZmlsZSI6InNyYy9hcHAvQGF1dGgvdmVyaWZ5LWVtYWlsL3ZlcmlmeS1lbWFpbC5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbImltZ3tcclxuICBtYXJnaW4tYm90dG9tOjIwcHg7XHJcbn1cclxuLmxvYWRlcntcclxuICB0b3A6IDEwcHg7XHJcbiAgbGVmdDogNDAlO1xyXG59XHJcbiIsImltZyB7XG4gIG1hcmdpbi1ib3R0b206IDIwcHg7XG59XG5cbi5sb2FkZXIge1xuICB0b3A6IDEwcHg7XG4gIGxlZnQ6IDQwJTtcbn0iXX0= */"] });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](VerifyEmailComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"],
        args: [{
                selector: "app-verify-email",
                templateUrl: "./verify-email.component.html",
                styleUrls: ["./../auth/auth.component.scss", "./verify-email.component.scss"],
            }]
    }], function () { return [{ type: _core__WEBPACK_IMPORTED_MODULE_1__["AuthService"] }, { type: _core__WEBPACK_IMPORTED_MODULE_1__["GeneralService"] }, { type: ngx_toastr__WEBPACK_IMPORTED_MODULE_2__["ToastrService"] }, { type: _angular_router__WEBPACK_IMPORTED_MODULE_3__["Router"] }, { type: _angular_router__WEBPACK_IMPORTED_MODULE_3__["ActivatedRoute"] }]; }, null); })();


/***/ }),

/***/ "./src/app/@guards/already-logged-in/already-logged-in.guard.ts":
/*!**********************************************************************!*\
  !*** ./src/app/@guards/already-logged-in/already-logged-in.guard.ts ***!
  \**********************************************************************/
/*! exports provided: AlreadyLoggedInGuard */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AlreadyLoggedInGuard", function() { return AlreadyLoggedInGuard; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../@core */ "./src/app/@core/index.ts");




class AlreadyLoggedInGuard {
    constructor(router, authService) {
        this.router = router;
        this.authService = authService;
    }
    canActivate(next, state) {
        if (this.authService.getUserLocally()) {
            this.router.navigate(['/page/']);
            return false;
        }
        return true;
    }
}
AlreadyLoggedInGuard.ɵfac = function AlreadyLoggedInGuard_Factory(t) { return new (t || AlreadyLoggedInGuard)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵinject"](_angular_router__WEBPACK_IMPORTED_MODULE_1__["Router"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵinject"](_core__WEBPACK_IMPORTED_MODULE_2__["AuthService"])); };
AlreadyLoggedInGuard.ɵprov = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineInjectable"]({ token: AlreadyLoggedInGuard, factory: AlreadyLoggedInGuard.ɵfac, providedIn: 'root' });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](AlreadyLoggedInGuard, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Injectable"],
        args: [{
                providedIn: 'root'
            }]
    }], function () { return [{ type: _angular_router__WEBPACK_IMPORTED_MODULE_1__["Router"] }, { type: _core__WEBPACK_IMPORTED_MODULE_2__["AuthService"] }]; }, null); })();


/***/ }),

/***/ "./src/app/@guards/index.ts":
/*!**********************************!*\
  !*** ./src/app/@guards/index.ts ***!
  \**********************************/
/*! exports provided: AlreadyLoggedInGuard, AuthGuard */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _already_logged_in_already_logged_in_guard__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./already-logged-in/already-logged-in.guard */ "./src/app/@guards/already-logged-in/already-logged-in.guard.ts");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "AlreadyLoggedInGuard", function() { return _already_logged_in_already_logged_in_guard__WEBPACK_IMPORTED_MODULE_0__["AlreadyLoggedInGuard"]; });

/* harmony import */ var _auth_auth_guard__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./auth/auth.guard */ "./src/app/@guards/auth/auth.guard.ts");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "AuthGuard", function() { return _auth_auth_guard__WEBPACK_IMPORTED_MODULE_1__["AuthGuard"]; });





/***/ }),

/***/ "./src/app/@model/index.ts":
/*!*********************************!*\
  !*** ./src/app/@model/index.ts ***!
  \*********************************/
/*! exports provided: User */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _user__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./user */ "./src/app/@model/user.ts");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "User", function() { return _user__WEBPACK_IMPORTED_MODULE_0__["User"]; });




/***/ }),

/***/ "./src/app/@model/user.ts":
/*!********************************!*\
  !*** ./src/app/@model/user.ts ***!
  \********************************/
/*! exports provided: User */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "User", function() { return User; });
class GeneralAPIResponse {
}
class User extends GeneralAPIResponse {
}


/***/ })

}]);
//# sourceMappingURL=auth-auth-module-es2015.js.map