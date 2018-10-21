    <div class="footer-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 clearfix">
                    <div class="footer-left">
                        <ul>
                            <li><a href="#" target="_blank">码农技术</a></li>
                            <li><a href="#" target="_blank">关于我们</a></li>
                            <li><a href="#" target="_blank">sitemap</a></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="footer-right">
                        <ul>
                            <li>© 2018 广告联盟大事记2.0</li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="am-backtop"><i class="fa fa-angle-up"></i></a>

    <script>
        $(function() {
            $('.js_toggle_nav').on('click', function() {
                $('.js_nav').toggleClass('d-none');
                $('.js_search').addClass('d-none');
            });
            $('.js_toggle_search').on('click', function() {
                $('.js_search').toggleClass('d-none');
                $('.js_nav').addClass('d-none');
            });
        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            !function(o) {
                "use strict";
                o.fn.toTop = function(t) {
                    var i = this,
                        e = o(window),
                        s = o("html, body"),
                        n = o.extend({
                            autohide: !0,
                            offset: 420,
                            speed: 500,
                            position: !0
                        }, t);
                    i.css({
                        cursor: "pointer"
                    }), n.autohide && i.css("display", "none"), n.position && i.css({
                        position: "fixed"
                    }), i.click(function() {
                        s.animate({
                            scrollTop: 0
                        }, n.speed);
                    }), e.scroll(function() {
                        var o = e.scrollTop();
                        n.autohide && (o > n.offset ? i.fadeIn(n.speed) : i.fadeOut(n.speed))
                    })
                }
            }(jQuery);
            $(function() {
                $('.am-backtop').toTop();
            });
        });
        jQuery(document).ready(function(a) {
            var c = 1,
                d = 2;
            a.browser.msie && 6 == a.browser.version && !a.support.style || (e = a("#J_main_left").width(), f = a("#J_main_left .side-box"), g = f.length, g >= (c > 0) && g >= (d > 0) && a(window).scroll(function() {
                var b = document.documentElement.scrollTop + document.body.scrollTop;
                b > f.eq(g - 1).offset().top + f.eq(g - 1).height() ? 0 == a(".roller").length ? (f.parent().append('<div class="roller"></div>'), f.eq(c - 1).clone().appendTo(".roller"), c !== d && f.eq(d - 1).clone().appendTo(".roller"), a(".roller").css({
                    position: "fixed",
                    top: 0,
                    zIndex: 999
                }), a(".roller").width(e)) : a(".roller").fadeIn(300) : a(".roller").fadeOut(300)
            }))
        });
    </script>

</body>
</html>
