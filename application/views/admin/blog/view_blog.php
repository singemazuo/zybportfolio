<div class="container p-5">
    <div class="text-right">
        <button class="btn btn-outline-secondary" data-toggle="modal" data-target=".blog-creation">Create New Blog</button>
        <button class="btn btn-outline-secondary" disabled="true" id="btnDeleteBlogs">Delete Selected Blogs</button>
    </div>

    <div class="my-4 container" id="blogs-container">
        <?php
            if (empty($blogs)){
        ?>
                <h5 class="text-center"><strong>No Datas</strong> on Blog Table, please create them firstly.</h5>
        <?php
            }else{
        ?>
                <table class="table" style="table-layout: fixed;">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 5%">id</th>
                        <th scope="col" style="width: 10%">Title</th>
                        <th scope="col" style="width: 50%">Content</th>
                        <th scope="col" style="width: 15%">Date</th>
                        <th scope="col" style="width: 15%">Image Path</th>
                        <th scope="col" style="width: 5%"><input type="checkbox" name="selectAll" id="checkAll"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($blogs as $blog){
                        echo '<tr>';
                        echo '<td scope="col" class="blog-id">';
                        echo '<a href="#blog-modi" data-toggle="modal" data-id="'.$blog->id.'">';
                        echo $blog->id;
                        echo '</a>';
                        echo '</td>';
                        echo '<td scope="col" class="text-nowrap" style="overflow: hidden">';
                        echo $blog->title;
                        echo '</td>';
                        echo '<td scope="col" class="text-nowrap" style="overflow: hidden">';
                        echo '<div style="overflow: hidden;height: 2rem;">';
                        echo $blog->content;
                        echo '</div>';
                        echo '</td>';
                        echo '<td scope="col" class="text-nowrap" style="overflow: hidden">';
                        echo $blog->date;
                        echo '</td>';
                        echo '<td scope="col" class="text-nowrap" style="overflow: hidden">';
                        echo $blog->img;
                        echo '</td>';
                        echo '<td scope="col">';
                        echo '<input type="checkbox" name="selectAll" class="check">';
                        echo '</td>';
                        echo '</tr>';
                    } ?>
                    </tbody>
                </table>
        <?php
            }
        ?>
    </div>

    <div class="modal fade blog-creation" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <form action="/admin/blog/creation" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New Blog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label" for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="title">Content</label>
                            <textarea name="content" id="blog-creation-content" cols="30" rows="40" class="form-control"></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img" id="imgForCreation">
                                <label class="custom-file-label" for="img">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="blog-modi" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <form action="/admin/blog/update" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modify Blog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label" for="id">ID:</label>
                            <input type="text" name="id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="content">Content</label>
                            <textarea name="content" id="blog-modi-content" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="row input-group mb-3 mx-auto">
                            <div class="col custom-file">
                                <input type="file" class="custom-file-input" name="img" id="imgForCreation">
                                <label class="custom-file-label" for="img">Choose file</label>
                            </div>
                            <div class="col">
                                <input type="date" name="date" class="form-control" value="dd-MM-yyyy">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>