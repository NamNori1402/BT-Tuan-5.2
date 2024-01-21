<!doctype html>
<?php
    session_start();
    require_once('products.php');
?>

<html lang="en">
  <head>
    <title>Quan ly san pham</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="jumbotron">
        <h1 class="display-3">Quan ly san pham</h1>
        <hr class="my-2">
    </div>
  </head>
  <body>
      <div class="card-columns">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Thong tin san pham</h4>
                <form action="" method="post">
                    <div class="form-group">
                      <label for="txtMaSP">Ma san pham</label>
                      <input type="text" class="form-control" name="MaSP" id="txtMaSP" aria-describedby="helpId" placeholder="MaSP">
                    </div>
                    <div class="form-group">
                        <label for="txtTenSP">Ten san pham</label>
                        <input type="text" class="form-control" name="TenSP" id="txtTenSP" aria-describedby="helpId" placeholder="TenSP">
                    </div>
                    <div class="form-group">
                        <label for="txtGiaSP">Don vi tinh</label>
                        <input type="text" class="form-control" name="Gia" id="txtGiaSP" aria-describedby="helpId" placeholder="Gia SP">
                    </div>
                    <div class="form-group">
                        <label for="txtDVT">Gia</label>
                        <input type="text" class="form-control" name="DVT" id="txtDVT" aria-describedby="helpId" placeholder="DVT">
                    </div>
                    <div class="form-group">
                        <label for="txtNCC">Nha cung cap</label>
                        <input type="text" class="form-control" name="NCC" id="txtNCC" aria-describedby="helpId" placeholder="NCC">
                    </div>
                    <button type="submit" name="btnThem" value="btnThem" class="btn btn-primary btn-lg btn-block">Them</button>
                    <button type="submit" name="btnHienthi" value="btnHienthi" class="btn btn-primary btn-lg btn-block">Hien thi</button>
                    <button type="submit" name="btnUpdate" value="btnUpdate" class="btn btn-primary btn-lg btn-block">Update</button>
                </form>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Hien thi san pham</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>MaSP</th>
                            <th>TenSP</th>
                            <th>Gia</th>
                            <th>DVT</th>
                            <th>NCC</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(isset($_POST['btnHienthi'])) {
                          $result = hienThiSanPham();
                          if($result) {
                              while($row = $result->fetch_assoc()) {
                                  echo '<tr>';
                                  echo '<td>'.$row['id'].'</td>';
                                  echo '<td>'.$row['product_name'].'</td>';
                                  echo '<td>'.$row['price'].'</td>';
                                  echo '<td>'.$row['unit'].'</td>';
                                  echo '<td>'.$row['supplier'].'</td>';
                                  echo '</tr>';
                              }
                          } else {
                              echo "Error fetching products.";
                          }
                        }
                      ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <?php
        if(isset($_POST['btnThem'])) {
          $MaSP = isset($_POST['MaSP']) ? $_POST['MaSP'] : '';
          $TenSP = isset($_POST['TenSP']) ? $_POST['TenSP'] : '';
          $Gia = isset($_POST['Gia']) ? $_POST['Gia'] : '';
          $DVT = isset($_POST['DVT']) ? $_POST['DVT'] : '';
          $NCC = isset($_POST['NCC']) ? $_POST['NCC'] : '';

          // Check if the required keys are set before accessing them
          if(isset($MaSP, $TenSP, $Gia, $DVT, $NCC)) {
              $i = themSanPhamDB($MaSP, $TenSP, $Gia, $DVT, $NCC);

              if($i < 0) {
                  echo "Them that bai";
              } else {
                  echo "Them thanh cong";
              }
          } else {
              echo "Some form fields are not set.";
          }
        }
      ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
