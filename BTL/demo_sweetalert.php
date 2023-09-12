<html>

<head>
    <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css"></script>
</head>

<body>
    <>
    <a href="#" id="myLink">Click me</a>


    <script>
        document.getElementById('booing_tour').addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

            Swal.fire({
                title: 'Đặt Tour',
                html: '<input id="name" class="swal2-input" placeholder="Tên">' +
                    '<input id="email" class="swal2-input" placeholder="Email">' +
                    '<label for="choose:" style="display: block; margin-top: 10px;">' +
                    '<input id="car" type="checkbox"> Ô tô <br><br  >' +
                    '<input id="airplane" type="checkbox"> Máy bay' +
                    '</label>',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'OK',
                cancelButtonColor: '#d33',
                preConfirm: function() {
                    const name = Swal.getPopup().querySelector('#name').value;
                    const email = Swal.getPopup().querySelector('#email').value;
                    const car = Swal.getPopup().querySelector('#car').checked;
                    const airplane = Swal.getPopup().querySelector('#airplane').checked;


                    if (!name || !email || (!car && !airplane)) {
                        Swal.showValidationMessage('Vui lòng điền đầy đủ thông tin và đồng ý với điều khoản');
                    }

                    return {
                        name: name,
                        email: email,
                        car: car,
                        airplane: airplane
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Thanh toán',
                        text: 'Vui lòng nhập thông tin thanh toán',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: 'OK',
                        preConfirm: function() {
                            // Xử lý thanh toán tại đây
                            // ...

                            // Trả về một Promise để đồng bộ hóa
                            return new Promise(function(resolve, reject) {
                                // Giả định xử lý thanh toán mất 2 giây
                                setTimeout(function() {
                                    resolve();
                                }, 2000);
                            });
                        }
                    }).then((paymentResult) => {
                        // Xử lý kết quả thanh toán tại đây
                        if (paymentResult.isConfirmed) {
                            Swal.fire({
                                title: 'SweetAlert 2',
                                text: 'Nội dung SweetAlert 2',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        });
    </script>



</body>

</html>