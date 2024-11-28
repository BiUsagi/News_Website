
  document.addEventListener('DOMContentLoaded', function () {
    var toastElement = document.getElementById('toast-success');
    if (toastElement) {
      var toast = new bootstrap.Toast(toastElement, {
        delay: 5000 // Hiển thị trong 5 giây
      });
      toast.show();
    }
  });
