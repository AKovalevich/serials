<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
</head>
<body>
<div class="main-container">

    <form name="f1" method="post" action="enter_data.php">
        <input name="link" type="hidden" value="index.php" />
        ФИО: <br />
        <input name="fio" type="text" size="25" maxlength="30" value="" /> <br />
        <?php print $vars['questions']; ?>

        <br/><br/>
            <pre class="reset">
                <strong>Ответ:</strong>
            </pre>

           <pre class="reset">
             ⎛<input name="task_1_a[0][0]" type="text" size="1" maxlength="2" value="">,<input name="task_1_a[1][0]" type="text" size="1" maxlength="2" value="">,<input name="task_1_a[2][0]" type="text" size="1" maxlength="2" value="">⎞
         1.  ⎝<input name="task_1_a[0][1]" type="text" size="1" maxlength="2" value="">,<input name="task_1_a[1][1]" type="text" size="1" maxlength="2" value="">,<input name="task_1_a[2][1]" type="text" size="1" maxlength="2" value="">⎠,

            </pre>
        <br/>
            <pre class="reset">

         2. Вычислите определитель <input name="task_2_a[0][0]" type="text" size="1" maxlength="2" value="">

            </pre>
        <br/>
            <pre class="reset">
                                                      ⎛<input name="task_3_a[0][0]" type="text" size="1" maxlength="2" value="">,<input name="task_3_a[1][0]" type="text" size="1" maxlength="2" value="">,<input name="task_3_a[2][0]" type="text" size="1" maxlength="2" value="">⎞
         1. Найдите матрицу, обратную. к данной:  A = ⎜<input name="task_3_a[0][1]" type="text" size="1" maxlength="2" value="">,<input name="task_3_a[1][1]" type="text" size="1" maxlength="2" value="">,<input name="task_3_a[2][1]" type="text" size="1" maxlength="2" value="">⎟.
                                                      ⎝<input name="task_3_a[0][2]" type="text" size="1" maxlength="2" value="">,<input name="task_3_a[1][2]" type="text" size="1" maxlength="2" value="">,<input name="task_3_a[2][2]" type="text" size="1" maxlength="2" value="">⎠
            </pre>












        <input type="submit" name="enter" value="Ответить" />
    </form>


</div>
</body>
</html>
