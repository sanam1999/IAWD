
    let systemOtp;

    document.querySelector('.getpay').addEventListener('click', () => {
        document.querySelector('.payment').style.display = 'block';
    });

    document.querySelector('.paymentnext').addEventListener('click', () => {
        systemOtp = Math.floor(1000 + Math.random() * 9000).toString();
        alert("Don't share this one-time password with anyone. It's for your security. If you didn't request it, contact support immediately. Your OTP is:- " + systemOtp);
        document.querySelector('.payment').style.display = 'none';
        document.querySelector('.otp').style.display = 'block';
    });

    document.querySelector('#cancel-invoice').addEventListener('click', () => {
        document.querySelector('.payment').style.display = 'none';
    });

    document.querySelector('#cancel-otp').addEventListener('click', () => {
        document.querySelector('.otp').style.display = 'none';
    });

    document.querySelector('#paymentForm').addEventListener('submit', function (event) {
        const userOtp = document.querySelector('#otp-code').value;
        if (userOtp !== systemOtp) {
            document.querySelector('#otp-code').style.borderColor = 'red';
            document.querySelector('.errorotp').innerText = "Invalid OTP";
            event.preventDefault();
        }
    });
