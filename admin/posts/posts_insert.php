<?php

use Aclass\DB;
use Aclass\Post;
use Aclass\Categories;

require '../Aconfig.php';

$db = new DB();
$post_obj = new Post($db->conn);

if(count($_POST) && isset($_POST['title']) && !empty($_POST['category_id']) && isset($_POST['short_description'])  && isset($_POST['description']) ) {
    $posts = $post_obj->storePost($_POST['title'], $_POST['short_description'], $_POST['description'], $_POST['category_id']);
}

$categories_obj = new Categories($db->conn);
$categories = $categories_obj->all();

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>پنل مدیریت | شروع سریع</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="../dist/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet" href="../dist/css/custom-style.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php
require_once '../layouts/nav.php';
require_once '../layouts/right_aside.php';
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">اضافه کردن پست جدید</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">صفحه سریع</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
    <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">مثال ساده</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="">

                <div class="card-body">

                    <div class="form-group">
                        <label>دسته بندی را انتخاب کنید</label>
                        <select name="category_id" class="form-control">
                            <option value="">انتخاب کنید</option>
                            <?php
                            while ($category = $categories->fetch()) {
                            ?>
                            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>

                            <?php
                            }

                            ?>
                        </select>
                    </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">عنوان پست</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="عنوان پست را وارد کنید">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">توضیحات کوتاه</label>
                    <input type="text" name="short_description" class="form-control" id="exampleInputPassword1" placeholder="توضیحات کوتاه را وارد کنید">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">توضیحات </label>
                    <textarea name="description" class="form-control" id="exampleInputPassword1" placeholder="توضیحات را وارد کنید"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
       
          <!--/.col (right) -->
        </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
require_once '../layouts/footer.php';
?>


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
