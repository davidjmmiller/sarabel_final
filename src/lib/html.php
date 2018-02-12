<?php

namespace tools;
class html {

    // Alert component
    private function alert_output($type,$message){
        $output = '<div class="alert alert-'.$type.'" role="alert">'.$message.'</div>';
        echo $output;
    }
    public function alert_primary($message){ $this->alert_output('primary',$message); }
    public function alert_secondary($message){ $this->alert_output('secondary',$message); }
    public function alert_success($message){ $this->alert_output('success',$message); }
    public function alert_danger($message){ $this->alert_output('danger',$message); }
    public function alert_warning($message){ $this->alert_output('warning',$message); }
    public function alert_info($message){ $this->alert_output('info',$message); }
    public function alert_light($message){ $this->alert_output('light',$message); }
    public function alert_dark($message){ $this->alert_output('dark',$message); }

}