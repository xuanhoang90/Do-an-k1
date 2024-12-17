@extends('admin')



@section('title', 'List')
@section('name', 'Category')
@section('app-content')

<div class="row">
  <div class="col-md-12">
    <div class="bgc-white bd bdrs-3 p-20 mB-20">
      <h4 class="c-grey-900 mB-20">User shared Content</h4>
      <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Name User</th>
              <th>Title</th>
              <th>Image</th>
              <th>Content</th>
              <th>Create_at</th>
              <th>Status</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Name User</th>
              <th>Title</th>
              <th>Image</th>
              <th>Content</th>
              <th>Create_at</th>
              <th>Status</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($social_post as $social_post)
            <tr>
              <td>{{$social_post->user->name}}</td>
              <td>{{$social_post->title}}</td>
              <td style="text-align: center; vertical-align: middle; padding: 0;">
                  <img src="{{ $social_post->lesson_history->image }}" alt="Lesson Image" style="width: 100px;">
              </td>
              <td>{{$social_post->content}}</td>
              <td>{{$social_post->created_at}}</td>
              <td>
                <label class="switch">
                  <input type="checkbox" class="status-toggle" data-id="{{ $social_post->id }}" {{($social_post->status) == 1 ? 'checked' : '' }}>
                  <span class="slider round"></span>
                </label>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  </div>
</div>

<script>
  // Đợi DOM tải xong
  document.addEventListener('DOMContentLoaded', function () {
      // Lấy tất cả các công tắc trạng thái
      const toggles = document.querySelectorAll('.status-toggle');

      toggles.forEach(toggle => {
          // Lắng nghe sự kiện thay đổi trạng thái công tắc
          toggle.addEventListener('change', function () {
              // Lấy ID của bài đăng
              const postId = this.getAttribute('data-id');
              // Xác định status (1: bật, 2: tắt)
              const status = this.checked ? 1 : 2;

              // Gửi yêu cầu AJAX tới server
              fetch('/social-posts/update-status', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                  },
                  body: JSON.stringify({
                      id: postId,
                      status: status
                  })
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      console.log('Status updated successfully!');
                  } else {
                      console.error('Failed to update status.');
                  }
              })
              .catch(error => console.error('Error:', error));
          });
      });
  });
</script>
@endsection
