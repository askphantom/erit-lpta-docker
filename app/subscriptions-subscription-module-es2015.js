(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["subscriptions-subscription-module"],{

/***/ "./src/app/@page/subscriptions/subscription-page/subscription.component.ts":
/*!*********************************************************************************!*\
  !*** ./src/app/@page/subscriptions/subscription-page/subscription.component.ts ***!
  \*********************************************************************************/
/*! exports provided: SubscriptionComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SubscriptionComponent", function() { return SubscriptionComponent; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var src_app_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! src/app/@core */ "./src/app/@core/index.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");




const _c0 = function () { return ["notification"]; };
class SubscriptionComponent {
    constructor(authService, generalService) {
        this.authService = authService;
        this.generalService = generalService;
    }
    ngOnInit() {
        this.getUserInfo();
    }
    getUserInfo() {
        this.user = this.authService.getUserLocally();
    }
}
SubscriptionComponent.ɵfac = function SubscriptionComponent_Factory(t) { return new (t || SubscriptionComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](src_app_core__WEBPACK_IMPORTED_MODULE_1__["AuthService"]), _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdirectiveInject"](src_app_core__WEBPACK_IMPORTED_MODULE_1__["GeneralService"])); };
SubscriptionComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵdefineComponent"]({ type: SubscriptionComponent, selectors: [["app-subscription"]], decls: 14, vars: 4, consts: [[1, "flex", "fill-available-w", "bg-grey"], [1, "fill-available-w", "pb-3"], [1, "d-flex", "justify-content-between", "pull-down", "align-box", "bg-grey"], [1, "flex", "pt-2", "pb-2"], [1, "text-black", "mb-0"], [1, "font-weight-light"], [1, "float-right", "side-box", "flex", "text-gray"], [1, "circle"], [1, "icon", "bordered-box", 3, "routerLink"], [1, "badge", "shift-left", "badge-danger", "position-absolute", "rounded-circle", "pulsating-circle"], [1, "px-4", "position-relative"]], template: function SubscriptionComponent_Template(rf, ctx) { if (rf & 1) {
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](0, "section", 0);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](1, "section", 1);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](2, "header", 2);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](3, "div", 3);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](4, "h2", 4);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](5, "Subscription");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](6, "h6", 5);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtext"](7);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](8, "div", 6);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](9, "div", 7);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](10, "a", 8);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](11, "span", 9);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementStart"](12, "div", 10);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelement"](13, "router-outlet");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵelementEnd"]();
    } if (rf & 2) {
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](7);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵtextInterpolate2"](" ", ctx.user == null ? null : ctx.user.first_name, " ", ctx.user == null ? null : ctx.user.surname, " ");
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵadvance"](3);
        _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵproperty"]("routerLink", _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵɵpureFunction0"](3, _c0));
    } }, directives: [_angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterLinkWithHref"], _angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterOutlet"]], styles: ["img[_ngcontent-%COMP%] {\n  width: 90px;\n  height: 78px;\n}\n\nvg-menu[_ngcontent-%COMP%] {\n  width: 230px;\n}\n\napp-vg-mobile-menu[_ngcontent-%COMP%] {\n  max-height: 60px;\n  min-width: 100vw;\n}\n\n.bg-grey[_ngcontent-%COMP%] {\n  background-color: #eef2f8;\n}\n\n.align-box[_ngcontent-%COMP%] {\n  padding: 0 2vw;\n  position: relative;\n}\n\n.circle[_ngcontent-%COMP%] {\n  width: 60px;\n  height: 60px;\n  background-color: whitesmoke;\n  border-radius: 50%;\n  background-color: whitesmoke;\n  border: thick solid #fff;\n}\n\n.pull-down[_ngcontent-%COMP%] {\n  margin-top: 30px;\n}\n\nheader[_ngcontent-%COMP%] {\n  height: 65px;\n  margin-bottom: 30px;\n}\n\n.dropdown[_ngcontent-%COMP%] {\n  position: absolute;\n  padding: 20px;\n  top: 80%;\n  background: #fdfdfc;\n  border: thin solid #e5e5e5;\n  visibility: hidden;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQHBhZ2UvcGFnZS9DOlxcbGFyYWdvblxcd3d3XFxlcml0YXBwL3NyY1xcYXBwXFxAcGFnZVxccGFnZVxccGFnZS5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQHBhZ2UvcGFnZS9wYWdlLmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBQ0UsV0FBQTtFQUNBLFlBQUE7QUNDRjs7QURFQTtFQUNFLFlBQUE7QUNDRjs7QURFQTtFQUNFLGdCQUFBO0VBQ0EsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLHlCQUFBO0FDQ0Y7O0FERUE7RUFDRSxjQUFBO0VBQ0Esa0JBQUE7QUNDRjs7QURFQTtFQUNFLFdBQUE7RUFDQSxZQUFBO0VBQ0EsNEJBQUE7RUFDQSxrQkFBQTtFQUNBLDRCQUFBO0VBQ0Esd0JBQUE7QUNDRjs7QURFQTtFQUNFLGdCQUFBO0FDQ0Y7O0FERUE7RUFDRSxZQUFBO0VBQ0EsbUJBQUE7QUNDRjs7QURFQTtFQUNFLGtCQUFBO0VBQ0EsYUFBQTtFQUNBLFFBQUE7RUFDQSxtQkFBQTtFQUNBLDBCQUFBO0VBQ0Esa0JBQUE7QUNDRiIsImZpbGUiOiJzcmMvYXBwL0BwYWdlL3BhZ2UvcGFnZS5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbImltZyB7XHJcbiAgd2lkdGg6IDkwcHg7XHJcbiAgaGVpZ2h0OiA3OHB4O1xyXG59XHJcblxyXG52Zy1tZW51IHtcclxuICB3aWR0aDogMjMwcHg7XHJcbn1cclxuXHJcbmFwcC12Zy1tb2JpbGUtbWVudSB7XHJcbiAgbWF4LWhlaWdodDogNjBweDtcclxuICBtaW4td2lkdGg6IDEwMHZ3O1xyXG59XHJcblxyXG4uYmctZ3JleSB7XHJcbiAgYmFja2dyb3VuZC1jb2xvcjogI2VlZjJmODtcclxufVxyXG5cclxuLmFsaWduLWJveCB7XHJcbiAgcGFkZGluZzogMCAydnc7XHJcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xyXG59XHJcblxyXG4uY2lyY2xlIHtcclxuICB3aWR0aDogNjBweDtcclxuICBoZWlnaHQ6IDYwcHg7XHJcbiAgYmFja2dyb3VuZC1jb2xvcjogd2hpdGVzbW9rZTtcclxuICBib3JkZXItcmFkaXVzOiA1MCU7XHJcbiAgYmFja2dyb3VuZC1jb2xvcjogd2hpdGVzbW9rZTtcclxuICBib3JkZXI6IHRoaWNrIHNvbGlkICNmZmY7XHJcbn1cclxuXHJcbi5wdWxsLWRvd24ge1xyXG4gIG1hcmdpbi10b3A6IDMwcHg7XHJcbn1cclxuXHJcbmhlYWRlciB7XHJcbiAgaGVpZ2h0OiA2NXB4O1xyXG4gIG1hcmdpbi1ib3R0b206IDMwcHg7XHJcbn1cclxuXHJcbi5kcm9wZG93biB7XHJcbiAgcG9zaXRpb246IGFic29sdXRlO1xyXG4gIHBhZGRpbmc6IDIwcHg7XHJcbiAgdG9wOiA4MCU7XHJcbiAgYmFja2dyb3VuZDogI2ZkZmRmYztcclxuICBib3JkZXI6IHRoaW4gc29saWQgI2U1ZTVlNTtcclxuICB2aXNpYmlsaXR5OiBoaWRkZW47XHJcbn1cclxuIiwiaW1nIHtcbiAgd2lkdGg6IDkwcHg7XG4gIGhlaWdodDogNzhweDtcbn1cblxudmctbWVudSB7XG4gIHdpZHRoOiAyMzBweDtcbn1cblxuYXBwLXZnLW1vYmlsZS1tZW51IHtcbiAgbWF4LWhlaWdodDogNjBweDtcbiAgbWluLXdpZHRoOiAxMDB2dztcbn1cblxuLmJnLWdyZXkge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZWVmMmY4O1xufVxuXG4uYWxpZ24tYm94IHtcbiAgcGFkZGluZzogMCAydnc7XG4gIHBvc2l0aW9uOiByZWxhdGl2ZTtcbn1cblxuLmNpcmNsZSB7XG4gIHdpZHRoOiA2MHB4O1xuICBoZWlnaHQ6IDYwcHg7XG4gIGJhY2tncm91bmQtY29sb3I6IHdoaXRlc21va2U7XG4gIGJvcmRlci1yYWRpdXM6IDUwJTtcbiAgYmFja2dyb3VuZC1jb2xvcjogd2hpdGVzbW9rZTtcbiAgYm9yZGVyOiB0aGljayBzb2xpZCAjZmZmO1xufVxuXG4ucHVsbC1kb3duIHtcbiAgbWFyZ2luLXRvcDogMzBweDtcbn1cblxuaGVhZGVyIHtcbiAgaGVpZ2h0OiA2NXB4O1xuICBtYXJnaW4tYm90dG9tOiAzMHB4O1xufVxuXG4uZHJvcGRvd24ge1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIHBhZGRpbmc6IDIwcHg7XG4gIHRvcDogODAlO1xuICBiYWNrZ3JvdW5kOiAjZmRmZGZjO1xuICBib3JkZXI6IHRoaW4gc29saWQgI2U1ZTVlNTtcbiAgdmlzaWJpbGl0eTogaGlkZGVuO1xufSJdfQ== */", ".card-white[_ngcontent-%COMP%] {\n  background-color: #ffffff;\n  border-radius: 8px;\n  min-height: 400px;\n}\n\nsection[_ngcontent-%COMP%] {\n  max-width: 100vw;\n  overflow-x: hidden;\n}\n\n.position-relative[_ngcontent-%COMP%] {\n  min-height: calc(100vh - 70px);\n}\n\n.card-body[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n  margin: 10px 15px;\n}\n\n.btn-outline-secondary[_ngcontent-%COMP%] {\n  min-width: 100px;\n}\n\n.sub-info[_ngcontent-%COMP%] {\n  background-color: #e3f9ee;\n  border-radius: 8px;\n  height: 60px;\n}\n\n.deep-green[_ngcontent-%COMP%] {\n  color: #585858;\n}\n\n.btn-renew[_ngcontent-%COMP%] {\n  width: 120px;\n}\n\n.sub-box[_ngcontent-%COMP%] {\n  border-radius: 8px;\n  max-width: 220px;\n  min-height: 250px;\n  margin-bottom: 10px;\n  margin-right: 10px;\n}\n\n.sub-box[_ngcontent-%COMP%]   ul[_ngcontent-%COMP%] {\n  padding-left: 15px;\n  margin-top: 30px;\n  margin-bottom: 30px;\n  width: 80%;\n  min-width: 150px;\n}\n\n.sub-box[_ngcontent-%COMP%]   ul[_ngcontent-%COMP%]   li[_ngcontent-%COMP%] {\n  margin-top: 7px;\n}\n\n.sub-box.single[_ngcontent-%COMP%] {\n  background: transparent linear-gradient(213deg, #d92f83 0%, #7e003e 100%) 0% 0% no-repeat padding-box;\n}\n\n.sub-box.single[_ngcontent-%COMP%]   button.btn[_ngcontent-%COMP%] {\n  color: #d92f83;\n}\n\n.sub-box.multi-silver[_ngcontent-%COMP%] {\n  background: transparent linear-gradient(211deg, #c7ccd2 0%, #a5a8ab 52%, #717171 100%) 0% 0% no-repeat padding-box;\n}\n\n.sub-box.multi-silver[_ngcontent-%COMP%]   button.btn[_ngcontent-%COMP%] {\n  color: #8d8d8d;\n}\n\n.sub-box.multi-gold[_ngcontent-%COMP%] {\n  background: transparent linear-gradient(217deg, #f3ae18 0%, #a26f00 100%) 0% 0% no-repeat padding-box;\n}\n\n.sub-box.multi-gold[_ngcontent-%COMP%]   button.btn[_ngcontent-%COMP%] {\n  color: #f3ae18;\n}\n\n.sub-box.multi-platinum[_ngcontent-%COMP%] {\n  background: transparent linear-gradient(217deg, #cfd8e9 0%, #0c2033 100%) 0% 0% no-repeat padding-box;\n}\n\n.sub-box.multi-platinum[_ngcontent-%COMP%]   button.btn[_ngcontent-%COMP%] {\n  color: #4a5b6d;\n}\n\n.sub-box[_ngcontent-%COMP%]   svg[_ngcontent-%COMP%] {\n  fill: white;\n}\n\n.sub-box[_ngcontent-%COMP%]   hr[_ngcontent-%COMP%] {\n  width: 60px;\n  background-color: white;\n  height: 3px;\n  margin-left: 0px;\n}\n\n@media (max-width: 420px) {\n  .sub-box[_ngcontent-%COMP%] {\n    margin-bottom: 10px;\n  }\n  .sub-box[_ngcontent-%COMP%]   ul[_ngcontent-%COMP%] {\n    margin-top: auto;\n    margin-bottom: 10px;\n  }\n}\n\n@media (max-width: 768px) {\n  .sub-info[_ngcontent-%COMP%] {\n    height: 100px;\n  }\n\n  .card-body[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    margin: 5px;\n  }\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQHBhZ2Uvc3Vic2NyaXB0aW9ucy9zdWJzY3JpcHRpb24tcGFnZS9DOlxcbGFyYWdvblxcd3d3XFxlcml0YXBwL3NyY1xcYXBwXFxAcGFnZVxcc3Vic2NyaXB0aW9uc1xcc3Vic2NyaXB0aW9uLXBhZ2VcXHN1YnNjcmlwdGlvbi5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQHBhZ2Uvc3Vic2NyaXB0aW9ucy9zdWJzY3JpcHRpb24tcGFnZS9zdWJzY3JpcHRpb24uY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFDRSx5QkFBQTtFQUNBLGtCQUFBO0VBQ0EsaUJBQUE7QUNDRjs7QURFQTtFQUNFLGdCQUFBO0VBQ0Esa0JBQUE7QUNDRjs7QURFQTtFQUNFLDhCQUFBO0FDQ0Y7O0FER0U7RUFDRSxpQkFBQTtBQ0FKOztBRElBO0VBQ0UsZ0JBQUE7QUNERjs7QURJQTtFQUNFLHlCQUFBO0VBQ0Esa0JBQUE7RUFDQSxZQUFBO0FDREY7O0FESUE7RUFDRSxjQUFBO0FDREY7O0FESUE7RUFDRSxZQUFBO0FDREY7O0FESUE7RUFDRSxrQkFBQTtFQUNBLGdCQUFBO0VBQ0EsaUJBQUE7RUFDQSxtQkFBQTtFQUNBLGtCQUFBO0FDREY7O0FER0U7RUFDRSxrQkFBQTtFQUNBLGdCQUFBO0VBQ0EsbUJBQUE7RUFDQSxVQUFBO0VBQ0EsZ0JBQUE7QUNESjs7QURFSTtFQUNFLGVBQUE7QUNBTjs7QURHRTtFQUNFLHFHQUFBO0FDREo7O0FEU0k7RUFDRSxjQUFBO0FDUE47O0FEVUU7RUFDRSxrSEFBQTtBQ1JKOztBRGdCSTtFQUNFLGNBQUE7QUNkTjs7QURpQkU7RUFDRSxxR0FBQTtBQ2ZKOztBRHNCSTtFQUNFLGNBQUE7QUNwQk47O0FEdUJFO0VBQ0UscUdBQUE7QUNyQko7O0FENkJJO0VBQ0UsY0FBQTtBQzNCTjs7QUQrQkU7RUFDRSxXQUFBO0FDN0JKOztBRGdDRTtFQUNFLFdBQUE7RUFDQSx1QkFBQTtFQUNBLFdBQUE7RUFDQSxnQkFBQTtBQzlCSjs7QURrQ0E7RUFDRTtJQUNFLG1CQUFBO0VDL0JGO0VEZ0NFO0lBQ0UsZ0JBQUE7SUFDQSxtQkFBQTtFQzlCSjtBQUNGOztBRGtDQTtFQUNFO0lBQ0UsYUFBQTtFQ2hDRjs7RURvQ0U7SUFDRSxXQUFBO0VDakNKO0FBQ0YiLCJmaWxlIjoic3JjL2FwcC9AcGFnZS9zdWJzY3JpcHRpb25zL3N1YnNjcmlwdGlvbi1wYWdlL3N1YnNjcmlwdGlvbi5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5jYXJkLXdoaXRlIHtcclxuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmO1xyXG4gIGJvcmRlci1yYWRpdXM6IDhweDtcclxuICBtaW4taGVpZ2h0OiA0MDBweDtcclxufVxyXG5cclxuc2VjdGlvbiB7XHJcbiAgbWF4LXdpZHRoOiAxMDB2dztcclxuICBvdmVyZmxvdy14OiBoaWRkZW47XHJcbn1cclxuXHJcbi5wb3NpdGlvbi1yZWxhdGl2ZSB7XHJcbiAgbWluLWhlaWdodDogY2FsYygxMDB2aCAtIDcwcHgpO1xyXG59XHJcblxyXG4uY2FyZC1ib2R5IHtcclxuICA+IGRpdiB7XHJcbiAgICBtYXJnaW46IDEwcHggMTVweDtcclxuICB9XHJcbn1cclxuXHJcbi5idG4tb3V0bGluZS1zZWNvbmRhcnkge1xyXG4gIG1pbi13aWR0aDogMTAwcHg7XHJcbn1cclxuXHJcbi5zdWItaW5mbyB7XHJcbiAgYmFja2dyb3VuZC1jb2xvcjogI2UzZjllZTtcclxuICBib3JkZXItcmFkaXVzOiA4cHg7XHJcbiAgaGVpZ2h0OiA2MHB4O1xyXG59XHJcblxyXG4uZGVlcC1ncmVlbiB7XHJcbiAgY29sb3I6ICM1ODU4NTg7XHJcbn1cclxuXHJcbi5idG4tcmVuZXcge1xyXG4gIHdpZHRoOiAxMjBweDtcclxufVxyXG5cclxuLnN1Yi1ib3gge1xyXG4gIGJvcmRlci1yYWRpdXM6IDhweDtcclxuICBtYXgtd2lkdGg6IDIyMHB4O1xyXG4gIG1pbi1oZWlnaHQ6IDI1MHB4O1xyXG4gIG1hcmdpbi1ib3R0b206IDEwcHg7XHJcbiAgbWFyZ2luLXJpZ2h0OiAxMHB4O1xyXG5cclxuICB1bCB7XHJcbiAgICBwYWRkaW5nLWxlZnQ6IDE1cHg7XHJcbiAgICBtYXJnaW4tdG9wOiAzMHB4O1xyXG4gICAgbWFyZ2luLWJvdHRvbTogMzBweDtcclxuICAgIHdpZHRoOiA4MCU7XHJcbiAgICBtaW4td2lkdGg6IDE1MHB4O1xyXG4gICAgbGkge1xyXG4gICAgICBtYXJnaW4tdG9wOiA3cHg7XHJcbiAgICB9XHJcbiAgfVxyXG4gICYuc2luZ2xlIHtcclxuICAgIGJhY2tncm91bmQ6IHRyYW5zcGFyZW50XHJcbiAgICAgIGxpbmVhci1ncmFkaWVudChcclxuICAgICAgICAyMTNkZWcsXHJcbiAgICAgICAgcmdiYSgyMTcsIDQ3LCAxMzEsIDEpIDAlLFxyXG4gICAgICAgIHJnYmEoMTI2LCAwLCA2MiwgMSkgMTAwJVxyXG4gICAgICApXHJcbiAgICAgIDAlIDAlIG5vLXJlcGVhdCBwYWRkaW5nLWJveDtcclxuXHJcbiAgICBidXR0b24uYnRuIHtcclxuICAgICAgY29sb3I6IHJnYmEoMjE3LCA0NywgMTMxLCAxKTtcclxuICAgIH1cclxuICB9XHJcbiAgJi5tdWx0aS1zaWx2ZXIge1xyXG4gICAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnRcclxuICAgICAgbGluZWFyLWdyYWRpZW50KFxyXG4gICAgICAgIDIxMWRlZyxcclxuICAgICAgICByZ2JhKDE5OSwgMjA0LCAyMTAsIDEpIDAlLFxyXG4gICAgICAgIHJnYmEoMTY1LCAxNjgsIDE3MSwgMSkgNTIlLFxyXG4gICAgICAgIHJnYmEoMTEzLCAxMTMsIDExMywgMSkgMTAwJVxyXG4gICAgICApXHJcbiAgICAgIDAlIDAlIG5vLXJlcGVhdCBwYWRkaW5nLWJveDtcclxuICAgIGJ1dHRvbi5idG4ge1xyXG4gICAgICBjb2xvcjogcmdiYSgxNDEsIDE0MSwgMTQxLCAxKTtcclxuICAgIH1cclxuICB9XHJcbiAgJi5tdWx0aS1nb2xkIHtcclxuICAgIGJhY2tncm91bmQ6IHRyYW5zcGFyZW50XHJcbiAgICAgIGxpbmVhci1ncmFkaWVudChcclxuICAgICAgICAyMTdkZWcsXHJcbiAgICAgICAgcmdiYSgyNDMsIDE3NCwgMjQsIDEpIDAlLFxyXG4gICAgICAgIHJnYmEoMTYyLCAxMTEsIDAsIDEpIDEwMCVcclxuICAgICAgKVxyXG4gICAgICAwJSAwJSBuby1yZXBlYXQgcGFkZGluZy1ib3g7XHJcbiAgICBidXR0b24uYnRuIHtcclxuICAgICAgY29sb3I6IHJnYmEoMjQzLCAxNzQsIDI0LCAxKTtcclxuICAgIH1cclxuICB9XHJcbiAgJi5tdWx0aS1wbGF0aW51bSB7XHJcbiAgICBiYWNrZ3JvdW5kOiB0cmFuc3BhcmVudFxyXG4gICAgICBsaW5lYXItZ3JhZGllbnQoXHJcbiAgICAgICAgMjE3ZGVnLFxyXG4gICAgICAgIHJnYmEoMjA3LCAyMTYsIDIzMywgMSkgMCUsXHJcbiAgICAgICAgcmdiYSgxMiwgMzIsIDUxLCAxKSAxMDAlXHJcbiAgICAgIClcclxuICAgICAgMCUgMCUgbm8tcmVwZWF0IHBhZGRpbmctYm94O1xyXG5cclxuICAgIGJ1dHRvbi5idG4ge1xyXG4gICAgICBjb2xvcjogcmdiYSg3NCwgOTEsIDEwOSwgMSk7XHJcbiAgICB9XHJcbiAgfVxyXG5cclxuICBzdmcge1xyXG4gICAgZmlsbDogd2hpdGU7XHJcbiAgfVxyXG5cclxuICBociB7XHJcbiAgICB3aWR0aDogNjBweDtcclxuICAgIGJhY2tncm91bmQtY29sb3I6IHdoaXRlO1xyXG4gICAgaGVpZ2h0OiAzcHg7XHJcbiAgICBtYXJnaW4tbGVmdDogMHB4O1xyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDQyMHB4KSB7XHJcbiAgLnN1Yi1ib3gge1xyXG4gICAgbWFyZ2luLWJvdHRvbTogMTBweDtcclxuICAgIHVsIHtcclxuICAgICAgbWFyZ2luLXRvcDogYXV0bztcclxuICAgICAgbWFyZ2luLWJvdHRvbTogMTBweDtcclxuICAgIH1cclxuICB9XHJcbn1cclxuXHJcbkBtZWRpYSAobWF4LXdpZHRoOiA3NjhweCkge1xyXG4gIC5zdWItaW5mbyB7XHJcbiAgICBoZWlnaHQ6IDEwMHB4O1xyXG4gIH1cclxuXHJcbiAgLmNhcmQtYm9keSB7XHJcbiAgICA+IGRpdiB7XHJcbiAgICAgIG1hcmdpbjogNXB4O1xyXG4gICAgfVxyXG4gIH1cclxufVxyXG4iLCIuY2FyZC13aGl0ZSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7XG4gIGJvcmRlci1yYWRpdXM6IDhweDtcbiAgbWluLWhlaWdodDogNDAwcHg7XG59XG5cbnNlY3Rpb24ge1xuICBtYXgtd2lkdGg6IDEwMHZ3O1xuICBvdmVyZmxvdy14OiBoaWRkZW47XG59XG5cbi5wb3NpdGlvbi1yZWxhdGl2ZSB7XG4gIG1pbi1oZWlnaHQ6IGNhbGMoMTAwdmggLSA3MHB4KTtcbn1cblxuLmNhcmQtYm9keSA+IGRpdiB7XG4gIG1hcmdpbjogMTBweCAxNXB4O1xufVxuXG4uYnRuLW91dGxpbmUtc2Vjb25kYXJ5IHtcbiAgbWluLXdpZHRoOiAxMDBweDtcbn1cblxuLnN1Yi1pbmZvIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2UzZjllZTtcbiAgYm9yZGVyLXJhZGl1czogOHB4O1xuICBoZWlnaHQ6IDYwcHg7XG59XG5cbi5kZWVwLWdyZWVuIHtcbiAgY29sb3I6ICM1ODU4NTg7XG59XG5cbi5idG4tcmVuZXcge1xuICB3aWR0aDogMTIwcHg7XG59XG5cbi5zdWItYm94IHtcbiAgYm9yZGVyLXJhZGl1czogOHB4O1xuICBtYXgtd2lkdGg6IDIyMHB4O1xuICBtaW4taGVpZ2h0OiAyNTBweDtcbiAgbWFyZ2luLWJvdHRvbTogMTBweDtcbiAgbWFyZ2luLXJpZ2h0OiAxMHB4O1xufVxuLnN1Yi1ib3ggdWwge1xuICBwYWRkaW5nLWxlZnQ6IDE1cHg7XG4gIG1hcmdpbi10b3A6IDMwcHg7XG4gIG1hcmdpbi1ib3R0b206IDMwcHg7XG4gIHdpZHRoOiA4MCU7XG4gIG1pbi13aWR0aDogMTUwcHg7XG59XG4uc3ViLWJveCB1bCBsaSB7XG4gIG1hcmdpbi10b3A6IDdweDtcbn1cbi5zdWItYm94LnNpbmdsZSB7XG4gIGJhY2tncm91bmQ6IHRyYW5zcGFyZW50IGxpbmVhci1ncmFkaWVudCgyMTNkZWcsICNkOTJmODMgMCUsICM3ZTAwM2UgMTAwJSkgMCUgMCUgbm8tcmVwZWF0IHBhZGRpbmctYm94O1xufVxuLnN1Yi1ib3guc2luZ2xlIGJ1dHRvbi5idG4ge1xuICBjb2xvcjogI2Q5MmY4Mztcbn1cbi5zdWItYm94Lm11bHRpLXNpbHZlciB7XG4gIGJhY2tncm91bmQ6IHRyYW5zcGFyZW50IGxpbmVhci1ncmFkaWVudCgyMTFkZWcsICNjN2NjZDIgMCUsICNhNWE4YWIgNTIlLCAjNzE3MTcxIDEwMCUpIDAlIDAlIG5vLXJlcGVhdCBwYWRkaW5nLWJveDtcbn1cbi5zdWItYm94Lm11bHRpLXNpbHZlciBidXR0b24uYnRuIHtcbiAgY29sb3I6ICM4ZDhkOGQ7XG59XG4uc3ViLWJveC5tdWx0aS1nb2xkIHtcbiAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnQgbGluZWFyLWdyYWRpZW50KDIxN2RlZywgI2YzYWUxOCAwJSwgI2EyNmYwMCAxMDAlKSAwJSAwJSBuby1yZXBlYXQgcGFkZGluZy1ib3g7XG59XG4uc3ViLWJveC5tdWx0aS1nb2xkIGJ1dHRvbi5idG4ge1xuICBjb2xvcjogI2YzYWUxODtcbn1cbi5zdWItYm94Lm11bHRpLXBsYXRpbnVtIHtcbiAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnQgbGluZWFyLWdyYWRpZW50KDIxN2RlZywgI2NmZDhlOSAwJSwgIzBjMjAzMyAxMDAlKSAwJSAwJSBuby1yZXBlYXQgcGFkZGluZy1ib3g7XG59XG4uc3ViLWJveC5tdWx0aS1wbGF0aW51bSBidXR0b24uYnRuIHtcbiAgY29sb3I6ICM0YTViNmQ7XG59XG4uc3ViLWJveCBzdmcge1xuICBmaWxsOiB3aGl0ZTtcbn1cbi5zdWItYm94IGhyIHtcbiAgd2lkdGg6IDYwcHg7XG4gIGJhY2tncm91bmQtY29sb3I6IHdoaXRlO1xuICBoZWlnaHQ6IDNweDtcbiAgbWFyZ2luLWxlZnQ6IDBweDtcbn1cblxuQG1lZGlhIChtYXgtd2lkdGg6IDQyMHB4KSB7XG4gIC5zdWItYm94IHtcbiAgICBtYXJnaW4tYm90dG9tOiAxMHB4O1xuICB9XG4gIC5zdWItYm94IHVsIHtcbiAgICBtYXJnaW4tdG9wOiBhdXRvO1xuICAgIG1hcmdpbi1ib3R0b206IDEwcHg7XG4gIH1cbn1cbkBtZWRpYSAobWF4LXdpZHRoOiA3NjhweCkge1xuICAuc3ViLWluZm8ge1xuICAgIGhlaWdodDogMTAwcHg7XG4gIH1cblxuICAuY2FyZC1ib2R5ID4gZGl2IHtcbiAgICBtYXJnaW46IDVweDtcbiAgfVxufSJdfQ== */"] });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_0__["ɵsetClassMetadata"](SubscriptionComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"],
        args: [{
                selector: "app-subscription",
                templateUrl: "./subscription.component.html",
                styleUrls: [
                    "../../page/page.component.scss",
                    "./subscription.component.scss",
                ],
            }]
    }], function () { return [{ type: src_app_core__WEBPACK_IMPORTED_MODULE_1__["AuthService"] }, { type: src_app_core__WEBPACK_IMPORTED_MODULE_1__["GeneralService"] }]; }, null); })();


/***/ }),

/***/ "./src/app/@page/subscriptions/subscription-routing.module.ts":
/*!********************************************************************!*\
  !*** ./src/app/@page/subscriptions/subscription-routing.module.ts ***!
  \********************************************************************/
/*! exports provided: SubscriptionRoutingModule, routedComponents */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SubscriptionRoutingModule", function() { return SubscriptionRoutingModule; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "routedComponents", function() { return routedComponents; });
/* harmony import */ var _view_present_subscription_view_present_subscription_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./view-present-subscription/view-present-subscription.component */ "./src/app/@page/subscriptions/view-present-subscription/view-present-subscription.component.ts");
/* harmony import */ var _view_single_subscription_view_single_subscription_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./view-single-subscription/view-single-subscription.component */ "./src/app/@page/subscriptions/view-single-subscription/view-single-subscription.component.ts");
/* harmony import */ var _subscription_page_subscription_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./subscription-page/subscription.component */ "./src/app/@page/subscriptions/subscription-page/subscription.component.ts");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _view_all_packages_view_all_packages_component__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./view-all-packages/view-all-packages.component */ "./src/app/@page/subscriptions/view-all-packages/view-all-packages.component.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");








const routes = [
    {
        path: "",
        component: _subscription_page_subscription_component__WEBPACK_IMPORTED_MODULE_2__["SubscriptionComponent"],
        children: [
            { path: "", pathMatch: "full", redirectTo: "packages" },
            { path: "packages", component: _view_all_packages_view_all_packages_component__WEBPACK_IMPORTED_MODULE_4__["ViewAllPackagesComponent"] },
            {
                path: "subscription-details",
                component: _view_present_subscription_view_present_subscription_component__WEBPACK_IMPORTED_MODULE_0__["ViewPresentSubscriptionComponent"],
            },
            { path: "package/:type", component: _view_single_subscription_view_single_subscription_component__WEBPACK_IMPORTED_MODULE_1__["ViewSingleSubscriptionComponent"] },
        ],
    },
];
class SubscriptionRoutingModule {
}
SubscriptionRoutingModule.ɵmod = _angular_core__WEBPACK_IMPORTED_MODULE_3__["ɵɵdefineNgModule"]({ type: SubscriptionRoutingModule });
SubscriptionRoutingModule.ɵinj = _angular_core__WEBPACK_IMPORTED_MODULE_3__["ɵɵdefineInjector"]({ factory: function SubscriptionRoutingModule_Factory(t) { return new (t || SubscriptionRoutingModule)(); }, imports: [[_angular_router__WEBPACK_IMPORTED_MODULE_5__["RouterModule"].forChild(routes)],
        _angular_router__WEBPACK_IMPORTED_MODULE_5__["RouterModule"]] });
(function () { (typeof ngJitMode === "undefined" || ngJitMode) && _angular_core__WEBPACK_IMPORTED_MODULE_3__["ɵɵsetNgModuleScope"](SubscriptionRoutingModule, { imports: [_angular_router__WEBPACK_IMPORTED_MODULE_5__["RouterModule"]], exports: [_angular_router__WEBPACK_IMPORTED_MODULE_5__["RouterModule"]] }); })();
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_3__["ɵsetClassMetadata"](SubscriptionRoutingModule, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_3__["NgModule"],
        args: [{
                imports: [_angular_router__WEBPACK_IMPORTED_MODULE_5__["RouterModule"].forChild(routes)],
                exports: [_angular_router__WEBPACK_IMPORTED_MODULE_5__["RouterModule"]],
            }]
    }], null, null); })();
const routedComponents = [
    _view_all_packages_view_all_packages_component__WEBPACK_IMPORTED_MODULE_4__["ViewAllPackagesComponent"],
    _view_present_subscription_view_present_subscription_component__WEBPACK_IMPORTED_MODULE_0__["ViewPresentSubscriptionComponent"],
    _view_single_subscription_view_single_subscription_component__WEBPACK_IMPORTED_MODULE_1__["ViewSingleSubscriptionComponent"],
    _subscription_page_subscription_component__WEBPACK_IMPORTED_MODULE_2__["SubscriptionComponent"],
];


/***/ }),

/***/ "./src/app/@page/subscriptions/subscription.module.ts":
/*!************************************************************!*\
  !*** ./src/app/@page/subscriptions/subscription.module.ts ***!
  \************************************************************/
/*! exports provided: SubscriptionModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SubscriptionModule", function() { return SubscriptionModule; });
/* harmony import */ var _subscription_routing_module__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./subscription-routing.module */ "./src/app/@page/subscriptions/subscription-routing.module.ts");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/common.js");
/* harmony import */ var src_app_vg_menu__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! src/app/vg-menu */ "./src/app/vg-menu/index.ts");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm2015/forms.js");
/* harmony import */ var _angular_material_dialog__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/material/dialog */ "./node_modules/@angular/material/__ivy_ngcc__/fesm2015/dialog.js");
/* harmony import */ var _view_all_packages_view_all_packages_component__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./view-all-packages/view-all-packages.component */ "./src/app/@page/subscriptions/view-all-packages/view-all-packages.component.ts");
/* harmony import */ var _view_present_subscription_view_present_subscription_component__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./view-present-subscription/view-present-subscription.component */ "./src/app/@page/subscriptions/view-present-subscription/view-present-subscription.component.ts");
/* harmony import */ var _view_single_subscription_view_single_subscription_component__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./view-single-subscription/view-single-subscription.component */ "./src/app/@page/subscriptions/view-single-subscription/view-single-subscription.component.ts");
/* harmony import */ var _subscription_page_subscription_component__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./subscription-page/subscription.component */ "./src/app/@page/subscriptions/subscription-page/subscription.component.ts");











class SubscriptionModule {
}
SubscriptionModule.ɵmod = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineNgModule"]({ type: SubscriptionModule });
SubscriptionModule.ɵinj = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineInjector"]({ factory: function SubscriptionModule_Factory(t) { return new (t || SubscriptionModule)(); }, imports: [[
            _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
            src_app_vg_menu__WEBPACK_IMPORTED_MODULE_3__["NgxMenuModule"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_4__["FormsModule"],
            _angular_material_dialog__WEBPACK_IMPORTED_MODULE_5__["MatDialogModule"],
            _subscription_routing_module__WEBPACK_IMPORTED_MODULE_0__["SubscriptionRoutingModule"],
        ]] });
(function () { (typeof ngJitMode === "undefined" || ngJitMode) && _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵsetNgModuleScope"](SubscriptionModule, { declarations: [_view_all_packages_view_all_packages_component__WEBPACK_IMPORTED_MODULE_6__["ViewAllPackagesComponent"], _view_present_subscription_view_present_subscription_component__WEBPACK_IMPORTED_MODULE_7__["ViewPresentSubscriptionComponent"], _view_single_subscription_view_single_subscription_component__WEBPACK_IMPORTED_MODULE_8__["ViewSingleSubscriptionComponent"], _subscription_page_subscription_component__WEBPACK_IMPORTED_MODULE_9__["SubscriptionComponent"]], imports: [_angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
        src_app_vg_menu__WEBPACK_IMPORTED_MODULE_3__["NgxMenuModule"],
        _angular_forms__WEBPACK_IMPORTED_MODULE_4__["FormsModule"],
        _angular_material_dialog__WEBPACK_IMPORTED_MODULE_5__["MatDialogModule"],
        _subscription_routing_module__WEBPACK_IMPORTED_MODULE_0__["SubscriptionRoutingModule"]] }); })();
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵsetClassMetadata"](SubscriptionModule, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"],
        args: [{
                declarations: [..._subscription_routing_module__WEBPACK_IMPORTED_MODULE_0__["routedComponents"]],
                imports: [
                    _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
                    src_app_vg_menu__WEBPACK_IMPORTED_MODULE_3__["NgxMenuModule"],
                    _angular_forms__WEBPACK_IMPORTED_MODULE_4__["FormsModule"],
                    _angular_material_dialog__WEBPACK_IMPORTED_MODULE_5__["MatDialogModule"],
                    _subscription_routing_module__WEBPACK_IMPORTED_MODULE_0__["SubscriptionRoutingModule"],
                ],
            }]
    }], null, null); })();


/***/ }),

/***/ "./src/app/@page/subscriptions/view-all-packages/view-all-packages.component.ts":
/*!**************************************************************************************!*\
  !*** ./src/app/@page/subscriptions/view-all-packages/view-all-packages.component.ts ***!
  \**************************************************************************************/
/*! exports provided: ViewAllPackagesComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ViewAllPackagesComponent", function() { return ViewAllPackagesComponent; });
/* harmony import */ var src_app_config__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! src/app/config */ "./src/app/config.ts");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var src_app_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! src/app/@core */ "./src/app/@core/index.ts");
/* harmony import */ var ngx_toastr__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ngx-toastr */ "./node_modules/ngx-toastr/__ivy_ngcc__/fesm2015/ngx-toastr.js");
/* harmony import */ var src_app_core_plans_subscription_service__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! src/app/@core/plans-subscription.service */ "./src/app/@core/plans-subscription.service.ts");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/common.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");








const _c0 = function (a0, a1) { return [a0, a1]; };
function ViewAllPackagesComponent_div_8_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div", 8);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](1, "span", 9);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](2, "Current Subscription plan");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](3, "div", 10);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](4, "button", 11);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](5, " View ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](6, "button", 12);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](7, " Renew ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r466 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](4);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("routerLink", ctx_r466.appRoutes.viewUserSubscription);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("routerLink", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpureFunction2"](2, _c0, ctx_r466.appRoutes.singleSubscription, ctx_r466.package.payment_type === "free" ? ctx_r466.package.reverse_package_name : ctx_r466.package == null ? null : ctx_r466.package.package_name));
} }
const _c1 = function (a0) { return [a0, "single"]; };
function ViewAllPackagesComponent_div_9_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div", 13);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](1, "label", 14);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](2, "Choose a subscription plan");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](3, "div", 15);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](4, "div", 16);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](5, "div", 17);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](6, "div", 18);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](7, "hr");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](8, "div");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnamespaceSVG"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](9, "svg", 19);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](10, "use");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnamespaceHTML"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](11, "div", 20);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](12, "h4");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](13, " Single user ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](14, "br");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](15, " \u00A0 ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](16, "ul");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](17, "li");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](18, "Monthly, Termly, Session wide");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](19, "li");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](20);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](21, "number");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](22, "div", 21);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](23, "button", 22);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](24, " Subscribe ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](25, "div", 23);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](26, "div", 17);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](27, "div", 18);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](28, "hr");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](29, "div");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnamespaceSVG"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](30, "svg", 19);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](31, "use");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](32, "svg", 19);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](33, "use");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnamespaceHTML"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](34, "div", 20);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](35, "h4", 24);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](36, " Multiple User ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](37, "br");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](38);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](39, "titlecase");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](40, "ul");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](41, "li");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](42, "Monthly, Termly, Session wide");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](43, "li");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](44);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](45, "number");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](46, "div", 21);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](47, "button", 22);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](48, " Subscribe ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](49, "div", 25);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](50, "div", 17);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](51, "div", 18);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](52, "hr");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](53, "div");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnamespaceSVG"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](54, "svg", 19);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](55, "use");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](56, "svg", 19);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](57, "use");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](58, "svg", 19);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](59, "use");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnamespaceHTML"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](60, "div", 20);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](61, "h4", 24);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](62, " Multiple User ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](63, "br");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](64);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](65, "titlecase");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](66, "ul");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](67, "li");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](68, "Monthly, Termly, Session wide");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](69, "li");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](70);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](71, "number");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](72, "div", 21);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](73, "button", 22);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](74, " Subscribe ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](75, "div", 26);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](76, "div", 17);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](77, "div", 18);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](78, "hr");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](79, "div");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnamespaceSVG"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](80, "svg", 19);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](81, "use");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](82, "svg", 19);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](83, "use");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](84, "svg", 19);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](85, "use");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](86, "svg", 19);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](87, "use");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnamespaceHTML"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](88, "div", 20);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](89, "h4", 24);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](90, " Multiple User ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](91, "br");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](92);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](93, "titlecase");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](94, "ul");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](95, "li");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](96, "Monthly, Termly, Session wide");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](97, "li");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](98);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](99, "number");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](100, "div", 21);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](101, "button", 22);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](102, " Subscribe ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r467 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](10);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵattribute"]("href", "assets/images/nav-icons.svg#star", null, "xlink");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](10);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"]("", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind1"](21, 21, ctx_r467.singleCount || 1), " account");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](3);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("routerLink", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpureFunction1"](35, _c1, ctx_r467.appRoutes.singleSubscription));
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](8);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵattribute"]("href", "assets/images/nav-icons.svg#star", null, "xlink");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵattribute"]("href", "assets/images/nav-icons.svg#star", null, "xlink");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](5);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind1"](39, 23, ctx_r467.multiple[2].name._text), " ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](6);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" Up to ", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind1"](45, 25, ctx_r467.multiple[2].user_count._text || 20), " account(s) ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](3);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("routerLink", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpureFunction2"](37, _c0, ctx_r467.appRoutes.singleSubscription, ctx_r467.multiple[2].name._text));
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](8);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵattribute"]("href", "assets/images/nav-icons.svg#star", null, "xlink");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵattribute"]("href", "assets/images/nav-icons.svg#star", null, "xlink");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵattribute"]("href", "assets/images/nav-icons.svg#star", null, "xlink");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](5);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind1"](65, 27, ctx_r467.multiple[1].name._text), " ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](6);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" Up to ", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind1"](71, 29, ctx_r467.multiple[1].user_count._text || 30), " account(s) ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](3);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("routerLink", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpureFunction2"](40, _c0, ctx_r467.appRoutes.singleSubscription, ctx_r467.multiple[1].name._text));
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](8);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵattribute"]("href", "assets/images/nav-icons.svg#star", null, "xlink");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵattribute"]("href", "assets/images/nav-icons.svg#star", null, "xlink");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵattribute"]("href", "assets/images/nav-icons.svg#star", null, "xlink");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵattribute"]("href", "assets/images/nav-icons.svg#star", null, "xlink");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](5);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind1"](93, 31, ctx_r467.multiple[0].name._text), " ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](6);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" Up to ", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind1"](99, 33, ctx_r467.multiple[0].user_count._text || 20), " account(s) ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](3);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("routerLink", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpureFunction2"](43, _c0, ctx_r467.appRoutes.singleSubscription, ctx_r467.multiple[0].name._text));
} }
class ViewAllPackagesComponent {
    constructor(generalService, toastr, service) {
        this.generalService = generalService;
        this.toastr = toastr;
        this.service = service;
        this.appRoutes = src_app_config__WEBPACK_IMPORTED_MODULE_0__["appRoutes"];
        this.package = {};
    }
    ngOnInit() {
        this.getUserSubscriptionStatus();
        this.getSingleSubscriptionDetails();
        this.getMultipleSubscriptionDetails();
    }
    getSingleSubscriptionDetails() {
        this.generalService.showLoader(true);
        this.service.getSingleSubscription().subscribe((data) => {
            this.generalService.showLoader(false);
            if (data.status._text != "Failed") {
                delete data.status._text;
                this.singleCount = +data.list.package.find((x) => x._attributes.payment_type.trim().toLowerCase() === "paid").user_count._text;
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.generalService.showLoader(false);
            this.toastr.error("Something went wrong");
        });
    }
    getMultipleSubscriptionDetails() {
        this.generalService.showLoader(true);
        this.service.getMultiSubscription().subscribe((data) => {
            this.generalService.showLoader(false);
            if (data.status._text != "Failed") {
                delete data.status._text;
                this.multiple = data.list.package.filter((m) => m._attributes.payment_type.trim().toLowerCase() === "paid");
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.generalService.showLoader(false);
            this.toastr.error("Something went wrong");
        });
    }
    getUserSubscriptionStatus() {
        this.generalService.showLoader(true);
        this.service.getUsersSubscriptionStatus().subscribe((data) => {
            //  data = this.generalService.xmlToJson(subscribedUser);
            this.generalService.showLoader(false);
            if (data.status._text && data.status._text != "Failed") {
                delete data.status;
                delete data.status_message;
                this.package = this.generalService.convertToOneLayerViewModel(data);
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.generalService.showLoader(false);
            this.toastr.error("Something went wrong");
        });
    }
}
ViewAllPackagesComponent.ɵfac = function ViewAllPackagesComponent_Factory(t) { return new (t || ViewAllPackagesComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](src_app_core__WEBPACK_IMPORTED_MODULE_2__["GeneralService"]), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](ngx_toastr__WEBPACK_IMPORTED_MODULE_3__["ToastrService"]), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](src_app_core_plans_subscription_service__WEBPACK_IMPORTED_MODULE_4__["PlanSubscriptionService"])); };
ViewAllPackagesComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineComponent"]({ type: ViewAllPackagesComponent, selectors: [["app-view-all-packages"]], decls: 10, vars: 3, consts: [[1, "card-white"], [1, "card-body", "px-3", "py-4"], [1, "sub-info", "p-3", "d-flex", "justify-content-between"], [1, "d-flex", "flex-column", "justify-content-center"], [1, "text-grey-400", "d-inline", "d-sm-none"], [1, "deep-green"], ["class", "d-flex align-items-center", 4, "ngIf"], ["class", "", 4, "ngIf"], [1, "d-flex", "align-items-center"], [1, "text-green-500", "d-none", "d-sm-inline"], [1, "d-flex", "flex-column", "flex-md-row", "btns"], [1, "btn", "btn-outline-secondary", "ml-2", "p-2", "mb-2", 3, "routerLink"], [1, "btn", "bg-green-300", "bg-success", "p-2", "ml-2", "btn-renew", 3, "routerLink"], [1, ""], [1, "mt-3", "mb-2", "text-black"], [1, "d-flex", "justify-content-center", "flex-row", "flex-wrap"], [1, "sub-box", "single"], [1, "py-2", "px-4"], [1, "d-flex", "justify-content-between", "m-0", "align-items-center", "w-100"], ["width", "14", "height", "11", 1, "svg-icon"], [1, "text-white"], [1, "d-flex", "pb-2"], [1, "btn", "bg-white", "m-auto", 3, "routerLink"], [1, "sub-box", "multi-silver"], [1, "pr-md-4", "pr-0"], [1, "sub-box", "multi-gold"], [1, "sub-box", "multi-platinum"]], template: function ViewAllPackagesComponent_Template(rf, ctx) { if (rf & 1) {
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div", 0);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](1, "div", 1);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](2, "div", 2);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](3, "div", 3);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](4, "small", 4);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](5, "Current Subscription");
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](6, "span", 5);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](7);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](8, ViewAllPackagesComponent_div_8_Template, 8, 5, "div", 6);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](9, ViewAllPackagesComponent_div_9_Template, 103, 46, "div", 7);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    } if (rf & 2) {
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](7);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", (ctx.package == null ? null : ctx.package.package_name) || "You have no Active Subscription", " ");
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx.package.package_name);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx.multiple && ctx.singleCount);
    } }, directives: [_angular_common__WEBPACK_IMPORTED_MODULE_5__["NgIf"], _angular_router__WEBPACK_IMPORTED_MODULE_6__["RouterLink"]], pipes: [_angular_common__WEBPACK_IMPORTED_MODULE_5__["DecimalPipe"], _angular_common__WEBPACK_IMPORTED_MODULE_5__["TitleCasePipe"]], styles: [".card-white[_ngcontent-%COMP%] {\n  background-color: #ffffff;\n  border-radius: 8px;\n  min-height: 400px;\n}\n\nsection[_ngcontent-%COMP%] {\n  max-width: 100vw;\n  overflow-x: hidden;\n}\n\n.position-relative[_ngcontent-%COMP%] {\n  min-height: calc(100vh - 70px);\n}\n\n.card-body[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n  margin: 10px 15px;\n}\n\n.btn-outline-secondary[_ngcontent-%COMP%] {\n  min-width: 100px;\n}\n\n.sub-info[_ngcontent-%COMP%] {\n  background-color: #e3f9ee;\n  border-radius: 8px;\n  height: 60px;\n}\n\n.deep-green[_ngcontent-%COMP%] {\n  color: #585858;\n}\n\n.btn-renew[_ngcontent-%COMP%] {\n  width: 120px;\n}\n\n.sub-box[_ngcontent-%COMP%] {\n  border-radius: 8px;\n  max-width: 220px;\n  min-height: 250px;\n  margin-bottom: 10px;\n  margin-right: 10px;\n}\n\n.sub-box[_ngcontent-%COMP%]   ul[_ngcontent-%COMP%] {\n  padding-left: 15px;\n  margin-top: 30px;\n  margin-bottom: 30px;\n  width: 80%;\n  min-width: 150px;\n}\n\n.sub-box[_ngcontent-%COMP%]   ul[_ngcontent-%COMP%]   li[_ngcontent-%COMP%] {\n  margin-top: 7px;\n}\n\n.sub-box.single[_ngcontent-%COMP%] {\n  background: transparent linear-gradient(213deg, #d92f83 0%, #7e003e 100%) 0% 0% no-repeat padding-box;\n}\n\n.sub-box.single[_ngcontent-%COMP%]   button.btn[_ngcontent-%COMP%] {\n  color: #d92f83;\n}\n\n.sub-box.multi-silver[_ngcontent-%COMP%] {\n  background: transparent linear-gradient(211deg, #c7ccd2 0%, #a5a8ab 52%, #717171 100%) 0% 0% no-repeat padding-box;\n}\n\n.sub-box.multi-silver[_ngcontent-%COMP%]   button.btn[_ngcontent-%COMP%] {\n  color: #8d8d8d;\n}\n\n.sub-box.multi-gold[_ngcontent-%COMP%] {\n  background: transparent linear-gradient(217deg, #f3ae18 0%, #a26f00 100%) 0% 0% no-repeat padding-box;\n}\n\n.sub-box.multi-gold[_ngcontent-%COMP%]   button.btn[_ngcontent-%COMP%] {\n  color: #f3ae18;\n}\n\n.sub-box.multi-platinum[_ngcontent-%COMP%] {\n  background: transparent linear-gradient(217deg, #cfd8e9 0%, #0c2033 100%) 0% 0% no-repeat padding-box;\n}\n\n.sub-box.multi-platinum[_ngcontent-%COMP%]   button.btn[_ngcontent-%COMP%] {\n  color: #4a5b6d;\n}\n\n.sub-box[_ngcontent-%COMP%]   svg[_ngcontent-%COMP%] {\n  fill: white;\n}\n\n.sub-box[_ngcontent-%COMP%]   hr[_ngcontent-%COMP%] {\n  width: 60px;\n  background-color: white;\n  height: 3px;\n  margin-left: 0px;\n}\n\n@media (max-width: 420px) {\n  .sub-box[_ngcontent-%COMP%] {\n    margin-bottom: 10px;\n  }\n  .sub-box[_ngcontent-%COMP%]   ul[_ngcontent-%COMP%] {\n    margin-top: auto;\n    margin-bottom: 10px;\n  }\n}\n\n@media (max-width: 768px) {\n  .sub-info[_ngcontent-%COMP%] {\n    height: 100px;\n  }\n\n  .card-body[_ngcontent-%COMP%]    > div[_ngcontent-%COMP%] {\n    margin: 5px;\n  }\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQHBhZ2Uvc3Vic2NyaXB0aW9ucy9zdWJzY3JpcHRpb24tcGFnZS9DOlxcbGFyYWdvblxcd3d3XFxlcml0YXBwL3NyY1xcYXBwXFxAcGFnZVxcc3Vic2NyaXB0aW9uc1xcc3Vic2NyaXB0aW9uLXBhZ2VcXHN1YnNjcmlwdGlvbi5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvQHBhZ2Uvc3Vic2NyaXB0aW9ucy9zdWJzY3JpcHRpb24tcGFnZS9zdWJzY3JpcHRpb24uY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFDRSx5QkFBQTtFQUNBLGtCQUFBO0VBQ0EsaUJBQUE7QUNDRjs7QURFQTtFQUNFLGdCQUFBO0VBQ0Esa0JBQUE7QUNDRjs7QURFQTtFQUNFLDhCQUFBO0FDQ0Y7O0FER0U7RUFDRSxpQkFBQTtBQ0FKOztBRElBO0VBQ0UsZ0JBQUE7QUNERjs7QURJQTtFQUNFLHlCQUFBO0VBQ0Esa0JBQUE7RUFDQSxZQUFBO0FDREY7O0FESUE7RUFDRSxjQUFBO0FDREY7O0FESUE7RUFDRSxZQUFBO0FDREY7O0FESUE7RUFDRSxrQkFBQTtFQUNBLGdCQUFBO0VBQ0EsaUJBQUE7RUFDQSxtQkFBQTtFQUNBLGtCQUFBO0FDREY7O0FER0U7RUFDRSxrQkFBQTtFQUNBLGdCQUFBO0VBQ0EsbUJBQUE7RUFDQSxVQUFBO0VBQ0EsZ0JBQUE7QUNESjs7QURFSTtFQUNFLGVBQUE7QUNBTjs7QURHRTtFQUNFLHFHQUFBO0FDREo7O0FEU0k7RUFDRSxjQUFBO0FDUE47O0FEVUU7RUFDRSxrSEFBQTtBQ1JKOztBRGdCSTtFQUNFLGNBQUE7QUNkTjs7QURpQkU7RUFDRSxxR0FBQTtBQ2ZKOztBRHNCSTtFQUNFLGNBQUE7QUNwQk47O0FEdUJFO0VBQ0UscUdBQUE7QUNyQko7O0FENkJJO0VBQ0UsY0FBQTtBQzNCTjs7QUQrQkU7RUFDRSxXQUFBO0FDN0JKOztBRGdDRTtFQUNFLFdBQUE7RUFDQSx1QkFBQTtFQUNBLFdBQUE7RUFDQSxnQkFBQTtBQzlCSjs7QURrQ0E7RUFDRTtJQUNFLG1CQUFBO0VDL0JGO0VEZ0NFO0lBQ0UsZ0JBQUE7SUFDQSxtQkFBQTtFQzlCSjtBQUNGOztBRGtDQTtFQUNFO0lBQ0UsYUFBQTtFQ2hDRjs7RURvQ0U7SUFDRSxXQUFBO0VDakNKO0FBQ0YiLCJmaWxlIjoic3JjL2FwcC9AcGFnZS9zdWJzY3JpcHRpb25zL3N1YnNjcmlwdGlvbi1wYWdlL3N1YnNjcmlwdGlvbi5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5jYXJkLXdoaXRlIHtcclxuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmO1xyXG4gIGJvcmRlci1yYWRpdXM6IDhweDtcclxuICBtaW4taGVpZ2h0OiA0MDBweDtcclxufVxyXG5cclxuc2VjdGlvbiB7XHJcbiAgbWF4LXdpZHRoOiAxMDB2dztcclxuICBvdmVyZmxvdy14OiBoaWRkZW47XHJcbn1cclxuXHJcbi5wb3NpdGlvbi1yZWxhdGl2ZSB7XHJcbiAgbWluLWhlaWdodDogY2FsYygxMDB2aCAtIDcwcHgpO1xyXG59XHJcblxyXG4uY2FyZC1ib2R5IHtcclxuICA+IGRpdiB7XHJcbiAgICBtYXJnaW46IDEwcHggMTVweDtcclxuICB9XHJcbn1cclxuXHJcbi5idG4tb3V0bGluZS1zZWNvbmRhcnkge1xyXG4gIG1pbi13aWR0aDogMTAwcHg7XHJcbn1cclxuXHJcbi5zdWItaW5mbyB7XHJcbiAgYmFja2dyb3VuZC1jb2xvcjogI2UzZjllZTtcclxuICBib3JkZXItcmFkaXVzOiA4cHg7XHJcbiAgaGVpZ2h0OiA2MHB4O1xyXG59XHJcblxyXG4uZGVlcC1ncmVlbiB7XHJcbiAgY29sb3I6ICM1ODU4NTg7XHJcbn1cclxuXHJcbi5idG4tcmVuZXcge1xyXG4gIHdpZHRoOiAxMjBweDtcclxufVxyXG5cclxuLnN1Yi1ib3gge1xyXG4gIGJvcmRlci1yYWRpdXM6IDhweDtcclxuICBtYXgtd2lkdGg6IDIyMHB4O1xyXG4gIG1pbi1oZWlnaHQ6IDI1MHB4O1xyXG4gIG1hcmdpbi1ib3R0b206IDEwcHg7XHJcbiAgbWFyZ2luLXJpZ2h0OiAxMHB4O1xyXG5cclxuICB1bCB7XHJcbiAgICBwYWRkaW5nLWxlZnQ6IDE1cHg7XHJcbiAgICBtYXJnaW4tdG9wOiAzMHB4O1xyXG4gICAgbWFyZ2luLWJvdHRvbTogMzBweDtcclxuICAgIHdpZHRoOiA4MCU7XHJcbiAgICBtaW4td2lkdGg6IDE1MHB4O1xyXG4gICAgbGkge1xyXG4gICAgICBtYXJnaW4tdG9wOiA3cHg7XHJcbiAgICB9XHJcbiAgfVxyXG4gICYuc2luZ2xlIHtcclxuICAgIGJhY2tncm91bmQ6IHRyYW5zcGFyZW50XHJcbiAgICAgIGxpbmVhci1ncmFkaWVudChcclxuICAgICAgICAyMTNkZWcsXHJcbiAgICAgICAgcmdiYSgyMTcsIDQ3LCAxMzEsIDEpIDAlLFxyXG4gICAgICAgIHJnYmEoMTI2LCAwLCA2MiwgMSkgMTAwJVxyXG4gICAgICApXHJcbiAgICAgIDAlIDAlIG5vLXJlcGVhdCBwYWRkaW5nLWJveDtcclxuXHJcbiAgICBidXR0b24uYnRuIHtcclxuICAgICAgY29sb3I6IHJnYmEoMjE3LCA0NywgMTMxLCAxKTtcclxuICAgIH1cclxuICB9XHJcbiAgJi5tdWx0aS1zaWx2ZXIge1xyXG4gICAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnRcclxuICAgICAgbGluZWFyLWdyYWRpZW50KFxyXG4gICAgICAgIDIxMWRlZyxcclxuICAgICAgICByZ2JhKDE5OSwgMjA0LCAyMTAsIDEpIDAlLFxyXG4gICAgICAgIHJnYmEoMTY1LCAxNjgsIDE3MSwgMSkgNTIlLFxyXG4gICAgICAgIHJnYmEoMTEzLCAxMTMsIDExMywgMSkgMTAwJVxyXG4gICAgICApXHJcbiAgICAgIDAlIDAlIG5vLXJlcGVhdCBwYWRkaW5nLWJveDtcclxuICAgIGJ1dHRvbi5idG4ge1xyXG4gICAgICBjb2xvcjogcmdiYSgxNDEsIDE0MSwgMTQxLCAxKTtcclxuICAgIH1cclxuICB9XHJcbiAgJi5tdWx0aS1nb2xkIHtcclxuICAgIGJhY2tncm91bmQ6IHRyYW5zcGFyZW50XHJcbiAgICAgIGxpbmVhci1ncmFkaWVudChcclxuICAgICAgICAyMTdkZWcsXHJcbiAgICAgICAgcmdiYSgyNDMsIDE3NCwgMjQsIDEpIDAlLFxyXG4gICAgICAgIHJnYmEoMTYyLCAxMTEsIDAsIDEpIDEwMCVcclxuICAgICAgKVxyXG4gICAgICAwJSAwJSBuby1yZXBlYXQgcGFkZGluZy1ib3g7XHJcbiAgICBidXR0b24uYnRuIHtcclxuICAgICAgY29sb3I6IHJnYmEoMjQzLCAxNzQsIDI0LCAxKTtcclxuICAgIH1cclxuICB9XHJcbiAgJi5tdWx0aS1wbGF0aW51bSB7XHJcbiAgICBiYWNrZ3JvdW5kOiB0cmFuc3BhcmVudFxyXG4gICAgICBsaW5lYXItZ3JhZGllbnQoXHJcbiAgICAgICAgMjE3ZGVnLFxyXG4gICAgICAgIHJnYmEoMjA3LCAyMTYsIDIzMywgMSkgMCUsXHJcbiAgICAgICAgcmdiYSgxMiwgMzIsIDUxLCAxKSAxMDAlXHJcbiAgICAgIClcclxuICAgICAgMCUgMCUgbm8tcmVwZWF0IHBhZGRpbmctYm94O1xyXG5cclxuICAgIGJ1dHRvbi5idG4ge1xyXG4gICAgICBjb2xvcjogcmdiYSg3NCwgOTEsIDEwOSwgMSk7XHJcbiAgICB9XHJcbiAgfVxyXG5cclxuICBzdmcge1xyXG4gICAgZmlsbDogd2hpdGU7XHJcbiAgfVxyXG5cclxuICBociB7XHJcbiAgICB3aWR0aDogNjBweDtcclxuICAgIGJhY2tncm91bmQtY29sb3I6IHdoaXRlO1xyXG4gICAgaGVpZ2h0OiAzcHg7XHJcbiAgICBtYXJnaW4tbGVmdDogMHB4O1xyXG4gIH1cclxufVxyXG5cclxuQG1lZGlhIChtYXgtd2lkdGg6IDQyMHB4KSB7XHJcbiAgLnN1Yi1ib3gge1xyXG4gICAgbWFyZ2luLWJvdHRvbTogMTBweDtcclxuICAgIHVsIHtcclxuICAgICAgbWFyZ2luLXRvcDogYXV0bztcclxuICAgICAgbWFyZ2luLWJvdHRvbTogMTBweDtcclxuICAgIH1cclxuICB9XHJcbn1cclxuXHJcbkBtZWRpYSAobWF4LXdpZHRoOiA3NjhweCkge1xyXG4gIC5zdWItaW5mbyB7XHJcbiAgICBoZWlnaHQ6IDEwMHB4O1xyXG4gIH1cclxuXHJcbiAgLmNhcmQtYm9keSB7XHJcbiAgICA+IGRpdiB7XHJcbiAgICAgIG1hcmdpbjogNXB4O1xyXG4gICAgfVxyXG4gIH1cclxufVxyXG4iLCIuY2FyZC13aGl0ZSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7XG4gIGJvcmRlci1yYWRpdXM6IDhweDtcbiAgbWluLWhlaWdodDogNDAwcHg7XG59XG5cbnNlY3Rpb24ge1xuICBtYXgtd2lkdGg6IDEwMHZ3O1xuICBvdmVyZmxvdy14OiBoaWRkZW47XG59XG5cbi5wb3NpdGlvbi1yZWxhdGl2ZSB7XG4gIG1pbi1oZWlnaHQ6IGNhbGMoMTAwdmggLSA3MHB4KTtcbn1cblxuLmNhcmQtYm9keSA+IGRpdiB7XG4gIG1hcmdpbjogMTBweCAxNXB4O1xufVxuXG4uYnRuLW91dGxpbmUtc2Vjb25kYXJ5IHtcbiAgbWluLXdpZHRoOiAxMDBweDtcbn1cblxuLnN1Yi1pbmZvIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2UzZjllZTtcbiAgYm9yZGVyLXJhZGl1czogOHB4O1xuICBoZWlnaHQ6IDYwcHg7XG59XG5cbi5kZWVwLWdyZWVuIHtcbiAgY29sb3I6ICM1ODU4NTg7XG59XG5cbi5idG4tcmVuZXcge1xuICB3aWR0aDogMTIwcHg7XG59XG5cbi5zdWItYm94IHtcbiAgYm9yZGVyLXJhZGl1czogOHB4O1xuICBtYXgtd2lkdGg6IDIyMHB4O1xuICBtaW4taGVpZ2h0OiAyNTBweDtcbiAgbWFyZ2luLWJvdHRvbTogMTBweDtcbiAgbWFyZ2luLXJpZ2h0OiAxMHB4O1xufVxuLnN1Yi1ib3ggdWwge1xuICBwYWRkaW5nLWxlZnQ6IDE1cHg7XG4gIG1hcmdpbi10b3A6IDMwcHg7XG4gIG1hcmdpbi1ib3R0b206IDMwcHg7XG4gIHdpZHRoOiA4MCU7XG4gIG1pbi13aWR0aDogMTUwcHg7XG59XG4uc3ViLWJveCB1bCBsaSB7XG4gIG1hcmdpbi10b3A6IDdweDtcbn1cbi5zdWItYm94LnNpbmdsZSB7XG4gIGJhY2tncm91bmQ6IHRyYW5zcGFyZW50IGxpbmVhci1ncmFkaWVudCgyMTNkZWcsICNkOTJmODMgMCUsICM3ZTAwM2UgMTAwJSkgMCUgMCUgbm8tcmVwZWF0IHBhZGRpbmctYm94O1xufVxuLnN1Yi1ib3guc2luZ2xlIGJ1dHRvbi5idG4ge1xuICBjb2xvcjogI2Q5MmY4Mztcbn1cbi5zdWItYm94Lm11bHRpLXNpbHZlciB7XG4gIGJhY2tncm91bmQ6IHRyYW5zcGFyZW50IGxpbmVhci1ncmFkaWVudCgyMTFkZWcsICNjN2NjZDIgMCUsICNhNWE4YWIgNTIlLCAjNzE3MTcxIDEwMCUpIDAlIDAlIG5vLXJlcGVhdCBwYWRkaW5nLWJveDtcbn1cbi5zdWItYm94Lm11bHRpLXNpbHZlciBidXR0b24uYnRuIHtcbiAgY29sb3I6ICM4ZDhkOGQ7XG59XG4uc3ViLWJveC5tdWx0aS1nb2xkIHtcbiAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnQgbGluZWFyLWdyYWRpZW50KDIxN2RlZywgI2YzYWUxOCAwJSwgI2EyNmYwMCAxMDAlKSAwJSAwJSBuby1yZXBlYXQgcGFkZGluZy1ib3g7XG59XG4uc3ViLWJveC5tdWx0aS1nb2xkIGJ1dHRvbi5idG4ge1xuICBjb2xvcjogI2YzYWUxODtcbn1cbi5zdWItYm94Lm11bHRpLXBsYXRpbnVtIHtcbiAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnQgbGluZWFyLWdyYWRpZW50KDIxN2RlZywgI2NmZDhlOSAwJSwgIzBjMjAzMyAxMDAlKSAwJSAwJSBuby1yZXBlYXQgcGFkZGluZy1ib3g7XG59XG4uc3ViLWJveC5tdWx0aS1wbGF0aW51bSBidXR0b24uYnRuIHtcbiAgY29sb3I6ICM0YTViNmQ7XG59XG4uc3ViLWJveCBzdmcge1xuICBmaWxsOiB3aGl0ZTtcbn1cbi5zdWItYm94IGhyIHtcbiAgd2lkdGg6IDYwcHg7XG4gIGJhY2tncm91bmQtY29sb3I6IHdoaXRlO1xuICBoZWlnaHQ6IDNweDtcbiAgbWFyZ2luLWxlZnQ6IDBweDtcbn1cblxuQG1lZGlhIChtYXgtd2lkdGg6IDQyMHB4KSB7XG4gIC5zdWItYm94IHtcbiAgICBtYXJnaW4tYm90dG9tOiAxMHB4O1xuICB9XG4gIC5zdWItYm94IHVsIHtcbiAgICBtYXJnaW4tdG9wOiBhdXRvO1xuICAgIG1hcmdpbi1ib3R0b206IDEwcHg7XG4gIH1cbn1cbkBtZWRpYSAobWF4LXdpZHRoOiA3NjhweCkge1xuICAuc3ViLWluZm8ge1xuICAgIGhlaWdodDogMTAwcHg7XG4gIH1cblxuICAuY2FyZC1ib2R5ID4gZGl2IHtcbiAgICBtYXJnaW46IDVweDtcbiAgfVxufSJdfQ== */", "@media (max-width: 768px) {\n  .btns[_ngcontent-%COMP%]    > button[_ngcontent-%COMP%] {\n    height: 30px;\n    padding-top: 5px !important;\n  }\n}\n.text-grey-400[_ngcontent-%COMP%] {\n  color: #8d8d8d;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQHBhZ2Uvc3Vic2NyaXB0aW9ucy92aWV3LWFsbC1wYWNrYWdlcy9DOlxcbGFyYWdvblxcd3d3XFxlcml0YXBwL3NyY1xcYXBwXFxAcGFnZVxcc3Vic2NyaXB0aW9uc1xcdmlldy1hbGwtcGFja2FnZXNcXHZpZXctYWxsLXBhY2thZ2VzLmNvbXBvbmVudC5zY3NzIiwic3JjL2FwcC9AcGFnZS9zdWJzY3JpcHRpb25zL3ZpZXctYWxsLXBhY2thZ2VzL3ZpZXctYWxsLXBhY2thZ2VzLmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBQ0U7SUFDRSxZQUFBO0lBQ0EsMkJBQUE7RUNDRjtBQUNGO0FERUE7RUFDRSxjQUFBO0FDQUYiLCJmaWxlIjoic3JjL2FwcC9AcGFnZS9zdWJzY3JpcHRpb25zL3ZpZXctYWxsLXBhY2thZ2VzL3ZpZXctYWxsLXBhY2thZ2VzLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiQG1lZGlhIChtYXgtd2lkdGg6IDc2OHB4KSB7XHJcbiAgLmJ0bnMgPiBidXR0b24ge1xyXG4gICAgaGVpZ2h0OiAzMHB4O1xyXG4gICAgcGFkZGluZy10b3A6IDVweCAhaW1wb3J0YW50O1xyXG4gIH1cclxufVxyXG5cclxuLnRleHQtZ3JleS00MDAge1xyXG4gIGNvbG9yOiAjOGQ4ZDhkO1xyXG59XHJcbiIsIkBtZWRpYSAobWF4LXdpZHRoOiA3NjhweCkge1xuICAuYnRucyA+IGJ1dHRvbiB7XG4gICAgaGVpZ2h0OiAzMHB4O1xuICAgIHBhZGRpbmctdG9wOiA1cHggIWltcG9ydGFudDtcbiAgfVxufVxuLnRleHQtZ3JleS00MDAge1xuICBjb2xvcjogIzhkOGQ4ZDtcbn0iXX0= */"] });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵsetClassMetadata"](ViewAllPackagesComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"],
        args: [{
                selector: "app-view-all-packages",
                templateUrl: "./view-all-packages.component.html",
                styleUrls: [
                    "../subscription-page/subscription.component.scss",
                    "./view-all-packages.component.scss",
                ],
            }]
    }], function () { return [{ type: src_app_core__WEBPACK_IMPORTED_MODULE_2__["GeneralService"] }, { type: ngx_toastr__WEBPACK_IMPORTED_MODULE_3__["ToastrService"] }, { type: src_app_core_plans_subscription_service__WEBPACK_IMPORTED_MODULE_4__["PlanSubscriptionService"] }]; }, null); })();


/***/ }),

/***/ "./src/app/@page/subscriptions/view-present-subscription/view-present-subscription.component.ts":
/*!******************************************************************************************************!*\
  !*** ./src/app/@page/subscriptions/view-present-subscription/view-present-subscription.component.ts ***!
  \******************************************************************************************************/
/*! exports provided: ViewPresentSubscriptionComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ViewPresentSubscriptionComponent", function() { return ViewPresentSubscriptionComponent; });
/* harmony import */ var src_app_config__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! src/app/config */ "./src/app/config.ts");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var src_app_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! src/app/@core */ "./src/app/@core/index.ts");
/* harmony import */ var ngx_toastr__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ngx-toastr */ "./node_modules/ngx-toastr/__ivy_ngcc__/fesm2015/ngx-toastr.js");
/* harmony import */ var _angular_material_dialog__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/material/dialog */ "./node_modules/@angular/material/__ivy_ngcc__/fesm2015/dialog.js");
/* harmony import */ var src_app_core_plans_subscription_service__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! src/app/@core/plans-subscription.service */ "./src/app/@core/plans-subscription.service.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm2015/forms.js");










function ViewPresentSubscriptionComponent_div_2_h4_5_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "h4", 22);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](2, "titlecase");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r434 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind1"](2, 1, ctx_r434.package == null ? null : ctx_r434.package.package_name), " User ");
} }
function ViewPresentSubscriptionComponent_div_2_h4_6_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "h4", 22);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](2, "titlecase");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r435 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" Multi User ", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind1"](2, 1, ctx_r435.package == null ? null : ctx_r435.package.package_name), " ");
} }
function ViewPresentSubscriptionComponent_div_2_div_8_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div", 23);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r436 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" This plan allows up to ", ctx_r436.subPackage == null ? null : ctx_r436.subPackage.user_count == null ? null : ctx_r436.subPackage.user_count._text, " accounts ");
} }
function ViewPresentSubscriptionComponent_div_2_div_9_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div", 24);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r437 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" This plan allows only ", ctx_r437.subPackage == null ? null : ctx_r437.subPackage.user_count == null ? null : ctx_r437.subPackage.user_count._text, " account(s) ");
} }
function ViewPresentSubscriptionComponent_div_2_div_25_ng_container_15_div_1_Template(rf, ctx) { if (rf & 1) {
    const _r444 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div", 34);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](2, "span", 35);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵlistener"]("click", function ViewPresentSubscriptionComponent_div_2_div_25_ng_container_15_div_1_Template_span_click_2_listener() { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵrestoreView"](_r444); const i_r441 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"]().index; const ctx_r443 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](3); const _r430 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵreference"](4); ctx_r443.selectedEmailIndex = i_r441; return ctx_r443.openModal(_r430, "confirm-box"); });
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](3);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const email_r440 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"]().$implicit;
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", email_r440, " ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", email_r440 ? "x" : " \u00A0", "");
} }
function ViewPresentSubscriptionComponent_div_2_div_25_ng_container_15_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementContainerStart"](0, 15);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](1, ViewPresentSubscriptionComponent_div_2_div_25_ng_container_15_div_1_Template, 4, 2, "div", 33);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementContainerEnd"]();
} if (rf & 2) {
    const email_r440 = ctx.$implicit;
    const ctx_r439 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](3);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx_r439.userEmail != email_r440);
} }
function ViewPresentSubscriptionComponent_div_2_div_25_Template(rf, ctx) { if (rf & 1) {
    const _r448 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div", 25);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](1, "div", 26);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](2, "h4");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](3, "Manage your accounts");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](4, "p", 27);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](5, " To add accounts to your subscription, you can ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](6, "br");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](7, "i", 28);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵlistener"]("click", function ViewPresentSubscriptionComponent_div_2_div_25_Template_i_click_7_listener() { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵrestoreView"](_r448); const ctx_r447 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](2); const _r432 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵreference"](6); return ctx_r447.openModal(_r432); });
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](8, " copy and paste");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](9, " from a .txt file. ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](10, "br");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](11, " Click the \"x\" button to remove an account. ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](12, "div", 29);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](13, "div", 30);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](14, "You");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](15, ViewPresentSubscriptionComponent_div_2_div_25_ng_container_15_Template, 2, 1, "ng-container", 31);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](16, "button", 32);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵlistener"]("click", function ViewPresentSubscriptionComponent_div_2_div_25_Template_button_click_16_listener() { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵrestoreView"](_r448); const ctx_r449 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](2); return ctx_r449.reload(); });
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](17, " Done ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r438 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](15);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngForOf", ctx_r438.emails);
} }
const _c0 = function (a0, a1) { return [a0, a1]; };
function ViewPresentSubscriptionComponent_div_2_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div", 5);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](1, "div", 6);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](2, "div", 7);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](3, "div", 8);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](4, "i", 9);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](5, ViewPresentSubscriptionComponent_div_2_h4_5_Template, 3, 3, "h4", 10);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](6, ViewPresentSubscriptionComponent_div_2_h4_6_Template, 3, 3, "h4", 10);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](7, "div", 11);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](8, ViewPresentSubscriptionComponent_div_2_div_8_Template, 2, 1, "div", 12);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](9, ViewPresentSubscriptionComponent_div_2_div_9_Template, 2, 1, "div", 13);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](10, "div", 14);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](11, "span", 15);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](12, " Subscription Date:");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](13, "span", 16);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](14);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](15, "div", 14);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](16, "span", 15);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](17, " Expiration Date: \u00A0");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](18, "span", 17);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](19);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](20, "div", 18);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](21, "button", 19);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](22, " Renew Plan ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](23, "button", 20);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](24, " Change Subscription Plan ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](25, ViewPresentSubscriptionComponent_div_2_div_25_Template, 18, 1, "div", 21);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r429 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](5);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx_r429.package.package_name == "single");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx_r429.package.package_name != "single");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx_r429.package.package_name != "single");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx_r429.package.package_name == "single");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](5);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", ctx_r429.package.date_start, " ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](5);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", ctx_r429.package.date_end, " ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("routerLink", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpureFunction2"](9, _c0, ctx_r429.appRoutes.singleSubscription, ctx_r429.package == null ? null : ctx_r429.package.package_name));
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("routerLink", ctx_r429.appRoutes.viewPackages);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx_r429.package.package_name != "single" && ctx_r429.package.user_type === "primary");
} }
function ViewPresentSubscriptionComponent_ng_template_3_Template(rf, ctx) { if (rf & 1) {
    const _r451 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "button", 36);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](1, " x ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](2, "mat-dialog-content");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](3, "p", 37);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](4);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](5, "div", 38);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](6, "button", 39);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵlistener"]("click", function ViewPresentSubscriptionComponent_ng_template_3_Template_button_click_6_listener() { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵrestoreView"](_r451); const ctx_r450 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](); return ctx_r450.removeEmail(ctx_r450.selectedEmailIndex); });
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](7, " Yes Remove ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](8, "button", 40);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](9, " Cancel ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r431 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("mat-dialog-close", true);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](4);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" Do you want to remove ", ctx_r431.emails[ctx_r431.selectedEmailIndex], " from your subscription? ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](4);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("mat-dialog-close", true);
} }
function ViewPresentSubscriptionComponent_ng_template_5_Template(rf, ctx) { if (rf & 1) {
    const _r453 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "button", 41);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](1, " x ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](2, "div", 42);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](3, "span");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](4, "Multiple Email Upload");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](5, "mat-dialog-content");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](6, "p");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](7, "Ensure you separate the emails with a comma");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](8, "div", 43);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](9, "textarea", 44);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵlistener"]("ngModelChange", function ViewPresentSubscriptionComponent_ng_template_5_Template_textarea_ngModelChange_9_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵrestoreView"](_r453); const ctx_r452 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](); return ctx_r452.emailsInString = $event; });
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](10, "button", 45);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵlistener"]("click", function ViewPresentSubscriptionComponent_ng_template_5_Template_button_click_10_listener() { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵrestoreView"](_r453); const ctx_r454 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](); return ctx_r454.saveMultiEmails(ctx_r454.emailsInString); });
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](11, " Save ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r433 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("mat-dialog-close", true);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](9);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngModel", ctx_r433.emailsInString);
} }
class ViewPresentSubscriptionComponent {
    constructor(generalService, toastr, dialog, service, authService) {
        this.generalService = generalService;
        this.toastr = toastr;
        this.dialog = dialog;
        this.service = service;
        this.authService = authService;
        this.appRoutes = src_app_config__WEBPACK_IMPORTED_MODULE_0__["appRoutes"];
        this.emails = [];
    }
    ngOnInit() {
        this.getUserSubscriptionStatus();
        this.userEmail = this.authService.getUserLocally().email;
        //  this.emailsInString = this.emails.join(",\n");
    }
    getUserSubscriptionStatus() {
        this.generalService.showLoader(true);
        this.service.getUsersSubscriptionStatus().subscribe((data) => {
            //data = this.generalService.xmlToJson(subscribedUser);
            this.generalService.showLoader(false);
            if (data.status._text && data.status._text != "Failed") {
                delete data.status;
                delete data.status_message;
                this.package = this.generalService.convertToOneLayerViewModel(data);
                this.package.package_name = this.package.package_name
                    .toLowerCase()
                    .includes("single")
                    ? "single"
                    : this.package.package_name;
                if (this.package.user_type === "primary" &&
                    !this.package.package_name.toLowerCase().includes("single")) {
                    this.getEmailsOnSubscription();
                }
                if (this.package.package_name.toLowerCase().includes("single")) {
                    this.getSingleSubscriptionDetails();
                }
                else {
                    this.getMultipleSubscriptionDetails();
                }
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.generalService.showLoader(false);
            this.toastr.error("Something went wrong");
        });
    }
    getSingleSubscriptionDetails() {
        this.generalService.showLoader(true);
        this.service.getSingleSubscription().subscribe((data) => {
            this.generalService.showLoader(false);
            if (data.status._text != "Failed") {
                delete data.status._text;
                this.subPackage = data.list.package.find((x) => x._attributes.payment_type.trim().toLowerCase() === "paid");
                this.subPackage.name._text = this.subPackage.name._text
                    .toLowerCase()
                    .trim()
                    .replace("user", "")
                    .trim();
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.generalService.showLoader(false);
            this.toastr.error("Something went wrong");
        });
    }
    getMultipleSubscriptionDetails() {
        this.generalService.showLoader(true);
        this.service.getMultiSubscription().subscribe((data) => {
            this.generalService.showLoader(false);
            if (data.status._text != "Failed") {
                delete data.status._text;
                this.subPackage = data.list.package.find((x) => x.name._text.toLowerCase().trim() ===
                    this.package.package_name.toLowerCase().trim());
                this.emails.length = +this.subPackage.user_count._text;
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.generalService.showLoader(false);
            this.toastr.error("Something went wrong");
        });
    }
    openModal(template, id = "") {
        this.dialog.open(template, {
            disableClose: true,
            id: id,
        });
    }
    saveMultiEmails(emails) {
        this.newEmails = emails.trim().split(",");
        this.savEmailsToSubscription(this.newEmails);
    }
    reload() {
        this.generalService.showLoader(true);
        setTimeout(() => {
            this.toastr.success("Completed");
            this.generalService.showLoader(false);
            location.reload();
        }, 1000);
    }
    savEmailsToSubscription(emails) {
        this.generalService.showLoader(true);
        this.service
            .addEmailsToSubscription(emails, this.package.subscription_id)
            .subscribe((data) => {
            this.generalService.showLoader(false);
            if (data.status._text != "Failed") {
                delete data.status;
                this.emails.length = +this.subPackage.user_count._text;
                this.toastr.success("Emails have been added to subscription");
                this.dialog.closeAll();
                location.reload();
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.generalService.showLoader(false);
            this.toastr.error("Something went wrong");
        });
    }
    removeEmail(emailIndex) {
        this.generalService.showLoader(true);
        this.service
            .deleteEmailFromSubscription(this.emails[emailIndex], this.package.subscription_id)
            .subscribe((data) => {
            this.generalService.showLoader(false);
            if (data.status._text != "Failed") {
                delete data.status;
                this.toastr.success(`${this.emails[emailIndex]} has been removed from subscription`);
                this.emails.splice(emailIndex, 1);
                this.emails.length = +this.subPackage.user_count._text;
                this.dialog.closeAll();
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.generalService.showLoader(false);
            this.toastr.error("Something went wrong");
        });
    }
    getEmailsOnSubscription() {
        this.generalService.showLoader(true);
        this.service
            .getEmailsOnSubscription(this.package.subscription_id)
            .subscribe((data) => {
            this.generalService.showLoader(false);
            if (data.status._text != "Failed") {
                delete data.status;
                this.emails = data.subscription_users.user.map((x) => x.email._text);
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.generalService.showLoader(false);
            this.toastr.error("Something went wrong");
        });
    }
}
ViewPresentSubscriptionComponent.ɵfac = function ViewPresentSubscriptionComponent_Factory(t) { return new (t || ViewPresentSubscriptionComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](src_app_core__WEBPACK_IMPORTED_MODULE_2__["GeneralService"]), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](ngx_toastr__WEBPACK_IMPORTED_MODULE_3__["ToastrService"]), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](_angular_material_dialog__WEBPACK_IMPORTED_MODULE_4__["MatDialog"]), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](src_app_core_plans_subscription_service__WEBPACK_IMPORTED_MODULE_5__["PlanSubscriptionService"]), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](src_app_core__WEBPACK_IMPORTED_MODULE_2__["AuthService"])); };
ViewPresentSubscriptionComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineComponent"]({ type: ViewPresentSubscriptionComponent, selectors: [["app-view-present-subscription"]], decls: 7, vars: 2, consts: [[1, "mw-100", "mb-5"], ["src", "./assets/images/back.png", "alt", "all packages", "width", "36px", "height", "36px", 3, "routerLink"], ["class", "d-flex flex-wrap", 4, "ngIf"], ["confirmRemoval", ""], ["multipleUpload", ""], [1, "d-flex", "flex-wrap"], [1, "card-white", "info", "p-4", "p-md-5", "mr-3", "mb-3", "position-relative"], [1, "type-name", "d-flex", "w-100", "text-center", "align-items-center", "justify-content-center"], [1, "circle", "bg-green-300", "mr-2"], [1, "far", "fas-mark"], ["class", "m-0", 4, "ngIf"], [1, "text-dark-grey"], ["class", "py-5 my-0", 4, "ngIf"], ["class", "py-5 my-3", 4, "ngIf"], [1, "d-flex", "flex-row", "flex-wrap", "pb-3", "align-items-center"], [1, ""], [1, "p-2", "d-flex", "justify-content-center", "date-box"], [1, "p-2", "d-flex", "justify-content-center", "pl-4", "date-box"], [1, "d-flex", "flex-column", "w-100"], [1, "btn", "bg-success", "bg-green-300", "mb-3", "w-100", "text-white", 3, "routerLink"], [1, "btn", "btn-outline-secondary", "w-100", 3, "routerLink"], ["class", "card-white p-4", 4, "ngIf"], [1, "m-0"], [1, "py-5", "my-0"], [1, "py-5", "my-3"], [1, "card-white", "p-4"], [1, "text-center"], [1, "text-medium-grey", "small-text"], [1, "bg-light-green", "link", "text-black-50", "p-1", "br-8", "pointer", 3, "click"], ["id", "email-account-box", 1, "w-100"], [1, "p-2", "bg-light-green", "w-100"], ["class", "", 4, "ngFor", "ngForOf"], [1, "btn", "btn-success", "bg-green-300", "mt-3", "w-100", "text-white", 3, "click"], ["class", "w-100 p-2 border-bottom d-flex justify-content-between", 4, "ngIf"], [1, "w-100", "p-2", "border-bottom", "d-flex", "justify-content-between"], [1, "text-light-grey", 3, "click"], ["id", "downloadBtnClose", "cdkFocusInitial", "false", 1, "md-close", "close", "text-white", "py-1", "px-2", 3, "mat-dialog-close"], [1, "px-md-5", "px-2", "text-white", "text-center"], [1, "d-flex", "align-items-center", "actions", "flex-md-row", "flex-column", "justify-content-around"], [1, "btn", "mt-3", "bg-white", "text-green-300", 3, "click"], ["cdkFocusInitial", "true", 1, "btn", "mt-3", "btn", "btn-outline-light", 3, "mat-dialog-close"], ["id", "downloadBtnClose", "cdkFocusInitial", "false", 1, "md-close", "close", "py-1", "px-2", 3, "mat-dialog-close"], ["mat-dialog-title", "", 1, "text-secondary"], [1, "d-flex", "align-items-center", "flex-column"], ["name", "emails", "rows", "10", 1, "w-100", "form-control", 3, "ngModel", "ngModelChange"], [1, "btn", "mt-3", "w-75", "btn-outline-secondary", 3, "click"]], template: function ViewPresentSubscriptionComponent_Template(rf, ctx) { if (rf & 1) {
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div", 0);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](1, "img", 1);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](2, ViewPresentSubscriptionComponent_div_2_Template, 26, 12, "div", 2);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](3, ViewPresentSubscriptionComponent_ng_template_3_Template, 10, 3, "ng-template", null, 3, _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplateRefExtractor"]);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](5, ViewPresentSubscriptionComponent_ng_template_5_Template, 12, 2, "ng-template", null, 4, _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplateRefExtractor"]);
    } if (rf & 2) {
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("routerLink", ctx.appRoutes.viewPackages);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx.package);
    } }, directives: [_angular_router__WEBPACK_IMPORTED_MODULE_6__["RouterLink"], _angular_common__WEBPACK_IMPORTED_MODULE_7__["NgIf"], _angular_common__WEBPACK_IMPORTED_MODULE_7__["NgForOf"], _angular_material_dialog__WEBPACK_IMPORTED_MODULE_4__["MatDialogClose"], _angular_material_dialog__WEBPACK_IMPORTED_MODULE_4__["MatDialogContent"], _angular_material_dialog__WEBPACK_IMPORTED_MODULE_4__["MatDialogTitle"], _angular_forms__WEBPACK_IMPORTED_MODULE_8__["DefaultValueAccessor"], _angular_forms__WEBPACK_IMPORTED_MODULE_8__["NgControlStatus"], _angular_forms__WEBPACK_IMPORTED_MODULE_8__["NgModel"]], pipes: [_angular_common__WEBPACK_IMPORTED_MODULE_7__["TitleCasePipe"]], styles: [".card-white[_ngcontent-%COMP%] {\n  border-radius: 8px;\n  background-color: white;\n  width: 100%;\n  max-width: 400px;\n}\n\n.circle[_ngcontent-%COMP%] {\n  height: 30px;\n  width: 30px;\n  border-radius: 50%;\n}\n\n.text-dark-grey[_ngcontent-%COMP%]   *[_ngcontent-%COMP%] {\n  color: #535353;\n}\n\n.d-flex[_ngcontent-%COMP%]   span.date-box[_ngcontent-%COMP%] {\n  background-color: #f8f9f9;\n  border-radius: 8px;\n  width: calc(100% - 150px);\n  color: #959595;\n  margin-left: 1rem;\n}\n\n.text-medium-grey[_ngcontent-%COMP%] {\n  color: #959595;\n}\n\n.small-text[_ngcontent-%COMP%] {\n  font-size: 12px;\n}\n\n.bg-light-green[_ngcontent-%COMP%] {\n  background-color: #39d28485;\n  cursor: pointer;\n}\n\n.bg-light-green.link[_ngcontent-%COMP%]:hover {\n  background-color: #39d283e0;\n  color: white;\n}\n\n#email-account-box[_ngcontent-%COMP%] {\n  max-height: 220px;\n  overflow-y: auto;\n}\n\n#email-account-box[_ngcontent-%COMP%]   *[_ngcontent-%COMP%] {\n  color: #3b3b3b;\n}\n\n#email-account-box[_ngcontent-%COMP%]   .text-light-grey[_ngcontent-%COMP%] {\n  color: #e5e5e5;\n}\n\n.actions[_ngcontent-%COMP%]   .btn[_ngcontent-%COMP%] {\n  width: 200px;\n}\n\n.br-8[_ngcontent-%COMP%] {\n  border-radius: 8px;\n}\n\n.btn-outline-secondary[_ngcontent-%COMP%] {\n  min-width: 100px;\n}\n\n@media (max-width: 425px) {\n  .d-flex[_ngcontent-%COMP%]   span.date-box[_ngcontent-%COMP%] {\n    width: 100%;\n    margin-left: auto;\n  }\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQHBhZ2Uvc3Vic2NyaXB0aW9ucy92aWV3LXByZXNlbnQtc3Vic2NyaXB0aW9uL0M6XFxsYXJhZ29uXFx3d3dcXGVyaXRhcHAvc3JjXFxhcHBcXEBwYWdlXFxzdWJzY3JpcHRpb25zXFx2aWV3LXByZXNlbnQtc3Vic2NyaXB0aW9uXFx2aWV3LXByZXNlbnQtc3Vic2NyaXB0aW9uLmNvbXBvbmVudC5zY3NzIiwic3JjL2FwcC9AcGFnZS9zdWJzY3JpcHRpb25zL3ZpZXctcHJlc2VudC1zdWJzY3JpcHRpb24vdmlldy1wcmVzZW50LXN1YnNjcmlwdGlvbi5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtFQUNFLGtCQUFBO0VBQ0EsdUJBQUE7RUFDQSxXQUFBO0VBQ0EsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLFlBQUE7RUFDQSxXQUFBO0VBQ0Esa0JBQUE7QUNDRjs7QURHRTtFQUNFLGNBQUE7QUNBSjs7QURLRTtFQUNFLHlCQUFBO0VBQ0Esa0JBQUE7RUFDQSx5QkFBQTtFQUNBLGNBQUE7RUFDQSxpQkFBQTtBQ0ZKOztBRE1BO0VBQ0UsY0FBQTtBQ0hGOztBRE1BO0VBQ0UsZUFBQTtBQ0hGOztBRE1BO0VBQ0UsMkJBQUE7RUFDQSxlQUFBO0FDSEY7O0FESUU7RUFDRSwyQkFBQTtFQUNBLFlBQUE7QUNGSjs7QURNQTtFQUNFLGlCQUFBO0VBQ0EsZ0JBQUE7QUNIRjs7QURJRTtFQUNFLGNBQUE7QUNGSjs7QURJRTtFQUNFLGNBQUE7QUNGSjs7QURNRTtFQUNFLFlBQUE7QUNISjs7QURNQTtFQUNFLGtCQUFBO0FDSEY7O0FETUE7RUFDRSxnQkFBQTtBQ0hGOztBRE1BO0VBRUk7SUFDRSxXQUFBO0lBQ0EsaUJBQUE7RUNKSjtBQUNGIiwiZmlsZSI6InNyYy9hcHAvQHBhZ2Uvc3Vic2NyaXB0aW9ucy92aWV3LXByZXNlbnQtc3Vic2NyaXB0aW9uL3ZpZXctcHJlc2VudC1zdWJzY3JpcHRpb24uY29tcG9uZW50LnNjc3MiLCJzb3VyY2VzQ29udGVudCI6WyIuY2FyZC13aGl0ZSB7XHJcbiAgYm9yZGVyLXJhZGl1czogOHB4O1xyXG4gIGJhY2tncm91bmQtY29sb3I6IHdoaXRlO1xyXG4gIHdpZHRoOiAxMDAlO1xyXG4gIG1heC13aWR0aDogNDAwcHg7XHJcbn1cclxuXHJcbi5jaXJjbGUge1xyXG4gIGhlaWdodDogMzBweDtcclxuICB3aWR0aDogMzBweDtcclxuICBib3JkZXItcmFkaXVzOiA1MCU7XHJcbn1cclxuXHJcbi50ZXh0LWRhcmstZ3JleSB7XHJcbiAgKiB7XHJcbiAgICBjb2xvcjogIzUzNTM1MztcclxuICB9XHJcbn1cclxuXHJcbi5kLWZsZXgge1xyXG4gIHNwYW4uZGF0ZS1ib3gge1xyXG4gICAgYmFja2dyb3VuZC1jb2xvcjogI2Y4ZjlmOTtcclxuICAgIGJvcmRlci1yYWRpdXM6IDhweDtcclxuICAgIHdpZHRoOiBjYWxjKDEwMCUgLSAxNTBweCk7XHJcbiAgICBjb2xvcjogIzk1OTU5NTtcclxuICAgIG1hcmdpbi1sZWZ0OiAxcmVtO1xyXG4gIH1cclxufVxyXG5cclxuLnRleHQtbWVkaXVtLWdyZXkge1xyXG4gIGNvbG9yOiAjOTU5NTk1O1xyXG59XHJcblxyXG4uc21hbGwtdGV4dCB7XHJcbiAgZm9udC1zaXplOiAxMnB4O1xyXG59XHJcblxyXG4uYmctbGlnaHQtZ3JlZW4ge1xyXG4gIGJhY2tncm91bmQtY29sb3I6ICMzOWQyODQ4NTtcclxuICBjdXJzb3I6IHBvaW50ZXI7XHJcbiAgJi5saW5rOmhvdmVyIHtcclxuICAgIGJhY2tncm91bmQtY29sb3I6ICMzOWQyODNlMDtcclxuICAgIGNvbG9yOiB3aGl0ZTtcclxuICB9XHJcbn1cclxuXHJcbiNlbWFpbC1hY2NvdW50LWJveCB7XHJcbiAgbWF4LWhlaWdodDogMjIwcHg7XHJcbiAgb3ZlcmZsb3cteTogYXV0bztcclxuICAqIHtcclxuICAgIGNvbG9yOiAjM2IzYjNiO1xyXG4gIH1cclxuICAudGV4dC1saWdodC1ncmV5IHtcclxuICAgIGNvbG9yOiAjZTVlNWU1O1xyXG4gIH1cclxufVxyXG4uYWN0aW9ucyB7XHJcbiAgLmJ0biB7XHJcbiAgICB3aWR0aDogMjAwcHg7XHJcbiAgfVxyXG59XHJcbi5ici04IHtcclxuICBib3JkZXItcmFkaXVzOiA4cHg7XHJcbn1cclxuXHJcbi5idG4tb3V0bGluZS1zZWNvbmRhcnkge1xyXG4gIG1pbi13aWR0aDogMTAwcHg7XHJcbn1cclxuXHJcbkBtZWRpYSAobWF4LXdpZHRoOiA0MjVweCkge1xyXG4gIC5kLWZsZXgge1xyXG4gICAgc3Bhbi5kYXRlLWJveCB7XHJcbiAgICAgIHdpZHRoOiAxMDAlO1xyXG4gICAgICBtYXJnaW4tbGVmdDogYXV0bztcclxuICAgIH1cclxuICB9XHJcbn1cclxuIiwiLmNhcmQtd2hpdGUge1xuICBib3JkZXItcmFkaXVzOiA4cHg7XG4gIGJhY2tncm91bmQtY29sb3I6IHdoaXRlO1xuICB3aWR0aDogMTAwJTtcbiAgbWF4LXdpZHRoOiA0MDBweDtcbn1cblxuLmNpcmNsZSB7XG4gIGhlaWdodDogMzBweDtcbiAgd2lkdGg6IDMwcHg7XG4gIGJvcmRlci1yYWRpdXM6IDUwJTtcbn1cblxuLnRleHQtZGFyay1ncmV5ICoge1xuICBjb2xvcjogIzUzNTM1Mztcbn1cblxuLmQtZmxleCBzcGFuLmRhdGUtYm94IHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2Y4ZjlmOTtcbiAgYm9yZGVyLXJhZGl1czogOHB4O1xuICB3aWR0aDogY2FsYygxMDAlIC0gMTUwcHgpO1xuICBjb2xvcjogIzk1OTU5NTtcbiAgbWFyZ2luLWxlZnQ6IDFyZW07XG59XG5cbi50ZXh0LW1lZGl1bS1ncmV5IHtcbiAgY29sb3I6ICM5NTk1OTU7XG59XG5cbi5zbWFsbC10ZXh0IHtcbiAgZm9udC1zaXplOiAxMnB4O1xufVxuXG4uYmctbGlnaHQtZ3JlZW4ge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMzlkMjg0ODU7XG4gIGN1cnNvcjogcG9pbnRlcjtcbn1cbi5iZy1saWdodC1ncmVlbi5saW5rOmhvdmVyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzM5ZDI4M2UwO1xuICBjb2xvcjogd2hpdGU7XG59XG5cbiNlbWFpbC1hY2NvdW50LWJveCB7XG4gIG1heC1oZWlnaHQ6IDIyMHB4O1xuICBvdmVyZmxvdy15OiBhdXRvO1xufVxuI2VtYWlsLWFjY291bnQtYm94ICoge1xuICBjb2xvcjogIzNiM2IzYjtcbn1cbiNlbWFpbC1hY2NvdW50LWJveCAudGV4dC1saWdodC1ncmV5IHtcbiAgY29sb3I6ICNlNWU1ZTU7XG59XG5cbi5hY3Rpb25zIC5idG4ge1xuICB3aWR0aDogMjAwcHg7XG59XG5cbi5ici04IHtcbiAgYm9yZGVyLXJhZGl1czogOHB4O1xufVxuXG4uYnRuLW91dGxpbmUtc2Vjb25kYXJ5IHtcbiAgbWluLXdpZHRoOiAxMDBweDtcbn1cblxuQG1lZGlhIChtYXgtd2lkdGg6IDQyNXB4KSB7XG4gIC5kLWZsZXggc3Bhbi5kYXRlLWJveCB7XG4gICAgd2lkdGg6IDEwMCU7XG4gICAgbWFyZ2luLWxlZnQ6IGF1dG87XG4gIH1cbn0iXX0= */"] });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵsetClassMetadata"](ViewPresentSubscriptionComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"],
        args: [{
                selector: "app-view-present-subscription",
                templateUrl: "./view-present-subscription.component.html",
                styleUrls: ["./view-present-subscription.component.scss"],
            }]
    }], function () { return [{ type: src_app_core__WEBPACK_IMPORTED_MODULE_2__["GeneralService"] }, { type: ngx_toastr__WEBPACK_IMPORTED_MODULE_3__["ToastrService"] }, { type: _angular_material_dialog__WEBPACK_IMPORTED_MODULE_4__["MatDialog"] }, { type: src_app_core_plans_subscription_service__WEBPACK_IMPORTED_MODULE_5__["PlanSubscriptionService"] }, { type: src_app_core__WEBPACK_IMPORTED_MODULE_2__["AuthService"] }]; }, null); })();


/***/ }),

/***/ "./src/app/@page/subscriptions/view-single-subscription/view-single-subscription.component.ts":
/*!****************************************************************************************************!*\
  !*** ./src/app/@page/subscriptions/view-single-subscription/view-single-subscription.component.ts ***!
  \****************************************************************************************************/
/*! exports provided: ViewSingleSubscriptionComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ViewSingleSubscriptionComponent", function() { return ViewSingleSubscriptionComponent; });
/* harmony import */ var src_app_config__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! src/app/config */ "./src/app/config.ts");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var src_environments_environment__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! src/environments/environment */ "./src/environments/environment.ts");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var src_app_core__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! src/app/@core */ "./src/app/@core/index.ts");
/* harmony import */ var ngx_toastr__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ngx-toastr */ "./node_modules/ngx-toastr/__ivy_ngcc__/fesm2015/ngx-toastr.js");
/* harmony import */ var _core_auth_service__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./../../../@core/auth.service */ "./src/app/@core/auth.service.ts");
/* harmony import */ var src_app_core_plans_subscription_service__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! src/app/@core/plans-subscription.service */ "./src/app/@core/plans-subscription.service.ts");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/common.js");










function ViewSingleSubscriptionComponent_div_3_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r455 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵclassMapInterpolate1"]("status text-center text-white w-100 p-1 mb-5 ", ctx_r455.status.worked ? "bg-success show" : "bg-danger show", "");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", ctx_r455.status == null ? null : ctx_r455.status.message, " ");
} }
function ViewSingleSubscriptionComponent_li_9_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "li");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r456 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"]("", ctx_r456.single == null ? null : ctx_r456.single.user_count == null ? null : ctx_r456.single.user_count._text, " account");
} }
function ViewSingleSubscriptionComponent_li_10_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "li");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r457 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" Covers up to ", ctx_r457.multiple == null ? null : ctx_r457.multiple.user_count == null ? null : ctx_r457.multiple.user_count._text, " premium accounts. ");
} }
function ViewSingleSubscriptionComponent_div_15_div_11_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](1, "span", 15);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](3, "currency");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](4, "small", 15);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](5, "/ account");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r459 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"]("", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind2"](3, 1, ctx_r459.pricing.monthly / (ctx_r459.multiple.user_count == null ? null : ctx_r459.multiple.user_count._text), "\u20A6" || false), " ");
} }
function ViewSingleSubscriptionComponent_div_15_div_24_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](1, "span", 15);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](3, "currency");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](4, "small", 15);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](5, "/ account");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r460 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"]("", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind2"](3, 1, ctx_r460.pricing.monthly * ((100 - ctx_r460.config[ctx_r460.type == "single" ? "single" : "multi" + "_termly_discount"]) / 100) / (ctx_r460.multiple.user_count == null ? null : ctx_r460.multiple.user_count._text), "\u20A6" || false), " ");
} }
function ViewSingleSubscriptionComponent_div_15_div_37_Template(rf, ctx) { if (rf & 1) {
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](1, "span", 15);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](3, "currency");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](4, "small", 15);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](5, "/ account");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r461 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"]("", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind2"](3, 1, ctx_r461.pricing.monthly * ((100 - ctx_r461.config[ctx_r461.type == "single" ? "single" : "multi" + "_session_discount"]) / 100) / (ctx_r461.multiple.user_count == null ? null : ctx_r461.multiple.user_count._text), "\u20A6" || false), " ");
} }
function ViewSingleSubscriptionComponent_div_15_Template(rf, ctx) { if (rf & 1) {
    const _r463 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵgetCurrentView"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div", 7);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](1, "div", 8);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](2, "h6", 9);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](3, "MONTHLY");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](4, "div", 10);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](5, "h3", 11);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](6);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](7, "currency");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](8, "span", 12);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](9, " / month");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](10, "div", 13);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](11, ViewSingleSubscriptionComponent_div_15_div_11_Template, 6, 4, "div", 5);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](12, "button", 14);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵlistener"]("click", function ViewSingleSubscriptionComponent_div_15_Template_button_click_12_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵrestoreView"](_r463); const ctx_r462 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](); return ctx_r462.subscribeUser($event, 1); });
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](13, " Subscribe now ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](14, "div", 8);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](15, "h6", 9);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](16, "TERMLY (3 MONTHS)");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](17, "div", 10);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](18, "h3", 11);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](19);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](20, "currency");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](21, "span", 12);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](22, " / term");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](23, "div", 13);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](24, ViewSingleSubscriptionComponent_div_15_div_24_Template, 6, 4, "div", 5);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](25, "button", 14);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵlistener"]("click", function ViewSingleSubscriptionComponent_div_15_Template_button_click_25_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵrestoreView"](_r463); const ctx_r464 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](); return ctx_r464.subscribeUser($event, ctx_r464.config.month_count_termly); });
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](26, " Subscribe now ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](27, "div", 8);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](28, "h6", 9);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](29, "SESSION WIDE (9 MONTHS)");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](30, "div", 10);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](31, "h3", 11);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](32);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](33, "currency");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](34, "span", 12);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](35, " / session");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](36, "div", 13);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](37, ViewSingleSubscriptionComponent_div_15_div_37_Template, 6, 4, "div", 5);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](38, "button", 14);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵlistener"]("click", function ViewSingleSubscriptionComponent_div_15_Template_button_click_38_listener($event) { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵrestoreView"](_r463); const ctx_r465 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"](); return ctx_r465.subscribeUser($event, ctx_r465.config.month_count_session); });
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](39, " Subscribe now ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
} if (rf & 2) {
    const ctx_r458 = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵnextContext"]();
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](6);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", ctx_r458.pricing ? _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind2"](7, 6, ctx_r458.pricing.monthly, "\u20A6") : "XXX", " ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](5);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx_r458.pricing && ctx_r458.multiple);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](8);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind2"](20, 9, ctx_r458.pricing.termly, "\u20A6" || false), " ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](5);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx_r458.pricing && ctx_r458.multiple);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](8);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind2"](33, 12, ctx_r458.pricing.sessionly, "\u20A6" || false), " ");
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](5);
    _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx_r458.pricing && ctx_r458.multiple);
} }
class ViewSingleSubscriptionComponent {
    constructor(route, router, generalService, toastr, authService, service) {
        this.route = route;
        this.router = router;
        this.generalService = generalService;
        this.toastr = toastr;
        this.authService = authService;
        this.service = service;
        this.pricing = {};
        this.appRoutes = src_app_config__WEBPACK_IMPORTED_MODULE_0__["appRoutes"];
    }
    ngOnInit() {
        this.getType();
        // this.toastr.error("data.status_message._text", "Oops");
    }
    getType() {
        this.route.paramMap.subscribe((param) => {
            this.type = param.get("type").toLowerCase().trim();
            this.getPackageConfig();
            // this.pricing = environment.pricing[this.type];
        });
    }
    subscribeUser(event, monthCount) {
        const amount = parseInt(event.target.parentElement.parentElement.children[1].children[0].textContent
            .trim()
            .replace("₦", "")
            .replace(",", ""));
        this.generalService.showLoader(true);
        this.createSubscriptionForUser(amount, monthCount);
    }
    getSingleSubscriptionDetails() {
        this.generalService.showLoader(true);
        this.service.getSingleSubscription().subscribe((data) => {
            this.generalService.showLoader(false);
            if (data.status._text != "Failed") {
                delete data.status._text;
                this.single = data.list.package.find((x) => x._attributes.payment_type.trim().toLowerCase() === "paid");
                this.getPricing(this.single);
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.generalService.showLoader(false);
            this.toastr.error("Something went wrong");
        });
    }
    getMultipleSubscriptionDetails() {
        this.generalService.showLoader(true);
        this.service.getMultiSubscription().subscribe((data) => {
            this.generalService.showLoader(false);
            if (data.status._text != "Failed") {
                delete data.status._text;
                this.multiple = data.list.package.find((x) => x.name._text.toLowerCase().trim() ===
                    this.type.toLowerCase().trim());
                this.getPricing(this.multiple, "multi");
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.generalService.showLoader(false);
            this.toastr.error("Something went wrong");
        });
    }
    getPackageConfig() {
        this.generalService.showLoader(true);
        this.service.getPackageConfig().subscribe((data) => {
            this.generalService.showLoader(false);
            if (data.status._text && data.status._text != "Failed") {
                delete data.status;
                delete data.status_message;
                this.config = this.generalService.convertToOneLayerViewModel(data);
                if (this.type === "single") {
                    this.getSingleSubscriptionDetails();
                }
                else {
                    this.getMultipleSubscriptionDetails();
                }
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.generalService.showLoader(false);
            this.toastr.error("Something went wrong");
        });
    }
    getPricing(data, type = "single") {
        this.pricing.monthly =
            +data.amount._text * +data.user_count._text * +data.month_count._text;
        this.pricing.termly =
            +data.amount._text *
                +data.user_count._text *
                +this.config.month_count_termly *
                ((100 - +this.config[type + "_termly_discount"]) / 100);
        this.pricing.sessionly =
            +data.amount._text *
                +data.user_count._text *
                +this.config.month_count_session *
                ((100 - +this.config[type + "_session_discount"]) / 100);
    }
    paymentCallback(response) {
        if (response.status != "success") {
            this.toastr.error("Payment failed please try again later");
            this.generalService.showLoader(false);
            return;
        }
        this.generalService.showLoader(true);
        this.confirmSubscription(this.subscriptionId, this.orderNumber, response.status);
        console.log({ response });
    }
    payWithPaystack(amount) {
        let handler = PaystackPop.setup({
            key: src_environments_environment__WEBPACK_IMPORTED_MODULE_2__["environment"].paystackPubKey,
            email: this.authService.getUserLocally().email,
            amount: amount * 100,
            currency: "NGN",
            ref: this.orderNumber,
            callback: (response) => {
                this.paymentCallback(response);
            },
            onClose: () => {
                this.generalService.showLoader(false);
                this.toastr.error("Payment Cancelled");
            },
        });
        handler.openIframe();
    }
    createSubscriptionForUser(amount, monthCount) {
        this.generalService.showLoader(true);
        const packageId = this.type === "single"
            ? this.single._attributes.package_id
            : this.multiple._attributes.package_id;
        this.service
            .createSubscription({
            package_id: packageId,
            total_cost: amount,
            month_count: monthCount,
        })
            .subscribe((data) => {
            this.generalService.showLoader(false);
            if (data.status._text && data.status._text != "Failed") {
                this.orderNumber = data.order_no._text;
                this.subscriptionId = data.subscription_id._text;
                this.generalService.showLoader(true);
                this.payWithPaystack(amount);
            }
            else {
                this.toastr.error(data.status_message._text, "Oops");
            }
        }, (error) => {
            this.toastr.error("An Error Occured while subscribing the user");
        });
    }
    confirmSubscription(subscriptionId, orderNumber, paystackStatus) {
        this.service
            .confirmSubscriptionOrder({
            subscription_id: subscriptionId,
            order_no: orderNumber,
            tranx_status: paystackStatus,
        })
            .subscribe((data) => {
            this.generalService.showLoader(false);
            if (data.status._text && data.status._text != "Failed") {
                this.status = {
                    worked: true,
                    message: data.status_message._text,
                };
                this.toastr.success("User has been successfully subscribed ", "", {
                    timeOut: 10000,
                });
                this.router.navigate([src_app_config__WEBPACK_IMPORTED_MODULE_0__["appRoutes"].viewPackages]);
            }
            else {
                this.status = { worked: false, message: data.status_message._text };
                this.toastr.error(data.status_message._text, "Oops", {
                    timeOut: 12000,
                });
            }
        }, (error) => {
            this.toastr.error("An Error Occured while subscribing the user");
        });
    }
}
ViewSingleSubscriptionComponent.ɵfac = function ViewSingleSubscriptionComponent_Factory(t) { return new (t || ViewSingleSubscriptionComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](_angular_router__WEBPACK_IMPORTED_MODULE_3__["ActivatedRoute"]), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](_angular_router__WEBPACK_IMPORTED_MODULE_3__["Router"]), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](src_app_core__WEBPACK_IMPORTED_MODULE_4__["GeneralService"]), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](ngx_toastr__WEBPACK_IMPORTED_MODULE_5__["ToastrService"]), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](_core_auth_service__WEBPACK_IMPORTED_MODULE_6__["AuthService"]), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](src_app_core_plans_subscription_service__WEBPACK_IMPORTED_MODULE_7__["PlanSubscriptionService"])); };
ViewSingleSubscriptionComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineComponent"]({ type: ViewSingleSubscriptionComponent, selectors: [["app-view-single-subscription"]], decls: 16, vars: 11, consts: [[1, "mw-100", "mb-5"], ["src", "./assets/images/back.png", "alt", "all packages", "width", "36px", "height", "36px", 3, "routerLink"], [1, "d-flex", "flex-wrap"], [3, "class", 4, "ngIf"], [1, "card-white", "info", "p-4", "mb-3", "position-relative"], [4, "ngIf"], ["class", "pricing", 4, "ngIf"], [1, "pricing"], [1, "card-white", "p-3", "mb-3"], [1, "font-weight-medium"], [1, "d-flex", "flex-row", "align-items-center", "py-2"], [1, "text-green-300"], [1, "font-weight-demi-bold"], [1, "d-flex", "flex-row", "align-items-center", "justify-content-between"], [1, "btn", "bg-green-300", "bg-success", "p-2", 3, "click"], [1, "text-grey"]], template: function ViewSingleSubscriptionComponent_Template(rf, ctx) { if (rf & 1) {
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](0, "div", 0);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelement"](1, "img", 1);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](2, "div", 2);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](3, ViewSingleSubscriptionComponent_div_3_Template, 2, 4, "div", 3);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](4, "div", 4);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](5, "div");
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](6);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipe"](7, "titlecase");
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](8, "ul");
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](9, ViewSingleSubscriptionComponent_li_9_Template, 2, 1, "li", 5);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](10, ViewSingleSubscriptionComponent_li_10_Template, 2, 1, "li", 5);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](11, "li");
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](12, "Access to unlimited resource content");
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementStart"](13, "li");
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtext"](14, "Payment can be made monthly, termly or session wide.");
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtemplate"](15, ViewSingleSubscriptionComponent_div_15_Template, 40, 15, "div", 6);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵelementEnd"]();
    } if (rf & 2) {
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("routerLink", ctx.appRoutes.viewPackages);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx.status);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](2);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵclassMapInterpolate1"]("type-name ", ctx.type, " w-75 text-center position-absolute");
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵtextInterpolate1"](" ", ctx.type === "single" ? "Single User" : _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵpipeBind1"](7, 9, "Multi User " + ctx.type), " ");
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](3);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx.type === "single");
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx.type !== "single");
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵadvance"](5);
        _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵproperty"]("ngIf", ctx.pricing && (ctx.single || ctx.multiple));
    } }, directives: [_angular_router__WEBPACK_IMPORTED_MODULE_3__["RouterLink"], _angular_common__WEBPACK_IMPORTED_MODULE_8__["NgIf"]], pipes: [_angular_common__WEBPACK_IMPORTED_MODULE_8__["TitleCasePipe"], _angular_common__WEBPACK_IMPORTED_MODULE_8__["CurrencyPipe"]], styles: [".card-white[_ngcontent-%COMP%] {\n  border-radius: 8px;\n  background-color: white;\n}\n\n.text-grey[_ngcontent-%COMP%] {\n  color: #535353a1;\n}\n\nh3[_ngcontent-%COMP%] {\n  margin-bottom: 0;\n}\n\n.status[_ngcontent-%COMP%] {\n  height: 40px;\n  display: none;\n}\n\n.status.show[_ngcontent-%COMP%] {\n  display: inline;\n}\n\n@keyframes show-status {\n  0% {\n    display: none;\n    opacity: 0;\n  }\n  20% {\n    display: inherit;\n    opacity: 1;\n  }\n  80% {\n    display: inherit;\n    opacity: 1;\n  }\n  100% {\n    display: none;\n    opacity: 0;\n  }\n}\n\nbutton[_ngcontent-%COMP%] {\n  font-size: small;\n  margin-left: auto;\n  height: auto;\n}\n\n.card-white.info[_ngcontent-%COMP%] {\n  max-width: 400px;\n  height: -moz-fit-content;\n  height: fit-content;\n  padding-top: 3.5rem !important;\n}\n\n.card-white.info[_ngcontent-%COMP%]   ul[_ngcontent-%COMP%] {\n  padding-top: 1rem;\n}\n\n.card-white.info[_ngcontent-%COMP%]   ul[_ngcontent-%COMP%]   li[_ngcontent-%COMP%] {\n  padding-bottom: 25px;\n  font-size: 17px;\n  color: #959595;\n}\n\n.card-white.info[_ngcontent-%COMP%]   ul[_ngcontent-%COMP%]   li[_ngcontent-%COMP%]:last-of-type {\n  padding-bottom: 0;\n}\n\nh6[_ngcontent-%COMP%] {\n  font-size: 14px;\n}\n\n.pricing[_ngcontent-%COMP%] {\n  margin-left: 2rem;\n}\n\n.pricing[_ngcontent-%COMP%]   .card-white[_ngcontent-%COMP%] {\n  min-width: 270px;\n}\n\n.type-name[_ngcontent-%COMP%] {\n  font-size: 25px;\n  top: -20px;\n  border-radius: 8px;\n  color: white;\n  padding: 7px;\n  right: calc(100% / 2 - 150px);\n}\n\n.type-name.single[_ngcontent-%COMP%] {\n  background-color: #d92f83;\n}\n\n.type-name.gold[_ngcontent-%COMP%] {\n  background-color: #f3ae18;\n}\n\n.type-name.silver[_ngcontent-%COMP%] {\n  background-color: #8d8d8d;\n}\n\n.type-name.platinum[_ngcontent-%COMP%] {\n  background-color: #4a5b6d;\n}\n\n@media (max-width: 420px) {\n  .pricing[_ngcontent-%COMP%] {\n    margin-left: 0;\n  }\n\n  .type-name[_ngcontent-%COMP%] {\n    right: 10%;\n  }\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvQHBhZ2Uvc3Vic2NyaXB0aW9ucy92aWV3LXNpbmdsZS1zdWJzY3JpcHRpb24vQzpcXGxhcmFnb25cXHd3d1xcZXJpdGFwcC9zcmNcXGFwcFxcQHBhZ2VcXHN1YnNjcmlwdGlvbnNcXHZpZXctc2luZ2xlLXN1YnNjcmlwdGlvblxcdmlldy1zaW5nbGUtc3Vic2NyaXB0aW9uLmNvbXBvbmVudC5zY3NzIiwic3JjL2FwcC9AcGFnZS9zdWJzY3JpcHRpb25zL3ZpZXctc2luZ2xlLXN1YnNjcmlwdGlvbi92aWV3LXNpbmdsZS1zdWJzY3JpcHRpb24uY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFDRSxrQkFBQTtFQUNBLHVCQUFBO0FDQ0Y7O0FERUE7RUFDRSxnQkFBQTtBQ0NGOztBREVBO0VBQ0UsZ0JBQUE7QUNDRjs7QURFQTtFQUNFLFlBQUE7RUFDQSxhQUFBO0FDQ0Y7O0FEQ0U7RUFDRSxlQUFBO0FDQ0o7O0FER0E7RUFDRTtJQUNFLGFBQUE7SUFDQSxVQUFBO0VDQUY7RURFQTtJQUNFLGdCQUFBO0lBQ0EsVUFBQTtFQ0FGO0VERUE7SUFDRSxnQkFBQTtJQUNBLFVBQUE7RUNBRjtFREVBO0lBQ0UsYUFBQTtJQUNBLFVBQUE7RUNBRjtBQUNGOztBREdBO0VBQ0UsZ0JBQUE7RUFDQSxpQkFBQTtFQUNBLFlBQUE7QUNERjs7QURJQTtFQUNFLGdCQUFBO0VBQ0Esd0JBQUE7RUFBQSxtQkFBQTtFQUNBLDhCQUFBO0FDREY7O0FERUU7RUFDRSxpQkFBQTtBQ0FKOztBREVJO0VBQ0Usb0JBQUE7RUFDQSxlQUFBO0VBQ0EsY0FBQTtBQ0FOOztBREVJO0VBQ0UsaUJBQUE7QUNBTjs7QURLQTtFQUNFLGVBQUE7QUNGRjs7QURLQTtFQUNFLGlCQUFBO0FDRkY7O0FER0U7RUFDRSxnQkFBQTtBQ0RKOztBREtBO0VBQ0UsZUFBQTtFQUNBLFVBQUE7RUFDQSxrQkFBQTtFQUNBLFlBQUE7RUFDQSxZQUFBO0VBQ0EsNkJBQUE7QUNGRjs7QURHRTtFQUNFLHlCQUFBO0FDREo7O0FER0U7RUFDRSx5QkFBQTtBQ0RKOztBREdFO0VBQ0UseUJBQUE7QUNESjs7QURHRTtFQUNFLHlCQUFBO0FDREo7O0FES0E7RUFDRTtJQUNFLGNBQUE7RUNGRjs7RURLQTtJQUNFLFVBQUE7RUNGRjtBQUNGIiwiZmlsZSI6InNyYy9hcHAvQHBhZ2Uvc3Vic2NyaXB0aW9ucy92aWV3LXNpbmdsZS1zdWJzY3JpcHRpb24vdmlldy1zaW5nbGUtc3Vic2NyaXB0aW9uLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLmNhcmQtd2hpdGUge1xyXG4gIGJvcmRlci1yYWRpdXM6IDhweDtcclxuICBiYWNrZ3JvdW5kLWNvbG9yOiB3aGl0ZTtcclxufVxyXG5cclxuLnRleHQtZ3JleSB7XHJcbiAgY29sb3I6ICM1MzUzNTNhMTtcclxufVxyXG5cclxuaDMge1xyXG4gIG1hcmdpbi1ib3R0b206IDA7XHJcbn1cclxuXHJcbi5zdGF0dXMge1xyXG4gIGhlaWdodDogNDBweDtcclxuICBkaXNwbGF5OiBub25lO1xyXG5cclxuICAmLnNob3cge1xyXG4gICAgZGlzcGxheTogaW5saW5lO1xyXG4gIH1cclxufVxyXG5cclxuQGtleWZyYW1lcyBzaG93LXN0YXR1cyB7XHJcbiAgMCUge1xyXG4gICAgZGlzcGxheTogbm9uZTtcclxuICAgIG9wYWNpdHk6IDA7XHJcbiAgfVxyXG4gIDIwJSB7XHJcbiAgICBkaXNwbGF5OiBpbmhlcml0O1xyXG4gICAgb3BhY2l0eTogMTtcclxuICB9XHJcbiAgODAlIHtcclxuICAgIGRpc3BsYXk6IGluaGVyaXQ7XHJcbiAgICBvcGFjaXR5OiAxO1xyXG4gIH1cclxuICAxMDAlIHtcclxuICAgIGRpc3BsYXk6IG5vbmU7XHJcbiAgICBvcGFjaXR5OiAwO1xyXG4gIH1cclxufVxyXG5cclxuYnV0dG9uIHtcclxuICBmb250LXNpemU6IHNtYWxsO1xyXG4gIG1hcmdpbi1sZWZ0OiBhdXRvO1xyXG4gIGhlaWdodDogYXV0bztcclxufVxyXG5cclxuLmNhcmQtd2hpdGUuaW5mbyB7XHJcbiAgbWF4LXdpZHRoOiA0MDBweDtcclxuICBoZWlnaHQ6IGZpdC1jb250ZW50O1xyXG4gIHBhZGRpbmctdG9wOiAzLjVyZW0gIWltcG9ydGFudDtcclxuICB1bCB7XHJcbiAgICBwYWRkaW5nLXRvcDogMXJlbTtcclxuXHJcbiAgICBsaSB7XHJcbiAgICAgIHBhZGRpbmctYm90dG9tOiAyNXB4O1xyXG4gICAgICBmb250LXNpemU6IDE3cHg7XHJcbiAgICAgIGNvbG9yOiAjOTU5NTk1O1xyXG4gICAgfVxyXG4gICAgbGk6bGFzdC1vZi10eXBlIHtcclxuICAgICAgcGFkZGluZy1ib3R0b206IDA7XHJcbiAgICB9XHJcbiAgfVxyXG59XHJcblxyXG5oNiB7XHJcbiAgZm9udC1zaXplOiAxNHB4O1xyXG59XHJcblxyXG4ucHJpY2luZyB7XHJcbiAgbWFyZ2luLWxlZnQ6IDJyZW07XHJcbiAgLmNhcmQtd2hpdGUge1xyXG4gICAgbWluLXdpZHRoOiAyNzBweDtcclxuICB9XHJcbn1cclxuXHJcbi50eXBlLW5hbWUge1xyXG4gIGZvbnQtc2l6ZTogMjVweDtcclxuICB0b3A6IC0yMHB4O1xyXG4gIGJvcmRlci1yYWRpdXM6IDhweDtcclxuICBjb2xvcjogd2hpdGU7XHJcbiAgcGFkZGluZzogN3B4O1xyXG4gIHJpZ2h0OiBjYWxjKDEwMCUgLyAyIC0gMTUwcHgpO1xyXG4gICYuc2luZ2xlIHtcclxuICAgIGJhY2tncm91bmQtY29sb3I6ICNkOTJmODM7XHJcbiAgfVxyXG4gICYuZ29sZCB7XHJcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjNhZTE4O1xyXG4gIH1cclxuICAmLnNpbHZlciB7XHJcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjOGQ4ZDhkO1xyXG4gIH1cclxuICAmLnBsYXRpbnVtIHtcclxuICAgIGJhY2tncm91bmQtY29sb3I6ICM0YTViNmQ7XHJcbiAgfVxyXG59XHJcblxyXG5AbWVkaWEgKG1heC13aWR0aDogNDIwcHgpIHtcclxuICAucHJpY2luZyB7XHJcbiAgICBtYXJnaW4tbGVmdDogMDtcclxuICB9XHJcblxyXG4gIC50eXBlLW5hbWUge1xyXG4gICAgcmlnaHQ6IDEwJTtcclxuICB9XHJcbn1cclxuIiwiLmNhcmQtd2hpdGUge1xuICBib3JkZXItcmFkaXVzOiA4cHg7XG4gIGJhY2tncm91bmQtY29sb3I6IHdoaXRlO1xufVxuXG4udGV4dC1ncmV5IHtcbiAgY29sb3I6ICM1MzUzNTNhMTtcbn1cblxuaDMge1xuICBtYXJnaW4tYm90dG9tOiAwO1xufVxuXG4uc3RhdHVzIHtcbiAgaGVpZ2h0OiA0MHB4O1xuICBkaXNwbGF5OiBub25lO1xufVxuLnN0YXR1cy5zaG93IHtcbiAgZGlzcGxheTogaW5saW5lO1xufVxuXG5Aa2V5ZnJhbWVzIHNob3ctc3RhdHVzIHtcbiAgMCUge1xuICAgIGRpc3BsYXk6IG5vbmU7XG4gICAgb3BhY2l0eTogMDtcbiAgfVxuICAyMCUge1xuICAgIGRpc3BsYXk6IGluaGVyaXQ7XG4gICAgb3BhY2l0eTogMTtcbiAgfVxuICA4MCUge1xuICAgIGRpc3BsYXk6IGluaGVyaXQ7XG4gICAgb3BhY2l0eTogMTtcbiAgfVxuICAxMDAlIHtcbiAgICBkaXNwbGF5OiBub25lO1xuICAgIG9wYWNpdHk6IDA7XG4gIH1cbn1cbmJ1dHRvbiB7XG4gIGZvbnQtc2l6ZTogc21hbGw7XG4gIG1hcmdpbi1sZWZ0OiBhdXRvO1xuICBoZWlnaHQ6IGF1dG87XG59XG5cbi5jYXJkLXdoaXRlLmluZm8ge1xuICBtYXgtd2lkdGg6IDQwMHB4O1xuICBoZWlnaHQ6IGZpdC1jb250ZW50O1xuICBwYWRkaW5nLXRvcDogMy41cmVtICFpbXBvcnRhbnQ7XG59XG4uY2FyZC13aGl0ZS5pbmZvIHVsIHtcbiAgcGFkZGluZy10b3A6IDFyZW07XG59XG4uY2FyZC13aGl0ZS5pbmZvIHVsIGxpIHtcbiAgcGFkZGluZy1ib3R0b206IDI1cHg7XG4gIGZvbnQtc2l6ZTogMTdweDtcbiAgY29sb3I6ICM5NTk1OTU7XG59XG4uY2FyZC13aGl0ZS5pbmZvIHVsIGxpOmxhc3Qtb2YtdHlwZSB7XG4gIHBhZGRpbmctYm90dG9tOiAwO1xufVxuXG5oNiB7XG4gIGZvbnQtc2l6ZTogMTRweDtcbn1cblxuLnByaWNpbmcge1xuICBtYXJnaW4tbGVmdDogMnJlbTtcbn1cbi5wcmljaW5nIC5jYXJkLXdoaXRlIHtcbiAgbWluLXdpZHRoOiAyNzBweDtcbn1cblxuLnR5cGUtbmFtZSB7XG4gIGZvbnQtc2l6ZTogMjVweDtcbiAgdG9wOiAtMjBweDtcbiAgYm9yZGVyLXJhZGl1czogOHB4O1xuICBjb2xvcjogd2hpdGU7XG4gIHBhZGRpbmc6IDdweDtcbiAgcmlnaHQ6IGNhbGMoMTAwJSAvIDIgLSAxNTBweCk7XG59XG4udHlwZS1uYW1lLnNpbmdsZSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNkOTJmODM7XG59XG4udHlwZS1uYW1lLmdvbGQge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjNhZTE4O1xufVxuLnR5cGUtbmFtZS5zaWx2ZXIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjOGQ4ZDhkO1xufVxuLnR5cGUtbmFtZS5wbGF0aW51bSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICM0YTViNmQ7XG59XG5cbkBtZWRpYSAobWF4LXdpZHRoOiA0MjBweCkge1xuICAucHJpY2luZyB7XG4gICAgbWFyZ2luLWxlZnQ6IDA7XG4gIH1cblxuICAudHlwZS1uYW1lIHtcbiAgICByaWdodDogMTAlO1xuICB9XG59Il19 */"] });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵsetClassMetadata"](ViewSingleSubscriptionComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"],
        args: [{
                selector: "app-view-single-subscription",
                templateUrl: "./view-single-subscription.component.html",
                styleUrls: ["./view-single-subscription.component.scss"],
            }]
    }], function () { return [{ type: _angular_router__WEBPACK_IMPORTED_MODULE_3__["ActivatedRoute"] }, { type: _angular_router__WEBPACK_IMPORTED_MODULE_3__["Router"] }, { type: src_app_core__WEBPACK_IMPORTED_MODULE_4__["GeneralService"] }, { type: ngx_toastr__WEBPACK_IMPORTED_MODULE_5__["ToastrService"] }, { type: _core_auth_service__WEBPACK_IMPORTED_MODULE_6__["AuthService"] }, { type: src_app_core_plans_subscription_service__WEBPACK_IMPORTED_MODULE_7__["PlanSubscriptionService"] }]; }, null); })();


/***/ })

}]);
//# sourceMappingURL=subscriptions-subscription-module-es2015.js.map