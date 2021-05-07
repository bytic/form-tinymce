<?php

$editors = form_html_editors();
?>
<?php
foreach ($editors as $editor) { ?>
    <div class="container">
        <h3 class="title">
            Form Editor <?php echo $editor->name; ?>
        </h3>
        <div class="row">
            <div class="col-4">
                <pre style="text-wrap: normal"><code><?php
                        echo htmlentities(
                            '<textarea class="form-control" data-editor-name="' . $editor->name . '" placeholder="Leave a comment here" ></textarea>'
                        );
                        ?></code></pre>
            </div>
            <div class="col-8">
                <textarea class="form-control" data-editor-name="<?php echo $editor->name; ?>"
                          placeholder="Leave a comment here"></textarea>
            </div>
        </div>
    </div>
    <?php
} ?>