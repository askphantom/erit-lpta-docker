(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["main"],{

/***/ "./$$_lazy_route_resource lazy recursive":
/*!******************************************************!*\
  !*** ./$$_lazy_route_resource lazy namespace object ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function webpackEmptyAsyncContext(req) {
	// Here Promise.resolve().then() is used instead of new Promise() to prevent
	// uncaught exception popping up in devtools
	return Promise.resolve().then(function() {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	});
}
webpackEmptyAsyncContext.keys = function() { return []; };
webpackEmptyAsyncContext.resolve = webpackEmptyAsyncContext;
module.exports = webpackEmptyAsyncContext;
webpackEmptyAsyncContext.id = "./$$_lazy_route_resource lazy recursive";

/***/ }),

/***/ "./src/app/@core/auth.service.ts":
/*!***************************************!*\
  !*** ./src/app/@core/auth.service.ts ***!
  \***************************************/
/*! exports provided: AuthService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthService", function() { return AuthService; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _environments_environment__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../environments/environment */ "./src/environments/environment.ts");
/* harmony import */ var rxjs__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! rxjs */ "./node_modules/rxjs/_esm2015/index.js");
/* harmony import */ var _angular_common_http__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/common/http */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/http.js");
/* harmony import */ var _general_service__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./general.service */ "./src/app/@core/general.service.ts");






class AuthService {
    constructor(httpClient, generalService) {
        this.httpClient = httpClient;
        this.generalService = generalService;
        this._presentStateSource = new rxjs__WEBPACK_IMPORTED_MODULE_2__["BehaviorSubject"](false);
        this.state$ = this._presentStateSource.asObservable();
    }
    showLoader(loadingState) {
        this._presentStateSource.next(loadingState);
    }
    /**
     *  description: logs the user into the platform
     */
    login(user) {
        return this.httpClient.post(`${_environments_environment__WEBPACK_IMPORTED_MODULE_1__["environment"].baseURL}/member-login`, this.generalService.objectToFormData(user), { responseType: "text/xml" });
    }
    /**
     *  description: Registers a user and sends a verification email in the format
     */
    signup(user) {
        return this.httpClient.post(`${_environments_environment__WEBPACK_IMPORTED_MODULE_1__["environment"].baseURL}/member-register`, this.generalService.objectToFormData(user), { responseType: "text/xml" });
    }
    /**
     *  description: initailizes the process to reset password,
     * sends a verification email in the format {base_url}/#/change_password/{adverisers_email}/{generated_code}
     */
    forgotPassword(email) {
        return this.httpClient.get(`${_environments_environment__WEBPACK_IMPORTED_MODULE_1__["environment"].baseURL}/forgot-password-request${this.generalService.generateSearchQuery({
            email,
        })}`, { responseType: "text/xml" });
    }
    /**
     *  description: resets the users password
     */
    resetPassword(forgotObj) {
        return this.httpClient.get(`${_environments_environment__WEBPACK_IMPORTED_MODULE_1__["environment"].baseURL}/forgot-password-reset${this.generalService.generateSearchQuery(forgotObj)}`, { responseType: "text/xml" });
    }
    /**
     *  description: Verifies the users Email
     */
    verifyEmail(user) {
        return this.httpClient.get(`${_environments_environment__WEBPACK_IMPORTED_MODULE_1__["environment"].baseURL}/verify-token-request${this.generalService.generateSearchQuery(user)}`, { responseType: "text/xml" });
    }
    /**
     *  description: Verifies the users Email
     */
    verifyRegistrationEmail(user) {
        return this.httpClient.get(`${_environments_environment__WEBPACK_IMPORTED_MODULE_1__["environment"].baseURL}/email-verification${this.generalService.generateSearchQuery(user)}`, { responseType: "text/xml" });
    }
    /**
     *   Resends Verification Code to Users
     */
    resendVerification(email) {
        return this.httpClient.get(`${_environments_environment__WEBPACK_IMPORTED_MODULE_1__["environment"].baseURL}/resend-email-verification${this.generalService.generateSearchQuery({
            email,
        })}`, { responseType: "text/xml" });
    }
    /**
     * Changes the password type of the password field
     * it has just 2 states either "Hide" or "Show"
     * @param shouldShowPassword helps to know when to hide or show password
     * @param $event the triggered event
     * @param index presents the index of the input[type='password'] element in the parent
     * @returns {boolean}
     */
    changePasswordState(shouldShowPassword, event, index = 1) {
        if (!shouldShowPassword) {
            event.target.parentElement.children[index].type = "password";
            return !shouldShowPassword;
        }
        event.target.parentElement.children[index].type = "text";
        return !shouldShowPassword;
    }
    logout() {
        this.httpClient
            .get(`${_environments_environment__WEBPACK_IMPORTED_MODULE_1__["environment"].baseURL}/member-logout`, {
            responseType: "text/xml",
        })
            .subscribe();
        localStorage.removeItem("__nv2_t");
        localStorage.removeItem("__nv2_");
        localStorage.removeItem("__onboard");
    }
    saveUserLocally(user) {
        localStorage.setItem("__nv2_", JSON.stringify(user));
    }
    getUserLocally() {
        return JSON.parse(localStorage.getItem("__nv2_"));
    }
    saveUserToken(token) {
        localStorage.setItem("__nv2_t", token);
    }
    getUserToken() {
        return localStorage.getItem("__nv2_t");
    }
}
AuthService.ɵfac = function AuthService_Factory(t) { return new (t || AuthService)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵinject"](_angular_common_http__WEBPACK_IMPORTED_MODULE_3__["HttpClient"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵinject"](_general_service__WEBPACK_IMPORTED_MODULE_4__["GeneralService"])); };
AuthService.ɵprov = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineInjectable"]({ token: AuthService, factory: AuthService.ɵfac, providedIn: "root" });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](AuthService, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Injectable"],
        args: [{ providedIn: "root" }]
    }], function () { return [{ type: _angular_common_http__WEBPACK_IMPORTED_MODULE_3__["HttpClient"] }, { type: _general_service__WEBPACK_IMPORTED_MODULE_4__["GeneralService"] }]; }, null); })();


/***/ }),

/***/ "./src/app/@core/general.service.ts":
/*!******************************************!*\
  !*** ./src/app/@core/general.service.ts ***!
  \******************************************/
/*! exports provided: GeneralService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "GeneralService", function() { return GeneralService; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var rxjs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! rxjs */ "./node_modules/rxjs/_esm2015/index.js");
/* harmony import */ var xml_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! xml-js */ "./node_modules/xml-js/lib/index.js");
/* harmony import */ var xml_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(xml_js__WEBPACK_IMPORTED_MODULE_2__);




class GeneralService {
    constructor() {
        this._presentStateSource = new rxjs__WEBPACK_IMPORTED_MODULE_1__["BehaviorSubject"](false);
        this.state$ = this._presentStateSource.asObservable();
        this._contentInfoStateSource = new rxjs__WEBPACK_IMPORTED_MODULE_1__["BehaviorSubject"]({});
        this.contentInfoState$ = this._contentInfoStateSource.asObservable();
        this._contentLikedStateSource = new rxjs__WEBPACK_IMPORTED_MODULE_1__["Subject"]();
        this.contentLikedState$ = this._contentLikedStateSource.asObservable();
    }
    likeContent() {
        this._contentLikedStateSource.next(true);
    }
    showLoader(loadingState) {
        this._presentStateSource.next(loadingState);
    }
    getInnovativeContentBadgeColor(category) {
        switch (category.toLowerCase()) {
            case "itmca":
                return "bg-multimedia";
            case "irm":
                return "bg-warning";
            case "pec":
                return "bg-orange";
            case "iiet":
                return "bg-info";
            default:
                break;
        }
    }
    pingContentSource(data) {
        this._contentInfoStateSource.next(data);
    }
    /**
     * Converts an Object in a string of query parameters
     * @param model its the object or model that is transalated to query params
     */
    generateSearchQuery(model) {
        let keys;
        let searchQuery = "";
        if (model) {
            keys = Object.keys(model);
            for (let i = 0; keys.length > i; i++) {
                if (model[keys[i]] !== undefined) {
                    if (model[keys[i]] !== "") {
                        searchQuery += "&" + keys[i] + "=" + model[keys[i]];
                    }
                }
            }
        }
        return "?" + searchQuery.substring(1, searchQuery.length + 1);
    }
    /**
     * Converts a JSON object to FormData
     * @param obj this is a JSON obj that should be converted to formdata
     * @param form the formdata obj itself will be used for recursive call
     * @param namespace this is the property name of the form data
     */
    objectToFormData(obj, form, namespace) {
        const fd = form || new FormData();
        let formKey;
        for (const property in obj) {
            if (obj.hasOwnProperty(property)) {
                if (namespace) {
                    formKey = namespace + "[" + property + "]";
                }
                else {
                    formKey = property;
                }
                if (typeof obj[property] === "object" &&
                    !(obj[property] instanceof File)) {
                    this.objectToFormData(obj[property], fd, property);
                }
                else {
                    fd.append(formKey, obj[property]);
                }
            }
        }
        return fd;
    }
    convertToOneLayerViewModel(object) {
        var _a;
        for (const key in object) {
            if (object.hasOwnProperty(key)) {
                object[key] = (_a = object[key]) === null || _a === void 0 ? void 0 : _a._text;
            }
        }
        return object;
    }
    // Changes XML to JSON
    xmlToJson(xmlString) {
        if (!xmlString)
            return {};
        try {
            return JSON.parse(xmlString);
        }
        catch (_a) {
            const parser = new DOMParser();
            const obj = xml_js__WEBPACK_IMPORTED_MODULE_2__["xml2json"](xmlString, { compact: true });
            return JSON.parse(obj)["response"];
        }
        // Create the return object
        // let obj = {};
        // if (xml.nodeType == 1) { // element
        //   // do attributes
        //   if (xml.attributes.length > 0) {
        //     obj['@attributes'] = {};
        //     for (let j = 0; j < xml.attributes.length; j++) {
        //         const attribute = xml.attributes.item(j);
        //         obj['@attributes'][attribute.nodeName] = attribute.nodeValue;
        //       }
        //   }
        // } else if (xml.nodeType == 3) { // text
        //   obj = xml.nodeValue;
        // }
        // // do children
        // if (xml.hasChildNodes()) {
        //   for (let i = 0; i < xml.childNodes.length; i++) {
        //     const item = xml.childNodes.item(i);
        //     const nodeName = item.nodeName;
        //     if (typeof(obj[nodeName]) == 'undefined') {
        //       obj[nodeName] = this.xmlToJson(item);
        //     } else {
        //       if (typeof(obj[nodeName].push) == 'undefined') {
        //         const old = obj[nodeName];
        //         obj[nodeName] = [];
        //         obj[nodeName].push(old);
        //       }
        //       obj[nodeName].push(this.xmlToJson(item));
        //     }
        //   }
        // }
        // debugger;
        //  return obj;
    }
}
GeneralService.ɵfac = function GeneralService_Factory(t) { return new (t || GeneralService)(); };
GeneralService.ɵprov = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineInjectable"]({ token: GeneralService, factory: GeneralService.ɵfac, providedIn: "root" });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](GeneralService, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Injectable"],
        args: [{ providedIn: "root" }]
    }], function () { return []; }, null); })();


/***/ }),

/***/ "./src/app/@core/index.ts":
/*!********************************!*\
  !*** ./src/app/@core/index.ts ***!
  \********************************/
/*! exports provided: AuthService, GeneralService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _auth_service__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./auth.service */ "./src/app/@core/auth.service.ts");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "AuthService", function() { return _auth_service__WEBPACK_IMPORTED_MODULE_0__["AuthService"]; });

/* harmony import */ var _general_service__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./general.service */ "./src/app/@core/general.service.ts");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "GeneralService", function() { return _general_service__WEBPACK_IMPORTED_MODULE_1__["GeneralService"]; });





/***/ }),

/***/ "./src/app/@core/interceptor.service.ts":
/*!**********************************************!*\
  !*** ./src/app/@core/interceptor.service.ts ***!
  \**********************************************/
/*! exports provided: BasicAuthInterceptor, InvalidAuthInterceptor, XMLtoJSONInterceptor */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "BasicAuthInterceptor", function() { return BasicAuthInterceptor; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "InvalidAuthInterceptor", function() { return InvalidAuthInterceptor; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "XMLtoJSONInterceptor", function() { return XMLtoJSONInterceptor; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_common_http__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/common/http */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/http.js");
/* harmony import */ var rxjs_operators__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! rxjs/operators */ "./node_modules/rxjs/_esm2015/operators/index.js");
/* harmony import */ var _config__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../config */ "./src/app/config.ts");
/* harmony import */ var ___WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! . */ "./src/app/@core/index.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var ngx_toastr__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ngx-toastr */ "./node_modules/ngx-toastr/__ivy_ngcc__/fesm2015/ngx-toastr.js");
/* harmony import */ var _general_service__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./general.service */ "./src/app/@core/general.service.ts");









class BasicAuthInterceptor {
    constructor(authService) {
        this.authService = authService;
    }
    intercept(request, next) {
        // add authorization header with basic auth credentials if available
        // debugger;
        if (request.method.toLowerCase() === "get") {
            const currentUserToken = this.authService.getUserToken();
            if (currentUserToken) {
                request = request.clone({
                    url: `${request.url}${request.url.includes("?") ? "&" : "?"}token=${currentUserToken}&user_id=${this.authService.getUserLocally().user_id}`,
                });
            }
        }
        return next.handle(request);
    }
}
BasicAuthInterceptor.ɵfac = function BasicAuthInterceptor_Factory(t) { return new (t || BasicAuthInterceptor)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵinject"](___WEBPACK_IMPORTED_MODULE_4__["AuthService"])); };
BasicAuthInterceptor.ɵprov = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineInjectable"]({ token: BasicAuthInterceptor, factory: BasicAuthInterceptor.ɵfac });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](BasicAuthInterceptor, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Injectable"]
    }], function () { return [{ type: ___WEBPACK_IMPORTED_MODULE_4__["AuthService"] }]; }, null); })();
class InvalidAuthInterceptor {
    constructor(authService, router, toastr, route) {
        this.authService = authService;
        this.router = router;
        this.toastr = toastr;
        this.route = route;
        this.hasTriggered = false;
    }
    intercept(request, next) {
        return next.handle(request).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_2__["catchError"])((err, caught) => {
            if (err instanceof _angular_common_http__WEBPACK_IMPORTED_MODULE_1__["HttpErrorResponse"]) {
                if (err.status === 401) {
                    if (!this.hasTriggered) {
                        // this.dialog.closeAll();
                        this.authService.logout();
                        this.router.navigate([_config__WEBPACK_IMPORTED_MODULE_3__["appRoutes"].login]);
                        this.hasTriggered = true;
                        this.toastr.success("You are logged out");
                    }
                }
                else
                    return next.handle(request);
            }
        }));
    }
}
InvalidAuthInterceptor.ɵfac = function InvalidAuthInterceptor_Factory(t) { return new (t || InvalidAuthInterceptor)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵinject"](___WEBPACK_IMPORTED_MODULE_4__["AuthService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵinject"](_angular_router__WEBPACK_IMPORTED_MODULE_5__["Router"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵinject"](ngx_toastr__WEBPACK_IMPORTED_MODULE_6__["ToastrService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵinject"](_angular_router__WEBPACK_IMPORTED_MODULE_5__["ActivatedRoute"])); };
InvalidAuthInterceptor.ɵprov = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineInjectable"]({ token: InvalidAuthInterceptor, factory: InvalidAuthInterceptor.ɵfac });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](InvalidAuthInterceptor, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Injectable"]
    }], function () { return [{ type: ___WEBPACK_IMPORTED_MODULE_4__["AuthService"] }, { type: _angular_router__WEBPACK_IMPORTED_MODULE_5__["Router"] }, { type: ngx_toastr__WEBPACK_IMPORTED_MODULE_6__["ToastrService"] }, { type: _angular_router__WEBPACK_IMPORTED_MODULE_5__["ActivatedRoute"] }]; }, null); })();
class XMLtoJSONInterceptor {
    constructor(generalService) {
        this.generalService = generalService;
    }
    intercept(request, next) {
        return next.handle(request).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_2__["map"])((event) => {
            if (event instanceof _angular_common_http__WEBPACK_IMPORTED_MODULE_1__["HttpResponse"]) {
                event = event.clone({
                    body: this.generalService.xmlToJson(event.body),
                });
            }
            return event;
        }));
    }
}
XMLtoJSONInterceptor.ɵfac = function XMLtoJSONInterceptor_Factory(t) { return new (t || XMLtoJSONInterceptor)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵinject"](_general_service__WEBPACK_IMPORTED_MODULE_7__["GeneralService"])); };
XMLtoJSONInterceptor.ɵprov = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineInjectable"]({ token: XMLtoJSONInterceptor, factory: XMLtoJSONInterceptor.ɵfac });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](XMLtoJSONInterceptor, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Injectable"]
    }], function () { return [{ type: _general_service__WEBPACK_IMPORTED_MODULE_7__["GeneralService"] }]; }, null); })();


/***/ }),

/***/ "./src/app/@guards/auth/auth.guard.ts":
/*!********************************************!*\
  !*** ./src/app/@guards/auth/auth.guard.ts ***!
  \********************************************/
/*! exports provided: AuthGuard */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthGuard", function() { return AuthGuard; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../@core */ "./src/app/@core/index.ts");




class AuthGuard {
    constructor(router, authService) {
        this.router = router;
        this.authService = authService;
    }
    canActivate(next, state) {
        if (this.authService.getUserLocally()) {
            return true;
        }
        this.router.navigate(["auth/login"], {
            queryParams: { returnUrl: state.url },
        });
        return false;
    }
    canActivateChild(next, state) {
        if (this.authService.getUserLocally()) {
            return true;
        }
        this.router.navigate(["auth/login"], {
            queryParams: { returnUrl: state.url },
        });
        return false;
    }
}
AuthGuard.ɵfac = function AuthGuard_Factory(t) { return new (t || AuthGuard)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵinject"](_angular_router__WEBPACK_IMPORTED_MODULE_1__["Router"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵinject"](_core__WEBPACK_IMPORTED_MODULE_2__["AuthService"])); };
AuthGuard.ɵprov = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineInjectable"]({ token: AuthGuard, factory: AuthGuard.ɵfac, providedIn: "root" });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](AuthGuard, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Injectable"],
        args: [{
                providedIn: "root",
            }]
    }], function () { return [{ type: _angular_router__WEBPACK_IMPORTED_MODULE_1__["Router"] }, { type: _core__WEBPACK_IMPORTED_MODULE_2__["AuthService"] }]; }, null); })();


/***/ }),

/***/ "./src/app/app-routing.module.ts":
/*!***************************************!*\
  !*** ./src/app/app-routing.module.ts ***!
  \***************************************/
/*! exports provided: AppRoutingModule, routedGuards */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AppRoutingModule", function() { return AppRoutingModule; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "routedGuards", function() { return routedGuards; });
/* harmony import */ var _guards_auth_auth_guard__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./@guards/auth/auth.guard */ "./src/app/@guards/auth/auth.guard.ts");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");





const routes = [
    {
        path: "auth",
        loadChildren: () => Promise.all(/*! import() | auth-auth-module */[__webpack_require__.e("common"), __webpack_require__.e("auth-auth-module")]).then(__webpack_require__.bind(null, /*! ./@auth/auth.module */ "./src/app/@auth/auth.module.ts")).then((m) => m.AuthModule),
    },
    {
        path: "page",
        canActivate: [_guards_auth_auth_guard__WEBPACK_IMPORTED_MODULE_0__["AuthGuard"]],
        canActivateChild: [_guards_auth_auth_guard__WEBPACK_IMPORTED_MODULE_0__["AuthGuard"]],
        loadChildren: () => Promise.all(/*! import() | page-page-module */[__webpack_require__.e("common"), __webpack_require__.e("page-page-module")]).then(__webpack_require__.bind(null, /*! ./@page/page.module */ "./src/app/@page/page.module.ts")).then((m) => m.PageModule),
    },
    { path: "", pathMatch: "full", redirectTo: "auth" },
];
class AppRoutingModule {
}
AppRoutingModule.ɵmod = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineNgModule"]({ type: AppRoutingModule });
AppRoutingModule.ɵinj = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineInjector"]({ factory: function AppRoutingModule_Factory(t) { return new (t || AppRoutingModule)(); }, imports: [[_angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterModule"].forRoot(routes, { useHash: true })],
        _angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterModule"]] });
(function () { (typeof ngJitMode === "undefined" || ngJitMode) && _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵsetNgModuleScope"](AppRoutingModule, { imports: [_angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterModule"]], exports: [_angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterModule"]] }); })();
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵsetClassMetadata"](AppRoutingModule, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"],
        args: [{
                imports: [_angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterModule"].forRoot(routes, { useHash: true })],
                exports: [_angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterModule"]],
            }]
    }], null, null); })();
const routedGuards = [_guards_auth_auth_guard__WEBPACK_IMPORTED_MODULE_0__["AuthGuard"]];


/***/ }),

/***/ "./src/app/app.component.ts":
/*!**********************************!*\
  !*** ./src/app/app.component.ts ***!
  \**********************************/
/*! exports provided: AppComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AppComponent", function() { return AppComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");



class AppComponent {
    constructor() {
        this.title = 'nigenius-v2';
    }
}
AppComponent.ɵfac = function AppComponent_Factory(t) { return new (t || AppComponent)(); };
AppComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineComponent"]({ type: AppComponent, selectors: [["app-root"]], decls: 1, vars: 0, template: function AppComponent_Template(rf, ctx) { if (rf & 1) {
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](0, "router-outlet");
    } }, directives: [_angular_router__WEBPACK_IMPORTED_MODULE_1__["RouterOutlet"]], styles: ["\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL2FwcC5jb21wb25lbnQuc2NzcyJ9 */"] });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](AppComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"],
        args: [{
                selector: 'app-root',
                templateUrl: './app.component.html',
                styleUrls: ['./app.component.scss']
            }]
    }], null, null); })();


/***/ }),

/***/ "./src/app/app.module.ts":
/*!*******************************!*\
  !*** ./src/app/app.module.ts ***!
  \*******************************/
/*! exports provided: AppModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AppModule", function() { return AppModule; });
/* harmony import */ var _angular_platform_browser__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/platform-browser */ "./node_modules/@angular/platform-browser/__ivy_ngcc__/fesm2015/platform-browser.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _app_routing_module__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./app-routing.module */ "./src/app/app-routing.module.ts");
/* harmony import */ var _app_component__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./app.component */ "./src/app/app.component.ts");
/* harmony import */ var _angular_common_http__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/common/http */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/http.js");
/* harmony import */ var _angular_platform_browser_animations__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/platform-browser/animations */ "./node_modules/@angular/platform-browser/__ivy_ngcc__/fesm2015/animations.js");
/* harmony import */ var ngx_toastr__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ngx-toastr */ "./node_modules/ngx-toastr/__ivy_ngcc__/fesm2015/ngx-toastr.js");
/* harmony import */ var _core_interceptor_service__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./@core/interceptor.service */ "./src/app/@core/interceptor.service.ts");
/* harmony import */ var _angular_material_radio__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @angular/material/radio */ "./node_modules/@angular/material/__ivy_ngcc__/fesm2015/radio.js");
/* harmony import */ var ngx_joyride__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ngx-joyride */ "./node_modules/ngx-joyride/__ivy_ngcc__/fesm2015/ngx-joyride.js");













class AppModule {
}
AppModule.ɵmod = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineNgModule"]({ type: AppModule, bootstrap: [_app_component__WEBPACK_IMPORTED_MODULE_3__["AppComponent"]] });
AppModule.ɵinj = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineInjector"]({ factory: function AppModule_Factory(t) { return new (t || AppModule)(); }, providers: [
        { provide: _angular_common_http__WEBPACK_IMPORTED_MODULE_4__["HTTP_INTERCEPTORS"], useClass: _core_interceptor_service__WEBPACK_IMPORTED_MODULE_7__["XMLtoJSONInterceptor"], multi: true },
        { provide: _angular_common_http__WEBPACK_IMPORTED_MODULE_4__["HTTP_INTERCEPTORS"], useClass: _core_interceptor_service__WEBPACK_IMPORTED_MODULE_7__["BasicAuthInterceptor"], multi: true },
        {
            provide: _angular_common_http__WEBPACK_IMPORTED_MODULE_4__["HTTP_INTERCEPTORS"],
            useClass: _core_interceptor_service__WEBPACK_IMPORTED_MODULE_7__["InvalidAuthInterceptor"],
            multi: true,
        },
        ..._app_routing_module__WEBPACK_IMPORTED_MODULE_2__["routedGuards"],
    ], imports: [[
            _angular_platform_browser__WEBPACK_IMPORTED_MODULE_0__["BrowserModule"],
            _angular_platform_browser_animations__WEBPACK_IMPORTED_MODULE_5__["BrowserAnimationsModule"],
            _app_routing_module__WEBPACK_IMPORTED_MODULE_2__["AppRoutingModule"],
            _angular_common_http__WEBPACK_IMPORTED_MODULE_4__["HttpClientModule"],
            _angular_material_radio__WEBPACK_IMPORTED_MODULE_8__["MatRadioModule"],
            ngx_toastr__WEBPACK_IMPORTED_MODULE_6__["ToastrModule"].forRoot(),
            ngx_joyride__WEBPACK_IMPORTED_MODULE_9__["JoyrideModule"].forRoot(),
        ]] });
(function () { (typeof ngJitMode === "undefined" || ngJitMode) && _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵsetNgModuleScope"](AppModule, { declarations: [_app_component__WEBPACK_IMPORTED_MODULE_3__["AppComponent"]], imports: [_angular_platform_browser__WEBPACK_IMPORTED_MODULE_0__["BrowserModule"],
        _angular_platform_browser_animations__WEBPACK_IMPORTED_MODULE_5__["BrowserAnimationsModule"],
        _app_routing_module__WEBPACK_IMPORTED_MODULE_2__["AppRoutingModule"],
        _angular_common_http__WEBPACK_IMPORTED_MODULE_4__["HttpClientModule"],
        _angular_material_radio__WEBPACK_IMPORTED_MODULE_8__["MatRadioModule"], ngx_toastr__WEBPACK_IMPORTED_MODULE_6__["ToastrModule"], ngx_joyride__WEBPACK_IMPORTED_MODULE_9__["JoyrideModule"]] }); })();
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵsetClassMetadata"](AppModule, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"],
        args: [{
                declarations: [_app_component__WEBPACK_IMPORTED_MODULE_3__["AppComponent"]],
                imports: [
                    _angular_platform_browser__WEBPACK_IMPORTED_MODULE_0__["BrowserModule"],
                    _angular_platform_browser_animations__WEBPACK_IMPORTED_MODULE_5__["BrowserAnimationsModule"],
                    _app_routing_module__WEBPACK_IMPORTED_MODULE_2__["AppRoutingModule"],
                    _angular_common_http__WEBPACK_IMPORTED_MODULE_4__["HttpClientModule"],
                    _angular_material_radio__WEBPACK_IMPORTED_MODULE_8__["MatRadioModule"],
                    ngx_toastr__WEBPACK_IMPORTED_MODULE_6__["ToastrModule"].forRoot(),
                    ngx_joyride__WEBPACK_IMPORTED_MODULE_9__["JoyrideModule"].forRoot(),
                ],
                providers: [
                    { provide: _angular_common_http__WEBPACK_IMPORTED_MODULE_4__["HTTP_INTERCEPTORS"], useClass: _core_interceptor_service__WEBPACK_IMPORTED_MODULE_7__["XMLtoJSONInterceptor"], multi: true },
                    { provide: _angular_common_http__WEBPACK_IMPORTED_MODULE_4__["HTTP_INTERCEPTORS"], useClass: _core_interceptor_service__WEBPACK_IMPORTED_MODULE_7__["BasicAuthInterceptor"], multi: true },
                    {
                        provide: _angular_common_http__WEBPACK_IMPORTED_MODULE_4__["HTTP_INTERCEPTORS"],
                        useClass: _core_interceptor_service__WEBPACK_IMPORTED_MODULE_7__["InvalidAuthInterceptor"],
                        multi: true,
                    },
                    ..._app_routing_module__WEBPACK_IMPORTED_MODULE_2__["routedGuards"],
                ],
                bootstrap: [_app_component__WEBPACK_IMPORTED_MODULE_3__["AppComponent"]],
            }]
    }], null, null); })();


/***/ }),

/***/ "./src/app/config.ts":
/*!***************************!*\
  !*** ./src/app/config.ts ***!
  \***************************/
/*! exports provided: appRoutes */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "appRoutes", function() { return appRoutes; });
const appRoutes = {
    register: "/auth/register",
    login: "/auth/login",
    forgot: "/auth/forgot-password",
    reset: "/auth/reset",
    completeProfile: "/page/complete-profile",
    personalizedContent: "/page/personalized-contents",
    dashboard: "/page/s/dashboard",
    searchPage: "/page/s/search-result",
    viewPlan: "/page/s/search",
    subscription: "/page/subscription",
    viewPackages: "/page/subscription/packages",
    savedItems: "/page/saved-items",
    singleSubscription: "/page/subscription/package",
    viewUserSubscription: "/page/subscription/subscription-details",
    settings: "/page/settings",
};


/***/ }),

/***/ "./src/environments/environment.ts":
/*!*****************************************!*\
  !*** ./src/environments/environment.ts ***!
  \*****************************************/
/*! exports provided: environment */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "environment", function() { return environment; });
// This file can be replaced during build by using the `fileReplacements` array.
// `ng build --prod` replaces `environment.ts` with `environment.prod.ts`.
// The list of file replacements can be found in `angular.jso`.
const environment = {
    production: false,
    baseURL: "http://eritlpta.test:8080/apiapp/index.php/api/v2",
    countries: [
        "Abia",
        "Adamawa",
        "Akwa Ibom",
        "Anambra",
        "Bauchi",
        "Bayelsa",
        "Benue",
        "Borno",
        "Cross River",
        "Delta",
        "Ebonyi",
        "Edo",
        "Ekiti",
        "Enugu",
        "FCT - Abuja",
        "Gombe",
        "Imo",
        "Jigawa",
        "Kaduna",
        "Kano",
        "Katsina",
        "Kebbi",
        "Kogi",
        "Kwara",
        "Lagos",
        "Nasarawa",
        "Niger",
        "Ogun",
        "Ondo",
        "Osun",
        "Oyo",
        "Plateau",
        "Rivers",
        "Sokoto",
        "Taraba",
        "Yobe",
        "Zamfara",
    ],
    categoryTypes: {
        "lesson plan": "Lesson Plan",
        "Lesson plan": "Lesson Plan",
        "Lesson Plan": "Lesson Plan",
        ITMCA: "Multimedia",
        itmca: "Multimedia",
        irm: "Innovative Topics",
        IRM: "Innovative Topics",
        PEC: "Projects",
        pec: "Projects",
        iiet: "Innovative Teaching",
        IIET: "Innovative Teaching",
    },
    paystackPubKey: "pk_test_d4a4a864d1a8589c39edc2d90917224868bd763a",
};
/*
 * For easier debugging in development mode, you can import the following file
 * to ignore zone related error stack frames such as `zone.run`, `zoneDelegate.invokeTask`.
 *
 * This import should be commented out in production mode because it will have a negative impact
 * on performance if an error is thrown.
 */
// import 'zone.js/dist/zone-error';  // Included with Angular CLI.


/***/ }),

/***/ "./src/main.ts":
/*!*********************!*\
  !*** ./src/main.ts ***!
  \*********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var hammerjs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! hammerjs */ "./node_modules/hammerjs/hammer.js");
/* harmony import */ var hammerjs__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(hammerjs__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _environments_environment__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./environments/environment */ "./src/environments/environment.ts");
/* harmony import */ var _app_app_module__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./app/app.module */ "./src/app/app.module.ts");
/* harmony import */ var _angular_platform_browser__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/platform-browser */ "./node_modules/@angular/platform-browser/__ivy_ngcc__/fesm2015/platform-browser.js");





if (_environments_environment__WEBPACK_IMPORTED_MODULE_2__["environment"].production) {
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["enableProdMode"])();
}
document.addEventListener("DOMContentLoaded", () => {
    _angular_platform_browser__WEBPACK_IMPORTED_MODULE_4__["platformBrowser"]().bootstrapModule(_app_app_module__WEBPACK_IMPORTED_MODULE_3__["AppModule"])
        .catch((err) => console.log(err));
});


/***/ }),

/***/ 0:
/*!***************************!*\
  !*** multi ./src/main.ts ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\eritapp\src\main.ts */"./src/main.ts");


/***/ })

},[[0,"runtime","vendor"]]]);
//# sourceMappingURL=main-es2015.js.map