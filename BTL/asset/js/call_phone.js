
document.getElementById('phone').addEventListener('click', function (event) {
    event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

    Swal.fire({
        title: 'Thông báo',
        text: 'Bạn có muốn gọi đến SĐT 0334204369 không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Có',
        cancelButtonText: 'Hủy Bỏ'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '';
        }
    });
});
