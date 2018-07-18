@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> 话题 /
                    @if($topic->id)
                        修改 #{{$topic->id}}
                    @else
                        创建
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($topic->id)
                    <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    
                <div class="form-group">
                	<label for="title-field">帖子标题</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $topic->title ) }}" />
                </div> 
                <div class="form-group">
                	<label for="body-field">帖子内容</label>
                	<textarea name="body" id="body-field" class="form-control" rows="3">{{ old('body', $topic->body ) }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="user_id-field">用户 ID</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $topic->user_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="category_id-field">分类 ID</label>
                    <input class="form-control" type="text" name="category_id" id="category_id-field" value="{{ old('category_id', $topic->category_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="reply_count-field">回复数量</label>
                    <input class="form-control" type="text" name="reply_count" id="reply_count-field" value="{{ old('reply_count', $topic->reply_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="view_count-field">查看总数</label>
                    <input class="form-control" type="text" name="view_count" id="view_count-field" value="{{ old('view_count', $topic->view_count ) }}" />
                </div> 
                <div class="form-group">
                    <label for="last_reply_user_id-field">最后回复的用户 ID</label>
                    <input class="form-control" type="text" name="last_reply_user_id" id="last_reply_user_id-field" value="{{ old('last_reply_user_id', $topic->last_reply_user_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order-field">排序</label>
                    <input class="form-control" type="text" name="order" id="order-field" value="{{ old('order', $topic->order ) }}" />
                </div> 
                <div class="form-group">
                	<label for="excerpt-field">文章摘要</label>
                	<textarea name="excerpt" id="excerpt-field" class="form-control" rows="3">{{ old('excerpt', $topic->excerpt ) }}</textarea>
                </div> 
                <div class="form-group">
                	<label for="slug-field">链接</label>
                	<input class="form-control" type="text" name="slug" id="slug-field" value="{{ old('slug', $topic->slug ) }}" />
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">保存</button>
                        <a class="btn btn-link pull-right" href="{{ route('topics.index') }}"><i class="glyphicon glyphicon-backward"></i>  后退</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection