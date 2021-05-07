function initHtmlEditors(options) {
    if (typeof options == 'undefined') options = bytic_html_editors_config;

    console.log(options);

    Object.entries(options.editors).forEach(entry => {
        const [name, config] = entry;

        switch(config.framework) {
            case 'TinyMCE':
                initHtmlEditorTinyMCE(name, config.config);
                break;
        }
    });
}

window.initHtmlEditors = initHtmlEditors;
