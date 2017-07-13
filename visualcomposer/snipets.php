//when visual not let you edit your page then replace this function to existing one

html2element: function(html) {
        var $template, attributes = {},
            template = html;
        $template = $(template(this.model.toJSON()).trim()), _.each($template.get(0).attributes, function(attr) {
            attributes[attr.name] = attr.value
        }), this.$el.attr(attributes).html($template.html()), this.setContent(), this.renderContent()
    },
