<!DOCTYPE html>
<!-- saved from url=(0045)https://cdn.hackerrank.com/hackerrank-splash/ -->
<html class="gr__cdn_hackerrank_com">
<meta style="visibility: hidden !important; display: block !important; width: 0px !important; height: 0px !important; border-style: none !important;">
<object id="__IDM__" type="application/x-idm-downloader" width="1" height="1" style="visibility: hidden !important; display: block !important; width: 1px !important; height: 1px !important; border-style: none !important; position: absolute !important; top: 0px !important; left: 0px !important;"></object>
</meta>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <style class="cp-pen-styles">
        #featureAnimation,
        #featureBox {
            background-color: #fff;
            overflow: hidden;
            line-height: normal;
            font-size: 80%;
            z-index: 1000;
        }
        
        #featureAnimation {
            position: fixed;
            visibility: hidden;
        }
        
        #featureBox {
            position: absolute;
        }
        
        .star {
            position: absolute;
            background-color: #161616;
            display: none;
            z-index: 1001;
        }
        
        .dot {
            position: absolute;
            background-color: #91e600;
        }
        
        .page-box {
            opacity: 0;
        }
    </style>
    <script type="text/javascript" src="./hackerrank-splash_files/jquery.min.js.download"></script>
    <script src="./hackerrank-splash_files/TweenMax.min.js.download"></script>
</head>
<script>
    function inject() {
        function a() {
            function a(a) {
                parent.postMessage({
                    type: "blockedWindow",
                    args: JSON.stringify(a)
                }, l)
            }

            function b(a) {
                var b = a[1];
                return null != b && ["_blank", "_parent", "_self", "_top"].indexOf(b) < 0 ? b : null
            }

            function e(a, b) {
                var c;
                for (c in a) try {
                    void 0 === b[c] && (b[c] = a[c])
                } catch (d) {}
                return b
            }
            var g = arguments,
                h = !0,
                j = null,
                k = null;
            if (null != window.event && (k = window.event.currentTarget), null == k) {
                for (var m = g.callee; null != m.arguments && null != m.arguments.callee.caller;) m = m.arguments.callee.caller;
                null != m.arguments && m.arguments.length > 0 && null != m.arguments[0].currentTarget && (k = m.arguments[0].currentTarget)
            }
            null != k && (k instanceof Window || k === document || null != k.URL && null != k.body || null != k.nodeName && ("body" == k.nodeName.toLowerCase() || "#document" == k.nodeName.toLowerCase())) ? (window.pbreason = "Blocked a new window opened with URL: " + g[0] + " because it was triggered by the " + k.nodeName + " element", h = !1) : h = !0;
            document.webkitFullscreenElement || document.mozFullscreenElement || document.fullscreenElement;
            if (((new Date).getTime() - d < 1e3 || isNaN(d) && c()) && (window.pbreason = "Blocked a new window opened with URL: " + g[0] + " because a full screen was just initiated while opening this url.", document.exitFullscreen ? document.exitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen(), h = !1), 1 == h) {
                j = f.apply(this, g);
                var n = b(g);
                if (null != n && (i[n] = j), j !== window) {
                    var o = (new Date).getTime(),
                        p = j.blur;
                    j.blur = function() {
                        (new Date).getTime() - o < 1e3 ? (window.pbreason = "Blocked a new window opened with URL: " + g[0] + " because a it was blured", j.close(), a(g)) : p()
                    }
                }
            } else {
                var q = {
                    href: g[0]
                };
                q.replace = function(a) {
                    q.href = a
                }, j = {
                    close: function() {
                        return !0
                    },
                    test: function() {
                        return !0
                    },
                    blur: function() {
                        return !0
                    },
                    focus: function() {
                        return !0
                    },
                    showModelessDialog: function() {
                        return !0
                    },
                    showModalDialog: function() {
                        return !0
                    },
                    prompt: function() {
                        return !0
                    },
                    confirm: function() {
                        return !0
                    },
                    alert: function() {
                        return !0
                    },
                    moveTo: function() {
                        return !0
                    },
                    moveBy: function() {
                        return !0
                    },
                    resizeTo: function() {
                        return !0
                    },
                    resizeBy: function() {
                        return !0
                    },
                    scrollBy: function() {
                        return !0
                    },
                    scrollTo: function() {
                        return !0
                    },
                    getSelection: function() {
                        return !0
                    },
                    onunload: function() {
                        return !0
                    },
                    print: function() {
                        return !0
                    },
                    open: function() {
                        return this
                    },
                    opener: window,
                    closed: !1,
                    innerHeight: 480,
                    innerWidth: 640,
                    name: g[1],
                    location: q,
                    document: {
                        location: q
                    }
                }, e(window, j), j.window = j;
                var n = b(g);
                if (null != n) try {
                    i[n].close()
                } catch (r) {}
                setTimeout(function() {
                    var b;
                    b = j.location instanceof Object ? j.document.location instanceof Object ? null != q.href ? q.href : g[0] : j.document.location : j.location, g[0] = b, a(g)
                }, 100)
            }
            return j
        }

        function b(a) {
            d = a ? (new Date).getTime() : 0 / 0
        }

        function c() {
            return document.fullScreenElement && null !== document.fullScreenElement || null != document.mozFullscreenElement || null != document.webkitFullscreenElement
        }
        var d, e = "originalOpenFunction",
            f = window.open,
            g = document.createElement,
            h = document.createEvent,
            i = {},
            j = 0,
            k = null,
            l = window.location != window.parent.location ? document.referrer : document.location;
        window[e] = window.open, window.open = function() {
            try {
                return a.apply(this, arguments)
            } catch (b) {
                return null
            }
        }, document.createElement = function() {
            var a = g.apply(document, arguments);
            if ("a" == arguments[0] || "A" == arguments[0]) {
                j = (new Date).getTime();
                var b = a.dispatchEvent;
                a.dispatchEvent = function(c) {
                    return null != c.type && "click" == ("" + c.type).toLocaleLowerCase() ? (window.pbreason = "blocked due to an explicit dispatchEvent event with type 'click' on an 'a' tag", parent.postMessage({
                        type: "blockedWindow",
                        args: JSON.stringify({
                            0: a.href
                        })
                    }, l), !0) : b(c)
                }, k = a
            }
            return a
        }, document.createEvent = function() {
            try {
                return arguments[0].toLowerCase().indexOf("mouse") >= 0 && (new Date).getTime() - j <= 50 ? (window.pbreason = "Blocked because 'a' element was recently created and " + arguments[0] + " event was created shortly after", arguments[0] = k.href, parent.postMessage({
                    type: "blockedWindow",
                    args: JSON.stringify({
                        0: k.href
                    })
                }, l), null) : h.apply(document, arguments)
            } catch (a) {}
        }, document.addEventListener("fullscreenchange", function() {
            b(document.fullscreen)
        }, !1), document.addEventListener("mozfullscreenchange", function() {
            b(document.mozFullScreen)
        }, !1), document.addEventListener("webkitfullscreenchange", function() {
            b(document.webkitIsFullScreen)
        }, !1)
    }
    inject()
</script>

<body id="home" class="fixed-header" data-gr-c-s-loaded="true">
    <div id="featureBox" k style=""></div>
    <div class="feature" id="featureAnimation" style="height: 974px; width: 1920px; visibility: visible; perspective: 700px;">
        <div id="featureBackground" style="pointer-events:none;">
          
        </div>
    </div>

    <script type="text/javascript">
        /* verge 1.9.1+201402130803 | https://github.com/ryanve/verge | * MIT License 2013 Ryan Van Etten | Script to fetch viewport dimensions */ ! function(a, b, c) {
            "undefined" != typeof module && module.exports ? module.exports = c() : a[b] = c()
        }(this, "verge", function() {
            function a() {
                return {
                    width: k(),
                    height: l()
                }
            }

            function b(a, b) {
                var c = {};
                return b = +b || 0, c.width = (c.right = a.right + b) - (c.left = a.left - b), c.height = (c.bottom = a.bottom + b) - (c.top = a.top - b), c
            }

            function c(a, c) {
                return a = a && !a.nodeType ? a[0] : a, a && 1 === a.nodeType ? b(a.getBoundingClientRect(), c) : !1
            }

            function d(b) {
                b = null == b ? a() : 1 === b.nodeType ? c(b) : b;
                var d = b.height,
                    e = b.width;
                return d = "function" == typeof d ? d.call(b) : d, e = "function" == typeof e ? e.call(b) : e, e / d
            }
            var e = {},
                f = "undefined" != typeof window && window,
                g = "undefined" != typeof document && document,
                h = g && g.documentElement,
                i = f.matchMedia || f.msMatchMedia,
                j = i ? function(a) {
                    return !!i.call(f, a).matches
                } : function() {
                    return !1
                },
                k = e.viewportW = function() {
                    var a = h.clientWidth,
                        b = f.innerWidth;
                    return b > a ? b : a
                },
                l = e.viewportH = function() {
                    var a = h.clientHeight,
                        b = f.innerHeight;
                    return b > a ? b : a
                };
            return e.mq = j, e.matchMedia = i ? function() {
                return i.apply(f, arguments)
            } : function() {
                return {}
            }, e.viewport = a, e.scrollX = function() {
                return f.pageXOffset || h.scrollLeft
            }, e.scrollY = function() {
                return f.pageYOffset || h.scrollTop
            }, e.rectangle = c, e.aspect = d, e.inX = function(a, b) {
                var d = c(a, b);
                return !!d && d.right >= 0 && d.left <= k()
            }, e.inY = function(a, b) {
                var d = c(a, b);
                return !!d && d.bottom >= 0 && d.top <= l()
            }, e.inViewport = function(a, b) {
                var d = c(a, b);
                return !!d && d.bottom >= 0 && d.right >= 0 && d.top <= l() && d.left <= k()
            }, e
        });
        (function() {
            var p = {
                h: {
                    points: [1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1],
                    size: 5
                },
                n: {
                    points: [1, 0, 0, 0, 1, 1, 1, 0, 0, 1, 1, 0, 1, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1],
                    size: 5
                },
                k: {
                    points: [1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 1],
                    size: 5
                },
                r: {
                    points: [1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 1],
                    size: 5
                },
                 m: {
                    points: [1, 0, 0, 0, 0, 0, 1,   1, 1, 0, 0, 0, 1, 1,    1, 0, 1, 0, 1, 0, 1,  1, 0, 0, 1, 0, 0, 1,   1, 0, 0, 0, 0, 0, 1 ],
                    size: 7
                },
                a: {
                    points: [1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1],
                    size: 5
                },
                c: {
                    points: [1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1],
                    size: 5
                },
                f: {
                    points: [1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0],
                    size: 5
                },
                t: {
                    points: [1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0],
                    size: 5
                },
                p: {
                    points: [1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0],
                    size: 5
                },
                i: {
                    points: [1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1],
                    size: 3
                },
                x: {
                    points: [1, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 1],
                    size: 5
                },
                e: {
                    points: [1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1],
                    size: 5
                },
                l: {
                    points: [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1],
                    size: 5
                }
            };
            text = "naman";
            word = {
                points: [],
                size: 0
            };

            function c() {
                var j;
                var i;
                i = verge.viewportH();
                j = verge.viewportW();
                return [j, i]
            }
            for (var v = 0; v < 5; v++) {
                for (var t = 0, s = text.length; t < s; t++) {
                    curLetter = text[t];
                    curLetterSize = p[curLetter].size;
                    if (v == 0) {
                        word.size += curLetterSize;
                        if (t < s - 1) {
                            word.size += 1
                        }
                    }
                    for (var u = 0; u < curLetterSize; u++) {
                        word.points.push(p[curLetter].points[(curLetterSize * v) + u])
                    }
                    if (t < s - 1) {
                        word.points.push(0)
                    }
                }
            }
            viewportSize = c();
            $("#featureAnimation, #featureBoxz").height(viewportSize[1]);
            $("#featureAnimation, #featureBoxz, .featureTextGreen, .featureTextWhite").width(viewportSize[0]);
            diffword = [];
            for (var v = 0; v < 5; v++) {
                yoffset = v - 2;
                for (var t = 0; t < word.size; t++) {
                    xoffset = t - Math.ceil(word.size / 2);
                    if (word.points[(v * word.size) + t] == 1) {
                        diffword.push({
                            x: xoffset,
                            y: yoffset
                        })
                    }
                }
            }
            var l = Math.floor(parseInt($("#featureAnimation").width() / 150));
            var w = new TimelineMax({
                    delay: 1.2
                }),
                n = $("#featureBackground"),
                h = Math.ceil(($("#featureAnimation").height() / 2) / (l) * (l)),
                f = Math.ceil(($("#featureAnimation").width() / 2) / (l) * (l)),
                x = Math.max(f, h) + 150,
                m = $("#ctrl_slider"),
                a = {
                    value: 0
                },
                o = (document.all && !document.addEventListener);
            // w.eventCallback("onComplete", function() {
            //     $('.page-box').fadeTo(0, 1);
            //     w.timeScale(4);
            //     w.reverse();
            //     TweenMax.to("#featureBox, #featureAnimation", 1, {
            //         scale: 0.05,
            //         ease: Expo.easeIn,
            //         backgroundColor: "#fff"
            //     })
            // });
            w.add(e());

            function d(j, i) {
                return Math.ceil(Math.random() * (i - j) + j)
            }

            function q() {
                r = d(10, 240);
                g = d(10, 240);
                b = d(10, 240);
                return "rgb(" + r + "," + g + "," + b + ")"
            }

            function e() {
                var k = new TimelineLite(),
                    z = 1,
                    B = 45,
                    E = 1,
                    y = [],
                    C = [],
                    D, A, F, j;
                for (var B = 0; B < diffword.length; B++) {
                    D = $("<div class='star' style='background-color:green; z-index: 99; width:" + l + "px; height:" + l + "px'></div>").appendTo(n);
                    j = Math.random() * z * z;
                    C.push(D);
                    yy = (diffword[B].y * (l + 2));
                    xx = (diffword[B].x * (l + 2));
                    k.set(D, {
                        display: "block"
                    }, j);
                    TweenLite.set(D, {
                        scale: 0.05,
                        top: h,
                        left: f,
                        z: 0.1
                    });
                    k.add(new TweenMax(D, z, {
                        y: yy,
                        x: xx,
                        scale: 1,
                        ease: Expo.easeIn
                    }), j)
                }
                while (--B > -1) {
                    D = $("<div class='star' style='background-color:" + q() + "; width:" + l + "px; height:" + l + "px'></div>").appendTo(n);
                    F = Math.random() * z;
                    y.push(D);
                    A = Math.random() * Math.PI * 2;
                    k.set(D, {
                        display: "block"
                    }, F);
                    if (o) {
                        TweenLite.set(D, {
                            width: 1,
                            height: 1,
                            top: h,
                            left: f
                        });
                        k.add(new TweenMax(D, z, {
                            top: (h + Math.sin(A) * x) | 0,
                            left: (f + Math.cos(A) * x) | 0,
                            width: l,
                            height: l,
                            ease: Expo.easeIn,
                            repeat: E,
                            repeatDelay: Math.random() * z
                        }), F)
                    } else {
                        TweenLite.set(D, {
                            scale: 0.05,
                            top: h,
                            left: f,
                            z: 0.1
                        });
                        xx = Math.ceil((Math.cos(A) * x) / (l + 2)) * (l + 2), yy = Math.ceil((Math.sin(A) * x) / (l + 2)) * (l + 2);
                        k.add(new TweenMax(D, z, {
                            y: yy,
                            x: xx,
                            scale: 5,
                            ease: Cubic.easeIn,
                            repeat: E,
                            repeatDelay: Math.random() * z
                        }), F)
                    }
                }
                k.set(y, {
                    display: "none"
                });
                return k
            }
            TweenLite.set("#featureAnimation", {
                perspective: 700,
                visibility: "visible"
            })
        })();
    </script>

</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span>

</html>