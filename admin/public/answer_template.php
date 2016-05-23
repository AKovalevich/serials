<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
</head>
<body>
<div class="main-container">

<?php print $vars['questions']; ?>

<pre class="reset">
             ⎛<?php print $vars['task_1_a'][0][0]; ?>,<?php print $vars['task_1_a'][1][0]; ?>,<?php print $vars['task_1_a'][2][0]; ?>⎞
         1.  ⎝<?php print $vars['task_1_a'][0][1]; ?>,<?php print $vars['task_1_a'][1][1]; ?>,<?php print $vars['task_1_a'][2][1]; ?>⎠,

            </pre>
<br/>
<pre class="reset">

         2. <?php print $vars['task_2_a'][0][0]; ?>

            </pre>
<br/>
<pre class="reset">
             ⎛<?php print $vars['task_3_a'][0][0];?>,<?php print $vars['task_3_a'][1][0];?>,<?php print $vars['task_3_a'][2][0];?>⎞
         1.  ⎜<?php print $vars['task_3_a'][0][1];?>,<?php print $vars['task_3_a'][1][1];?>,<?php print $vars['task_3_a'][2][1];?>⎟.
             ⎝<?php print $vars['task_3_a'][0][2];?>,<?php print $vars['task_3_a'][1][2];?>,<?php print $vars['task_3_a'][2][2];?>⎠
            </pre>

<hr />
</div>
</body>
</html>