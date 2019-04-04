$(function() {
    $('#imgForCreation').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });

    $("#checkAll").click(function () {
        $(".check").prop('checked', $(this).prop('checked'));

        if($(this).prop('checked')){
            $('#btnDeleteBlogs').prop( "disabled", false );
        }else{
            $('#btnDeleteBlogs').prop( "disabled", true );
        }
    });

    $('#btnDeleteBlogs').on('click',function () {
        let count = $('table tbody tr').filter(':has(:checkbox:checked)').length;
        let ids = [];

        $('table tbody tr').filter(':has(:checkbox:checked)').each(function (i) {
            let id = $(this).find('.blog-id a').html();
            ids.push(id);

            if (i+1 === count) {
                // this will be executed at the end of the loop
                $.ajax({
                    type : 'post',
                    url : '/admin/blog/delete',
                    data :  {ids:ids},
                    success : function(blog){
                        retrieveBlogs();
                    }
                });
            }
        });
    });

    $(".check").on('change',function(){
        if($(this).prop('checked')){
            $('#btnDeleteBlogs').prop( "disabled", false );
        }else{
            $('#btnDeleteBlogs').prop( "disabled", true );
        }
    });

    $('.blog-creation').on('show.bs.modal', function (e){
        $('#blog-modi [name="id"]').val('');
        $('#blog-modi [name="title"]').val('');
        $('#blog-modi [name="content"]').val('');
    });

    $('#blog-modi').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'blog/getBlog',
            data :  'id='+ rowid, //Pass $id
            success : function(blog){
                $('#blog-modi [name="id"]').val(blog.id);
                $('#blog-modi [name="title"]').val(blog.title);
                txtModi.setData(blog.content);
                $('#blog-modi [name="img"]').val(blog.img);

                let date = new Date(blog.date);
                let day = ("0" + date.getDate()).slice(-2);
                let month = ("0" + (date.getMonth() + 1)).slice(-2);

                let datetime = date.getFullYear()+"-"+(month)+"-"+(day) ;
                $('#blog-modi [name="date"]').val(datetime);
            }
        });
    });
    
    function retrieveBlogs() {
        $.ajax({
            type : 'get',
            url : 'blog/allBlogs',
            success : function(blogs){
                if (blogs.length <= 0){
                    $('#btnDeleteBlogs').prop( "disabled", true );

                    $('#blogs-container').html(`
                        <h5 class="text-center"><strong>No Datas</strong> on Blog Table, please create them firstly.</h5>
                    `);
                    return;
                }
                
                $('table tbody').html('');
                for (let i = 0; i < blogs.length; i++) {
                    let blog = blogs[i];
                    let tr = $('<tr></tr>');
                    $('table tbody').append(tr);

                    tr.html(`
                        <td scope="col" class="blog-id">
                            <a href="#blog-modi" data-toggle="modal" data-id="`+blog.id+`">
                            `+blog.id+`
                            </a>
                        </td>
                        <td scope="col" class="text-nowrap" style="overflow: hidden">
                            `+blog.title+`
                        </td>
                        <td scope="col" class="text-nowrap" style="overflow: hidden">
                            <div style="overflow: hidden;height: 2rem;">
                                `+blog.content+`
                            </div>
                        </td>
                        <td scope="col" class="text-nowrap" style="overflow: hidden">
                            `+blog.date+`
                        </td>
                        <td scope="col" class="text-nowrap" style="overflow: hidden">
                            `+blog.img+`
                        </td>
                        <td scope="col" style="overflow: hidden">
                            <input type="checkbox" name="selectAll" class="check">
                        </td>
                    `);
                }
            }
        });
    }

    CKEDITOR.replace('blog-creation-content');
    let txtModi = CKEDITOR.replace('blog-modi-content');

    // var io = {};
    // io.selector = "div.blog-creation textarea";
    // io.menubar = false;
    // io.height = 500;
    // io.setup = function(ed) {
    //     ed.on("init", function (e) {
    //         setTimeout(function () {
    //             var co = {};
    //             co.selector = 'div#blog-modi textarea';
    //             co.menubar = false;
    //             co.height = 500;
    //             tinymce.init(co);
    //         }, 1000);
    //     });
    // };
    //
    // tinymce.init(io);

});