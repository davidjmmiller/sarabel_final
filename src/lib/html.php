<?php

namespace tools;
class html {

    // Alert component
    private function alert_output($type,$message){
        return '<div class="alert alert-'.$type.'" role="alert">'.$message.'</div>';
    }
    public function alert_primary($message){ return $this->alert_output('primary',$message); }
    public function alert_secondary($message){ return $this->alert_output('secondary',$message); }
    public function alert_success($message){ return $this->alert_output('success',$message); }
    public function alert_danger($message){ return $this->alert_output('danger',$message); }
    public function alert_warning($message){ return $this->alert_output('warning',$message); }
    public function alert_info($message){ return $this->alert_output('info',$message); }
    public function alert_light($message){ return $this->alert_output('light',$message); }
    public function alert_dark($message){ return $this->alert_output('dark',$message); }

    // Badge component
    private function badge_output($type,$message){
        return '<span class="badge badge-'.$type.'">'.$message.'</span>';
    }
    public function badge_primary($message){ return $this->badge_output('primary',$message); }
    public function badge_secondary($message){ return $this->badge_output('secondary',$message); }
    public function badge_success($message){ return $this->badge_output('success',$message); }
    public function badge_danger($message){ return $this->badge_output('danger',$message); }
    public function badge_warning($message){ return $this->badge_output('warning',$message); }
    public function badge_info($message){ return $this->badge_output('info',$message); }
    public function badge_light($message){ return $this->badge_output('light',$message); }
    public function badge_dark($message){ return $this->badge_output('dark',$message); }

    public function input(htmlInput $params){
        return '
        <div class="form-group">
            <label for="'.$params->id.'">'.$params->label.'</label>
            <div class="input-group">
                <input type="'.$params->type.'" class="form-control '.($params->is_valid?'is-valid':'').'"
                    id="'.$params->id.'" placeholder="'.$params->placeholder.'" value="'.$params->value.'"
                    '.($params->required?'required':'').' name="'.$params->id.'">
                <div class="valid-feedback">
                    '.$params->feedback_valid.'
                </div>
                <div class="invalid-feedback">
                    '.$params->feedback_invalid.'
                </div>
            </div>
        </div>';
    }

    public function textarea(textArea $params){
        return '
        <div class="form-group">
            <label for="'.$params->id.'">'.$params->label.'</label>
            <textarea class="form-control" id="'.$params->id.'"
                rows="'.$params->rows.'" value="'.$params->value.'" '.($params->required?'required':'').'
                name="'.$params->id.'">'.$params->value.'</textarea>
        </div>';
    }


}

class htmlInput {
    public $id = 'inputFieldId';
    public $type = 'text';
    public $label = '';
    public $value = '';
    public $is_valid = false;
    public $placeholder = '';
    public $required = true;
    public $feedback_valid = '';
    public $feedback_invalid = '';

    public function __construct(){
        $this->value = ($_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST[$this->id] : '');
    }
}

class textArea {
    public $id = 'inputFieldId';
    public $label = '';
    public $value = '';
    public $rows = 3;
    public $is_valid = false;
    public $placeholder = '';
    public $required = true;
    public $feedback_valid = '';
    public $feedback_invalid = '';

    public function __construct(){
        $this->value = ($_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST[$this->id] : '');
    }
}
