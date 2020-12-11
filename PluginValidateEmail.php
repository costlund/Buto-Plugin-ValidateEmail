<?php
class PluginValidateEmail{
  private $i18n = null;
  function __construct() {
    wfPlugin::includeonce('i18n/translate_v1');
    $this->i18n = new PluginI18nTranslate_v1();
    $this->i18n->setPath('/plugin/validate/email/i18n');
  }
  public function validate_email($field, $form, $data = array()){
    $form = new PluginWfArray($form);
    if($form->get("items/$field/is_valid") && $form->get("items/$field/post_value")){
      if (!filter_var($form->get("items/$field/post_value"), FILTER_VALIDATE_EMAIL)) {
        $form->set("items/$field/is_valid", false);
        $form->set("items/$field/errors/", $this->i18n->translateFromTheme('?label is not an email!', array('?label' => $this->i18n->translateFromTheme($form->get("items/$field/label")))));
      }
    }
    return $form->get();
  }
}
