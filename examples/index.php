<?php

use ByTIC\Form\HtmlEditors\EditorsManager;

include '../vendor/autoload.php';

EditorsManager::setConfig(['form-html-editors' => require __DIR__ . '/../config/form-html-editors.php']);
?>
<!doctype html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<link rel="stylesheet" href="../dist/html-editors.css">

<body>
<section style="margin-top: 40px">
    <div class="container">
        <h2 class="title">DEMO</h2>
        <pre>
            // somefile
            require("lib.js")(params);
        </pre>
    </div>
</section>

<hr/>

<?php include('_default_editors.php'); ?>

<script type="text/javascript" src="../dist/html-editors.js" ></script>
<?php echo form_html_view_init(); ?>
</body>
</html>