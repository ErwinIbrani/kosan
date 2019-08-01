<div class="small-box bg-green">
    <div class="inner">
        <p>Kamar Kosong</p>
        <?php
        foreach ($model as $value)
            echo '<h4>'.$value->jumlah_kamar.' '.$value->nama_kosan.'</h4>';
        ?>

    </div>
    <div class="icon">
        <i class="fa fa fa-star-half-empty"></i>
    </div>
</div>