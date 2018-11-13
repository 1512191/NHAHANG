
<div>
    <table class="table">
    <thead>
      <tr>
        <th>Mã</th>
        <th>Tên </th>
        <th>Mã nhóm </th>
        <th>Alias</th>
        <th>Từ khóa</th>
        <th>Mô tả tìm kiếm</th>
        <th>Ngày tạo</th>
        <th>Ngày cập nhật</th>
        <th>Hình chia sẻ</th>
        <th>Trạng thái</th>
        <th>Tác vụ</th>
        
      </tr>
    </thead>
    <tbody id="kq">
    <?php
        foreach ($dslsp as $item)
        {
            ?>
    
        <tr class="<?php echo doiMau($item->TRANGTHAI) ?>">
        <td><?php echo $item->MA;?></td>
        <td><?php echo $item->TEN;?></td>
        <td><?php echo $item->MANHOM;?></td>
        <td><?php echo $item->ALIAS;?></td>
        <td><?php echo $item->TUKHOA;?></td>
        <td><?php echo $item->MTTIMKIEM;?></td>
        <td><?php echo date('d-m-Y',strtotime($item->NGAYTAO));?></td>
        <td><?php echo date('d-m-Y', strtotime($item->NGAYCAPNHAT));?></td>
        <td><img src="<?php echo $item->HINH;?>" width="100px" height="100px"></td>
        <td><?php echo $item->TRANGTHAI;?></td>
        <td>
           
            
            <a href="?controller=nhomsanpham&action=CapNhatNSP&ma=<?php echo $item->MA;?>" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green">
                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                        </span>
                                                    </a>
            
            <a onclick="return confirm('Bạn chắc chắn với điều này')" href="?controller=nhomsanpham&action=XoaNSP&ma=<?php echo $item->MA;?>" class="tooltip-error" data-rel="tooltip" title="Delete">
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
    for($i = 1; $i<=$TongSoTrang; $i++)
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
      <a data-trang="<?php echo $TongSoTrang ?>" class="page-link" id="cuoi" aria-label="Next">
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
           
            $.get('http://localhost:81/DoAnMVC/?controller=nhomsanpham&action=DSNhomSPPhanTrang', {trang:_trang})
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