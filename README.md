# Advanced Comments Widget Testing

This is small plugin for testing the Advanced Comments Widget.  It's meant as a brief overview, outlining ways to extend the widget.


## A Quick Overview

1. Add to the widget `$instance` via the `acw_instance_defaults` filter.
1. Add the field to the widget form via the `"acw_form_before_field_{$name}"` filter or the `"acw_form_after_field_{$name}"` filter.
1. Hook into the `Widget_ACW_Recent_Comments::update()` method to save the field value.
1. Hook into the `Widget_ACW_Recent_Comments::widget()` method to display the field value.

For a step-by-step walk-through visit: [Adding a Subtitle to the Advanced Comments Widget for WordPress ](http://darrinb.com/adding-subtitle-advanced-comments-widget/)

## Resources

* ACW plugin on the WordPress repository: https://wordpress.org/plugins/advanced-comments-widget/
* ACW plugin on GitHub: https://github.com/dboutote/advanced-comments-widget
* ACW plugin overview: http://darrinb.com/advanced-comments-widget/
* ACW Developer Docs: http://darrinb.com/advanced-comments-widget-developers-overview/
