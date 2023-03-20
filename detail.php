<?php

    include "helper/koneksi.php";

    if($_POST['idx']) {

        $id = $_POST['idx'];      

        //$koneksi = mysqli_query("SELECT * FROM kategori WHERE id_kategori = $id");
        $q = mysqli_query($koneksi, "SELECT * FROM template WHERE id_template = $id");

        while ($result = mysqli_fetch_assoc($q)){

        ?>

        <form action="edit.php" method="post">

            <input type="hidden" name="idtemplate" value="<?php echo $result['id_template']; ?>">

            <div class="form-group">

                <label>Nama Template</label>

                <input type="text" class="form-control" name="namatemplate" value="<?php echo $result['nama_template']; ?>">
                <br>
                <label>Nama Template</label>
                
                <textarea name="isitemplate" required="" class="form-control" spellcheck="false" style="margin-top: 0px; margin-bottom: 0px; height: 136px;"><?php echo htmlspecialchars($result['isi_template']) ?></textarea>

            </div>


              <button class="btn btn-primary" type="submit">Update</button>

        </form>     

        <?php } }

?>