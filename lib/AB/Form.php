<?php

namespace ABC;

class Form
{
	public function setForm($params = null){
        if(!empty($params)){
            echo '<form method="post">';
		$form = '';
            foreach($params as $fields) {
                foreach ($fields as $field => $values) {
                    $form .= $this->$field($values)."\n";
                }
            }
		echo $form;
            echo '</form>';
        }
        return false;
    }

    public function setSelect($params = null){
        $select = '<div class="form-group">';
        $select .= empty($params['label']) ? null : '<label>'.$params['label'].'</label>';
        $select .= '<select class="';
        $select .= !isset($params['class']) ? 'form-control form-control-lg"' : $params['class'].'"';
        $select .= !isset($params['id']) ? null : ' id="'.$params['id'].'"';
        $select .= ' name="'.$params['name'].'">'."\n";
        $select .= '<option value="0">';
        $select .= !isset($params['first_option']) ? 'Please select one' : $params['first_option'];
        $select .= '</option>';
        if($params['options']){
            foreach($params['options'] as $item){
                $select .= $this->setOption((int)$item['id'], $item['name'], $params['selected'])."\n";
            }
        }
        $select .= '</select></div>';
        return $select;
    }

    public function setOption($value = null, $name = null, $selected = null){
        $option = '<option value="'.$value.'"';
        $option .= $value == $selected ? ' selected' : null;
        $option .= '>'.$name.'</option>';
        return $option;
    }

    public function setInput($params){
        $input = '<div class="form-group">';
        $input .= empty($params['label']) ? null : '<label>'.$params['label'].'</label>';
        if(!empty($params['input-group-prepend'])){
            $input .= '<div class="input-group input-group-lg"><div class="input-group-prepend">';
            $input .= '<span class="input-group-text">';
            $input .= $params['input-group-prepend'].'</span></div>';
        }
        $input .= '<input';
        $input .= !empty($params['id']) ? ' id="'.$params['id'].'"' : null;
        $input .= empty($params['type']) ? null : ' type="'.$params['type'].'"';
        $input .= empty($params['step']) ? null : ' step="'.$params['step'].'"';
        $input .= !$params['autocomplete'] ? null : ' autocomplete="off"';
        $input .= ' class=" ';
        $input .= !isset($params['class']) ? 'form-control form-control-lg' : $params['class'];
        $input .= '" name="'.$params['name'].'"';
        $input .= !empty($params['placeholder']) ? ' placeholder="'.$params['placeholder'].'"' : null;
        $input .= !empty($params['value']) ? ' value="'.$params['value'].'"' : null;
        $input .= $params['multiple'] ? ' multiple' : null;
        $input .= $params['required'] ? ' required' : null;
        $input .= $params['input-group-prepend'] ? '></div>' : '>';
        $input .= $params['validate'] ? $params['validate'] : null;
        $input .= '</div>';
        return $input;
    }

    public function setDateInput($params = null){
        $input = '<div class="form-group">';
        $input .= empty($params['label']) ? null : '<label>'.$params['label'].'</label>';
        $input .= '<div class="input-group input-group-lg';
        $input .= empty($params['add_class']) ? '">' : ' '.$params['add_class'].'">';
        $input .= '<div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>';
        $input .= '<input class="form-control input-lg" id="'.$params['id'].'" type="text" name="'.$params['name'].'"';
        $input .= !empty($params['value']) ? ' value="'.$params['value'].'"' : null;
        $input .= !empty($params['placeholder']) ? ' placeholder="'.$params['placeholder'].'"' : null;
        $input .= '></div></div>';
        $input .= '<script>$("#'.$params['id'].'").datepicker({';
        $input .= empty($params['format']) ? 'format: "dd/M/yyyy",' : 'format: "'.$params['format'].'",';
        $input .= ' autoclose: true';
        $input .= !empty($params['end_date']) ? ', endDate: "'.$params['end_date'].'"' : null;
        $input .= !empty($params['start_date']) ? ', startDate: "'.$params['start_date'].'"' : null;
        $input .= '});</script>';
        return $input;
    }

    public function setTextArea($params = null){
        $text = '<div class="form-group">';
        $text .= empty($params['label']) ? null : '<label>'.$params['label'].'</label>';
        $text .= '<textarea';
        $text .= empty($params['rows']) ? null : ' rows="'.$params['rows'].'"';
        $text .= ' class="';
        $text .= !isset($params['class']) ? 'form-control' : $params['class'];
        $text .= '" name="'.$params['name'].'"';
        $text .= !empty($params['id']) ? ' id="'.$params['id'].'"' : null;
        $text .= !empty($params['placeholder']) ? ' placeholder="'.$params['placeholder'].'"' : null;
        $text .= '>'.$params['value'].'</textarea>';
        $text .= '</div>';
        $text .= $params['no_ckeditor'] ? null : '<script>CKEDITOR.replace("'.$params['id'].'");</script>';
        return $text;
    }

    public function setCheckBoxes($params = null){
        $name = $params['name'];
        foreach($params['params'] as $checks){
            $checkbox = '<div>';
            $checkbox .= '<label>';
            $checkbox .= '<input type="checkbox"';
            $checkbox .= !empty($name) ? ' name="'.$name.'"' : null;
            $checkbox .= !empty($checks['id']) ? ' value="'.$checks['id'].'"' : null;
            $checkbox .= '> '.$checks['name'].'</label>';
            $checkbox .= '</div>';
            return $checkbox;
        }
    }

    public function setCheckBox($params = null){
        $checkbox = '<div>';
        $checkbox .= '<label>';
        $checkbox .= '<input type="checkbox"';
        $checkbox .= !empty($params['name']) ? ' name="'.$params['name'].'"' : null;
        $checkbox .= !empty($params['value']) ? ' value="'.$params['value'].'"' : null;
        $checkbox .= !empty($params['checked']) ? ' checked' : null;
        $checkbox .= '> '.$params['label'].'</label>';
        $checkbox .= '</div>';
        return $checkbox;
    }

    public function setSubmit($params = null){
        $submit = '<div class="form-group form-group-lg">';
        $submit .= '<input type="submit"';
        $submit .= !empty($params['name']) ? ' name = "'.$params["name"].'"' : ' name="submit"';
        $submit .= !empty($params['class']) ? ' class="'.$params['class'].'"' : ' class="form-control btn btn-primary btn-lg"';
        $submit .= !empty($params['value']) ? ' value="'.$params['value'].'"' : ' value="Save"';
        $submit .= '>';
        $submit .= '</div>';
        return $submit;
    }

    public function setButton($params = null){
        $button = !$params['no_div'] ? '<div class="form-group form-group-lg">' : null;
        $button .= '<button';
        $button .= !empty($params['id']) ? ' id="'.$params['id'].'"' : null;
        $button .= !empty($params['type']) ? ' type="'.$params['type'].'"' : null;
        $button .= !empty($params['name']) ? ' name = "'.$params["name"].'"' : ' name="submit"';
        $button .= !empty($params['class']) ? ' class="'.$params['class'].'"' : ' class="form-control btn btn-primary btn-lg"';
        $button .= !empty($params['name']) ? ' name="'.$params['name'].'"' : null;
        $button .= '>';
        $button .= !empty($params['value']) ? $params['value'] : 'Ok';
        $button .= '</button>';
        $button .= !$params['no_div'] ? '</div>' : null;
        return $button;
    }
}
