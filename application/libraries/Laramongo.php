<?php
class Laramongo {
    public function get($ten_bang, $id = null) {
        if($id && !is_string($id)) {
            return $this->get_one($ten_bang, $id);
        }
        $content = file_get_contents('http://laramongo.vn/api/v1/tong_quat'.($id ? '/'.$id : '').'?ten_bang=' . $ten_bang);
        $content = json_decode($content, true);
        return $content['du_lieu'];
    }
    public function get_one($ten_bang, $conds = []) {
        $conds_str = urlencode(json_encode($conds));

        $content = file_get_contents('http://laramongo.vn/api/v1/tong_quat/tim_kiem_mot?ten_bang=' . $ten_bang . '&dieu_kien=' . $conds_str);
        $content = json_decode($content, true);
        return $content['du_lieu'];
    }
}