(() => {
	var t = {
			7757: (t, e, o) => {
				t.exports = o(5666);
			},
			5666: (t) => {
				var e = (function (t) {
					"use strict";
					var e,
						o = Object.prototype,
						n = o.hasOwnProperty,
						a = "function" == typeof Symbol ? Symbol : {},
						s = a.iterator || "@@iterator",
						r = a.asyncIterator || "@@asyncIterator",
						i = a.toStringTag || "@@toStringTag";
					function l(t, e, o) {
						return (
							Object.defineProperty(t, e, {
								value: o,
								enumerable: !0,
								configurable: !0,
								writable: !0,
							}),
							t[e]
						);
					}
					try {
						l({}, "");
					} catch (t) {
						l = function (t, e, o) {
							return (t[e] = o);
						};
					}
					function c(t, e, o, n) {
						var a = e && e.prototype instanceof f ? e : f,
							s = Object.create(a.prototype),
							r = new P(n || []);
						return (
							(s._invoke = (function (t, e, o) {
								var n = d;
								return function (a, s) {
									if (n === m) throw new Error("Generator is already running");
									if (n === w) {
										if ("throw" === a) throw s;
										return O();
									}
									for (o.method = a, o.arg = s; ; ) {
										var r = o.delegate;
										if (r) {
											var i = A(r, o);
											if (i) {
												if (i === h) continue;
												return i;
											}
										}
										if ("next" === o.method) o.sent = o._sent = o.arg;
										else if ("throw" === o.method) {
											if (n === d) throw ((n = w), o.arg);
											o.dispatchException(o.arg);
										} else "return" === o.method && o.abrupt("return", o.arg);
										n = m;
										var l = u(t, e, o);
										if ("normal" === l.type) {
											if (((n = o.done ? w : p), l.arg === h)) continue;
											return { value: l.arg, done: o.done };
										}
										"throw" === l.type &&
											((n = w), (o.method = "throw"), (o.arg = l.arg));
									}
								};
							})(t, o, r)),
							s
						);
					}
					function u(t, e, o) {
						try {
							return { type: "normal", arg: t.call(e, o) };
						} catch (t) {
							return { type: "throw", arg: t };
						}
					}
					t.wrap = c;
					var d = "suspendedStart",
						p = "suspendedYield",
						m = "executing",
						w = "completed",
						h = {};
					function f() {}
					function g() {}
					function b() {}
					var y = {};
					y[s] = function () {
						return this;
					};
					var v = Object.getPrototypeOf,
						x = v && v(v(S([])));
					x && x !== o && n.call(x, s) && (y = x);
					var k = (b.prototype = f.prototype = Object.create(y));
					function C(t) {
						["next", "throw", "return"].forEach(function (e) {
							l(t, e, function (t) {
								return this._invoke(e, t);
							});
						});
					}
					function E(t, e) {
						function o(a, s, r, i) {
							var l = u(t[a], t, s);
							if ("throw" !== l.type) {
								var c = l.arg,
									d = c.value;
								return d && "object" == typeof d && n.call(d, "__await")
									? e.resolve(d.__await).then(
											function (t) {
												o("next", t, r, i);
											},
											function (t) {
												o("throw", t, r, i);
											}
									  )
									: e.resolve(d).then(
											function (t) {
												(c.value = t), r(c);
											},
											function (t) {
												return o("throw", t, r, i);
											}
									  );
							}
							i(l.arg);
						}
						var a;
						this._invoke = function (t, n) {
							function s() {
								return new e(function (e, a) {
									o(t, n, e, a);
								});
							}
							return (a = a ? a.then(s, s) : s());
						};
					}
					function A(t, o) {
						var n = t.iterator[o.method];
						if (n === e) {
							if (((o.delegate = null), "throw" === o.method)) {
								if (
									t.iterator.return &&
									((o.method = "return"),
									(o.arg = e),
									A(t, o),
									"throw" === o.method)
								)
									return h;
								(o.method = "throw"),
									(o.arg = new TypeError(
										"The iterator does not provide a 'throw' method"
									));
							}
							return h;
						}
						var a = u(n, t.iterator, o.arg);
						if ("throw" === a.type)
							return (
								(o.method = "throw"), (o.arg = a.arg), (o.delegate = null), h
							);
						var s = a.arg;
						return s
							? s.done
								? ((o[t.resultName] = s.value),
								  (o.next = t.nextLoc),
								  "return" !== o.method && ((o.method = "next"), (o.arg = e)),
								  (o.delegate = null),
								  h)
								: s
							: ((o.method = "throw"),
							  (o.arg = new TypeError("iterator result is not an object")),
							  (o.delegate = null),
							  h);
					}
					function B(t) {
						var e = { tryLoc: t[0] };
						1 in t && (e.catchLoc = t[1]),
							2 in t && ((e.finallyLoc = t[2]), (e.afterLoc = t[3])),
							this.tryEntries.push(e);
					}
					function L(t) {
						var e = t.completion || {};
						(e.type = "normal"), delete e.arg, (t.completion = e);
					}
					function P(t) {
						(this.tryEntries = [{ tryLoc: "root" }]),
							t.forEach(B, this),
							this.reset(!0);
					}
					function S(t) {
						if (t) {
							var o = t[s];
							if (o) return o.call(t);
							if ("function" == typeof t.next) return t;
							if (!isNaN(t.length)) {
								var a = -1,
									r = function o() {
										for (; ++a < t.length; )
											if (n.call(t, a))
												return (o.value = t[a]), (o.done = !1), o;
										return (o.value = e), (o.done = !0), o;
									};
								return (r.next = r);
							}
						}
						return { next: O };
					}
					function O() {
						return { value: e, done: !0 };
					}
					return (
						(g.prototype = k.constructor = b),
						(b.constructor = g),
						(g.displayName = l(b, i, "GeneratorFunction")),
						(t.isGeneratorFunction = function (t) {
							var e = "function" == typeof t && t.constructor;
							return (
								!!e &&
								(e === g || "GeneratorFunction" === (e.displayName || e.name))
							);
						}),
						(t.mark = function (t) {
							return (
								Object.setPrototypeOf
									? Object.setPrototypeOf(t, b)
									: ((t.__proto__ = b), l(t, i, "GeneratorFunction")),
								(t.prototype = Object.create(k)),
								t
							);
						}),
						(t.awrap = function (t) {
							return { __await: t };
						}),
						C(E.prototype),
						(E.prototype[r] = function () {
							return this;
						}),
						(t.AsyncIterator = E),
						(t.async = function (e, o, n, a, s) {
							void 0 === s && (s = Promise);
							var r = new E(c(e, o, n, a), s);
							return t.isGeneratorFunction(o)
								? r
								: r.next().then(function (t) {
										return t.done ? t.value : r.next();
								  });
						}),
						C(k),
						l(k, i, "Generator"),
						(k[s] = function () {
							return this;
						}),
						(k.toString = function () {
							return "[object Generator]";
						}),
						(t.keys = function (t) {
							var e = [];
							for (var o in t) e.push(o);
							return (
								e.reverse(),
								function o() {
									for (; e.length; ) {
										var n = e.pop();
										if (n in t) return (o.value = n), (o.done = !1), o;
									}
									return (o.done = !0), o;
								}
							);
						}),
						(t.values = S),
						(P.prototype = {
							constructor: P,
							reset: function (t) {
								if (
									((this.prev = 0),
									(this.next = 0),
									(this.sent = this._sent = e),
									(this.done = !1),
									(this.delegate = null),
									(this.method = "next"),
									(this.arg = e),
									this.tryEntries.forEach(L),
									!t)
								)
									for (var o in this)
										"t" === o.charAt(0) &&
											n.call(this, o) &&
											!isNaN(+o.slice(1)) &&
											(this[o] = e);
							},
							stop: function () {
								this.done = !0;
								var t = this.tryEntries[0].completion;
								if ("throw" === t.type) throw t.arg;
								return this.rval;
							},
							dispatchException: function (t) {
								if (this.done) throw t;
								var o = this;
								function a(n, a) {
									return (
										(i.type = "throw"),
										(i.arg = t),
										(o.next = n),
										a && ((o.method = "next"), (o.arg = e)),
										!!a
									);
								}
								for (var s = this.tryEntries.length - 1; s >= 0; --s) {
									var r = this.tryEntries[s],
										i = r.completion;
									if ("root" === r.tryLoc) return a("end");
									if (r.tryLoc <= this.prev) {
										var l = n.call(r, "catchLoc"),
											c = n.call(r, "finallyLoc");
										if (l && c) {
											if (this.prev < r.catchLoc) return a(r.catchLoc, !0);
											if (this.prev < r.finallyLoc) return a(r.finallyLoc);
										} else if (l) {
											if (this.prev < r.catchLoc) return a(r.catchLoc, !0);
										} else {
											if (!c)
												throw new Error(
													"try statement without catch or finally"
												);
											if (this.prev < r.finallyLoc) return a(r.finallyLoc);
										}
									}
								}
							},
							abrupt: function (t, e) {
								for (var o = this.tryEntries.length - 1; o >= 0; --o) {
									var a = this.tryEntries[o];
									if (
										a.tryLoc <= this.prev &&
										n.call(a, "finallyLoc") &&
										this.prev < a.finallyLoc
									) {
										var s = a;
										break;
									}
								}
								s &&
									("break" === t || "continue" === t) &&
									s.tryLoc <= e &&
									e <= s.finallyLoc &&
									(s = null);
								var r = s ? s.completion : {};
								return (
									(r.type = t),
									(r.arg = e),
									s
										? ((this.method = "next"), (this.next = s.finallyLoc), h)
										: this.complete(r)
								);
							},
							complete: function (t, e) {
								if ("throw" === t.type) throw t.arg;
								return (
									"break" === t.type || "continue" === t.type
										? (this.next = t.arg)
										: "return" === t.type
										? ((this.rval = this.arg = t.arg),
										  (this.method = "return"),
										  (this.next = "end"))
										: "normal" === t.type && e && (this.next = e),
									h
								);
							},
							finish: function (t) {
								for (var e = this.tryEntries.length - 1; e >= 0; --e) {
									var o = this.tryEntries[e];
									if (o.finallyLoc === t)
										return this.complete(o.completion, o.afterLoc), L(o), h;
								}
							},
							catch: function (t) {
								for (var e = this.tryEntries.length - 1; e >= 0; --e) {
									var o = this.tryEntries[e];
									if (o.tryLoc === t) {
										var n = o.completion;
										if ("throw" === n.type) {
											var a = n.arg;
											L(o);
										}
										return a;
									}
								}
								throw new Error("illegal catch attempt");
							},
							delegateYield: function (t, o, n) {
								return (
									(this.delegate = {
										iterator: S(t),
										resultName: o,
										nextLoc: n,
									}),
									"next" === this.method && (this.arg = e),
									h
								);
							},
						}),
						t
					);
				})(t.exports);
				try {
					regeneratorRuntime = e;
				} catch (t) {
					Function("r", "regeneratorRuntime = r")(e);
				}
			},
			6455: function (t) {
				(t.exports = (function () {
					"use strict";
					const t = Object.freeze({
							cancel: "cancel",
							backdrop: "backdrop",
							close: "close",
							esc: "esc",
							timer: "timer",
						}),
						e = "SweetAlert2:",
						o = (t) => {
							const e = [];
							for (let o = 0; o < t.length; o++)
								-1 === e.indexOf(t[o]) && e.push(t[o]);
							return e;
						},
						n = (t) => t.charAt(0).toUpperCase() + t.slice(1),
						a = (t) => Array.prototype.slice.call(t),
						s = (t) => {
							console.warn(
								"".concat(e, " ").concat("object" == typeof t ? t.join(" ") : t)
							);
						},
						r = (t) => {
							console.error("".concat(e, " ").concat(t));
						},
						i = [],
						l = (t) => {
							i.includes(t) || (i.push(t), s(t));
						},
						c = (t, e) => {
							l(
								'"'
									.concat(
										t,
										'" is deprecated and will be removed in the next major release. Please use "'
									)
									.concat(e, '" instead.')
							);
						},
						u = (t) => ("function" == typeof t ? t() : t),
						d = (t) => t && "function" == typeof t.toPromise,
						p = (t) => (d(t) ? t.toPromise() : Promise.resolve(t)),
						m = (t) => t && Promise.resolve(t) === t,
						w = (t) => "object" == typeof t && t.jquery,
						h = (t) => t instanceof Element || w(t),
						f = (t) => {
							const e = {};
							return (
								"object" != typeof t[0] || h(t[0])
									? ["title", "html", "icon"].forEach((o, n) => {
											const a = t[n];
											"string" == typeof a || h(a)
												? (e[o] = a)
												: void 0 !== a &&
												  r(
														"Unexpected type of "
															.concat(
																o,
																'! Expected "string" or "Element", got '
															)
															.concat(typeof a)
												  );
									  })
									: Object.assign(e, t[0]),
								e
							);
						},
						g = "swal2-",
						b = (t) => {
							const e = {};
							for (const o in t) e[t[o]] = g + t[o];
							return e;
						},
						y = b([
							"container",
							"shown",
							"height-auto",
							"iosfix",
							"popup",
							"modal",
							"no-backdrop",
							"no-transition",
							"toast",
							"toast-shown",
							"show",
							"hide",
							"close",
							"title",
							"html-container",
							"actions",
							"confirm",
							"deny",
							"cancel",
							"default-outline",
							"footer",
							"icon",
							"icon-content",
							"image",
							"input",
							"file",
							"range",
							"select",
							"radio",
							"checkbox",
							"label",
							"textarea",
							"inputerror",
							"input-label",
							"validation-message",
							"progress-steps",
							"active-progress-step",
							"progress-step",
							"progress-step-line",
							"loader",
							"loading",
							"styled",
							"top",
							"top-start",
							"top-end",
							"top-left",
							"top-right",
							"center",
							"center-start",
							"center-end",
							"center-left",
							"center-right",
							"bottom",
							"bottom-start",
							"bottom-end",
							"bottom-left",
							"bottom-right",
							"grow-row",
							"grow-column",
							"grow-fullscreen",
							"rtl",
							"timer-progress-bar",
							"timer-progress-bar-container",
							"scrollbar-measure",
							"icon-success",
							"icon-warning",
							"icon-info",
							"icon-question",
							"icon-error",
						]),
						v = b(["success", "warning", "info", "question", "error"]),
						x = () => document.body.querySelector(".".concat(y.container)),
						k = (t) => {
							const e = x();
							return e ? e.querySelector(t) : null;
						},
						C = (t) => k(".".concat(t)),
						E = () => C(y.popup),
						A = () => C(y.icon),
						B = () => C(y.title),
						L = () => C(y["html-container"]),
						P = () => C(y.image),
						S = () => C(y["progress-steps"]),
						O = () => C(y["validation-message"]),
						T = () => k(".".concat(y.actions, " .").concat(y.confirm)),
						j = () => k(".".concat(y.actions, " .").concat(y.deny)),
						I = () => C(y["input-label"]),
						z = () => k(".".concat(y.loader)),
						M = () => k(".".concat(y.actions, " .").concat(y.cancel)),
						q = () => C(y.actions),
						D = () => C(y.footer),
						H = () => C(y["timer-progress-bar"]),
						V = () => C(y.close),
						N =
							'\n  a[href],\n  area[href],\n  input:not([disabled]),\n  select:not([disabled]),\n  textarea:not([disabled]),\n  button:not([disabled]),\n  iframe,\n  object,\n  embed,\n  [tabindex="0"],\n  [contenteditable],\n  audio[controls],\n  video[controls],\n  summary\n',
						_ = () => {
							const t = a(
									E().querySelectorAll(
										'[tabindex]:not([tabindex="-1"]):not([tabindex="0"])'
									)
								).sort((t, e) =>
									(t = parseInt(t.getAttribute("tabindex"))) >
									(e = parseInt(e.getAttribute("tabindex")))
										? 1
										: t < e
										? -1
										: 0
								),
								e = a(E().querySelectorAll(N)).filter(
									(t) => "-1" !== t.getAttribute("tabindex")
								);
							return o(t.concat(e)).filter((t) => it(t));
						},
						F = () =>
							!U() && !document.body.classList.contains(y["no-backdrop"]),
						U = () => document.body.classList.contains(y["toast-shown"]),
						R = () => E().hasAttribute("data-loading"),
						Y = { previousBodyPadding: null },
						W = (t, e) => {
							if (((t.textContent = ""), e)) {
								const o = new DOMParser().parseFromString(e, "text/html");
								a(o.querySelector("head").childNodes).forEach((e) => {
									t.appendChild(e);
								}),
									a(o.querySelector("body").childNodes).forEach((e) => {
										t.appendChild(e);
									});
							}
						},
						Z = (t, e) => {
							if (!e) return !1;
							const o = e.split(/\s+/);
							for (let e = 0; e < o.length; e++)
								if (!t.classList.contains(o[e])) return !1;
							return !0;
						},
						$ = (t, e) => {
							a(t.classList).forEach((o) => {
								Object.values(y).includes(o) ||
									Object.values(v).includes(o) ||
									Object.values(e.showClass).includes(o) ||
									t.classList.remove(o);
							});
						},
						K = (t, e, o) => {
							if (($(t, e), e.customClass && e.customClass[o])) {
								if (
									"string" != typeof e.customClass[o] &&
									!e.customClass[o].forEach
								)
									return s(
										"Invalid type of customClass."
											.concat(o, '! Expected string or iterable object, got "')
											.concat(typeof e.customClass[o], '"')
									);
								Q(t, e.customClass[o]);
							}
						},
						G = (t, e) => {
							if (!e) return null;
							switch (e) {
								case "select":
								case "textarea":
								case "file":
									return et(t, y[e]);
								case "checkbox":
									return t.querySelector(".".concat(y.checkbox, " input"));
								case "radio":
									return (
										t.querySelector(".".concat(y.radio, " input:checked")) ||
										t.querySelector(".".concat(y.radio, " input:first-child"))
									);
								case "range":
									return t.querySelector(".".concat(y.range, " input"));
								default:
									return et(t, y.input);
							}
						},
						X = (t) => {
							if ((t.focus(), "file" !== t.type)) {
								const e = t.value;
								(t.value = ""), (t.value = e);
							}
						},
						J = (t, e, o) => {
							t &&
								e &&
								("string" == typeof e && (e = e.split(/\s+/).filter(Boolean)),
								e.forEach((e) => {
									t.forEach
										? t.forEach((t) => {
												o ? t.classList.add(e) : t.classList.remove(e);
										  })
										: o
										? t.classList.add(e)
										: t.classList.remove(e);
								}));
						},
						Q = (t, e) => {
							J(t, e, !0);
						},
						tt = (t, e) => {
							J(t, e, !1);
						},
						et = (t, e) => {
							for (let o = 0; o < t.childNodes.length; o++)
								if (Z(t.childNodes[o], e)) return t.childNodes[o];
						},
						ot = (t, e, o) => {
							o === "".concat(parseInt(o)) && (o = parseInt(o)),
								o || 0 === parseInt(o)
									? (t.style[e] = "number" == typeof o ? "".concat(o, "px") : o)
									: t.style.removeProperty(e);
						},
						nt = (t, e = "flex") => {
							t.style.display = e;
						},
						at = (t) => {
							t.style.display = "none";
						},
						st = (t, e, o, n) => {
							const a = t.querySelector(e);
							a && (a.style[o] = n);
						},
						rt = (t, e, o) => {
							e ? nt(t, o) : at(t);
						},
						it = (t) =>
							!(
								!t ||
								!(t.offsetWidth || t.offsetHeight || t.getClientRects().length)
							),
						lt = () => !it(T()) && !it(j()) && !it(M()),
						ct = (t) => !!(t.scrollHeight > t.clientHeight),
						ut = (t) => {
							const e = window.getComputedStyle(t),
								o = parseFloat(e.getPropertyValue("animation-duration") || "0"),
								n = parseFloat(
									e.getPropertyValue("transition-duration") || "0"
								);
							return o > 0 || n > 0;
						},
						dt = (t, e = !1) => {
							const o = H();
							it(o) &&
								(e && ((o.style.transition = "none"), (o.style.width = "100%")),
								setTimeout(() => {
									(o.style.transition = "width ".concat(t / 1e3, "s linear")),
										(o.style.width = "0%");
								}, 10));
						},
						pt = () => {
							const t = H(),
								e = parseInt(window.getComputedStyle(t).width);
							t.style.removeProperty("transition"), (t.style.width = "100%");
							const o = parseInt(window.getComputedStyle(t).width),
								n = parseInt((e / o) * 100);
							t.style.removeProperty("transition"),
								(t.style.width = "".concat(n, "%"));
						},
						mt = () =>
							"undefined" == typeof window || "undefined" == typeof document,
						wt = '\n <div aria-labelledby="'
							.concat(y.title, '" aria-describedby="')
							.concat(y["html-container"], '" class="')
							.concat(
								y.popup,
								'" tabindex="-1">\n   <button type="button" class="'
							)
							.concat(y.close, '"></button>\n   <ul class="')
							.concat(y["progress-steps"], '"></ul>\n   <div class="')
							.concat(y.icon, '"></div>\n   <img class="')
							.concat(y.image, '" />\n   <h2 class="')
							.concat(y.title, '" id="')
							.concat(y.title, '"></h2>\n   <div class="')
							.concat(y["html-container"], '" id="')
							.concat(y["html-container"], '"></div>\n   <input class="')
							.concat(y.input, '" />\n   <input type="file" class="')
							.concat(y.file, '" />\n   <div class="')
							.concat(
								y.range,
								'">\n     <input type="range" />\n     <output></output>\n   </div>\n   <select class="'
							)
							.concat(y.select, '"></select>\n   <div class="')
							.concat(y.radio, '"></div>\n   <label for="')
							.concat(y.checkbox, '" class="')
							.concat(
								y.checkbox,
								'">\n     <input type="checkbox" />\n     <span class="'
							)
							.concat(y.label, '"></span>\n   </label>\n   <textarea class="')
							.concat(y.textarea, '"></textarea>\n   <div class="')
							.concat(y["validation-message"], '" id="')
							.concat(y["validation-message"], '"></div>\n   <div class="')
							.concat(y.actions, '">\n     <div class="')
							.concat(y.loader, '"></div>\n     <button type="button" class="')
							.concat(
								y.confirm,
								'"></button>\n     <button type="button" class="'
							)
							.concat(y.deny, '"></button>\n     <button type="button" class="')
							.concat(y.cancel, '"></button>\n   </div>\n   <div class="')
							.concat(y.footer, '"></div>\n   <div class="')
							.concat(
								y["timer-progress-bar-container"],
								'">\n     <div class="'
							)
							.concat(y["timer-progress-bar"], '"></div>\n   </div>\n </div>\n')
							.replace(/(^|\n)\s*/g, ""),
						ht = () => {
							const t = x();
							return (
								!!t &&
								(t.remove(),
								tt(
									[document.documentElement, document.body],
									[y["no-backdrop"], y["toast-shown"], y["has-column"]]
								),
								!0)
							);
						},
						ft = () => {
							qn.isVisible() && qn.resetValidationMessage();
						},
						gt = () => {
							const t = E(),
								e = et(t, y.input),
								o = et(t, y.file),
								n = t.querySelector(".".concat(y.range, " input")),
								a = t.querySelector(".".concat(y.range, " output")),
								s = et(t, y.select),
								r = t.querySelector(".".concat(y.checkbox, " input")),
								i = et(t, y.textarea);
							(e.oninput = ft),
								(o.onchange = ft),
								(s.onchange = ft),
								(r.onchange = ft),
								(i.oninput = ft),
								(n.oninput = () => {
									ft(), (a.value = n.value);
								}),
								(n.onchange = () => {
									ft(), (n.nextSibling.value = n.value);
								});
						},
						bt = (t) => ("string" == typeof t ? document.querySelector(t) : t),
						yt = (t) => {
							const e = E();
							e.setAttribute("role", t.toast ? "alert" : "dialog"),
								e.setAttribute("aria-live", t.toast ? "polite" : "assertive"),
								t.toast || e.setAttribute("aria-modal", "true");
						},
						vt = (t) => {
							"rtl" === window.getComputedStyle(t).direction && Q(x(), y.rtl);
						},
						xt = (t) => {
							const e = ht();
							if (mt())
								return void r("SweetAlert2 requires document to initialize");
							const o = document.createElement("div");
							(o.className = y.container),
								e && Q(o, y["no-transition"]),
								W(o, wt);
							const n = bt(t.target);
							n.appendChild(o), yt(t), vt(n), gt();
						},
						kt = (t, e) => {
							t instanceof HTMLElement
								? e.appendChild(t)
								: "object" == typeof t
								? Ct(t, e)
								: t && W(e, t);
						},
						Ct = (t, e) => {
							t.jquery ? Et(e, t) : W(e, t.toString());
						},
						Et = (t, e) => {
							if (((t.textContent = ""), 0 in e))
								for (let o = 0; o in e; o++) t.appendChild(e[o].cloneNode(!0));
							else t.appendChild(e.cloneNode(!0));
						},
						At = (() => {
							if (mt()) return !1;
							const t = document.createElement("div"),
								e = {
									WebkitAnimation: "webkitAnimationEnd",
									OAnimation: "oAnimationEnd oanimationend",
									animation: "animationend",
								};
							for (const o in e)
								if (
									Object.prototype.hasOwnProperty.call(e, o) &&
									void 0 !== t.style[o]
								)
									return e[o];
							return !1;
						})(),
						Bt = () => {
							const t = document.createElement("div");
							(t.className = y["scrollbar-measure"]),
								document.body.appendChild(t);
							const e = t.getBoundingClientRect().width - t.clientWidth;
							return document.body.removeChild(t), e;
						},
						Lt = (t, e) => {
							const o = q(),
								n = z(),
								a = T(),
								s = j(),
								r = M();
							e.showConfirmButton || e.showDenyButton || e.showCancelButton
								? nt(o)
								: at(o),
								K(o, e, "actions"),
								St(a, "confirm", e),
								St(s, "deny", e),
								St(r, "cancel", e),
								Pt(a, s, r, e),
								e.reverseButtons &&
									(o.insertBefore(r, n),
									o.insertBefore(s, n),
									o.insertBefore(a, n)),
								W(n, e.loaderHtml),
								K(n, e, "loader");
						};
					function Pt(t, e, o, n) {
						if (!n.buttonsStyling) return tt([t, e, o], y.styled);
						Q([t, e, o], y.styled),
							n.confirmButtonColor &&
								((t.style.backgroundColor = n.confirmButtonColor),
								Q(t, y["default-outline"])),
							n.denyButtonColor &&
								((e.style.backgroundColor = n.denyButtonColor),
								Q(e, y["default-outline"])),
							n.cancelButtonColor &&
								((o.style.backgroundColor = n.cancelButtonColor),
								Q(o, y["default-outline"]));
					}
					function St(t, e, o) {
						rt(t, o["show".concat(n(e), "Button")], "inline-block"),
							W(t, o["".concat(e, "ButtonText")]),
							t.setAttribute("aria-label", o["".concat(e, "ButtonAriaLabel")]),
							(t.className = y[e]),
							K(t, o, "".concat(e, "Button")),
							Q(t, o["".concat(e, "ButtonClass")]);
					}
					function Ot(t, e) {
						"string" == typeof e
							? (t.style.background = e)
							: e ||
							  Q([document.documentElement, document.body], y["no-backdrop"]);
					}
					function Tt(t, e) {
						e in y
							? Q(t, y[e])
							: (s(
									'The "position" parameter is not valid, defaulting to "center"'
							  ),
							  Q(t, y.center));
					}
					function jt(t, e) {
						if (e && "string" == typeof e) {
							const o = "grow-".concat(e);
							o in y && Q(t, y[o]);
						}
					}
					const It = (t, e) => {
						const o = x();
						o &&
							(Ot(o, e.backdrop),
							Tt(o, e.position),
							jt(o, e.grow),
							K(o, e, "container"));
					};
					var zt = {
						promise: new WeakMap(),
						innerParams: new WeakMap(),
						domCache: new WeakMap(),
					};
					const Mt = [
							"input",
							"file",
							"range",
							"select",
							"radio",
							"checkbox",
							"textarea",
						],
						qt = (t, e) => {
							const o = E(),
								n = zt.innerParams.get(t),
								a = !n || e.input !== n.input;
							Mt.forEach((t) => {
								const n = y[t],
									s = et(o, n);
								Vt(t, e.inputAttributes), (s.className = n), a && at(s);
							}),
								e.input && (a && Dt(e), Nt(e));
						},
						Dt = (t) => {
							if (!Rt[t.input])
								return r(
									'Unexpected type of input! Expected "text", "email", "password", "number", "tel", "select", "radio", "checkbox", "textarea", "file" or "url", got "'.concat(
										t.input,
										'"'
									)
								);
							const e = Ut(t.input),
								o = Rt[t.input](e, t);
							nt(o),
								setTimeout(() => {
									X(o);
								});
						},
						Ht = (t) => {
							for (let e = 0; e < t.attributes.length; e++) {
								const o = t.attributes[e].name;
								["type", "value", "style"].includes(o) || t.removeAttribute(o);
							}
						},
						Vt = (t, e) => {
							const o = G(E(), t);
							if (o) {
								Ht(o);
								for (const t in e) o.setAttribute(t, e[t]);
							}
						},
						Nt = (t) => {
							const e = Ut(t.input);
							t.customClass && Q(e, t.customClass.input);
						},
						_t = (t, e) => {
							(t.placeholder && !e.inputPlaceholder) ||
								(t.placeholder = e.inputPlaceholder);
						},
						Ft = (t, e, o) => {
							if (o.inputLabel) {
								t.id = y.input;
								const n = document.createElement("label"),
									a = y["input-label"];
								n.setAttribute("for", t.id),
									(n.className = a),
									Q(n, o.customClass.inputLabel),
									(n.innerText = o.inputLabel),
									e.insertAdjacentElement("beforebegin", n);
							}
						},
						Ut = (t) => {
							const e = y[t] ? y[t] : y.input;
							return et(E(), e);
						},
						Rt = {};
					(Rt.text =
						Rt.email =
						Rt.password =
						Rt.number =
						Rt.tel =
						Rt.url =
							(t, e) => (
								"string" == typeof e.inputValue ||
								"number" == typeof e.inputValue
									? (t.value = e.inputValue)
									: m(e.inputValue) ||
									  s(
											'Unexpected type of inputValue! Expected "string", "number" or "Promise", got "'.concat(
												typeof e.inputValue,
												'"'
											)
									  ),
								Ft(t, t, e),
								_t(t, e),
								(t.type = e.input),
								t
							)),
						(Rt.file = (t, e) => (Ft(t, t, e), _t(t, e), t)),
						(Rt.range = (t, e) => {
							const o = t.querySelector("input"),
								n = t.querySelector("output");
							return (
								(o.value = e.inputValue),
								(o.type = e.input),
								(n.value = e.inputValue),
								Ft(o, t, e),
								t
							);
						}),
						(Rt.select = (t, e) => {
							if (((t.textContent = ""), e.inputPlaceholder)) {
								const o = document.createElement("option");
								W(o, e.inputPlaceholder),
									(o.value = ""),
									(o.disabled = !0),
									(o.selected = !0),
									t.appendChild(o);
							}
							return Ft(t, t, e), t;
						}),
						(Rt.radio = (t) => ((t.textContent = ""), t)),
						(Rt.checkbox = (t, e) => {
							const o = G(E(), "checkbox");
							(o.value = 1),
								(o.id = y.checkbox),
								(o.checked = Boolean(e.inputValue));
							const n = t.querySelector("span");
							return W(n, e.inputPlaceholder), t;
						}),
						(Rt.textarea = (t, e) => {
							(t.value = e.inputValue), _t(t, e), Ft(t, t, e);
							const o = (t) =>
								parseInt(window.getComputedStyle(t).marginLeft) +
								parseInt(window.getComputedStyle(t).marginRight);
							return (
								setTimeout(() => {
									if ("MutationObserver" in window) {
										const e = parseInt(window.getComputedStyle(E()).width);
										new MutationObserver(() => {
											const n = t.offsetWidth + o(t);
											E().style.width = n > e ? "".concat(n, "px") : null;
										}).observe(t, {
											attributes: !0,
											attributeFilter: ["style"],
										});
									}
								}),
								t
							);
						});
					const Yt = (t, e) => {
							const o = L();
							K(o, e, "htmlContainer"),
								e.html
									? (kt(e.html, o), nt(o, "block"))
									: e.text
									? ((o.textContent = e.text), nt(o, "block"))
									: at(o),
								qt(t, e);
						},
						Wt = (t, e) => {
							const o = D();
							rt(o, e.footer), e.footer && kt(e.footer, o), K(o, e, "footer");
						},
						Zt = (t, e) => {
							const o = V();
							W(o, e.closeButtonHtml),
								K(o, e, "closeButton"),
								rt(o, e.showCloseButton),
								o.setAttribute("aria-label", e.closeButtonAriaLabel);
						},
						$t = (t, e) => {
							const o = zt.innerParams.get(t),
								n = A();
							return o && e.icon === o.icon
								? (Xt(n, e), void Kt(n, e))
								: e.icon || e.iconHtml
								? e.icon && -1 === Object.keys(v).indexOf(e.icon)
									? (r(
											'Unknown icon! Expected "success", "error", "warning", "info" or "question", got "'.concat(
												e.icon,
												'"'
											)
									  ),
									  at(n))
									: (nt(n), Xt(n, e), Kt(n, e), void Q(n, e.showClass.icon))
								: at(n);
						},
						Kt = (t, e) => {
							for (const o in v) e.icon !== o && tt(t, v[o]);
							Q(t, v[e.icon]), Jt(t, e), Gt(), K(t, e, "icon");
						},
						Gt = () => {
							const t = E(),
								e = window
									.getComputedStyle(t)
									.getPropertyValue("background-color"),
								o = t.querySelectorAll(
									"[class^=swal2-success-circular-line], .swal2-success-fix"
								);
							for (let t = 0; t < o.length; t++) o[t].style.backgroundColor = e;
						},
						Xt = (t, e) => {
							(t.textContent = ""),
								e.iconHtml
									? W(t, Qt(e.iconHtml))
									: "success" === e.icon
									? W(
											t,
											'\n      <div class="swal2-success-circular-line-left"></div>\n      <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>\n      <div class="swal2-success-ring"></div> <div class="swal2-success-fix"></div>\n      <div class="swal2-success-circular-line-right"></div>\n    '
									  )
									: "error" === e.icon
									? W(
											t,
											'\n      <span class="swal2-x-mark">\n        <span class="swal2-x-mark-line-left"></span>\n        <span class="swal2-x-mark-line-right"></span>\n      </span>\n    '
									  )
									: W(
											t,
											Qt({ question: "?", warning: "!", info: "i" }[e.icon])
									  );
						},
						Jt = (t, e) => {
							if (e.iconColor) {
								(t.style.color = e.iconColor),
									(t.style.borderColor = e.iconColor);
								for (const o of [
									".swal2-success-line-tip",
									".swal2-success-line-long",
									".swal2-x-mark-line-left",
									".swal2-x-mark-line-right",
								])
									st(t, o, "backgroundColor", e.iconColor);
								st(t, ".swal2-success-ring", "borderColor", e.iconColor);
							}
						},
						Qt = (t) =>
							'<div class="'
								.concat(y["icon-content"], '">')
								.concat(t, "</div>"),
						te = (t, e) => {
							const o = P();
							if (!e.imageUrl) return at(o);
							nt(o, ""),
								o.setAttribute("src", e.imageUrl),
								o.setAttribute("alt", e.imageAlt),
								ot(o, "width", e.imageWidth),
								ot(o, "height", e.imageHeight),
								(o.className = y.image),
								K(o, e, "image");
						},
						ee = (t) => {
							const e = document.createElement("li");
							return Q(e, y["progress-step"]), W(e, t), e;
						},
						oe = (t) => {
							const e = document.createElement("li");
							return (
								Q(e, y["progress-step-line"]),
								t.progressStepsDistance &&
									(e.style.width = t.progressStepsDistance),
								e
							);
						},
						ne = (t, e) => {
							const o = S();
							if (!e.progressSteps || 0 === e.progressSteps.length)
								return at(o);
							nt(o),
								(o.textContent = ""),
								e.currentProgressStep >= e.progressSteps.length &&
									s(
										"Invalid currentProgressStep parameter, it should be less than progressSteps.length (currentProgressStep like JS arrays starts from 0)"
									),
								e.progressSteps.forEach((t, n) => {
									const a = ee(t);
									if (
										(o.appendChild(a),
										n === e.currentProgressStep &&
											Q(a, y["active-progress-step"]),
										n !== e.progressSteps.length - 1)
									) {
										const t = oe(e);
										o.appendChild(t);
									}
								});
						},
						ae = (t, e) => {
							const o = B();
							rt(o, e.title || e.titleText, "block"),
								e.title && kt(e.title, o),
								e.titleText && (o.innerText = e.titleText),
								K(o, e, "title");
						},
						se = (t, e) => {
							const o = x(),
								n = E();
							e.toast
								? (ot(o, "width", e.width),
								  (n.style.width = "100%"),
								  n.insertBefore(z(), A()))
								: ot(n, "width", e.width),
								ot(n, "padding", e.padding),
								e.background && (n.style.background = e.background),
								at(O()),
								re(n, e);
						},
						re = (t, e) => {
							(t.className = ""
								.concat(y.popup, " ")
								.concat(it(t) ? e.showClass.popup : "")),
								e.toast
									? (Q(
											[document.documentElement, document.body],
											y["toast-shown"]
									  ),
									  Q(t, y.toast))
									: Q(t, y.modal),
								K(t, e, "popup"),
								"string" == typeof e.customClass && Q(t, e.customClass),
								e.icon && Q(t, y["icon-".concat(e.icon)]);
						},
						ie = (t, e) => {
							se(t, e),
								It(t, e),
								ne(t, e),
								$t(t, e),
								te(t, e),
								ae(t, e),
								Zt(t, e),
								Yt(t, e),
								Lt(t, e),
								Wt(t, e),
								"function" == typeof e.didRender && e.didRender(E());
						},
						le = () => it(E()),
						ce = () => T() && T().click(),
						ue = () => j() && j().click(),
						de = () => M() && M().click();
					function pe(...t) {
						return new this(...t);
					}
					function me(t) {
						class e extends this {
							_main(e, o) {
								return super._main(e, Object.assign({}, t, o));
							}
						}
						return e;
					}
					const we = (t) => {
							let e = E();
							e || qn.fire(), (e = E());
							const o = z();
							U() ? at(A()) : he(e, t),
								nt(o),
								e.setAttribute("data-loading", !0),
								e.setAttribute("aria-busy", !0),
								e.focus();
						},
						he = (t, e) => {
							const o = q(),
								n = z();
							!e && it(T()) && (e = T()),
								nt(o),
								e &&
									(at(e),
									n.setAttribute("data-button-to-replace", e.className)),
								n.parentNode.insertBefore(n, e),
								Q([t, o], y.loading);
						},
						fe = 100,
						ge = {},
						be = () => {
							ge.previousActiveElement && ge.previousActiveElement.focus
								? (ge.previousActiveElement.focus(),
								  (ge.previousActiveElement = null))
								: document.body && document.body.focus();
						},
						ye = (t) =>
							new Promise((e) => {
								if (!t) return e();
								const o = window.scrollX,
									n = window.scrollY;
								(ge.restoreFocusTimeout = setTimeout(() => {
									be(), e();
								}, fe)),
									window.scrollTo(o, n);
							}),
						ve = () => ge.timeout && ge.timeout.getTimerLeft(),
						xe = () => {
							if (ge.timeout) return pt(), ge.timeout.stop();
						},
						ke = () => {
							if (ge.timeout) {
								const t = ge.timeout.start();
								return dt(t), t;
							}
						},
						Ce = () => {
							const t = ge.timeout;
							return t && (t.running ? xe() : ke());
						},
						Ee = (t) => {
							if (ge.timeout) {
								const e = ge.timeout.increase(t);
								return dt(e, !0), e;
							}
						},
						Ae = () => ge.timeout && ge.timeout.isRunning();
					let Be = !1;
					const Le = {};
					function Pe(t = "data-swal-template") {
						(Le[t] = this),
							Be || (document.body.addEventListener("click", Se), (Be = !0));
					}
					const Se = (t) => {
							for (let e = t.target; e && e !== document; e = e.parentNode)
								for (const t in Le) {
									const o = e.getAttribute(t);
									if (o) return void Le[t].fire({ template: o });
								}
						},
						Oe = {
							title: "",
							titleText: "",
							text: "",
							html: "",
							footer: "",
							icon: void 0,
							iconColor: void 0,
							iconHtml: void 0,
							template: void 0,
							toast: !1,
							showClass: {
								popup: "swal2-show",
								backdrop: "swal2-backdrop-show",
								icon: "swal2-icon-show",
							},
							hideClass: {
								popup: "swal2-hide",
								backdrop: "swal2-backdrop-hide",
								icon: "swal2-icon-hide",
							},
							customClass: {},
							target: "body",
							backdrop: !0,
							heightAuto: !0,
							allowOutsideClick: !0,
							allowEscapeKey: !0,
							allowEnterKey: !0,
							stopKeydownPropagation: !0,
							keydownListenerCapture: !1,
							showConfirmButton: !0,
							showDenyButton: !1,
							showCancelButton: !1,
							preConfirm: void 0,
							preDeny: void 0,
							confirmButtonText: "OK",
							confirmButtonAriaLabel: "",
							confirmButtonColor: void 0,
							denyButtonText: "No",
							denyButtonAriaLabel: "",
							denyButtonColor: void 0,
							cancelButtonText: "Cancel",
							cancelButtonAriaLabel: "",
							cancelButtonColor: void 0,
							buttonsStyling: !0,
							reverseButtons: !1,
							focusConfirm: !0,
							focusDeny: !1,
							focusCancel: !1,
							returnFocus: !0,
							showCloseButton: !1,
							closeButtonHtml: "&times;",
							closeButtonAriaLabel: "Close this dialog",
							loaderHtml: "",
							showLoaderOnConfirm: !1,
							showLoaderOnDeny: !1,
							imageUrl: void 0,
							imageWidth: void 0,
							imageHeight: void 0,
							imageAlt: "",
							timer: void 0,
							timerProgressBar: !1,
							width: void 0,
							padding: void 0,
							background: void 0,
							input: void 0,
							inputPlaceholder: "",
							inputLabel: "",
							inputValue: "",
							inputOptions: {},
							inputAutoTrim: !0,
							inputAttributes: {},
							inputValidator: void 0,
							returnInputValueOnDeny: !1,
							validationMessage: void 0,
							grow: !1,
							position: "center",
							progressSteps: [],
							currentProgressStep: void 0,
							progressStepsDistance: void 0,
							willOpen: void 0,
							didOpen: void 0,
							didRender: void 0,
							willClose: void 0,
							didClose: void 0,
							didDestroy: void 0,
							scrollbarPadding: !0,
						},
						Te = [
							"allowEscapeKey",
							"allowOutsideClick",
							"background",
							"buttonsStyling",
							"cancelButtonAriaLabel",
							"cancelButtonColor",
							"cancelButtonText",
							"closeButtonAriaLabel",
							"closeButtonHtml",
							"confirmButtonAriaLabel",
							"confirmButtonColor",
							"confirmButtonText",
							"currentProgressStep",
							"customClass",
							"denyButtonAriaLabel",
							"denyButtonColor",
							"denyButtonText",
							"didClose",
							"didDestroy",
							"footer",
							"hideClass",
							"html",
							"icon",
							"iconColor",
							"iconHtml",
							"imageAlt",
							"imageHeight",
							"imageUrl",
							"imageWidth",
							"preConfirm",
							"preDeny",
							"progressSteps",
							"returnFocus",
							"reverseButtons",
							"showCancelButton",
							"showCloseButton",
							"showConfirmButton",
							"showDenyButton",
							"text",
							"title",
							"titleText",
							"willClose",
						],
						je = {},
						Ie = [
							"allowOutsideClick",
							"allowEnterKey",
							"backdrop",
							"focusConfirm",
							"focusDeny",
							"focusCancel",
							"returnFocus",
							"heightAuto",
							"keydownListenerCapture",
						],
						ze = (t) => Object.prototype.hasOwnProperty.call(Oe, t),
						Me = (t) => -1 !== Te.indexOf(t),
						qe = (t) => je[t],
						De = (t) => {
							ze(t) || s('Unknown parameter "'.concat(t, '"'));
						},
						He = (t) => {
							Ie.includes(t) &&
								s('The parameter "'.concat(t, '" is incompatible with toasts'));
						},
						Ve = (t) => {
							qe(t) && c(t, qe(t));
						},
						Ne = (t) => {
							!t.backdrop &&
								t.allowOutsideClick &&
								s(
									'"allowOutsideClick" parameter requires `backdrop` parameter to be set to `true`'
								);
							for (const e in t) De(e), t.toast && He(e), Ve(e);
						};
					var _e = Object.freeze({
						isValidParameter: ze,
						isUpdatableParameter: Me,
						isDeprecatedParameter: qe,
						argsToParams: f,
						isVisible: le,
						clickConfirm: ce,
						clickDeny: ue,
						clickCancel: de,
						getContainer: x,
						getPopup: E,
						getTitle: B,
						getHtmlContainer: L,
						getImage: P,
						getIcon: A,
						getInputLabel: I,
						getCloseButton: V,
						getActions: q,
						getConfirmButton: T,
						getDenyButton: j,
						getCancelButton: M,
						getLoader: z,
						getFooter: D,
						getTimerProgressBar: H,
						getFocusableElements: _,
						getValidationMessage: O,
						isLoading: R,
						fire: pe,
						mixin: me,
						showLoading: we,
						enableLoading: we,
						getTimerLeft: ve,
						stopTimer: xe,
						resumeTimer: ke,
						toggleTimer: Ce,
						increaseTimer: Ee,
						isTimerRunning: Ae,
						bindClickHandler: Pe,
					});
					function Fe() {
						const t = zt.innerParams.get(this);
						if (!t) return;
						const e = zt.domCache.get(this);
						at(e.loader),
							U() ? t.icon && nt(A()) : Ue(e),
							tt([e.popup, e.actions], y.loading),
							e.popup.removeAttribute("aria-busy"),
							e.popup.removeAttribute("data-loading"),
							(e.confirmButton.disabled = !1),
							(e.denyButton.disabled = !1),
							(e.cancelButton.disabled = !1);
					}
					const Ue = (t) => {
						const e = t.popup.getElementsByClassName(
							t.loader.getAttribute("data-button-to-replace")
						);
						e.length ? nt(e[0], "inline-block") : lt() && at(t.actions);
					};
					function Re(t) {
						const e = zt.innerParams.get(t || this),
							o = zt.domCache.get(t || this);
						return o ? G(o.popup, e.input) : null;
					}
					const Ye = () => {
							null === Y.previousBodyPadding &&
								document.body.scrollHeight > window.innerHeight &&
								((Y.previousBodyPadding = parseInt(
									window
										.getComputedStyle(document.body)
										.getPropertyValue("padding-right")
								)),
								(document.body.style.paddingRight = "".concat(
									Y.previousBodyPadding + Bt(),
									"px"
								)));
						},
						We = () => {
							null !== Y.previousBodyPadding &&
								((document.body.style.paddingRight = "".concat(
									Y.previousBodyPadding,
									"px"
								)),
								(Y.previousBodyPadding = null));
						},
						Ze = () => {
							if (
								((/iPad|iPhone|iPod/.test(navigator.userAgent) &&
									!window.MSStream) ||
									("MacIntel" === navigator.platform &&
										navigator.maxTouchPoints > 1)) &&
								!Z(document.body, y.iosfix)
							) {
								const t = document.body.scrollTop;
								(document.body.style.top = "".concat(-1 * t, "px")),
									Q(document.body, y.iosfix),
									Ke(),
									$e();
							}
						},
						$e = () => {
							if (
								!navigator.userAgent.match(
									/(CriOS|FxiOS|EdgiOS|YaBrowser|UCBrowser)/i
								)
							) {
								const t = 44;
								E().scrollHeight > window.innerHeight - t &&
									(x().style.paddingBottom = "".concat(t, "px"));
							}
						},
						Ke = () => {
							const t = x();
							let e;
							(t.ontouchstart = (t) => {
								e = Ge(t);
							}),
								(t.ontouchmove = (t) => {
									e && (t.preventDefault(), t.stopPropagation());
								});
						},
						Ge = (t) => {
							const e = t.target,
								o = x();
							return !(
								Xe(t) ||
								Je(t) ||
								(e !== o &&
									(ct(o) ||
										"INPUT" === e.tagName ||
										"TEXTAREA" === e.tagName ||
										(ct(L()) && L().contains(e))))
							);
						},
						Xe = (t) =>
							t.touches &&
							t.touches.length &&
							"stylus" === t.touches[0].touchType,
						Je = (t) => t.touches && t.touches.length > 1,
						Qe = () => {
							if (Z(document.body, y.iosfix)) {
								const t = parseInt(document.body.style.top, 10);
								tt(document.body, y.iosfix),
									(document.body.style.top = ""),
									(document.body.scrollTop = -1 * t);
							}
						},
						to = () => {
							a(document.body.children).forEach((t) => {
								t === x() ||
									t.contains(x()) ||
									(t.hasAttribute("aria-hidden") &&
										t.setAttribute(
											"data-previous-aria-hidden",
											t.getAttribute("aria-hidden")
										),
									t.setAttribute("aria-hidden", "true"));
							});
						},
						eo = () => {
							a(document.body.children).forEach((t) => {
								t.hasAttribute("data-previous-aria-hidden")
									? (t.setAttribute(
											"aria-hidden",
											t.getAttribute("data-previous-aria-hidden")
									  ),
									  t.removeAttribute("data-previous-aria-hidden"))
									: t.removeAttribute("aria-hidden");
							});
						};
					var oo = { swalPromiseResolve: new WeakMap() };
					function no(t, e, o, n) {
						U()
							? co(t, n)
							: (ye(o).then(() => co(t, n)),
							  ge.keydownTarget.removeEventListener(
									"keydown",
									ge.keydownHandler,
									{ capture: ge.keydownListenerCapture }
							  ),
							  (ge.keydownHandlerAdded = !1)),
							/^((?!chrome|android).)*safari/i.test(navigator.userAgent)
								? (e.setAttribute("style", "display:none !important"),
								  e.removeAttribute("class"),
								  (e.innerHTML = ""))
								: e.remove(),
							F() && (We(), Qe(), eo()),
							ao();
					}
					function ao() {
						tt(
							[document.documentElement, document.body],
							[y.shown, y["height-auto"], y["no-backdrop"], y["toast-shown"]]
						);
					}
					function so(t) {
						const e = E();
						if (!e) return;
						t = ro(t);
						const o = zt.innerParams.get(this);
						if (!o || Z(e, o.hideClass.popup)) return;
						const n = oo.swalPromiseResolve.get(this);
						tt(e, o.showClass.popup), Q(e, o.hideClass.popup);
						const a = x();
						tt(a, o.showClass.backdrop),
							Q(a, o.hideClass.backdrop),
							io(this, e, o),
							n(t);
					}
					const ro = (t) =>
							void 0 === t
								? { isConfirmed: !1, isDenied: !1, isDismissed: !0 }
								: Object.assign(
										{ isConfirmed: !1, isDenied: !1, isDismissed: !1 },
										t
								  ),
						io = (t, e, o) => {
							const n = x(),
								a = At && ut(e);
							"function" == typeof o.willClose && o.willClose(e),
								a
									? lo(t, e, n, o.returnFocus, o.didClose)
									: no(t, n, o.returnFocus, o.didClose);
						},
						lo = (t, e, o, n, a) => {
							(ge.swalCloseEventFinishedCallback = no.bind(null, t, o, n, a)),
								e.addEventListener(At, function (t) {
									t.target === e &&
										(ge.swalCloseEventFinishedCallback(),
										delete ge.swalCloseEventFinishedCallback);
								});
						},
						co = (t, e) => {
							setTimeout(() => {
								"function" == typeof e && e.bind(t.params)(), t._destroy();
							});
						};
					function uo(t, e, o) {
						const n = zt.domCache.get(t);
						e.forEach((t) => {
							n[t].disabled = o;
						});
					}
					function po(t, e) {
						if (!t) return !1;
						if ("radio" === t.type) {
							const o = t.parentNode.parentNode.querySelectorAll("input");
							for (let t = 0; t < o.length; t++) o[t].disabled = e;
						} else t.disabled = e;
					}
					function mo() {
						uo(this, ["confirmButton", "denyButton", "cancelButton"], !1);
					}
					function wo() {
						uo(this, ["confirmButton", "denyButton", "cancelButton"], !0);
					}
					function ho() {
						return po(this.getInput(), !1);
					}
					function fo() {
						return po(this.getInput(), !0);
					}
					function go(t) {
						const e = zt.domCache.get(this),
							o = zt.innerParams.get(this);
						W(e.validationMessage, t),
							(e.validationMessage.className = y["validation-message"]),
							o.customClass &&
								o.customClass.validationMessage &&
								Q(e.validationMessage, o.customClass.validationMessage),
							nt(e.validationMessage);
						const n = this.getInput();
						n &&
							(n.setAttribute("aria-invalid", !0),
							n.setAttribute("aria-describedby", y["validation-message"]),
							X(n),
							Q(n, y.inputerror));
					}
					function bo() {
						const t = zt.domCache.get(this);
						t.validationMessage && at(t.validationMessage);
						const e = this.getInput();
						e &&
							(e.removeAttribute("aria-invalid"),
							e.removeAttribute("aria-describedby"),
							tt(e, y.inputerror));
					}
					function yo() {
						return zt.domCache.get(this).progressSteps;
					}
					class vo {
						constructor(t, e) {
							(this.callback = t),
								(this.remaining = e),
								(this.running = !1),
								this.start();
						}
						start() {
							return (
								this.running ||
									((this.running = !0),
									(this.started = new Date()),
									(this.id = setTimeout(this.callback, this.remaining))),
								this.remaining
							);
						}
						stop() {
							return (
								this.running &&
									((this.running = !1),
									clearTimeout(this.id),
									(this.remaining -= new Date() - this.started)),
								this.remaining
							);
						}
						increase(t) {
							const e = this.running;
							return (
								e && this.stop(),
								(this.remaining += t),
								e && this.start(),
								this.remaining
							);
						}
						getTimerLeft() {
							return (
								this.running && (this.stop(), this.start()), this.remaining
							);
						}
						isRunning() {
							return this.running;
						}
					}
					var xo = {
						email: (t, e) =>
							/^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/.test(t)
								? Promise.resolve()
								: Promise.resolve(e || "Invalid email address"),
						url: (t, e) =>
							/^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._+~#=]{1,256}\.[a-z]{2,63}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)$/.test(
								t
							)
								? Promise.resolve()
								: Promise.resolve(e || "Invalid URL"),
					};
					function ko(t) {
						t.inputValidator ||
							Object.keys(xo).forEach((e) => {
								t.input === e && (t.inputValidator = xo[e]);
							});
					}
					function Co(t) {
						(!t.target ||
							("string" == typeof t.target &&
								!document.querySelector(t.target)) ||
							("string" != typeof t.target && !t.target.appendChild)) &&
							(s('Target parameter is not valid, defaulting to "body"'),
							(t.target = "body"));
					}
					function Eo(t) {
						ko(t),
							t.showLoaderOnConfirm &&
								!t.preConfirm &&
								s(
									"showLoaderOnConfirm is set to true, but preConfirm is not defined.\nshowLoaderOnConfirm should be used together with preConfirm, see usage example:\nhttps://sweetalert2.github.io/#ajax-request"
								),
							Co(t),
							"string" == typeof t.title &&
								(t.title = t.title.split("\n").join("<br />")),
							xt(t);
					}
					const Ao = ["swal-title", "swal-html", "swal-footer"],
						Bo = (t) => {
							const e =
								"string" == typeof t.template
									? document.querySelector(t.template)
									: t.template;
							if (!e) return {};
							const o = e.content;
							return (
								Io(o),
								Object.assign(Lo(o), Po(o), So(o), Oo(o), To(o), jo(o, Ao))
							);
						},
						Lo = (t) => {
							const e = {};
							return (
								a(t.querySelectorAll("swal-param")).forEach((t) => {
									zo(t, ["name", "value"]);
									const o = t.getAttribute("name");
									let n = t.getAttribute("value");
									"boolean" == typeof Oe[o] && "false" === n && (n = !1),
										"object" == typeof Oe[o] && (n = JSON.parse(n)),
										(e[o] = n);
								}),
								e
							);
						},
						Po = (t) => {
							const e = {};
							return (
								a(t.querySelectorAll("swal-button")).forEach((t) => {
									zo(t, ["type", "color", "aria-label"]);
									const o = t.getAttribute("type");
									(e["".concat(o, "ButtonText")] = t.innerHTML),
										(e["show".concat(n(o), "Button")] = !0),
										t.hasAttribute("color") &&
											(e["".concat(o, "ButtonColor")] =
												t.getAttribute("color")),
										t.hasAttribute("aria-label") &&
											(e["".concat(o, "ButtonAriaLabel")] =
												t.getAttribute("aria-label"));
								}),
								e
							);
						},
						So = (t) => {
							const e = {},
								o = t.querySelector("swal-image");
							return (
								o &&
									(zo(o, ["src", "width", "height", "alt"]),
									o.hasAttribute("src") && (e.imageUrl = o.getAttribute("src")),
									o.hasAttribute("width") &&
										(e.imageWidth = o.getAttribute("width")),
									o.hasAttribute("height") &&
										(e.imageHeight = o.getAttribute("height")),
									o.hasAttribute("alt") &&
										(e.imageAlt = o.getAttribute("alt"))),
								e
							);
						},
						Oo = (t) => {
							const e = {},
								o = t.querySelector("swal-icon");
							return (
								o &&
									(zo(o, ["type", "color"]),
									o.hasAttribute("type") && (e.icon = o.getAttribute("type")),
									o.hasAttribute("color") &&
										(e.iconColor = o.getAttribute("color")),
									(e.iconHtml = o.innerHTML)),
								e
							);
						},
						To = (t) => {
							const e = {},
								o = t.querySelector("swal-input");
							o &&
								(zo(o, ["type", "label", "placeholder", "value"]),
								(e.input = o.getAttribute("type") || "text"),
								o.hasAttribute("label") &&
									(e.inputLabel = o.getAttribute("label")),
								o.hasAttribute("placeholder") &&
									(e.inputPlaceholder = o.getAttribute("placeholder")),
								o.hasAttribute("value") &&
									(e.inputValue = o.getAttribute("value")));
							const n = t.querySelectorAll("swal-input-option");
							return (
								n.length &&
									((e.inputOptions = {}),
									a(n).forEach((t) => {
										zo(t, ["value"]);
										const o = t.getAttribute("value"),
											n = t.innerHTML;
										e.inputOptions[o] = n;
									})),
								e
							);
						},
						jo = (t, e) => {
							const o = {};
							for (const n in e) {
								const a = e[n],
									s = t.querySelector(a);
								s &&
									(zo(s, []),
									(o[a.replace(/^swal-/, "")] = s.innerHTML.trim()));
							}
							return o;
						},
						Io = (t) => {
							const e = Ao.concat([
								"swal-param",
								"swal-button",
								"swal-image",
								"swal-icon",
								"swal-input",
								"swal-input-option",
							]);
							a(t.children).forEach((t) => {
								const o = t.tagName.toLowerCase();
								-1 === e.indexOf(o) &&
									s("Unrecognized element <".concat(o, ">"));
							});
						},
						zo = (t, e) => {
							a(t.attributes).forEach((o) => {
								-1 === e.indexOf(o.name) &&
									s([
										'Unrecognized attribute "'
											.concat(o.name, '" on <')
											.concat(t.tagName.toLowerCase(), ">."),
										"".concat(
											e.length
												? "Allowed attributes are: ".concat(e.join(", "))
												: "To set the value, use HTML within the element."
										),
									]);
							});
						},
						Mo = 10,
						qo = (t) => {
							const e = x(),
								o = E();
							"function" == typeof t.willOpen && t.willOpen(o);
							const n = window.getComputedStyle(document.body).overflowY;
							No(e, o, t),
								setTimeout(() => {
									Ho(e, o);
								}, Mo),
								F() && (Vo(e, t.scrollbarPadding, n), to()),
								U() ||
									ge.previousActiveElement ||
									(ge.previousActiveElement = document.activeElement),
								"function" == typeof t.didOpen &&
									setTimeout(() => t.didOpen(o)),
								tt(e, y["no-transition"]);
						},
						Do = (t) => {
							const e = E();
							if (t.target !== e) return;
							const o = x();
							e.removeEventListener(At, Do), (o.style.overflowY = "auto");
						},
						Ho = (t, e) => {
							At && ut(e)
								? ((t.style.overflowY = "hidden"), e.addEventListener(At, Do))
								: (t.style.overflowY = "auto");
						},
						Vo = (t, e, o) => {
							Ze(),
								e && "hidden" !== o && Ye(),
								setTimeout(() => {
									t.scrollTop = 0;
								});
						},
						No = (t, e, o) => {
							Q(t, o.showClass.backdrop),
								e.style.setProperty("opacity", "0", "important"),
								nt(e, "grid"),
								setTimeout(() => {
									Q(e, o.showClass.popup), e.style.removeProperty("opacity");
								}, Mo),
								Q([document.documentElement, document.body], y.shown),
								o.heightAuto &&
									o.backdrop &&
									!o.toast &&
									Q(
										[document.documentElement, document.body],
										y["height-auto"]
									);
						},
						_o = (t, e) => {
							"select" === e.input || "radio" === e.input
								? Wo(t, e)
								: ["text", "email", "number", "tel", "textarea"].includes(
										e.input
								  ) &&
								  (d(e.inputValue) || m(e.inputValue)) &&
								  (we(T()), Zo(t, e));
						},
						Fo = (t, e) => {
							const o = t.getInput();
							if (!o) return null;
							switch (e.input) {
								case "checkbox":
									return Uo(o);
								case "radio":
									return Ro(o);
								case "file":
									return Yo(o);
								default:
									return e.inputAutoTrim ? o.value.trim() : o.value;
							}
						},
						Uo = (t) => (t.checked ? 1 : 0),
						Ro = (t) => (t.checked ? t.value : null),
						Yo = (t) =>
							t.files.length
								? null !== t.getAttribute("multiple")
									? t.files
									: t.files[0]
								: null,
						Wo = (t, e) => {
							const o = E(),
								n = (t) => $o[e.input](o, Ko(t), e);
							d(e.inputOptions) || m(e.inputOptions)
								? (we(T()),
								  p(e.inputOptions).then((e) => {
										t.hideLoading(), n(e);
								  }))
								: "object" == typeof e.inputOptions
								? n(e.inputOptions)
								: r(
										"Unexpected type of inputOptions! Expected object, Map or Promise, got ".concat(
											typeof e.inputOptions
										)
								  );
						},
						Zo = (t, e) => {
							const o = t.getInput();
							at(o),
								p(e.inputValue)
									.then((n) => {
										(o.value =
											"number" === e.input ? parseFloat(n) || 0 : "".concat(n)),
											nt(o),
											o.focus(),
											t.hideLoading();
									})
									.catch((e) => {
										r("Error in inputValue promise: ".concat(e)),
											(o.value = ""),
											nt(o),
											o.focus(),
											t.hideLoading();
									});
						},
						$o = {
							select: (t, e, o) => {
								const n = et(t, y.select),
									a = (t, e, n) => {
										const a = document.createElement("option");
										(a.value = n),
											W(a, e),
											(a.selected = Go(n, o.inputValue)),
											t.appendChild(a);
									};
								e.forEach((t) => {
									const e = t[0],
										o = t[1];
									if (Array.isArray(o)) {
										const t = document.createElement("optgroup");
										(t.label = e),
											(t.disabled = !1),
											n.appendChild(t),
											o.forEach((e) => a(t, e[1], e[0]));
									} else a(n, o, e);
								}),
									n.focus();
							},
							radio: (t, e, o) => {
								const n = et(t, y.radio);
								e.forEach((t) => {
									const e = t[0],
										a = t[1],
										s = document.createElement("input"),
										r = document.createElement("label");
									(s.type = "radio"),
										(s.name = y.radio),
										(s.value = e),
										Go(e, o.inputValue) && (s.checked = !0);
									const i = document.createElement("span");
									W(i, a),
										(i.className = y.label),
										r.appendChild(s),
										r.appendChild(i),
										n.appendChild(r);
								});
								const a = n.querySelectorAll("input");
								a.length && a[0].focus();
							},
						},
						Ko = (t) => {
							const e = [];
							return (
								"undefined" != typeof Map && t instanceof Map
									? t.forEach((t, o) => {
											let n = t;
											"object" == typeof n && (n = Ko(n)), e.push([o, n]);
									  })
									: Object.keys(t).forEach((o) => {
											let n = t[o];
											"object" == typeof n && (n = Ko(n)), e.push([o, n]);
									  }),
								e
							);
						},
						Go = (t, e) => e && e.toString() === t.toString(),
						Xo = (t) => {
							const e = zt.innerParams.get(t);
							t.disableButtons(), e.input ? tn(t, "confirm") : an(t, !0);
						},
						Jo = (t) => {
							const e = zt.innerParams.get(t);
							t.disableButtons(),
								e.returnInputValueOnDeny ? tn(t, "deny") : on(t, !1);
						},
						Qo = (e, o) => {
							e.disableButtons(), o(t.cancel);
						},
						tn = (t, e) => {
							const o = zt.innerParams.get(t),
								n = Fo(t, o);
							o.inputValidator
								? en(t, n, e)
								: t.getInput().checkValidity()
								? "deny" === e
									? on(t, n)
									: an(t, n)
								: (t.enableButtons(),
								  t.showValidationMessage(o.validationMessage));
						},
						en = (t, e, o) => {
							const n = zt.innerParams.get(t);
							t.disableInput(),
								Promise.resolve()
									.then(() => p(n.inputValidator(e, n.validationMessage)))
									.then((n) => {
										t.enableButtons(),
											t.enableInput(),
											n
												? t.showValidationMessage(n)
												: "deny" === o
												? on(t, e)
												: an(t, e);
									});
						},
						on = (t, e) => {
							const o = zt.innerParams.get(t || void 0);
							o.showLoaderOnDeny && we(j()),
								o.preDeny
									? Promise.resolve()
											.then(() => p(o.preDeny(e, o.validationMessage)))
											.then((o) => {
												!1 === o
													? t.hideLoading()
													: t.closePopup({
															isDenied: !0,
															value: void 0 === o ? e : o,
													  });
											})
									: t.closePopup({ isDenied: !0, value: e });
						},
						nn = (t, e) => {
							t.closePopup({ isConfirmed: !0, value: e });
						},
						an = (t, e) => {
							const o = zt.innerParams.get(t || void 0);
							o.showLoaderOnConfirm && we(),
								o.preConfirm
									? (t.resetValidationMessage(),
									  Promise.resolve()
											.then(() => p(o.preConfirm(e, o.validationMessage)))
											.then((o) => {
												it(O()) || !1 === o
													? t.hideLoading()
													: nn(t, void 0 === o ? e : o);
											}))
									: nn(t, e);
						},
						sn = (t, e, o, n) => {
							e.keydownTarget &&
								e.keydownHandlerAdded &&
								(e.keydownTarget.removeEventListener(
									"keydown",
									e.keydownHandler,
									{ capture: e.keydownListenerCapture }
								),
								(e.keydownHandlerAdded = !1)),
								o.toast ||
									((e.keydownHandler = (e) => un(t, e, n)),
									(e.keydownTarget = o.keydownListenerCapture ? window : E()),
									(e.keydownListenerCapture = o.keydownListenerCapture),
									e.keydownTarget.addEventListener(
										"keydown",
										e.keydownHandler,
										{ capture: e.keydownListenerCapture }
									),
									(e.keydownHandlerAdded = !0));
						},
						rn = (t, e, o) => {
							const n = _();
							if (n.length)
								return (
									(e += o) === n.length
										? (e = 0)
										: -1 === e && (e = n.length - 1),
									n[e].focus()
								);
							E().focus();
						},
						ln = ["ArrowRight", "ArrowDown"],
						cn = ["ArrowLeft", "ArrowUp"],
						un = (t, e, o) => {
							const n = zt.innerParams.get(t);
							n &&
								(n.stopKeydownPropagation && e.stopPropagation(),
								"Enter" === e.key
									? dn(t, e, n)
									: "Tab" === e.key
									? pn(e, n)
									: [...ln, ...cn].includes(e.key)
									? mn(e.key)
									: "Escape" === e.key && wn(e, n, o));
						},
						dn = (t, e, o) => {
							if (
								!e.isComposing &&
								e.target &&
								t.getInput() &&
								e.target.outerHTML === t.getInput().outerHTML
							) {
								if (["textarea", "file"].includes(o.input)) return;
								ce(), e.preventDefault();
							}
						},
						pn = (t, e) => {
							const o = t.target,
								n = _();
							let a = -1;
							for (let t = 0; t < n.length; t++)
								if (o === n[t]) {
									a = t;
									break;
								}
							t.shiftKey ? rn(e, a, -1) : rn(e, a, 1),
								t.stopPropagation(),
								t.preventDefault();
						},
						mn = (t) => {
							if (![T(), j(), M()].includes(document.activeElement)) return;
							const e = ln.includes(t)
									? "nextElementSibling"
									: "previousElementSibling",
								o = document.activeElement[e];
							o && o.focus();
						},
						wn = (e, o, n) => {
							u(o.allowEscapeKey) && (e.preventDefault(), n(t.esc));
						},
						hn = (t, e, o) => {
							zt.innerParams.get(t).toast
								? fn(t, e, o)
								: (bn(e), yn(e), vn(t, e, o));
						},
						fn = (e, o, n) => {
							o.popup.onclick = () => {
								const o = zt.innerParams.get(e);
								o.showConfirmButton ||
									o.showDenyButton ||
									o.showCancelButton ||
									o.showCloseButton ||
									o.timer ||
									o.input ||
									n(t.close);
							};
						};
					let gn = !1;
					const bn = (t) => {
							t.popup.onmousedown = () => {
								t.container.onmouseup = function (e) {
									(t.container.onmouseup = void 0),
										e.target === t.container && (gn = !0);
								};
							};
						},
						yn = (t) => {
							t.container.onmousedown = () => {
								t.popup.onmouseup = function (e) {
									(t.popup.onmouseup = void 0),
										(e.target === t.popup || t.popup.contains(e.target)) &&
											(gn = !0);
								};
							};
						},
						vn = (e, o, n) => {
							o.container.onclick = (a) => {
								const s = zt.innerParams.get(e);
								gn
									? (gn = !1)
									: a.target === o.container &&
									  u(s.allowOutsideClick) &&
									  n(t.backdrop);
							};
						};
					function xn(t, e = {}) {
						Ne(Object.assign({}, e, t)),
							ge.currentInstance &&
								(ge.currentInstance._destroy(), F() && eo()),
							(ge.currentInstance = this);
						const o = kn(t, e);
						Eo(o),
							Object.freeze(o),
							ge.timeout && (ge.timeout.stop(), delete ge.timeout),
							clearTimeout(ge.restoreFocusTimeout);
						const n = En(this);
						return ie(this, o), zt.innerParams.set(this, o), Cn(this, n, o);
					}
					const kn = (t, e) => {
							const o = Bo(t),
								n = Object.assign({}, Oe, e, o, t);
							return (
								(n.showClass = Object.assign({}, Oe.showClass, n.showClass)),
								(n.hideClass = Object.assign({}, Oe.hideClass, n.hideClass)),
								n
							);
						},
						Cn = (e, o, n) =>
							new Promise((a) => {
								const s = (t) => {
									e.closePopup({ isDismissed: !0, dismiss: t });
								};
								oo.swalPromiseResolve.set(e, a),
									(o.confirmButton.onclick = () => Xo(e)),
									(o.denyButton.onclick = () => Jo(e)),
									(o.cancelButton.onclick = () => Qo(e, s)),
									(o.closeButton.onclick = () => s(t.close)),
									hn(e, o, s),
									sn(e, ge, n, s),
									_o(e, n),
									qo(n),
									An(ge, n, s),
									Bn(o, n),
									setTimeout(() => {
										o.container.scrollTop = 0;
									});
							}),
						En = (t) => {
							const e = {
								popup: E(),
								container: x(),
								actions: q(),
								confirmButton: T(),
								denyButton: j(),
								cancelButton: M(),
								loader: z(),
								closeButton: V(),
								validationMessage: O(),
								progressSteps: S(),
							};
							return zt.domCache.set(t, e), e;
						},
						An = (t, e, o) => {
							const n = H();
							at(n),
								e.timer &&
									((t.timeout = new vo(() => {
										o("timer"), delete t.timeout;
									}, e.timer)),
									e.timerProgressBar &&
										(nt(n),
										setTimeout(() => {
											t.timeout && t.timeout.running && dt(e.timer);
										})));
						},
						Bn = (t, e) => {
							if (!e.toast)
								return u(e.allowEnterKey)
									? void (Ln(t, e) || rn(e, -1, 1))
									: Pn();
						},
						Ln = (t, e) =>
							e.focusDeny && it(t.denyButton)
								? (t.denyButton.focus(), !0)
								: e.focusCancel && it(t.cancelButton)
								? (t.cancelButton.focus(), !0)
								: !(
										!e.focusConfirm ||
										!it(t.confirmButton) ||
										(t.confirmButton.focus(), 0)
								  ),
						Pn = () => {
							document.activeElement &&
								"function" == typeof document.activeElement.blur &&
								document.activeElement.blur();
						};
					function Sn(t) {
						const e = E(),
							o = zt.innerParams.get(this);
						if (!e || Z(e, o.hideClass.popup))
							return s(
								"You're trying to update the closed or closing popup, that won't work. Use the update() method in preConfirm parameter or show a new popup."
							);
						const n = {};
						Object.keys(t).forEach((e) => {
							qn.isUpdatableParameter(e)
								? (n[e] = t[e])
								: s(
										'Invalid parameter to update: "'.concat(
											e,
											'". Updatable params are listed here: https://github.com/sweetalert2/sweetalert2/blob/master/src/utils/params.js\n\nIf you think this parameter should be updatable, request it here: https://github.com/sweetalert2/sweetalert2/issues/new?template=02_feature_request.md'
										)
								  );
						});
						const a = Object.assign({}, o, n);
						ie(this, a),
							zt.innerParams.set(this, a),
							Object.defineProperties(this, {
								params: {
									value: Object.assign({}, this.params, t),
									writable: !1,
									enumerable: !0,
								},
							});
					}
					function On() {
						const t = zt.domCache.get(this),
							e = zt.innerParams.get(this);
						e &&
							(t.popup &&
								ge.swalCloseEventFinishedCallback &&
								(ge.swalCloseEventFinishedCallback(),
								delete ge.swalCloseEventFinishedCallback),
							ge.deferDisposalTimer &&
								(clearTimeout(ge.deferDisposalTimer),
								delete ge.deferDisposalTimer),
							"function" == typeof e.didDestroy && e.didDestroy(),
							Tn(this));
					}
					const Tn = (t) => {
							delete t.params,
								delete ge.keydownHandler,
								delete ge.keydownTarget,
								jn(zt),
								jn(oo),
								delete ge.currentInstance;
						},
						jn = (t) => {
							for (const e in t) t[e] = new WeakMap();
						};
					var In = Object.freeze({
						hideLoading: Fe,
						disableLoading: Fe,
						getInput: Re,
						close: so,
						closePopup: so,
						closeModal: so,
						closeToast: so,
						enableButtons: mo,
						disableButtons: wo,
						enableInput: ho,
						disableInput: fo,
						showValidationMessage: go,
						resetValidationMessage: bo,
						getProgressSteps: yo,
						_main: xn,
						update: Sn,
						_destroy: On,
					});
					let zn;
					class Mn {
						constructor(...t) {
							if ("undefined" == typeof window) return;
							zn = this;
							const e = Object.freeze(this.constructor.argsToParams(t));
							Object.defineProperties(this, {
								params: {
									value: e,
									writable: !1,
									enumerable: !0,
									configurable: !0,
								},
							});
							const o = this._main(this.params);
							zt.promise.set(this, o);
						}
						then(t) {
							return zt.promise.get(this).then(t);
						}
						finally(t) {
							return zt.promise.get(this).finally(t);
						}
					}
					Object.assign(Mn.prototype, In),
						Object.assign(Mn, _e),
						Object.keys(In).forEach((t) => {
							Mn[t] = function (...e) {
								if (zn) return zn[t](...e);
							};
						}),
						(Mn.DismissReason = t),
						(Mn.version = "11.1.7");
					const qn = Mn;
					return (qn.default = qn), qn;
				})()),
					void 0 !== this &&
						this.Sweetalert2 &&
						(this.swal =
							this.sweetAlert =
							this.Swal =
							this.SweetAlert =
								this.Sweetalert2),
					"undefined" != typeof document &&
						(function (t, e) {
							var o = t.createElement("style");
							if (
								(t.getElementsByTagName("head")[0].appendChild(o), o.styleSheet)
							)
								o.styleSheet.disabled || (o.styleSheet.cssText = e);
							else
								try {
									o.innerHTML = e;
								} catch (t) {
									o.innerText = e;
								}
						})(
							document,
							'.swal2-popup.swal2-toast{box-sizing:border-box;grid-column:1/4!important;grid-row:1/4!important;grid-template-columns:1fr 99fr 1fr;padding:1em;overflow-y:hidden;background:#fff;box-shadow:0 0 1px rgba(0,0,0,.075),0 1px 2px rgba(0,0,0,.075),1px 2px 4px rgba(0,0,0,.075),1px 3px 8px rgba(0,0,0,.075),2px 4px 16px rgba(0,0,0,.075);pointer-events:all}.swal2-popup.swal2-toast>*{grid-column:2}.swal2-popup.swal2-toast .swal2-title{margin:.5em 1em;padding:0;font-size:1em;text-align:initial}.swal2-popup.swal2-toast .swal2-loading{justify-content:center}.swal2-popup.swal2-toast .swal2-input{height:2em;margin:.5em;font-size:1em}.swal2-popup.swal2-toast .swal2-validation-message{font-size:1em}.swal2-popup.swal2-toast .swal2-footer{margin:.5em 0 0;padding:.5em 0 0;font-size:.8em}.swal2-popup.swal2-toast .swal2-close{grid-column:3/3;grid-row:1/99;align-self:center;width:.8em;height:.8em;margin:0;font-size:2em}.swal2-popup.swal2-toast .swal2-html-container{margin:.5em 1em;padding:0;font-size:1em;text-align:initial}.swal2-popup.swal2-toast .swal2-html-container:empty{padding:0}.swal2-popup.swal2-toast .swal2-loader{grid-column:1;grid-row:1/99;align-self:center;width:2em;height:2em;margin:.25em}.swal2-popup.swal2-toast .swal2-icon{grid-column:1;grid-row:1/99;align-self:center;width:2em;min-width:2em;height:2em;margin:0 .5em 0 0}.swal2-popup.swal2-toast .swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:1.8em;font-weight:700}.swal2-popup.swal2-toast .swal2-icon.swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line]{top:.875em;width:1.375em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:.3125em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:.3125em}.swal2-popup.swal2-toast .swal2-actions{justify-content:flex-start;height:auto;margin:0;margin-top:.5em;padding:0 .5em}.swal2-popup.swal2-toast .swal2-styled{margin:.25em .5em;padding:.4em .6em;font-size:1em}.swal2-popup.swal2-toast .swal2-success{border-color:#a5dc86}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line]{position:absolute;width:1.6em;height:3em;transform:rotate(45deg);border-radius:50%}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.8em;left:-.5em;transform:rotate(-45deg);transform-origin:2em 2em;border-radius:4em 0 0 4em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.25em;left:.9375em;transform-origin:0 1.5em;border-radius:0 4em 4em 0}.swal2-popup.swal2-toast .swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-success .swal2-success-fix{top:0;left:.4375em;width:.4375em;height:2.6875em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line]{height:.3125em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=tip]{top:1.125em;left:.1875em;width:.75em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=long]{top:.9375em;right:.1875em;width:1.375em}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-toast-animate-success-line-tip .75s;animation:swal2-toast-animate-success-line-tip .75s}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-toast-animate-success-line-long .75s;animation:swal2-toast-animate-success-line-long .75s}.swal2-popup.swal2-toast.swal2-show{-webkit-animation:swal2-toast-show .5s;animation:swal2-toast-show .5s}.swal2-popup.swal2-toast.swal2-hide{-webkit-animation:swal2-toast-hide .1s forwards;animation:swal2-toast-hide .1s forwards}.swal2-container{display:grid;position:fixed;z-index:1060;top:0;right:0;bottom:0;left:0;box-sizing:border-box;grid-template-areas:"top-start     top            top-end" "center-start  center         center-end" "bottom-start  bottom-center  bottom-end";grid-template-rows:minmax(-webkit-min-content,auto) minmax(-webkit-min-content,auto) minmax(-webkit-min-content,auto);grid-template-rows:minmax(min-content,auto) minmax(min-content,auto) minmax(min-content,auto);height:100%;padding:.625em;overflow-x:hidden;transition:background-color .1s;-webkit-overflow-scrolling:touch}.swal2-container.swal2-backdrop-show,.swal2-container.swal2-noanimation{background:rgba(0,0,0,.4)}.swal2-container.swal2-backdrop-hide{background:0 0!important}.swal2-container.swal2-bottom-start,.swal2-container.swal2-center-start,.swal2-container.swal2-top-start{grid-template-columns:minmax(0,1fr) auto auto}.swal2-container.swal2-bottom,.swal2-container.swal2-center,.swal2-container.swal2-top{grid-template-columns:auto minmax(0,1fr) auto}.swal2-container.swal2-bottom-end,.swal2-container.swal2-center-end,.swal2-container.swal2-top-end{grid-template-columns:auto auto minmax(0,1fr)}.swal2-container.swal2-top-start>.swal2-popup{align-self:start}.swal2-container.swal2-top>.swal2-popup{grid-column:2;align-self:start;justify-self:center}.swal2-container.swal2-top-end>.swal2-popup,.swal2-container.swal2-top-right>.swal2-popup{grid-column:3;align-self:start;justify-self:end}.swal2-container.swal2-center-left>.swal2-popup,.swal2-container.swal2-center-start>.swal2-popup{grid-row:2;align-self:center}.swal2-container.swal2-center>.swal2-popup{grid-column:2;grid-row:2;align-self:center;justify-self:center}.swal2-container.swal2-center-end>.swal2-popup,.swal2-container.swal2-center-right>.swal2-popup{grid-column:3;grid-row:2;align-self:center;justify-self:end}.swal2-container.swal2-bottom-left>.swal2-popup,.swal2-container.swal2-bottom-start>.swal2-popup{grid-column:1;grid-row:3;align-self:end}.swal2-container.swal2-bottom>.swal2-popup{grid-column:2;grid-row:3;justify-self:center;align-self:end}.swal2-container.swal2-bottom-end>.swal2-popup,.swal2-container.swal2-bottom-right>.swal2-popup{grid-column:3;grid-row:3;align-self:end;justify-self:end}.swal2-container.swal2-grow-fullscreen>.swal2-popup,.swal2-container.swal2-grow-row>.swal2-popup{grid-column:1/4;width:100%}.swal2-container.swal2-grow-column>.swal2-popup,.swal2-container.swal2-grow-fullscreen>.swal2-popup{grid-row:1/4;align-self:stretch}.swal2-container.swal2-no-transition{transition:none!important}.swal2-popup{display:none;position:relative;box-sizing:border-box;grid-template-columns:minmax(0,100%);width:32em;max-width:100%;padding:0 0 1.25em;border:none;border-radius:5px;background:#fff;color:#545454;font-family:inherit;font-size:1rem}.swal2-popup:focus{outline:0}.swal2-popup.swal2-loading{overflow-y:hidden}.swal2-title{position:relative;max-width:100%;margin:0;padding:.8em 1em 0;color:#595959;font-size:1.875em;font-weight:600;text-align:center;text-transform:none;word-wrap:break-word}.swal2-actions{display:flex;z-index:1;box-sizing:border-box;flex-wrap:wrap;align-items:center;justify-content:center;width:auto;margin:1.25em auto 0;padding:0}.swal2-actions:not(.swal2-loading) .swal2-styled[disabled]{opacity:.4}.swal2-actions:not(.swal2-loading) .swal2-styled:hover{background-image:linear-gradient(rgba(0,0,0,.1),rgba(0,0,0,.1))}.swal2-actions:not(.swal2-loading) .swal2-styled:active{background-image:linear-gradient(rgba(0,0,0,.2),rgba(0,0,0,.2))}.swal2-loader{display:none;align-items:center;justify-content:center;width:2.2em;height:2.2em;margin:0 1.875em;-webkit-animation:swal2-rotate-loading 1.5s linear 0s infinite normal;animation:swal2-rotate-loading 1.5s linear 0s infinite normal;border-width:.25em;border-style:solid;border-radius:100%;border-color:#2778c4 transparent #2778c4 transparent}.swal2-styled{margin:.3125em;padding:.625em 1.1em;transition:box-shadow .1s;box-shadow:0 0 0 3px transparent;font-weight:500}.swal2-styled:not([disabled]){cursor:pointer}.swal2-styled.swal2-confirm{border:0;border-radius:.25em;background:initial;background-color:#7367f0;color:#fff;font-size:1em}.swal2-styled.swal2-confirm:focus{box-shadow:0 0 0 3px rgba(115,103,240,.5)}.swal2-styled.swal2-deny{border:0;border-radius:.25em;background:initial;background-color:#ea5455;color:#fff;font-size:1em}.swal2-styled.swal2-deny:focus{box-shadow:0 0 0 3px rgba(234,84,85,.5)}.swal2-styled.swal2-cancel{border:0;border-radius:.25em;background:initial;background-color:#6e7d88;color:#fff;font-size:1em}.swal2-styled.swal2-cancel:focus{box-shadow:0 0 0 3px rgba(110,125,136,.5)}.swal2-styled.swal2-default-outline:focus{box-shadow:0 0 0 3px rgba(100,150,200,.5)}.swal2-styled:focus{outline:0}.swal2-styled::-moz-focus-inner{border:0}.swal2-footer{justify-content:center;margin:1em 0 0;padding:1em 1em 0;border-top:1px solid #eee;color:#545454;font-size:1em}.swal2-timer-progress-bar-container{position:absolute;right:0;bottom:0;left:0;grid-column:auto!important;height:.25em;overflow:hidden;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.swal2-timer-progress-bar{width:100%;height:.25em;background:rgba(0,0,0,.2)}.swal2-image{max-width:100%;margin:2em auto 1em}.swal2-close{z-index:2;align-items:center;justify-content:center;width:1.2em;height:1.2em;margin-top:0;margin-right:0;margin-bottom:-1.2em;padding:0;overflow:hidden;transition:color .1s,box-shadow .1s;border:none;border-radius:5px;background:0 0;color:#ccc;font-family:serif;font-family:monospace;font-size:2.5em;cursor:pointer;justify-self:end}.swal2-close:hover{transform:none;background:0 0;color:#f27474}.swal2-close:focus{outline:0;box-shadow:inset 0 0 0 3px rgba(100,150,200,.5)}.swal2-close::-moz-focus-inner{border:0}.swal2-html-container{z-index:1;justify-content:center;margin:1em 1.6em .3em;padding:0;overflow:auto;color:#545454;font-size:1.125em;font-weight:400;line-height:normal;text-align:center;word-wrap:break-word;word-break:break-word}.swal2-checkbox,.swal2-file,.swal2-input,.swal2-radio,.swal2-select,.swal2-textarea{margin:1em 2em 0}.swal2-file,.swal2-input,.swal2-textarea{box-sizing:border-box;width:auto;transition:border-color .1s,box-shadow .1s;border:1px solid #d9d9d9;border-radius:.1875em;background:inherit;box-shadow:inset 0 1px 1px rgba(0,0,0,.06),0 0 0 3px transparent;color:inherit;font-size:1.125em}.swal2-file.swal2-inputerror,.swal2-input.swal2-inputerror,.swal2-textarea.swal2-inputerror{border-color:#f27474!important;box-shadow:0 0 2px #f27474!important}.swal2-file:focus,.swal2-input:focus,.swal2-textarea:focus{border:1px solid #b4dbed;outline:0;box-shadow:inset 0 1px 1px rgba(0,0,0,.06),0 0 0 3px rgba(100,150,200,.5)}.swal2-file::-moz-placeholder,.swal2-input::-moz-placeholder,.swal2-textarea::-moz-placeholder{color:#ccc}.swal2-file:-ms-input-placeholder,.swal2-input:-ms-input-placeholder,.swal2-textarea:-ms-input-placeholder{color:#ccc}.swal2-file::placeholder,.swal2-input::placeholder,.swal2-textarea::placeholder{color:#ccc}.swal2-range{margin:1em 2em 0;background:#fff}.swal2-range input{width:80%}.swal2-range output{width:20%;color:inherit;font-weight:600;text-align:center}.swal2-range input,.swal2-range output{height:2.625em;padding:0;font-size:1.125em;line-height:2.625em}.swal2-input{height:2.625em;padding:0 .75em}.swal2-file{width:75%;margin-right:auto;margin-left:auto;background:inherit;font-size:1.125em}.swal2-textarea{height:6.75em;padding:.75em}.swal2-select{min-width:50%;max-width:100%;padding:.375em .625em;background:inherit;color:inherit;font-size:1.125em}.swal2-checkbox,.swal2-radio{align-items:center;justify-content:center;background:#fff;color:inherit}.swal2-checkbox label,.swal2-radio label{margin:0 .6em;font-size:1.125em}.swal2-checkbox input,.swal2-radio input{flex-shrink:0;margin:0 .4em}.swal2-input-label{display:flex;justify-content:center;margin:1em auto 0}.swal2-validation-message{align-items:center;justify-content:center;margin:1em 0 0;padding:.625em;overflow:hidden;background:#f0f0f0;color:#666;font-size:1em;font-weight:300}.swal2-validation-message::before{content:"!";display:inline-block;width:1.5em;min-width:1.5em;height:1.5em;margin:0 .625em;border-radius:50%;background-color:#f27474;color:#fff;font-weight:600;line-height:1.5em;text-align:center}.swal2-icon{position:relative;box-sizing:content-box;justify-content:center;width:5em;height:5em;margin:2.5em auto .6em;border:.25em solid transparent;border-radius:50%;border-color:#000;font-family:inherit;line-height:5em;cursor:default;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:3.75em}.swal2-icon.swal2-error{border-color:#f27474;color:#f27474}.swal2-icon.swal2-error .swal2-x-mark{position:relative;flex-grow:1}.swal2-icon.swal2-error [class^=swal2-x-mark-line]{display:block;position:absolute;top:2.3125em;width:2.9375em;height:.3125em;border-radius:.125em;background-color:#f27474}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:1.0625em;transform:rotate(45deg)}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:1em;transform:rotate(-45deg)}.swal2-icon.swal2-error.swal2-icon-show{-webkit-animation:swal2-animate-error-icon .5s;animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-error.swal2-icon-show .swal2-x-mark{-webkit-animation:swal2-animate-error-x-mark .5s;animation:swal2-animate-error-x-mark .5s}.swal2-icon.swal2-warning{border-color:#facea8;color:#f8bb86}.swal2-icon.swal2-info{border-color:#9de0f6;color:#3fc3ee}.swal2-icon.swal2-question{border-color:#c9dae1;color:#87adbd}.swal2-icon.swal2-success{border-color:#a5dc86;color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-circular-line]{position:absolute;width:3.75em;height:7.5em;transform:rotate(45deg);border-radius:50%}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.4375em;left:-2.0635em;transform:rotate(-45deg);transform-origin:3.75em 3.75em;border-radius:7.5em 0 0 7.5em}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.6875em;left:1.875em;transform:rotate(-45deg);transform-origin:0 3.75em;border-radius:0 7.5em 7.5em 0}.swal2-icon.swal2-success .swal2-success-ring{position:absolute;z-index:2;top:-.25em;left:-.25em;box-sizing:content-box;width:100%;height:100%;border:.25em solid rgba(165,220,134,.3);border-radius:50%}.swal2-icon.swal2-success .swal2-success-fix{position:absolute;z-index:1;top:.5em;left:1.625em;width:.4375em;height:5.625em;transform:rotate(-45deg)}.swal2-icon.swal2-success [class^=swal2-success-line]{display:block;position:absolute;z-index:2;height:.3125em;border-radius:.125em;background-color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-line][class$=tip]{top:2.875em;left:.8125em;width:1.5625em;transform:rotate(45deg)}.swal2-icon.swal2-success [class^=swal2-success-line][class$=long]{top:2.375em;right:.5em;width:2.9375em;transform:rotate(-45deg)}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-animate-success-line-tip .75s;animation:swal2-animate-success-line-tip .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-animate-success-line-long .75s;animation:swal2-animate-success-line-long .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-circular-line-right{-webkit-animation:swal2-rotate-success-circular-line 4.25s ease-in;animation:swal2-rotate-success-circular-line 4.25s ease-in}.swal2-progress-steps{flex-wrap:wrap;align-items:center;max-width:100%;margin:1.25em auto;padding:0;background:inherit;font-weight:600}.swal2-progress-steps li{display:inline-block;position:relative}.swal2-progress-steps .swal2-progress-step{z-index:20;flex-shrink:0;width:2em;height:2em;border-radius:2em;background:#2778c4;color:#fff;line-height:2em;text-align:center}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step{background:#2778c4}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step{background:#add8e6;color:#fff}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step-line{background:#add8e6}.swal2-progress-steps .swal2-progress-step-line{z-index:10;flex-shrink:0;width:2.5em;height:.4em;margin:0 -1px;background:#2778c4}[class^=swal2]{-webkit-tap-highlight-color:transparent}.swal2-show{-webkit-animation:swal2-show .3s;animation:swal2-show .3s}.swal2-hide{-webkit-animation:swal2-hide .15s forwards;animation:swal2-hide .15s forwards}.swal2-noanimation{transition:none}.swal2-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}.swal2-rtl .swal2-close{margin-right:initial;margin-left:0}.swal2-rtl .swal2-timer-progress-bar{right:0;left:auto}@-webkit-keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@-webkit-keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@-webkit-keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@-webkit-keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@-webkit-keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@-webkit-keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@-webkit-keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@-webkit-keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@-webkit-keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@-webkit-keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@-webkit-keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@-webkit-keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow:hidden}body.swal2-height-auto{height:auto!important}body.swal2-no-backdrop .swal2-container{background-color:transparent!important;pointer-events:none}body.swal2-no-backdrop .swal2-container .swal2-popup{pointer-events:all}body.swal2-no-backdrop .swal2-container .swal2-modal{box-shadow:0 0 10px rgba(0,0,0,.4)}@media print{body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow-y:scroll!important}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown)>[aria-hidden=true]{display:none}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) .swal2-container{position:static!important}}body.swal2-toast-shown .swal2-container{box-sizing:border-box;width:360px;max-width:100%;background-color:transparent;pointer-events:none}body.swal2-toast-shown .swal2-container.swal2-top{top:0;right:auto;bottom:auto;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-top-end,body.swal2-toast-shown .swal2-container.swal2-top-right{top:0;right:0;bottom:auto;left:auto}body.swal2-toast-shown .swal2-container.swal2-top-left,body.swal2-toast-shown .swal2-container.swal2-top-start{top:0;right:auto;bottom:auto;left:0}body.swal2-toast-shown .swal2-container.swal2-center-left,body.swal2-toast-shown .swal2-container.swal2-center-start{top:50%;right:auto;bottom:auto;left:0;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-center{top:50%;right:auto;bottom:auto;left:50%;transform:translate(-50%,-50%)}body.swal2-toast-shown .swal2-container.swal2-center-end,body.swal2-toast-shown .swal2-container.swal2-center-right{top:50%;right:0;bottom:auto;left:auto;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-left,body.swal2-toast-shown .swal2-container.swal2-bottom-start{top:auto;right:auto;bottom:0;left:0}body.swal2-toast-shown .swal2-container.swal2-bottom{top:auto;right:auto;bottom:0;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-end,body.swal2-toast-shown .swal2-container.swal2-bottom-right{top:auto;right:0;bottom:0;left:auto}'
						);
			},
		},
		e = {};
	function o(n) {
		var a = e[n];
		if (void 0 !== a) return a.exports;
		var s = (e[n] = { exports: {} });
		return t[n].call(s.exports, s, s.exports, o), s.exports;
	}
	(o.n = (t) => {
		var e = t && t.__esModule ? () => t.default : () => t;
		return o.d(e, { a: e }), e;
	}),
		(o.d = (t, e) => {
			for (var n in e)
				o.o(e, n) &&
					!o.o(t, n) &&
					Object.defineProperty(t, n, { enumerable: !0, get: e[n] });
		}),
		(o.o = (t, e) => Object.prototype.hasOwnProperty.call(t, e)),
		(() => {
			"use strict";
			var t = o(7757),
				e = o.n(t),
				n = o(6455),
				a = o.n(n);
			function s(t, e, o, n, a, s, r) {
				try {
					var i = t[s](r),
						l = i.value;
				} catch (t) {
					return void o(t);
				}
				i.done ? e(l) : Promise.resolve(l).then(n, a);
			}
			function r(t) {
				return function () {
					var e = this,
						o = arguments;
					return new Promise(function (n, a) {
						var r = t.apply(e, o);
						function i(t) {
							s(r, n, a, i, l, "next", t);
						}
						function l(t) {
							s(r, n, a, i, l, "throw", t);
						}
						i(void 0);
					});
				};
			}
			document.getElementById("basic").addEventListener("click", function (t) {
				a().fire("Any fool can use a computer");
			}),
				document
					.getElementById("footer")
					.addEventListener("click", function (t) {
						a().fire({
							icon: "error",
							title: "Oops...",
							text: "Something went wrong!",
							footer: "<a href>Why do I have this issue?</a>",
						});
					}),
				document
					.getElementById("title")
					.addEventListener("click", function (t) {
						a().fire(
							"The Internet?",
							"That thing is still around?",
							"question"
						);
					}),
				document
					.getElementById("success")
					.addEventListener("click", function (t) {
						a().fire({ icon: "success", title: "Success" });
					}),
				document
					.getElementById("error")
					.addEventListener("click", function (t) {
						a().fire({ icon: "error", title: "Error" });
					}),
				document
					.getElementById("warning")
					.addEventListener("click", function (t) {
						a().fire({ icon: "warning", title: "Gass" });
					}),
				document.getElementById("info").addEventListener("click", function (t) {
					a().fire({ icon: "info", title: "Info" });
				}),
				document
					.getElementById("question")
					.addEventListener("click", function (t) {
						a().fire({ icon: "question", title: "Question" });
					}),
				document.getElementById("text").addEventListener("click", function (t) {
					a().fire({
						title: "Enter your IP address",
						input: "text",
						inputLabel: "Your IP address",
						showCancelButton: !0,
					});
				}),
				document.getElementById("email").addEventListener(
					"click",
					(function () {
						var t = r(
							e().mark(function t(o) {
								var n, s;
								return e().wrap(function (t) {
									for (;;)
										switch ((t.prev = t.next)) {
											case 0:
												return (
													(t.next = 2),
													a().fire({
														title: "Input email address",
														input: "email",
														inputLabel: "Your email address",
														inputPlaceholder: "Enter your email address",
													})
												);
											case 2:
												(n = t.sent),
													(s = n.value) &&
														a().fire("Entered email: ".concat(s));
											case 5:
											case "end":
												return t.stop();
										}
								}, t);
							})
						);
						return function (e) {
							return t.apply(this, arguments);
						};
					})()
				),
				document.getElementById("url").addEventListener(
					"click",
					(function () {
						var t = r(
							e().mark(function t(o) {
								var n, s;
								return e().wrap(function (t) {
									for (;;)
										switch ((t.prev = t.next)) {
											case 0:
												return (
													(t.next = 2),
													a().fire({
														input: "url",
														inputLabel: "URL address",
														inputPlaceholder: "Enter the URL",
													})
												);
											case 2:
												(n = t.sent),
													(s = n.value) && a().fire("Entered URL: ".concat(s));
											case 5:
											case "end":
												return t.stop();
										}
								}, t);
							})
						);
						return function (e) {
							return t.apply(this, arguments);
						};
					})()
				),
				document.getElementById("password").addEventListener(
					"click",
					(function () {
						var t = r(
							e().mark(function t(o) {
								var n, s;
								return e().wrap(function (t) {
									for (;;)
										switch ((t.prev = t.next)) {
											case 0:
												return (
													(t.next = 2),
													a().fire({
														title: "Enter your password",
														input: "password",
														inputLabel: "Password",
														inputPlaceholder: "Enter your password",
														inputAttributes: {
															maxlength: 10,
															autocapitalize: "off",
															autocorrect: "off",
														},
													})
												);
											case 2:
												(n = t.sent),
													(s = n.value) &&
														a().fire("Entered password: ".concat(s));
											case 5:
											case "end":
												return t.stop();
										}
								}, t);
							})
						);
						return function (e) {
							return t.apply(this, arguments);
						};
					})()
				),
				document.getElementById("textarea").addEventListener(
					"click",
					(function () {
						var t = r(
							e().mark(function t(o) {
								var n, s;
								return e().wrap(function (t) {
									for (;;)
										switch ((t.prev = t.next)) {
											case 0:
												return (
													(t.next = 2),
													a().fire({
														input: "textarea",
														inputLabel: "Message",
														inputPlaceholder: "Type your message here...",
														inputAttributes: {
															"aria-label": "Type your message here",
														},
														showCancelButton: !0,
													})
												);
											case 2:
												(n = t.sent), (s = n.value) && a().fire(s);
											case 5:
											case "end":
												return t.stop();
										}
								}, t);
							})
						);
						return function (e) {
							return t.apply(this, arguments);
						};
					})()
				),
				document.getElementById("select").addEventListener(
					"click",
					(function () {
						var t = r(
							e().mark(function t(o) {
								var n, s;
								return e().wrap(function (t) {
									for (;;)
										switch ((t.prev = t.next)) {
											case 0:
												return (
													(t.next = 2),
													a().fire({
														title: "Select field validation",
														input: "select",
														inputOptions: {
															Fruits: {
																apples: "Apples",
																bananas: "Bananas",
																grapes: "Grapes",
																oranges: "Oranges",
															},
															Vegetables: {
																potato: "Potato",
																broccoli: "Broccoli",
																carrot: "Carrot",
															},
															icecream: "Ice cream",
														},
														inputPlaceholder: "Select a fruit",
														showCancelButton: !0,
														inputValidator: function (t) {
															return new Promise(function (e) {
																"oranges" === t
																	? e()
																	: e("You need to select oranges :)");
															});
														},
													})
												);
											case 2:
												(n = t.sent),
													(s = n.value) && a().fire("You selected: ".concat(s));
											case 5:
											case "end":
												return t.stop();
										}
								}, t);
							})
						);
						return function (e) {
							return t.apply(this, arguments);
						};
					})()
				);
		})();
})();
