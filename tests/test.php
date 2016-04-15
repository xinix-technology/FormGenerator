<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use FormGenerator\FormBuilder;

$var['formBuilder']['id']='formid123';
$var['formBuilder']['class']='formclass';
$var['formBuilder']['action']='test.php';
$var['formBuilder']['label']='formlabel';
$var['formBuilder']['format']='html';
$var['formBuilder']['attributes']['enctype'] = 'multipart/form-data';
$var['formBuilder']['form_wrapper']['type'] = '';
$var['formBuilder']['form_wrapper']['class'] = '';
$var['formBuilder']['form_wrapper']['id'] = '';
$var['formBuilder']['form_wrapper']['attributes'] = (object) array();

$var['default']['form_wrapper']['type'] = 'div';
$var['default']['form_wrapper']['class'] = 'wrapper';
$var['default']['label_wrapper']['type'] = 'span';
$var['default']['label_wrapper']['class'] = 'label-class';
$var['default']['label_wrapper']['id'] = 'id';
$var['default']['label_wrapper']['attributes'] = (object) array('attribLabel'=>'atribLabel','atrib2Label'=>'atrib2Label');
$var['default']['row_wrapper']['type'] = 'div';
$var['default']['row_wrapper']['class'] = 'row';
$var['default']['row_wrapper']['id'] = '';
$var['default']['row_wrapper']['attributes'] = (object) array('attribRow'=>'atribRow','atrib2Row'=>'atrib2Row');
$var['default']['content']['class'] = 'text side';

$var['formComponents'][0]['li_tag'][0]['type']='p';
$var['formComponents'][0]['li_tag'][0]['text']='Question Group';
$var['formComponents'][0]['li_tag'][0]['class']='';
$var['formComponents'][0]['li_tag'][0]['id']='';
$var['formComponents'][0]['li_tag'][0]['attributes']=(object)array();
$var['formComponents'][0]['li_tag'][1]['type']='span';
$var['formComponents'][0]['li_tag'][1]['text']='optional tag';
$var['formComponents'][0]['li_tag'][1]['class']='';
$var['formComponents'][0]['li_tag'][1]['id']='';
$var['formComponents'][0]['li_tag'][1]['attributes']=(object)array();

$var['formComponents'][0]['content'][0]['type']='text';
$var['formComponents'][0]['content'][0]['name']='text';
$var['formComponents'][0]['content'][0]['id']='id';
$var['formComponents'][0]['content'][0]['class']='text';
$var['formComponents'][0]['content'][0]['attributes']=(object)array();
$var['formComponents'][0]['content'][0]['value']='';
$var['formComponents'][0]['content'][0]['placeholder']='My Placeholder..';
$var['formComponents'][0]['content'][0]['label']='Input Text';
$var['formComponents'][0]['content'][0]['label_wrapper']['type'] = 'span';
$var['formComponents'][0]['content'][0]['label_wrapper']['class'] = 'label-class';
$var['formComponents'][0]['content'][0]['label_wrapper']['id'] = '';
$var['formComponents'][0]['content'][0]['label_wrapper']['attributes'] = (object) array('attribLabel'=>'atribLabelNew','atrib2Label'=>'atrib2LabelNew');
$var['formComponents'][0]['content'][0]['row_wrapper']['type'] = 'div';
$var['formComponents'][0]['content'][0]['row_wrapper']['class'] = 'row';
$var['formComponents'][0]['content'][0]['row_wrapper']['id'] = '';
$var['formComponents'][0]['content'][0]['row_wrapper']['attributes'] = (object) array('attribRow'=>'atribRowNew','atrib2Row'=>'atrib2RowNew');

$var['formComponents'][0]['content'][1]['type']='text';
$var['formComponents'][0]['content'][1]['name']='text2';
$var['formComponents'][0]['content'][1]['id']='text2';
$var['formComponents'][0]['content'][1]['class']='text';
$var['formComponents'][0]['content'][1]['attributes']=(object)array();
$var['formComponents'][0]['content'][1]['value']='';
$var['formComponents'][0]['content'][1]['placeholder']='My Placeholder..';
$var['formComponents'][0]['content'][1]['label']='Input Text 2';

$var['formComponents'][1]['content'][0]['type']='date';
$var['formComponents'][1]['content'][0]['name']='date';
$var['formComponents'][1]['content'][0]['id']='date';
$var['formComponents'][1]['content'][0]['class']='';
$var['formComponents'][1]['content'][0]['attributes']=(object)array();
$var['formComponents'][1]['content'][0]['label']='Input Date';

$var['formComponents'][2]['content'][0]['type']='select';
$var['formComponents'][2]['content'][0]['name']='select';
$var['formComponents'][2]['content'][0]['id']='';
$var['formComponents'][2]['content'][0]['class']='';
$var['formComponents'][2]['content'][0]['attributes']=(object)array();
$var['formComponents'][2]['content'][0]['label']='Select';
$var['formComponents'][2]['content'][0]['options'][0]['value']='0';
$var['formComponents'][2]['content'][0]['options'][0]['text']='Nol';
$var['formComponents'][2]['content'][0]['options'][1]['value']='1';
$var['formComponents'][2]['content'][0]['options'][1]['text']='Satu';
$var['formComponents'][2]['content'][0]['options'][1]['class']='Satu';
$var['formComponents'][2]['content'][0]['options'][1]['id']='Satu';
$var['formComponents'][2]['content'][0]['options'][1]['selected']=true;

$var['formComponents'][3]['content'][0]['type']='checkbox';
$var['formComponents'][3]['content'][0]['name']='checkbox';
$var['formComponents'][3]['content'][0]['id']='';
$var['formComponents'][3]['content'][0]['class']='';
$var['formComponents'][3]['content'][0]['attributes']=(object)array();
$var['formComponents'][3]['content'][0]['label']='Checkbox';
$var['formComponents'][3]['content'][0]['checkbox'][0]['value']='0';
$var['formComponents'][3]['content'][0]['checkbox'][0]['text']='Nol';
$var['formComponents'][3]['content'][0]['checkbox'][1]['value']='1';
$var['formComponents'][3]['content'][0]['checkbox'][1]['text']='Satu';
$var['formComponents'][3]['content'][0]['checkbox'][1]['checked']=true;

$var['formComponents'][4]['content'][0]['type']='radio';
$var['formComponents'][4]['content'][0]['name']='radio';
$var['formComponents'][4]['content'][0]['id']='';
$var['formComponents'][4]['content'][0]['class']='';
$var['formComponents'][4]['content'][0]['attributes']=(object)array();
$var['formComponents'][4]['content'][0]['label']='Radio';
$var['formComponents'][4]['content'][0]['radio'][0]['value']='0';
$var['formComponents'][4]['content'][0]['radio'][0]['text']='Nol';
$var['formComponents'][4]['content'][0]['radio'][1]['value']='1';
$var['formComponents'][4]['content'][0]['radio'][1]['text']='Satu';
$var['formComponents'][4]['content'][0]['radio'][1]['checked']=true;

$var['formComponents'][5]['content'][0]['type']='range';
$var['formComponents'][5]['content'][0]['name']='range';
$var['formComponents'][5]['content'][0]['id']='range';
$var['formComponents'][5]['content'][0]['class']='';
$var['formComponents'][5]['content'][0]['attributes']=(object)array('min'=>1,'max'=>100);
$var['formComponents'][5]['content'][0]['value']='20';
$var['formComponents'][5]['content'][0]['label']='Range';
$var['formComponents'][5]['content'][0]['label_wrapper']['type'] = 'span';
$var['formComponents'][5]['content'][0]['label_wrapper']['class'] = 'label-class';
$var['formComponents'][5]['content'][0]['label_wrapper']['id'] = '';
$var['formComponents'][5]['content'][0]['label_wrapper']['attributes'] = (object) array('attribLabel'=>'atribLabelNew','atrib2Label'=>'atrib2LabelNew');
$var['formComponents'][5]['content'][0]['row_wrapper']['type'] = 'div';
$var['formComponents'][5]['content'][0]['row_wrapper']['class'] = 'row';
$var['formComponents'][5]['content'][0]['row_wrapper']['id'] = '';
$var['formComponents'][5]['content'][0]['row_wrapper']['attributes'] = (object) array('attribRow'=>'atribRowNew','atrib2Row'=>'atrib2RowNew');

$var['formComponents'][6]['content'][0]['type']='textarea';
$var['formComponents'][6]['content'][0]['name']='textarea';
$var['formComponents'][6]['content'][0]['id']='textarea';
$var['formComponents'][6]['content'][0]['class']='text';
$var['formComponents'][6]['content'][0]['attributes']=(object)array();
$var['formComponents'][6]['content'][0]['value']='';
$var['formComponents'][6]['content'][0]['placeholder']='My Placeholder..';
$var['formComponents'][6]['content'][0]['label']='Text Area';

$var['formComponents'][7]['content'][0]['type']='button';
$var['formComponents'][7]['content'][0]['name']='button';
$var['formComponents'][7]['content'][0]['id']='button';
$var['formComponents'][7]['content'][0]['class']='button';
$var['formComponents'][7]['content'][0]['text']='Click Me..';
$var['formComponents'][7]['content'][0]['attributes']=(object)array();
$var['formComponents'][7]['content'][0]['label']='Button';

$var['formComponents'][8]['content'][0]['type']='submit';
$var['formComponents'][8]['content'][0]['name']='submit';
$var['formComponents'][8]['content'][0]['id']='submit';
$var['formComponents'][8]['content'][0]['class']='submit';
$var['formComponents'][8]['content'][0]['value']='Click Me..';
$var['formComponents'][8]['content'][0]['attributes']=(object)array();
$var['formComponents'][8]['content'][0]['label']='Submit';

$var = json_encode($var);

$formBuilder = new FormBuilder;
$result = $formBuilder->build($var);
echo($result);
