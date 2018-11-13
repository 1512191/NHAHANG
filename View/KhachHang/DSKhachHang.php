
<div>
    <table class="table">
    <thead>
      <tr>
        <th>Mã</th>
        <th>Tên </th>
        <th>Tên đăng nhập</th>
        <th>Mật khẩu</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Ngày tạo</th>
        <th>Ngày cập nhật</th>
        <th>Trạng thái</th>
        <th>Tác vụ</th>
      </tr>
    </thead>
    <tbody id="kq">
    <?php
        foreach ($dskh as $item)
        {
            ?>
    
        <tr class="<?php echo doiMau($item->TRANGTHAI) ?>">
        <td><?php echo $item->MA;?></td>
        <td><?php echo $item->TEN;?></td>
        <td><?php echo $item->TENDN;?></td>
        <td><?php echo $item->MK;?></td>
        <td><?php echo $item->DIACHI;?></td>
        <td><?php echo $item->SDT;?></td>
        <td><?php echo $item->EMAIL;?></td>
        <td><?php echo $item->NGAYTAO;?></td>
        <td><?php echo $item->NGAYCAPNHAT;?></td>
        <td><?php echo doiTenTrangThai($item->TRANGTHAI);?></td>
        <td>
           
            <a onclick="return confirm('Bạn chắc chắn với điều này')" href="?controller=nguoidung&action=XoaKH&ma=<?php echo $item->MA;?>" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                        <span class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                        </span>
            </a>
            
        </td>
      </tr>      
     <?php
        }
    ?>
    </tbody>
  </table>
    <nav style="text-align:center" aria-label="Page navigation example">
        <ul  class="pagination">
      <li class="page-item">
      <a data-trang="1" class="page-link" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span>First</span>
      </a>
    </li>
    <li class="page-item">
      <a data-trang="1" class="page-link" id="prev" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span>Previous</span>
      </a>
    </li>
    <?php
    for($i = 1; $i<=$tong; $i++)
    {
       ?>
   
    <li class="page-item"><a data-trang="<?php echo $i ?>"class="page-link"><?php echo $i?></a></li>
    
     <?php
    }
    ?>
    <li class="page-item">
      <a data-trang="2" class="page-link" id="next" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span>Next</span>
      </a>
    </li>
    <li class="page-item">
      <a data-trang="<?php echo $tong ?>" class="page-link" id="cuoi" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span>Last</span>
      </a>
    </li>
  </ul>
</nav>
</div>
<script>
    $(function(){
        var trangcuoi = $('#cuoi').data('trang');
        $('.page-link').click(function(){
            var tranght = $(this);
            
            tranght.addClass( "indam" );
            var _trang = tranght.data('trang');
           
            $.get('http://localhost:81/DoAnMVC/?controller=khachhang&action=DSKhachHangPhanTrang', {trang:_trang})
                    .done(function(data){
                        if(_trang > 0 && _trang <= trangcuoi ){
                        $('#prev').data('trang',_trang - 1);
                        $('#next').data('trang',_trang + 1);
                        $('#kq').html(data)
                    }
            })
        })
    })
</script>