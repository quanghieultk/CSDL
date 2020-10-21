<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}      
                </div>
            @endif -->
            <!-- /.col-lg-12 -->
            <?php
            $sql = "SELECT * FROM dbo.SanPham";
            $exct = "EXECUTE AddSanPham 800000,N'Điện thoại Iphone 7 Plus','dsaf',2,8,8,4";
            $result = sqlsrv_query($conn,$sql);
            $rs_exct = sqlsrv_query($conn,$exct);
            
            ?>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Sản phẩm</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Danh mục</th>
                        <th>id_NCC</th>
                        <th>id_NBH</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php                  
                    while($r = sqlsrv_fetch_array($result)) {
                    ?>
                    <tr class="odd gradeX" align="center">  
                        <td><?php echo($r['id']) ?></td>
                        <td><?php echo($r['Ten']) ?></td>  
                        <td><?php echo($r['Gia']) ?></td>
                        <td><?php echo($r['HinhAnh']) ?></td>   
                        <td><?php
                        $id = $r['id_DM'];
                         $sql_danhmuc = "SELECT Ten FROM dbo.DanhMucSanPham where id = $id";
                         $rs_dm = sqlsrv_query($conn,$sql_danhmuc);
                         while($a = sqlsrv_fetch_array($rs_dm)){echo $a['Ten'];}
                         ?></td>
                        <td><?php echo($r['id_NCC']) ?></td>
                        <td><?php echo($r['id_NBH']) ?></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaitin/xoa/{{$lt->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaitin/sua/{{$lt->id}}">Edit</a></td>
                    </tr>   
                    
                    <?php } ?>    
                </tbody>
            </table>
           <?php  var_dump($rs_exct); ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
