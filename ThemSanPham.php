<?php 
    include('includes/index.php');
    include('includes/header.php');
    include('includes/connect.php');
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>thêm</small>
                </h1>
            </div>
            <?php 
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $ten =$_POST['Ten'];   
                    $gia = $_POST['Gia'];
                    $hinhAnh = $_POST['HinhAnh'];
                    $nhaCungCap = $_POST['NhaCungCap'];
                    $nguoiBanHang = $_POST['NguoiBanHang'];
                    $danhMuc = $_POST['DanhMuc'];
                    // $sql_add = "INSERT dbo.SanPham( Ten , Gia ,HinhAnh ,id_NCC ,id_NBH ,id_DM) values ('{$ten}',$gia,'{$hinhAnh}',$nhaCungCap,$nguoiBanHang,$danhMuc)";
                    // $result_add = sqlsrv_query($conn,$sql_add);
                    $sql_add = "EXECUTE AddSanPham $gia,'{$ten}','{$hinhAnh}',$nhaCungCap,$nguoiBanHang,$danhMuc";
                    $result_add = sqlsrv_query($conn,$sql_add);
                    var_dump($result_add);
                }
            ?>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="ThemSanPham.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>    
                        <input class="form-control" name="Ten" placeholder="Nhập tên sản phẩm" />                   
                    </div>
                    <div class="form-group">
                        <label>Giá Sản Phẩm</label>    
                        <input class="form-control" name="Gia" placeholder="Nhập giá sản phẩm" />                   
                    </div>
                    <div class="form-group">
                        <label>Nhập hình ảnh(đường link)</label>    
                        <input class="form-control" name="HinhAnh" placeholder="Nhập hình ảnh sản phẩm" />                   
                    </div>
                     <div class="form-group">
                        <label>Nhà cung cấp</label>
                        <select class="form-control" id="NhaCungCap" name="NhaCungCap">
                        <?php 
                            $sql_NCC = "SELECT * FROM dbo.NhaCungCap";
                            $result_NCC = sqlsrv_query($conn,$sql_NCC);
                                           
                            while($rs = sqlsrv_fetch_array($result_NCC)){
                            ?>
                                
                                <option value=<?php echo($rs['ID']) ?>><?php echo($rs['CongTy']) ?></option>
                            <?php
                            }                           
                        ?>     
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Người bán hàng</label>
                    <select class="form-control" id="NguoiBanHang" name="NguoiBanHang">
                        <?php 
                            $sql_NBH = "SELECT * FROM dbo.NguoiBanHang";
                            $result_NBH = sqlsrv_query($conn,$sql_NBH); 
                                           
                            while($rs = sqlsrv_fetch_array($result_NBH)){
                            ?>
                                
                                <option value=<?php echo($rs['id']) ?>><?php echo($rs['id']) ?></option>
                            <?php
                            }                           
                        ?>     
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Danh mục</label>
                    <select class="form-control" id="DanhMuc" name="DanhMuc">
                        <?php 
                            $sql_DM = "SELECT * FROM dbo.DanhMucSanPham";
                            $result_DM = sqlsrv_query($conn,$sql_DM); 
                                           
                            while($rs = sqlsrv_fetch_array($result_DM)){
                            ?>
                                
                                <option value=<?php echo($rs['id']) ?>><?php echo($rs['Ten']) ?></option>
                            <?php
                            }                           
                        ?>     
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
 <?php 
    include('includes/footer.php');
 ?>