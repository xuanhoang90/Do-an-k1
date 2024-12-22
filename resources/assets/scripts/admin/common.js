window.addEventListener('load', function load() {
  const loader = document.getElementById('loader');
  setTimeout(function() {
      loader.classList.add('fadeOut');
  }, 300);
});


// Lấy phần tử DOM
const imageInput = document.getElementById('imageInput');
const preview = document.getElementById('preview');

// Xử lý sự kiện thay đổi input
imageInput.addEventListener('change', function (event) {
  const file = event.target.files[0]; // Lấy file đầu tiên
  if (file) {
    const reader = new FileReader(); // Tạo FileReader để đọc file

    reader.onload = function (e) {
      preview.src = e.target.result; // Gán src của img bằng kết quả đọc file
      preview.style.display = 'block'; // Hiển thị ảnh preview
    };

    reader.readAsDataURL(file); // Đọc file dưới dạng Data URL
  } else {
    preview.style.display = 'none'; // Ẩn preview nếu không có file
    preview.src = '';
  }
});

$(document).on('click', '.block-preview-image .changeImageBtn', function () {
  $(this).parents('figure').find('#imageInput').click()
})