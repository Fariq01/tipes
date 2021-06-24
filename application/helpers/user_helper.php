<?php
    if(!function_exists('user_role')) {
        function user_role($id_role) {
            if (isset($_SESSION['id_role'])) {
                return $_SESSION['id_role'] == $id_role;
            }
            return false;
        }
    }

    if(!function_exists('has_login')) {
        function has_login() {
            return isset($_SESSION['id_user']);
        }
    }
?>