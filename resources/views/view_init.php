<?php

$editors = isset($editors) ? $editors : [];
$editors = array_map(
    function ($editor) {
        return $editor->configuration();
    },
    $editors
);
?>
<script type="text/javascript">
    //<![CDATA[
    bytic_html_editors_config = {
        "editors": <?php echo json_encode($editors) ?>
    };
    //]]>
    document.addEventListener("DOMContentLoaded", function () {
        initHtmlEditors();
    })
</script>