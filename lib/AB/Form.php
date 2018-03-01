<?php

namespace ABC;

class Form
{
	public function setForm($params = null){
        if(!empty($params)){
            echo '<form>';
            foreach($params as $fields) {
                foreach ($fields as $field => $values) {
                    $this->$field($values);
                }
            }
            echo '</form>';
        }
        return false;
    }

    public function setSelect($params = null){
        $select = '<div class="form-group">';
        $select .= empty($params['label']) ? null : '<label>'.$params['label'].'</label>';
        $select .= '<select class="';
        $select .= !isset($params['class']) ? 'form-control input-lg' : $params['class'];
        $select .= '" name="'.$params['name'].'">'."\n";
        if(!empty($params['options'])){
            foreach($params['options'] as $item){
                $select .= $this->setOption((int)$item['id'], $params['option_selected'], $item['name'])."\n";
            }
        }
        $select .= '</select></div>';
        echo $select."\n";
    }

    public function setOption($value = null, $id = null, $name = null){
        $option = '<option value="'.$value.'"';
        $option .= $value == $id ? ' selected' : null;
        $option .= '>'.$name.'</option>';
        return $option;
    }

    public function setInput($params){
        $input = '<div class="form-group">';
        $input .= empty($params['label']) ? null : '<label>'.$params['label'].'</label>';
        $input .= $params['input-group'] ?
            '<div class="input-group"><span class="input-group-addon"><i class="'.$params['input-group'].'"></i></span>' :
            null;
        $input .= '<input';
        $input .= empty($params['type']) ? null : ' type="'.$params['type'].'"';
        $input .= empty($params['step']) ? null : ' step="'.$params['step'].'"';
        $input .= ' class="';
        $input .= !isset($params['class']) ? 'form-control input-lg' : $params['class'];
        $input .= '" name="'.$params['name'].'"';
        $input .= !empty($params['placeholder']) ? ' placeholder="'.$params['placeholder'].'"' : null;
        $input .= !empty($params['value']) ? ' value="'.$params['value'].'"' : null;
        $input .= $params['multiple'] ? ' multiple' : null;
        $input .= $params['required'] ? ' required' : null;
        $input .= $params['input-group'] ? '></div>' : '>';
        $input .= '</div>';
        echo $input."\n";
    }

    public function setTextArea($params = null){
        $text = '<div class="form-group">';
        $text .= empty($params['label']) ? null : '<label>'.$params['label'].'</label>';
        $text .= '<textarea';
        $text .= ' class="';
        $text .= !isset($params['class']) ? 'form-control' : $params['class'];
        $text .= '" name="'.$params['name'].'"';
        $text .= !empty($params['id']) ? ' id="'.$params['id'].'"' : null;
        $text .= '></textarea>';
        $text .= '</div>';
        echo $text."\n";
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
            echo $checkbox."\n";
        }
    }

    public function setSubmit($params = null){
        $submit = '<div class="form-group-lg">';
        $submit .= '<input type="submit"';
        $submit .= !empty($params['name']) ? ' name = "'.$params["name"].'"' : ' name="submit"';
        $submit .= !empty($params['class']) ? ' class="'.$params['class'].'"' : ' class="form-control btn btn-primary btn-lg"';
        $submit .= !empty($params['value']) ? ' value="'.$params['value'].'"' : ' value="Сохранить"';
        $submit .= '>';
        $submit .= '</div>';
        echo $submit."\n";
    }
}
