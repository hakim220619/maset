var j=(i,f)=>()=>(f||i((f={exports:{}}).exports,f),f.exports);var R=j((b,y)=>{(function(i,f){typeof b=="object"&&typeof y<"u"?y.exports=f():typeof define=="function"&&define.amd?define(f):(i=typeof globalThis<"u"?globalThis:i||self,i.FormValidation=i.FormValidation||{},i.FormValidation.plugins=i.FormValidation.plugins||{},i.FormValidation.plugins.L10n=f())})(void 0,function(){function i(t){"@babel/helpers - typeof";return i=typeof Symbol=="function"&&typeof Symbol.iterator=="symbol"?function(e){return typeof e}:function(e){return e&&typeof Symbol=="function"&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},i(t)}function f(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function m(t,e){for(var o=0;o<e.length;o++){var n=e[o];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}function v(t,e,o){return e&&m(t.prototype,e),Object.defineProperty(t,"prototype",{writable:!1}),t}function g(t,e){if(typeof e!="function"&&e!==null)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),Object.defineProperty(t,"prototype",{writable:!1}),e&&s(t,e)}function a(t){return a=Object.setPrototypeOf?Object.getPrototypeOf.bind():function(o){return o.__proto__||Object.getPrototypeOf(o)},a(t)}function s(t,e){return s=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(n,r){return n.__proto__=r,n},s(t,e)}function O(){if(typeof Reflect>"u"||!Reflect.construct||Reflect.construct.sham)return!1;if(typeof Proxy=="function")return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],function(){})),!0}catch{return!1}}function h(t){if(t===void 0)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}function _(t,e){if(e&&(typeof e=="object"||typeof e=="function"))return e;if(e!==void 0)throw new TypeError("Derived constructors may only return object or undefined");return h(t)}function P(t){var e=O();return function(){var n=a(t),r;if(e){var u=a(this).constructor;r=Reflect.construct(n,arguments,u)}else r=n.apply(this,arguments);return _(this,r)}}var w=FormValidation.Plugin,F=function(t){g(o,t);var e=P(o);function o(n){var r;return f(this,o),r=e.call(this,n),r.messageFilter=r.getMessage.bind(h(r)),r}return v(o,[{key:"install",value:function(){this.core.registerFilter("validator-message",this.messageFilter)}},{key:"uninstall",value:function(){this.core.deregisterFilter("validator-message",this.messageFilter)}},{key:"getMessage",value:function(r,u,l){if(this.opts[u]&&this.opts[u][l]){var c=this.opts[u][l],d=i(c);if(d==="object"&&c[r])return c[r];if(d==="function"){var p=c.apply(this,[u,l]);return p&&p[r]?p[r]:""}}return""}}]),o}(w);return F})});export default R();
