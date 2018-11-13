
<div>
    <table class="table">
    <thead>
      <tr>
        <th>Mã</th>
        <th>Tên </th>
        <th>Giá</th>
        <th>Hình</th>
        <th>Trạng thái</th>
        <th>Tác vụ</th>
        
      </tr>
    </thead>
    <tbody id="kq">
    <?php
        foreach ($dsma as $item)
        {
            ?>
    
        <tr class="<?php echo doiMau($item->TRANGTHAI) ?>">
        <td><?php echo $item->MA;?></td>
        <td><?php echo $item->TEN;?></td>
        <td><?php echo $item->GIA;?></td>
        <td><img src="<?php echo $item->HINH;?>" width="100px" height="100px"></td>
        <td><?php echo doiTenTrangThai($item->TRANGTHAI);?></td>
        <td>
           
            <a href="?controller=sanpham&action=CTSanPham&ma=<?php echo $item->MA;?>" class="tooltip-info" data-rel="tooltip" title="View">
                                                        <span class="blue">
                                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                        </span>
                                                    </a>
            <a href="?controller=sanpham&action=CapNhatSP&ma=<?php echo $item->MA;?>" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green">
                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                        </span>
                                                    </a>
            
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
           
            $.get('http://localhost:81/DoAnMVC/?controller=sanpham&action=DSSanPhamPhanTrang', {trang:_trang})
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