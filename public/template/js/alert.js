

import Swal from 'sweetalert2';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';

const Swal = require('sweetalert2');

$(document).ready(function() {
  $('#add-cart').click(function() {
    // Gửi yêu cầu thanh toán
    // ...

    // Hiển thị thông báo thanh toán thành công
    Swal.fire({
      title: 'Thêm giỏ hàng thành công!',
      text: 'Cảm ơn bạn đã thêm.',
      icon: 'success',
      confirmButtonText: 'OK'
    });
  });
});