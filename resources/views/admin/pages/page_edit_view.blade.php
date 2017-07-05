@extends('layouts.admin.adminMaster')

@section('content')
    <ol class="breadcrumb">
        <li><a href="/admin/pages">Pages</a></li>
        <li class="active">Edit page: '{{$page->name}}'</li>
    </ol>

    <h3>Editing '{{$page->name}}' Page</h3>
    <br>
    <?php echo Session::get('message'); ?>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div clas="page-edit-form-wrapper">
        <form method="post" action="/admin/page/edit/{{$page->id}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
            <div class="col-md-4">
                <div class="form-group-sm">
                    <label for="name">Page Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Page Name" value="{{$page->name}}"/>
                </div>
                <div class="form-group-sm">
                    <label for="slug">Page URL String</label>
                    <input type="text" name="slug" class="form-control" placeholder="Page URL String" value="{{$page->slug}}"/>
                </div>
                <div class="form-group-sm">
                    <label for="description">Page Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Page Description" value="{{$page->description}}"/>
                </div>
                <div class="form-group">
                    <label for="parent_id">Parent Page</label>
                    <select name="parent_id" class="form-control">
                        <option value="0">No parent page</option>
                        @if (!empty($pages))
                            @foreach ($pages as $_page)
                                @if ($_page->id !== $page->id)
                                <option {{$page->parent_id == $_page->id ? 'selected' : ''}} value="{{$_page->id}}">{{$_page->name}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group-sm">
                    <input type="hidden" name="allow_menu" value="0"/>
                    <input type="checkbox" name="allow_menu" value="1" <?php echo $page->allow_menu ? 'checked' : ''  ?>/>
                    <label for="allow_menu">Allow page on main menu</label>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="content">Page Content</label>
                    <textarea rows="50" placeholder="Page Content (HTML) goes here" id="content" name="content">{{$page->content}}</textarea>
                </div>
                <button type="submit" class="btn btn-success pull-right">Save Page</button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            CKEDITOR.replace('content');
        })
    </script>
@stop