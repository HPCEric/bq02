<form action="">
    <table class="ct" style="width:90%">
        <tr>
            <td width="5%">編號</td>
            <td width="50%">標題</td>
            <td width="10%">顯示</td>
            <td width="10%">刪除</td>
        </tr>

        <?php
        $all = $News->math('count', '*', ['sh' => 1]);
        $div = 3;
        $pages = ceil($all / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], "limit $start,$div");


        foreach ($rows as $row) {
            $checked=($row['sh']==1)?'checked':'';
        ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['title']; ?></td>
                <td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?=$checked;?>></td> 
                <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
            </tr>

        <?php
        }
        ?>

    </table>
    <div class="ct">
    <?php
    if (($now - 1) > 0) {
        $prev = $now - 1;
        echo "<a href='?do=news&p=$prev'> < </a>";
    }

    for ($i = 1; $i <= $pages; $i++) {
        $fz = ($i == $now) ? '20px' : '16px';
        echo "<a href='?do=news&p=$i'' style='font-size:$fz'>$i</a>";
    }


    if (($now + 1) <= $pages) {
        $next = $now + 1;
        echo "<a href='?do=news&p=$next'> > </a>";
    }
    ?>
    <br>
    <input type="submit" value="確定修改">
</div>
</form>