var P=(o,i)=>()=>(i||o((i={exports:{}}).exports,i),i.exports);var g=P((p,l)=>{(function(o,i){typeof p=="object"&&typeof l<"u"?l.exports=i():typeof define=="function"&&define.amd?define(i):(o=typeof globalThis<"u"?globalThis:o||self,o.FormValidation=o.FormValidation||{},o.FormValidation.plugins=o.FormValidation.plugins||{},o.FormValidation.plugins.Materialize=i())})(void 0,function(){function o(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function i(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}function d(t,e,r){return e&&i(t.prototype,e),Object.defineProperty(t,"prototype",{writable:!1}),t}function y(t,e){if(typeof e!="function"&&e!==null)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),Object.defineProperty(t,"prototype",{writable:!1}),e&&c(t,e)}function f(t){return f=Object.setPrototypeOf?Object.getPrototypeOf.bind():function(r){return r.__proto__||Object.getPrototypeOf(r)},f(t)}function c(t,e){return c=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(n,a){return n.__proto__=a,n},c(t,e)}function v(){if(typeof Reflect>"u"||!Reflect.construct||Reflect.construct.sham)return!1;if(typeof Proxy=="function")return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],function(){})),!0}catch{return!1}}function h(t){if(t===void 0)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}function m(t,e){if(e&&(typeof e=="object"||typeof e=="function"))return e;if(e!==void 0)throw new TypeError("Derived constructors may only return object or undefined");return h(t)}function b(t){var e=v();return function(){var n=f(t),a;if(e){var u=f(this).constructor;a=Reflect.construct(n,arguments,u)}else a=n.apply(this,arguments);return m(this,a)}}var _=FormValidation.utils.classSet,w=FormValidation.plugins.Framework,O=function(t){y(r,t);var e=b(r);function r(n){return o(this,r),e.call(this,Object.assign({},{eleInvalidClass:"validate invalid",eleValidClass:"validate valid",formClass:"fv-plugins-materialize",messageClass:"helper-text",rowInvalidClass:"fv-invalid-row",rowPattern:/^(.*)col(\s+)s[0-9]+(.*)$/,rowSelector:".row",rowValidClass:"fv-valid-row"},n))}return d(r,[{key:"onIconPlaced",value:function(a){var u=a.element.getAttribute("type"),s=a.element.parentElement;(u==="checkbox"||u==="radio")&&(s.parentElement.insertBefore(a.iconElement,s.nextSibling),_(a.iconElement,{"fv-plugins-icon-check":!0}))}}]),r}(w);return O})});export default g();
