<div id="create-page" class="modal fade" data-backdrop="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/page/create" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Create Page</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Page Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Page Name"/>
                    </div>
                    <div class="form-group">
                        <label for="slug">Page URL String (www.website.com/[string here])</label>
                        <input type="text" name="slug" class="form-control" placeholder="Page Slug"/>
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Parent Page</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">No parent page</option>
                            @if (!empty($pages))
                            @foreach ($pages as $page)
                            <option value="{{$page->id}}">{{$page->name}}</option>
                            @endforeach
                            @endif
                        </select>
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