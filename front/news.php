<fieldset>
    <legend>目前位置 : 首頁 > 最新文章區</legend>

    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="30%">內容</td>
        </tr>
        <?php
        $all=$News->math('count',"*",['sh'=>1]);
        
        $rows = $News->all();
        foreach ($rows as $row) {
        ?>
            <tr>
                <td ><?=$row['title'];?></td>
                <td ><?=mb_substr($row['text'],0,20);?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</fieldset>