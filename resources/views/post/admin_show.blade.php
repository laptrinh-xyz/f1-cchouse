{{-- Created at 2015/06/21 09:27 htien Exp $ --}}
@extends('_layouts.admin.main_page')

@section('page_title', 'Bài viết #' . $post->id)

{{-- ======================================================= LOAD RESOURCES --}}

{{-- ========================================================= LOAD CONTENT --}}

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('admin::index') }}">Vùng quản lý</a></li>
  <li><a href="{{ route('admin::@dmin-zone.posts.index') }}">Bài viết</a></li>
  <li class="active">#{{ $post->id }} - {{ $post->post_title }}</li>
</ol>

<div class="container">
  <?php $postId = Hashids::encode($post->id); ?>

  <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="btn-group" role="group">
        <a class="btn btn-primary" href="{{ route('admin::@dmin-zone.posts.index') }}"><span class="glyphicon glyphicon-menu-left"></span></a>
        <a class="btn btn-primary" href="{{ route('admin::@dmin-zone.posts.edit', $post->id) }}">Chỉnh sửa</a>
      </div>
      <div class="btn-group">
        <a class="btn btn-primary" href="{{ route('admin::@dmin-zone.posts.create') }}">Bài viết mới</a>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
          <li>
            <a href="javascript:void(0)" onclick="_func.cfmOnDeletePost('{{ $post->id }}', '{{ $post->post_title }}', '{{ csrf_token() }}')" style="color:#c9302c">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa bài viết
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-9">
          <h2 style="margin-top:0">{{ $post->post_title }}</h2>
          <p>
            <em>&mdash; Cập nhật lần cuối:</em> {{ ivy_echo_date($post->updated_at) }}
          </p>
        </div>
        <div class="col-md-3">
          <ul>
            <li><em>Ngày tạo:</em> {{ ivy_echo_date($post->created_at) }}</li>
            <li><em>Tác giả:</em> {{ empty($post->post_author) ? 'SYSTEM' : $post->author->name }}</li>
          </ul>
          <a href="{{ route('article.index', $category->term_slug . '/' . $post->post_name . '--' . $postId) }}" target="_blank">Xem bài viết</a>
        </div>
      </div>
    </div>
  </div>
  <div class="panel">
    <div class="panel-heading">Tóm tắt</div>
    <div class="panel-body">
      {{ $post->post_excerpt }}
    </div>
  </div>
  <div class="panel">
    <div class="panel-heading">Nội dung chi tiết</div>
    <div class="panel-body post-content">
      {!! $post->post_content !!}
    </div>
  </div>

</div>

@stop
