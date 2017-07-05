@extends('layouts.admin.adminMaster')
@include('admin.blogs.modals.create_blog')

@section('content')
    <h3>Blogs</h3>
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
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Blog Name</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($pages as $page)
            <tr>
                <td style="width: 35px;"><a href="/admin/blog/edit/{{$page->id}}"><i class="fa fa-pencil"></i></a></td>
                <td>{{$page->name}}</td>
            </tr>
        @empty
            <td colspan="4">You do not have any blogs</td>
        @endforelse
        </tbody>
    </table>
    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#create-page">Add Blog</button>
@stop