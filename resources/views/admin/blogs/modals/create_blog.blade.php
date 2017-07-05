<div id="create-page" class="modal fade" data-backdrop="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/blog/create" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                <input type="hidden" name="page_template_id" value="1"/>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Create Blog</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Blog Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Blog Name"/>
                    </div>
                    <div class="form-group">
                        <label for="slug">Blog URL String (www.website.com/blog/[string here])</label>
                        <input type="text" name="slug" class="form-control" placeholder="Blog Slug"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->