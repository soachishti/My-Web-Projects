<?php
        function error($msg) {
            echo '
                <div class="alert alert-danger">
                <strong>'.$msg.'
                </div>';
        }
        function success($msg) {
            echo '
                <div class="alert alert-success">
                <strong>'.$msg.'
                </div>';
        }
        
        function get_route() {
            global $sub_diretory;
            $r = str_replace($sub_diretory, '', $_SERVER['REQUEST_URI']);
            $r = explode("/", $_SERVER['REQUEST_URI']);
            $r = end($r);
            $r = explode("?", $r)[0];
            $r = explode("#", $r)[0];
            return $r;
        }