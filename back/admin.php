<fieldset class="cent" style="width: 90%;">
<legend>帳號管理</legend>    
<form action="./edit_user.php" method="post">
        <table>
            <tr>
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>

                <?php
                $rows = $User->all();
                foreach ($rows as $row) {
                    if ($row['acc'] != 'admin') {
                ?>
            </tr>
            <td><?= $row['acc']; ?></td>
            <td><?= $row['pw']; ?></td>
            <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
            <tr>
        <?php
                    }
                }
        ?>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <button type="submit">確定刪除</button>
        <button type="rest">清空選取</button>
    </form>
    
    <h2>新增會員</h2>
    <span style="color:red;">*請設定您要註冊的帳號及密碼（最長12個字元）</span>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱（忘記密碼時使用）</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="註冊" onclick="reg()">
                <input type="reset" value="清除">
            </td>
            <td></td>
        </tr>
    </table>

    <script>
        function reg() {
            let user = {
                acc: $("#acc").val(),
                pw: $("#pw").val(),
                pw2: $("#pw2").val(),
                email: $("#email").val(),
            }
            console.log(user)
            if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '') {

                if (user.pw == user.pw2) {
                    $.post("./api/chk_acc.php", {
                        acc: user.acc
                    }, (res) => {
                        // parseInt() 轉為數字型態的整數
                        console.log(res);
                        if (parseInt(res) == 1) {
                            alert("帳號重複")
                        } else {
                            // user是為了程式易於閱讀，等同於{acc: $("#acc").val(),pw: $("#pw").val(),pw2: $("#pw2").val(),email: $("#email").val(),}
                            // 所以當資料到./api/reg.php時，是$_POST[acc].....
                            $.post('./api/reg.php', user, (res) => {
                                location.reload;

                            })
                        }
                    })
                } else {
                    alert("密碼不重複，請重新設定")
                }
            } else {
                alert("不可空白")
            }
        }
    </script>
</fieldset>