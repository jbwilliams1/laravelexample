@extends('layouts.admin.adminMaster')

@section('content')
    <ol class="breadcrumb">
        <li><a href="/admin/blogs">Blogs</a></li>
        <li class="active">Edit Blog: '{{$page->name}}'</li>
    </ol>

    <h3>Editing '{{$page->name}}' Blog</h3>
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
        <form method="post" action="/admin/blog/edit/{{$page->id}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
            <div class="col-md-4">
                <div class="form-group-sm">
                    <label for="name">Blog Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Blog Name" value="{{$page->name}}"/>
                </div>
                <div class="form-group-sm">
                    <label for="slug">Blog URL String (www.website.com/blog/[string here])</label>
                    <input type="text" name="slug" class="form-control" placeholder="Blog URL String" value="{{$page->slug}}"/>
                </div>
                <div class="form-group-sm">
                    <label for="description">Blog Excerpt</label>
                    <input type="text" name="description" class="form-control" placeholder="Blog Description" value="{{$page->description}}"/>
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