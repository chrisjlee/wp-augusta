<?php /**
 * Augusta Class Hooks
 * @author Chris J. Lee
 * @since 1.0.0
 * 
 * This will allow you to write and 
 * override any classes for each zone.
 * The class hooks acts as routers. They
 * provide the developer to write rules
 * for each context and have it product classes
 * 
 * Each hook has a setup hook.
 *  - hook_class -> hook_class_setup
 * Each setup hook contains the name of the zone
 * 
 * Implementing Child Hooks:
 * 
 * If you need to override any hook 
 * each function will look for a function with
 * the prefix of 'custom_' before the hook and the hook
 * will not be initiated.
 * 
 */

function augusta_content_default_setup() {
  get_template_part('../loop');
  return $output;
}
add_action ('augusta_content','augusta_content_default_setup');
