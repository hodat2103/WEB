<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .progress-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 300px;
            height: 50px;
            background-color: #eee;
            padding: 10px;
        }

        .step {
            width: 80px;
            height: 30px;
            background-color: #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .step1 {
            background-color: #ff9800;
        }

        .step2 {
            background-color: #2196f3;
        }

        .step3 {
            background-color: #4caf50;
        }

        .step-text {
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>

<body>

    


    <div class="progress-bar">
        <div class="step step1">
            <span class="step-text">Đặt Tour</span>
        </div>
        <div class="step step2">
            <span class="step-text">Thanh toán</span>
        </div>
        <div class="step step3">
            <span class="step-text">Hóa đơn</span>
        </div>
        <script>
        // Các bước tiến trình
        const steps = [1, 2, 3];

        // Tiến trình hiện tại, ban đầu là 0
        let currentStep = 0;

        // Hàm cập nhật tiến trình
        function updateProgressBar() {
            const progressBar = document.querySelector('.progress-bar');
            const steps = progressBar.querySelectorAll('.step');

            // Loại bỏ tất cả các class active
            steps.forEach((step) => {
                step.classList.remove('active');
            });

            // Thêm class active cho các bước đã hoàn thành
            for (let i = 0; i < currentStep; i++) {
                steps[i].classList.add('active');
            }
        }

        // Cập nhật tiến trình ban đầu
        updateProgressBar();

        // Mô phỏng chuyển bước tiến trình
        setTimeout(() => {
            currentStep = 1;
            updateProgressBar();
        }, 2000);

        setTimeout(() => {
            currentStep = 2;
            updateProgressBar();
        }, 4000);

        setTimeout(() => {
            currentStep = 3;
            updateProgressBar();
        }, 6000);
    </script>
    </div>

    
</body>

</html>