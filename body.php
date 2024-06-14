<form action="post-act.php" method="post">
    <!-- Nama Pasien-->
    <label for="nama" class="small">Nama Pasien</label><br>
    <input type="text" id="nama" name="nama"/>
    <br><br/>
    <!-- Tanggal Lahir -->
    <label for="ttl" class="small"> Tanggal Lahir </label>
    <br></br>
    <input type="date" id="ttl" name="ttl"/>
    <br/><br/>
    <!-- Submit -->
    <button type="submit">Submit</button>
</form>
<div class="table-responsive">
    <table >
        <tr>
          <th style="width: 50px;">No</th>
          <th style="width: 300px;">Nama Pasien</th>
          <th style="width: 300px;">Tanggal Lahir</th>
        </tr>
        <?php
            include 'include/connection.php';
            include 'aes.php';

            $sql = 'SELECT * FROM pasien';
            $result = $db->query($sql);
            $i = 1;
            while ($row = $result->fetch_object()) {
                echo "<tr>
                        <td style='text-align:center;'>" . ($i++) . "</td>
                        <td class='text-center'>". decryptAES256($row->hasil_enkripsi, $key) ."</td>
                        <td class='text-center'>". decryptAES256($row->tgl_lahir, $key) ."</td>
                    </tr>\n";
            }
            $result->free();
        ?>
    </table>
    <a href="aes_new.php">Tes</a>
</div>