$(function() {
    var self = this;

    $(window).on('scroll', function () {
        var pos = $(window).scrollTop();
        var pos2 = pos + 50;
        var scrollBottom = pos + $(window).height();

        // Link Highlighting
        if (pos2 > $('#about').offset().top)      { highlightLink('about'); }
        if (pos2 > $('#portfolio').offset().top)  { highlightLink('portfolio'); }
        if (pos2 > $('#blog').offset().top)       { highlightLink('blog'); }
        if (pos2 > $('#contact').offset().top ||
            pos + $(window).height() === $(document).height()) {
            highlightLink('contact');
        }
    });

    // SCROLL ANIMATIONS
    function onScrollInit( items, elemTrigger ) {
        var offset = $(window).height() / 1.6
        items.each( function() {
            var elem = $(this),
                animationClass = elem.attr('data-animation'),
                animationDelay = elem.attr('data-delay');

            elem.css({
                '-webkit-animation-delay':  animationDelay,
                '-moz-animation-delay':     animationDelay,
                'animation-delay':          animationDelay
            });

            var trigger = (elemTrigger) ? trigger : elem;

            trigger.waypoint(function() {
                elem.addClass('animated').addClass(animationClass);
                if (elem.get(0).id === 'gallery') mixClear(); //OPTIONAL
            },{
                triggerOnce: true,
                offset: offset
            });
        });
    }

    setTimeout(function() { onScrollInit($('.waypoint')) }, 10);

    function highlightLink(anchor) {
        $('nav > .active').removeClass('active');
        $("nav").find('[dest="' + anchor + '"]').addClass('active');
    }

    mixitup(document.querySelector('#portfolio-conainter #projects'),{
        controls: {
            toggleLogic: 'and'
        }
    });

    $('.gif-1-modal').on('shown', function(e) {
        $('#all-projects').click();
    })

    function scrollNav() {
        $('.navbar .navbar-nav a').click(function(){
            //Animate
            $('html, body').stop().animate({
                scrollTop: $( $(this).attr('href') ).offset().top
            }, 400);
            return false;
        });

        $('footer .icon-wrap a').click(function(){
            //Animate
            $('html, body').stop().animate({
                scrollTop: $('#about').offset().top
            }, 400);
            return false;
        });
    }
    scrollNav();

    $('#imgForCreation').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });

    var retrieveBlogs = function(callback){
        $.get("/blog/allBlogs",function (result) {
            callback(result);
        });
    };

    this._blogs = [];

    function formatDate(d){
        let date = new Date(d);
        let day = ("0" + date.getDate()).slice(-2);
        let month = ("0" + (date.getMonth() + 1)).slice(-2);

        let datetime = date.getFullYear()+"-"+(month)+"-"+(day);
        return datetime;
    }

    retrieveBlogs(function(blogs){
        if(blogs === undefined || blogs.length <= 0) return;

        self._blogs = blogs;

        let rowCount = Math.ceil(blogs.length/4);
        let container = document.createElement('div');
        container.setAttribute('class','container mt-5');
        $('#blog-conainter > .container').append(container);

        for (let i = 0; i < rowCount; i++) {
            let row = document.createElement('div');
            row.setAttribute('class', 'row');
            container.append(row);

            let colCount = blogs.length<4?blogs.length:4;
            for (let j = 0; j < colCount; j++) {


                let col = document.createElement('div');
                col.setAttribute('class','col-xs-12 col-md-3 p-2');
                col.innerHTML = `
                    <div class="card blog-card bg-soft-blue txt-soft-white" style="border: none;" data-target=".view-blog" id="model-`+(i*4+j)+`">
                        <div class="card-img-top text-center mt-2 txt-soft-blue" style="overflow: hidden;height: 10em">
                            <img src="`+blogs[i*4+j].img+`" alt="`+blogs[i*4+j].title+`" class="w-100 rounded" >
                        </div>

                        <div class="card-body">
                            <h5 class="card-title" style="overflow: hidden">`+blogs[i*4+j].title+`</h5>
                            <h6 class="card-subtitle mb-2 text-muted">`+formatDate(blogs[i*4+j].date)+`</h6>
                        </div>
                    </div>
                `;
                row.append(col);
            }
        }

        $('#blog-conainter > .container .card').click(function(){
            let i = parseInt(this.id.replace('model-',''));
            let blog = self._blogs[i];

            $('#blog-modal .blog-img').attr('src',blog.img);
            $('#blog-modal .blog-title').html(blog.title);
            $('#blog-modal .blog-date').html(formatDate(blog.date));
            $('#blog-modal .blog-paragraph').html(blog.content);

            $('#blog-modal').modal('show');
        });
    });

    // $('img.blog-img').on('load',function(){
    //     $(this).jqthumb({
    //         width : '100%',
    //         height : '142px',
    //         zoom : '1',
    //         method : 'auto'
    //     });
    // }).each(function(){
    //     if(this.complete) {
    //         $(this).trigger('load');
    //     }
    // });

    // var conn = new Connection(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);
    // new Vue({
    //     el: '#content',
    //     data: {
    //         blogs:[],
    //         blogRowCount:0
    //     },
    //     created:function () {
    //         this.getAllBlogs();
    //     },
    //     methods: {
    //         getAllBlogs:function () {
    //             var that = this;
    //             retrieveBlogs(function(blogs){
    //                 that.blogRowCount = parseInt(blogs.length/4|0) + 1;
    //                 that.blogs = blogs;
    //             });
    //         }
    //     }
    // });
});