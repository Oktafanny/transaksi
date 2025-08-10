<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Data Transaksi</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form <small>Tambah Data Transaksi</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo site_url('transaksi/save'); ?>">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align ">Nama Barang <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select required="required" class="select2_single form-control" name="id_barang" tabindex="-1">
                                        <option></option>
                                        <?php foreach ($barang as $valBarang) : ?>
                                            <option value="<?= $valBarang->id_barang; ?>">
                                                <?= $valBarang->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tanggal" type="date" id="first-name" required="required" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tipe_barang">Tipe Barang
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="tipe_barang" id="tipe_barang" class="form-control" required>
                                        <option value="">-- Pilih Tipe --</option>
                                        <option value="masuk">Transaksi Masuk</option>
                                        <option value="keluar">Transaksi Keluar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align ">User <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <!-- tampilkan nama user -->
                                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('name'); ?>" readonly>

                                    <!-- kirim id_user tersembunyi -->
                                    <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">
                                </div>
                            </div>

                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Lokasi Rak
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="lokasi_rak" type="text" id="first-name" required="required" class="form-control ">
                                </div>
                            </div> -->
                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Harga
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="harga" id="birthday" class="date-picker form-control"
                                        placeholder="dd-mm-yyyy" type="text" required="required" type="text"
                                        onfocus="this.type='date'" onmouseover="this.type='date'"
                                        onclick="this.type='date'" onblur="this.type='text'"
                                        onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function () {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div> -->
                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary"
                                            data-toggle-passive-class="btn-default">
                                            <input type="radio" name="jenis_kelamin" value="L" class="join-btn" required> &nbsp;
                                            Laki-laki
                                            &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary"
                                            data-toggle-passive-class="btn-default">
                                            <input type="radio" name="jenis_kelamin" value="P" class="join-btn" required>
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a class="btn btn-primary" href="<?php echo site_url('transaksi'); ?>">Cancel</a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>