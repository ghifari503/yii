<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $model = new \app\models\Widhymodel;
        $title = $model->title();
        $base_url = $model->base_url();
        Yii::$app->session->open();
        $sess_user = Yii::$app->session->get('user');
        $db = Yii::$app->db;
        $connection = $db->createCommand("SELECT * FROM obat")->query();
        if(empty($sess_user)){
          return $this->redirect('site/login');
        }
        ob_start();
        $header =  $this->renderFile('@app/views/site/page.php',['title' => $title,'base_url'=> $base_url,]);
        ?>
        <div class="container-fluid mt-5" style="padding-top: 30px;">
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="modal-title"></h4>
                        </div>
                        <div class="modal-body" id="modal-detail-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-lg-12">
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <b>Respon:</b> Berhasil<br>
    <b>Pesan:</b> Selamat Datang <?php echo$sess_user; ?>.</div>
                            </div>
                        </div><section class="mt-3">
                           <div class="card col-lg-12">
                               <div class="card-body">
                                   <h5 class="text-upercase"><i class="fa fa-home"></i> Wilayah</h5>
                                   <hr>
                                   <a href="javascript:;" onclick="modal_open('add', 'add');" class="btn btn-success" style="margin-bottom: 15px"><i class="fa fa-plus-square"></i> Tambah Data</a>
                                   <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                       <thead>
                                          <tr>
                                            <th>ID</th>
                                            <th>Wilayah</th>
                                            <th>Opsi</th>
                                           </tr>
                                        </thead>
                                          <tbody>
                                            <?php
                                               $query = $db->createCommand("SELECT * FROM wilayah ORDER BY id_wilayah DESC")->query();
                                               foreach ($query as $k) {
                                            ?>
                                              <tr>
                                                <td><?php echo$k['id_wilayah']; ?></td>
                                                <td><?php echo$k['kota']; ?></td>
                                                <td><a href="delete?id=<?php echo$k['id_wilayah']; ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>  <a href="javascript:;" onclick="modal_open('edit', 'edit?id=<?php echo$k['id_wilayah']; ?>');"><button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button></a> <a href="javascript:;" onclick="modal_open('detail', 'looks?id=<?php echo$k['id_wilayah']; ?>');"><button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button></a></td>
                                              </tr>
                                              <?php
                                                }
                                              ?>
                                            <!-- tambahkan data lainnya sesuai kebutuhan -->
                                        </tbody>
                                    </table>
                                </div>

                               </div>
                           </div>
                        </section>

                    </div>
        <?php
        $footer =  $this->renderFile('@app/views/site/footer.php',['title' => $title,'base_url'=> $base_url,]);
        echo$header;
        echo$footer;

    }



   public function actionTindakan()
    {
        $model = new \app\models\Widhymodel;
        $title = $model->title();
        $base_url = $model->base_url();
        Yii::$app->session->open();
        $sess_user = Yii::$app->session->get('user');
        $db = Yii::$app->db;
        $connection = $db->createCommand("SELECT * FROM obat")->query();
        if(empty($sess_user)){
          return $this->redirect('site/login');
        }
        ob_start();
        $header =  $this->renderFile('@app/views/site/page.php',['title' => $title,'base_url'=> $base_url,]);
        ?>
        <div class="container-fluid mt-5" style="padding-top: 30px;">
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="modal-title"></h4>
                        </div>
                        <div class="modal-body" id="modal-detail-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-lg-12">
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <b>Respon:</b> Berhasil<br>
    <b>Pesan:</b> Selamat Datang <?php echo$sess_user; ?>.</div>
                            </div>
                        </div><section class="mt-3">
                           <div class="card col-lg-12">
                               <div class="card-body">
                                   <h5 class="text-upercase"><i class="fa fa-edit"></i> Tindakan</h5>
                                   <hr>
                                   <a href="javascript:;" onclick="modal_open('add', 'addb');" class="btn btn-success" style="margin-bottom: 15px"><i class="fa fa-plus-square"></i> Tambah Data</a>
                                   <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                       <thead>
                                          <tr>
                                            <th>ID</th>
                                            <th>Tindakan</th>
                                            <th>Obat</th>
                                            <th>Pengguna</th>
                                            <th>Opsi</th>
                                           </tr>
                                        </thead>
                                          <tbody>
                                            <?php
                                               $query = $db->createCommand("SELECT * FROM tindakan ORDER BY id_tindakan DESC")->query();
                                               foreach ($query as $k) {
                                            ?>
                                              <tr>
                                                <td><?php echo$k['id_tindakan']; ?></td>
                                                <td><?php echo$k['nama_tindakan']; ?></td>
                                                <td><?php 
                                                   $data_obat = $k['id_obat'];
                                                   $queryobat = $db->createCommand("SELECT * FROM obat WHERE id_obat = '$data_obat'")->query();
                                                   foreach($queryobat as $key){
                                                      echo$key['nama_obat'];
                                                   }
                                                ?></td>
                                                <td><?php 
                                                   $data_pengguna = $k['id_pengguna'];
                                                   $querypengguna = $db->createCommand("SELECT * FROM pengguna WHERE id_pengguna = '$data_pengguna'")->query();
                                                   foreach($querypengguna as $key){
                                                      echo$key['nama_pengguna'];
                                                   }
                                                ?></td>

                                                <td><a href="deletez?id=<?php echo$k['id_pengguna']; ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a> <a href="javascript:;" onclick="modal_open('detail', 'looksz?id=<?php echo$k['id_pengguna']; ?>');"><button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button></a></td>
                                              </tr>
                                              <?php
                                                }
                                              ?>
                                            <!-- tambahkan data lainnya sesuai kebutuhan -->
                                        </tbody>
                                    </table>
                                </div>

                               </div>
                           </div>
                        </section>

                    </div>
        <?php
        $footer =  $this->renderFile('@app/views/site/footer.php',['title' => $title,'base_url'=> $base_url,]);
        echo$header;
        echo$footer;

    }




public function actionPembayaran()
    {
        $model = new \app\models\Widhymodel;
        $title = $model->title();
        $base_url = $model->base_url();
        Yii::$app->session->open();
        $sess_user = Yii::$app->session->get('user');
        $db = Yii::$app->db;
        $connection = $db->createCommand("SELECT * FROM obat")->query();
        if(empty($sess_user)){
          return $this->redirect('site/login');
        }
        ob_start();
        $header =  $this->renderFile('@app/views/site/page.php',['title' => $title,'base_url'=> $base_url,]);
        ?>
        <div class="container-fluid mt-5" style="padding-top: 30px;">
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="modal-title"></h4>
                        </div>
                        <div class="modal-body" id="modal-detail-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-lg-12">
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <b>Respon:</b> Berhasil<br>
    <b>Pesan:</b> Selamat Datang <?php echo$sess_user; ?>.</div>
                            </div>
                        </div><section class="mt-3">
                           <div class="card col-lg-12">
                               <div class="card-body">
                                   <h5 class="text-upercase"><i class="fa fa-credit-card"></i> Pembayaran</h5>
                                   <hr>
                                   <a href="javascript:;" onclick="modal_open('add', 'ad');" class="btn btn-success" style="margin-bottom: 15px"><i class="fa fa-plus-square"></i> Tambah Data</a>
                                   <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                       <thead>
                                          <tr>
                                            <th>ID</th>
                                            <th>Pengguna</th>
                                            <th>Nominal</th>
                                            <th>Opsi</th>
                                           </tr>
                                        </thead>
                                          <tbody>
                                            <?php
                                               $query = $db->createCommand("SELECT * FROM pembayaran ORDER BY id_pembayaran DESC")->query();
                                               foreach ($query as $k) {
                                            ?>
                                              <tr>
                                                <td><?php echo$k['id_pembayaran']; ?></td>
                                                <td><?php 
                                                   $data_pengguna = $k['id_pengguna'];
                                                   $querypengguna = $db->createCommand("SELECT * FROM pengguna WHERE id_pengguna = '$data_pengguna'")->query();
                                                   foreach($querypengguna as $key){
                                                      echo$key['nama_pengguna'];
                                                   }
                                                ?></td>
                                                <td><?php echo$k['jumlah']; ?></td>

                                                <td><a href="javascript:;" onclick="modal_open('detail', 'loo?id=<?php echo$k['id_pengguna']; ?>');"><button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button></a></td>
                                              </tr>
                                              <?php
                                                }
                                              ?>
                                            <!-- tambahkan data lainnya sesuai kebutuhan -->
                                        </tbody>
                                    </table>
                                </div>

                               </div>
                           </div>
                        </section>

                    </div>
        <?php
        $footer =  $this->renderFile('@app/views/site/footer.php',['title' => $title,'base_url'=> $base_url,]);
        echo$header;
        echo$footer;

    }






    public function actionPendaftaran()
    {
        $model = new \app\models\Widhymodel;
        $title = $model->title();
        $base_url = $model->base_url();
        Yii::$app->session->open();
        $sess_user = Yii::$app->session->get('user');
        $db = Yii::$app->db;
        $connection = $db->createCommand("SELECT * FROM obat")->query();
        if(empty($sess_user)){
          return $this->redirect('site/login');
        }
        ob_start();
        $header =  $this->renderFile('@app/views/site/page.php',['title' => $title,'base_url'=> $base_url,]);
        ?>
        <div class="container-fluid mt-5" style="padding-top: 30px;">
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="modal-title"></h4>
                        </div>
                        <div class="modal-body" id="modal-detail-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-lg-12">
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <b>Respon:</b> Berhasil<br>
    <b>Pesan:</b> Selamat Datang <?php echo$sess_user; ?>.</div>
                            </div>
                        </div><section class="mt-3">
                           <div class="card col-lg-12">
                               <div class="card-body">
                                   <h5 class="text-upercase"><i class="fa fa-home"></i> Pendaftaran</h5>
                                   <hr>
                                   <a href="javascript:;" onclick="modal_open('add', 'add_user');" class="btn btn-success" style="margin-bottom: 15px"><i class="fa fa-plus-square"></i> Tambah Data</a>
                                   <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                       <thead>
                                          <tr>
                                            <th>ID</th>
                                            <th>Pasien</th>
                                            <th>Opsi</th>
                                           </tr>
                                        </thead>
                                          <tbody>
                                            <?php
                                               $query = $db->createCommand("SELECT * FROM pengguna ORDER BY id_wilayah DESC")->query();
                                               foreach ($query as $k) {
                                            ?>
                                              <tr>
                                                <td><?php echo$k['id_pengguna']; ?></td>
                                                <td><?php echo$k['nama_pengguna']; ?></td>
                                                <td><a href="delete_user?id=<?php echo$k['id_pengguna']; ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>  <a href="javascript:;" onclick="modal_open('edit', 'edit_user?id=<?php echo$k['id_pengguna']; ?>');"><button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button></a> <a href="javascript:;" onclick="modal_open('detail', 'looks_user?id=<?php echo$k['id_pengguna']; ?>');"><button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button></a></td>
                                              </tr>
                                              <?php
                                                }
                                              ?>
                                            <!-- tambahkan data lainnya sesuai kebutuhan -->
                                        </tbody>
                                    </table>
                                </div>

                               </div>
                           </div>
                        </section>

                    </div>
        <?php
        $footer =  $this->renderFile('@app/views/site/footer.php',['title' => $title,'base_url'=> $base_url,]);
        echo$header;
        echo$footer;

    }




    public function actionLogin()
    {
        $model = new \app\models\Widhymodel;
        $title = $model->title();
        $base_url = $model->base_url();
        return $this->renderPartial('index',['title' => $title,'base_url'=> $base_url,]);
    


    } 
   
    
    public function actionAdd()
    {
        ?>
<form action="adds">
        <div class="form-group">
            <label>Kota</label>
            <input type="text" name="kota" placeholder="Kota" class="form-control">
        </div>
        <div class="mt-1">
           <p class="text-right">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
           </p>
        </div>
      </form>
        <?php

    }


   public function actionAddb()
    {
        ?>
<form action="addw">
<div class="form-group">
            <label>Tindakan</label>
            <select name="tindakan" class="form-control">
                <option value="0">Pilih</option>
                <?php
               $db = Yii::$app->db;
               $query_tindakan = $db->createCommand("SELECT * FROM tindakan ORDER BY id_tindakan DESC")->query();
               foreach($query_tindakan as $key){
                 echo '<option value="'.$key['id_tindakan'].'">'.$key['nama_tindakan'].'</option>';  
               }
            ?>
            </select>            
        </div>
        <div class="form-group">
            <label>Obat</label>
            <select name="obat" class="form-control">
                <option value="0">Pilih</option>
                <?php
               $db = Yii::$app->db;
               $query_obat = $db->createCommand("SELECT * FROM obat ORDER BY id_obat DESC")->query();
               foreach($query_obat as $key){
                 echo '<option value="'.$key['id_obat'].'">'.$key['nama_obat'].'</option>';  
               }
            ?>
            </select>            
        </div>
        <div class="form-group">
            <label>Pengguna</label>
            <select name="pengguna" class="form-control">
                <option value="0">Pilih</option>
                <?php
               $query_pengguna = $db->createCommand("SELECT * FROM pengguna ORDER BY id_pengguna DESC")->query();
               foreach($query_pengguna as $key){
                 echo '<option value="'.$key['id_pengguna'].'">'.$key['nama_pengguna'].'</option>';  
               }
            ?>
            </select>
        </div>
        <div class="mt-1">
           <p class="text-right">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
           </p>
        </div>
      </form>
        <?php

    }




     public function actionLooks()
    {
      
      $req = Yii::$app->request;
      $get_id = $req->get('id');
      ?>
      <div class="col-md-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-stripped" data-page-size="8" data-filter="#filter">
                                                <tbody><tr>
                                                    <td><b>ID</b></td>
                                                    <td><?php echo$get_id; ?></td>
                                                </tr><tr>
                                                </tr><tr>
                                                    <td><b>Wilayah</b></td>
                                                    <td><?php
                                                      $db = Yii::$app->db;
                                                      $query = $db->createCommand("SELECT * FROM wilayah where id_wilayah = '$get_id'")->query();
                                               foreach ($query as $ks) {
                                                  echo$ks['kota'];
                                               }
                                                    ?></td>
                                                </tr>
                                            </tbody></table>
                                        </div>
                                    </div>
                    </div>
                </div>
      <?php

    }  


 
 public function actionLoo()
    {
      
      $req = Yii::$app->request;
      $get_id = $req->get('id');
      ?>
      <div class="col-md-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-stripped" data-page-size="8" data-filter="#filter">
                                                <tbody><tr>
                                                    <td><b>ID</b></td>
                                                    <td><?php echo$get_id; ?></td>
                                                </tr><tr>
                                                </tr><tr>
                                                    <td><b>Wilayah</b></td>
                                                    <td><?php
                                                      $db = Yii::$app->db;
                                                      $query = $db->createCommand("SELECT * FROM pengguna where id_pengguna = '$get_id'")->query();
                                               foreach ($query as $ks) {
                                                  echo$ks['nama_pengguna'];
                                               }
                                                    ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nominal</b></td>
                                                    <td><?php
                                                      $db = Yii::$app->db;
                                                      $query = $db->createCommand("SELECT * FROM pembayaran where id_pengguna = '$get_id'")->query();
                                               foreach ($query as $ks) {
                                                  echo$ks['jumlah'];
                                               }
                                                    ?></td>
                                                </tr>
                                            </tbody></table>
                                        </div>
                                    </div>
                    </div>
                </div>
      <?php

    }




    public function actionLooksz()
    {
      
      $req = Yii::$app->request;
      $get_id = $req->get('id');
      ?>
      <div class="col-md-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-stripped" data-page-size="8" data-filter="#filter">
                                                <tbody><tr>
                                                    <td><b>ID</b></td>
                                                    <td><?php echo$get_id; ?></td>
                                                </tr>
                                                <tr>
                                                </tr>
                                                <?php
                                                   $db = Yii::$app->db;
                                                      $query = $db->createCommand("SELECT * FROM tindakan WHERE id_pengguna = '$get_id'")->query();
                                                   foreach ($query as $ks) {
                                                ?>
                                                <tr>
                                                    <td><b>Tindakan</b></td>
                                                    <td><?php
                                                      
                                                  echo$ks['nama_tindakan'];
                                               
                                                    ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Obat</b></td>
                                                    <td><?php
                                                    $bat = $ks['id_obat'];
                                               $queryobat = $db->createCommand("SELECT * FROM obat WHERE id_obat = '$bat'")->query();
                                                  foreach ($queryobat as $key) {
                                                      echo$key['nama_obat'];
                                                  }
                                                    ?></td>
                                                   </tr>
                                                    <td><b>Pengguna</b></td>
                                                    <td><?php
                                               $queryobat = $db->createCommand("SELECT * FROM pengguna WHERE id_pengguna = '$get_id'")->query();
                                                  foreach ($queryobat as $key) {
                                                      echo$key['nama_pengguna'];
                                                  }
                                                    ?></td>
                                                </tr>
                                                <?php
                                                   }
                                                ?>
                                            </tbody></table>
                                        </div>
                                    </div>
                    </div>
                </div>
      <?php

    }

     
     


    public function actionLogout()
    {
        Yii::$app->session->open();
        unset(Yii::$app->session['user']);
        return($this->redirect('login'));
    }


    public function actionLooks_user()
    {
      
      $req = Yii::$app->request;
      $get_id = $req->get('id');
      ?>
      <div class="col-md-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-stripped" data-page-size="8" data-filter="#filter">
                                                <tbody><tr>
                                                    <td><b>ID</b></td>
                                                    <td><?php echo$get_id; ?></td>
                                                </tr><tr>
                                                </tr><tr>
                                                    <td><b>Pasien</b></td>
                                                    <td><?php
                                                      $db = Yii::$app->db;
                                                      $query = $db->createCommand("SELECT * FROM pengguna where id_pengguna = '$get_id'")->query();
                                               foreach ($query as $ks) {
                                                  echo$ks['nama_pengguna'];
                                               }
                                                    ?></td>
                                                </tr>
                                            </tbody></table>
                                        </div>
                                    </div>
                    </div>
                </div>
      <?php

    }




    
    public function actionAdd_user()
    {
         $db = Yii::$app->db;

        ?>
<form action="addu">
        <div class="form-group">
            <label>Kota</label>
            <select class="form-control" name="kota">
                 <option value="0">Pilih</option>
                 <?php
                    $query_wilayah = $db->createCommand("SELECT * FROM wilayah ORDER BY id_wilayah DESC")->query();
                    foreach ($query_wilayah as $key) {
                      echo '<option value="'.$key['id_wilayah'].'">'.$key['kota'].'</option>';
                    }
                 ?>
            </select>
        </div>
        <div class="form-group">
            <label>Pasien</label>
            <input type="tetx" name="pasien" placeholder="Pasien" class="form-control">
        </div>
        <div class="mt-1">
           <p class="text-right">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
           </p>
        </div>
      </form>
        <?php

    }


    public function actionAd()
    {
         $db = Yii::$app->db;

        ?>
<form action="adu">
        <div class="form-group">
            <label>Pengguna</label>
            <select class="form-control" name="kota">
                 <option value="0">Pilih</option>
                 <?php
                    $query_wilayah = $db->createCommand("SELECT * FROM pengguna ORDER BY id_pengguna DESC")->query();
                    foreach ($query_wilayah as $key) {
                      echo '<option value="'.$key['id_pengguna'].'">'.$key['nama_pengguna'].'</option>';
                    }
                 ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Nominal</label>
            <input type="number" name="nominal" placeholder="Nominal" class="form-control">
        </div>
        <div class="mt-1">
           <p class="text-right">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
           </p>
        </div>
      </form>
        <?php

    }


    public function actionAdu()
{ 
     $req = Yii::$app->request;
        $kote = $req->get('kota');
        $nominal = $req->get('nominal');
        $db = Yii::$app->db;
        $query = $db->createCommand("INSERT INTO `pembayaran` (`id_pembayaran`,`id_pengguna`,`jumlah`) VALUES ('NULL','$kote','$nominal')")->query();
         return $this->redirect('pembayaran');
}





    public function actionDelete()
    {
        $req = Yii::$app->request;
        $get_id = $req->get('id');
        $db = Yii::$app->db;
        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();

// Lakukan operasi penghapusan data
Yii::$app->db->createCommand()->delete('wilayah', ['id_wilayah' => $get_id])->execute();
Yii::$app->db->createCommand()->delete('pengguna', ['id_wilayah' => $get_id])->execute();

// Nyalakan constraint foreign key kembali
Yii::$app->db->createCommand('SET foreign_key_checks = 1')->execute();

// Mengeksekusi perintah SQL
        return $this->redirect('index');

    }
 

 public function actionDeletez()
    {
        $req = Yii::$app->request;
        $get_id = $req->get('id');
        $db = Yii::$app->db;
        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();

// Lakukan operasi penghapusan data
Yii::$app->db->createCommand()->delete('tindakan', ['id_pengguna' => $get_id])->execute();

// Nyalakan constraint foreign key kembali
Yii::$app->db->createCommand('SET foreign_key_checks = 1')->execute();

// Mengeksekusi perintah SQL
        return $this->redirect('tindakan');

    }


 public function actionDels()
    {
        $req = Yii::$app->request;
        $get_id = $req->get('id');
        $db = Yii::$app->db;
        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();

// Lakukan operasi penghapusan data
Yii::$app->db->createCommand()->delete('pembayaran', ['id_pengguna' => $get_id])->execute();

// Nyalakan constraint foreign key kembali
Yii::$app->db->createCommand('SET foreign_key_checks = 1')->execute();

// Mengeksekusi perintah SQL
        return $this->redirect('pembayaran');

    }


     public function actionDelete_user()
    {
        $req = Yii::$app->request;
        $get_id = $req->get('id');
        $db = Yii::$app->db;
        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();

// Lakukan operasi penghapusan data
Yii::$app->db->createCommand()->delete('pengguna', ['id_pengguna' => $get_id])->execute();

// Nyalakan constraint foreign key kembali
Yii::$app->db->createCommand('SET foreign_key_checks = 1')->execute();

// Mengeksekusi perintah SQL
        return $this->redirect('pendaftaran');

    }




    public function actionEdit()
    {
        $req = Yii::$app->request;
        $get_id = $req->get('id'); 
      ?>
      <form action="posts">
        <div class="form-group">
          <label>ID WILAYAH</label>
          <input type="text" name="id" value="<?php echo$get_id?>" readonly="" class="form-control">
        </div>
        <div class="form-group">
            <label>Kota</label>
            <input type="text" name="kota" placeholder="Kota" class="form-control">
        </div>
        <div class="mt-1">
           <p class="text-right">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
           </p>
        </div>
      </form>
      <?php
    }



     public function actionEdit_user()
    {
        $req = Yii::$app->request;
        $get_id = $req->get('id'); 
      ?>
      <form action="editz">
        <div class="form-group">
          <label>ID PENGGUNA</label>
          <input type="text" name="id" value="<?php echo$get_id?>" readonly="" class="form-control">
        </div>
        <div class="form-group">
            <label>PASIEN</label>
            <input type="text" name="pasien" placeholder="Pasien" class="form-control">
        </div>
        <div class="mt-1">
           <p class="text-right">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
           </p>
        </div>
      </form>
      <?php
    }




    public function actionPosts()
    {
        $req = Yii::$app->request;
        $id_wilayah = $req->get('id');
        $kote = $req->get('kota');
        $db = Yii::$app->db;
        $query = $db->createCommand("UPDATE `wilayah` SET `id_wilayah` = '$id_wilayah', `kota` = '$kote' WHERE `wilayah`.`id_wilayah` = '$id_wilayah'")->query();
         return $this->redirect('index');

} 


public function actionEditz()
    {
        $req = Yii::$app->request;
        $id_wilayah = $req->get('id');
        $kote = $req->get('pasien');
        $db = Yii::$app->db;
        $query = $db->createCommand("UPDATE `pengguna` SET `id_pengguna` = '$id_wilayah', `nama_pengguna` = '$kote' WHERE `pengguna`.`id_pengguna` = '$id_wilayah'")->query();
         return $this->redirect('pendaftaran');

} 


public function actionAdds()
{ 
     $req = Yii::$app->request;
        $kote = $req->get('kota');
        $db = Yii::$app->db;
        $query = $db->createCommand("INSERT INTO `wilayah` (`id_wilayah`,`kota`) VALUES ('NULL','$kote')")->query();
         return $this->redirect('index');
}

public function actionAddw()
{ 
       $req = Yii::$app->request;
        $tindakan = $req->get('tindakan');
        $id_pengguna = $req->get('pengguna');
        $obat = $req->get('obat');
        $db = Yii::$app->db;
        $query = $db->createCommand("INSERT INTO `tindakan` (`id_tindakan`,`nama_tindakan`,`id_obat`,`id_pengguna`) VALUES ('NULL','$tindakan','$obat','$id_pengguna')")->query();
         return $this->redirect('tindakan');
}


public function actionAddu()
{ 
     $req = Yii::$app->request;
        $kote = $req->get('kota');
        $pasien = $req->get('pasien');
        $db = Yii::$app->db;
        $query = $db->createCommand("INSERT INTO `pengguna` (`id_pengguna`,`nama_pengguna`,`id_wilayah`) VALUES ('NULL','$pasien','$kote')")->query();
         return $this->redirect('pendaftaran');
}



public function actionIns()
{
$db = Yii::$app->db;
       $query = $db->createCommand("INSERT INTO `wilayah` (`id_wilayah`, `kota`) VALUES ('2', 'kota')")->query();
}
     public function actionWidhy()
    {
        $db = Yii::$app->db;
        Yii::$app->session->open();
        $tombol = Yii::$app->request->post('kirim');
        if(isset($tombol)){
           $post_username = Yii::$app->request->post('username');
           $post_password = Yii::$app->request->post('password');
           if(empty($post_username)){
             Yii::$app->session->set('alert','<div class="alert alert-danger">Respon : Gagal <br> Pesan : Username Tidak Boleh Di Kosongkan.</div>');
              return $this->redirect('site/login');
           } else if(empty($post_username)){
             Yii::$app->session->set('alert','<div class="alert alert-danger">Respon : Gagal <br> Pesan : Password Tidak Boleh Di Kosongkan.</div>');
              return $this->redirect('site/login');
           }

           $num_user = $db->createCommand("SELECT * FROM users WHERE username = '$post_username'")->queryScalar();
           if($num_user > 0){
             $query = $db->createCommand("SELECT * FROM users WHERE username = '$post_username'")->query();
             foreach ($query as $key) {
                 if(password_verify($post_password, $key['password'])){
                     Yii::$app->session->set('user',$post_username);
                     return $this->redirect('index');
                 }else{
                    Yii::$app->session->set('alert','<div class="alert alert-danger">Respon : Gagal <br> Pesan : Password Salah.</div>');
                     return $this->redirect('login');
                 }
             }
           }else{
             Yii::$app->session->set('alert','<div class="alert alert-danger">Respon : Gagak <br> Pesan : Username Atau Salah.</div>');
                     return $this->redirect('login');
           }
        }
    }

  public function actionAdmin()
    {
        $model = new \app\models\Widhymodel;
        $title = $model->title();
        $base_url = $model->base_url();
        Yii::$app->session->open();
        $sess_user = Yii::$app->session->get('user');
        $db = Yii::$app->db;
        $connection = $db->createCommand("SELECT * FROM obat")->query();
        if(empty($sess_user)){
          return $this->redirect('site/login');
        }
        ob_start();
        $header =  $this->renderFile('@app/views/site/page.php',['title' => $title,'base_url'=> $base_url,]);
        ?>
        <div class="container-fluid mt-5" style="padding-top: 30px;">
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="modal-title"></h4>
                        </div>
                        <div class="modal-body" id="modal-detail-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-lg-12">
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <b>Respon:</b> Berhasil<br>
    <b>Pesan:</b> Selamat Datang <?php echo$sess_user; ?>.</div>
                            </div>
                        </div><section class="mt-3">
                           <div class="card col-lg-12">
                               <div class="card-body">
                                   <h5 class="text-upercase"><i class="fa fa-user"></i> User</h5>
                                   <hr>
                                   <a href="javascript:;" onclick="modal_open('add', 'ads');" class="btn btn-success" style="margin-bottom: 15px"><i class="fa fa-plus-square"></i> Tambah Data</a>
                                   <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                       <thead>
                                          <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Opsi</th>
                                           </tr>
                                        </thead>
                                          <tbody>
                                            <?php
                                               $query = $db->createCommand("SELECT * FROM users ORDER BY id DESC")->query();
                                               foreach ($query as $k) {
                                            ?>
                                              <tr>
                                                <td><?php echo$k['id']; ?></td>
                                                <td><?php echo$k['username']; ?></td>
                                                <td><?php echo$k['level']; ?></td>
                                                <td><a href="delete_admin?id=<?php echo$k['id']; ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
                                              </tr>
                                              <?php
                                                }
                                              ?>
                                            <!-- tambahkan data lainnya sesuai kebutuhan -->
                                        </tbody>
                                    </table>
                                </div>

                               </div>
                           </div>
                        </section>

                    </div>
        <?php
        $footer =  $this->renderFile('@app/views/site/footer.php',['title' => $title,'base_url'=> $base_url,]);
        echo$header;
        echo$footer;

    }


  public function actionDelete_admin()
  {
    $req = Yii::$app->request;
    $get_id = $req->get('id');
    $db = Yii::$app->db;
    $q = $db->createCommand("DELETE FROM `users` WHERE id = '$get_id'");
    return $this->redirect('admin');
  }
  

  public function actionAds()
  {
    ?>
     <form action="adp">
       <div class="form-group">
         <input type="text" name="username" placeholder="Username" class="form-control">
       </div>
       <div class="form-group">
         <input type="password" name="password" placeholder="Password" class="form-control">
       </div>
       <div class="mt-1">
         <p class="text-right">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
         </p>
       </div>
     </form>
    <?php
  }
 
  public function actionAdp()
  {
    $req = Yii::$app->request;
    $db = Yii::$app->db;
    $get_username = $req->get('username');
    $get_password = $req->get('password');
    $password = password_hash($get_password, PASSWORD_DEFAULT);
    $ins = $db->createCommand("INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES ('NULL', '$get_username', '$password', 'user')")->query();
     return $this->redirect('admin');

  }

  public function actionTambah_obat()
    {
        $model = new \app\models\Widhymodel;
        $title = $model->title();
        $base_url = $model->base_url();
        Yii::$app->session->open();
        $sess_user = Yii::$app->session->get('user');
        $db = Yii::$app->db;
        $connection = $db->createCommand("SELECT * FROM obat")->query();
        if(empty($sess_user)){
          return $this->redirect('site/login');
        }
        ob_start();
        $header =  $this->renderFile('@app/views/site/page.php',['title' => $title,'base_url'=> $base_url,]);
        ?>
        <div class="container-fluid mt-5" style="padding-top: 30px;">
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="modal-title"></h4>
                        </div>
                        <div class="modal-body" id="modal-detail-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-lg-12">
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <b>Respon:</b> Berhasil<br>
    <b>Pesan:</b> Selamat Datang <?php echo$sess_user; ?>.</div>
                            </div>
                        </div><section class="mt-3">
                           <div class="card col-lg-12">
                               <div class="card-body">
                                   <h5 class="text-upercase"><i class="fa fa-plus"></i> Tambah Obat</h5>
                                   <hr>
                                   <a href="javascript:;" onclick="modal_open('add', 'tambah_data');" class="btn btn-success" style="margin-bottom: 15px"><i class="fa fa-plus-square"></i> Tambah Data</a>
                                   <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                       <thead>
                                          <tr>
                                            <th>ID</th>
                                            <th>Nama Obat</th>
                                            <th>Harga</th>
                                            <th>Opsi</th>
                                           </tr>
                                        </thead>
                                          <tbody>
                                            <?php
                                               $query = $db->createCommand("SELECT * FROM obat ORDER BY id_obat DESC")->query();
                                               foreach ($query as $k) {
                                            ?>
                                              <tr>
                                                <td><?php echo$k['id_obat']; ?></td>
                                                <td><?php echo$k['nama_obat']; ?></td>
                                                <td><?php echo number_format($k['harga'],0,',','.'); ?></td>
                                                <td><a href="delete_obat?id=<?php echo$k['id_pengguna']; ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a> </td>
                                              </tr>
                                              <?php
                                                }
                                              ?>
                                            <!-- tambahkan data lainnya sesuai kebutuhan -->
                                        </tbody>
                                    </table>
                                </div>

                               </div>
                           </div>
                        </section>

                    </div>
        <?php
        $footer =  $this->renderFile('@app/views/site/footer.php',['title' => $title,'base_url'=> $base_url,]);
        echo$header;
        echo$footer;

    }
  
   
    public function actionGrafik()
    {
        $model = new \app\models\Widhymodel;
        $title = $model->title();
        $base_url = $model->base_url();
        Yii::$app->session->open();
        $sess_user = Yii::$app->session->get('user');
        $db = Yii::$app->db;
        $connection = $db->createCommand("SELECT * FROM obat")->query();
        if(empty($sess_user)){
          return $this->redirect('site/login');
        }
        ob_start();
        $header =  $this->renderFile('@app/views/site/page.php',['title' => $title,'base_url'=> $base_url,]);
        ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <div class="container-fluid mt-5" style="padding-top: 30px;">
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="modal-title"></h4>
                        </div>
                        <div class="modal-body" id="modal-detail-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-lg-12">
<div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <b>Respon:</b> Berhasil<br>
    <b>Pesan:</b> Selamat Datang <?php echo$sess_user; ?>.</div>
                            </div>
                        </div><section class="mt-3">
                           <div class="card col-lg-12">
                               <div class="card-body">
                                   <h5 class="text-upercase"><i class="fa fa-user"></i> Grafik</h5>
                                   <hr>
                                   <canvas id="myChart"></canvas>

                                            <!-- tambahkan data lainnya sesuai kebutuhan -->
                                        </tbody>
                                    </table>
                                </div>

                               </div>
                           </div>
                        </section>

                    </div>

                    <script type="text/javascript">


var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["User", "Obat"],
        datasets: [{
          label: 'Grafik',
          data: [<?php echo $db->createCommand("SELECT * FROM pengguna")->query()->count(); ?>, <?php echo $db->createCommand("SELECT * FROM obat")->query()->count(); ?>],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
</script>
        <?php
        $footer =  $this->renderFile('@app/views/site/footer.php',['title' => $title,'base_url'=> $base_url,]);
        echo$header;
        echo$footer;

    }


   public function actionTambah_data(){
      ?>
      <form action="data_obat" method="GET">
         <div class="form-group">
           <label>Nama Obat</label>
           <input type="text" name="nama_obat" class="form-control" placeholder="Nama Obat">
         </div>
         <div class="form-group">
           <label>Harga</label>
           <input type="number" name="harga" class="form-control" placeholder="Harga">
         </div>
         <p class="text-right">
            <button type="submit" name="kirim" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
         </p>
      </form>
      <?php
   }
 

  public function actionData_obat()
{
    $req = Yii::$app->request;
    $db = Yii::$app->db;
    if (empty($req->get('nama_obat'))) {
        return $this->redirect('tambah_obat');
    } else if (empty($req->get('harga'))) {
        return $this->redirect('tambah_obat');
    } else {
        $nama_obat = $req->get('nama_obat');
        $harga = $req->get('harga');
        $id_pengguna = Yii::$app->user->id;
        $db->createCommand("INSERT INTO `obat` (`id_obat`, `id_pengguna`, `nama_obat`, `harga`) VALUES ('NULL', '1', '$nama_obat', '$harga')")
            ->bindParam(':id_pengguna', $id_pengguna)
            ->bindParam(':nama_obat', $nama_obat)
            ->bindParam(':harga', $harga)
            ->execute();
        return $this->redirect('tambah_obat');
    }
}


   public function actionDelete_obat(){
     $db = Yii::$app->db;
     $req = Yii::$app->request;
     Yii::$app->db->createCommand()->delete('obat', ['id_obat' => $req->get('id')])->execute();
     return $this->redirect('tambah_obat');
   }
    
}


